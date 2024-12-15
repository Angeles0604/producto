@extends('cliente.layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-blue-600 mb-4">Historial de Pedidos</h1>

    @if($orders->isEmpty())
        <p>No tienes pedidos registrados.</p>
    @else
        @foreach($orders as $order)
            <div class="border rounded p-4 mb-4">
                <p><strong>Pedido #:</strong> {{ $order->id_invoice }}</p>
                <p><strong>Total:</strong> ${{ number_format($order->total_amount, 2) }}</p>
                <p><strong>Estado:</strong> {{ ucfirst($order->status) }}</p>
            </div>
        @endforeach
    @endif
</div>
@endsection
