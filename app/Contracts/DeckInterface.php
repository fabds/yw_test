<?php

namespace App\Contracts;

/**
 * Interface DeckInterface
 * @package App\Contracts
 */
interface DeckInterface {

    /**
     * @return mixed
     */
    public function get();

    /**
     * @return mixed
     */
    public function getShuffled();

    /**
     * @return mixed
     */
    public function getSuits();

    /**
     * @return mixed
     */
    public function getValues();

    /**
     * @param $shuffledDeck
     * @return mixed
     */
    public function getStat($shuffledDeck);

}