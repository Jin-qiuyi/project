 
import tensorflow as tf
import numpy as np
import os, argparse, time, random
from model import BiLSTM_CRF
from utils import str2bool, get_logger, get_entity
from data import read_corpus, read_dictionary, tag2label, random_embedding
import sqlite3
import codecs
import jieba
import re
import sys

def min_distance(strs, str1, str2):
  '''
  数组中两个字符串的最小距离，这是方法1，时间复杂度 o(n^2)
  :param strs: 给定的数组中存放有多个字符串
  :param str1: 第一个字符串
  :param str2: 第二个字符串
  :return: 如果其中给定的一个字符串不在数组 strs 中，那么返回str长度，否则返回两个字符串之间的最小间距
  '''
  if str1 not in strs or str2 not in strs:
   return len(strs)
  if str1 == str2:
   return 0
  dist, min = 1, len(strs)
  pos1, pos2 = 0, len(strs)
  for i in range(0, len(strs)):
   if str1 == strs[i]:
    pos1 = i
    for j in range(0, len(strs)):
     if str2 == strs[j]:
      pos2 = j
     dist = abs(pos1 - pos2)
     if dist < min:
      min = dist
  return min

def is_chinese(string):
    i=0
    for uchar in string:
        if (uchar>=u'\u4e00' and uchar <= u'\u9fa5'):
            i=i+1
            #return True
        else:
            break
    if(i<len(string)):
        return False
    else:
        return True
            #return False
    
 
def is_number(s):
    try:
        float(s)
        return True
    except ValueError:
        pass
 
    try:
        import unicodedata
        unicodedata.numeric(s)
        return True
    except (TypeError, ValueError):
        pass
 
    return False


def format_str(content):
    content_str=''
    for i in (content):
       if is_chinese(i) or is_number(i):
           content_str=content_str+i
    return content_str


def fenci(content):
    cut_words=jieba.cut(content)

    stopwords = stopwordslist()
    outstr = ''
    for word in cut_words:
        if word not in stopwords:
             if word != '\t':
                 outstr += word
    return outstr

def stopwordslist():
    stopwords=[line.strip() for line in open
               (r'C:\Users\JOY\Desktop\project\SMASAC\.spyproject\停用词2.txt').readlines()]
    return stopwords


## Session configuration
os.environ['CUDA_VISIBLE_DEVICES'] = '0'
os.environ['TF_CPP_MIN_LOG_LEVEL'] = '2'  # default: 0
config = tf.ConfigProto()
config.gpu_options.allow_growth = True
config.gpu_options.per_process_gpu_memory_fraction = 0.2  # need ~700MB GPU memory


## hyperparameters
parser = argparse.ArgumentParser(description='BiLSTM-CRF for Chinese NER task')
parser.add_argument('--train_data', type=str, default='data_path', help='train data source')
parser.add_argument('--test_data', type=str, default='data_path', help='test data source')
parser.add_argument('--batch_size', type=int, default=64, help='#sample of each minibatch')
parser.add_argument('--epoch', type=int, default=40, help='#epoch of training')
parser.add_argument('--hidden_dim', type=int, default=300, help='#dim of hidden state')
parser.add_argument('--optimizer', type=str, default='Adam', help='Adam/Adadelta/Adagrad/RMSProp/Momentum/SGD')
parser.add_argument('--CRF', type=str2bool, default=True, help='use CRF at the top layer. if False, use Softmax')
parser.add_argument('--lr', type=float, default=0.001, help='learning rate')
parser.add_argument('--clip', type=float, default=5.0, help='gradient clipping')
parser.add_argument('--dropout', type=float, default=0.5, help='dropout keep_prob')
parser.add_argument('--update_embedding', type=str2bool, default=True, help='update embedding during training')
parser.add_argument('--pretrain_embedding', type=str, default='random', help='use pretrained char embedding or init it randomly')
parser.add_argument('--embedding_dim', type=int, default=300, help='random init char embedding_dim')
parser.add_argument('--shuffle', type=str2bool, default=True, help='shuffle training data before each epoch')
parser.add_argument('--mode', type=str, default='demo', help='train/test/demo')
parser.add_argument('--demo_model', type=str, default='1521112368', help='model for test and demo')
parser.add_argument('--disaster_type', type=int)
args = parser.parse_args()


