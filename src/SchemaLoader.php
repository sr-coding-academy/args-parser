<?php

namespace ArgsParser;

class SchemaLoader
{
    private $fileName;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function getSchema($schemaName)
    {
        $xmlSchema = simplexml_load_file(__DIR__ . "\\" . $this->fileName) or die("Failed to load");
        return $xmlSchema->$schemaName;
    }
}