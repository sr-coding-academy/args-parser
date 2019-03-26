<?php

namespace ArgsParserTests\dataProviders;

class DataProviderParser
{
    /**
     * prepared data to be tested for parse
     * @return array
     */
    public static function providesForParse()
    {
        /**
         * array(
         *      [
         *          expected array
         *      ],
         *           input to test
         * );
         */
        return array(
            // One argument "-u root"
            array(
                [
                    'u' => "root"
                ],
                "-u root"
            ),
            // Two Arguments
            // "-u root -d /dir/sub/"
            array(
                [
                    'u' => "root",
                    'd' => '/dir/sub/'
                ],
                "-u root -d /dir/sub/"
            ),
            // Three arguments
            // "-u root -d /dir/sub/"
            array(
                [
                    'u' => "root",
                    'd' => '/dir/sub/',
                    'p' => "1024"
                ],
                "-u root -d /dir/sub/ -p 1024"
            ),
            // Five arguments
            // "-u root -d /dir/sub/ -p 1024 -f file.txt,script.sh -i 1,5,-6,17"
            array(
                [
                    'u' => "root",
                    'd' => '/dir/sub/',
                    'p' => "1024",
                    'f' => "file.txt,script.sh",
                    'i' => "1,5,-6,17"
                ],
                "-u root -d /dir/sub/ -p 1024 -f file.txt,script.sh -i 1,5,-6,17"
            ),
        );
    }

    /**
     * prepared data to be tested for ask
     * @return array
     */
    public static function providesForAsk()
    {
        /**
         * array(
         *      [
         *          delivered array of parsed inputs for register
         *      ],
         *      "asked flag",
         *      "returned string to echo"
         * );
         */
        return array(
            // asked for all Users with only one user in register
            array(
                [
                    'u' => "root"
                ],
                "u",
                "u:\n\tstring\troot\n"
            ),
            // asked for all Users with two users in register
//            array(
//                [
//                    'u' => "root",
//                    'u' => "ralph"
//                ],
//                "u",
//                "u:\n
//                    \tstring\troot\n
//                    \tstring\tralph\n"
//            ),
        );
    }
}