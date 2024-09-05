<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | {{env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="auth-body-bg">

    <div class="container-fluid">
        <!-- Log In page -->
        <div class="row">
            <div class="col-lg-3 pe-0">
                <div class="card mb-0 shadow-none">
                    <div class="card-body">
                        
                       
                        <div class="px-2 mt-2" style="padding-top: 50%;">
                            <h3 class="text-center m-0">
                                <img src="{{asset('images/fondo.png')}}"
                                         height="60" alt="logo" class="my-3">
                             </h3>
                           
                            <form action="" method="POST" role="form" action="{{route('login.login')}}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="username">Usuario</label>
                                    <div class="input-group">

                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="far fa-user"></i></span>

                                        <input type="text" class="form-control" name="usuario" id="username" value="{{ old('usuario')}}"
                                            placeholder="Ingrese el Usuario" required>
                                            
                                    </div>
                                    @error('usuario') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="userpassword">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon2"><i
                                                class="fa fa-key"></i></span>
                                        <input type="password" class="form-control" id="userpassword"
                                            placeholder="Ingrese la Contraseña" name="password">
                                            
                                    </div>
                                    @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                </div>

                               
                               

                                <div class="mb-3 mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">
                                            Ingresar
                                            <i class="fas fa-sign-in-alt ms-1"></i></button>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </form>
                            <!-- end form -->
                        </div>
                      
                        <div class="mt-4 text-center">
                            <p class="mb-0">©
                                <script>document.write(new Date().getFullYear())</script> creado por StyleSolution 
                                <a href="https://stylesolutionpty.com/">StyleSolutionPty.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-lg-9 p-0 vh-100  d-flex justify-content-center">
                <div class="accountbg d-flex align-items-center">
                    <div class="account-title text-center text-white">
                        <h4 class="mt-3 text-white"> </h4>
                        <h1 class="text-white">Bienvenido a <span class="text-info">VALMAR</span></h1>                        
                        <div class="border w-25 mx-auto border-warning"></div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- End Log In page -->
    </div>



    <!-- JAVASCRIPT -->
    <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

    <script src="{{asset('assets/js/app.js')}}"></script>

</body>

</html>