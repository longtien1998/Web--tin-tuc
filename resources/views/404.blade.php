<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 | NOT FOUND</title>
    <link rel="icon" href="{{ asset('admin/assets/img/kaiadmin/favicon.ico')}}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/kaiadmin.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css')}}" />


</head>

<body>
    <div class="wapper">
        <div class="main-panel w-100" >
            <div class="container d-flex justify-content-center align-items-center">
                <div class="page-inner" >
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{asset('admin/assets/img/undraw/undraw_not_found_60pq.svg')}}" width="250" alt="Page Not Found">
                        <h2 class="h1 mt-4 mb-4 fw-bold">Sorry! page not found.</h2>
                        <p class="text-center op-7 mb-5 h5">Website is Under Construction. Check back later!<br></p>
                        <div>
                            <a href="" onclick="window.history.back()" class="btn btn-border btn-primary me-3">GO BACK</a>
                            <a href="{{route('home')}}" class="btn btn-primary">GO TO HOME PAGE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(session('error'))
        <script>
            alert("{{ session('error') }}");
            // console.log("{{session('error')}}");
        </script>
        @endif
    </div>



</body>

</html>
