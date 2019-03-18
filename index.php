<?php
require "vendor/autoload.php";
use ArgsParser\Parser;

$parser = new Parser();
$parser->checkInputForFlags("-u root -d /usr/logs -p 8080");
var_dump($parser->flags);