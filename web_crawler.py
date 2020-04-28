# -*- coding: utf-8 -*-
"""
Created on Sun Mar 22 19:01:18 2020

@author: JOY
"""

# -*- coding: utf-8 -*-
"""
Created on Sun Mar 22 18:48:42 2020

@author: JOY
"""

# -*- coding: utf-8 -*-
"""
Created on Sat Mar 21 19:42:24 2020

@author: JOY
"""

# -*- coding: utf-8 -*-
"""
Created on Wed Mar  4 20:11:12 2020

@author: JOY
"""

# -*- coding: utf-8 -*-
"""
Created on Mon Feb 24 10:31:04 2020

@author: JOY
"""

import requests
import rsa
import time
import re
import random
import urllib3
import base64
from urllib.parse import quote
from binascii import b2a_hex

from urllib import request
from urllib import parse
from urllib.request import urlopen
from http import cookiejar
from lxml import etree
from bs4 import  BeautifulSoup
import datetime
import sqlite3
#from myfunction import ntoc
#from myfunction import dict_freq_sort
import xlwt
import random
import time
import sys
urllib3.disable_warnings() # 取消警告

def get_timestamp():
    return int(time.time()*1000)  # 获取13位时间戳


def getday(y,m,d,n):
    the_date = datetime.datetime(y,m,d)
    result_date = the_date + datetime.timedelta(days=n)
    d = result_date.strftime('%Y-%m-%d')
    return d

class WeiBo():
    def __init__(self,username,password):
        self.username = username
        self.password = password
        self.session = requests.session() #登录用session
        self.session.headers={
            'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36'
        }
        self.session.verify = False  # 取消证书验证

    def prelogin(self):
        '''预登录，获取一些必须的参数'''
        self.su = base64.b64encode(self.username.encode())  #阅读js得知用户名进行base64转码
        url = 'https://login.sina.com.cn/sso/prelogin.php?entry=weibo&callback=sinaSSOController.preloginCallBack&su={}&rsakt=mod&checkpin=1&client=ssologin.js(v1.4.19)&_={}'.format(quote(self.su),get_timestamp()) #注意su要进行quote转码
        response = self.session.get(url).content.decode()
        # print(response)
        self.nonce = re.findall(r'"nonce":"(.*?)"',response)[0]
        self.pubkey = re.findall(r'"pubkey":"(.*?)"',response)[0]
        self.rsakv = re.findall(r'"rsakv":"(.*?)"',response)[0]
        self.servertime = re.findall(r'"servertime":(.*?),',response)[0]
        return self.nonce,self.pubkey,self.rsakv,self.servertime

    def get_sp(self):
        '''用rsa对明文密码进行加密，加密规则通过阅读js代码得知'''
        publickey = rsa.PublicKey(int(self.pubkey,16),int('10001',16))
        message = str(self.servertime) + '\t' + str(self.nonce) + '\n' + str(self.password)
        self.sp = rsa.encrypt(message.encode(),publickey)
        return b2a_hex(self.sp)

    def login(self):
        url = 'https://login.sina.com.cn/sso/login.php?client=ssologin.js(v1.4.19)'
        data = {
        'entry': 'weibo',
        'gateway': '1',
        'from':'',
        'savestate': '7',
        'qrcode_flag': 'false',
        'useticket': '1',
        'pagerefer': 'https://login.sina.com.cn/crossdomain2.php?action=logout&r=https%3A%2F%2Fweibo.com%2Flogout.php%3Fbackurl%3D%252F',
        'vsnf': '1',
        'su': self.su,
        'service': 'miniblog',
        'servertime': str(int(self.servertime)+random.randint(1,20)),
        'nonce': self.nonce,
        'pwencode': 'rsa2',
        'rsakv': self.rsakv,
        'sp': self.get_sp(),
        'sr': '1536 * 864',
        'encoding': 'UTF - 8',
        'prelt': '35',
        'url': 'https://weibo.com/ajaxlogin.php?framelogin=1&callback=parent.sinaSSOController.feedBackUrlCallBack',
        'returntype': 'META',
        }
        response = self.session.post(url,data=data,allow_redirects=False).text # 提交账号密码等参数
        redirect_url = re.findall(r'location.replace\("(.*?)"\);',response)[0] # 微博在提交数据后会跳转，此处获取跳转的url
        result = self.session.get(redirect_url,allow_redirects=False).text  # 请求跳转页面
        ticket,ssosavestate = re.findall(r'ticket=(.*?)&ssosavestate=(.*?)"',result)[0] #获取ticket和ssosavestate参数
        uid_url = 'https://passport.weibo.com/wbsso/login?ticket={}&ssosavestate={}&callback=sinaSSOController.doCrossDomainCallBack&scriptId=ssoscript0&client=ssologin.js(v1.4.19)&_={}'.format(ticket,ssosavestate,get_timestamp())
        data = self.session.get(uid_url).text #请求获取uid
        uid = re.findall(r'"uniqueid":"(.*?)"',data)[0]
        print(uid)
        home_url = 'https://weibo.com/u/{}/home?wvr=5&lf=reg'.format(uid) #请求首页
        html = self.session.get(home_url)
        html.encoding = 'utf-8'
        print(html.text)

    def main(self):
        self.prelogin()
        self.get_sp()
        self.login()

