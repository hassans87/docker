<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href={{ asset('icons/pulse.png') }} type="image/png" sizes="32x32">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/com.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/notiflix 2.7.0/notiflix-2.7.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/notiflix 2.7.0/notiflix-aio-2.7.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="{{ asset('js/com.js') }}"></script>
    <title> Veolink Data Export </title>
</head>
<body>

    <body>
        <table class="table-sm table-responsive table-light table-bordered">
            <thead class="badge-light3d">
                <tr style="text-align: center; vertical-align:middle;">
                    <th>Sr</th>
                    <th>Database name</th>
                    <th>Data source</th>
                    <th>Skid</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr style="text-align: center; vertical-align:middle;">
                    <td>1 </td>
                    <td>Seawater Intake Pumps and Analyers </td>
                    <td>Veolin Care</td>
                    <td>- </td>
                    <td><button class="btn btn-sm btn-primary">Download </button> </td>
                </tr>
                <tr style="text-align: center; vertical-align:middle;">
                    <td>2 </td>
                    <td>DAF North</td>
                    <td>Veolin Care</td>
                    <td>- </td>
                    <td><button class="btn btn-sm btn-primary">Download </button> </td>
                </tr>

                <tr style="text-align: center; vertical-align:middle;">
                    <td>3 </td>
                    <td> DAF South</td>
                    <td>Veolin Care</td>
                    <td>- </td>
                    <td><button class="btn btn-sm btn-primary">Download </button> </td>
                </tr>

                <tr style="text-align: center; vertical-align:middle;">
                    <td>4 </td>
                    <td>Self-Cleaning Filters</td>
                    <td>Veolin Care</td>
                    <td>- </td>
                    <td><button class="btn btn-sm btn-primary">Download </button> </td>
                </tr>

                <tr style="text-align: center; vertical-align:middle;">
                    <td>5 </td>
                    <td>UF North</td>
                    <td>Veolin Care</td>
                    <td>- </td>
                    <td><button class="btn btn-sm btn-primary">Download </button> </td>
                </tr>

                <tr style="text-align: center; vertical-align:middle;">
                    <td>6 </td>
                    <td>UF South</td>
                    <td>Veolin Care</td>
                    <td>- </td>
                    <td><button class="btn btn-sm btn-primary">Download </button> </td>
                </tr>

                <tr style="text-align: center; vertical-align:middle;">
                    <td>7 </td>
                    <td>RO Feed</td>
                    <td>Veolin Care</td>
                    <td>- </td>
                    <td><button class="btn btn-sm btn-primary">Download </button> </td>
                </tr>

                <tr style="text-align: center; vertical-align:middle;">
                    <td>8 </td>
                    <td>RO First Pass Normalization</td>
                    <td>Veolin Care</td>
                    <td>41A </td>
                    <td><button class="btn btn-sm btn-primary">Download </button> </td>
                </tr>

                <tr style="text-align: center; vertical-align:middle;">
                    <td>9 </td>
                    <td>RO Second Pass Normalization</td>
                    <td>Veolin Care</td>
                    <td>43A </td>
                    <td><button class="btn btn-sm btn-primary">Download </button> </td>
                </tr>

                <tr style="text-align: center; vertical-align:middle;">
                    <td>10 </td>
                    <td>RO First Pass CIP</td>
                    <td>Gsheet</td>
                    <td>- </td>
                    <td><button class="btn btn-sm btn-primary">Download </button> </td>
                </tr>
            </tbody>
        </table>
        <div class="col-auto">

        </div>

        <div id="datatest">

        </div>

        <div style="margin-bottom:100px">

        </div>





        <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark" style="background-color:rgba(0, 0, 0, 0.8)">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav">
                        <li class="nav-item" style="margin-top:8px">
                        </li>
                        <li class="nav-item dropup">
                            <a class="nav-link" href="#" id="dropdown10" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa fa-bars" aria-hidden="true" style="color:rgb(121, 119, 119);"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown10">
                                <li><a href="{{ url('/register') }}" style="text-decoration: none;"
                                        class="dropdown-item menu ">
                                        <i class="ancher fa fa-user-plus" aria-hidden="true"></i>&nbsp;Add New User</a>
                                </li>
                                <li><a class="dropdown-item" href="#">User Profile</a></li>
                                <li><a class="dropdown-item" href="#">
                                        <i class="fa fa-key" aria-hidden="true"></i>&nbsp;Change Password</a></li>
                                <li><a class="dropdown-item" href="#">Admin</a></li>
                                <li>
                                    <form class="" method="POST" action="/logout">
                                        @csrf
                                        <button type="submit" class="dropdown-item menu">
                                            <i class="fa fa-sign-out" aria-hidden="true"
                                                style="color:rgb(18, 17, 17);"></i> &nbsp;Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <div class="col-auto" style="margin-right:5px;">
                                <a href="{{ url('/home') }}">
                                    <button class="btn form-control btn-sm badge-light3d">Home &nbsp;
                                        <i class="fa fa-home" aria-hidden="true" style="color:black;"></i></button></a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <div class="col-auto" style="margin-right:8px;">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">From
                                    </div>

                                    <input type="date" name="start_date"
                                        class="tensor-flow form-control form-control-sm" id="start_date"
                                        value="2023-03-01" min="2016-01-01" max="2027-11-10" required=""
                                        style="background-color:#dff9fb;">
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="col-auto" style="margin-right:5px;">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">To
                                    </div>
                                    <input type="date" name="end_date" id="end_date" value="2023-03-31"
                                        min="2016-01-31" max="2027-03-30"
                                        class="tensor-flow form-control form-control-sm" required=""
                                        style="background-color:#dff9fb;">
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <script type="text/javascript" src="{{ asset('js/stream/veolink_dataExport.js') }}"></script>
    </body>

</html>
