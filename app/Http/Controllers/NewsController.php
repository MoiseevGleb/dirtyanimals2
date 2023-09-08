<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\News\Comments\StoreNewsCommentRequest;
use App\Models\News;
use App\Models\NewsComment;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class NewsController extends Controller
{
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('news.index');
    }

    public function getNews(): Collection|array
    {
        $news = News::query()
            ->select('id', 'title', 'content', 'created_at', 'user_id', 'show_author')
            ->with('comments.user', 'user:id,name')
            ->get();

        return $news;
    }

    public function storeComment(StoreNewsCommentRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        $comment = NewsComment::query()
            ->create($data);

        $data['user'] = User::query()->find($data['user_id'])->toArray();
        $data['created_at'] = $comment['created_at'];
        unset($data['user_id']);

        return $data;
    }
}
