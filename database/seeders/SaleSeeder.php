<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Region;
use App\Models\Salesperson;
use App\Models\Sale;
use Carbon\Carbon;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $salesData = [
            [
                'date' => '2023-10-11',
                'product' => 'Headphones',
                'category' => 'Accessories',
                'region' => 'East',
                'salesperson' => 'Ethan',
                'units_sold' => 19,
                'unit_price' => 1169
            ],
            [
                'date' => '2023-06-05',
                'product' => 'Laptop',
                'category' => 'Electronics',
                'region' => 'North',
                'salesperson' => 'Bob',
                'units_sold' => 14,
                'unit_price' => 1649
            ],
        ];

        foreach ($salesData as $data) {
            $product = Product::where('name', $data['product'])->first();
            $region = Region::where('name', $data['region'])->first();
            $salesperson = Salesperson::where('name', $data['salesperson'])->first();

            if ($product && $region && $salesperson) {
                Sale::create([
                    'sale_date' => Carbon::parse($data['date']),
                    'product_id' => $product->id,
                    'region_id' => $region->id,
                    'salesperson_id' => $salesperson->id,
                    'units_sold' => $data['units_sold'],
                    'unit_price' => $data['unit_price'],
                    'total_sales' => $data['units_sold'] * $data['unit_price'],
                ]);
            }
        }
    }
}