## get char embeddings
word2id = read_dictionary(os.path.join('/home/web/qiuyi/SMASAC/.spyproject/NER_NCP', args.train_data, 'word2id.pkl'))
#word2id = read_dictionary(os.path.join('C:/Users/JOY/Desktop/project/SMASAC/.spyproject/NER', args.train_data, 'word2id.pkl'))
if args.pretrain_embedding == 'random':
    embeddings = random_embedding(word2id, args.embedding_dim)
else:
    embedding_path = 'pretrain_embedding.npy'
    embeddings = np.array(np.load(embedding_path), dtype='float32')


## read corpus and get training data
if args.mode != 'demo':
    train_path = os.path.join('.', args.train_data, 'train_data')
    test_path = os.path.join('.', args.test_data, 'test_data')
    train_data = read_corpus(train_path)
    test_data = read_corpus(test_path); test_size = len(test_data)


## paths setting
paths = {}
timestamp = str(int(time.time())) if args.mode == 'train' else args.demo_model
output_path = os.path.join('.', args.train_data+"_save", timestamp)
if not os.path.exists(output_path): os.makedirs(output_path)
summary_path = os.path.join(output_path, "summaries")
paths['summary_path'] = summary_path
if not os.path.exists(summary_path): os.makedirs(summary_path)
model_path = os.path.join(output_path, "checkpoints/")
if not os.path.exists(model_path): os.makedirs(model_path)
ckpt_prefix = os.path.join(model_path, "model")
paths['model_path'] = ckpt_prefix
result_path = os.path.join(output_path, "results")
paths['result_path'] = result_path
if not os.path.exists(result_path): os.makedirs(result_path)
log_path = os.path.join(result_path, "log.txt")
paths['log_path'] = log_path
get_logger(log_path).info(str(args))


## training model
if args.mode == 'train':
    model = BiLSTM_CRF(args, embeddings, tag2label, word2id, paths, config=config)
    model.build_graph()

    ## hyperparameters-tuning, split train/dev
    # dev_data = train_data[:5000]; dev_size = len(dev_data)
    # train_data = train_data[5000:]; train_size = len(train_data)
    # print("train data: {0}\ndev data: {1}".format(train_size, dev_size))
    # model.train(train=train_data, dev=dev_data)

    ## train model on the whole training data
    #print("train data: {}".format(len(train_data)))
    model.train(train=train_data, dev=test_data)  # use test_data as the dev_data to see overfitting phenomena

## testing model
elif args.mode == 'test':
    ckpt_file = tf.train.latest_checkpoint(model_path)
    print(ckpt_file)
    paths['model_path'] = ckpt_file
    model = BiLSTM_CRF(args, embeddings, tag2label, word2id, paths, config=config)
    model.build_graph()
    print("test data: {}".format(test_size))
    model.test(test_data)

