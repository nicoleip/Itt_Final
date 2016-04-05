<?php

namespace App\Http\Controllers;
use App\Item;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;


class ItemsController extends Controller
{
    public function index(){
        $jokes = Item::all();
        return Response::json([
            'data' => $jokes
        ], 200);
    }


    public function show($id){
        $item = Item::find($id);

        if(!$item){
            return Response::json([
                'error' => [
                    'message' => 'Item does not exist!'
                ]
            ], 404);
        }

        return Response::json([
            'data' => $item
        ], 200);
    }
}
