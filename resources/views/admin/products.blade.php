<x-layout>
    <div>
        <br />
        <br />

        <div class="row">

            
            <div class="col-12 col-md-12 col-lg-12">


                <div class="d-flex flex-row justify-space-between "
                    style="width:100%; justify-content:space-between; align-items:center">

                    <h5>Product</h5>

                    <a href="/admin/add-product" class="btn btn-success small btn-small">
                        Add New Product
                    </a>
                    
                </div>
                <br />
                <br />


                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Short Description</th>
                            <th>Status</th>
                            <th>Date added</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($data as $result)
                            <tr style="border-bottom: 1px solid grey">
                                <td>{{ $count }}</td>
                                <td>{{ $result->name }}</td>
                                <td><img src="{{ $result->image }}" style="width:80px; height:80px" /></td>
                                <td>{{ $result->category_name }}</td>
                                <td>{{ number_format($result->price) }}</td>
                                <td>{{ $result->short_description }}</td>
                                <td><span class="{{ $result->status ? 'text-beige' : 'text-danger' }}">
                                        {{ $result->status ? 'Active' : 'Inactive' }}</span></td>
                                <td>{{ $result->created_at }}</td>

                                <td>
                                
                                 <a href="/admin/edit-product/{{ $result->id }}" style="font-size:13px" class="btn btn-info btn-small"
                                        style="width:150px;">
                                        View Product
                                    </a>
                                    <a href="/admin/delete-product/{{ $result->id }}" style="font-size:13px" class="btn btn-danger btn-small"
                                        style="width:150px;">
                                        Delete
                                    </a>
                                </td>
                            </tr>

                            @php
                                $count += 1;
                            @endphp
                        @endforeach


                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-layout>
