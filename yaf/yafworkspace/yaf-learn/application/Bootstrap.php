<?php

/**
 * @name Bootstrap
 * @author xulei
 * @desc 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:Yaf_Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Bootstrap extends Yaf_Bootstrap_Abstract
{

    public function _initConfig()
    {
        //把配置保存起来，类似与全局变量
        $arrConfig = Yaf_Application::app()->getConfig();
        Yaf_Registry::set('config', $arrConfig);
    }

    public function _initPlugin(Yaf_Dispatcher $dispatcher)
    {
        //注册一个插件
        $objSamplePlugin = new SamplePlugin();
        $dispatcher->registerPlugin($objSamplePlugin);
    }

    public function _initRoute(Yaf_Dispatcher $dispatcher)
    {
        //在这里注册自己的路由协议,默认使用简单路由
    }

    public function _initVendor(Yaf_Dispatcher $dispatcher)
    {
        $arrConfig = Yaf_Registry::get("config");
        require_once $arrConfig->application->vendor->directory . '/autoload.php';
    }

    public function _initRequest(Yaf_Dispatcher $dispatcher)
    {
        //在这里注册自己的路由协议,默认使用简单路由
        $request = $dispatcher->getRequest();
        $dispatcher->setRequest(new RequestPlugin($request->getRequestUri(), $request->getBaseUri()));
    }

    public function _initView(Yaf_Dispatcher $dispatcher)
    {
        //在这里注册自己的view控制器，例如smarty,firekylin

        // 关闭框架的自动注册模板逻辑
        $dispatcher->autoRender(false);
    }
}
