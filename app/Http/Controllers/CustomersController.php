<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        // $data = [
        //     'id' => $customers->id,
        //     'first_name' => $customers->first_name,
        //     'last_name' => $customers->last_name,
        //     'phone' => $customers->phone,
        //     'address' => $customers->address,
        //     'city' => $customers->city,
        //     'state' => $customers->state
        // ];
        return response()->json($customers);
    }
    public function show($id)
    {
        $customer = Customer::find($id);
        return response()->json($customer);
    }

    public function store()
    {
        $this->validate(request(), [
            'first_name' =>'required',
            'last_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required'
        ]);
        $customer = Customer::create([
            'first_name' => request()->first_name,
            'last_name' => request()->last_name,
            'phone' => request()->phone,
            'address' => request()->address,
            'city' => request()->city,
            'state' => request()->state
        ]);

        return response("Success: Customer Added", 200);
    }
}
