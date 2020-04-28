# -*- coding: utf-8 -*-
"""
Created on Sun Nov 17 15:37:05 2019

@author: JOY
"""

 
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

def is_chinese(uchar):
    if (uchar>=u'\u4e00' and uchar <= u'\u9fa5'):
        return True
    else:
        return False
    
 
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
parser.add_argument('--text', type=str)
args = parser.parse_args()


## get char embeddings
word2id = read_dictionary(os.path.join('C:/Users/JOY/Desktop/project/SMASAC/.spyproject/NER', args.train_data, 'word2id.pkl'))
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
    ckpt_file = tf.train.latest_checkpoint(model_path)
    #print(ckpt_file)
    paths['model_path'] = ckpt_file
    model = BiLSTM_CRF(args, embeddings, tag2label, word2id, paths, config=config)
    model.build_graph()
    saver = tf.train.Saver()
    
    with tf.Session(config=config) as sess:
        saver.restore(sess, ckpt_file)
        conn=sqlite3.connect(r'C:\Users\JOY\Desktop\project\SMASAC\.spyproject\data.db')
        c=conn.cursor()
        #c.execute("select * from earthquake_originaltext")
        #c.execute("select * from rainstorm_originaltext")
        #c.execute("select * from typhoon_originaltext")
        #lines= c.fetchall()
        lines=[]
        lines.append(args.text)
        for line in lines:
            #text = fenci(format_str(line[4])).strip('\n')
            #demo_sent = text
            text=line
            demo_sent=line
            #print(demo_sent)
            demo_data = [(demo_sent, ['O'] * len(demo_sent))]
            tag = model.demo_one(sess, demo_data)
            try:
                PER, LOC, ORG = get_entity(tag, demo_sent)
            except Exception: 
                pass 
            
            if(args.disaster_type==1):
                #mag=re.search(r"\d+(\.\d+)级", line[4])
                mag=re.search(r"\d+(\.\d+)级", line)
                if(mag!=None):
                    mag=mag.group()
            
            elif (args.disaster_type==3):
                #mag=re.search("暴雨红色预警", line[4])
                mag=re.search("暴雨红色预警", line)
                if(mag==None):
                    #mag=re.search("暴雨黄色预警", line[4])
                    mag=re.search("暴雨黄色预警", line)
                    
                if(mag==None):
                    #mag=re.search("暴雨蓝色预警", line[4])
                    mag=re.search("暴雨蓝色预警", line)
                                  
                if(mag==None):
                    #mag=re.search("暴雨橙色预警",line[4])
                    mag=re.search("暴雨橙色预警",line)
                if(mag!=None):
                    mag=mag.group()
            
                
                
            elif(args.disaster_type==2):
                #searchObj1=re.search("暴雨", line[4])
                #searchObj2=re.search("泥石流",line[4])
                #searchObj3=re.search("洪水",line[4])
                searchObj1=re.search("暴雨", line)
                searchObj2=re.search("泥石流",line)
                searchObj3=re.search("洪水",line)
                mag=[]
                if searchObj1 and searchObj2 and searchObj3:
                    mag.append("暴雨、泥石流、洪水")
                elif searchObj1 and searchObj2 and not searchObj3:
                    mag.append("暴雨、泥石流")
                elif searchObj1 and not searchObj2 and not searchObj3:
                    mag.append("暴雨")
                elif searchObj1 and not searchObj2 and searchObj3:
                    mag.append("暴雨、洪水")
                elif not searchObj1 and searchObj2 and searchObj3:
                    mag.append("泥石流、洪水")
                elif not searchObj1 and searchObj2 and not searchObj3:
                    mag.append("泥石流")
                elif not searchObj1 and not searchObj2 and searchObj3:
                    mag.append("洪水")
                
              
            if(mag!=None):
                mag=mag.group()
            
            
            dis1=[]
            dis2=[]
            
            if(args.disaster_type==1):
                for location in LOC:
                    dis1.append(min_distance(text,"地震",location))
                    dis2.append(min_distance(text,"震感",location))
                    dis2.append(min_distance(text,"晃动",location))
            
            elif(args.disaster_type==3):
                dis1=[]
                for location in LOC:
                    dis1.append(min_distance(text,"暴雨",location))
                
            
            elif(args.disaster_type==2):
                dis1=[]
                for location in LOC:
                    dis1.append(min_distance(text,"台风",location))
                    
            
            if(len(dis1)!=0):
                city=LOC[dis1.index(min(dis1))]
                command="select * from region where name='"+str(LOC[dis1.index(min(dis1))])+"'"
                #print(command)
                c.execute(command)
                info=c.fetchall()
                try:
                    while info[0][2]!=0:
                        #print(info[0][2])
                        c.execute("select * from region where id="+str(info[0][2]))
                        info=c.fetchall()
                        LOC[dis1.index(min(dis1))]=info[0][1]
                except Exception:
                     continue
                          
            
            if (len(LOC)!=0):
                if(LOC[dis1.index(min(dis1))]=="河南" or LOC[dis1.index(min(dis1))]=="湖北" or LOC[dis1.index(min(dis1))]=="湖南"):
                    region="Central China"
                    r="华中地区"
                elif(LOC[dis1.index(min(dis1))]=="北京" or LOC[dis1.index(min(dis1))]=="天津" or LOC[dis1.index(min(dis1))]=="山西" or LOC[dis1.index(min(dis1))]=="河北" or LOC[dis1.index(min(dis1))]=="内蒙古"):
                    region="North China"
                    r="华北地区"
                elif(LOC[dis1.index(min(dis1))]=="上海" or LOC[dis1.index(min(dis1))]=="江苏" or LOC[dis1.index(min(dis1))]=="浙江" or LOC[dis1.index(min(dis1))]=="安徽" or LOC[dis1.index(min(dis1))]=="福建" or LOC[dis1.index(min(dis1))]=="江西" or LOC[dis1.index(min(dis1))]=="山东" or LOC[dis1.index(min(dis1))]=="台湾"):
                    region="East China"
                    r="华动地区"
                elif(LOC[dis1.index(min(dis1))]=="广东" or LOC[dis1.index(min(dis1))]=="海南" or LOC[dis1.index(min(dis1))]=="广西" or LOC[dis1.index(min(dis1))]=="香港" or LOC[dis1.index(min(dis1))]=="澳门"):
                    region="South China"
                    r="华南地区"
                elif(LOC[dis1.index(min(dis1))]=="陕西" or LOC[dis1.index(min(dis1))]=="甘肃" or LOC[dis1.index(min(dis1))]=="青海" or LOC[dis1.index(min(dis1))]=="宁夏" or LOC[dis1.index(min(dis1))]=="新疆"):
                    region="Northwest China"
                    r="西北地区"
                elif(LOC[dis1.index(min(dis1))]=="黑龙江" or LOC[dis1.index(min(dis1))]=="吉林" or LOC[dis1.index(min(dis1))]=="辽宁"):
                    region="Northeast China"
                    r="东北地区" 
                elif(LOC[dis1.index(min(dis1))]=="重庆" or LOC[dis1.index(min(dis1))]=="四川" or LOC[dis1.index(min(dis1))]=="贵州" or LOC[dis1.index(min(dis1))]=="云南" or LOC[dis1.index(min(dis1))]=="西藏"):
                    region="Southwest China"
                    r="西南地区" 
                else:
                    region="Other countries"
                
                if(args.disaster_type==1):
                    print(r)
                    print(location)
                    if(dis1.index(min(dis1))!=dis2.index(min(dis2)) and mag!= None):
                        #c.execute("insert into earthquake_info(weibo_id,time,category,region,location,event) values (?,?,?,?,?,?)",
                        #          (format(line[0]),format(line[2]),format("地震"),format(region),format(LOC[dis1.index(min(dis1))]),format(city+"发生"+str(mag)+"地震，"+str(LOC[dis2.index(min(dis2))])+"震感")))
                        print(city+"发生"+str(mag)+"地震，"+str(LOC[dis2.index(min(dis2))])+"震感")
                    elif(dis1.index(min(dis1))!=dis2.index(min(dis2)) and mag==None):
                        #c.execute("insert into earthquake_info(weibo_id,time,category,region,location,event) values (?,?,?,?,?,?)",
                         #         (format(line[0]),format(line[2]),format("地震"),format(region),format(LOC[dis1.index(min(dis1))]),format(city+"地震，"+str(LOC[dis2.index(min(dis2))])+"震感")))
                        print(city+"地震，"+str(LOC[dis2.index(min(dis2))])+"震感")
                    elif(dis1.index(min(dis1))==dis2.index(min(dis2)) and mag!=None):
                        #c.execute("insert into earthquake_info(weibo_id,time,category,region,location,event) values (?,?,?,?,?,?)",
                        #          (format(line[0]),format(line[2]),format("地震"),format(region),format(LOC[dis1.index(min(dis1))]),format(city+"发生"+str(mag)+"地震")))
                        print(LOC[dis1.index(min(dis1))]),format(city+"发生"+str(mag)+"地震")
                    elif(dis1.index(min(dis1))==dis2.index(min(dis2)) and mag==None):
                        #c.execute("insert into earthquake_info(weibo_id,time,category,region,location,event) values (?,?,?,?,?,?)",
                         #         (format(line[0]),format(line[2]),format("地震"),format(region),format(LOC[dis1.index(min(dis1))]),format(city+"地震")))
                        print(city+"地震")


                
                
                elif(args.disaster_type==3):
                    print(r)
                    print(location)
                    if(mag!=None):
                        #c.execute("insert into rainstorm_info(weibo_id,time,category,region,location,event) values (?,?,?,?,?,?)",
                        #          (format(line[0]),format(line[2]),format("暴雨"),format(region),format(LOC[dis1.index(min(dis1))]),format(city+str(mag))))
                        print(city+str(mag))
                    else:
                        #c.execute("insert into rainstorm_info(weibo_id,time,category,region,location,event) values (?,?,?,?,?,?)",
                        #          (format(line[0]),format(line[2]),format("暴雨"),format(region),format(LOC[dis1.index(min(dis1))]),format(city+"暴雨")))
                        print(city+"暴雨")
                
                
                elif(args.disaster_type==2):
                    #if(mag!=None):
                    print(r)
                    print(location)
                    if(len(mag)!=0):
                        #c.execute("insert into typhoon_info(weibo_id,time,category,region,location,event) values (?,?,?,?,?,?)",
                        #          (format(line[0]),format(line[2]),format("台风"),format(region),format(LOC[dis1.index(min(dis1))]),format(city+"台风，并引起"+str(mag[0]))))
                        print(city+"台风，并引起"+str(mag[0]))
                    else:
                        #c.execute("insert into typhoon_info(weibo_id,time,category,region,location,event) values (?,?,?,?,?,?)",
                        #          (format(line[0]),format(line[2]),format("台风"),format(region),format(LOC[dis1.index(min(dis1))]),format(city+"台风")))
                        print(city+"台风")
                     
                conn.commit()
        
            str_PER = ''.join(PER)
            str_LOC = ''.join(LOC)
            str_ORG = ''.join(ORG)
                
            #print('PER: {}\nLOC: {}\nORG: {}'.format(PER, LOC, ORG))
        conn.close()