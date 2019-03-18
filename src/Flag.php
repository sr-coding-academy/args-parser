<?php

namespace ArgsParser;


abstract class Flag
{
    protected $name;
    protected $value;
    protected $defaultValue;
    protected $description;

    abstract protected function parse();

    #region Getter/Setter
    public function getName()
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    public function getDescription()
    {
        return $this->description;
    }
#endregion
}