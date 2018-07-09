<?php

require_once 'WordCounter.php';

/**
 * Session 3: WordCounterFileTest - Fixtures.
 * See https://phpunit.de/manual/current/en/fixtures.html
 * See https://phpunit.de/manual/current/en/appendixes.annotations.html
 */
class Session3_WordCounterFileTest extends \PHPUnit_Framework_TestCase {

    // write a real test, with a test file (trainer should show that method)

    /** @test */
    function shouldReturnCountOfWords() {
        $file = "tmp";
        file_put_contents($file, "Keep the bar green to keep the code clean.");

        $counter = WordCounter::fromFile($file);
        $this->assertEquals(9, $counter->numberOfWords());

        unlink($file);
    }

    // problem that delete is not called in case of failure, better use Before/After
    // the code is the same as shown, just moved to different methods

    const TEST_FILE = "FileWordCounterTest.tmp";

    /** @before */
    function createFreshTestFileForEachTest() {
        file_put_contents(self::TEST_FILE,
            "Keep the bar green to keep the code clean.");
    }

    /** @after */
    function deleteTestFile() {
        $this->assertTrue(unlink(self::TEST_FILE));
    }

    /** @test */
    function shouldReturnCountOfWordsBetter() {
        $counter = WordCounter::fromFile(self::TEST_FILE);
        $this->assertEquals(9, $counter->numberOfWords());
    }

    // add second test, reuse Before and After 
    // (also repeat $this->assert from previous lession)

    /** @test */
    function shouldVerifyContainmentOfWord() {
        $counter = WordCounter::fromFile(self::TEST_FILE);
        $this->assertTrue($counter->containsWord("bar"));
    }
}
