<?php declare(strict_types=1);
/**
 * Created by Thong Truong (Tom)
 * Email: thong.truong@MadWireMedia.com
 * Date: 2019-06-10
 * Time: 09:45
 */

function parseString(int $numOfRepeat, string $string) : string {
    $result = "";

    for($i = 0; $i < $numOfRepeat; $i++) {
        $result .= $string;
    }

    return $result;
}

function stringDecoder(string $string) : string {
    $decodedString = "";

    if(preg_match("/\[[0-9a-zA-Z]+\[/", $string) === 0) {
        preg_match_all("/\d+\[[a-zA-Z]+\]/", $string, $encodedArray);

        foreach($encodedArray[0] as $encodedString) {
            $numOfRepeat = substr($encodedString, 0, strpos($encodedString, "["));

            $repeatString = substr($encodedString, strpos($encodedString, "[") + 1);
            $repeatString = substr($repeatString, 0, -1);

            $decodedString .= parseString(intval($numOfRepeat), $repeatString);
        }
    } else {
        preg_match_all("/\d+\[[a-zA-Z]+\]/", $string, $encodedArray);

        foreach($encodedArray[0] as $encodedString) {
            $subString = stringDecoder($encodedString);
            $string = str_replace($encodedString, $subString, $string);
        }

        $decodedString = stringDecoder($string);
    }

    return $decodedString;
}

echo stringDecoder("3[a]2[bc]") . "\n";

echo stringDecoder("3[a2[c]]") . "\n";

echo stringDecoder("2[abc]3[cd]ef" . "\n");