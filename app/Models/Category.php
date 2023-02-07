<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function getCategories(): Collection
    {
        return DB::table($this->table)->select(['id', 'title', 'slug', 'description', 'status', 'created_at', 'source_id'])->get();
    }

    public function getCategoryById(int $id): mixed
    {
        return DB::table($this->table)->find($id, ['id', 'title', 'slug']);
    }
}
