<?php
/**
 * Created by PhpStorm.
 * User: e.bukli
 * Date: 15/03/2019
 * Time: 15:09
 */

namespace ArgsParser;


class Schema
{
    private $fileName;

    public function __construct($fileName)
    {

        $this->fileName = $fileName;
    }

    public function loadSchema(){

        $xmlSchema = simplexml_load_file(__DIR__ ."\\". $this->fileName) or die("Failed to load");
        return $xmlSchema;
    }
}