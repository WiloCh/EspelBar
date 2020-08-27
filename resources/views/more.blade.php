<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Gestion del Bar</title>
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
        </style>
</head>
<body background="https://cdn.pixabay.com/photo/2018/06/29/08/15/doodle-3505459_960_720.png">
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
    <div class="container">
        <div class="row">
            <div class="col py-5">
                
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text text-center">Snacks</h3>
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="footer">
                    <a href="{{ url('/') }}"class="btn btn-primary">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.354 10.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L6.207 7.5H11a.5.5 0 0 1 0 1H6.207l2.147 2.146z"/>
                    </svg> Regresar
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>