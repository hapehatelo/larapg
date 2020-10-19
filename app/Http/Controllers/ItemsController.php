<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemsController extends Controller
{

    public function index()
    {
        $items = Item::all();
        return [
            "status"    => 'Success',
            "code"      => 200,
            "data"      => $items  
        ];
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_name'             => 'required|unique:items',
            'item_description'      => 'required',
        ]);

        if ($validator->fails()) {
           return $validator->errors();
        }

        $randcode = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $item_code = substr(str_shuffle($randcode), 0, 12);
        Item::create([
            'item_code'         => $item_code,
            'item_name'         => $request->item_name,
            'item_description'  => $request->item_description,
        ]);

        return [
            "status"    => 'Success',
            "code"      => 200,
            "data"      => [
                "item_code"         => $item_code,
                "item_name"         => $request->item_name,
                "item_description"  => $request->item_description,
            ]  
        ];
    }

    public function show($code)
    {
        $item = Item::where('item_code', $code)->first();
        return [
            "status"    => 'Success',
            "code"      => 200,
            "data"      => $item 
        ];
    }

    public function search(Request $request)
    {
        $item = Item::where('item_code', $request->q)->orWhere('item_name', 'like', "%" . $request->q . "%")->get();
        return [
            "status"    => 'Success',
            "code"      => 200,
            "data"      => $item 
        ];
    }

    public function update($code, Request $request)
    {
        $item = Item::where('item_code', $code)->first();
        $item->update([
            'item_name'         => $request->item_name,
            'item_description'  => $request->item_description,
        ]);

        return [
            "status"    => 'Success',
            "code"      => 200,
            "data"      => [
                "item_code"         => $code,
                "item_name"         => $request->item_name,
                "item_description"  => $request->item_description,
            ]  
        ];
    }

    public function destroy($code)
    {
        $item = Item::where('item_code', $code)->first();
        $item->delete();

        return [
            "status" => "success delete"
        ];
    }
}
