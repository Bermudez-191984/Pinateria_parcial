@extends('layouts.app')

@section('title', 'Crear Order')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        </div>
    </section>
    @include('layouts.partial.msg')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <h3>@yield('title')</h3>
                        </div>
                        <form method="POST" action="{{ route('order.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="customer">Customer <strong
                                                    style="color:red;">(*)</strong></label>
                                            <select class="form-control" name="customer" id="customer"
                                                value="{{ old('customer') }}">
                                                <option value>Seleccione Customer</option>
                                                @foreach($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->firstname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Fecha de Venta<strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="date" class="form-control" name="fechaventa"
                                                placeholder="YYYY-MM-DD" autocomplete="off"
                                                value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="estado" value="1">
                                <input type="hidden" class="form-control" name="registradopor"
                                    value="{{ Auth::user()->id }}">
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <table id="productTable" class="table">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Amount</th>
                                                <th>Price</th>
                                                <th>Subtotal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select class="form-control" id="product">
                                                        <option value="">Select Product</option>
                                                        @foreach($products as $product)
                                                        <option value="{{ $product->id }}"
                                                            data-price="{{ $product->price }}">{{ $product->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><input type="number" class="form-control" id="amount"></td>
                                                <td><input type="number" class="form-control" id="price"></td>
                                                <td><input type="text" class="form-control" id="subtotal" readonly></td>
                                                <td><button type="button" class="btn btn-success"
                                                        id="addProduct">Add</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <table id="selectedProductsTable" class="table">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Amount</th>
                                                <th>Price</th>
                                                <th>Subtotal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Selected products will be added dynamically here -->
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3" align="right"><strong>Total:</strong></td>
                                                <td><span id="total">0</span></td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <input type="hidden" name="total" id="totalInput">

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-2 col-xs-4">
                                        <button type="submit"
                                            class="btn btn-primary btn-block btn-flat">Registrar</button>
                                    </div>
                                    <div class="col-lg-2 col-xs-4">
                                        <a href="{{ route('order.index') }}"
                                            class="btn btn-danger btn-block btn-flat">Atras</a>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    const productTableBody = document.querySelector("#selectedProductsTable tbody");
    const addProductButton = document.querySelector("#addProduct");
    const totalElement = document.querySelector("#total");
    let total = 0;

    function calculateSubtotal(amount, price) {
        return amount * price;
    }

    function updateTotal() {
        totalElement.textContent = total.toFixed(2);
        document.querySelector("#totalInput").value = total.toFixed(2); // Actualiza el campo de entrada oculto
    }

    function updateSubtotal() {
        const amount = parseInt(document.querySelector("#amount").value);
        const price = parseFloat(document.querySelector("#price").value);
        const subtotalElement = document.querySelector("#subtotal");
        const subtotal = calculateSubtotal(amount, price);
        subtotalElement.value = subtotal.toFixed(2);
    }

    addProductButton.addEventListener("click", function() {
        const productSelect = document.querySelector("#product");
        const amountInput = document.querySelector("#amount");
        const priceInput = document.querySelector("#price");
        const selectedProduct = productSelect.options[productSelect.selectedIndex];
        const productName = selectedProduct.text;
        const amount = parseInt(amountInput.value);
        const price = parseFloat(selectedProduct.getAttribute(
            "data-price")); // Obtener el precio del producto seleccionado
        const subtotal = calculateSubtotal(amount, price);

        if (isNaN(amount) || isNaN(price) || amount <= 0 || price <= 0) {
            alert("Please enter valid amount and price.");
            return;
        }

        const newRow = document.createElement("tr");
        newRow.innerHTML = `
                <td>${productName}</td>
                <td>${amount}</td>
                <td>${price.toFixed(2)}</td>
                <td>${subtotal.toFixed(2)}</td>
                <td><button type="button" class="btn btn-danger btn-sm remove-product">Remove</button></td>
            `;
        productTableBody.appendChild(newRow);

        total += subtotal;
        updateTotal();

        productSelect.value = "";
        amountInput.value = "";
        priceInput.value = "";
        document.querySelector("#subtotal").value = "";
    });

    productTableBody.addEventListener("click", function(event) {
        if (event.target.classList.contains("remove-product")) {
            const row = event.target.parentElement.parentElement;
            const subtotal = parseFloat(row.querySelector("td:nth-child(4)").textContent);
            total -= subtotal;
            updateTotal();
            row.remove();
        }
    });

    document.querySelector("#amount").addEventListener("input", updateSubtotal);
    document.querySelector("#price").addEventListener("input", updateSubtotal);

    // Actualiza automáticamente el precio cuando se selecciona un producto
    document.querySelector("#product").addEventListener("change", function() {
        const selectedProduct = this.options[this.selectedIndex];
        const price = selectedProduct.getAttribute("data-price");
        document.querySelector("#price").value = price;
    });
});
</script>
<script type="text/javascript">
$("#customer").select2({
    allowClear: true
});
</script>
@endpush