<?php
require "vendor/autoload.php";
use ArgsParser\Parser;

$parser = new Parser("-u root -l -d /usr/logs -p 8080");
$parser->displayResult();