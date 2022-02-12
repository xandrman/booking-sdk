<?php

namespace Xandrman\BookingSdk;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class BookingSdkService implements BookingSdkInterface
{

    private const URI_PREFIX = 'api';
    private const URI_CUSTOMER = 'customer';
    private const URI_BOOKING = 'booking';

    private const STORAGE_PATH = 'booking-sdk/servers.txt';

    private string $url;

    public function __construct()
    {
        $this->url = $this->getStorageUrl() ?: $this->getConfigUrl();
        $this->url .=  '/' . self::URI_PREFIX . '/';
    }

    private function getStorageUrl(): ?string
    {
        if (Storage::exists(self::STORAGE_PATH)) {
            $servers_from_storage = explode("\n", trim(Storage::get(self::STORAGE_PATH)));
            if (count($servers_from_storage)) {
                return $servers_from_storage[0];
            }
        }
        return null;
    }

    private function getConfigUrl(): string
    {
        return config('booking.url', 'http://127.0.0.1:8000');
    }

    public function bookingIndex(): array
    {
        return Http::get($this->url . self::URI_BOOKING)->json();
    }

    public function bookingStore(array $attributes): array
    {
        return Http::post($this->url . self::URI_BOOKING, $attributes)->json();
    }

    public function bookingShow(int $id): array
    {
        return Http::get($this->url . self::URI_BOOKING . '/' . $id)->json();
    }

    public function bookingUpdate(array $attributes, int $id): array
    {
        return Http::patch($this->url . self::URI_BOOKING . '/' . $id, $attributes)->json();
    }

    public function bookingDestroy(int $id): array
    {
        return Http::delete($this->url . self::URI_BOOKING . '/' . $id)->json();
    }

    public function customerIndex(): array
    {
        return Http::get($this->url . self::URI_CUSTOMER)->json();
    }

    public function customerStore(array $attributes): array
    {
        return Http::post($this->url . self::URI_CUSTOMER, $attributes)->json();
    }

    public function customerShow(int $id): array
    {
        return Http::get($this->url . self::URI_CUSTOMER . '/' . $id)->json();
    }

    public function customerUpdate(array $attributes, int $id): array
    {
        return Http::patch($this->url . self::URI_CUSTOMER . '/' . $id, $attributes)->json();
    }

    public function customerDestroy(int $id): array
    {
        return Http::delete($this->url . self::URI_CUSTOMER . '/' . $id)->json();
    }
}