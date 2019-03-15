<?php

require "vendor/autoload.php";
use ArgsParser\Parser;

$newTest = new Parser("-p 8080 /usr/logs -f file.txt,script.sh -i 1,5,-6,17");
$result = $newTest->getArgument("-f");
var_dump($newTest);