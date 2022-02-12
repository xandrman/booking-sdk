<?php

namespace Xandrman\BookingSdk;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
        $result = $this->service->customerIndex();
        $customers =  $result['result']['customers'];
        return view('booking-sdk::customer.index', compact('customers'));
    }

    public function create(): View
    {
        return view('booking-sdk::customer.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->except('_token');
        $result = $this->service->customerStore($attributes);
        if (array_key_exists('result', $result)) {
            return response()->redirectTo(route('customer.index'));
        } else {
            return back()->withErrors($result['errors'])->withInput();
        }
    }
}