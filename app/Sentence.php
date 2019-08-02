<?php

namespace App;

use App\Contracts\SentenceInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sentence
 * @package App
 */
class Sentence extends Model implements SentenceInterface
{
    /**
     * @param $sentence
     * @return int
     */
    public function analyze($sentence) {
        $str = str_split($sentence);
        $stats['length'] = count($str);
        $str_unique = array_unique($str);
        foreach($str_unique as $e){
            $stats['els'][$e] = $this->siblings($e, $str);
        }
        return $stats;
    }

    /**
     * @param $char
     * @param $str
     * @return array
     */
    protected function siblings($char, $str){
        $els = array_keys($str,$char);
        $output = [];

        foreach($els as $el){
            if($el-1 < 0) {
                $output[$el]['before'] = 'none';
            }
            else {
                $output[$el]['before'] = $str[$el-1];
            }

            if($el+1 > count($str)-1) {
                $output[$el]['after'] = 'none';
            }
            else {
                $output[$el]['after'] = $str[$el+1];
            }
        }

        return $output;
    }

    /**
     * @param $array
     * @param $type
     * @return string
     */
    public function getStringedArray($array,$type){
        $output = [];
        foreach ($array as $element){
            $output[] = $element[$type];
        }
        return implode(',', $output);
    }

    /**
     * @param $array
     * @return int|string
     */
    public function getDistance($array){
        $keys = array_keys($array);

        $distance = '-';
        if(count($keys)>1){
            $distance = (int)max($keys) - (int)min($keys) - 1;
        }
        return $distance;
    }

}
