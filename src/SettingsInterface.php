<?php

namespace Xandrman\BookingSdk;

interface SettingsInterface
{
    public function getCurrentUrl(): string;
    public function setUrl(string $url): void;
    public function getUrls(): array;
    public function getStorageUrls(): array;
    public function addStorageUrl(string $url): void;
    public function destroyStorageUrl(string $url): void;
}