<?php

use Carbon\Carbon;

require __DIR__ . '/../vendor/autoload.php';


$week_start = Carbon::now()->subWeek()->startOfWeek()->toDateTimeString();
$week_end =Carbon::now()->subWeek()->endOfWeek()->toDateTimeString();
var_dump($week_start);