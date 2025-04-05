<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;

class ExportController extends Controller
{
    /**
     * Export customers to CSV and return the downloadable link.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function exportCustomers()
    {

        $fileName = 'customers_'.now()->format('Y_m_d_H_i_s').'.csv';
        $filePath = storage_path('app/public/'.$fileName);

        $handle = fopen($filePath, 'w');

        fputcsv($handle, [
            'ID',
            'Name',
            'Email',
            'Address',
            'City',
            'Province',
            'CAP',
        ]);

        $customers = Customer::all();

        foreach ($customers as $customer) {
            fputcsv($handle, [
                $customer->id,
                $customer->name,
                $customer->email,
                $customer->address,
                $customer->city,
                $customer->province,
                $customer->cap,
            ]);
        }

        fclose($handle);

        $url = Storage::url($fileName);

        return response()->json([
            'message' => 'CSV file created successfully.',
            'download_link' => url($url),
        ]);
    }

    /**
     * Export customers to CSV and return the downloadable link.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function exportBookings()
    {

        $fileName = 'bookings_'.now()->format('Y_m_d_H_i_s').'.csv';
        $filePath = storage_path('app/public/'.$fileName);

        $handle = fopen($filePath, 'w');

        fputcsv($handle, [
            'Booking ID',
            'Customer Name',
            'Email',
            'Address',
            'City',
            'Province',
            'CAP',
            'Booking Date',
            'Customer ID',
        ]);

        $bookings = Booking::with('customer')
            ->get();

        foreach ($bookings as $booking) {
            fputcsv($handle, [
                $booking->id,
                $booking->customer->name,
                $booking->customer->email,
                $booking->customer->address,
                $booking->customer->city,
                $booking->customer->province,
                $booking->customer->cap,
                $booking->booking_date,
                $booking->customer->id,
            ]);
        }

        fclose($handle);

        $url = Storage::url($fileName);

        return response()->json([
            'message' => 'CSV file created successfully.',
            'download_link' => url($url),
        ]);
    }
}
