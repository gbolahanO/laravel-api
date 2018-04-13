<?php

namespace App\Http\Controllers;

use App\Customer;
use Validator;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }
    public function show($id)
    {
        $customer = Customer::find($id);
        return response()->json($customer);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'first_name' =>'required',
            'last_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required'
        ]);
        if ($validator->fails()) {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        }
        $customer = Customer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state
        ]);

        // return response("Success: Customer Added", 200);
        return response()->json($customer);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [ 
            'first_name' =>'required',
            'last_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required'
        ]);

        if ($validator->fails()) {
            $response = [ 'response' => $validator->messages(), 'success' => false ];
            return $response;
        }

        $customer = Customer::findOrFail($id);

        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->save();
    
        // return response("Success: Customer Updated", 200);
        return response()->json($customer);
    }

    public function destroy($id) 
    {
        Customer::destroy($id);
        // return response("Success: Customer Deleted", 200);
        $response = [ 'response' => 'Customer deleted', 'success' => true ];
        return $response;
    }
}
