<?php

    require "vendor/autoload.php";
    use ArgsParser\Parser;
    $args = "8080 /usr/logs file.txt,script.sh 1,5,-6,17";

    $parser = new Parser();
    $parser->loadSchema("schema.xml");
    $parser->loadParameters($args);

    $parser->displayList();
    // $parser->displayArgument("-p");
