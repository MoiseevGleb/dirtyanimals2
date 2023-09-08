<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\StoreNewsRequest;
use App\Http\Requests\Admin\News\UpdateNewsRequest;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $news = News::query()->select(['id', 'title', 'created_at', 'updated_at'])->get();

        return view('admin.news.index', compact('news'));
    }

    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.news.create');
    }

    public function edit(News $news): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.news.edit', compact('news'));
    }

    public function store(StoreNewsRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = request()->user()->id;

        News::query()->create($data);

        return redirect()->route('admin.news.index')->withMessage('Вы создали новость');
    }

    public function update(UpdateNewsRequest $request, News $news): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = request()->user()->id;

        $request->has('show_author') ?: $data['show_author'] = 0;

        $news->update($data);

        return redirect()->route('admin.news.index')->withMessage('Вы редактировали новость');
    }

    public function destroy(News $news): RedirectResponse
    {
        $news->delete();

        return redirect()->route('admin.news.index')->withMessage('Вы удалили новость');
    }
}
