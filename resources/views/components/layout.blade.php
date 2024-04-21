
<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="flexkit" />

    <link rel="shortcut icon" href="mobez.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" />

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Allura&amp;display=swap" rel="stylesheet" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('./css/plugins/swiper.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('./css/style.css') }}" type="text/css" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--[if lt IE 9]>
      <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- Document Title -->
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />

    <style>
        .sidebar_link {
            display: inline-block !important;
            padding: 10px 20px !important;
            background-color: transparent !important;
            color: #000 !important;
            font-size: 16px !important;
            font-weight: 500 !important;
            width: 100% !important;
            margin-bottom: 5px !important;
        }

        .sidebar_link:hover {
            background-color: #f5e6e0 !important;
            color: grey;
            transistion: all 1s;

        }

        .sidebar_active {
            background-color: #f5e6e0 !important;
            color: #222222 !important
        }
    </style>

</head>

<body>



    <div style="display:flex; flex-direction:row">
        <div style="height:100vh; background-color:whitesmoke; width:250px">

            <div style="padding: 40px 10px 50px; text-align:center!important" class="text-center">

                <div class="logo">
                    <a href="/">
                        <img src="/images/mobez.png" alt="Mobez" class="logo__image d-block">
                    </a>
                </div>


            </div>
            <a href="/admin/dashboard"
                class="{{ Route::current()->getName() === 'admin.dashboard' ? 'sidebar_active' : '' }} sidebar_link">Dashboard</a>
            <a href="/admin/product-categories"
                class="{{ Route::current()->getName() === 'admin.category' ? 'sidebar_active' : '' }} sidebar_link">Product
                Categories</a>
            <a href="/admin/products"
                class="{{ Route::current()->getName() === 'admin.products' ? 'sidebar_active' : '' }} sidebar_link">Products</a>
            <a href="/admin/orders"
                class="{{ Route::current()->getName() === 'admin.orders' ? 'sidebar_active' : '' }} sidebar_link">Orders</a>
            <a href="/admin/reviews"
                class="{{ Route::current()->getName() === 'admin.reviews' ? 'sidebar_active' : '' }} sidebar_link">Reviews</a>
            <a href="/admin/settings"
                class="{{ Route::current()->getName() === 'admin.settings' ? 'sidebar_active' : '' }} sidebar_link">Settings</a>

            <a href="/admin/logout" style="color:red!important; " class="sidebar_link">Logout</a>


        </div>

        <div style="flex-grow:1">

            <div
                style="position:fixed;z-index:999!important; height:80px;background-color:#F3EDDF; display:flex; justify-content:space-between; padding:10px 20px; width:calc(100% - 250px); align-items:center">

                <h6 style="text-transform:capitalize">{{ str_replace('admin.', '', Route::current()->getName()) }}</h6>

                <div>
                    <span>Welcome,</span> <b>{{ session()->get('admin_name') }}</b>
                </div>

            </div>
            <div style="margin-top:100px; padding:0 20px; widith:100%; ">
                {{ $slot }}
            </div>




        </div>

    </div>













    <!-- External JavaScripts -->

    <script src="{{ asset('./js/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('./js/plugins/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('./js/plugins/bootstrap-slider.min.js') }}"></script>

    <script src="{{ asset('./js/plugins/swiper.min.js') }}"></script>
    <script src="{{ asset('./js/plugins/countdown.js') }}"></script>

    <!-- Footer Scripts -->
    <script src="{{ asset('./js/theme.js') }}"></script>




</body>

</html>
