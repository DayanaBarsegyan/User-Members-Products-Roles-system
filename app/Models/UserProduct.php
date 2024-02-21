<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProduct extends Model
{

    use HasFactory;

    protected $table = 'users_products';

    protected $fillable = [
        'user_id',
        'product_id'
    ];

    public static function staticCreate(int $userId, int $productId): UserProduct
    {
        $productUserInstance = new self();

        $productUserInstance->setUserId($userId);
        $productUserInstance->setProductId($productId);

        return $productUserInstance;
    }

    public function setUserId(int $id): void
    {
        $this->user_id = $id;
    }

    public function setProductId(int $id): void
    {
        $this->product_id = $id;
    }

}
