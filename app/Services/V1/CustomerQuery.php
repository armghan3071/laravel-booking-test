<?php

namespace App\Services\V1;

use Illuminate\Http\Request;

class CustomerQuery {
    protected $allowedParams = [
        "name" => ['eq'],
        "address" => ['eq'],
        "city" => ['eq'],
        "province" => ['eq'],
        'cap' => ['eq', 'gt', 'lt'],
    ];

    protected $operatorMap = [
        'eq' => "=",
        'gt' => ">",
        'gte' => ">=",
        'lt' => "<",
        'lte' => "<=",
    ];

    public function transform(Request $req){
        $query = [];

        foreach ($this->allowedParams as $param => $operators) {
           $q = $req->query($param);

           if(!isset($q)) continue;

           foreach ($operators as $operator) {
            if(isset($q[$operator])){
                $query[] = [$param, $this->operatorMap[$operator], $q[$operator]];
            }
           }
        }
        return $query;
    }
}
