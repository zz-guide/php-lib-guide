<?php
/**
 *
 * @author:  leixu
 * @version: 1.5.0
 * @change:
 *    1. 2019/5/24 leixu: 创建；
 */

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

$value = Yaml::parseFile('./t.yaml');

var_dump($value);

# 对于循环引用，php没有这样的问题
var_dump(\A\Student::CLASS_NAME);
//var_dump(\A\Teacher::CLASS_NAME);