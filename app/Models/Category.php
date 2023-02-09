<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'title',
        'slug',
        'status',
        'description',
        'image',
    ];

    public function getCategories(): Collection
    {
        return DB::table($this->table)->select(['id', 'title', 'slug', 'description', 'status', 'created_at', 'updated_at'])->get();
    }

    public function getCategoryById(int $id): mixed
    {
        return DB::table($this->table)->find($id, ['id', 'title', 'slug', 'description', 'status', 'created_at', 'updated_at']);
    }

    public function getCategoryIdBySlug(int $slug): mixed
    {
        return DB::table($this->table)->find($slug, ['id']);
    }

    public function getCategoryNameBySlug(int $slug): mixed
    {
        $id = $this->getCategoryIdBySlug($slug);
        $category = $this->getCategoryById($id);
        if ($category != [])
            return DB::table($this->table)->find($slug, ['title']);
        else return null;
    }
}
