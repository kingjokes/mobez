<x-layout>

    <div>
        <br />
        <br />

        <div class="row">

            <div class="col-12 col-md-3 col-lg-3">


            </div>
            <div class="col-12 col-md-6 col-lg-6">


                <div class="d-flex flex-row justify-space-between "
                    style="width:100%; justify-content:space-between; align-items:center">

                    <h5>Prooduct Categories</h5>

                    <a href="/admin/add-category" class="btn btn-secondary btn-small">
                        Add New Category
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
                                <td><a href="/admin/delete-category/{{ $result->id }}"
                                        class="btn btn-danger btn-small" style="width:150px;">
                                        Delete
                                    </a></td>
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
