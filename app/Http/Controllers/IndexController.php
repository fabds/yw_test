<?php

namespace App\Http\Controllers;

/**
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{


    /**
     * @return \Illuminate\View\View
     */
    public function index(\Illuminate\Http\Request $request) {
        return view('index.index');
    }

}
