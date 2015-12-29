@extends('template')

@section('content')
    <h1>Orders</h1>

    <table class="table">
        <tbody>
        <tr>
            <th>#ID</th>
            <th>Cliente</th>
            <th>Itens</th>
            <th>Valor</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>

        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>
                    <ul>
                        @foreach($order->items as $item)
                            <li>{{ $item->product->name }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>{{ number_format($order->total,2,",",".") }}</td>
                <td>{{ $order->desc_status }}</td>
                <td>
                    <a href="{{ route('admin.orders.update',['id'=>$order->id]) }}" class="btn btn-default">
                        @if ($order->status == 0)
                            Finalizar
                        @elseif($order->status == 1)
                            Reabrir
                        @endif
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $orders->render() !!}

@endsection