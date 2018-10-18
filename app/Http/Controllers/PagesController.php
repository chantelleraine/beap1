<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to BEAP!';
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function dashboard(){
        $title = 'dashboard';
        return view('pages.dashboard')->with('title', $title);
    }

    public function calamities(){
        $title = 'Add a calamity';
        return view('pages.calamityposts')->with('title', $title);
    }

    public function illustrations(){
        $data = array(
            'title' => 'Modify calamity',
            'illustrations' => ['Web Design', 'Programming', 'Thesis']
        );
        return view('pages.illustrations')->with($data);
    }
}
