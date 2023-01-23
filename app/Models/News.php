<?php

namespace App\Models;

use App\Http\Controllers\NewsTrait;

class News
{
    use NewsTrait;
    private Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }



    public static function newsGen(): array
    {
        $news = [];
        $quantityNews = 20;

        for ($i = 1; $i <= $quantityNews; $i++) {
            $news[$i] = [
                'id' => $i,
                'category_id' => \random_int(1, 5),
                'title' => \fake()->jobTitle(),
                'description' => \fake()->text(100),
                'author' => \fake()->userName(),
                'created_at' => \now()->format('d-m-Y H:i'),
            ];
        }
        return $news;
    }

    public function getNewsByCategorySlug($slug): array
    {
        $id = $this->category->getCategoryIdBySlug($slug);
        $news = [];
        foreach ($this->getNews() as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }
}
