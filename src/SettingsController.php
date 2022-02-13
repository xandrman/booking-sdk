<?php

namespace Xandrman\BookingSdk;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Contracts\View\View;

class SettingsController extends BaseController
{

    private SettingsInterface $settings;

    public function __construct(SettingsInterface $settings)
    {
        $this->settings = $settings;
    }

    public function settings(): View
    {
        $storageUrls = $this->settings->getStorageUrls();
        return view('booking-sdk::settings.index', compact('storageUrls'));
    }

    public function changeServer(UrlRequest $request): RedirectResponse
    {
        $this->settings->setUrl($request->validated()['url']);
        return redirect()->route('index');
    }

    public function addServer(UrlRequest $request): RedirectResponse
    {
        $this->settings->addStorageUrl($request->validated()['url']);
        return redirect()->route('settings');
    }

    public function destroyServer(UrlRequest $request): RedirectResponse
    {
        $this->settings->destroyStorageUrl($request->validated()['url']);
        return redirect()->route('settings');
    }
}