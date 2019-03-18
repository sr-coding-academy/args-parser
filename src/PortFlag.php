<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 18.03.2019
 * Time: 12:42
 */

namespace ArgsParser;


class PortFlag extends Flag
{
    public function __construct($name)
    {
        parent::__construct($name);
        $this->defaultValue = 0;
    }

    public function parse()
    {
        $this->value = (int)$this->value;
    }
}