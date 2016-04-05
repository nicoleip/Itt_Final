<?php

namespace App\Http\Controllers;
use App\Item;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;


class ItemsController extends Controller
{
    public function index(){
        $items = Item::all();
        return Response::json([
            'data' => $this->transformCollection($items)
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
            'data' => $this->transform($item)
        ], 200);
    }


    private function transformCollection($items){
        return array_map([$this, 'transform'], $items->toArray());
    }

    private function transform($item)
    {
        return [
            'name' => $item['name'],
            'price' => $item['price'],
            'description' => $item['description']
        ];
    }
    }
