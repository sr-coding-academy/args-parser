<?php
require "vendor/autoload.php";
use ArgsParser\Parser;

$parser = new Parser();
$parser->parse("abc-d abc-d abc-d abx");
var_dump($parser->result);