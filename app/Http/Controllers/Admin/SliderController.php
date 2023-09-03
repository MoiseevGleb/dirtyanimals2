<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderStoreRequest;
use App\Http\Requests\SliderUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.slider.create');
    }

    public function edit(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $slides = glob('storage/images/slider/*');

        return view('admin.slider.edit', compact('slides'));
    }

    public function store(SliderStoreRequest $request): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        $slide = $request->validated()['slide'];

        $slideName = $slide->getClientOriginalName();
        $fullSlideName = date('d-m-Y-H-i-s') . '_' .$slideName;

        Storage::putFileAs('images/slider', $slide, $fullSlideName);

        return redirect()->route('admin.slider.edit')->withMessage('Вы добавили слайд');
    }

    public function update(SliderUpdateRequest $request, $slide): RedirectResponse
    {
        $newSlide = $request->validated()['slide'];

        $slideName = $newSlide->getClientOriginalName();
        $fullSlideName = date('d-m-Y-H-i-s') . '_' . $slideName;

        Storage::delete('images/slider/' . $slide);
        Storage::putFileAs('images/slider', $newSlide, $fullSlideName);

        return back()->withMessage('Вы редактировали слайд');
    }

    public function destroy($slide): RedirectResponse
    {
        Storage::delete('images/slider/' . $slide);

        return back()->withMessage('Вы удалили слайд');
    }
}
