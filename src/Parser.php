<?php

namespace ArgsParser;

use ArgsParser\abstracts\ArgumentObject;

class Parser
{
    /**
     * @var Register
     */
    private $register;

    /**
     * @param Register $register
     */
    public function __construct(Register $register)
    {
        $this->register = $register;
    }

    /**
     * @param $input
     * @return array
     */
    public function parse($input)
    {
        $input = $this->parseBool($input);
        $processedInputs = $this->cleanInputForDelivery($input);
        $parsedInput = [];
        foreach ($processedInputs as $item) {
            list($flag, $value, $isValid) = $this->extractFlagAndValue($item);
            if ($isValid) {
                $parsedInput[$flag] = $value;
            }
        }
        return $parsedInput;
    }

    /**
     * @param $input
     * @return mixed
     */
    private function parseBool($input)
    {
        $hasArgumentBool = strpos($input, '-l');
        if ($hasArgumentBool === false) return $input;
        $this->register->setBoolTrue();
        $inputWithoutBool = str_replace('-l', '', $input);
        return $inputWithoutBool;
    }

    /**
     * @param $input
     * @return array
     */
    private function cleanInputForDelivery($input)
    {
        preg_match_all("(([l]){1}|(([a-km-z]){1})([' ']*[A-Za-z0-9/+_~,.-]*))", $input, $allRawMatches);
        $splitInput = $allRawMatches[0];
        return $splitInput;
    }

    /**
     * @param $item
     * @return array
     */
    private function extractFlagAndValue($item): array
    {
        $flag = $this->extractFlagFrom($item);
        $value = $this->extractValueFrom($item);
        $isValid = Validator::validate($flag, $value);
        return array($flag, $value, $isValid);
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
     * @return string
     */
    public function ask($flag)
    {
        $echoString = "";
        /** @var ArgumentObject $argumentObject */
        foreach ($this->register->getRegister() as $argumentObject) {
            if ($flag === $argumentObject->getAbbreviation()) {
                $echoString .= "{$flag}:\n";
                $echoString .= "\t{$argumentObject->getType()}\t{$argumentObject->displayValue()}\n";
            }
        }
        return $echoString;
    }
}