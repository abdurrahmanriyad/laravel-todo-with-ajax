<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
        return view('list');
    }

    public function create(Request $request)
    {
        Item::create([
            'item' => $request->listText
        ]);
        return 'Done';
    }
}
