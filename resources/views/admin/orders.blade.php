<x-layout>
    <div>
        <br />
        <br />

        <div class="row">

             
            <div class="col-12 col-md-12 col-lg-12">


                <div class="d-flex flex-row justify-space-between "
                    style="width:100%; justify-content:space-between; align-items:center">

                    <h5>Orders</h5>



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
                        {{ session('error') }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Order Id</th>
                          
                            <th>Customer name</th>
                            <th>Customer Email</th>
                            <th>Address</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date Ordered</th>
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
                                <td>{{ $result->order_id }}</td>
                                 <td>{{ $result->firstname }} {{$result->lastname}}</td>
                                <td>{{ $result->mail }} </td>
                                <td>{{ $result->address }} </td>
                                <td>{{ number_format($result->total) }}</td>
                                
                                <td><span class="{{ $result->status ? 'text-beige' : 'text-danger' }}">
                                        {{ $result->status ? 'Processed' : 'Pending' }}</span></td>
                                <td>{{ $result->created_at }}</td>

                                <td>

                                    <a href="/admin/order-details/{{ $result->id }}" style="font-size:13px"
                                        class="btn btn-info btn-small" style="width:150px;">
                                        View Order
                                    </a>
                                    <a href="/admin/delete-order/{{ $result->id }}" style="font-size:13px"
                                        class="btn btn-danger btn-small" style="width:150px;">
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
