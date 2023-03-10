<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatus;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\NewsSourcesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(
        NewsQueryBuilder $newsQueryBuilder
    ): View {

        $newsList = $newsQueryBuilder->getNewsWithPagination();

        return \view('admin.news.index', [
            'newsList' => $newsList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(
        CategoriesQueryBuilder $categoriesQueryBuilder,
        NewsSourcesQueryBuilder $newsSourcesQueryBuilder,
    ): View {

        $statuses = NewsStatus::all();

        return \view('admin.news.create', [
            'categories' => $categoriesQueryBuilder->getAll(),
            'newssources' => $newsSourcesQueryBuilder->getAll(),
            'statuses' => $statuses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            // 'source_id' => 'required',
        ]);

        $news = new News($request->except('_token', 'category_id'));

        if ($news->save()) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Новость успешно добавлена');
        }
        return \back()->with('error', 'Не удалось сохранить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news, CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        $statuses = NewsStatus::all();

        return \view('admin.news.edit', [
            'news' => $news,
            'categories' => $categoriesQueryBuilder->getAll(),
            'statuses' => $statuses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news): RedirectResponse
    {
        $news = $news->fill($request->except('_token', 'category_ids'));

        if ($news->save()) {
            $news->categories()->sync((array) $request->input('category_ids'));
            return redirect()->route('admin.news.index')
                ->with('success', 'Новость успешно обновлена');
        }
        return \back()->with('error', 'Не удалось сохранить обновление');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
