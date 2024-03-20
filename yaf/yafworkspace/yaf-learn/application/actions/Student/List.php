<?php

class ListAction extends ActionPlugin
{
    public function main()
    {
        $res = ["id" => 1, "name" => "许磊"];


        Yaf_Loader::import("aa");
//        throw new \Error("asdasd");
        $this->setuccess($res);
//        throw new \Error("致命错误", E_ERROR);
//        foobar();
    }
}
