<?php

namespace App\Http\Controllers;

use \App\Deck;
use Illuminate\Http\Request;

/**
 * Class TestOneController
 * @package App\Http\Controllers
 */
class TestOneController extends Controller
{

    /**
     * @var Deck
     */
    protected $deck;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Deck $deck
    )
    {
        $this->deck = $deck;
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {

        if(!$request->session()->has('shuffledDeck')){
            $shuffledDeck = $this->deck->getShuffled();
            $request->session()->put('shuffledDeck', $shuffledDeck);
        }

        return view('test_one.index', [
            'shuffledDeck' => $request->session()->get('shuffledDeck'),
            'suits' => $this->deck->getSuits(),
            'values' => $this->deck->getValues(),
            'selected_suit' => ($request->session()->has('suit'))?$request->session()->get('suit'):'',
            'selected_value' => ($request->session()->has('value'))?$request->session()->get('value'):'',
            'deck' => $this->deck
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function draft(Request $request) {
        if(!$request->session()->has('shuffledDeck')){
            $shuffledDeck = $this->deck->getShuffled();
            $request->session()->put('shuffledDeck', $shuffledDeck);
        }
        else {
            $shuffledDeck = $request->session()->get('shuffledDeck');
            if($shuffledDeck == []){
                $shuffledDeck = $this->deck->getShuffled();
            }
            else {
                array_shift($shuffledDeck);
            }
            $request->session()->put('shuffledDeck', $shuffledDeck);
        }

        if($request->session()->get('suit').$request->session()->get('value') == $shuffledDeck[0]){
            return redirect('/test1/done');
        }

        return redirect('/test1/');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function choose(Request $request) {
        $request->session()->put($request->all());
        return redirect('/test1/');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function reset(Request $request) {
        $request->session()->flush();
        return redirect('/test1/');
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function done(Request $request) {
        return view('test_one.done', [
            'shuffledDeck' => $request->session()->get('shuffledDeck'),
            'suits' => $this->deck->getSuits(),
            'values' => $this->deck->getValues(),
            'selected_suit' => ($request->session()->has('suit'))?$request->session()->get('suit'):'',
            'selected_value' => ($request->session()->has('value'))?$request->session()->get('value'):'',
            'deck' => $this->deck
        ]);
    }
}
