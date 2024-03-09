
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>promina task</title>
    <link rel="stylesheet" href="{{ asset('user-dashboard') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('user-dashboard') }}/assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('user-dashboard') }}/assets/css/fontawesome/css/all.min.css">
  
    <style>
       *,body,div,p,span,label,h1,h2,h3,h4,h5,h6
        {
            font-family: 'Poppins';
            font-weight: 500;
        }

        .sidebar-menu .treeview-menu>li.active a,
        .sidebar-menu .treeview-menu>li a:hover
        {
            font-weight: bold !important;
            transform: translateX(10px);
        }
   </style>

</head>
<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper row">
      
          @include('users-dashboard.includes._header')
    
          @include('users-dashboard.includes._sidebar')

          <div class="content-wrapper col-lg-10 col-md-9 col-12" >

            <section class="content-header">
                <h1 class="dashboard-page-title">
                    @yield('pageTitle')
                </h1>
            </section>
              
            <section class="content">
              
                @yield('content')
            
            </section>

          </div>
      
      @include('users-dashboard.includes._footer')

    </div>


    @include('users-dashboard.layouts.footer-scripts')

    @stack('scripts')

</body>
</html>
