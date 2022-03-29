<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = json_decode(file_get_contents(public_path('sku.json')));

        foreach ($products as $p)
        {
            $d = [
                'name'    => trim($p[1]),
                'barcode' => trim($p[0]),
            ];
            (new Product())->persist($d);
        }
    }
}
