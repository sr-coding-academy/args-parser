<?php
require "vendor/autoload.php";
use ArgsParser\Parser;

$parser = new Parser();
$parser->parse("-u root -d /usr/logs -p 8080");
$parser->generateOutput();