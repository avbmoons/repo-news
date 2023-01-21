<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;

trait NewsTrait
{

    public static function getNews(): array
    {
        return News::newsGen();
    }

    public static function getNewsId($id): ?array
    {
        foreach (static::getNews() as $news) {
            if ($news['id'] == $id) {
                return $news;
            }
        }
        return null;
    }
}
