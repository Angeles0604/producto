@extends('cliente.layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-blue-600 mb-4">Selecciona Método de Pago</h1>

    <form action="{{ route('checkout.processPayment') }}" method="POST">
        @csrf
        <label class="block font-semibold mt-4">Método de Pago:</label>
        <select name="payment_method" class="border rounded p-2 w-full">
            <option value="credit_card">Tarjeta de Crédito</option>
            <option value="paypal">PayPal</option>
            <option value="bank_transfer">Transferencia Bancaria</option>
        </select>

        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded mt-4">Confirmar y Pagar</button>
    </form>
</div>
@endsection
