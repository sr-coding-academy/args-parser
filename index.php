<?php
require "vendor/autoload.php";
use ArgsParser\Parser;

$parser = new Parser();
$parser->parse("dfgsfdgs-d tserts");
echo $parser->result[0][0];