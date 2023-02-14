<?php

namespace Modules\Item\Http\Controllers;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Item\Entities\Item;
use Modules\Item\Http\Requests\StoreItemRequest;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        if($items->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data Barang Tidak Ditemukan'
            ], 404);
        }
        return response()->json([
            'success' => true,
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('item::create');
    }

    public function store(StoreItemRequest $request)
    {
        $validateData = $request->validated();

        if($validateData) {
            $validateData['item_slug'] = SlugService::createSlug(Item::class, 'item_slug', $validateData['item_name']);
            Item::create($validateData);

            return response()->json([
                'item' => $validateData,
                'success' => true,
                'message' => 'Barang Berhasil Ditambahkan'
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'error' => $request->errors()
            ], 400);
        }
    }

    public function show(Item $item)
    {
        $data = Item::find($item);
        return response()->json([
            'success' => true,
            'item' => $item
        ]);
    }

    public function edit($id)
    {
        return view('item::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
