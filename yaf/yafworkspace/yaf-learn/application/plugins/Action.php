<?php

use Doraemon\packets\action\ApiAction;

abstract class ActionPlugin extends ApiAction
{
    abstract public function main();
}
