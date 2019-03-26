<?php

namespace ArgsParserTests\dataProvider;

class ForParse
{
    public static function preparedForParse()
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
}