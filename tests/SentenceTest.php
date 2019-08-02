<?php

use App\Sentence;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

/**
 * Class SentenceTest
 */
class SentenceTest extends TestCase
{

    /**
     * Sentence
     */
    const SENTENCE = "football vs soccer";

    /**
     * Array
     */
    const ARRAY = [2 => ['before' => 'a'],18 => ['before' => 'b']];

    /**
     * @var
     */
    protected $sentence;

    /**
     * Set up
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->sentence = new Sentence();
    }

    /**
     * Analyze
     */
    public function testAnalyze(){
        $stat = $this->sentence->analyze(self::SENTENCE);
        $this->assertIsArray($stat);
        $this->assertArrayHasKey('els', $stat);
    }

    /**
     * Get Stringed Array
     */
    public function testGetStringedArray(){
        $result = $this->sentence->getStringedArray(self::ARRAY,'before');
        $this->assertIsString($result);
        $this->assertEquals('a,b', $result);
    }

    /**
     * Get Distance
     */
    public function testGetDistance() {
        $result = $this->sentence->getDistance(self::ARRAY);
        $this->assertIsNumeric($result);
        $this->assertEquals(15, $result);
    }

}
