<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 18.03.2019
 * Time: 12:43
 */

namespace ArgsParser;


class DirectoryFlag extends Flag
{
    public function __construct($name)
    {
        parent::__construct($name);
        $this->defaultValue= "";
    }

    public function parse()
    {
       $this->value = (string)$this->value;
    }
}