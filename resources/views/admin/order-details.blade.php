<x-layout>
    <div>
        <br />
        <br />

        <div class="row">


            <div class="col-12 col-md-1 col-lg-1"></div>
            <div class="col-12 col-md-10 col-lg-10">


                <div class="d-flex flex-row justify-space-between "
                    style="width:100%; justify-content:space-between; align-items:center">

                    <h5>Order Details - <b>#{{ $details->id }}</b></h5>



                </div>
                <br />
                <br />


                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-success">
                        {{ session('error') }}
                    </div>
                @endif

                <table class="table">

                    <tbody>
                        <tr style="border-bottom: 1px solid grey">
                            <td><b>Order Id</b></td>
                            <td>#{{ $details->order_id }}</td>

                        </tr>


                        <tr style="border-bottom: 1px solid grey">
                            <td><b>Customer Details</b></td>
                            <td>{{ $details->firstname }} {{ $details->lastname }}</td>

                        </tr>
                        <tr style="border-bottom: 1px solid grey">
                            <td><b>Customer Email</b></td>
                            <td>{{ $details->mail }} </td>

                        </tr>
                        <tr style="border-bottom: 1px solid grey">
                            <td><b>Address</b></td>
                            <td>{{ $details->address }}</td>

                        </tr>
                        <tr style="border-bottom: 1px solid grey">
                            <td><b>Town</b></td>
                            <td>{{ $details->town }}</td>

                        </tr>
                        <tr style="border-bottom: 1px solid grey">
                            <td><b>Country</b></td>
                            <td>{{ $details->country }}</td>

                        </tr>
                        <tr style="border-bottom: 1px solid grey">
                            <td><b>Postal Code</b></td>
                            <td>{{ $details->postal_code }}</td>

                        </tr>

                        <tr style="border-bottom: 1px solid grey">
                            <td><b>Order Note </b></td>
                            <td>{{ $details->order_notes }}</td>

                        </tr>
                        <tr style="border-bottom: 1px solid grey">
                            <td><b>Order Breakdown </b></td>
                            <td>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Image</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>

                                    </thead>
                                    <tbody id="order-content">


                                    </tbody>

                                </table>

                            </td>

                        </tr>
                        <tr style="border-bottom: 1px solid grey">
                            <td><b>Total </b></td>
                            <td><b>{{ number_format($details->total) }}</b></td>

                        </tr>
                        <tr style="border-bottom: 1px solid grey">
                            <td><b>Date Ordered </b></td>
                            <td>{{ $details->created_at }}</td>

                        </tr>
                        <tr style="border-bottom: 1px solid grey">
                            <td><b>Order Status </b></td>
                            <td><span class="{{ $details->status ? 'text-beige' : 'text-danger' }}">
                                    {{ $details->status ? 'Processed' : 'Pending' }}</span>
                            </td>

                        </tr>
                        <tr style="border-bottom: 1px solid grey">
                            <td><b>Update Order Status </b></td>
                            <td>
                                <form name="login-form" action="/admin/update-order" method="POST"
                                    style="max-width:400px!important">

                                    @csrf
                                    <div class="form-floating mb-4">
                                        <input name="id" value="{{ $details->id }}" hidden />
                                        <select name="status" value="{{ $details->status }}"required="required"
                                            class="form-control form-control_gray" id="status">
                                            <option value="">select status</option>
                                            <option value="1" {{ $details->status == 1 ? 'selected' : '' }}
                                                class="text-success">
                                                Processed
                                            </option>
                                            <option value="0" {{ $details->status == 0 ? 'selected' : '' }}
                                                class="text-danger">
                                                Pending
                                            </option>

                                        </select>
                                        <label for="status">Order Status *</label>

                                    </div>



                                    <button class="btn btn-primary w-100 text-uppercase" type="submit">Update
                                        Status</button>


                                </form>
                            </td>

                        </tr>
                    </tbody>

                </table>

            </div>

        </div>

        <script>
            function htmlDecode(input) {
                var doc = new DOMParser().parseFromString(input, "text/html");
                return doc.documentElement.textContent;
            }

            const formatAmount = (nStr) => {
                if (nStr === undefined) return 0;
                nStr += "";
                let x = nStr.split(".");
                let x1 = x[0];
                let x2 = x.length > 1 ? "." + x[1] : "";
                let rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, "$1" + "," + "$2");
                }
                return x1 + x2;
            };


            const listOrders = (array) => {
                let data = ``

                JSON.parse(array || "[]").map(item => {

                    data += `<tr>
                                        <td class="text-capitalize"><b>${item.name}</b></td>
                                        <td><img src="${item.image}" style="width:90px; height:90px" /></td>
                                        <td><span>${item.quantity}</span></td>
                                        <td><b>${formatAmount(item.quantity * item.price)}</b></td>
                                        
                                </tr>
                `
                })

                document.getElementById("order-content").innerHTML = data




            }
            listOrders(htmlDecode('{{ $details->order_breakdown }}'))
        </script>

    </div>

</x-layout>
