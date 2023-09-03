<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginPage(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('login');
    }

    public function showRegisterPage(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('register');
    }

    public function login(UserLoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (auth()->attempt($credentials)) {
            session()->regenerate();
            return redirect()->route('home')->withMessage('Вы успешно авторизованы');
        }
        return back()->withInput()->withMessage('Неверный логин или пароль');
    }

    public function register(UserStoreRequest $request)
    {
        $data = $request->validated();
        $user = User::query()->create($data);
        if ($user) {
            auth()->login($user);
            return redirect()->route('home')->withMessage('Вы успешно зарегистрированы');
        }
        return back()->withInput()->withMessage('Что-то пошло не так');

    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('home')->withMessage('Вы успешно вышли');
    }
}
