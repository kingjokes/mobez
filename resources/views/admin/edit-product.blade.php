<x-layout>
    <br />
    <br />

    <div class="row">

        <div class="col-12 col-md-1 col-lg-1">


        </div>
        <div class="col-12 col-md-10 col-lg-10">
            <h3>Edit Product - ({{ $details->name }})</h3>
            <br />
            <br />

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form name="login-form" action="/admin/edit-product" method="POST" enctype="multipart/form-data">

                @csrf
                <input name="id" value="{{ $details->id }}" hidden />
                <div class="form-floating mb-4">
                    <input value="{{ $details->name }}" name="name" type="text" required="required"
                        class="form-control form-control_gray" id="name" placeholder="Enter product name">
                    <label for="name">Product Name *</label>


                </div>
                <div class="form-floating mb-4">
                    <select value="{{ $details->category_id }}" name="category"required="required"
                        class="form-control form-control_gray" id="category">
                        <option value="">select a category</option>
                        @foreach ($categories as $result)
                            <option {{ $details->category_id === $result->id ? 'selected' : '' }}
                                value="{{ $result->id }}">
                                {{ $result->name }}</option>
                        @endforeach
                    </select>
                    <label for="category">Product Category *</label>

                </div>

                <div>
                    <img src="{{ $details->image }}" style="width:150px; height:150px" />
                </div>

                <div class="form-floating mb-4">
                    <input name="image" type="file" accept='image/*' class="form-control form-control_gray"
                        id="image" placeholder="Select a product image">
                    <label for="image">Product Main Image *</label>


                </div>

                <div class="form-floating mb-4">
                    <input value="{{ $details->price }}" name="price" type="number" min="0"
                        required="required" class="form-control form-control_gray" id="price"
                        placeholder="Enter product price">
                    <label for="name">Product Price *</label>


                </div>

                <div class="form-floating mb-4">
                    <textarea value="{{ $details->short_description }}" name="short_description" style="min-height:100px!important"
                        rows="4" type="text" required="required" class="form-control form-control_gray" id="short_description"
                        placeholder="Enter product short description">{{ $details->short_description }}</textarea>
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
                        function htmlDecode(input) {
                            var doc = new DOMParser().parseFromString(input, "text/html");
                            return doc.documentElement.textContent;
                        }
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
                        window.addEventListener('load', function() {
                            quill.root.innerHTML = htmlDecode("{{ $details->full_description }}")
                            document.getElementById('full_description').value = htmlDecode("{{ $details->full_description }}")
                        }, false)
                    </script>


                </div>


                <div class="form-floating mb-4">
                    <select name="status" value="{{ $details->status }}"required="required"
                        class="form-control form-control_gray" id="status">
                        <option value="">select status</option>
                        <option value="1" {{ $details->status == 1 ? 'selected' : '' }} class="text-success">
                            Active
                        </option>
                        <option value="0" {{ $details->status == 0 ? 'selected' : '' }} class="text-danger">
                            Inactive
                        </option>

                    </select>
                    <label for="status">Product Status *</label>

                </div>


                <div class='d-flex flex-wrap mb-4' style="gap:10px; width:100%">

                    @foreach ($product_images as $image)
                        <div class="mx-1">
                            <img src="{{ $image->image }}" style="width:100px; height:100px" />
                            <br />
                            <a href='/admin/delete-product-image/{{ $image->id }}' class="btn btn-danger"
                                style="font-size:10px!important; width:100px!important; padding:5px!important">
                                Delete Image
                            </a>
                        </div>
                    @endforeach

                </div>


                <div class="form-floating mb-4">
                    <input name="product_images[]" type="file" multiple accept='image/*'
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
