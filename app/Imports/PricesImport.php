<?php

namespace App\Imports;

use App\Models\Price;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
class PricesImport implements ToModel 
{
    
    public function model(array $row)
    {
        return new Price([
            //
            /*  'compay_name', 'product_name','order_price','time_effect', 'price_khr', 'price_usd', 'status', 'Is_deleted', */
            'compay_name' => $row[0],
            'product_name' => $row[1],
            'order_price' => $row[2],
            'time_effect' => $row[3],
            'price_khr' => $row[4],
            'price_usd' => $row[5],
            'status' => $row[6],
            'Is_deleted' => $row[7],
        ]);
        
    }
    
}
