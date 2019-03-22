<?php

namespace ArgsParser\abstracts;


abstract class ArgumentObject
{
    #region Properties
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $abbreviation;

    /**
     * @var string
     */
    protected $usage;

    /**
     * @var mixed
     */
    protected $value;
    #endregion Properties

    #region Getter & Setter
    /**
     * @return string
     */
    public function getAbbreviation(): string
    {
        return $this->abbreviation;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return void
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getUsage(): string
    {
        return $this->usage;
    }
    #endregion

    /**
     * @return string
     */
    public static function getRegexPattern(): string
    {
        return static::getStaticRegexPattern();
    }

    abstract protected static function getStaticRegexPattern();
}