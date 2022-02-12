<?php

namespace Xandrman\BookingSdk;

use Illuminate\Support\Facades\Http;

class BookingSdkService implements BookingSdkInterface
{

    private const URI_PREFIX = 'api';
    private const URI_CUSTOMER = 'customer';
    private const URI_BOOKING = 'booking';

    private string $url;

    public function __construct()
    {
        $this->url = config('booking.url', 'http://127.0.0.1:8000') . '/' . self::URI_PREFIX . '/';
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