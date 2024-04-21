<x-layout>

    <div>
        <br />
        <br />

        <div class="row">

            <div class="col-12 col-md-3 col-lg-3">


            </div>
            <div class="col-12 col-md-6 col-lg-6">

                <h3>Add a new product category</h3>
                <br />
                <br />

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form name="login-form" action="/admin/new-category" method="POST">

                    @csrf
                    <div class="form-floating mb-3">
                        <input name="name" type="text" required="required" class="form-control form-control_gray"
                            id="name" placeholder="Enter category name">
                        <label for="name">Category name *</label>
                    </div>

                    <div class="pb-3"></div>



                    <button class="btn btn-primary w-100 text-uppercase" type="submit">Submit</button>


                </form>



            </div>


        </div>

    </div>







</x-layout>
