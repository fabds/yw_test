<?php

namespace App\Contracts;

/**
 * Interface SentenceInterface
 * @package App\Contracts
 */
interface SentenceInterface {

    /**
     * @param $sentence
     * @return mixed
     */
    public function analyze($sentence);

    /**
     * @param $array
     * @param $type
     * @return mixed
     */
    public function getStringedArray($array,$type);

    /**
     * @param $array
     * @return mixed
     */
    public function getDistance($array);

}