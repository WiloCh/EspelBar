<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestion de Bar</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 10vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 54px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .fondo{
                background: url('https://lh5.googleusercontent.com/N-LJ1RkmV_NQ98vGoMUNvb2qNpqCiF1v5uEk-iGug_kjWZTuw74slk3_BczXvD9jEwkeNUMevgk5h-1TnuveHB3xjT_BscCt10bbIgL33DAl8qlbSG7kbD17r4MUrlExkEQ8RETHsftUq5flmA');
                height: 55vh;
                background-position: center;
                background-size: cover;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height navbar-dark bg-success">
        
            @if (Route::has('login'))
                <ul class="navbar-nav mr-auto">
                    <img class="d-block"  width="35%" src="https://www.espe-innovativa.edu.ec/ambiente/wp-content/uploads/logo-espe-blanco.png" alt="First slide">
                </ul>
                <div class="top-right links ">
                    @auth
                        
                        <a href="{{ url('/home') }}" class="text-white">Home</a>
                        
                    @else
                        
                        <a href="{{ route('login') }}" class="text-white">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-white">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <div class="content py-5 fondo">
                <div class="title text-dark">
                    Bar ESPE-Latacunga
                </div>
            </div>
        <div class="container py-4">
            <div class="row">
                <div class="col">
                    <div class="card-deck">
                        <div class="card ">
                            <div class="card-body">
                            <h3 class="card-title text text-center font-weight-bold">Menus</h3>
                            
                            
                            <table class="table table-hover table-striped table-warning">
                                <thead>
                                    <tr>
                                    <th scope="col">Campus</th>
                                    <th scope="col">Bar</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Disponible</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($menus as $menu)
                                    <tr>
                                        <td>{{$menu->bar->campus->nombre}}</td>
                                        <td>{{$menu->bar->nombre}}</td>
                                        <td>{{$menu->nombre}}</td>
                                        <td>{{$menu->precio}}</td>
                                        <td>
                                            @if ($menu->disponible==1)
                                            {{'Si'}}
                                            @endif 
                                            @if($menu->disponible==0)
                                            {{'No'}}
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title text text-center font-weight-bold">Snacks</h3>
                            
                                <table class="table table-hover table-striped table-info">
                                    <thead>
                                        <tr>
                                        <th scope="col">Campus</th>
                                        <th scope="col">Bar</th>
                                        <th scope="col">Snack</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Disponible</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($snacks as $snack)
                                            @if($snack->id <= 4)
                                            <tr>
                                            <td>{{$snack->bar->campus->nombre}}</td>
                                            <td>{{$snack->bar->nombre}}</td>
                                            <td>{{$snack->nombre}}</td>
                                            <td>{{$snack->precio}}</td>
                                            <td>
                                                @if ($snack->disponible==1)
                                                {{'Si'}}
                                                @endif 
                                                @if($snack->disponible==0)
                                                {{'No'}}
                                                @endif
                                            </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                <a href="{{ url('/more') }}"class="btn btn-primary">Ver Más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <footer class="text-white bg-success py-2">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p>Email: <br> jhguanochanga@espe.edu.ec <br> wachugchilan@espe.edu.ec</p>
                </div>
                <div class="col">
                    <p>Copyright &copy; 2020 by Jhon Guanochanga , William Chugchilan</p>
                </div>
            </div>
        </div>
    </footer>
    </body>
</html>
