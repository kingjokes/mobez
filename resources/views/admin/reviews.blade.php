<x-layout>
    <div>
        <br />
        <br />

        <div class="row">


            <div class="col-12 col-md-12 col-lg-12">


                <div class="d-flex flex-row justify-space-between "
                    style="width:100%; justify-content:space-between; align-items:center">

                    <h5>Product Reviews</h5>

                </div>
                <br />
                <br />


                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Product</th>
                            <th>Rating</th>
                            <th>Reviewer name</th>
                            <th>Reviewer Email</th>
                            <th>Review</th>
                            <th>Date </th>
                            <th>Action </th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($data as $result)
                            <tr style="border-bottom: 1px solid grey">
                                <td>{{ $count }}</td>
                                <td>{{ $result->product_name }}</td>
                                <td>{{ $result->rating }} / 5</td>
                                <td>{{ $result->name }}</td>
                                <td>{{ $result->email }} </td>
                                <td>{{ $result->review }} </td>
                                <td>{{ $result->created_at }} </td>
                                <td> <a href="/admin/delete-review/{{ $result->id }}" style="font-size:13px"
                                        class="btn btn-danger btn-small" style="width:150px;">
                                        Delete
                                    </a> </td>



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
