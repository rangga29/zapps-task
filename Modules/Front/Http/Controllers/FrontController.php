<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class FrontController extends Controller
{
    public function getAllData() {
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])->get('http://zapps-task.test/api/items');

            if($response->status() != 200) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi Kesalahan',
                    'statusCode' => $response->status()
                ], $response->status());
            }

            return $response->json();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getOneData($slug) {
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])->get('http://zapps-task.test/api/items/' . $slug);

            if($response->status() != 200) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi Kesalahan',
                    'statusCode' => $response->status()
                ], $response->status());
            }

            return $response->json();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function sendData() {
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])->post('http://zapps-task.test/api/items', [
                'item_name' => 'Tes Barang 123',
                'item_price' => '1230000',
                'item_purchase_date' => '2023-02-13',
                'item_include' => 'lorem ipsum',
                'item_image' => 'default-item.jpg'
            ]);

            if($response->status() != 201) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi Kesalahan',
                    'statusCode' => $response->status()
                ], $response->status());
            }

            return $response->json();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
