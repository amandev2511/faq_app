{{--@extends('welcome')--}}
{{--@section('content')--}}
{{--    <input type="hidden" id="shop_name" value="{{$shop}}">--}}
{{--    <form>--}}
{{--        <div class="form-group">--}}
{{--            <label for="category_name">Category Name</label>--}}
{{--            <input type="text" class="form-control" id="category_name" placeholder="Enter category name"--}}
{{--                   value="">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="select_icon">Select Category icon</label>--}}
{{--            <select class="form-control" id="select_icon">--}}
{{--                @foreach($font_awesome as $font_awesomes)--}}
{{--                    <option value="{{$font_awesomes->icon_class_name}}"><i style="font-size:24px" class="fa">{!!$font_awesomes->icon_code!!}</i></option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label class="enable_text">Hide Category Name</label>--}}
{{--            <label class="switch">--}}
{{--                <input type="checkbox" id="hide_cat_name">--}}
{{--                <span class="slider round"></span>--}}
{{--            </label>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label class="enable_text">Enable Tab And Product Page</label>--}}
{{--            <label class="switch">--}}
{{--                <input type="checkbox" id="ena_pro_page">--}}
{{--                <span class="slider round"></span>--}}
{{--            </label>--}}
{{--        </div>--}}



{{--        <div class="input-group">--}}
{{--            <input type="text" class="form-control" id="searchInput" placeholder="Search">--}}
{{--            <div class="input-group-append">--}}
{{--                <button class="btn btn-outline-secondary dropdown-toggle" type="button"--}}
{{--                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                    Filter--}}
{{--                </button>--}}
{{--                <div class="dropdown-menu" id="filterDropdown" class="wrapper">--}}
{{--                    <!-- Add checkboxes and text options here -->--}}
{{--                    <div class="dropdown-item">--}}
{{--                        <input type="checkbox" id="home" class="number"> <span class="fruit">Home</span>--}}
{{--                    </div>--}}
{{--                    <div class="dropdown-item">--}}
{{--                        <input type="checkbox" id="products" class="number"> <span--}}
{{--                                class="fruit">Products</span>--}}
{{--                    </div>--}}
{{--                    <div class="dropdown-item">--}}
{{--                        <input type="checkbox" id="Collections" class="number"> <span--}}
{{--                                class="fruit">Collections</span>--}}
{{--                    </div>--}}
{{--                    <div class="dropdown-item">--}}
{{--                        <input type="checkbox" id="pages" class="number"> <span--}}
{{--                                class="fruit">Pages</span>--}}
{{--                    </div>--}}
{{--                    <div class="dropdown-item">--}}
{{--                        <input type="checkbox" id="blogs" class="number"> <span--}}
{{--                                class="fruit">Blogs</span>--}}
{{--                    </div>--}}
{{--                    <div class="dropdown-item">--}}
{{--                        <input type="checkbox" id="cart" class="number"> <span class="fruit">Cart</span>--}}
{{--                    </div>--}}
{{--                    <div class="dropdown-item">--}}
{{--                        <input type="checkbox" id="checkout" class="number"> <span--}}
{{--                                class="fruit">Checkout</span>--}}
{{--                    </div>--}}
{{--                    <div class="dropdown-item">--}}
{{--                        <input type="checkbox" id="404_page" class="number"> <span class="fruit">404--}}
{{--                                            Page</span>--}}
{{--                    </div>--}}
{{--                    <div class="dropdown-item">--}}
{{--                        <input type="checkbox" id="pass_page" class="number"> <span--}}
{{--                                class="fruit">Password Page</span>--}}
{{--                    </div>--}}
{{--                    <!-- Add more options as needed -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- <a href="#" id="loadMore">Load More</a> -->--}}
{{--        <div class="container">--}}
{{--            <div class="flex">--}}
{{--                <div id="product_search">--}}
{{--                    <span id="all_prod" style="display:none"><b>All Products</b></span>--}}
{{--                </div>--}}
{{--                <div id="option_search">--}}
{{--                    <span id="all_custom" style="display:none"><b>All collections</b></span>--}}
{{--                </div>--}}
{{--                <div id="blogs_search">--}}
{{--                    <span id="all_blogs" style="display:none"><b>All Blogs</b></span>--}}
{{--                </div>--}}
{{--                <div id="pages_search">--}}
{{--                    <span id="all_pages" style="display:none"><b>All Pages</b></span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <button type="button" class="btn btn-primary" id="save_faq_opt">Save changes</button>--}}
{{--    </form>--}}
{{--@endsection--}}
@extends('welcome')
@section('content')
    <input type="hidden" id="shop_name" value="{{$shop}}">
    <div class="container">
        <form>
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" id="category_name" placeholder="Enter category name" value="">
            </div>
            <div class="form-group">
                <label for="select_icon">Select Category icon</label>
                <select class="form-control" id="select_icon">
                    @foreach($font_awesome as $font_awesomes)
                        <option value="{{$font_awesomes->icon_class_name}}"><i style="font-size:24px" class="fa">{!!$font_awesomes->icon_code!!}</i></option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="hide_cat_name">
                    <label class="form-check-label" for="hide_cat_name">Hide Category Name</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="ena_pro_page">
                    <label class="form-check-label" for="ena_pro_page">Enable Tab And Product Page</label>
                </div>
            </div>
            <div class="input-group">
                <input type="text" class="form-control" id="searchInput" placeholder="Search">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter
                    </button>
                    <div class="dropdown-menu" id="filterDropdown">
                        <div class="dropdown-item">
                            <input type="checkbox" id="home" class="number">
                            <label class="form-check-label" for="home">Home</label>
                        </div>
                        <div class="dropdown-item">
                            <input type="checkbox" id="products" class="number">
                            <label class="form-check-label" for="products">Products</label>
                        </div>
                        <div class="dropdown-item">
                            <input type="checkbox" id="products" class="number">
                            <label class="form-check-label" for="products">Products</label>
                        </div>
                        <div class="dropdown-item">
                            <input type="checkbox" id="Collections" class="number">
                            <label class="form-check-label" for="Collections">Collections</label>
                        </div>
                        <div class="dropdown-item">
                            <input type="checkbox" id="pages" class="number">
                            <label class="form-check-label" for="pages">Pages</label>
                        </div>
                        <div class="dropdown-item">
                            <input type="checkbox" id="blogs" class="number">
                            <label class="form-check-label" for="blogs">Blogs</label>
                        </div>
                        <div class="dropdown-item">
                            <input type="checkbox" id="cart" class="number">
                            <label class="form-check-label" for="cart">Cart</label>
                        </div>
{{--                        <div class="dropdown-item">--}}
{{--                            <input type="checkbox" id="checkout" class="number">--}}
{{--                            <label class="form-check-label" for="checkout">Checkout</label>--}}
{{--                        </div>--}}
                        <div class="dropdown-item">
                            <input type="checkbox" id="404_page" class="number">
                            <label class="form-check-label" for="404_page">404 Page</label>
                        </div>
                        <div class="dropdown-item">
                            <input type="checkbox" id="pass_page" class="number">
                            <label class="form-check-label" for="pass_page">404 Page</label>
                        </div>
                        <!-- Add more options as needed -->
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="flex">
                    <div id="product_search">
                        <span id="all_prod" style="display:none"><b>All Products</b></span>
                    </div>
                    <div id="option_search">
                        <span id="all_custom" style="display:none"><b>All collections</b></span>
                    </div>
                    <div id="blogs_search">
                        <span id="all_blogs" style="display:none"><b>All Blogs</b></span>
                    </div>
                    <div id="pages_search">
                        <span id="all_pages" style="display:none"><b>All Pages</b></span>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary" id="save_faq_opt">Save changes</button>
        </form>
    </div>
@endsection
