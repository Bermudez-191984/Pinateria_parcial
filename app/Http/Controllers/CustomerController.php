<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::all();
        return view("layouts\customers\index", compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("layouts\customers\create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        $image = $request->file('image');
        $slug = Str::slug($request->name);
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('uploads/customers')) {
                mkdir('uploads/customers', 0777, true);
            }
            $image->move('uploads/customers', $imagename);
        } else {
            $imagename = "";
        }


        $customer = new Customer();
        $customer->firstname = $request->firstname;
        $customer->secondname = $request->secondname;
        $customer->lastname = $request->lastname;
        $customer->secondlastname = $request->secondlastname;
        $customer->document = $request->document;
        $customer->age = $request->age;
        $customer->email = $request->email;
        // $customer->image = $imagename;
        $customer->status = 1;
        $customer->registerby = $request->user()->id;


        $customer->save();

        return redirect()->route('customer.index')->with('successMsg', 'El registro se guardó exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::find($id);
        return view("layouts\customers.edit", compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::find($id);
        $image = $request->file('image');
        $slug = str::slug($request->name);
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('uploads/customers')) {
                mkdir('uploads/customers', 0777, true);
            }
            $image->move('uploads/customers', $imagename);
        } else {
            $imagename = $customer->image;
        }


        $customer->firstname = $request->firstname;
        $customer->secondname = $request->secondname;
        $customer->lastname = $request->lastname;
        $customer->secondlastname = $request->secondlastname;
        $customer->document = $request->document;
        $customer->age = $request->age;
        $customer->email = $request->email;
        // $customer->image = $imagename;
        $customer->status = 1;
        $customer->registerby = $request->user()->id;
        $customer->save();
        return redirect()->route('customer.index')->with('successMsg', 'El registro se actualizó exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index')->with('eliminar', 'ok');
    }

    public function cambioestadocustomer(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        $customer->status = $request->status;
        $customer->save();
    }
}