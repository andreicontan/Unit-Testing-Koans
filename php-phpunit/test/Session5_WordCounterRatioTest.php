<?php

use \Wordcount\WordCounter;

/**
 * Session 5: WordCounterTableTest - parameterised/table driven tests.
 * See https://phpunit.de/manual/current/en/writing-tests-for-phpunit.html#writing-tests-for-phpunit.data-providers
 */
class Session5_WordCounterRatioTest extends \PHPUnit_Framework_TestCase {

    // TODO Add the needed annotations to run this test with all examples.

    // We want to test more corner cases for the ratio. Here is a table of test cases.
    static function tableData() {
        return [
            // instructor shows this table data in slides
            [ "green", "green", 1.0 ], //
            [ "green bar green", "green", 0.66 ], //
            [ "green bar green bar", "green", 0.5 ], //
            [ "green bar green", "bar", 0.33 ] //
        ];
    }

    /**
     * @test
     * @dataProvider tableData
     */
    function shouldReturnRatioOfGivenWord($sentence, $word, $expectedRratio) {
        $counter = new WordCounter($sentence);
        $this->assertEquals($expectedRratio, $counter->ratioOf($word), "", 0.01);
    }
}
