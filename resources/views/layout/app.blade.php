<!doctype html>
<html lang="es">

    <head>

        <meta charset="utf-8" />
        <title>@yield('titulo') | {{env('APP_NAME')}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">

        <link href="{{asset('assets/libs/metrojs/release/MetroJs.Full/MetroJs.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

        @yield('head')

    </head>

    <body data-topbar="dark">
        
        <!-- Begin page -->
        <div id="layout-wrapper">

            
            @include('layout.navbar')

            <!-- ========== Left Sidebar Start ========== -->
            @include('layout.sidebar')
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
  
                        @yield('contenido')
                                

                                
                                

                        

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © StyleSolutionPty.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Creado con <i class="mdi mdi-heart text-danger"></i> x StyleSolutionPty
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- JAVASCRIPT -->
        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

        <!--Morris Chart-->

        <script src="{{asset('assets/libs/morris.js/morris.min.js')}}"></script>
        <script src="{{asset('assets/libs/raphael/raphael.min.js')}}"></script>
        <script src="{{asset('assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>
        <script src="{{asset('assets/libs/metrojs/release/MetroJs.Full/MetroJs.min.js')}}"></script>

        <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

        <script src="{{asset('assets/js/app.js')}}"></script>

        @yield('js')
                <!-- Required datatable js -->
        

    </body>

</html>