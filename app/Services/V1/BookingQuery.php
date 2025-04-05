<?php

namespace App\Services\V1;

use Illuminate\Http\Request;

class BookingQuery
{
    protected $allowedParams = [
        'booking_date' => ['eq'],
        'customer_email' => ['eq'],
        'customer_city' => ['eq'],
        'customer_province' => ['eq'],
        'customer_cap' => ['eq'],
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
    ];

    public function transform(Request $req)
    {
        $query = [];

        foreach ($this->allowedParams as $param => $operators) {
            $q = $req->query($param);

            if (! isset($q)) {
                continue;
            }

            if (str_contains($param, 'customer_')) {
                $param = str_replace('customer_', 'customers.', $param);
            } else {
                $param = 'bookings.'.$param;
            }

            foreach ($operators as $operator) {
                if (isset($q[$operator])) {
                    $query[] = [$param, $this->operatorMap[$operator], $q[$operator]];
                }
            }
        }

        return $query;
    }
}
