<?php

namespace Xandrman\BookingSdk;

use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;


class CustomerController extends BaseController
{
    private BookingSdkInterface $service;

    public function __construct(BookingSdkInterface $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        try {
            $result = $this->service->customerIndex();
            $customers =  $result['result']['customers'];
        } catch (Exception $e) {
            return view('booking-sdk::error.index')->withErrors([$e->getMessage()]);
        }
        return view('booking-sdk::customer.index', compact('customers'));
    }

    public function create(): View
    {
        return view('booking-sdk::customer.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->except('_token');
        try {
            $result = $this->service->customerStore($attributes);
        } catch (Exception $e) {
            return view('booking-sdk::error.index')->withErrors([$e->getMessage()]);
        }
        if (array_key_exists('result', $result)) {
            return response()->redirectTo(route('customer.index'));
        } else {
            return back()->withErrors($result['errors'])->withInput();
        }
    }
}