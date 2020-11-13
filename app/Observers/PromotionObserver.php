<?php

namespace App\Observers;

use App\Promotion;

class PromotionObserver
{
    public function creating(Promotion $promotion)
    {
        if($promotion->discount_type === Promotion::DOLLAR_AMOUNT){
            $promotion->max_value = $promotion->discount;
            return $promotion;
        }
        if($promotion->discount > 100){
            $promotion->discount = 100;
        }
    }
}
