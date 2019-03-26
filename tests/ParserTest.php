<?php

namespace ArgsParserTest;

use ArgsParser\Parser;
use ArgsParser\Register;
use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    /**
     * @var Parser
     */
    private $parser;

    /**
     * @var Register
     */
    private $register;

    public function setUp()
    {
        $this->register = new Register();
        $this->parser = new Parser($this->register);
    }

    /**
     * @dataProvider preparedForParse
     * @param $expected
     * @param $input
     */
    public function testParse_ReturnValue_GivenItem($expected, $input)
    {
        $this->assertEquals($expected, $this->parser->parse($input));
    }

    public function preparedForParse()
    {
        //  array([
        //      array expected outcome
        //  ],
        //      string input to test)
        return array(
            array([
                'u' => "root"
            ],
                "-u root"),
            array([
                'u' => "root",
                'd' => '/dir/subdir/'
            ],
                "-u root -d /dir/subdir/"),
            array([
                'u' => "root",
                'd' => '/dir/subdir/',
                'p' => "1024"
            ],
                "-u root -d /dir/subdir/ -p 1024"),
            array([
                'u' => "root",
                'd' => '/dir/subdir/',
                'p' => "1024",
                'f' => "file.txt,script.sh",
                'i' => "1,5,-6,17"
            ],
                "-u root -d /dir/subdir/ -p 1024 -f file.txt,script.sh -i 1,5,-6,17"),
        );
    }

    /**
     * @dataProvider preparedForAsk
     * @param $preparedValues
     * @param $input
     * @param $expected
     */
    public function testAsk_ReturnEchoString_ValidFlag($preparedValues, $input, $expected)
    {
        $this->register->addValuesToRegister($preparedValues);
        $this->assertEquals($expected, $this->parser->ask($input));
    }

    public function preparedForAsk()
    {
        return array(
            array(
                ['u' => "root"],
                "u",
                "u:\n\tstring\troot\n"
            )
        );
    }
}