## demo
elif args.mode == 'demo':
    ckpt_file = tf.train.latest_checkpoint("/home/web/qiuyi/SMASAC/.spyproject/NER_NCP/data_path_save/1521112368/checkpoints")
    #ckpt_file = tf.train.latest_checkpoint("C:/Users/JOY/Desktop/project/SMASAC/.spyproject/NER/data_path_save/1521112368/checkpoints")
    print(ckpt_file)
    paths['model_path'] = ckpt_file
    model = BiLSTM_CRF(args, embeddings, tag2label, word2id, paths, config=config)
    model.build_graph()
    saver = tf.train.Saver()
    
    with tf.Session(config=config) as sess:
        saver.restore(sess, ckpt_file)
        conn=sqlite3.connect('/home/web/qiuyi/SMASAC/.spyproject/NCP.db3')
        #conn=sqlite3.connect("C:/Users/JOY/Desktop/疫情/NCP.db3")
        c=conn.cursor()
        c.execute("select * from NCP_new")
        conn.commit()
        lines= c.fetchall()
        print(len(lines))
        for line in lines:
            if line[3] is "转发微博" in line[3]:
                continue
            try:
                text=format_str(line[3])
                demo_sent=format_str(line[3])
                #print(demo_sent)
                demo_data = [(demo_sent, ['O'] * len(demo_sent))]
                tag = model.demo_one(sess, demo_data)
                try:
                    PER, LOC, ORG = get_entity(tag, demo_sent)
                except Exception: 
                    pass        
                str_PER = ''.join(PER)
                str_LOC = ''.join(LOC)
                str_ORG = ''.join(ORG)
            except:
                pass
            
            mag=re.search(r"新增\d+例新冠肺炎", line[3])                                           
            #if (len(LOC)!=0 and len(mag)!= 0):  
            if (len(LOC)!=0 and LOC[0] is not "钟南山"):
                if "专家回应" in line[3] or "钟南山" in line[3] or "动态" in line[3] or "态势" in line[3] or "拐点" in line[3] or "回应" in line[3] or "专家称" in line[3] or "趋势" in line[3] or "专访" in line[3] or "专家" in line[3] or "专访" in line[3] or "中国工程院" in line[3] or "国家卫健委" in line[3] or "势头" in line[3] or "教授" in line[3]:
                    category="situation"
                elif "派遣" in line[3] or "物资" in line[3] or "保障用品" in line[3] or "试剂盒" in line[3] or "捐赠" in line[3] or "口罩" in line[3] or "呼吸机" in line[3]:
                    category="aid"
                elif "政策" in line[3] or "公共卫生体系" in line[3] or "通知" in line[3] or "措施" in line[3] or "宣布" in line[3] or "关闭" in line[3] or "管制" in line[3] or "复工" in line[3] or "开学" in line[3]:
                    category="policy"
                elif "输入病例" in line[3] or "确诊" in line[3] or "新增" in line[3] or "新增新型肺炎" in line[3] or "治愈" in line[3]:
                    category="case"
                elif "经济" in line[3] or "股市" in line[3] or "美股" in line[3] or "断熔" in line[3] or "失业" in line [3] or "裁员" in line[3] or "汇率" in line[3] or "财经" in line[3] or "英镑" in line[3]:
                    category="economy"
                else:
                    category="else"         
                try:
                    c.execute("insert into category(weibo_id,user_id,time,category,region,original_text) values (?,?,?,?,?,?)",
                              (format(line[0]),format(line[1]),format(line[2]),format(category),format(LOC[0]),format(line[3])))
                    conn.commit()
                except:
                    continue  
                
            else:
                if "专家回应" in line[3] or "钟南山" in line[3] or "动态" in line[3] or "态势" in line[3] or "拐点" in line[3] or "回应" in line[3] or "专家称" in line[3] or "趋势" in line[3] or "专访" in line[3] or "专家" in line[3] or "专访" in line[3] or "中国工程院" in line[3] or "国家卫健委" in line[3] or "势头" in line[3] or "教授" in line[3]:
                    category="situation"
                elif "派遣" in line[3] or "物资" in line[3] or "保障用品" in line[3] or "试剂盒" in line[3] or "捐赠" in line[3] or "口罩" in line[3] or "呼吸机" in line[3]:
                    category="aid"
                elif "政策" in line[3] or "公共卫生体系" in line[3] or "通知" in line[3] or "措施" in line[3] or "宣布" in line[3] or "关闭" in line[3] or "管制" in line[3] or "复工" in line[3] or "开学" in line[3] or "通报" in line[3] or "封城" in line[3] or "规定" in line[3]:
                    category="policy"
                elif "输入病例" in line[3] or "确诊" in line[3] or "新增" in line[3] or "新增新型肺炎" in line[3] or "治愈" in line[3] or "出院" in line[3]:
                    category="case"
                elif "经济" in line[3] or "股市" in line[3] or "美股" in line[3] or "断熔" in line[3] or "失业" in line [3] or "裁员" in line[3] or "大跌" in line[3] or "财经" in line[3] or "英镑" in line[3]:
                    category="economy"
                else:
                    category="else"
                
                try:
                    c.execute("insert into category(weibo_id,user_id,time,category,region,original_text) values (?,?,?,?,?,?)",
                              (format(line[0]),format(line[1]),format(line[2]),format(category),format("Not mention"),format(line[3])))
                    conn.commit()
                except:
                    continue
                    
            #print('PER: {}\nLOC: {}\nORG: {}'.format(PER, LOC, ORG))
        conn.close()
