<?php

namespace Modules\Item\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Item\Entities\Item;

class ItemDatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();
        Item::factory(100)->create();
    }
}
