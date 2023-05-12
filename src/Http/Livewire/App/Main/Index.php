<?php

namespace AliQasemzadeh\Http\Livewire\App\Main;

use AliQasemzadeh\Models\\Article;
use AliQasemzadeh\Models\\Carousel;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $displayItems = [];

        if(config('bap.home.display-carousels')) {
            $carousels = Carousel::where('language', app()->getLocale())->orderBy('created_at', 'DESC')->take(config('bap.home.count-carousels'))->get();
            $displayItems = ['carousels' => $carousels];
        }

        if(config('bap.home.display-articles')) {
            $articles = Article::where('language', app()->getLocale())->orderBy('created_at', 'DESC')->take(config('bap.home.count-articles'))->get();
            $displayItems['articles'] = $articles;
        }

        return view('jetadmin::livewireapp.main.index', $displayItems);
    }
}
