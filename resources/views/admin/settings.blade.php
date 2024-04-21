<x-layout>
    <div>
        <br />
        <br />

        <div class="row">

            <div class="col-1 col-md-1 col-lg-1">


            </div>
            <div class="col-12 col-md-5 col-lg-5">


                <h3>Settings</h3>



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
                <div>
                    <h6>E-commerce Currency</h6>
                    <br />
                    <form name="login-form" action="/admin/update-settings" method="POST">

                        @csrf
                        <div class="form-floating mb-4">
                            <input name="name" value="{{ $currency->name }}" hidden />
                            <select name="value" value="{{ $currency->value }}"required="required"
                                class="form-control form-control_gray" id="status">
                                <option value="">select currency</option>
                                <option value="$" {{ $currency->value == '$' ? 'selected' : '' }}>
                                    Dollars ($)
                                </option>
                                <option value="£" {{ $currency->value == '£' ? 'selected' : '' }}>
                                    Pounds (£)
                                </option>
                                <option value="€" {{ $currency->value == '€' ? 'selected' : '' }}>
                                    Euros (€)
                                </option>
                                <option value="₦" {{ $currency->value == '₦' ? 'selected' : '' }}>
                                    Naira (₦)
                                </option>


                            </select>
                            <label for="status">Currency *</label>

                        </div>



                        <button class="btn btn-primary w-100 " type="submit">Update Currency</button>


                    </form>

                </div>

                <br />
                <br />

                <div>
                    <h6>Change Password</h6>
                    <br />
                    <form name="login-form" action="/admin/change-password" method="POST">

                        @csrf
                        <div class="form-floating mb-4">
                            <input name="oldPassword" type="password" required="required"
                                class="form-control form-control_gray" id="oldPassword" />
                            <label for="oldPassword">Old Password</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input name="newPassword" type="password" min="6" required="required"
                                class="form-control form-control_gray" id="newPassword" />
                            <label for="newPassword">New Password</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input name="cPassword" type="password" min="6" required="required"
                                class="form-control form-control_gray" id="cPassword" />
                            <label for="cPassword">Confirm Password</label>
                        </div>





                        <button class="btn btn-primary w-100 " type="submit">Update Password</button>


                    </form>
                </div>





            </div>

        </div>


    </div>

    </x-laout>
