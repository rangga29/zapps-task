<?php

namespace Modules\Item\Database\factories;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ItemFactory extends Factory
{
    protected $model = \Modules\Item\Entities\Item::class;

    public function definition()
    {
        $faker = Faker::create('id_ID');
        $item_name = ucwords($faker->unique()->words(2, true));
        $item_slug = Str::slug($item_name, '-');
        return [
            'item_name' => $item_name,
            'item_slug' => $item_slug,
            'item_price' => $faker->numberBetween(1000000, 10000000),
            'item_purchase_date' => Carbon::parse($faker->dateTimeBetween('-1 month', 'now'))->format('Y-m-d'),
            'item_include' => $faker->sentence(),
            'item_image' => 'default-item.png',
            'item_description' => $faker->sentence()
        ];
    }
}

