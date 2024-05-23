<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Catalog extends Model
{
    use HasFactory;
    protected $fillable = [
        'category', "title", 'price',
        'count', 'content', 'image',
        'created_at', 'updated_at',
        ];
    protected $table = 'catalog';

    public function GetCardById($id) :Collection {
        return Catalog::query()->where('id', $id)->get();
    }
    public function GetCardsWithFilters($request) :Collection {
        return Catalog::query()
            ->when($request->input('search'), function($query, $search) {
                $query->where('title', 'like', "%{$search}%");
            })
            ->when($request->input('category'), function($query, $category) {
                $query->where('category', $category);
            })
            ->get(['id','category', 'title', 'price', 'image']);
    }

    protected function content(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => json_decode($value),
            set: fn (array $value) => json_encode($value),
        );
    }
}
