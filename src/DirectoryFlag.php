<?php

namespace ArgsParser;


class DirectoryFlag extends Flag
{
    public function __construct($name)
    {
        parent::__construct($name);
        $this->defaultValue= "";
        $this->value = $this->defaultValue;
        $this->description="Directory";
    }

    public function parse()
    {
       $this->value = (string)$this->value;
    }
}