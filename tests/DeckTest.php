<?php

use App\Deck;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

/**
 * Class DeckTest
 */
class DeckTest extends TestCase
{

    /**
     * Expected Deck
     */
    const EXPECTED_DECK = ['H1','H2','H3','H4','H5','H6','H7','H8','H9','H10','HJ','HQ','HK','S1','S2','S3','S4','S5','S6','S7','S8','S9','S10','SJ','SQ','SK','D1','D2','D3','D4','D5','D6','D7','D8','D9','D10','DJ','DQ','DK','C1','C2','C3','C4','C5','C6','C7','C8','C9','C10','CJ','CQ','CK'];

    /**
     * Expected Suits
     */
    const EXPECTED_SUITS = ['H','S','D','C'];

    /**
     * Expected Values
     */
    const EXPECTED_VALUES = ['1','2','3','4','5','6','7','8','9','10','J','Q','K'];

    /**
     * Half Deck
     */
    const HALF_DECK = ['H1','H2','H3','H4','H5','H6','H7','H8','H9','H10','HJ','HQ','HK','S1','S2','S3','S4','S5','S6','S7','S8','S9','S10','SJ','SQ','SK'];

    /**
     * @var
     */
    protected $deck;

    /**
     * Set up
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->deck = new Deck();
    }

    /**
     * Test Get
     *
     * @return void
     */
    public function testGet()
    {
        $deck = $this->deck->get();
        $this->assertIsArray($deck);
        $this->assertCount(52,$deck);
        $this->assertEquals(self::EXPECTED_DECK,$deck);
    }

    /**
     * @depends testGet
     */
    public function testGetShuffled(){
        $shuffledDeck = $this->deck->getShuffled();
        $this->assertIsArray($shuffledDeck);
        $this->assertCount(52,$shuffledDeck);
        $this->assertNotEquals(self::EXPECTED_DECK,$shuffledDeck);
        $this->assertEqualsCanonicalizing(array_values(self::EXPECTED_DECK),array_values($shuffledDeck));
    }

    /**
     * Get Suits
     */
    public function testGetSuits(){
        $suits = $this->deck->getSuits();
        $this->assertIsArray($suits);
        $this->assertCount(4, $suits);
        $this->assertEquals(self::EXPECTED_SUITS,$suits);
    }

    /**
     * Get Values
     */
    public function testGetValues(){
        $values = $this->deck->getValues();
        $this->assertIsArray($values);
        $this->assertCount(13, $values);
        $this->assertEquals(self::EXPECTED_VALUES,$values);
    }

    /**
     * @depends testGet
     */
    public function testGetStats(){
        $stat = $this->deck->getStat(self::HALF_DECK);
        $this->assertIsNumeric($stat);
        $this->assertEquals(50.00,$stat);
        $stat = $this->deck->getStat($this->deck->get());
        $this->assertEquals(0.00,$stat);
        $stat = $this->deck->getStat([]);
        $this->assertEquals(100.00,$stat);
    }
}
