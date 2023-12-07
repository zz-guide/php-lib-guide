#!/usr/bin/env bash

#1.尽量不要使用sh来执行脚本，可能不支持-e参数
#2.获取变量长度
#3.获取定义函数名列表
#3.脚本帮助信息怎么写？


function start() #开启服务
{
  echo "正在启动... localhost:8999\n"
  php -S localhost:8999 -t public public/index.php
}

readonly funcName=$1
#echo "函数名长度:${#funcName}"
if [ ! -n "${funcName}" ]; then
  echo -e "\033[31m 请输入要执行的函数,例如:start,stop等\n \033[0m"
else
  "$@"
fi