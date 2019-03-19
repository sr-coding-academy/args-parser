<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 18.03.2019
 * Time: 14:08
 */

namespace ArgsParser;


class IntegerListFlag extends Flag
{
    public function __construct()
    {
        $this->defaultValue =0;
        $this->name = "-i";
        $this->value = $this->defaultValue;
        $this->description="Indices";
    }

    public function parse() {
        $this->value = explode(',', $this->value);
        $newValues=[];
        foreach($this->value as $value){
            $newValues[]=(int)$value;
        }
        $this->value = $newValues;
    }
}