if __name__ == '__main__':
    username = 'jinqiuyi2007@sina.com' # 微博账号
    password = 'jinshan815' # 微博密码
    weibo = WeiBo(username,password)
    weibo.main()
    
    
    #keyword=sys.argv[1]
    #category=sys.argv[1]
     
    keyword="疫情 英国"
    category="疫情 英国"
    
    y=2020
    m=3
    d=25
    
    if d==1:
        if m==1 or m==2 or m==4 or m==6 or m==8 or m==9 or m==11:
            d=31
            m=m-1
        elif m==3:
            d=29
            m=m-1
        else:
            d=30
            m=m-1
    else:
        d=d-1
    days=30
    url_keyword=parse.quote(keyword)

    #提交准备
    user_agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge/18.17763'
    headers = { 'User-Agent' : user_agent ,'Referer':'' }
    #cookie构建opener
    cookie=cookiejar.CookieJar()#cookie = cookiejar.MozillaCookieJar(filename) 可保存读取的cookie初始化方法
    #cookie.load(filename, ignore_discard=True, ignore_expires=True)读取已保存cookie
    handler = request.HTTPCookieProcessor(cookie)
    opener = request.build_opener(handler)
    
    end_str='抱歉，未找到“'+keyword+'”相关结果。'
    pattern_endweibo=re.compile(end_str)

    for i in range(days):
        for j in range(24):
            data=getday(y,m,d,-i)
            if j==23:
                data_add_hour = data + '-' + str(j) + ':' +getday(y,m,d,-(i-1)) + '-' + str(0)
            else:
                data_add_hour = data + '-' + str(j) + ':' + data + '-' + str(j + 1)
            print(data_add_hour+':')
            for k in range(1):
                url = 'https://s.weibo.com/weibo?q='+url_keyword+'&typeall=1&suball=1&timescope=custom:'+data_add_hour+'&Refer=g&page='+str(k+1)
                requ = request.Request(url=url,headers=headers)  # data,#headers
                try:
                    respones = opener.open(requ,timeout=60)  # timeout=10 使用自己建的opener处理requests
                    # cookie.save(ignore_discard=True, ignore_expires=True)  保存cookie
                    web_data = respones.read().decode("utf-8", "ignore")
                    if pattern_endweibo.findall(web_data)!=[]:
                        print('该时段没有更多结果')
                        break
                    page = etree.HTML(web_data)
                    result = etree.tostring(page)
                    result.decode('utf-8')
                    weibo_list = page.xpath("//div[@mid]")
                    for p in weibo_list:
                        rowNum = sum
                        #print('=============')
                        mid = p.attrib.get('mid')
                        #print(mid)
                        p_time = p.xpath(".//div[@class='content'and @node-type='like']/p[@class='from']/a[@suda-data]")
                        time_x=p_time[0].xpath('string(.)')
                        p_from=p.xpath(".//div[@class='content'and @node-type='like']/p[@class='from']/a[@rel]")
                        time_x=time_x.strip()
                        time_x.replace(" ","")
                        fro=p_from[0].xpath('string(.)').strip()
                        fro=fro.replace(" ","")
                        #time1=str(time_x)+" 来自"+str(fro)
                        time1=str(time_x)
                        
                        month=re.findall('(.\d)月',time1)
                        day=re.findall('月(.\d)日',time1)
                        hour=re.findall('日 (.\d):',time1)
                        minute=re.findall(':(.\d)',time1)
                        time_=datetime.datetime(2020,int(month[0]),int(day[0]),int(hour[0]),int(minute[0]),0,0)
                        print(time_)
                        
                        p_name = p.xpath(".//div[not(@node-type)]/a[@class]")
                        name=p_name[0].xpath('string(.)')
                        id=p_name[0].attrib.get('href')
                        
                        id=re.findall('weibo.com/(.*)?refer',id)[0]
                        id=id[:-1]
                        '''
                        sheet.write(rowNum, 1, mid,style)
                        sheet.write(rowNum, 2, name,style)
                        sheet.write(rowNum,3,id,style)
                        '''
                        p_content = p.xpath(".//div[@class='content'and @node-type='like']/p[@node-type='feed_list_content']")
                        content=p_content[0].xpath('string(.)')
                        content=content.strip()
                        #sheet.write(rowNum, 4, content,style)
                        #category="地震"
                        conn=sqlite3.connect('/home/web/qiuyi/SMASAC/.spyproject/NCP.db3')
                        #conn=sqlite3.connect(r'C:\Users\JOY\Desktop\project\SMASAC\.spyproject\data.db')
                        c=conn.cursor()
                        c.execute("insert into NCP(weibo_id,user_id,time,original_text) values (?,?,?,?)",(format(mid),format(id),format(time_),format(content)))
                        print(time_)
                        conn.commit()
                        conn.close()
                        #sum+=1
                        
                except Exception as e:
                    print(e)
                t=15
                print("sleep for "+str(t)+" seconds.")
                time.sleep(t)
    #    wbk.save('./test2.xls')
        print('save_today')
        #sheet.write(i, 1, str(sum))
