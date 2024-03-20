<?php

class ListAction extends ActionPlugin
{
    public function main()
    {
        $res = ["id" => 1, "name" => "许磊"];
        $this->setSuccess($res);
    }
}
