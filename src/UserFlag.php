<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 18.03.2019
 * Time: 11:15
 */

namespace ArgsParser;


class UserFlag extends Flag
{
    public function __construct($name)
    {
        parent::__construct($name);
        $this->defaultValue = "";
    }

    public function parse() {
        $this->value = (string)$this->value;
    }

}