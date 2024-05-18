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
   
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_red.css">
    
    <title>RO First Pass Data Cleaning </title>
</head>
<body class="">
    <h3 class="text-info"> This page is under development </h3>
    <br>

    <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark"
        style="background-color:rgba(0, 0, 0, 0.7); padding-top:2px; padding-bottom:0px;">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:1px;">
                            <a href="{{ url('/home') }}">
                                <button class="btn btn-sm badge-light3d"><span style="font-size: 14px;"> 🏠 </span>
                                     
                                </button></a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:1px;">
                            <a href="{{ url('/DataCleansing') }}">
                                <button class="btn btn-sm badge-light3d"><span style="font-size: 14px;"> ↩️ </span>
                                    
                                </button></a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:1px;">
                            <div class="input-group input-group-sm">
                                <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">🗓️ From
                                </div>

                                <input type="date" name="start_date"
                                    class="form-control form-control-sm" id="start_date"
                                    value="2024-01-01" min="2016-01-01" max="2027-11-10"
                                    required="" style="background-color:#dff9fb;" contenteditable>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:1px;">
                            <div class="input-group input-group-sm">
                                <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">🗓️ To
                                </div>
                                <input type="date" name="end_date" id="end_date"
                                    value="2024-05-01" min="2016-01-31" max="2027-03-30"
                                    class="tensor-flow form-control form-control-sm" required=""
                                    style="background-color:#dff9fb;">
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:1px;">
                            <div class="input-group input-group-sm">
                                <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm"><span
                                        style="font-size: 14px;"> 🏷️ </span> Skid</div>
                                <select class="query form-control form-control-sm form-select" id="skidx"
                                    style="background-color:#dff9fb;">
                                    <option value="a" > 41-A</option>
                                    <option value="b" >41-B</option>
                                    <option value="c" >41-C</option>
                                    <option value="d" >41-D</option>
                                    <option value="e" >41-E</option>
                                    <option value="f" >41-F</option>
                                    <option value="g" >41-G</option>
                                    <option value="h" >41-H</option>
                                    <option value="i" >41-I</option>
                                    <option value="j" >41-J</option>
                                    <option value="k" >41-K</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:3px;">
                            <div class="input-group input-group-sm">
                                <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">
                                        Where </div>
                                <select class="query form-control form-control-sm form-select" id="where"
                                    style="background-color:#dff9fb;">
                                    <option value="a" >DPI</option>
                                    <option value="b" >HP Feed Flow</option>
                                    <option value="c" >Rear EC</option>
                                    <option value="d" >Salt Rejection</option>
                                    <option value="e" >Salt Passage</option>
                                    <option value="f" >Permeate Flow</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:3px;">
                            <div class="input-group input-group-sm">
                                <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">
                                       Condition </div>
                                <select class="query form-control form-control-sm form-select" id="where_logic"
                                    style="background-color:#dff9fb;">
                                    <option value="a" >More Than</option>
                                    <option value="b" >Less Than</option>
                                    <option value="c" >Between</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:3px;">
                            <div class="input-group input-group-sm">
                                <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">
                                        Value </div>
                                <input type="text" class="form-control form-control-sm" id="where_input"
                                    style="background-color:#dff9fb;" >
                                    
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:3px;">
                            <div class="input-group input-group-sm">
                                <button id="trigger" class="query_fire btn btn-sm badge-light3d">
                                    <span style="font-size: 14px;"> 🚀 </span></button>
                            </div>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>



<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#start_date,#end_date", {
    minDate: "2016-01",
    maxDate: "today",
    dateFormat: "Y-m-d H:i",
    altInput: true,
    altFormat: "M J, Y",
    dateFormat: "Y-m-d",
    });
    </script>
 <style>

    </style>
</body>
</html>