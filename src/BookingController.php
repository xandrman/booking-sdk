<?php

namespace Xandrman\BookingSdk;

use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;


class BookingController extends BaseController
{
    private BookingSdkInterface $service;

    public function __construct(BookingSdkInterface $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $result = $this->service->bookingIndex();
            $bookings = $result['result']['bookings'];
        } catch (Exception $e) {
            return view('booking-sdk::error.index')->withErrors([$e->getMessage()]);
        }
        return view('booking-sdk::booking.index', compact('bookings'));
    }

    public function create(Request $request): View
    {
        $customer_id = $request->get('customer_id');
        return view('booking-sdk::booking.create', compact('customer_id'));
    }

    public function store(Request $request)
    {
        $attributes = $request->except('_token');
        $attributes['from'] = Carbon::parse($attributes['from'])->format('Y-m-d H:i:s');
        $attributes['to'] = Carbon::parse($attributes['to'])->format('Y-m-d H:i:s');
        try {
            $result = $this->service->bookingStore($attributes);
        } catch (Exception $e) {
            return view('booking-sdk::error.index')->withErrors([$e->getMessage()]);
        }
        if (array_key_exists('result', $result)) {
            return response()->redirectTo(route('index'));
        } else {
            return back()->withErrors($result['errors'])->withInput();
        }
    }
}