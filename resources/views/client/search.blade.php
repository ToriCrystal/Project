@extends('layouts.main')

@section('title')
    Search
@endsection

@section('product-content')
    @if ($products->count() > 0)
        @foreach ($products as $product)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ $product->hinh }}">
                        <ul class="product__hover">
                            <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                            <li><a href="#"><img src="img/icon/compare.png" alt="">
                                    <span>Compare</span></a>
                            </li>
                            <li><a href="{{ route('detail', [$product->id_sp]) }}"><img src="img/icon/search.png"
                                        alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>{{ $product->ten_sp }}</h6>
                        <a href="{{ route('addcart', ['id' => $product->id_sp]) }}" class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>{{ number_format($product->gia, 0, ',', '.') }} VNĐ</h5>
                        <div class="product__color__select">
                            <label for="pc-4">
                                <input type="radio" id="pc-4">
                            </label>
                            <label class="active black" for="pc-5">
                                <input type="radio" id="pc-5">
                            </label>
                            <label class="grey" for="pc-6">
                                <input type="radio" id="pc-6">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No products found.</p>
    @endif
@endsection



@section('pagination')
    <div class="col-lg-12">
        <div class="product__pagination">
            @if ($products->onFirstPage())
                <span>&laquo;</span>
            @else
                <a href="{{ $products->previousPageUrl() }}">&laquo;</a>
            @endif

            <a href="{{ $products->url(1) }}">1</a>
            @if ($products->currentPage() > 3)
                <span>...</span>
            @endif

            @for ($i = max(2, $products->currentPage() - 2); $i <= min($products->lastPage() - 1, $products->currentPage() + 2); $i++)
                @if ($i == $products->currentPage())
                    <a class="active" href="{{ $products->url($i) }}">{{ $i }}</a>
                @else
                    <a href="{{ $products->url($i) }}">{{ $i }}</a>
                @endif
            @endfor

            @if ($products->currentPage() < $products->lastPage() - 2)
                <span>...</span>
            @endif
            <a href="{{ $products->url($products->lastPage()) }}">{{ $products->lastPage() }}</a>

            @if ($products->hasMorePages())
                <a href="{{ $products->nextPageUrl() }}">&raquo;</a>
            @else
                <span>&raquo;</span>
            @endif
        </div>
    </div>
@endsection

@section('total')
    <div class="shop__product__option__left">
        <p>Hiện 1 – {{ $products->count() }} của {{ $totalCount }} kết quả!</p>
    </div>
@endsection

@section('price')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            @yield('total')
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="shop__product__option__right">
                <p>Phân khúc giá :</p>
                <select id="priceRangeSelect">
                    <option value="">Chọn phân khúc</option>
                    <option value="1">Dưới 10.000.000 VNĐ</option>
                    <option value="2">Trên 10.000.000 VNĐ</option>
                </select>
            </div>
        </div>
    </div>
@endsection

@section('slidemenu')
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="{{ route('search') }}" method="get">
                                <input type="text" name="search" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    @foreach ($listCategory as $category)
                                                        <li>
                                                            <a
                                                                href="{{ route('category', ['id' => $category->id_loai]) }}">{{ $category->ten_loai }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                    <li><a href="#">$0.00 - $50.00</a></li>
                                                    <li><a href="#">$50.00 - $100.00</a></li>
                                                    <li><a href="#">$100.00 - $150.00</a></li>
                                                    <li><a href="#">$150.00 - $200.00</a></li>
                                                    <li><a href="#">$200.00 - $250.00</a></li>
                                                    <li><a href="#">250.00+</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        @yield('price')
                    </div>
                    <div class="row">
                        @yield('product-content')
                    </div>
                    <div class="row">
                        @yield('pagination')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('breadcrumb')
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
