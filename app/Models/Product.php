<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\DTO\products\CreateRequestDTO;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'category',
    ];

    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public static function staticCreate(CreateRequestDTO $dto): Product
    {
        $product = new self();

        $product->setName($dto->name);
        $product->setDescription($dto->description);
        $product->setCategory($dto->category);

        return $product;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }
}
