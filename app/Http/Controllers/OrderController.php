<?php

namespace App\Http\Controllers;

use App\Models\_Order;
use App\Models\Customer;
use App\Models\DetailOrder;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = _Order::select('customers.firstname', 'customers.document', '_orders.id', '_orders.total', '_orders.dateorder', '_orders.status')
            ->join('customers', '_orders.id_customer', '=', 'customers.id')
            ->get();


        return view("layouts\orders\index", compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $customers = Customer::all();
        $products = Product::all();
        $dateorder = Carbon::now();
        $dateorder = $dateorder->format('Y-m-d');
        return view("layouts\orders\create", compact('products', 'customers', 'dateorder'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = _Order::create([
            'dateorder' => Carbon::now()->toDateTimeString(),
            'total' => $request->total,
            'route' => "Por hacer",
            'id_customer' => Customer::find($request->customer)->id,
            'status' => 1, // Aquí establecemos el valor del campo 'status'
            'registerby' => Auth::id(), // Aquí establecemos el valor del campo 'registerby'
        ]);

        $total = 0;

        $rawProductId = $request->id_product;
        $rawAmount = $request->amount;

        // Verifica si $rawProductId y $rawAmount no son nulos y si son arrays
        if (
            !is_null($rawProductId) && is_array($rawProductId) &&
            !is_null($rawAmount) && is_array($rawAmount)
        ) {
            // Crear detalles de la orden
            $total = 0; // Inicializar el total fuera del ciclo
            for ($i = 0; $i < count($rawProductId); $i++) {
                $product = Product::find($rawProductId[$i]);
                $amount = $rawAmount[$i];
                $subtotal = $product->price * $amount;

                $order->details_orders()->create([
                    'amount' => $amount,
                    'subtotal' => $subtotal,
                    'id_product' => $product->id,
                ]);

                $total += $subtotal; // Sumar al total en cada iteración
            }

            // Asignar el total después de agregar todos los detalles de la orden
            $order->total = $total;
        } else {
            // Manejar el caso cuando $rawProductId o $rawAmount es nulo
            // Puedes lanzar una excepción, enviar un mensaje de error, etc.
            // Aquí puedes agregar tu lógica según tu requerimiento
        }
        $order->save();

        return redirect()->route("order.index")->with("success", "The orders has been created.");
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = _Order::find($id);
        $customer = Customer::where("id", $order->id_customer)->first();
        $details = DetailOrder::with('product')
            ->where('detailsorders.id__order', '=', $id)
            ->get();

        return view("order.show", compact("order", "customer", "details"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(_Order $order)
    {
        $order->delete();
        return redirect()->route("order.index")->with("success", "The order has been deleted.");
    }

    public function cambioestadoorder(Request $request)
    {
        $order = _Order::find($request->order_id);
        $order->status = $request->status;
        $order->save();
    }
}
