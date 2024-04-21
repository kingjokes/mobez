<x-app>
    <main>
        <section class="swiper-container js-swiper-slider slideshow full-width_padding"
            data-settings='{
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": 1,
        "effect": "fade",
        "loop": true,
        "pagination": {
          "el": ".slideshow-pagination",
          "type": "bullets",
          "clickable": true
        }
      }'>
            <div class="swiper-wrapper">
                <div class="swiper-slide full-width_border border-1" style="border-color: #f5e6e0">
                    <div class="overflow-hidden position-relative h-100">
                        <div class="slideshow-bg" style="background-color: #f5e6e0">
                            <img loading="lazy" src="../images/slideshow-pattern.png" width="1761" height="778"
                                alt="Pattern" class="slideshow-bg__img object-fit-cover" />
                        </div>
                        <!-- <p class="slideshow_markup font-special text-uppercase position-absolute end-0 bottom-0">Summer</p> -->
                        <div class="slideshow-character position-absolute bottom-0 pos_right-center">
                            <img loading="lazy" src="../images/slideshow-character1.png" width="400" height="733"
                                alt="Woman Fashion 1"
                                class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 h-auto w-auto" />
                            <div class="character_markup">
                                <p
                                    class="text-uppercase font-sofia fw-bold animate animate_fade animate_rtl animate_delay-10">
                                    Summer
                                </p>
                            </div>
                        </div>
                        <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
                            <h6
                                class="text_dash text-uppercase text-red fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                                New Trend
                            </h6>
                            <h2
                                class="text-uppercase h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">
                                Summer Sale Stylish
                            </h2>
                            <h2 class="text-uppercase h1 fw-bold animate animate_fade animate_btt animate_delay-5">
                                Womens
                            </h2>
                            <a href="/shop"
                                class="btn-link btn-link_lg default-underline text-uppercase fw-medium animate animate_fade animate_btt animate_delay-7">Discover
                                More</a>
                        </div>
                    </div>
                </div>
                <!-- /.slideshow-item -->

                <div class="swiper-slide full-width_border border-1" style="border-color: #f5e6e0">
                    <div class="overflow-hidden position-relative h-100">
                        <div class="slideshow-bg" style="background-color: #f5e6e0">
                            <img loading="lazy" src="../images/slideshow-pattern.png" width="1761" height="778"
                                alt="Pattern" class="slideshow-bg__img object-fit-cover" />
                        </div>
                        <div class="slideshow-character position-absolute bottom-0 pos_right-center">
                            <img loading="lazy" src="../images/slideshow-character2.png" width="400" height="690"
                                alt="Woman Fashion 2"
                                class="slideshow-character__img animate animate_fade animate_rtl animate_delay-10 h-auto w-auto" />
                        </div>
                        <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
                            <h6
                                class="text_dash text-uppercase text-red fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                                Summer 2024
                            </h6>
                            <h2 class="text-uppercase h1 fw-bold animate animate_fade animate_btt animate_delay-3">
                                Hello New Season
                            </h2>
                            <h6 class="text-uppercase mb-5 animate animate_fade animate_btt animate_delay-3">
                                Limited Time Offer - Up to 60% off & Free Shipping
                            </h6>
                            <a href="/shop"
                                class="btn-link btn-link_lg default-underline text-uppercase fw-medium animate animate_fade animate_btt animate_delay-3">Discover
                                More</a>
                        </div>
                    </div>
                </div>
                <!-- /.slideshow-item -->
            </div>
            <!-- /.slideshow-wrapper js-swiper-slider -->

            <div class="container">
                <div class="slideshow-pagination d-flex align-items-center position-absolute bottom-0 mb-5"></div>
                <!-- /.products-pagination -->
            </div>
            <!-- /.container -->

            <div
                class="slideshow-social-follow d-none d-xxl-block position-absolute top-50 start-0 translate-middle-y text-center">
                <ul class="social-links list-unstyled mb-0 text-secondary">
                    <li>
                        <a href="#" class="footer__social-link d-block">
                            <svg class="svg-icon svg-icon_facebook" width="9" height="15" viewBox="0 0 9 15"
                                xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_facebook" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/" class="footer__social-link d-block">
                            <svg class="svg-icon svg-icon_twitter" width="14" height="13" viewBox="0 0 14 13"
                                xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_twitter" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/" class="footer__social-link d-block">
                            <svg class="svg-icon svg-icon_instagram" width="14" height="13" viewBox="0 0 14 13"
                                xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_instagram" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.pinterest.com/" class="footer__social-link d-block">
                            <svg class="svg-icon svg-icon_pinterest" width="14" height="15" viewBox="0 0 14 15"
                                xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_pinterest" />
                            </svg>
                        </a>
                    </li>
                </ul>
                <!-- /.social-links list-unstyled mb-0 text-secondary -->
                <span class="slideshow-social-follow__title d-block mt-5 text-uppercase fw-medium text-secondary">Follow
                    Us</span>
            </div>
            <!-- /.slideshow-social-follow -->
            <a href="#section-collections-grid_masonry"
                class="slideshow-scroll d-none d-xxl-block position-absolute end-0 bottom-0 text_dash text-uppercase fw-medium">Scroll</a>
        </section>
        <!-- /.slideshow -->

        <div class="mb-3 pb-3 mb-md-4 pb-md-4 mb-xl-5 pb-xl-5"></div>
        <div class="pb-1"></div>

        <!-- Shop by collection -->
        {{-- <section class="collections-grid collections-grid_masonry" id="section-collections-grid_masonry">
            <div class="container h-md-100">
                <div class="row h-md-100">
                    <div class="col-lg-6 h-md-100">
                        <div class="collection-grid__item position-relative h-md-100">
                            <div class="background-img"
                                style="
                    background-image: url('../images/collection_grid_1.jpg');
                  ">
                            </div>
                            <div class="content_abs content_bottom content_left content_bottom-md content_left-md">
                                <p class="text-uppercase mb-1">Hot List</p>
                                <h3 class="text-uppercase">
                                    <strong>Women</strong> Collection
                                </h3>
                                <a href="/shop" class="btn-link default-underline text-uppercase fw-medium">Shop
                                    Now</a>
                            </div>
                            <!-- /.content_abs content_bottom content_left content_bottom-md content_left-md -->
                        </div>
                    </div>
                    <!-- /.col-md-6 -->

                    <div class="col-lg-6 d-flex flex-column">
                        <div class="collection-grid__item position-relative flex-grow-1 mb-lg-4">
                            <div class="background-img"
                                style="
                    background-image: url('../images/collection_grid_2.jpg');
                  ">
                            </div>
                            <div class="content_abs content_bottom content_left content_bottom-md content_left-md">
                                <p class="text-uppercase mb-1">Hot List</p>
                                <h3 class="text-uppercase">
                                    <strong>Men</strong> Collection
                                </h3>
                                <a href="/shop" class="btn-link default-underline text-uppercase fw-medium">Shop
                                    Now</a>
                            </div>
                            <!-- /.content_abs content_bottom content_left content_bottom-md content_left-md -->
                        </div>
                        <div class="position-relative flex-grow-1 mt-lg-1">
                            <div class="row h-md-100">
                                <div class="col-md-6 h-md-100">
                                    <div class="collection-grid__item h-md-100 position-relative">
                                        <div class="background-img"
                                            style="
                          background-image: url('../images/collection_grid_3.jpg');
                        ">
                                        </div>
                                        <div
                                            class="content_abs content_bottom content_left content_bottom-md content_left-md">
                                            <p class="text-uppercase mb-1">Hot List</p>
                                            <h3 class="text-uppercase">
                                                <strong>Kids</strong> Collection
                                            </h3>
                                            <a href="/shop"
                                                class="btn-link default-underline text-uppercase fw-medium">Shop
                                                Now</a>
                                        </div>
                                        <!-- /.content_abs content_bottom content_left content_bottom-md content_left-md -->
                                    </div>
                                    <!-- /.collection-grid__item -->
                                </div>

                                <div class="col-md-6 h-md-100">
                                    <div class="collection-grid__item h-md-100 position-relative">
                                        <div class="background-img" style="background-color: #f5e6e0"></div>
                                        <div
                                            class="content_abs content_bottom content_left content_bottom-md content_left-md">
                                            <h3 class="text-uppercase">
                                                <strong>E-Gift</strong> Cards
                                            </h3>
                                            <p class="mb-1">
                                                Surprise someone with the gift they<br />really want.
                                            </p>
                                            <a href="/shop"
                                                class="btn-link default-underline text-uppercase fw-medium">Shop
                                                Now</a>
                                        </div>
                                        <!-- /.content_abs content_bottom content_left content_bottom-md content_left-md -->
                                    </div>
                                    <!-- /.collection-grid__item -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section> --}}
        <!-- /.collections-grid collections-grid_masonry -->

        <div class="mb-4 pb-4 mb-xl-5 pb-xl-5"></div>

        <section class="products-grid container">
            <h2 class="section-title text-uppercase text-center mb-1 mb-md-3 pb-xl-2 mb-xl-4">
                Our Trendy <strong>Products</strong>
            </h2>

            <div class="text-center">
                <span>Our latest trendy products due to users' purchase</span>
            </div>
            <br />


            <div class="tab-content pt-2" id="collections-tab-content">
                <div class="tab-pane fade show active" id="collections-tab-1" role="tabpanel"
                    aria-labelledby="collections-tab-1-trigger">
                    <div class="row">
                        @foreach ($trending_products as $product)
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                                    <div class="pc__img-wrapper">
                                        <a href="/product/{{ $product['id'] }}/{{ $product['slug'] }}">
                                            <img loading="lazy" src="{{ $product['image'] }}" width="330"
                                                height="400" alt="{{ $product['name'] }}" class="pc__img" />
                                            <img loading="lazy"
                                                src="{{ $product['product_images'][0]['image'] ?? '' }}"
                                                width="330" height="400" alt="{{ $product['name'] }}"
                                                class="pc__img pc__img-second" />
                                        </a>
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
                                        <p class="pc__category text-capitalize">{{ $product['category_name'] }}</p>
                                        <h6 class="pc__title">
                                            <a href="/product/{{ $product['id'] }}/{{ $product['slug'] }}"
                                                class="text-capitalize">
                                                {{ $product['name'] }}
                                            </a>
                                        </h6>
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

                    </div>
                    <!-- /.row -->
                    <div class="text-center mt-2">
                        <a class="btn-link btn-link_lg default-underline text-uppercase fw-medium"
                            href="/shop">Discover More</a>
                    </div>
                </div>

            </div>
            <!-- /.tab-content pt-2 -->
        </section>
        <!-- /.products-grid -->

        <div class="mb-3 mb-xl-5 pb-1 pb-xl-5"></div>

        <section class="deal-timer position-relative d-flex align-items-end overflow-hidden"
            style="background-color: #ebebeb">
            <div class="background-img" style="background-image: url('../images/deal_timer_bg.jpg')"></div>

            <div class="deal-timer-wrapper container position-relative">
                <div class="deal-timer__content pb-2 mb-3 pb-xl-5 mb-xl-3 mb-xxl-5">
                    <p class="text_dash text-uppercase text-red fw-medium">
                        Deal of the week
                    </p>
                    <h3 class="h1 text-uppercase">
                        <strong>Spring</strong> Collection
                    </h3>
                    <a href="/shop" class="btn-link default-underline text-uppercase fw-medium mt-3">Shop
                        Now</a>
                </div>

                <div class="position-relative d-flex align-items-center text-center pt-xxl-4 js-countdown"
                    data-date="18-5-2024" data-time="06:50">
                    <div class="day countdown-unit">
                        <span class="countdown-num d-block"></span>
                        <span class="countdown-word fw-bold text-uppercase text-secondary">Days</span>
                    </div>

                    <div class="hour countdown-unit">
                        <span class="countdown-num d-block"></span>
                        <span class="countdown-word fw-bold text-uppercase text-secondary">Hours</span>
                    </div>

                    <div class="min countdown-unit">
                        <span class="countdown-num d-block"></span>
                        <span class="countdown-word fw-bold text-uppercase text-secondary">Mins</span>
                    </div>

                    <div class="sec countdown-unit">
                        <span class="countdown-num d-block"></span>
                        <span class="countdown-word fw-bold text-uppercase text-secondary">Sec</span>
                    </div>
                </div>
            </div>
            <!-- /.deal-timer-wrapper -->
        </section>
        <!-- /.deal-timer -->

        <div class="mb-3 mb-xl-5 pb-1 pb-xl-5"></div>


        <!-- /.instagram container -->

        <div class="mb-4 pb-4 pb-xl-5 mb-xl-5"></div>

        <section class="service-promotion container mb-md-4 pb-md-4 mb-xl-5">
            <div class="row">
                <div class="col-md-4 text-center mb-5 mb-md-0">
                    <div class="service-promotion__icon mb-4">
                        <svg width="52" height="52" viewBox="0 0 52 52" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_shipping" />
                        </svg>
                    </div>
                    <h3 class="service-promotion__title h5 text-uppercase">
                        Fast And Free Delivery
                    </h3>
                    <p class="service-promotion__content text-secondary">
                        Free delivery for all orders over $140
                    </p>
                </div>
                <!-- /.col-md-4 text-center-->

                <div class="col-md-4 text-center mb-5 mb-md-0">
                    <div class="service-promotion__icon mb-4">
                        <svg width="53" height="52" viewBox="0 0 53 52" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_headphone" />
                        </svg>
                    </div>
                    <h3 class="service-promotion__title h5 text-uppercase">
                        24/7 Customer Support
                    </h3>
                    <p class="service-promotion__content text-secondary">
                        Friendly 24/7 customer support
                    </p>
                </div>
                <!-- /.col-md-4 text-center-->

                <div class="col-md-4 text-center mb-4 pb-1 mb-md-0">
                    <div class="service-promotion__icon mb-4">
                        <svg width="52" height="52" viewBox="0 0 52 52" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_shield" />
                        </svg>
                    </div>
                    <h3 class="service-promotion__title h5 text-uppercase">
                        Money Back Guarantee
                    </h3>
                    <p class="service-promotion__content text-secondary">
                        We return money within 30 days
                    </p>
                </div>
                <!-- /.col-md-4 text-center-->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.service-promotion container -->

        <script defer>
            localStorage.setItem('currency', "{{ $currency }}")
        </script>
    </main>

</x-app>
