<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\NewsSourceStatus;
use App\Http\Controllers\Controller;
use App\Models\NewsSource;
use App\QueryBuilders\NewsSourcesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(
        NewsSourcesQueryBuilder $newsSourcesQueryBuilder
    ): View {

        $newsSourcesList = $newsSourcesQueryBuilder->getNewsSourcesWithPagination();

        return \view('admin.newssources.index', ['newsSourcesList' => $newsSourcesList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $statuses = NewsSourceStatus::all();

        return \view('admin.newssources.create', [
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
            'url' => 'required',
        ]);

        $newssources = new NewsSource($request->except('_token'));

        if ($newssources->save()) {
            return redirect()->route('admin.newssources.index')
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
    public function edit(NewsSource $newssource)
    {
        $statuses = NewsSourceStatus::all();
        return \view('admin.newssources.edit', [
            'newssource' => $newssource,
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
    public function update(Request $request, NewsSource $newssource): RedirectResponse
    {
        $newssource = $newssource->fill($request->except('_token'));

        if ($newssource->save()) {
            return redirect()->route('admin.newssources.index')
                ->with('success', 'Источник успешно обновлен');
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
