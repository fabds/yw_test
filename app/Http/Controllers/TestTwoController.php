<?php

namespace App\Http\Controllers;

use App\Sentence;
use Illuminate\Http\Request;

/**
 * Class TestTwoController
 * @package App\Http\Controllers
 */
class TestTwoController extends Controller
{

    /**
     * @var Sentence
     */
    protected $sentence;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Sentence $sentence
    )
    {
        $this->sentence = $sentence;
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        return view('test_two.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function analyze(Request $request){
        $sentence = $request->get('sentence');
        $analysis = $this->sentence->analyze($sentence);
        $sentence_object = $this->sentence;

        return view('test_two.analyze' , ['sentence' => $sentence, 'analysis' => $analysis, 'sentence_object' => $sentence_object]);
    }
}
