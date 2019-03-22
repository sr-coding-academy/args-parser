<?php

namespace ArgsParser;

use ArgsParser\validators\Validator;
use Exception;

class Parser
{

    /**
     * @var ArgumentPolice
     */
    private $argumentPolice;
    /**
     * @var Register
     */
    private $register;

    /**
     * @param string $input
     * @param Register $register
     * @throws Exception
     */
    public function __construct($input, Register $register)
    {
        $this->register = $register;
        $this->parse($input);
    }

    /**
     * @param $input
     * @return void
     */
    public function parse($input)
    {
        $processedInputs = $this->prepareInputForDelivery($input);
        foreach ($processedInputs as $item) {
            $flag = $this->extractFlagFrom($item);
            $value = $this->extractValueFrom($item);
            $isValid = Validator::validate($flag, $value);
            if ($isValid) {
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
        }
        foreach ($data[$flag] as $value) {
            if ($flag === "l" && $data[$flag][0] === false) {
                echo "\tValue: false \t\t- Type: " . gettype($data[$flag][0]) . "\n";
            } elseif ($flag === "l" && $data[$flag][0] === true){
                echo "\tValue: true \t\t- Type: " . gettype($data[$flag][0]) . "\n";
            }
            else {
                $type = gettype($value);
                echo "\tValue: {$value} \t\t- Type: {$type}\n";
            }
        }
    }
}