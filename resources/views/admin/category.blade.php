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
                    <h2>Category</h2>
                    <a href="#" class="btn">Add category?</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Ordinal number</td>
                            <td>Edit / Remove</td>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($category as $category)
                            <tr>
                                <td>{{ $category->ten_loai }}</td>

                                <td>{{ $category->thutu }}</td>
                                <td>
                                    
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
