<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
        $data['items'] = Item::all();
        return view('list', $data);
    }

    public function create(Request $request)
    {
        Item::create([
            'item' => $request->listText
        ]);
        return 'Done';
    }

    public function destroy(Request $request)
    {
        Item::destroy($request->itemId);
    }
}
