<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ArticleNews;
use Illuminate\Database\Eloquent\Relations\HasMany; 
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'icon',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function articles(): HasMany // Perbaikan di sini
    {
        return $this->hasMany(ArticleNews::class); // Pastikan model News sudah di-import
    }

    public function news() {
        return $this->hasMany(ArticleNews::class, 'category_id'); 
    }
    
}
