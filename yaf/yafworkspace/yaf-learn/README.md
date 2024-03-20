###yaf学习

#####网址：https://www.php.net/manual/en/class.yaf-request-http.php

###############全局
1.Bootstrap类中的_开头的方法会以定义的顺序被调用
2.Yaf_Registry 可以设置全局变量，可以使用数组或者对象的方式访问
$config = Yaf_Registry::get("config");
var_dump($config->application->directory);die;

###########controller
1.controller层必须明确返回false，yaf才不会调用视图层的逻辑，否则会继续调用
2.controller文件中都有一个默认叫init()的函数，会在构造器调用的时候调用

##########Yaf_Request_Http
$raw = parent::getRaw();
能获取raw方式的参数以及x-www-form-urlencoded类型的参数




####################待办
1.入口，路由定义
2.错误和异常处理
3.返回和相应定义
4.插件定义
5.如何引入第三方库？
可以引入composer统一管理，也可以使用library目录
6.modules目录
除了Index模块之外，其余的模块都放在modules目录下
模块Module ,控制器Controller ,方法Action
7.参数校验
优先获取post参数为准，get同名参数会被覆盖,有错误的话，被捕获
8.设置http状态码
http_response_code(500)



18.一些细节
接口耗时的计算
链路信息的记录
api接口的版本定义
日志模块
session或者JWT
接口拦截器如何定义？



缺点：
1.没有对调用的方式做强校验，比如GET,POST
2.整体采用抛出异常的方式，而不是使用return false
3.












