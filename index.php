<?php

require "vendor/autoload.php";
use ArgsParser\Parser;

$newTest = new Parser("-u root -d /usr/logs -p 8080");
echo $newTest->getArgument("-p");