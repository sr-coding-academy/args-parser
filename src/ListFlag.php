<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 18.03.2019
 * Time: 13:49
 */

namespace ArgsParser;


class ListFlag extends Flag
{
    public function __construct()
    {
        $this->defaultValue ="";
        $this->name = "f";
        $this->value = $this->defaultValue;
        $this->description="Files";
    }

    public function parse() {
        $this->value = explode(',', $this->value);
    }
}