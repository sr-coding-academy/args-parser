<?php

namespace ArgsParser;

class Parser
{
    private $validator;
    private $register;

    public function __construct($input, ArgumentPolice $validator, Register $register)
    {
        $this->validator = $validator;
        $this->register = $register;
        $this->parse($input);
    }

    /**
     * @param $input
     */
    public function parse($input)
    {
        $splitInput = explode("-", $input);
        array_shift($splitInput);
        $trimmedInput = $this->trimInput($splitInput);
        foreach ($trimmedInput as $item) {
            if ($this->validator->validate($item)) {
                $this->register->addValuesToRegister($item);
            } else {
                echo "Invalid you know.\n";
            }
        }
        var_dump($this->register->getData());
    }

    private
    function trimInput($array)
    {
        $trimmed = [];
        foreach ($array as $item) {
            $trimmed[] = rtrim($item);
        }
        return $trimmed;
    }

    public
    function ask($flag)
    {
//        if (in_array("u", $this->validator->getAllowedFlags())) {
//            $tmp = $this->register->getRegister();
//            echo $tmp['u'];
//        } elseif (in_array("d", $this->validator->getAllowedFlags())) {
//            $tmp = $this->register->getRegister();
//            echo $tmp['d'];
//        } elseif (in_array("p", $this->validator->getAllowedFlags())) {
//            $tmp = $this->register->getRegister();
//            echo $tmp['p'];
//        } else {
//            echo "invalid flag";
//        }
    }

}