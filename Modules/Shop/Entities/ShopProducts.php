<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\UuidTrait;
class shop_products extends Model
{
    use HasFactory,UuidTrait;

    protected $table = 'shop_products';

    protected $fillable = [
        'user_id',
        'sku',
        'type',
        'name',
        'slug',
        'price',
        'sale_price',
        'status',
        'stock_status',
        'manage_stock',
        'publish_date',
        'excerpt',
        'body',
        'featured_image',
        




        
    ];

    public const DRAFT = 'DRAFT';
    public const ACTIVE = 'ACTIVE';
    public const INACTIVE = 'INACTIVE';

    public const STATUSES = [
        self::DRAFT => 'Draft',
        self::ACTIVE => 'Active',
        self::INACTIVE => 'Inactive',

    ];

    public const STATUS_IN_STOCK = 'STATUS_IN_STOCK';
    public const STATUS_OUT_STOCK = 'STATUS_OUT_STOCK';

    public const STOCK_STATUSES = [
        self::STATUS_IN_STOCK => 'In Stock',
        self::STATUS_OUT_STOCK  => 'Out of Stock',
        

    ];

    public const SIMPLE = 'SIMPLE';
    public const CONFIGURABLE = 'CONFIGURABLE';
    public const TYPES = [
        self::SIMPLE => 'Simple',
        self::CONFIGURABLE  => 'Configurable',

    ];




    
    
    protected static function newFactory()
    {
        return \Modules\Shop\Database\factories\ShopProductsFactory::new();
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
 
}
