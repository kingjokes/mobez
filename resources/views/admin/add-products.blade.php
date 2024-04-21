<x-layout>
    <br />
    <br />

    <div class="row">

        <div class="col-12 col-md-1 col-lg-1">


        </div>
        <div class="col-12 col-md-10 col-lg-10">
            <h3>Add a new product</h3>
            <br />
            <br />

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form name="login-form" action="/admin/add-new-product" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="form-floating mb-4">
                    <input name="name" type="text" required="required" class="form-control form-control_gray"
                        id="name" placeholder="Enter product name">
                    <label for="name">Product Name *</label>


                </div>
                <div class="form-floating mb-4">
                    <select name="category"required="required" class="form-control form-control_gray" id="category">
                        <option value="">select a category</option>
                        @foreach ($categories as $result)
                            <option value="{{ $result->id }}">{{ $result->name }}</option>
                        @endforeach
                    </select>
                    <label for="category">Product Category *</label>

                </div>

                <div class="form-floating mb-4">
                    <input name="image" type="file" accept='image/*' required="required"
                        class="form-control form-control_gray" id="image" placeholder="Select a product image">
                    <label for="image">Product Main Image *</label>


                </div>

                <div class="form-floating mb-4">
                    <input name="price" type="number" min="0" required="required"
                        class="form-control form-control_gray" id="price" placeholder="Enter product price">
                    <label for="name">Product Price *</label>


                </div>

                <div class="form-floating mb-4">
                    <textarea name="short_description" style="min-height:100px!important" rows="4" type="text" required="required"
                        class="form-control form-control_gray" id="short_description" placeholder="Enter product short description"></textarea>
                    <label for="short_description">Product Short Description *</label>


                </div>

                <div class="form-floating mb-4">
                    <div for="description">Product Full Description *</div>
                    <div id="toolbar-container">
                        <span class="ql-formats">
                            <select class="ql-font"></select>
                            <select class="ql-size"></select>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-bold"></button>
                            <button class="ql-italic"></button>
                            <button class="ql-underline"></button>
                            <button class="ql-strike"></button>
                        </span>
                        <span class="ql-formats">
                            <select class="ql-color"></select>
                            <select class="ql-background"></select>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-script" value="sub"></button>
                            <button class="ql-script" value="super"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-header" value="1"></button>
                            <button class="ql-header" value="2"></button>
                            <button class="ql-blockquote"></button>
                            <button class="ql-code-block"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-list" value="ordered"></button>
                            <button class="ql-list" value="bullet"></button>
                            <button class="ql-indent" value="-1"></button>
                            <button class="ql-indent" value="+1"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-direction" value="rtl"></button>
                            <select class="ql-align"></select>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-link"></button>
                            <button class="ql-image"></button>
                            <button class="ql-video"></button>
                            <button class="ql-formula"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-clean"></button>
                        </span>
                    </div>
                    <div id="editor" style="min-height:200px">
                    </div>

                    <!-- Initialize Quill editor -->
                    <script>
                        const quill = new Quill('#editor', {
                            modules: {
                                syntax: true,
                                toolbar: '#toolbar-container',
                            },
                            placeholder: 'Enter your product full description....',
                            theme: 'snow',
                        });

                        quill.on('text-change', (delta, oldDelta, source) => {
                            document.getElementById('full_description').value = quill.getSemanticHTML()


                        })
                    </script>


                </div>


                <div class="form-floating mb-4">
                    <select name="status"required="required" class="form-control form-control_gray" id="category">
                        <option value="">select status</option>
                        <option value="1" class="text-success">Active</option>
                        <option value="0" class="text-danger">Inactive</option>

                    </select>
                    <label for="status">Product Status *</label>

                </div>


                <div class="form-floating mb-4">
                    <input name="product_images[]" type="file" multiple accept='image/*' required="required"
                        class="form-control form-control_gray" id="image"
                        placeholder="Select other product images">
                    <label for="product_images">Product Other Images *</label>


                </div>

                <input name="full_description" id="full_description" value="" hidden />






                <div class="pb-3"></div>



                <button class="btn btn-primary w-100 text-uppercase" type="submit">Submit</button>

                <div class="pb-3"></div>
            </form>




        </div>

    </div>




</x-layout>
