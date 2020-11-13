<?php
namespace App\Interfaces;

use Illuminate\Support\Collection;

interface SubModel
{
    public static function getResponseData(Collection $products);
}
