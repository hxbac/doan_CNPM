<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ConfigKey;
use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /**
     * Show config website
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index() {
        $configs = Config::all()->keyBy('key');
        return view('admin.config.index', [
            'slides' => json_decode($configs[ConfigKey::SLIDE]->value),
            'banners' => json_decode($configs[ConfigKey::BANNER]->value),
        ]);
    }

    /**
     * Handle update slide for home page
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function slide(Request $request) {
        $slideRecord = Config::query()
            ->where('key', ConfigKey::SLIDE)
            ->firstOrFail();
        $slideConfig = json_decode($slideRecord->value);
        foreach ($slideConfig as $key => $item) {
            $item->title = $request->input('title-slide-'. $key);
            $item->content = $request->input('content-slide-'. $key);
            if ($request->hasFile('slide-image-'. $key)) {
                $item->image = $this->uploadFile($request->file('slide-image-'. $key), 'slide');
            }
        }
        $slideRecord->value = json_encode($slideConfig);
        $slideRecord->save();
        return redirect()->route('admin.config.index');
    }

    /**
     * Handle update banner for home page
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function banner(Request $request) {
        $bannerRecord = Config::query()
            ->where('key', ConfigKey::BANNER)
            ->firstOrFail();
        $bannerConfig = json_decode($bannerRecord->value);
        foreach ($bannerConfig as $key => $item) {
            $item->title = $request->input('title-banner-'. $key);
            if ($request->hasFile('banner-image-'. $key)) {
                $item->image = $this->uploadFile($request->file('banner-image-'. $key), 'banner');
            }
        }
        $bannerRecord->value = json_encode($bannerConfig);
        $bannerRecord->save();
        return redirect()->route('admin.config.index');
    }
}
