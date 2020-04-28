import json
import jieba
from predict import Predictor
import argparse
import os
import sqlite3

parser = argparse.ArgumentParser()
parser.add_argument("--config_path", help="config path of model")

args = parser.parse_args()

with open(os.path.join(os.path.abspath(os.path.dirname(os.getcwd())), args.config_path), "r") as fr:
    config = json.load(fr)
 
inputs=[]
conn=sqlite3.connect('/home/web/qiuyi/SMASAC/.spyproject/NCP.db3')
c=conn.cursor()
c.execute("select * from NCP_new")
conn.commit()
text=c.fetchall()
for content in text:
        inputs.append(content)

predictor = Predictor(config)

corr = 0
for i in range(len(inputs)):
    result = predictor.predict([item for item in jieba.cut(inputs[i][3], cut_all=False)])
    
    if(result=='0'):
        print(inputs[i])
        print(result)
        try:
            c.execute("insert into classify(weibo_id,user_id,time,"
                                                                   "category,original_text) values (?,?,?,?,?)",(format(inputs[i][0]),format(inputs[i][1]),format(inputs[i][2]),format("case"),format(inputs[i][3])))
            conn.commit()
        except:
            continue
    
    elif(result=='1'):
        print(inputs[i])
        print(result)
        try:
            c.execute("insert into classify(weibo_id,user_id,time,"
                                                                   "category,original_text) values (?,?,?,?,?)",(format(inputs[i][0]),format(inputs[i][1]),format(inputs[i][2]),format("situation"),format(inputs[i][3])))
            conn.commit()
        except:
            continue
   
    elif(result=='2'):
        print(inputs[i])
        print(result)
        try:
            c.execute("insert into classify(weibo_id,user_id,time,"
                                                                   "category,original_text) values (?,?,?,?,?)",(format(inputs[i][0]),format(inputs[i][1]),format(inputs[i][2]),format("economy"),format(inputs[i][3])))
            conn.commit()
        except:
            continue
 
    elif(result=='3'):
        print(inputs[i])
        print(result)
        try:
            c.execute("insert into classify(weibo_id,user_id,time,"
                                                                   "category,original_text) values (?,?,?,?,?)",(format(inputs[i][0]),format(inputs[i][1]),format(inputs[i][2]),format("policy"),format(inputs[i][3])))
            conn.commit()
        except:
            continue
  
    elif(result=='4'):
        print(inputs[i])
        print(result)
        try:
            c.execute("insert into classify(weibo_id,user_id,time,"
                                                                   "category,original_text) values (?,?,?,?,?)",(format(inputs[i][0]),format(inputs[i][1]),format(inputs[i][2]),format("aid"),format(inputs[i][3])))
            conn.commit()
        except:
            continue
        
    elif(result=='5'):
        print(inputs[i])
        print(result)
        try:
            c.execute("insert into classify(weibo_id,user_id,time,"
                                                                   "category,original_text) values (?,?,?,?,?)",(format(inputs[i][0]),format(inputs[i][1]),format(inputs[i][2]),format("else"),format(inputs[i][3])))
            conn.commit()
        except:
            continue

