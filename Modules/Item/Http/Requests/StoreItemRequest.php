<?php

namespace Modules\Item\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreItemRequest extends FormRequest
{
    public function rules()
    {
        return [
            'item_name' => ['required', Rule::unique('items', 'item_name')],
            'item_slug' => ['nullable'],
            'item_price' => ['required', 'numeric'],
            'item_purchase_date' => ['required', 'date_format:Y-m-d'],
            'item_include' => ['nullable'],
            'item_image' => ['nullable'],
            'item_description' => ['nullable']
        ];
    }

    public function messages()
    {
        return [
            'item_name.required' => 'Nama Barang Harus Diisi',
            'item_name.unique' => 'Nama Barang Sudah Digunakan',
            'item_price.required' => 'Harga Barang Harus Diisi',
            'item_price.numeric' => 'Harga Barang Harus Berupa Angka',
            'item_purchase_date.required' => 'Tanggal Beli Barang Harus Diisi',
            'item_purchase_date.date_format' => 'Tanggal Beli Barang Harus Berformat Y-m-d'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
