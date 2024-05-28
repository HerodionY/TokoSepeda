<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class shop_products extends Model
{
    use HasFactory;

    protected $table = 'shop_products';

    protected $fillable = [


        
    ];
    
    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\ShopProductsFactory::new();
    }
}
