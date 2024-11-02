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
    <script type="text/javascript" src="{{ asset('js/highcharts11/highcharts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/highcharts11/highcharts-3d.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/highcharts11/modules/exporting.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/highcharts11/modules/offline-exporting.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/highcharts11/modules/accessibility.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/highcharts11/modules/annotations.js') }}"></script>

    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="{{ asset('js/com.js') }}"></script>
    <title>RO First Pass DPI</title>
</head>

<body>
    

    <div id="graph">
        <figure id="plot_window" class="test_print loading-msg" style="height:93vh;"></figure></div>
    
        <table class="table-sm table-responsive table-light table-bordered" style="margin-bottom:5rem;">
            <thead class="badge-light3d">
                <tr>
                    <th>Series</th>
                    <th>&nbsp;&nbsp;Settings &nbsp;&nbsp;</th>
                    <th>&nbsp;&nbsp;Data Points&nbsp;&nbsp;</th>
                    <th>&nbsp;&nbsp;Max Value &nbsp;&nbsp;</th>
                    <th>&nbsp;&nbsp;Min Value &nbsp;&nbsp;</th>
                    <th>&nbsp;&nbsp;Avg. Value &nbsp;&nbsp;</th>
                    <th>&nbsp;&nbsp; Unit &nbsp;&nbsp;</th>
                    <th>&nbsp; Operating Days &nbsp;</th>
                    <th>&nbsp; Skid Yield &nbsp;</th>

                </tr>
            </thead>
            <tbody>
                <tr class="tr1 table-light">
                    <td>
                        <div class="input-group input-group-sm">
                            <div class="col-auto "><input type="checkbox" class="query series-chk filter" id="line1"
                                    checked>
                                &nbsp;1 &nbsp;<input type="color" id="pen1" name="pen1"
                                    value="#e84118" 
                                        class="chart_render series-color"> &nbsp; </div>
                            <div class="col-auto input-group-sm">
                                <input type="text" class="form-control input-group-sm" value="Year 2016" readonly="true">
                            </div>
                        </div>
                    </td>
                    <td style="text-align: center;">

                        <!-- Button trigger modal series 1-->
                        <span id="panel1">
                            <span class="model1 badge badge-light3d" data-bs-toggle="modal" data-bs-target="#modal1">
                                ⚙️</span> </span>



                        <!-- Modal series 1-->
                        <div class="modal fade" id="modal1" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header modelheader1" style="background-color: rgb(228, 17, 70);">
                                        <h5 class="modal-title" id="seriestitle1">Series 1: DP (Head Loss) &nbsp;&nbsp;
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">


                                        <div class="row mb-2">
                                            <label for="chart_type1" class="col-sm-4 col-form-label">Chart
                                                Type</label>
                                            <div class="col-sm-4">
                                                <select class="chart_render form-control form-select"
                                                    id="chart_type1">
                                                    <option value="spline" >
                                                        Line</option>
                                                    <option value="areaspline"
                                                        >Area </option>
                                                    <option value="column" >
                                                        Column </option>
                                                    <option value="scatter"
                                                        >Scatter </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="line_width1" class="col-sm-4 col-form-label">Line
                                                Width</label>
                                            <div class="col-sm-4">
                                                <input type="number" id="line_width1"
                                                    class="chart_render rednder form-control"
                                                    value="1" min="0" max="4"
                                                    step="0.1">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="marker1" class="col-sm-4 col-form-label">Marker
                                                Weight</label>
                                            <div class="col-sm-4">
                                                <input type="number" id="marker1"
                                                    class="chart_render form-control" value=""
                                                    min="0" step="1" max="4">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="marker_shape1" class="col-sm-4 col-form-label">Marker
                                                Shape</label>
                                            <div class="col-sm-4">
                                                <select id="marker_shape1"
                                                    class="chart_render form-control form-select">
                                                    <option value="circle" >
                                                        Circle </option>
                                                    <option value="square" >
                                                        Square </option>
                                                    <option value="triangle"
                                                        >Trianlge </option>
                                                    <option value="diamond" >
                                                        Diamond </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="input-group">

                                                <input type="checkbox" class="chart_render form-check-input col-auto"
                                                    id="dt_label1">
                                                <label for="dt_label1" class="form-check-label col-auto">&nbsp; Show
                                                    Data Labels</label>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="input-group">
                                                <input type="checkbox" class="chart_render form-check-input col-auto"
                                                    id="y_axis1">
                                                <label for="y_axis1" class="form-check-label col-auto">&nbsp; Show
                                                    Y-axis</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-primary apply_changes">Apply
                                                Changes</button>
                                            <button type="button" class="btn btn-sm btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal end here   -->
                        </div>
                    </td>


                    <td style="text-align: center; background-color: black; color:#3edbf0; "> <span
                            id="data_length1">415</span></td>
                    <td style="text-align: center; background-color: black; color:#f21170; "> <span
                            id="data_max1">2.52</span> </td>
                    <td style="text-align: center; background-color: black; color:#00ead3; "> <span
                            id="data_min1">2.00</span> </td>
                    <td style="text-align: center; background-color: black; color:#fff600; "> <span
                            id="data_avg1">2.26</span> </td>
                    <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit1">
                            </span> </td>
                <td style="text-align: center; background-color: black; color:#06f259; "><span id="oper_days">
                                Days</span> </td>
            <td style="text-align: center; background-color: black; color:#06def2; "><span id="yield1">
                                    %</span> </td>


                </tr>



                <tr class="tr2 table-light">
                    <td>
                        <div class="input-group input-group-sm">
                            <div class="col-auto "><input type="checkbox" class="query series-chk filter" id="line2"
                                    >
                                &nbsp;2 &nbsp;<input type="color" id="pen2" name="pen2"
                                    value="#0097e6" 
                                        class="chart_render series-color"> &nbsp; </div>
                                        <div class="col-auto input-group-sm">
                                            <input type="text" class="form-control input-group-sm" value="Year 2017" readonly="true">
                                        </div>
                        </div>
                    </td>
                    <td style="text-align: center;">

                        <!-- Button trigger modal series 2-->
                        <span id="panel1">
                            <span class="model2 badge badge-light3d" data-bs-toggle="modal" data-bs-target="#modal2">
                                ⚙️</span> </span>



                        <!-- Modal series 2-->
                        <div class="modal fade" id="modal2" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header modelheader2" style="background-color: rgb(228, 17, 70);">
                                        <h5 class="modal-title" id="seriestitle2">Series 1: DP (Head Loss) &nbsp;&nbsp;
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">


                                        <div class="row mb-2">
                                            <label for="chart_type2" class="col-sm-4 col-form-label">Chart
                                                Type</label>
                                            <div class="col-sm-4">
                                                <select class="chart_render form-control form-select"
                                                    id="chart_type2">
                                                    <option value="spline" >
                                                        Line</option>
                                                    <option value="areaspline"
                                                        >Area </option>
                                                    <option value="column" >
                                                        Column </option>
                                                    <option value="scatter"
                                                        >Scatter </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="line_width2" class="col-sm-4 col-form-label">Line
                                                Width</label>
                                            <div class="col-sm-4">
                                                <input type="number" id="line_width2"
                                                    class="chart_render rednder form-control"
                                                    value="1" min="0" max="4"
                                                    step="0.1">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="marker2" class="col-sm-4 col-form-label">Marker
                                                Weight</label>
                                            <div class="col-sm-4">
                                                <input type="number" id="marker1"
                                                    class="chart_render form-control" value=""
                                                    min="0" step="1" max="4">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="marker_shape2" class="col-sm-4 col-form-label">Marker
                                                Shape</label>
                                            <div class="col-sm-4">
                                                <select id="marker_shape2"
                                                    class="chart_render form-control form-select">
                                                    <option value="circle" >
                                                        Circle </option>
                                                    <option value="square" >
                                                        Square </option>
                                                    <option value="triangle"
                                                        >Trianlge </option>
                                                    <option value="diamond" >
                                                        Diamond </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="input-group">

                                                <input type="checkbox" class="chart_render form-check-input col-auto"
                                                    id="dt_label2">
                                                <label for="dt_label2" class="form-check-label col-auto">&nbsp; Show
                                                    Data Labels</label>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="input-group">
                                                <input type="checkbox" class="chart_render form-check-input col-auto"
                                                    id="y_axis2">
                                                <label for="y_axis2" class="form-check-label col-auto">&nbsp; Show
                                                    Y-axis</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-primary apply_changes">Apply
                                                Changes</button>
                                            <button type="button" class="btn btn-sm btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal end here   -->
                        </div>
                    </td>


                    <td style="text-align: center; background-color: black; color:#3edbf0; "> <span
                            id="data_length2">415</span></td>
                    <td style="text-align: center; background-color: black; color:#f21170; "> <span
                            id="data_max2">2.52</span> </td>
                    <td style="text-align: center; background-color: black; color:#00ead3; "> <span
                            id="data_min2">2.00</span> </td>
                    <td style="text-align: center; background-color: black; color:#fff600; "> <span
                            id="data_avg2">2.26</span> </td>
                    <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit2">
                            </span> </td>
                    <td style="text-align: center; background-color: black; color:#06f259; "><span id="oper_days2">
                                Days</span> </td>
            <td style="text-align: center; background-color: black; color:#06def2; "><span id="yield2">
                %</span> </td>

                </tr>



                <tr class="tr3 table-light">
                    <td>
                        <div class="input-group input-group-sm">
                            <div class="col-auto "><input type="checkbox" class="query series-chk filter" id="line3"
                                    >
                                &nbsp;2 &nbsp;<input type="color" id="pen3" name="pen3"
                                    value="#44bd32" 
                                        class="chart_render series-color"> &nbsp; </div>
                                        <div class="col-auto input-group-sm">
                                            <input type="text" class="form-control input-group-sm" value="Year 2018" readonly="true">
                                        </div>
                        </div>
                    </td>
                    <td style="text-align: center;">

                        <!-- Button trigger modal series 2-->
                        <span id="panel3">
                            <span class="model3 badge badge-light3d" data-bs-toggle="modal" data-bs-target="#modal3">
                                ⚙️</span> </span>



                        <!-- Modal series 2-->
                        <div class="modal fade" id="modal3" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header modelheader3" style="background-color: rgb(228, 17, 70);">
                                        <h5 class="modal-title" id="seriestitle3">Series 1: DP (Head Loss) &nbsp;&nbsp;
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">


                                        <div class="row mb-2">
                                            <label for="chart_type3" class="col-sm-4 col-form-label">Chart
                                                Type</label>
                                            <div class="col-sm-4">
                                                <select class="chart_render form-control form-select"
                                                    id="chart_type3">
                                                    <option value="spline" >
                                                        Line</option>
                                                    <option value="areaspline"
                                                        >Area </option>
                                                    <option value="column" >
                                                        Column </option>
                                                    <option value="scatter"
                                                        >Scatter </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="line_width3" class="col-sm-4 col-form-label">Line
                                                Width</label>
                                            <div class="col-sm-4">
                                                <input type="number" id="line_width3"
                                                    class="chart_render rednder form-control"
                                                    value="1" min="0" max="4"
                                                    step="0.1">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="marker3" class="col-sm-4 col-form-label">Marker
                                                Weight</label>
                                            <div class="col-sm-4">
                                                <input type="number" id="marker3"
                                                    class="chart_render form-control" value=""
                                                    min="0" step="1" max="4">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="marker_shape3" class="col-sm-4 col-form-label">Marker
                                                Shape</label>
                                            <div class="col-sm-4">
                                                <select id="marker_shape3"
                                                    class="chart_render form-control form-select">
                                                    <option value="circle" >
                                                        Circle </option>
                                                    <option value="square" >
                                                        Square </option>
                                                    <option value="triangle"
                                                        >Trianlge </option>
                                                    <option value="diamond" >
                                                        Diamond </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="input-group">

                                                <input type="checkbox" class="chart_render form-check-input col-auto"
                                                    id="dt_label2">
                                                <label for="dt_label3" class="form-check-label col-auto">&nbsp; Show
                                                    Data Labels</label>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="input-group">
                                                <input type="checkbox" class="chart_render form-check-input col-auto"
                                                    id="y_axis3">
                                                <label for="y_axis3" class="form-check-label col-auto">&nbsp; Show
                                                    Y-axis</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-primary apply_changes">Apply
                                                Changes</button>
                                            <button type="button" class="btn btn-sm btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal end here   -->
                        </div>
                    </td>


                    <td style="text-align: center; background-color: black; color:#3edbf0; "> <span
                            id="data_length3">415</span></td>
                    <td style="text-align: center; background-color: black; color:#f21170; "> <span
                            id="data_max3">2.52</span> </td>
                    <td style="text-align: center; background-color: black; color:#00ead3; "> <span
                            id="data_min3">2.00</span> </td>
                    <td style="text-align: center; background-color: black; color:#fff600; "> <span
                            id="data_avg3">2.26</span> </td>
                    <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit3">
                            </span> </td>
                    <td style="text-align: center; background-color: black; color:#06f259; "><span id="oper_days3">
                                Days</span> </td>
            <td style="text-align: center; background-color: black; color:#06def2; "><span id="yield3">
                %</span> </td>

                </tr>

                
            </tbody>
        </table>



    <div class="modal fade modal-lg" id="sajid" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header badge-light3d">
                    <h5 class="modal-title" id="staticBackdropLabel">Chart Global Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row mb-2">
                        <label for="pen_main" class="col-sm-5 col-form-label">🎨 Background Color </label>
                        <div class="col-sm-4">
                            <input type="color" id="pen_main" name="chart_background"
                                value="#1e272e" class="chart_render series-color">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="pen_grid" class="col-sm-5 col-form-label">🎨 Grid Lines Color </label>
                        <div class="col-sm-4">
                            <input type="color" id="pen_grid" name="grid_background"
                                value="#808e9b" class="chart_render series-color">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="is_legend" class="col-sm-5 col-form-label">Show Legends</label>
                        <div class="col-sm-4">
                            <input type="checkbox" id="is_legend" name="is_legend"
                                class="chart_render main-chk">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="is_main_yaxis" class="col-sm-5 col-form-label">Common Y-axis % &nbsp;<i
                                class="fa fa-area-chart" aria-hidden="true"></i></label>
                        <div class="col-sm-4">
                            <input type="checkbox" id="is_main_yaxis" name="is_main_yaxis"
                                class="chart_render main-chk">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="export_width" class="col-sm-5 col-form-label">Export Width </label>
                        <div class="col-sm-4">
                            <input type="number" id="export_width" class="chart_render form-control"
                                min="500" step="50" value="1400">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="export_height" class="col-sm-5 col-form-label">Export Height </label>
                        <div class="col-sm-4">
                            <input type="number" id="export_height" class="chart_render form-control"
                                min="400" step="50" value="650">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="pen_export" class="col-sm-6 col-form-label">🪂 Export Background Color</label>
                        <div class="col-sm-4">
                            <input type="color" id="pen_export" name="chart_background_export"
                                value="#2f3640" class="chart_render series-color">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="chart_title" class="col-sm-5 col-form-label">Title &nbsp;</label>
                        <div class="col-sm-4">
                            <input type="text" id="chart_title" name="chart_background_title"
                                value="RO Test Series" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="pen_export_title" class="col-sm-5 col-form-label">🎨 Title Color</label>
                        <div class="col-sm-4">
                            <input type="color" id="pen_export_title" name="chart_background_title"
                                value="#2f3640" class="chart_render series-color">
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary apply_changes">Apply Changes</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>









    <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark"
        style="background-color:rgba(0, 0, 0, 0.7); padding-top:2px; padding-bottom:0px;">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:3px;">
                            <a href="{{ url('/home') }}">
                                <button class="btn btn-sm badge-light3d"><span style="font-size: 14px;"> 🏠 </span>
                                    &nbsp; Home &nbsp;
                                </button></a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:3px;">
                            <!-- Button trigger modal -->
                            <div class="input-group">
                                <span class="btn btn-sm badge-light3d" data-bs-toggle="modal"
                                    data-bs-target="#sajid" style="margin-bottom:3px;"><span
                                        style="font-size: 14px;"> ⚙️ </span>Global </span>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:3px;">
                            <!-- Button trigger modal -->
                            <div class="input-group">
                                <span class="btn btn-sm badge-light3d" data-bs-toggle="modal"
                                    data-bs-target="#conf_yaxix" style="margin-bottom:3px;"><span
                                        style="font-size: 14px;"> 📐 </span> Y-Axis </span>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:3px;">
                            <div class="input-group input-group-sm">
                                <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm"><span
                                        style="font-size: 14px;"> 🏷️ </span> Skid</div>
                                <select class="query form-control form-control-sm form-select" id="skidx"
                                    style="background-color:#dff9fb;">
                                    <option value="a" >41-A</option>
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
                                <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm"><span
                                        style="font-size: 14px;"> 🎛️ </span> Process Value</div>
                                <select class="query form-control form-control-sm form-select" id="process_value"
                                    style="background-color:#dff9fb;">
                                    <option value="dpi_906" >DPI</option>
                                    <option value="rear_ec" >Rear EC</option>
                            
                                    
                                    
                                   
                                </select>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:3px;">
                            <div class="input-group input-group-sm">
                                <button id="trigger" class="query_fire btn btn-warning btn-sm">
                                    <span style="font-size: 14px;"> 🚀 </span> &nbsp;Query</button>
                            </div>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <script type="text/javascript" src="{{ asset('js/stream/ro_firstpass_dpi.js') }}"></script>

</body>

</html>
