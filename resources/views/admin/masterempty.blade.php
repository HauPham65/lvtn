<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.widgets.head')
    <style>
        body {
            margin-top: 50px;
            background-image: url({{ asset('admin/img/hinh-nen-cong-nghe-full-hd.jpg') }});
            background-repeat: no-repeat;


        }

        .container {
            width: 600px;
        }

        h3 {
            justify-content: center;
            text-align: center;
            font-weight: bold;
            font-size: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
<!-- end document-->
