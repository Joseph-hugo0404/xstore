<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::orderBy('last_name')
            ->orderBy('first_name')->get();

        return response()->json([
            'customers' => $customers
        ]);
    }

    public function show(Customer $customer) {
        return response()->json($customer);
    }

    public function store(Request $request) {
        $request->validate([
            'last_name' => 'string|required',
            'first_name' => 'string|required',
            'address' => 'string|required',
            'phone' => 'string|required',
            'credit_limit' => 'numeric|required',
        ]);

        $customer = Customer::create($request->all());

        return response()->json($customer);
    }

    public function update(Customer $customer, Request $request) {
        $customer->update($request->all());

        return response()->json($customer);
    }

    public function destroy(Customer $customer) {
        $customer->delete();
        return response()->json(['message'=>'Customer has been deleted.']);
    }
}
