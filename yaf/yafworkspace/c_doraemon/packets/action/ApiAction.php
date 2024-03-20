<?php

namespace Doraemon\packets\action;


class ApiAction extends \Yaf_Action_Abstract
{
    const DEFAULT_METHOD = "main";

    // 参数校验规则以及自定义错误信息
    public array $rules = [];
    public array $rulesMsg = [];



    public function execute()
    {
        // register_shutdown_function
        // trigger_error('主动产生notice', E_USER_ERROR); //触发用户自定义错误

        // E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT

        // set_error_handler,trigger_error,set_exception_handler

        // set_error_handler 无法处理以下错误，E_ERROR、 E_PARSE、 E_CORE_ERROR、 E_CORE_WARNING、 E_COMPILE_ERROR、 E_COMPILE_WARNING、 E_STRICT
        // 错误处理分为2种，一种自定义，一种标准
        // 下面就是表示的自定义，如果返回值为false,表示标准错误处理继续使用
        // trigger_error('主动产生notice', E_USER_ERROR); //触发用户自定义错误
        // 拦截本次请求里的异常和错误，跟go的recover有点类似
        set_error_handler(function ($errno, $errstr, $errfile, $errline, $errcontext = []) {
            $aDataParam = compact('errno', 'errstr', 'errfile', 'errline', 'errcontext');
           var_dump($aDataParam);
            return false;
        }, E_ALL & ~E_NOTICE);   // 第二个参数表名接收处理的级别,~表示排除

        // 设置用户自定义的异常处理函数,用于没有用 try/catch 块来捕获的异常,相当于全局的兜底异常处理
        // 因为yaf有自己的异常处理，所以不会进入到这个方法里来
        /*set_exception_handler(function ($ex) {
            var_dump($ex->getMessage());
        });*/

        // 假设在这里处理参数校验等

        var_dump($this->getRequest()->getQuery());
        //http_response_code(500);
        $this->getResponse()->setHeader('Content-Type', 'application/json;charset=utf-8');
        $methodName = $this->getMainMethod();
        try {
            $this->validator();
            $this->$methodName();
        } catch (\Throwable $e) {
            var_dump("asdasdasd");
            var_dump($e);
        }


    }

    private function getMainMethod(): string
    {
        // static::class 代表了当前真实的调用类，也就是子类
        // $reflection = new \ReflectionClass(static::class);

        return static::DEFAULT_METHOD;
    }

    protected function setSuccess($data = null, $code = 1, $msg = '')
    {
        $res_data = [
            "code" => $code,
            "data" => $data
        ];

        $this->getResponse()->setBody(json_encode($res_data, JSON_UNESCAPED_UNICODE));
    }

    protected function setError($code, $message, $e = null)
    {
        $view = [
            "code" => 500,
            "msg" => $message
        ];

        $this->getResponse()->setBody(json_encode($view, JSON_UNESCAPED_UNICODE));
    }

    public function validator()
    {

    }
}
