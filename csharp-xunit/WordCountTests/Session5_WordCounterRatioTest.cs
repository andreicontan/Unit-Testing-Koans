using Org.Codecop.WordCount;
using System.Collections.Generic;
using Xunit;

namespace Org.Codecop.WordCount.Tests
{
    /// <summary>Session 5: WordCounterRatioTest - parameterised/table driven tests.</summary>
    /// <seealso>"http://hamidmosalla.com/2017/02/25/xunit-theory-working-with-inlinedata-memberdata-classdata/"</seealso>
    public class Session5_WordCounterRatioTest
    {

        // TODO Add the needed annotations to run this test with all examples.
        // We want to test more corner cases for the ratio. Here is a table of test cases.
        [Theory]
        [InlineData("green", "green", 1.0)]
        [InlineData("green bar green", "green", 0.66)]
        [InlineData("green bar green bar", "green", 0.5)]
        [InlineData("green bar green", "bar", 0.33)]
        public void ShouldReturnRatioOfGivenWord(string sentence, string word, double expectedRatio)
        {
            var counter = new WordCounter(sentence);
            Assert.Equal(expectedRatio, counter.RatioOf(word), 3); // keep
        }
    }
}
