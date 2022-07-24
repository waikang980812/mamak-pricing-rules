<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\PricingRule;
use App\Product;

class OrderController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        $products = $request->all();
        $arrItems = array();
        foreach($products as $key => $value){
            $item = array("id"=>$value['id']);
            array_push($arrItems,$item);
        }
        // $uniqItems = array_unique($arrItems);
        $uniqItemWithCount = $this->count_num_values($arrItems);
        $Total = $this->calculate_Total($uniqItemWithCount);
        return $Total;
    }

    public function count_num_values($arrItems){
        $uniqItems = array_map("unserialize", array_unique(array_map("serialize", $arrItems)));
        $newUniqItemsWithCount = array();
        foreach($uniqItems as $row){
            $count = array_count_values(array_column($arrItems, 'id'))[$row['id']];
            $row['count'] = $count;
            // array_push($uniqItems,$row);
            // $uniqItems[] = $row;
            array_push($newUniqItemsWithCount,$row);
        }
        return $newUniqItemsWithCount;
        // return 'test';
    }

    public function calculate_Total($uniqItemWithCount){
        $total = 0;
        
        foreach($uniqItemWithCount as $row){
            try{
                $product = Product::findOrFail($row['id']);
            }catch(Throwable $e){
                return $e;
            }
            
            $pricingRule = $product->PricingRules;
            if($pricingRule->min_quan <= $row['count']){
                if($pricingRule->type == "Bundle"){
                    
                    $remainder = $row['count'] % $pricingRule->min_quan;
                    $total += (($row['count'] - $remainder) * $product->price * $pricingRule->disc_rate) + ($remainder*$product->price);
                }else{
                    $total += ($row['count'] * $product->price * $pricingRule->disc_rate);
                }
            }else{
                $total += $product->price * $row['count'];
            }
        }
        return $total;
    }
    
}
