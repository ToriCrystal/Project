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
        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers">1,504</div>
                    <div class="cardName">Daily Views</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">{{ $countOrders }}</div>
                    <div class="cardName">Sales</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="cart-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">284</div>
                    <div class="cardName">Comments</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="chatbubbles-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">$7,842</div>
                    <div class="cardName">Earning</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="cash-outline"></ion-icon>
                </div>
            </div>
        </div>

        <!-- ================ Order Details List ================= -->
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Recent Orders</h2>
                    <a href="#" class="btn">View All</a>
                </div>

                <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Payment</td>
                            <td>Status</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->tennguoinhan }}</td>
                                <td>{{ $order->gia }}</td>
                                <td>{{ $order->thoidiemmua }}</td>
                                <td>
                                    @if ($order->trangthai === 0)
                                        Chưa giao
                                    @elseif ($order->trangthai === 1)
                                        Đã giao
                                    @else
                                        Trạng thái không xác định
                                    @endif
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

            <!-- ================= New Customers ================ -->
            <div class="recentCustomers">
                <div class="cardHeader">
                    <h2>Recent Customers</h2>
                </div>

                <table>
                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>David <br> <span>Italy</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>Amit <br> <span>India</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>David <br> <span>Italy</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>Amit <br> <span>India</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>David <br> <span>Italy</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>Amit <br> <span>India</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>David <br> <span>Italy</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4>Amit <br> <span>India</span></h4>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
