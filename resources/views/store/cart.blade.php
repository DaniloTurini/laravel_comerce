@extends('store.store')

@section('content')
    <section id="cart_items">
        <div class="container">

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Valor</td>
                            <td class="price">Quantidade</td>
                            <td class="price">Total</td>
                            <td></td>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse($cart->all() as $k=>$item)
                        <tr>
                            <td class="cart_product">
                                <a href="{{ route('store.product', ['id'=>$k]) }}">
                                Imagem
                                </a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{ route('store.product', ['id'=>$k]) }}">{{ $item['name'] }}</a></h4>
                                <p>Código: {{ $k }}</p>
                            </td>
                            <td class="cart_price">
                                R$ {{ number_format($item['price'],2,",",".") }}
                            </td>
                            <td class="cart_quantity">
                                <a href="{{ route('cart.reduce', ['id'=>$k]) }}" class="btn btn-primary">-</a>
                                {{ $item['qtd'] }}
                                <a href="{{ route('cart.add', ['id'=>$k]) }}" class="btn btn-primary">+</a>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"> R$ {{ number_format($item['price'] * $item['qtd'],2,",",".") }} </p>
                            </td>
                            <td class="cart_delete">
                                <a href="{{ route('cart.destroy', ['id'=>$k]) }}" class="cart_quantity_delete">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr class="" colspan="6">
                            <td>
                                <p>Nenhum item encontrado.</p>
                            </td>
                        </tr>
                    @endforelse

                    <tr class="cart_menu">
                        <td colspan="6">
                            <div class="pull-right">
                                <span style="margin-right: 100px">
                                    TOTAL: R$ {{ number_format($cart->getTotal(),2,",",".") }}
                                </span>

                                <a href="{{ route('checkout.place') }}" class="btn btn-success">Fechar a conta</a>
                            </div>
                        </td>

                    </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </section>
@endsection