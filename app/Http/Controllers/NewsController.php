<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\StoreCommentRequest;
use App\Http\Resources\NewsResource;
use App\Models\News;
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

    public function getNews()
    {

        return NewsResource::collection(News::query()
            ->with('comments.user', 'user:id,name')
            ->get());
    }

    public function storeComment(StoreCommentRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        $comment = News::query()
            ->find($data['commentable_id'])
            ->comments()
            ->create($data);

        $data['user'] = User::query()->find($data['user_id'])->toArray();
        $data['created_at'] = $comment->created_at->diffForHumans();;
        unset($data['user_id']);
        unset($data['commentable_id']);

        return $data;
    }
}
