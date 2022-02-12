<?php

namespace Xandrman\BookingSdk;

interface BookingSdkInterface
{
    public function bookingIndex(): array;
    public function bookingStore(array $attributes): array;
    public function bookingShow(int $id): array;
    public function bookingUpdate(array $attributes, int $id): array;
    public function bookingDestroy(int $id): array;
    public function customerIndex(): array;
    public function customerStore(array $attributes): array;
    public function customerShow(int $id): array;
    public function customerUpdate(array $attributes, int $id): array;
    public function customerDestroy(int $id): array;
}