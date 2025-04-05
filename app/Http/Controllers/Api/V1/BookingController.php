<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\V1\StoreBookingRequest;
use App\Http\Requests\V1\UpdateBookingRequest;
use App\Http\Resources\V1\BookingCollection;
use App\Http\Resources\V1\BookingResource;
use App\Models\Booking;
use App\Services\V1\BookingQuery;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->all();
        $query = new BookingQuery;
        $queryItems = $query->transform($request);

        $bookings = Booking::join('customers', 'customers.id', 'bookings.customer_id')
            ->where($queryItems);

        $includeCustomer = $request->query('includeCustomer');

        if ($includeCustomer) {
            // return $includeCustomer;
            $bookings = $bookings->with('customer');
        }
        $bookings = $bookings->paginate();

        return new BookingCollection($bookings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        return new BookingResource(Booking::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        $includeCustomer = request()->query('includeCustomer');

        if ($includeCustomer) {
            return new BookingResource($booking->loadMissing('customer'));
        }

        return new BookingResource($booking);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        return $booking->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        return $booking->delete();
    }
}
