@extends('layouts.admin')
@section('tilte')
    Admin Website
@endsection

@section('content')
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

            <div class="search">
                <label>
                    <input type="text" placeholder="Search here">
                    <ion-icon name="search-outline"></ion-icon>
                </label>
            </div>

            <div class="user">
                <img src="assets/imgs/customer01.jpg" alt="">
            </div>
        </div>

        <!-- ======================= Cards ================== -->

        <!-- ================ Order Details List ================= -->
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Product</h2>
                    <a href="#" class="btn">Add product?</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Image</td>
                            <td>Price</td>
                            <td>Edit / Remove</td>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->ten_sp }}</td>

                                <td><img src="{{ asset($product->hinh) }}" style="max-width: 100px; max-height: 100px;">
                                </td>
                                <td>{{ $product->ten_sp }}</td>
                                <td>
                                    <form action="{{ route('product.destroy', $product->id_sp) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-link">Remove</button>
                                    </form>
                                    <form action="{{ route('product.edit', $product->id_sp) }}" method="get">
                                        <button type="submit" class="btn-link">Edit</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>


            <!-- ================= New Customers ================ -->
        </div>
    </div>
@endsection
