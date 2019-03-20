<?php

namespace ArgsParser;

use Exception;

class Parser
{

    /**
     * @var ArgumentPolice
     */
    private $validator;
    /**
     * @var Register
     */
    private $register;

    /**
     * @param string $input
     * @param ArgumentPolice $validator
     * @param Register $register
     * @throws Exception
     */
    public function __construct($input, ArgumentPolice $validator, Register $register)
    {
        $this->validator = $validator;
        $this->register = $register;
        $this->parse($input);
    }

    /**
     * @param $input
     * @return void
     * @throws Exception
     */
    public function parse($input)
    {
        $processedInputs = $this->prepareInputForDelivery($input);
        foreach ($processedInputs as $item) {
            $flag = $this->extractFlagFrom($item);
            $value = $this->extractValueFrom($item);
            if ($this->validator->validate($flag, $value, $item)) {
                $this->register->addValuesToRegister($flag, $value);
            }
        }
    }

    /**
     * @param $input
     * @return array
     */
    private function prepareInputForDelivery($input)
    {
        preg_match_all("(([l]){1}|(([a-km-z]){1})([' ']*[A-Za-z0-9/+_~,.-]*))", $input, $allRawMatches);
        $splitInput = $allRawMatches[0];
        return $splitInput;
    }

    /**
     * @param string $item
     * @return bool|string
     */
    private function extractFlagFrom($item)
    {
        return substr($item, 0, 1);
    }

    /**
     * @param string $item
     * @return string
     */
    private function extractValueFrom($item)
    {
        $positionOfLastWhiteSpace = strrpos($item, ' ');
        $lengthOfValue = (int)strlen($item) - (int)$positionOfLastWhiteSpace;
        return substr($item, $positionOfLastWhiteSpace + 1, $lengthOfValue);
    }

    /**
     * @param string $flag
     * @return void
     */
    public function ask($flag)
    {
        $data = $this->register->getData();
        echo "{$flag}:\n";
        if (count($data[$flag]) == 0 && $flag != 'l') {
            echo "\tNope.\n";
            return;
        } elseif ($flag == "l" && count($data['l']) == 0) {
            echo "\tfalse.";
        }
        foreach ($data[$flag] as $value) {
            $type = gettype($value);
            echo "\tValue: {$value} \t\t- Type: {$type}\n";
        }
    }
}