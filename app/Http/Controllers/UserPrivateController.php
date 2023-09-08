<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserUpdateRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserPrivateController extends Controller
{
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('user.private.index');
    }

    public function edit(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $user = auth()->user();

        return view('user.private.edit', compact('user'));
    }

    // TODO: добавить возможность сбросить аватарку до дефолтной и добавить возможность выбора времени для выкладывания новости

    public function update(UserUpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $pfpName = $data['pfp']->getClientOriginalName();
        $datetime = (new \DateTime("now", new \DateTimeZone('Europe/Moscow')))->format('d-m-Y-H-i-s');
        $fullPfpName = $datetime . '_' . $pfpName;

        if ($request->hasFile('pfp')) {

            if ($request->user()->pfp !== 'none.jpg') {
                Storage::delete('images/avatars/' . $request->user()->pfp);
            }

            $pfpPath = Storage::putFileAs('images/avatars/', $data['pfp'], $fullPfpName);
            $data['pfp'] = basename($pfpPath);
        }

        $request->user()->update($data);

        return redirect()->route('user.private.index');
    }
}
