<?php

namespace App\Http\Controllers;

class PagesController extends Controller {
    public function getWelcome() {
        return view('pages/welcome');
    }

    public function getCatagories(){
        return view('pages/catagories');
    }

    public function getItems(){
        return view('pages/item');
    }

    public function getCreate(){
        return view('pages/catagories/create');
    }

    public function getItemsCreate(){
        return view('pages/items/create');
    }
}