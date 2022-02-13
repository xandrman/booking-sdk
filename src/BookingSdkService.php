<?php

namespace Xandrman\BookingSdk;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class BookingSdkService implements BookingSdkInterface
{

    private const HTTP_TIMEOUT = 3;

    private const URI_PREFIX = 'api';
    private const URI_CUSTOMER = 'customer';
    private const URI_BOOKING = 'booking';

    private string $url;
    private PendingRequest $http_request;

    public function __construct(SettingsInterface $settings)
    {
        $this->url = $settings->getCurrentUrl();
        $this->url .=  '/' . self::URI_PREFIX . '/';
        $this->http_request = Http::timeout(self::HTTP_TIMEOUT)->acceptJson();
    }

    public function bookingIndex(): array
    {
        return $this->http_request->get($this->url . self::URI_BOOKING)->json();
    }

    public function bookingStore(array $attributes): array
    {
        return $this->http_request->post($this->url . self::URI_BOOKING, $attributes)->json();
    }

    public function bookingShow(int $id): array
    {
        return $this->http_request->get($this->url . self::URI_BOOKING . '/' . $id)->json();
    }

    public function bookingUpdate(array $attributes, int $id): array
    {
        return $this->http_request->patch($this->url . self::URI_BOOKING . '/' . $id, $attributes)->json();
    }

    public function bookingDestroy(int $id): array
    {
        return $this->http_request->delete($this->url . self::URI_BOOKING . '/' . $id)->json();
    }

    public function customerIndex(): array
    {
        return $this->http_request->get($this->url . self::URI_CUSTOMER)->json();
    }

    public function customerStore(array $attributes): array
    {
        return $this->http_request->post($this->url . self::URI_CUSTOMER, $attributes)->json();
    }

    public function customerShow(int $id): array
    {
        return $this->http_request->get($this->url . self::URI_CUSTOMER . '/' . $id)->json();
    }

    public function customerUpdate(array $attributes, int $id): array
    {
        return $this->http_request->patch($this->url . self::URI_CUSTOMER . '/' . $id, $attributes)->json();
    }

    public function customerDestroy(int $id): array
    {
        return $this->http_request->delete($this->url . self::URI_CUSTOMER . '/' . $id)->json();
    }
}