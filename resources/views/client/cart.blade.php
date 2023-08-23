@extends('layouts.main')

@section('title')
    Cart
@endsection

@section('content')
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (session('cart') != null)
                                    @foreach (session('cart') as $id => $details)
                                        <tr>
                                            <td class="product__cart__item">
                                                <div class="product__cart__item__pic">
                                                    <img src="{{ $details['hinh'] }}" alt=""
                                                        style="max-width: 100px; max-height: 100px;">
                                                </div>
                                                <div class="product__cart__item__text">
                                                    <h6>{{ $details['ten_sp'] }}</h6>
                                                    <h5>{{ number_format($details['gia'], 0, ',', '.') }} VNĐ</h5>
                                                </div>
                                            </td>
                                            <td class="quantity__item">
                                                <div class="quantity">
                                                    <div class="pro-qty-2">
                                                        <input type="text" name="quantity[{{ $id }}]"
                                                            value="{{ $details['soluong'] }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__price">
                                                <small>{{ number_format($details['gia'] * $details['soluong'], 0, ',', '.') }}
                                                    VNĐ</small>
                                            </td>
                                            <td class="cart__close">
                                                <a href="{{ route('deleteCart', $id) }}">
                                                    <i class="fa fa-close"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="/product">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <form action="{{ route('updateCart') }}" method="post">
                                    @csrf
                                    <button type="submit">
                                        <i class="fa fa-spinner"></i> Update cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            @php $total = 0 @endphp
                            @foreach ((array) session('cart') as $id => $details)
                                @php $total += $details['gia'] * $details['soluong'] @endphp
                            @endforeach
                            <li>Subtotal <span>{{ number_format($total, 0, ',', '.') }} VNĐ</span></li>
                            <li>Total <span>$ 169.50</span></li>
                        </ul>
                        @if (!empty(session('cart')))
                            <!-- Check if cart is not empty -->
                            <form action="{{ route('checkOut') }}" method="post">
                                @csrf
                                <button type="submit" class="primary-btn">Proceed to checkout</button>
                            </form>
                        @else
                            <p>Your cart is empty. Add items to your cart to proceed to checkout.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


