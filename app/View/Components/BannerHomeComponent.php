<?php

namespace App\View\Components;

use App\Enums\ConfigKey;
use App\Models\Config;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BannerHomeComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $configs = Config::all()->keyBy('key');
        return view('components.banner-home-component', [
            'slides' => json_decode($configs[ConfigKey::SLIDE]->value),
            'banners' => json_decode($configs[ConfigKey::BANNER]->value),
        ]);
    }
}
