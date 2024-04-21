<x-app>
    <x-slot:title>
        Check Out | Fashion by Mobez
    </x-slot>
    <main>
        <div class="mb-4 pb-4"></div>
        <section class="shop-checkout container">
            <h2 class="page-title">Shipping and Checkout</h2>
            <div class="checkout-steps">
                <a href="/cart" class="checkout-steps__item active">
                    <span class="checkout-steps__item-number">01</span>
                    <span class="checkout-steps__item-title">
                        <span>Shopping Bag</span>
                        <em>Manage Your Items List</em>
                    </span>
                </a>
                <a href="/check-out" class="checkout-steps__item active">
                    <span class="checkout-steps__item-number">02</span>
                    <span class="checkout-steps__item-title">
                        <span>Shipping and Checkout</span>
                        <em>Checkout Your Items List</em>
                    </span>
                </a>
                <a href="/order-complete" class="checkout-steps__item">
                    <span class="checkout-steps__item-number">03</span>
                    <span class="checkout-steps__item-title">
                        <span>Confirmation</span>
                        <em>Review And Submit Your Order</em>
                    </span>
                </a>
            </div>
            <form name="checkout-form" id="checkout-form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input hidden name="order_breakdown" value="" id="order_breakdown" />
                <input hidden name="total" value="" id="total_order" />
                <div class="checkout-form">
                    <div class="billing-info__wrapper">
                        <h4>BILLING DETAILS</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="firstname" required
                                        id="checkout_first_name" placeholder="First Name">
                                    <label for="checkout_first_name">First Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="lastname" required
                                        id="checkout_last_name" placeholder="Last Name">
                                    <label for="checkout_last_name">Last Name</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="search-field my-3">
                                    <div class="form-label-fixed hover-container">
                                        <label for="search-dropdown" class="form-label">Country / Region*</label>
                                        <div class="js-hover__open">
                                            <input type="text"
                                                class="form-control  form-control-lg search-field__actor search-field__arrow-down"
                                                id="search-dropdown" required name="search-keyword" readonly
                                                placeholder="Choose a location...">
                                        </div>
                                        <div class="filters-container js-hidden-content mt-2">
                                            <div class="search-field__input-wrapper">
                                                <input type="text"
                                                    class="search-field__input form-control form-control-sm bg-lighter border-lighter"
                                                    placeholder="Search">
                                            </div>
                                            <ul class="search-suggestion list-unstyled">
                                                <li class="search-suggestion__item js-search-select">Australia</li>
                                                <li class="search-suggestion__item js-search-select">Canada</li>
                                                <li class="search-suggestion__item js-search-select">United Kingdom</li>
                                                <li class="search-suggestion__item js-search-select">United States</li>
                                                <li class="search-suggestion__item js-search-select">Turkey</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mt-3 mb-3">
                                    <input type="text" class="form-control" id="checkout_street_address"
                                        name="address" required placeholder="Street Address *">
                                    <label for="checkout_company_name">Street Address *</label>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" id="checkout_city" name="town"
                                        required placeholder="Town / City *">
                                    <label for="checkout_city">Town / City *</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating my-3">
                                    <input type="number" name="postal_code" required class="form-control"
                                        id="checkout_zipcode" placeholder="Postcode / ZIP *">
                                    <label for="checkout_zipcode">Postcode / ZIP *</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating my-3">
                                    <input type="tel" class="form-control" id="checkout_phone" name="phone"
                                        required placeholder="Phone *">
                                    <label for="checkout_phone">Phone *</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating my-3">
                                    <input type="email" class="form-control" id="checkout_email" name="mail"
                                        required placeholder="Your Mail *">
                                    <label for="checkout_email">Your Mail *</label>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="mt-3">
                                <textarea name="order_notes" required class="form-control form-control_gray" placeholder="Order Notes (optional)"
                                    cols="30" rows="8"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="checkout__totals-wrapper">
                        <div class="sticky-content">
                            <div class="checkout__totals">
                                <h3>Your Order</h3>
                                <table class="checkout-cart-items">
                                    <thead>
                                        <tr>
                                            <th>PRODUCT</th>
                                            <th>SUBTOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody id="checkout-item-table">

                                    </tbody>
                                </table>
                                <table class="checkout-totals">
                                    <tbody>
                                        <tr>
                                            <th>SUBTOTAL</th>
                                            <td> <span class="total-cart-item">0</span> </td>
                                        </tr>
                                        {{-- <tr>
                      <th>SHIPPING</th>
                      <td>Free shipping</td>
                    </tr> --}}
                                        <tr>
                                            <th>VAT</th>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <th>TOTAL</th>
                                            <td><span class="total-cart-item">0</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="checkout__payment-methods">
                                <div class="form-check">
                                    <input class="form-check-input form-check-input_fill" type="radio"
                                        name="checkout_payment_method" id="checkout_payment_method_1" checked>
                                    <label class="form-check-label" for="checkout_payment_method_1">
                                        Order through whatsapp
                                        <span class="option-detail d-block">
                                            Chat with us on our customer hotline line to place your order directly to
                                            us. Shipping fee will be discussed also
                                        </span>
                                    </label>
                                </div>

                                <div class="policy-text">
                                    Your personal data will be used to process your order, support your experience
                                    throughout this website, and for other purposes described in our <a
                                        href="terms.html" target="_blank">privacy policy</a>.
                                </div>
                            </div>

                            <button class="btn btn-primary process_cart" id="submit-order" type="submit">PLACE
                                ORDER</button>
                            <br />
                            <br />


                            <div class="alert alert-danger" style="display:none" id="error-order">

                            </div>


                            <script></script>
                        </div>
                    </div>
                </div>
            </form>


        </section>
    </main>

    <div class="mb-5 pb-xl-5"></div>
</x-app>
