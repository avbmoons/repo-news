<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'author',
        'status',
        'description',
        'image',
        'source_id'
    ];

    protected $casts = [
        'category_id' => 'array',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_has_news', 'news_id', 'category_id', 'id', 'id');
    }

    public function getNews(): Collection
    {
        return DB::table($this->table)->select(['id', 'title', 'author', 'status', 'description', 'created_at', 'updated_at', 'source_id'])->get();
    }

    public function getNewsById(int $id): mixed
    {
        return DB::table($this->table)->find($id, ['id', 'title', 'author', 'status', 'description', 'created_at', 'updated_at', 'source_id']);
    }
}
