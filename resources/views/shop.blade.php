<x-app>
    <x-slot:title>
        Shop | Fashion by Mobez
    </x-slot>
    <main>
        <section class="full-width_padding">
            <div class="full-width_border border-2" style="border-color: #eeeeee;">
                <div class="shop-banner position-relative ">
                    <div class="background-img" style="background-color: #eeeeee;">
                        <img loading="lazy" src="../images/shop/shop_banner_character1.png" width="1759" height="420"
                            alt="Pattern" class="slideshow-bg__img object-fit-cover">
                    </div>

                    <div class="shop-banner__content container position-absolute start-50 top-50 translate-middle">
                        <h2 class="stroke-text h1 smooth-16 text-uppercase fw-bold mb-3 mb-xl-4 mb-xl-5">Our Products
                        </h2>
                        <ul class="d-flex flex-wrap list-unstyled text-uppercase h6">
                            <li class="me-3 me-xl-4 pe-1"><a href="/shop"
                                    class="menu-link menu-link_us-s {{ Request::query('category') === '' || Request::query('category') === null ? 'menu-link_active' : '' }}">All</a>
                            </li>

                            @foreach ($categories as $category)
                                <li class="me-3 me-xl-4 pe-1"><a
                                        href="/shop?category={{ $category->id }}&cat_name={{ $category->name }}"
                                        class="menu-link menu-link_us-s {{ Request::query('category') == $category->id ? 'menu-link_active' : '' }}">
                                        {{ $category->name }} </a>
                                </li>
                            @endforeach


                        </ul>
                    </div><!-- /.shop-banner__content -->
                </div><!-- /.shop-banner position-relative -->
            </div><!-- /.full-width_border -->
        </section><!-- /.full-width_padding-->

        <div class="mb-4 pb-lg-3"></div>

        <section class="shop-main container">
            <div class="d-flex justify-content-between mb-4 pb-md-2">
                <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
                    <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Home</a>
                    <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
                    <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">The Shop</a>
                </div><!-- /.breadcrumb -->

                <div
                    class="shop-acs d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1">
                    <select class="shop-acs__select d-none form-select w-auto border-0 py-0 order-1 order-md-0"
                        aria-label="Sort Items" name="total-number">
                        <option selected>Default Sorting</option>
                        <option value="1">Featured</option>
                        <option value="2">Best selling</option>
                        <option value="3">Alphabetically, A-Z</option>
                        <option value="3">Alphabetically, Z-A</option>
                        <option value="3">Price, low to high</option>
                        <option value="3">Price, high to low</option>
                        <option value="3">Date, old to new</option>
                        <option value="3">Date, new to old</option>
                    </select>

                    <div class="shop-asc__seprator mx-3 bg-light d-none d-md-block order-md-0"></div>

                    <div class="col-size align-items-center order-1 d-none d-lg-flex">
                        <span class="text-uppercase fw-medium me-2">View</span>
                        <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid"
                            data-cols="2">2</button>
                        <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid"
                            data-cols="3">3</button>
                        <button class="btn-link fw-medium js-cols-size" data-target="products-grid"
                            data-cols="4">4</button>
                    </div><!-- /.col-size -->

                    <div class="shop-asc__seprator mx-3 bg-light d-none d-lg-block order-md-1"></div>

                    <div class="shop-filter d-flex align-items-center order-0 order-md-3">
                        <button class="btn-link btn-link_f d-flex align-items-center ps-0 js-open-aside"
                            data-aside="shopFilter">
                            <svg class="d-inline-block align-middle me-2" width="14" height="10"
                                viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_filter" />
                            </svg>
                            <span class="text-uppercase fw-medium d-inline-block align-middle">Filter</span>
                        </button>
                    </div><!-- /.col-size d-flex align-items-center ms-auto ms-md-3 -->
                </div><!-- /.shop-acs -->
            </div><!-- /.d-flex justify-content-between -->


            @if (count($products) <= 0)
                <div style="padding: 100px 10px 10px">

                    <h2 class="text-center">Sorry, No Product was Found!!!</h2>
                    <p class="text-center"> Kindly try another product search, or stay tuned...</p>

                </div>
            @endif

            <div class="products-grid row row-cols-2 row-cols-md-3 row-cols-lg-4" id="products-grid">

                @foreach ($products as $product)
                    <div class="product-card-wrapper">
                        <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                            <div class="pc__img-wrapper">
                                <div class="swiper-container background-img js-swiper-slider"
                                    data-settings='{"resizeObserver": true}'>
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <a href="/product/{{ $product['id'] }}/{{ $product['slug'] }}">
                                                <img loading="lazy" src="{{ $product['image'] }}" width="330"
                                                    height="400" alt="{{ $product['name'] }}" class="pc__img"></a>
                                        </div><!-- /.pc__img-wrapper -->
                                        <div class="swiper-slide">
                                            <a href="/product/{{ $product['id'] }}/{{ $product['slug'] }}">
                                                <img loading="lazy"
                                                    src="{{ $product['product_images'][0]['image'] ?? '' }}"
                                                    width="330" height="400" alt="{{ $product['name'] }}"
                                                    class="pc__img"></a>
                                        </div><!-- /.pc__img-wrapper -->
                                    </div>
                                    <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <use href="#icon_prev_sm" />
                                        </svg></span>
                                    <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <use href="#icon_next_sm" />
                                        </svg></span>
                                </div>
                                <button data-product-name="{{ $product['name'] }}"
                                    data-product-id="{{ $product['id'] }}"
                                    data-product-image="{{ $product['image'] }}"
                                    data-product-price="{{ $product['price'] }}"
                                    data-product-slug="{{ $product['slug'] }}"
                                    data-product-category-name="{{ $product['category_name'] }}"
                                    class="pc__atc add-to-cart btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside"
                                    data-aside="cartDrawer" title="Add To Cart">
                                    Add To Cart
                                </button>
                            </div>

                            <div class="pc__info position-relative">
                                <p class="pc__category" class="text-capitalize">{{ $product['category_name'] }}</p>
                                <h6 class="pc__title"><a class="text-capitalize"
                                        href="/product/{{ $product['id'] }}/{{ $product['slug'] }}">
                                        {{ $product['name'] }}
                                    </a></h6>
                                <div class="product-card__price d-flex">
                                    <span
                                        class="money price">{{ $product['currency'] }}{{ number_format($product['price'] ?? 0) }}</span>
                                </div>


                                <button
                                    class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                                    title="Add To Wishlist">
                                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <use href="#icon_heart" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div><!-- /.products-grid row -->


        </section><!-- /.shop-main container -->

        <script defer>
            localStorage.setItem('currency', "{{ $currency }}")
        </script>
    </main>
    <div class="mb-5 pb-xl-5"></div>
</x-app>
