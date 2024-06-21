<?php

namespace Database\Seeders;

use App\Models\Catalog;
use App\Models\Image;
use Illuminate\Database\Seeder;


class CatalogSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Catalog::factory(5)->create();
    }
}
