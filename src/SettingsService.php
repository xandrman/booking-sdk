<?php

namespace Xandrman\BookingSdk;

use Illuminate\Support\Facades\Storage;

class SettingsService implements SettingsInterface
{

    private const STORAGE_PATH = 'booking-sdk/servers.txt';

    private array $storage_urls;

    public function __construct()
    {
        $this->storage_urls = $this->getStorageUrls();
    }

    public function getCurrentUrl(): string
    {
        return $this->storage_urls ? $this->storage_urls[0] : $this->getConfigUrl();
    }

    public function getUrls(): array
    {
        return $this->storage_urls ?: [$this->getConfigUrl()];
    }

    public function setUrl(string $url): void
    {
        $current = $this->storage_urls[0];
        $new_key = array_search($url, $this->storage_urls);
        $this->storage_urls[0] = $url;
        $this->storage_urls[$new_key] = $current;
        $this->writeStorage();
    }

    private function isStorageExists(): bool
    {
        return Storage::exists(self::STORAGE_PATH);
    }

    public function getStorageUrls(): array
    {
        return $this->isStorageExists() ? explode("\n", trim(Storage::get(self::STORAGE_PATH))) : [];
    }

    private function getConfigUrl(): string
    {
        return config('booking.url', 'http://127.0.0.1:8000');
    }

    public function addStorageUrl(string $url): void
    {
        Storage::append(self::STORAGE_PATH, $url);
    }

    public function destroyStorageUrl(string $url): void
    {
        $key = array_search($url, $this->storage_urls);
        unset($this->storage_urls[$key]);
        $this->writeStorage();
    }

    private function writeStorage(): void
    {
        count($this->storage_urls)
            ? Storage::put(self::STORAGE_PATH, implode("\n", $this->storage_urls))
            : Storage::delete(self::STORAGE_PATH);
    }
}