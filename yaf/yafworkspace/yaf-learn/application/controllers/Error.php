<?php

class ErrorController extends Yaf_Controller_Abstract
{
    public function errorAction($exception)
    {
        // application.dispatcher.catchException = TRUE 若代码中没有自行捕获，yaf会捕获
        // application.dispatcher.throwException = TRUE yaf自身出错的时候是抛出异常还是触发错误,其实就是控制返回的是Error还是Exception
		var_dump($exception);
    }
}
