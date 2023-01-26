<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\NewsTrait;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{

    use NewsTrait;

    public function index(): View
    {
        $news = NewsTrait::getNews();

        return \view('news.index')->with('news', $news);
    }

    public function show(int $id): View
    {
        $news = NewsTrait::getNewsId($id);
        return \view('news.show', [$id])->with('news', $news);
    }
}
