<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contracts\DeckInterface;

/**
 * Class Deck
 * @package App
 */
class Deck extends Model implements DeckInterface
{

    /**
     * @var array
     */
    private $suits = ['H','S','D','C'];

    /**
     * @var array
     */
    private $values = ['1','2','3','4','5','6','7','8','9','10','J','Q','K'];

    /**
     * @var array
     */
    private $deck = [];

    /**
     * Create Deck
     */
    protected function create() {
        foreach ($this->suits as $suit){
            foreach ($this->values as $value){
                $this->deck[] = $suit.$value;
            }
        }
    }

    /**
     * @return array|mixed
     */
    public function get() {
        $this->create();
        return $this->deck;
    }

    /**
     * @return mixed|void
     */
    protected function shuffle() {
        $this->create();
        shuffle($this->deck);
    }

    /**
     * @return array|mixed
     */
    public function getShuffled() {
        $this->shuffle();
        return $this->deck;
    }

    /**
     * @return array
     */
    public function getSuits() {
        return $this->suits;
    }

    /**
     * @return array
     */
    public function getValues() {
        return $this->values;
    }

    /**
     * @param $shuffledDeck
     * @return float|int
     */
    public function getStat($shuffledDeck){
        return number_format(((1-count($shuffledDeck)/(count($this->suits)*count($this->values))) * 100),2);
    }
}
