<x-layout>
    <div>
        <br />
        <br />

        <div class="row">

            <div class="col-1 col-md-1 col-lg-1">


            </div>
            <div class="col-12 col-md-10 col-lg-10">

                <div class="row">

                    <div class="col-6 col-md-4 col-lg-4" style="">

                        <div style="background-color:lightgrey;padding:20px 20px; border-radius:10px">



                            <h6>
                                Total Products
                            </h6>

                            <h1>{{ number_format($products)}}</h1>

                        </div>



                    </div>
                    <div class="col-6 col-md-4 col-lg-4" style="">

                        <div style="background-color:lightgrey;padding:20px 20px; border-radius:10px">



                            <h6>
                                Total Orders
                            </h6>

                            <h1>{{ number_format($orders)}}</h1>

                        </div>



                    </div>
                    <div class="col-6 col-md-4 col-lg-4" style="">

                        <div style="background-color:lightgrey;padding:20px 20px; border-radius:10px">



                            <h6>
                                Total Reviews
                            </h6>

                            <h1>{{ number_format($reviews)}}</h1>

                        </div>



                    </div>
                    <div class="col-6 col-md-4 col-lg-4" style="">
                    <br/>

                        <div style="background-color:lightgrey;padding:20px 20px; border-radius:10px">



                            <h6>
                                Total Product Images
                            </h6>

                            <h1>{{ number_format($product_images)}}</h1>

                        </div>



                    </div>
                    <div class="col-6 col-md-4 col-lg-4" style="">
                    <br/>

                        <div style="background-color:lightgrey;padding:20px 20px; border-radius:10px">



                            <h6>
                                Total Categories
                            </h6>

                            <h1>{{ number_format($categories)}}</h1>

                        </div>



                    </div>

                </div>

            </div>

            <div class="col-1 col-md-1 col-lg-1">




            </div>

        </div>


    </div>
</x-layout>
