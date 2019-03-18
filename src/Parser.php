<?php

namespace ArgsParser;

class Parser
{
    private $validator;
    private $store;

    public function __construct($input, Validator $validator)
    {
        $this->validator = $validator;
        $this->store = new Store();
        $this->parse($input);
    }

    public function parse($input)
    {
        if ($this->validator->validate($input)) {
            $splitInput = explode("-", $input);
            $trimmedInput = $this->trimInput($splitInput);
            $this->store->addValuesToRegister($trimmedInput);
            var_dump($this->store->getRegister());
            if ($this->validator->validateArray($trimmedInput)) {
                //TODO: RESOLVE
            }
            //TODO: Entscheiden, ob 2x checken oder 1x
        }
    }

    private function trimInput($array)
    {
        $trimmed = [];
        foreach ($array as $item) {
            $trimmed[] = rtrim($item);
        }
        return $trimmed;
    }

    public function ask($flag)
    {
        if (in_array("u", $this->validator->getAllowedFlags())) {
            $tmp = $this->store->getRegister();
            echo $tmp['u'];
        } elseif (in_array("d", $this->validator->getAllowedFlags())) {
            $tmp = $this->store->getRegister();
            echo $tmp['d'];
        } elseif (in_array("p", $this->validator->getAllowedFlags())) {
            $tmp = $this->store->getRegister();
            echo $tmp['p'];
        } else {
            echo "invalid flag";
        }
    }

}