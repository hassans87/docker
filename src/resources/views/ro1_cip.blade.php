<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href={{('icons/pulse.png')}} type="image/png" sizes="32x32">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ ('css/font-awesome.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ ('js/notiflix 2.7.0/notiflix-2.7.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ ('js/notiflix 2.7.0/notiflix-aio-2.7.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="{{ ('js/highcharts/highcharts.js') }}"></script>
    <script type="text/javascript" src="{{ ('js/highcharts/highcharts-3d.js') }}"></script>
    <script type="text/javascript" src="{{ ('js/highcharts/modules/exporting.js') }}"></script>
    <script type="text/javascript" src="{{ ('js/highcharts/modules/offline-exporting.js') }}"></script>
    <script type="text/javascript" src="{{ ('js/highcharts/modules/accessibility.js') }}"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RO1 CIP</title>
</head>

<body>




    <figure id="plot_window" class="test_print loading-msg" style="width:98vw; height:90vh;"></figure>
    <style>
        .main-chk {
            width: 20px;
            height: 25px;
            margin-top: 7px;
            border: none;
            padding: 0px;
            margin-left: 7px;
        }

        .series-chk {
            text-align: center;
            vertical-align: middle;
            width: 17px;
            height: 17px;
        }

        .series-color {
            width: 17px;
            border: none !important;
            border-radius: 0.5rem;
            height: 17px;
            padding: 0px;
            margin: 0px;
            background: none;
            vertical-align: middle;
        }

        .color-pic {
            width: 20px;
            height: 25px;
            margin-top: 5px;
            border: none;
            padding: 0px;
            background: none;
            margin-left: 5px;
        }

        .badge-light3d {
            text-align: center;
            color: #636e72;
            background: rgba(226, 226, 226, 1);
            background: -moz-linear-gradient(top, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 50%, rgba(209, 209, 209, 1) 51%, rgba(254, 254, 254, 1) 100%);
            background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(226, 226, 226, 1)), color-stop(50%, rgba(219, 219, 219, 1)), color-stop(51%, rgba(209, 209, 209, 1)), color-stop(100%, rgba(254, 254, 254, 1)));
            background: -webkit-linear-gradient(top, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 50%, rgba(209, 209, 209, 1) 51%, rgba(254, 254, 254, 1) 100%);
            background: -o-linear-gradient(top, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 50%, rgba(209, 209, 209, 1) 51%, rgba(254, 254, 254, 1) 100%);
            background: -ms-linear-gradient(top, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 50%, rgba(209, 209, 209, 1) 51%, rgba(254, 254, 254, 1) 100%);
            background: linear-gradient(to bottom, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 50%, rgba(209, 209, 209, 1) 51%, rgba(254, 254, 254, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e2e2e2', endColorstr='#fefefe', GradientType=0);

        }

        .table-light {
            background-color: white;
        }

        .table-secondary {
            background-color: silver;
        }

        .caustic {
            background-color: rgba(168, 61, 255, 0.40);

        }

        .citric {
            background-color: rgba(255, 168, 5, 0.40);
        }

        .mnbtn {
            border-radius: 7px 0px 0px 7px;
        }

        .mnbtn0 {
            border-radius: 0px 7px 7px 0px;
        }
    </style>
    <script type="text/javascript">
        Notiflix.Block.Init({
            fontFamily: "Quicksand",
            useGoogleFont: true,
            backgroundColor: "rgba(0,0,0,0.86)",
            messageColor: "#dfe4ea",
            svgColor: "#18dcff",
            svgSize: "80px",
            messageFontSize: "16px"
        });
        //Notiflix.Block.Pulse('.loading-msg', 'Please wait Fetching data from server....');

        // Notiflix Notify Init - global.js
        Notiflix.Notify.Init({
            width: '250px',
            opacity: 0.6,
            fontSize: '12px',
            timeout: 3000,
            messageMaxLength: 200,
            position: 'right-bottom',
            cssAnimationStyle: "zoom",
        });
    </script>

    <div>
        <div class="input-group">
            <div class="col-auto" style="margin-right:5px;">
                <a href="{{ url('/home') }}">
                    <button class="btn btn-sm badge-light3d">Home &nbsp;<i class="fa fa-home"
                            aria-hidden="true" style="color:black;"></i></button></a>



            </div>

            <div class="col-auto" style="margin-right:5px;">
                <!-- Button trigger modal -->
                <div class="input-group">
                    <span class="btn btn-sm badge-light3d" data-bs-toggle="modal" data-bs-target="#sajid"
                        style="margin-bottom:3px;">Global &nbsp;<i class="fa fa-wrench" aria-hidden="true"
                            style="color:black;"></i></span>
                </div>


            </div>
            <div class="col-auto" style="margin-right:8px;">
                <div class="input-group input-group-sm">
                    <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">From</div>
                    <input type="date" name="start_date" class="tensor-flow form-control form-control-sm"
                        value="{{ $dex[0]->date1 }}" id="start_date" min="2016-01-01" max="2023-11-10" required=""
                        style="background-color:#dff9fb;">
                </div>
            </div>
            <div class="col-auto" style="margin-right:5px;">
                <div class="input-group input-group-sm">
                    <div class="input-group-text badge-light3d mnbtn">To</div>
                    <input type="date" name="end_date" id="end_date" min="2016-01-31" value="{{ $dex[0]->date2 }}"
                        class="tensor-flow form-control form-control-sm" required=""
                        style="background-color:#dff9fb;">
                </div>
            </div>

            <div class="col-auto" style="margin-right:5px;">
                <div class="input-group input-group-sm">
                    <div class="input-group-text badge-light3d mnbtn">Skid</div>
                    <select class="query form-control form-control-sm form-select" id="skidx"
                        style="background-color:#dff9fb;">
                        <option value="a" <?php if ($dex[0]->skid1 == 'a') {
                            echo 'selected';
                        } ?>>41-A</option>
                        <option value="b" <?php if ($dex[0]->skid1 == 'b') {
                            echo 'selected';
                        } ?>>41-B</option>
                        <option value="c" <?php if ($dex[0]->skid1 == 'c') {
                            echo 'selected';
                        } ?>>41-C</option>
                        <option value="d" <?php if ($dex[0]->skid1 == 'd') {
                            echo 'selected';
                        } ?>>41-D</option>
                        <option value="e" <?php if ($dex[0]->skid1 == 'e') {
                            echo 'selected';
                        } ?>>41-E</option>
                        <option value="f" <?php if ($dex[0]->skid1 == 'f') {
                            echo 'selected';
                        } ?>>41-F</option>
                        <option value="g" <?php if ($dex[0]->skid1 == 'g') {
                            echo 'selected';
                        } ?>>41-G</option>
                        <option value="h" <?php if ($dex[0]->skid1 == 'h') {
                            echo 'selected';
                        } ?>>41-H</option>
                        <option value="i" <?php if ($dex[0]->skid1 == 'i') {
                            echo 'selected';
                        } ?>>41-I</option>
                        <option value="j" <?php if ($dex[0]->skid1 == 'j') {
                            echo 'selected';
                        } ?>>41-J</option>
                        <option value="k" <?php if ($dex[0]->skid1 == 'k') {
                            echo 'selected';
                        } ?>>41-K</option>
                    </select>
                </div>
            </div>
            <div class="col-auto" style="margin-right:5px;">
                <div class="input-group input-group-sm">
                    <div class="input-group-text badge-light3d mnbtn">Data Interval &nbsp;<i class="fa fa-clock-o"
                            aria-hidden="true" style="color:black;"></i></div>
                    <select class="query form-control form-control-sm form-select" id="invt"
                        style="background-color:#dff9fb;">
                        <option value="0.7">1 Hour</option>
                        <option value="1.8" selected>2 Hours</option>
                        <option value="3.7">4 Hours</option>
                        <option value="5.7">6 Hours</option>
                        <option value="7.7">8 Hours</option>
                        <option value="11">12 Hours</option>
                        <option value="23">24 Hours</option>
                        <option value="47">48 Hours</option>
                    </select>
                </div>
            </div>
            <div class="col-auto" style="margin-right:15px;">
                <div class="input-group input-group-sm">
                    <span id="query_fire" class="query_fire btn btn-warning btn-sm">
                        <i class="fa fa-rocket" aria-hidden="true" style="color:black;"></i>&nbsp; Send Query</span>
                </div>
            </div>
        </div>
    </div>

    <table class="table-sm table-responsive table-light table-bordered">
        <thead class="badge-light3d">
            <tr>
                <th>Series</th>
                <th>&nbsp;&nbsp;Settings &nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;Data Points&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;Max Value &nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;Min Value &nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;Avg. Value &nbsp;&nbsp;</th>
                <th>&nbsp; Sum &nbsp;&nbsp;&nbsp;</th>
                <th>&nbsp; Unit &nbsp;</th>

            </tr>
        </thead>
        <tbody>
            <tr class="tr1">
                <td>
                    <div class="input-group">
                        <div class="col-auto"><input type="checkbox" class="query series-chk" id="line1"
                                <?php if ($dex[0]->line1 == 'true') {
                                    echo 'checked';
                                } ?>>
                            &nbsp;1 &nbsp;<input type="color" id="pen1" name="pen1"
                                value="<?php echo $dex[0]->pen1; ?>" class="chart_render series-color"> &nbsp; </div>
                        <div class="col-auto">
                            <select class="query form-control form-control-sm form-select" id="ufdata1">
                                <option value="result_init_dp" <?php if ($dex[0]->qdata1 == 'result_init_dp') {
                                    echo 'selected';
                                } ?>>DP before CIP</option>
                                <option value="final_dp" <?php if ($dex[0]->qdata1 == 'final_dp') {
                                    echo 'selected';
                                } ?>>DP after CIP</option>
                                <option value="cip_sr" <?php if ($dex[0]->qdata1 == 'cip_sr') {
                                    echo 'selected';
                                } ?>>CIP Number</option>
                                <option value="running_days" <?php if ($dex[0]->qdata1 == 'running_days') {
                                    echo 'selected';
                                } ?>>Skid Running Days</option>
                                <option value="skid_flow" <?php if ($dex[0]->qdata1 == 'skid_flow') {
                                    echo 'selected';
                                } ?>>Skid Flow</option>
                                <option value="crt_lf_dp" <?php if ($dex[0]->qdata1 == 'crt_lf_dp') {
                                    echo 'selected';
                                } ?>>Cartridge DP during LF</option>
                                <option value="crt_hg_dp" <?php if ($dex[0]->qdata1 == 'crt_hg_dp') {
                                    echo 'selected';
                                } ?>>Cartridge DP during HF</option>
                                <option value="caustic_temp" class="caustic" <?php if ($dex[0]->qdata1 == 'caustic_temp') {
                                    echo 'selected';
                                } ?>>Caustic CIP Temp.
                                </option>
                                <option value="caustic_tnk_lvl" class="caustic" <?php if ($dex[0]->qdata1 == 'caustic_tnk_lvl') {
                                    echo 'selected';
                                } ?>>Caustic CIP Vol
                                </option>
                                <option value="caustic_used_ltr" class="caustic" <?php if ($dex[0]->qdata1 == 'caustic_used_ltr') {
                                    echo 'selected';
                                } ?>>Caustic Used in
                                    CIP</option>
                                <option value="caustic_low_flow_ph" class="caustic" <?php if ($dex[0]->qdata1 == 'caustic_low_flow_ph') {
                                    echo 'selected';
                                } ?>>Caustic LF pH
                                </option>
                                <option value="caustic_lowflow_hrs" class="caustic" <?php if ($dex[0]->qdata1 == 'caustic_lowflow_hrs') {
                                    echo 'selected';
                                } ?>>Caustic LF
                                    recirculation</option>
                                <option value="caustic_lowflow_rate" class="caustic" <?php if ($dex[0]->qdata1 == 'caustic_lowflow_rate') {
                                    echo 'selected';
                                } ?>>Caustic LF
                                    rate</option>
                                <option value="caustc_lowflow_soaking" class="caustic" <?php if ($dex[0]->qdata1 == 'caustc_lowflow_soaking') {
                                    echo 'selected';
                                } ?>>Caustic LF
                                    Soaking</option>
                                <option value="caustic_highflow_ph" class="caustic" <?php if ($dex[0]->qdata1 == 'caustic_highflow_ph') {
                                    echo 'selected';
                                } ?>>Caustic HF pH
                                </option>
                                <option value="caustic_highflow_hrs" class="caustic" <?php if ($dex[0]->qdata1 == 'caustic_highflow_hrs') {
                                    echo 'selected';
                                } ?>>Caustic HF
                                    Recirculation</option>
                                <option value="caustic_highflow_rate" class="caustic" <?php if ($dex[0]->qdata1 == 'caustic_highflow_rate') {
                                    echo 'selected';
                                } ?>>Caustic HF
                                    rate</option>
                                <option value="caustic_highflow_soaking" class="caustic" <?php if ($dex[0]->qdata1 == 'caustic_highflow_soaking') {
                                    echo 'selected';
                                } ?>>Caustic
                                    HF Soaking</option>
                                <option value="caustic_cip_total_soaking" class="caustic" <?php if ($dex[0]->qdata1 == 'caustic_cip_total_soaking') {
                                    echo 'selected';
                                } ?>>Caustic
                                    CIP Total Soaking</option>
                                <option value="caustic_rinse_cycle" class="caustic" <?php if ($dex[0]->qdata1 == 'caustic_rinse_cycle') {
                                    echo 'selected';
                                } ?>>Caustic Rinse
                                    Cycles</option>
                                <option value="caustic_cip_water_vol" class="caustic" <?php if ($dex[0]->qdata1 == 'caustic_cip_water_vol') {
                                    echo 'selected';
                                } ?>>Caustic
                                    Rinse Vol</option>
                                <option value="citric_temp" class="citric" <?php if ($dex[0]->qdata1 == 'citric_temp') {
                                    echo 'selected';
                                } ?>>Citric CIP Temp.
                                </option>
                                <option value="citric_tnk_vol" class="citric" <?php if ($dex[0]->qdata1 == 'citric_tnk_vol') {
                                    echo 'selected';
                                } ?>>Citric CIP Vol
                                </option>
                                <option value="citric_used_ltr" class="citric" <?php if ($dex[0]->qdata1 == 'citric_used_ltr') {
                                    echo 'selected';
                                } ?>>Citric Used in CIP
                                </option>
                                <option value="citric_lowflow_ph" class="citric" <?php if ($dex[0]->qdata1 == 'citric_lowflow_ph') {
                                    echo 'selected';
                                } ?>>Citric LF pH
                                </option>
                                <option value="citric_lowflow_hrs" class="citric" <?php if ($dex[0]->qdata1 == 'citric_lowflow_hrs') {
                                    echo 'selected';
                                } ?>>Citric LF
                                    recirculation</option>
                                <option value="citric_lowflow_rate" class="citric" <?php if ($dex[0]->qdata1 == 'citric_lowflow_rate') {
                                    echo 'selected';
                                } ?>>Citric LF rate
                                </option>
                                <option value="citric_lowflow_soaking" class="citric" <?php if ($dex[0]->qdata1 == 'citric_lowflow_soaking') {
                                    echo 'selected';
                                } ?>>Citric LF
                                    Soaking</option>
                                <option value="citric_highflow_ph" class="citric" <?php if ($dex[0]->qdata1 == 'citric_highflow_ph') {
                                    echo 'selected';
                                } ?>>Citric HF pH
                                </option>
                                <option value="citric_highflow_hrs" class="citric" <?php if ($dex[0]->qdata1 == 'citric_highflow_hrs') {
                                    echo 'selected';
                                } ?>>Citric HF
                                    Recirculation</option>
                                <option value="citric_highflow_rate" class="citric" <?php if ($dex[0]->qdata1 == 'citric_highflow_rate') {
                                    echo 'selected';
                                } ?>>Citric HF
                                    rate</option>
                                <option value="citric_highflow_soaking" class="citric" <?php if ($dex[0]->qdata1 == 'citric_highflow_soaking') {
                                    echo 'selected';
                                } ?>>Citric HF
                                    Soaking</option>
                                <option value="citric_rinse_cycle" class="citric" <?php if ($dex[0]->qdata1 == 'citric_rinse_cycle') {
                                    echo 'selected';
                                } ?>>Citric Rinse
                                    Cycles</option>
                                <option value="citric_cip_water_cons" class="citric" <?php if ($dex[0]->qdata1 == 'citric_cip_water_cons') {
                                    echo 'selected';
                                } ?>>Citric Rinse
                                    Vol</option>
                            </select>
                        </div>
                <td style="text-align: center;">

                    <!-- Button trigger modal series 1-->
                    <span id="panel1">
                        <span class="model1 badge badge-light3d" data-bs-toggle="modal" data-bs-target="#modal1">
                            <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i> </span> </span>



                    <!-- Modal series 1-->
                    <div class="modal fade" id="modal1" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header modelheader1">
                                    <h5 class="modal-title" id="seriestitle1"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <div class="row mb-2">
                                        <label for="chart_type1" class="chart_render col-sm-4 col-form-label">Chart
                                            Type</label>
                                        <div class="col-sm-4">
                                            <select class="chart_render form-control form-select" id="chart_type1">
                                                <option value="spline" <?php if ($dex[0]->chart1 == 'spline') {
                                                    echo 'selected';
                                                } ?>>Line</option>
                                                <option value="areaspline" <?php if ($dex[0]->chart1 == 'areaspline') {
                                                    echo 'selected';
                                                } ?>>Area </option>
                                                <option value="column" <?php if ($dex[0]->chart1 == 'column') {
                                                    echo 'selected';
                                                } ?>>Column </option>
                                                <option value="scatter" <?php if ($dex[0]->chart1 == 'scatter') {
                                                    echo 'selected';
                                                } ?>>Scatter </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <label for="line_width1" class="col-sm-4 col-form-label">Line Width</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="line_width1"
                                                class="chart_render rednder form-control" value="<?php echo $dex[0]->linewt1; ?>"
                                                min="0" max="4" step="0.1">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker1" class="col-sm-4 col-form-label">Marker Weight</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="marker1" class="chart_render form-control"
                                                value="<?php echo $dex[0]->mkr1; ?>" min="0" step="0.1"
                                                max="4">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker_shape1" class="col-sm-4 col-form-label">Marker
                                            Shape</label>
                                        <div class="col-sm-4">
                                            <select id="marker_shape1" class="chart_render form-control form-select">
                                                <option value="circle" <?php if ($dex[0]->mkrsp1 == 'circle') {
                                                    echo 'selected';
                                                } ?>>Circle </option>
                                                <option value="square" <?php if ($dex[0]->mkrsp1 == 'square') {
                                                    echo 'selected';
                                                } ?>>Square </option>
                                                <option value="triangle" <?php if ($dex[0]->mkrsp1 == 'triangle') {
                                                    echo 'selected';
                                                } ?>>Trianlge </option>
                                                <option value="diamond" <?php if ($dex[0]->mkrsp1 == 'diamond') {
                                                    echo 'selected';
                                                } ?>>Diamond </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="input-group">

                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="dt_label1" <?php if ($dex[0]->datalb1 == 'true') {
                                                    echo 'checked';
                                                } ?>>
                                            <label for="dt_label1" class="form-check-label col-auto">&nbsp; Show Data
                                                Labels</label>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="input-group">
                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="y_axis1" <?php if ($dex[0]->yaxis1 == 'true') {
                                                    echo 'checked';
                                                } ?>>
                                            <label for="y_axis1" class="form-check-label col-auto">&nbsp; Show
                                                Y-axis</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal end here   -->
                </td>

                </td>
                <td style="text-align: center; background-color: black; color:#3edbf0; "> <span
                        id="data_length1"></span></td>
                <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max1"></span>
                </td>
                <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min1"></span>
                </td>
                <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg1"></span>
                </td>
                <td style="text-align: center; background-color: black; color:#3ae374; "><span id="sum1"></span>
                </td>
                <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit1"></span>
                </td>


            </tr>
            <tr class="tr2">
                <td>
                    <div class="input-group">
                        <div class="col-auto"><input type="checkbox" class="query series-chk" id="line2"
                                <?php if ($dex[0]->line2 == 'true') {
                                    echo 'checked';
                                } ?>>
                            &nbsp;2 &nbsp;<input type="color" id="pen2" name="pen2"
                                value="<?php echo $dex[0]->pen2; ?>" class="chart_render series-color"> &nbsp; </div>
                        <div class="col-auto">
                            <select class="query form-control form-control-sm form-select" id="ufdata2">
                                <option value="result_init_dp" <?php if ($dex[0]->qdata2 == 'result_init_dp') {
                                    echo 'selected';
                                } ?>>DP before CIP</option>
                                <option value="final_dp" <?php if ($dex[0]->qdata2 == 'final_dp') {
                                    echo 'selected';
                                } ?>>DP after CIP</option>
                                <option value="cip_sr" <?php if ($dex[0]->qdata2 == 'cip_sr') {
                                    echo 'selected';
                                } ?>>CIP Number</option>
                                <option value="running_days" <?php if ($dex[0]->qdata2 == 'running_days') {
                                    echo 'selected';
                                } ?>>Skid Running Days</option>
                                <option value="skid_flow" <?php if ($dex[0]->qdata2 == 'skid_flow') {
                                    echo 'selected';
                                } ?>>Skid Flow</option>
                                <option value="crt_lf_dp" <?php if ($dex[0]->qdata2 == 'crt_lf_dp') {
                                    echo 'selected';
                                } ?>>Cartridge DP during LF</option>
                                <option value="crt_hg_dp" <?php if ($dex[0]->qdata2 == 'crt_hg_dp') {
                                    echo 'selected';
                                } ?>>Cartridge DP during HF</option>
                                <option value="caustic_temp" class="caustic" <?php if ($dex[0]->qdata2 == 'caustic_temp') {
                                    echo 'selected';
                                } ?>>Caustic CIP Temp.
                                </option>
                                <option value="caustic_tnk_lvl" class="caustic" <?php if ($dex[0]->qdata2 == 'caustic_tnk_lvl') {
                                    echo 'selected';
                                } ?>>Caustic CIP Vol
                                </option>
                                <option value="caustic_used_ltr" class="caustic" <?php if ($dex[0]->qdata2 == 'caustic_used_ltr') {
                                    echo 'selected';
                                } ?>>Caustic Used in
                                    CIP</option>
                                <option value="caustic_low_flow_ph" class="caustic" <?php if ($dex[0]->qdata2 == 'caustic_low_flow_ph') {
                                    echo 'selected';
                                } ?>>Caustic LF pH
                                </option>
                                <option value="caustic_lowflow_hrs" class="caustic" <?php if ($dex[0]->qdata2 == 'caustic_lowflow_hrs') {
                                    echo 'selected';
                                } ?>>Caustic LF
                                    recirculation</option>
                                <option value="caustic_lowflow_rate" class="caustic" <?php if ($dex[0]->qdata2 == 'caustic_lowflow_rate') {
                                    echo 'selected';
                                } ?>>Caustic LF
                                    rate</option>
                                <option value="caustc_lowflow_soaking" class="caustic" <?php if ($dex[0]->qdata2 == 'caustc_lowflow_soaking') {
                                    echo 'selected';
                                } ?>>Caustic LF
                                    Soaking</option>
                                <option value="caustic_highflow_ph" class="caustic" <?php if ($dex[0]->qdata2 == 'caustic_highflow_ph') {
                                    echo 'selected';
                                } ?>>Caustic HF pH
                                </option>
                                <option value="caustic_highflow_hrs" class="caustic" <?php if ($dex[0]->qdata2 == 'caustic_highflow_hrs') {
                                    echo 'selected';
                                } ?>>Caustic HF
                                    Recirculation</option>
                                <option value="caustic_highflow_rate" class="caustic" <?php if ($dex[0]->qdata2 == 'caustic_highflow_rate') {
                                    echo 'selected';
                                } ?>>Caustic HF
                                    rate</option>
                                <option value="caustic_highflow_soaking" class="caustic" <?php if ($dex[0]->qdata2 == 'caustic_highflow_soaking') {
                                    echo 'selected';
                                } ?>>Caustic
                                    HF Soaking</option>
                                <option value="caustic_cip_total_soaking" class="caustic" <?php if ($dex[0]->qdata2 == 'caustic_cip_total_soaking') {
                                    echo 'selected';
                                } ?>>Caustic
                                    CIP Total Soaking</option>
                                <option value="caustic_rinse_cycle" class="caustic" <?php if ($dex[0]->qdata2 == 'caustic_rinse_cycle') {
                                    echo 'selected';
                                } ?>>Caustic Rinse
                                    Cycles</option>
                                <option value="caustic_cip_water_vol" class="caustic" <?php if ($dex[0]->qdata2 == 'caustic_cip_water_vol') {
                                    echo 'selected';
                                } ?>>Caustic
                                    Rinse Vol</option>
                                <option value="citric_temp" class="citric" <?php if ($dex[0]->qdata2 == 'citric_temp') {
                                    echo 'selected';
                                } ?>>Citric CIP Temp.
                                </option>
                                <option value="citric_tnk_vol" class="citric" <?php if ($dex[0]->qdata2 == 'citric_tnk_vol') {
                                    echo 'selected';
                                } ?>>Citric CIP Vol
                                </option>
                                <option value="citric_used_ltr" class="citric" <?php if ($dex[0]->qdata2 == 'citric_used_ltr') {
                                    echo 'selected';
                                } ?>>Citric Used in CIP
                                </option>
                                <option value="citric_lowflow_ph" class="citric" <?php if ($dex[0]->qdata2 == 'citric_lowflow_ph') {
                                    echo 'selected';
                                } ?>>Citric LF pH
                                </option>
                                <option value="citric_lowflow_hrs" class="citric" <?php if ($dex[0]->qdata2 == 'citric_lowflow_hrs') {
                                    echo 'selected';
                                } ?>>Citric LF
                                    recirculation</option>
                                <option value="citric_lowflow_rate" class="citric" <?php if ($dex[0]->qdata2 == 'citric_lowflow_rate') {
                                    echo 'selected';
                                } ?>>Citric LF rate
                                </option>
                                <option value="citric_lowflow_soaking" class="citric" <?php if ($dex[0]->qdata2 == 'citric_lowflow_soaking') {
                                    echo 'selected';
                                } ?>>Citric LF
                                    Soaking</option>
                                <option value="citric_highflow_ph" class="citric" <?php if ($dex[0]->qdata2 == 'citric_highflow_ph') {
                                    echo 'selected';
                                } ?>>Citric HF pH
                                </option>
                                <option value="citric_highflow_hrs" class="citric" <?php if ($dex[0]->qdata2 == 'citric_highflow_hrs') {
                                    echo 'selected';
                                } ?>>Citric HF
                                    Recirculation</option>
                                <option value="citric_highflow_rate" class="citric" <?php if ($dex[0]->qdata2 == 'citric_highflow_rate') {
                                    echo 'selected';
                                } ?>>Citric HF
                                    rate</option>
                                <option value="citric_highflow_soaking" class="citric" <?php if ($dex[0]->qdata2 == 'citric_highflow_soaking') {
                                    echo 'selected';
                                } ?>>Citric HF
                                    Soaking</option>
                                <option value="citric_rinse_cycle" class="citric" <?php if ($dex[0]->qdata2 == 'citric_rinse_cycle') {
                                    echo 'selected';
                                } ?>>Citric Rinse
                                    Cycles</option>
                                <option value="citric_cip_water_cons" class="citric" <?php if ($dex[0]->qdata2 == 'citric_cip_water_cons') {
                                    echo 'selected';
                                } ?>>Citric Rinse
                                    Vol</option>
                            </select>
                        </div>

                    </div>
                <td style="text-align: center;">

                    <!-- Button trigger modal series 2-->
                    <span id="panel2">
                        <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal"
                            data-bs-target="#modal-series2">
                            <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>

                    <!-- Modal series 2-->
                    <div class="modal fade" id="modal-series2" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header modelheader2">
                                    <h5 class="modal-title" id="seriestitle2"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-2">
                                        <label for="chart_type2" class="col-sm-4 col-form-label">Chart Type</label>
                                        <div class="col-sm-4">
                                            <select class="chart_render form-control form-select" id="chart_type2">
                                                <option value="spline" <?php if ($dex[0]->chart2 == 'spline') {
                                                    echo 'selected';
                                                } ?>>Line</option>
                                                <option value="areaspline" <?php if ($dex[0]->chart2 == 'areaspline') {
                                                    echo 'selected';
                                                } ?>>Area </option>
                                                <option value="column" <?php if ($dex[0]->chart2 == 'column') {
                                                    echo 'selected';
                                                } ?>>Column </option>
                                                <option value="scatter" <?php if ($dex[0]->chart2 == 'scatter') {
                                                    echo 'selected';
                                                } ?>>Scatter </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <label for="line_width1" class="col-sm-4 col-form-label">Line Width</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="line_width2" class="chart_render form-control"
                                                value="<?php echo $dex[0]->linewt2; ?>" min="0" max="4"
                                                step="0.1">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker1" class="col-sm-4 col-form-label">Marker Weight</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="marker2" class="chart_render form-control"
                                                value="<?php echo $dex[0]->mkr2; ?>" min="0" step="0.1"
                                                max="4">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker_shape2" class="col-sm-4 col-form-label">Marker
                                            Shape</label>
                                        <div class="col-sm-4">
                                            <select id="marker_shape2" class="chart_render form-control form-select">
                                                <option value="circle" <?php if ($dex[0]->mkrsp2 == 'circle') {
                                                    echo 'selected';
                                                } ?>>Circle </option>
                                                <option value="square" <?php if ($dex[0]->mkrsp2 == 'square') {
                                                    echo 'selected';
                                                } ?>>Square </option>
                                                <option value="triangle" <?php if ($dex[0]->mkrsp2 == 'triangle') {
                                                    echo 'selected';
                                                } ?>>Trianlge </option>
                                                <option value="diamond" <?php if ($dex[0]->mkrsp2 == 'diamond') {
                                                    echo 'selected';
                                                } ?>>Diamond </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="input-group">

                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="dt_label2" <?php if ($dex[0]->datalb2 == 'true') {
                                                    echo 'checked';
                                                } ?>>
                                            <label for="dt_label1" class="form-check-label col-auto">&nbsp; Show Data
                                                Labels</label>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="input-group">
                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="y_axis2" <?php if ($dex[0]->yaxis2 == 'true') {
                                                    echo 'checked';
                                                } ?>>
                                            <label for="y_axis1" class="form-check-label col-auto">&nbsp; Show
                                                Y-axis</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal end here   -->
                </td>


                </td>
                <td style="text-align: center; background-color: black; color:#3edbf0; "> <span
                        id="data_length2"></span></td>
                <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max2"></span>
                </td>
                <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min2"></span>
                </td>
                <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg2"></span>
                </td>
                <td style="text-align: center; background-color: black; color:#3ae374; "><span id="sum2"></span>
                </td>
                <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit2"></span>
                </td>

            </tr>
            <tr class="tr3">
                <td>
                    <div class="input-group">
                        <div class="col-auto"><input type="checkbox" class="query series-chk" id="line3"
                                <?php if ($dex[0]->line3 == 'true') {
                                    echo 'checked';
                                } ?>>
                            &nbsp;3 &nbsp;<input type="color" id="pen3" name="pen3"
                                value="<?php echo $dex[0]->pen3; ?>" class="chart_render series-color"> &nbsp; </div>
                        <div class="col-auto">
                            <select class="query form-control form-control-sm form-select" id="ufdata3">
                                <option value="result_init_dp" <?php if ($dex[0]->qdata3 == 'result_init_dp') {
                                    echo 'selected';
                                } ?>>DP before CIP</option>
                                <option value="final_dp" <?php if ($dex[0]->qdata3 == 'final_dp') {
                                    echo 'selected';
                                } ?>>DP after CIP</option>
                                <option value="cip_sr" <?php if ($dex[0]->qdata3 == 'cip_sr') {
                                    echo 'selected';
                                } ?>>CIP Number</option>
                                <option value="running_days" <?php if ($dex[0]->qdata3 == 'running_days') {
                                    echo 'selected';
                                } ?>>Skid Running Days</option>
                                <option value="skid_flow" <?php if ($dex[0]->qdata3 == 'skid_flow') {
                                    echo 'selected';
                                } ?>>Skid Flow</option>
                                <option value="crt_lf_dp" <?php if ($dex[0]->qdata3 == 'crt_lf_dp') {
                                    echo 'selected';
                                } ?>>Cartridge DP during LF</option>
                                <option value="crt_hg_dp" <?php if ($dex[0]->qdata3 == 'crt_hg_dp') {
                                    echo 'selected';
                                } ?>>Cartridge DP during HF</option>
                                <option value="caustic_temp" class="caustic" <?php if ($dex[0]->qdata3 == 'caustic_temp') {
                                    echo 'selected';
                                } ?>>Caustic CIP Temp.
                                </option>
                                <option value="caustic_tnk_lvl" class="caustic" <?php if ($dex[0]->qdata3 == 'caustic_tnk_lvl') {
                                    echo 'selected';
                                } ?>>Caustic CIP Vol
                                </option>
                                <option value="caustic_used_ltr" class="caustic" <?php if ($dex[0]->qdata3 == 'caustic_used_ltr') {
                                    echo 'selected';
                                } ?>>Caustic Used in
                                    CIP</option>
                                <option value="caustic_low_flow_ph" class="caustic" <?php if ($dex[0]->qdata3 == 'caustic_low_flow_ph') {
                                    echo 'selected';
                                } ?>>Caustic LF
                                    pH</option>
                                <option value="caustic_lowflow_hrs" class="caustic" <?php if ($dex[0]->qdata3 == 'caustic_lowflow_hrs') {
                                    echo 'selected';
                                } ?>>Caustic LF
                                    recirculation</option>
                                <option value="caustic_lowflow_rate" class="caustic" <?php if ($dex[0]->qdata3 == 'caustic_lowflow_rate') {
                                    echo 'selected';
                                } ?>>Caustic LF
                                    rate</option>
                                <option value="caustc_lowflow_soaking" class="caustic" <?php if ($dex[0]->qdata3 == 'caustc_lowflow_soaking') {
                                    echo 'selected';
                                } ?>>Caustic
                                    LF Soaking</option>
                                <option value="caustic_highflow_ph" class="caustic" <?php if ($dex[0]->qdata3 == 'caustic_highflow_ph') {
                                    echo 'selected';
                                } ?>>Caustic HF
                                    pH</option>
                                <option value="caustic_highflow_hrs" class="caustic" <?php if ($dex[0]->qdata3 == 'caustic_highflow_hrs') {
                                    echo 'selected';
                                } ?>>Caustic HF
                                    Recirculation</option>
                                <option value="caustic_highflow_rate" class="caustic" <?php if ($dex[0]->qdata3 == 'caustic_highflow_rate') {
                                    echo 'selected';
                                } ?>>Caustic HF
                                    rate</option>
                                <option value="caustic_highflow_soaking" class="caustic" <?php if ($dex[0]->qdata3 == 'caustic_highflow_soaking') {
                                    echo 'selected';
                                } ?>>Caustic
                                    HF Soaking</option>
                                <option value="caustic_cip_total_soaking" class="caustic" <?php if ($dex[0]->qdata3 == 'caustic_cip_total_soaking') {
                                    echo 'selected';
                                } ?>>
                                    Caustic CIP Total Soaking</option>
                                <option value="caustic_rinse_cycle" class="caustic" <?php if ($dex[0]->qdata3 == 'caustic_rinse_cycle') {
                                    echo 'selected';
                                } ?>>Caustic
                                    Rinse Cycles</option>
                                <option value="caustic_cip_water_vol" class="caustic" <?php if ($dex[0]->qdata3 == 'caustic_cip_water_vol') {
                                    echo 'selected';
                                } ?>>Caustic
                                    Rinse Vol</option>
                                <option value="citric_temp" class="citric" <?php if ($dex[0]->qdata3 == 'citric_temp') {
                                    echo 'selected';
                                } ?>>Citric CIP Temp.
                                </option>
                                <option value="citric_tnk_vol" class="citric" <?php if ($dex[0]->qdata3 == 'citric_tnk_vol') {
                                    echo 'selected';
                                } ?>>Citric CIP Vol
                                </option>
                                <option value="citric_used_ltr" class="citric" <?php if ($dex[0]->qdata3 == 'citric_used_ltr') {
                                    echo 'selected';
                                } ?>>Citric Used in
                                    CIP</option>
                                <option value="citric_lowflow_ph" class="citric" <?php if ($dex[0]->qdata3 == 'citric_lowflow_ph') {
                                    echo 'selected';
                                } ?>>Citric LF pH
                                </option>
                                <option value="citric_lowflow_hrs" class="citric" <?php if ($dex[0]->qdata3 == 'citric_lowflow_hrs') {
                                    echo 'selected';
                                } ?>>Citric LF
                                    recirculation</option>
                                <option value="citric_lowflow_rate" class="citric" <?php if ($dex[0]->qdata3 == 'citric_lowflow_rate') {
                                    echo 'selected';
                                } ?>>Citric LF
                                    rate</option>
                                <option value="citric_lowflow_soaking" class="citric" <?php if ($dex[0]->qdata3 == 'citric_lowflow_soaking') {
                                    echo 'selected';
                                } ?>>Citric LF
                                    Soaking</option>
                                <option value="citric_highflow_ph" class="citric" <?php if ($dex[0]->qdata3 == 'citric_highflow_ph') {
                                    echo 'selected';
                                } ?>>Citric HF pH
                                </option>
                                <option value="citric_highflow_hrs" class="citric" <?php if ($dex[0]->qdata3 == 'citric_highflow_hrs') {
                                    echo 'selected';
                                } ?>>Citric HF
                                    Recirculation</option>
                                <option value="citric_highflow_rate" class="citric" <?php if ($dex[0]->qdata3 == 'citric_highflow_rate') {
                                    echo 'selected';
                                } ?>>Citric HF
                                    rate</option>
                                <option value="citric_highflow_soaking" class="citric" <?php if ($dex[0]->qdata3 == 'citric_highflow_soaking') {
                                    echo 'selected';
                                } ?>>Citric HF
                                    Soaking</option>
                                <option value="citric_rinse_cycle" class="citric" <?php if ($dex[0]->qdata3 == 'citric_rinse_cycle') {
                                    echo 'selected';
                                } ?>>Citric Rinse
                                    Cycles</option>
                                <option value="citric_cip_water_cons" class="citric" <?php if ($dex[0]->qdata3 == 'citric_cip_water_cons') {
                                    echo 'selected';
                                } ?>>Citric
                                    Rinse Vol</option>
                            </select>
                        </div>
                    </div>
                <td style="text-align: center;">

                    <!-- Button trigger modal series 3-->
                    <span id="panel3">
                        <span type="" class="badge badge-light3d" data-bs-toggle="modal"
                            data-bs-target="#modal-series3">
                            <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>



                    <!-- Modal series 3-->
                    <div class="modal fade" id="modal-series3" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header modelheader3">
                                    <h5 class="modal-title" id="seriestitle3"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <div class="row mb-2">
                                        <label for="chart_type3" class="col-sm-4 col-form-label">Chart Type</label>
                                        <div class="col-sm-4">
                                            <select class="chart_render form-control form-select" id="chart_type3">
                                                <option value="spline" <?php if ($dex[0]->chart3 == 'spline') {
                                                    echo 'selected';
                                                } ?>>Line</option>
                                                <option value="areaspline" <?php if ($dex[0]->chart3 == 'areaspline') {
                                                    echo 'selected';
                                                } ?>>Area </option>
                                                <option value="column" <?php if ($dex[0]->chart3 == 'column') {
                                                    echo 'selected';
                                                } ?>>Column </option>
                                                <option value="scatter" <?php if ($dex[0]->chart3 == 'scatter') {
                                                    echo 'selected';
                                                } ?>>Scatter </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <label for="line_width3" class="chart_render col-sm-4 col-form-label">Line
                                            Width</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="line_width3" class="rednder form-control"
                                                value="<?php echo $dex[0]->linewt3; ?>" min="0" max="4"
                                                step="0.1">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker3" class="col-sm-4 col-form-label">Marker Weight</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="marker3" class="chart_render form-control"
                                                value="<?php echo $dex[0]->mkr3; ?>" min="0" step="0.1"
                                                max="4">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker_shape3" class="chart_render col-sm-4 col-form-label">Marker
                                            Shape</label>
                                        <div class="col-sm-4">
                                            <select id="marker_shape3" class="chart_render form-control">
                                                <option value="circle" <?php if ($dex[0]->mkrsp3 == 'circle') {
                                                    echo 'selected';
                                                } ?>>Circle </option>
                                                <option value="square" <?php if ($dex[0]->mkrsp3 == 'square') {
                                                    echo 'selected';
                                                } ?>>Square </option>
                                                <option value="triangle" <?php if ($dex[0]->mkrsp3 == 'triangle') {
                                                    echo 'selected';
                                                } ?>>Trianlge </option>
                                                <option value="diamond" <?php if ($dex[0]->mkrsp3 == 'diamond') {
                                                    echo 'selected';
                                                } ?>>Diamond </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="input-group">

                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="dt_label3" <?php if ($dex[0]->datalb3 == 'true') {
                                                    echo 'checked';
                                                } ?>>
                                            <label for="dt_label3" class="form-check-label col-auto">&nbsp; Show Data
                                                Labels</label>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="input-group">
                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="y_axis3" <?php if ($dex[0]->yaxis3 == 'true') {
                                                    echo 'checked';
                                                } ?>>
                                            <label for="y_axis3" class="form-check-label col-auto">&nbsp; Show
                                                Y-axis</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal end here   -->
                </td>

                </td>
                <td style="text-align: center; background-color: black; color:#3edbf0; "> <span
                        id="data_length3"></span></td>
                <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max3"></span>
                </td>
                <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min3"></span>
                </td>
                <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg3"></span>
                </td>
                <td style="text-align: center; background-color: black; color:#3ae374; "><span id="sum3"></span>
                </td>
                <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit3"></span>
                </td>

            </tr>
            <tr class="tr4">
                <td>
                    <div class="input-group">
                        <div class="col-auto"><input type="checkbox" class="query series-chk" id="line4"
                                <?php if ($dex[0]->line4 == 'true') {
                                    echo 'checked';
                                } ?>>
                            &nbsp;4 &nbsp;<input type="color" id="pen4" name="pen4"
                                value="<?php echo $dex[0]->pen4; ?>" class="chart_render series-color"> &nbsp; </div>
                        <div class="col-auto">
                            <select class="query form-control form-control-sm form-select" id="ufdata4">
                                <option value="result_init_dp" <?php if ($dex[0]->qdata4 == 'result_init_dp') {
                                    echo 'selected';
                                } ?>>DP before CIP</option>
                                <option value="final_dp" <?php if ($dex[0]->qdata4 == 'final_dp') {
                                    echo 'selected';
                                } ?>>DP after CIP</option>
                                <option value="cip_sr" <?php if ($dex[0]->qdata4 == 'cip_sr') {
                                    echo 'selected';
                                } ?>>CIP Number</option>
                                <option value="running_days" <?php if ($dex[0]->qdata4 == 'running_days') {
                                    echo 'selected';
                                } ?>>Skid Running Days</option>
                                <option value="skid_flow" <?php if ($dex[0]->qdata4 == 'skid_flow') {
                                    echo 'selected';
                                } ?>>Skid Flow</option>
                                <option value="crt_lf_dp" <?php if ($dex[0]->qdata4 == 'crt_lf_dp') {
                                    echo 'selected';
                                } ?>>Cartridge DP during LF</option>
                                <option value="crt_hg_dp" <?php if ($dex[0]->qdata4 == 'crt_hg_dp') {
                                    echo 'selected';
                                } ?>>Cartridge DP during HF</option>
                                <option value="caustic_temp" class="caustic" <?php if ($dex[0]->qdata4 == 'caustic_temp') {
                                    echo 'selected';
                                } ?>>Caustic CIP Temp.
                                </option>
                                <option value="caustic_tnk_lvl" class="caustic" <?php if ($dex[0]->qdata4 == 'caustic_tnk_lvl') {
                                    echo 'selected';
                                } ?>>Caustic CIP Vol
                                </option>
                                <option value="caustic_used_ltr" class="caustic" <?php if ($dex[0]->qdata4 == 'caustic_used_ltr') {
                                    echo 'selected';
                                } ?>>Caustic Used in
                                    CIP</option>
                                <option value="caustic_low_flow_ph" class="caustic" <?php if ($dex[0]->qdata4 == 'caustic_low_flow_ph') {
                                    echo 'selected';
                                } ?>>Caustic LF
                                    pH</option>
                                <option value="caustic_lowflow_hrs" class="caustic" <?php if ($dex[0]->qdata4 == 'caustic_lowflow_hrs') {
                                    echo 'selected';
                                } ?>>Caustic LF
                                    recirculation</option>
                                <option value="caustic_lowflow_rate" class="caustic" <?php if ($dex[0]->qdata4 == 'caustic_lowflow_rate') {
                                    echo 'selected';
                                } ?>>Caustic LF
                                    rate</option>
                                <option value="caustc_lowflow_soaking" class="caustic" <?php if ($dex[0]->qdata4 == 'caustc_lowflow_soaking') {
                                    echo 'selected';
                                } ?>>Caustic
                                    LF Soaking</option>
                                <option value="caustic_highflow_ph" class="caustic" <?php if ($dex[0]->qdata4 == 'caustic_highflow_ph') {
                                    echo 'selected';
                                } ?>>Caustic HF
                                    pH</option>
                                <option value="caustic_highflow_hrs" class="caustic" <?php if ($dex[0]->qdata4 == 'caustic_highflow_hrs') {
                                    echo 'selected';
                                } ?>>Caustic HF
                                    Recirculation</option>
                                <option value="caustic_highflow_rate" class="caustic" <?php if ($dex[0]->qdata4 == 'caustic_highflow_rate') {
                                    echo 'selected';
                                } ?>>Caustic HF
                                    rate</option>
                                <option value="caustic_highflow_soaking" class="caustic" <?php if ($dex[0]->qdata4 == 'caustic_highflow_soaking') {
                                    echo 'selected';
                                } ?>>Caustic
                                    HF Soaking</option>
                                <option value="caustic_cip_total_soaking" class="caustic" <?php if ($dex[0]->qdata4 == 'caustic_cip_total_soaking') {
                                    echo 'selected';
                                } ?>>
                                    Caustic CIP Total Soaking</option>
                                <option value="caustic_rinse_cycle" class="caustic" <?php if ($dex[0]->qdata4 == 'caustic_rinse_cycle') {
                                    echo 'selected';
                                } ?>>Caustic
                                    Rinse Cycles</option>
                                <option value="caustic_cip_water_vol" class="caustic" <?php if ($dex[0]->qdata4 == 'caustic_cip_water_vol') {
                                    echo 'selected';
                                } ?>>Caustic
                                    Rinse Vol</option>
                                <option value="citric_temp" class="citric" <?php if ($dex[0]->qdata4 == 'citric_temp') {
                                    echo 'selected';
                                } ?>>Citric CIP Temp.
                                </option>
                                <option value="citric_tnk_vol" class="citric" <?php if ($dex[0]->qdata4 == 'citric_tnk_vol') {
                                    echo 'selected';
                                } ?>>Citric CIP Vol
                                </option>
                                <option value="citric_used_ltr" class="citric" <?php if ($dex[0]->qdata4 == 'citric_used_ltr') {
                                    echo 'selected';
                                } ?>>Citric Used in
                                    CIP</option>
                                <option value="citric_lowflow_ph" class="citric" <?php if ($dex[0]->qdata4 == 'citric_lowflow_ph') {
                                    echo 'selected';
                                } ?>>Citric LF pH
                                </option>
                                <option value="citric_lowflow_hrs" class="citric" <?php if ($dex[0]->qdata4 == 'citric_lowflow_hrs') {
                                    echo 'selected';
                                } ?>>Citric LF
                                    recirculation</option>
                                <option value="citric_lowflow_rate" class="citric" <?php if ($dex[0]->qdata4 == 'citric_lowflow_rate') {
                                    echo 'selected';
                                } ?>>Citric LF
                                    rate</option>
                                <option value="citric_lowflow_soaking" class="citric" <?php if ($dex[0]->qdata4 == 'citric_lowflow_soaking') {
                                    echo 'selected';
                                } ?>>Citric LF
                                    Soaking</option>
                                <option value="citric_highflow_ph" class="citric" <?php if ($dex[0]->qdata4 == 'citric_highflow_ph') {
                                    echo 'selected';
                                } ?>>Citric HF pH
                                </option>
                                <option value="citric_highflow_hrs" class="citric" <?php if ($dex[0]->qdata4 == 'citric_highflow_hrs') {
                                    echo 'selected';
                                } ?>>Citric HF
                                    Recirculation</option>
                                <option value="citric_highflow_rate" class="citric" <?php if ($dex[0]->qdata4 == 'citric_highflow_rate') {
                                    echo 'selected';
                                } ?>>Citric HF
                                    rate</option>
                                <option value="citric_highflow_soaking" class="citric" <?php if ($dex[0]->qdata4 == 'citric_highflow_soaking') {
                                    echo 'selected';
                                } ?>>Citric HF
                                    Soaking</option>
                                <option value="citric_rinse_cycle" class="citric" <?php if ($dex[0]->qdata4 == 'citric_rinse_cycle') {
                                    echo 'selected';
                                } ?>>Citric Rinse
                                    Cycles</option>
                                <option value="citric_cip_water_cons" class="citric" <?php if ($dex[0]->qdata4 == 'citric_cip_water_cons') {
                                    echo 'selected';
                                } ?>>Citric
                                    Rinse Vol</option>
                            </select>
                        </div>
                    </div>
                <td style="text-align: center;">

                    <!-- Button trigger modal series 4-->
                    <span id="panel4">
                        <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal"
                            data-bs-target="#modal-series4">
                            <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
                    <!-- Modal series 4-->
                    <div class="modal fade" id="modal-series4" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header modelheader4">
                                    <h5 class="modal-title" id="seriestitle4"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <div class="row mb-2">
                                        <label for="chart_type4" class="col-sm-4 col-form-label">Chart Type</label>
                                        <div class="col-sm-4">
                                            <select class="chart_render form-control form-select" id="chart_type4">
                                                <option value="spline" <?php if ($dex[0]->chart4 == 'spline') {
                                                    echo 'selected';
                                                } ?>>Line</option>
                                                <option value="areaspline" <?php if ($dex[0]->chart4 == 'areaspline') {
                                                    echo 'selected';
                                                } ?>>Area </option>
                                                <option value="column" <?php if ($dex[0]->chart4 == 'column') {
                                                    echo 'selected';
                                                } ?>>Column </option>
                                                <option value="scatter" <?php if ($dex[0]->chart4 == 'scatter') {
                                                    echo 'selected';
                                                } ?>>Scatter </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <label for="line_width4" class="col-sm-4 col-form-label">Line Width</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="line_width4" class="chart_render form-control"
                                                value="<?php echo $dex[0]->linewt4; ?>" min="0" max="4"
                                                step="0.1">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker4" class="col-sm-4 col-form-label">Marker Weight</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="marker4" class="chart_render form-control"
                                                value="<?php echo $dex[0]->mkr4; ?>" min="0" step="0.1"
                                                max="4">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker_shape4" class="col-sm-4 col-form-label">Marker
                                            Shape</label>
                                        <div class="col-sm-4">
                                            <select id="marker_shape4" class="chart_render form-control form-select">
                                                <option value="circle" <?php if ($dex[0]->mkrsp4 == 'circle') {
                                                    echo 'selected';
                                                } ?>>Circle </option>
                                                <option value="square" <?php if ($dex[0]->mkrsp4 == 'square') {
                                                    echo 'selected';
                                                } ?>>Square </option>
                                                <option value="triangle" <?php if ($dex[0]->mkrsp4 == 'triangle') {
                                                    echo 'selected';
                                                } ?>>Trianlge </option>
                                                <option value="diamond" <?php if ($dex[0]->mkrsp4 == 'diamond') {
                                                    echo 'selected';
                                                } ?>>Diamond </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="input-group">

                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="dt_label4" <?php if ($dex[0]->datalb4 == 'true') {
                                                    echo 'checked';
                                                } ?>>
                                            <label for="dt_label4" class="form-check-label col-auto">&nbsp; Show Data
                                                Labels</label>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="input-group">
                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="y_axis4" <?php if ($dex[0]->yaxis4 == 'true') {
                                                    echo 'checked';
                                                } ?>>
                                            <label for="y_axis4" class="form-check-label col-auto">&nbsp; Show
                                                Y-axis</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal end here   -->

                </td>

                </td>
                <td style="text-align: center; background-color: black; color:#3edbf0; "> <span
                        id="data_length4"></span></td>
                <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max4"></span>
                </td>
                <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min4"></span>
                </td>
                <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg4"></span>
                </td>
                <td style="text-align: center; background-color: black; color:#3ae374; "><span id="sum4"></span>
                </td>
                <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit4"></span>
                </td>

            </tr>
            <tr class="tr5">
                <td>
                    <div class="input-group">
                        <div class="col-auto"><input type="checkbox" class="query series-chk" id="line5"
                                <?php if ($dex[0]->line5 == 'true') {
                                    echo 'checked';
                                } ?>>
                            &nbsp;5 &nbsp;<input type="color" id="pen5" name="pen5"
                                value="<?php echo $dex[0]->pen5; ?>" class="chart_render series-color"> &nbsp; </div>
                        <div class="col-auto">
                            <select class="query form-control form-control-sm form-select" id="ufdata5">
                                <option value="result_init_dp" <?php if ($dex[0]->qdata5 == 'result_init_dp') {
                                    echo 'selected';
                                } ?>>DP before CIP</option>
                                <option value="final_dp" <?php if ($dex[0]->qdata5 == 'final_dp') {
                                    echo 'selected';
                                } ?>>DP after CIP</option>
                                <option value="cip_sr" <?php if ($dex[0]->qdata5 == 'cip_sr') {
                                    echo 'selected';
                                } ?>>CIP Number</option>
                                <option value="running_days" <?php if ($dex[0]->qdata5 == 'running_days') {
                                    echo 'selected';
                                } ?>>Skid Running Days</option>
                                <option value="skid_flow" <?php if ($dex[0]->qdata5 == 'skid_flow') {
                                    echo 'selected';
                                } ?>>Skid Flow</option>
                                <option value="crt_lf_dp" <?php if ($dex[0]->qdata5 == 'crt_lf_dp') {
                                    echo 'selected';
                                } ?>>Cartridge DP during LF</option>
                                <option value="crt_hg_dp" <?php if ($dex[0]->qdata5 == 'crt_hg_dp') {
                                    echo 'selected';
                                } ?>>Cartridge DP during HF</option>
                                <option value="caustic_temp" class="caustic" <?php if ($dex[0]->qdata5 == 'caustic_temp') {
                                    echo 'selected';
                                } ?>>Caustic CIP Temp.
                                </option>
                                <option value="caustic_tnk_lvl" class="caustic" <?php if ($dex[0]->qdata5 == 'caustic_tnk_lvl') {
                                    echo 'selected';
                                } ?>>Caustic CIP Vol
                                </option>
                                <option value="caustic_used_ltr" class="caustic" <?php if ($dex[0]->qdata5 == 'caustic_used_ltr') {
                                    echo 'selected';
                                } ?>>Caustic Used in
                                    CIP</option>
                                <option value="caustic_low_flow_ph" class="caustic" <?php if ($dex[0]->qdata5 == 'caustic_low_flow_ph') {
                                    echo 'selected';
                                } ?>>Caustic LF
                                    pH</option>
                                <option value="caustic_lowflow_hrs" class="caustic" <?php if ($dex[0]->qdata5 == 'caustic_lowflow_hrs') {
                                    echo 'selected';
                                } ?>>Caustic LF
                                    recirculation</option>
                                <option value="caustic_lowflow_rate" class="caustic" <?php if ($dex[0]->qdata5 == 'caustic_lowflow_rate') {
                                    echo 'selected';
                                } ?>>Caustic LF
                                    rate</option>
                                <option value="caustc_lowflow_soaking" class="caustic" <?php if ($dex[0]->qdata5 == 'caustc_lowflow_soaking') {
                                    echo 'selected';
                                } ?>>Caustic
                                    LF Soaking</option>
                                <option value="caustic_highflow_ph" class="caustic" <?php if ($dex[0]->qdata5 == 'caustic_highflow_ph') {
                                    echo 'selected';
                                } ?>>Caustic HF
                                    pH</option>
                                <option value="caustic_highflow_hrs" class="caustic" <?php if ($dex[0]->qdata5 == 'caustic_highflow_hrs') {
                                    echo 'selected';
                                } ?>>Caustic HF
                                    Recirculation</option>
                                <option value="caustic_highflow_rate" class="caustic" <?php if ($dex[0]->qdata5 == 'caustic_highflow_rate') {
                                    echo 'selected';
                                } ?>>Caustic HF
                                    rate</option>
                                <option value="caustic_highflow_soaking" class="caustic" <?php if ($dex[0]->qdata5 == 'caustic_highflow_soaking') {
                                    echo 'selected';
                                } ?>>Caustic
                                    HF Soaking</option>
                                <option value="caustic_cip_total_soaking" class="caustic" <?php if ($dex[0]->qdata5 == 'caustic_cip_total_soaking') {
                                    echo 'selected';
                                } ?>>
                                    Caustic CIP Total Soaking</option>
                                <option value="caustic_rinse_cycle" class="caustic" <?php if ($dex[0]->qdata5 == 'caustic_rinse_cycle') {
                                    echo 'selected';
                                } ?>>Caustic
                                    Rinse Cycles</option>
                                <option value="caustic_cip_water_vol" class="caustic" <?php if ($dex[0]->qdata5 == 'caustic_cip_water_vol') {
                                    echo 'selected';
                                } ?>>Caustic
                                    Rinse Vol</option>
                                <option value="citric_temp" class="citric" <?php if ($dex[0]->qdata5 == 'citric_temp') {
                                    echo 'selected';
                                } ?>>Citric CIP Temp.
                                </option>
                                <option value="citric_tnk_vol" class="citric" <?php if ($dex[0]->qdata5 == 'citric_tnk_vol') {
                                    echo 'selected';
                                } ?>>Citric CIP Vol
                                </option>
                                <option value="citric_used_ltr" class="citric" <?php if ($dex[0]->qdata5 == 'citric_used_ltr') {
                                    echo 'selected';
                                } ?>>Citric Used in
                                    CIP</option>
                                <option value="citric_lowflow_ph" class="citric" <?php if ($dex[0]->qdata5 == 'citric_lowflow_ph') {
                                    echo 'selected';
                                } ?>>Citric LF pH
                                </option>
                                <option value="citric_lowflow_hrs" class="citric" <?php if ($dex[0]->qdata5 == 'citric_lowflow_hrs') {
                                    echo 'selected';
                                } ?>>Citric LF
                                    recirculation</option>
                                <option value="citric_lowflow_rate" class="citric" <?php if ($dex[0]->qdata5 == 'citric_lowflow_rate') {
                                    echo 'selected';
                                } ?>>Citric LF
                                    rate</option>
                                <option value="citric_lowflow_soaking" class="citric" <?php if ($dex[0]->qdata5 == 'citric_lowflow_soaking') {
                                    echo 'selected';
                                } ?>>Citric LF
                                    Soaking</option>
                                <option value="citric_highflow_ph" class="citric" <?php if ($dex[0]->qdata5 == 'citric_highflow_ph') {
                                    echo 'selected';
                                } ?>>Citric HF pH
                                </option>
                                <option value="citric_highflow_hrs" class="citric" <?php if ($dex[0]->qdata5 == 'citric_highflow_hrs') {
                                    echo 'selected';
                                } ?>>Citric HF
                                    Recirculation</option>
                                <option value="citric_highflow_rate" class="citric" <?php if ($dex[0]->qdata5 == 'citric_highflow_rate') {
                                    echo 'selected';
                                } ?>>Citric HF
                                    rate</option>
                                <option value="citric_highflow_soaking" class="citric" <?php if ($dex[0]->qdata5 == 'citric_highflow_soaking') {
                                    echo 'selected';
                                } ?>>Citric HF
                                    Soaking</option>
                                <option value="citric_rinse_cycle" class="citric" <?php if ($dex[0]->qdata5 == 'citric_rinse_cycle') {
                                    echo 'selected';
                                } ?>>Citric Rinse
                                    Cycles</option>
                                <option value="citric_cip_water_cons" class="citric" <?php if ($dex[0]->qdata5 == 'citric_cip_water_cons') {
                                    echo 'selected';
                                } ?>>Citric
                                    Rinse Vol</option>
                            </select>
                        </div>
                    </div>
                <td style="text-align: center;">

                    <!-- Button trigger modal series 5-->
                    <span id="panel5">
                        <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal"
                            data-bs-target="#modal-series5">
                            <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
                    <!-- Modal series 5-->
                    <div class="modal fade" id="modal-series5" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header modelheader5">
                                    <h5 class="modal-title" id="seriestitle5"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <div class="row mb-2">
                                        <label for="chart_type5" class="col-sm-4 col-form-label">Chart Type</label>
                                        <div class="col-sm-4">
                                            <select class="chart_render form-control form-select" id="chart_type5">
                                                <option value="spline" <?php if ($dex[0]->chart5 == 'spline') {
                                                    echo 'selected';
                                                } ?>>Line</option>
                                                <option value="areaspline" <?php if ($dex[0]->chart5 == 'areaspline') {
                                                    echo 'selected';
                                                } ?>>Area </option>
                                                <option value="column" <?php if ($dex[0]->chart5 == 'column') {
                                                    echo 'selected';
                                                } ?>>Column </option>
                                                <option value="scatter" <?php if ($dex[0]->chart5 == 'scatter') {
                                                    echo 'selected';
                                                } ?>>Scatter </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <label for="line_width5" class="col-sm-4 col-form-label">Line Width</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="line_width5" class="chart_render form-control"
                                                value="<?php echo $dex[0]->linewt5; ?>" min="0" max="4"
                                                step="0.1">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker5" class="col-sm-4 col-form-label">Marker Weight</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="marker5" class="chart_render form-control"
                                                value="<?php echo $dex[0]->mkr5; ?>" min="0" step="0.1"
                                                max="4">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker_shape5" class="col-sm-4 col-form-label">Marker
                                            Shape</label>
                                        <div class="col-sm-4">
                                            <select id="marker_shape5" class="chart_render form-control form-select">
                                                <option value="circle" <?php if ($dex[0]->mkrsp5 == 'circle') {
                                                    echo 'selected';
                                                } ?>>Circle </option>
                                                <option value="square" <?php if ($dex[0]->mkrsp5 == 'square') {
                                                    echo 'selected';
                                                } ?>>Square </option>
                                                <option value="triangle" <?php if ($dex[0]->mkrsp5 == 'triangle') {
                                                    echo 'selected';
                                                } ?>>Trianlge </option>
                                                <option value="diamond" <?php if ($dex[0]->mkrsp5 == 'diamond') {
                                                    echo 'selected';
                                                } ?>>Diamond </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="input-group">

                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="dt_label5" <?php if ($dex[0]->datalb5 == 'true') {
                                                    echo 'checked';
                                                } ?>>
                                            <label for="dt_label5" class="form-check-label col-auto">&nbsp; Show Data
                                                Labels</label>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="input-group">
                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="y_axis5" <?php if ($dex[0]->yaxis5 == 'true') {
                                                    echo 'checked';
                                                } ?>>
                                            <label for="y_axis5" class="form-check-label col-auto">&nbsp; Show
                                                Y-axis</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal end here   -->




                </td>

                </td>
                <td style="text-align: center; background-color: black; color:#3edbf0; "> <span
                        id="data_length5"></span></td>
                <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max5"></span>
                </td>
                <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min5"></span>
                </td>
                <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg5"></span>
                </td>
                <td style="text-align: center; background-color: black; color:#3ae374; "><span id="sum5"></span>
                </td>
                <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit5"></span>
                </td>

            </tr>

            <tr class="tr6">
                <td>
                    <div class="input-group">
                        <div class="col-auto"><input type="checkbox" class="query series-chk" id="line6"
                                <?php if ($dex[0]->line6 == 'true') {
                                    echo 'checked';
                                } ?>>
                            &nbsp;6 &nbsp;<input type="color" id="pen6" name="pen6"
                                value="<?php echo $dex[0]->pen6; ?>" class="chart_render series-color"> &nbsp; </div>
                        <div class="col-auto">
                            <select class="query form-control form-control-sm form-select" id="ufdata6">
                                <option value="result_init_dp" <?php if ($dex[0]->qdata6 == 'result_init_dp') {
                                    echo 'selected';
                                } ?>>DP before CIP</option>
                                <option value="final_dp" <?php if ($dex[0]->qdata6 == 'final_dp') {
                                    echo 'selected';
                                } ?>>DP after CIP</option>
                                <option value="cip_sr" <?php if ($dex[0]->qdata6 == 'cip_sr') {
                                    echo 'selected';
                                } ?>>CIP Number</option>
                                <option value="running_days" <?php if ($dex[0]->qdata6 == 'running_days') {
                                    echo 'selected';
                                } ?>>Skid Running Days</option>
                                <option value="skid_flow" <?php if ($dex[0]->qdata6 == 'skid_flow') {
                                    echo 'selected';
                                } ?>>Skid Flow</option>
                                <option value="crt_lf_dp" <?php if ($dex[0]->qdata6 == 'crt_lf_dp') {
                                    echo 'selected';
                                } ?>>Cartridge DP during LF</option>
                                <option value="crt_hg_dp" <?php if ($dex[0]->qdata6 == 'crt_hg_dp') {
                                    echo 'selected';
                                } ?>>Cartridge DP during HF</option>
                                <option value="caustic_temp" class="caustic" <?php if ($dex[0]->qdata6 == 'caustic_temp') {
                                    echo 'selected';
                                } ?>>Caustic CIP Temp.
                                </option>
                                <option value="caustic_tnk_lvl" class="caustic" <?php if ($dex[0]->qdata6 == 'caustic_tnk_lvl') {
                                    echo 'selected';
                                } ?>>Caustic CIP
                                    Vol</option>
                                <option value="caustic_used_ltr" class="caustic" <?php if ($dex[0]->qdata6 == 'caustic_used_ltr') {
                                    echo 'selected';
                                } ?>>Caustic Used
                                    in CIP</option>
                                <option value="caustic_low_flow_ph" class="caustic" <?php if ($dex[0]->qdata6 == 'caustic_low_flow_ph') {
                                    echo 'selected';
                                } ?>>Caustic LF
                                    pH</option>
                                <option value="caustic_lowflow_hrs" class="caustic" <?php if ($dex[0]->qdata6 == 'caustic_lowflow_hrs') {
                                    echo 'selected';
                                } ?>>Caustic LF
                                    recirculation</option>
                                <option value="caustic_lowflow_rate" class="caustic" <?php if ($dex[0]->qdata6 == 'caustic_lowflow_rate') {
                                    echo 'selected';
                                } ?>>Caustic
                                    LF rate</option>
                                <option value="caustc_lowflow_soaking" class="caustic" <?php if ($dex[0]->qdata6 == 'caustc_lowflow_soaking') {
                                    echo 'selected';
                                } ?>>Caustic
                                    LF Soaking</option>
                                <option value="caustic_highflow_ph" class="caustic" <?php if ($dex[0]->qdata6 == 'caustic_highflow_ph') {
                                    echo 'selected';
                                } ?>>Caustic HF
                                    pH</option>
                                <option value="caustic_highflow_hrs" class="caustic" <?php if ($dex[0]->qdata6 == 'caustic_highflow_hrs') {
                                    echo 'selected';
                                } ?>>Caustic
                                    HF Recirculation</option>
                                <option value="caustic_highflow_rate" class="caustic" <?php if ($dex[0]->qdata6 == 'caustic_highflow_rate') {
                                    echo 'selected';
                                } ?>>Caustic
                                    HF rate</option>
                                <option value="caustic_highflow_soaking" class="caustic" <?php if ($dex[0]->qdata6 == 'caustic_highflow_soaking') {
                                    echo 'selected';
                                } ?>>
                                    Caustic HF Soaking</option>
                                <option value="caustic_cip_total_soaking" class="caustic" <?php if ($dex[0]->qdata6 == 'caustic_cip_total_soaking') {
                                    echo 'selected';
                                } ?>>
                                    Caustic CIP Total Soaking</option>
                                <option value="caustic_rinse_cycle" class="caustic" <?php if ($dex[0]->qdata6 == 'caustic_rinse_cycle') {
                                    echo 'selected';
                                } ?>>Caustic
                                    Rinse Cycles</option>
                                <option value="caustic_cip_water_vol" class="caustic" <?php if ($dex[0]->qdata6 == 'caustic_cip_water_vol') {
                                    echo 'selected';
                                } ?>>Caustic
                                    Rinse Vol</option>
                                <option value="citric_temp" class="citric" <?php if ($dex[0]->qdata6 == 'citric_temp') {
                                    echo 'selected';
                                } ?>>Citric CIP Temp.
                                </option>
                                <option value="citric_tnk_vol" class="citric" <?php if ($dex[0]->qdata6 == 'citric_tnk_vol') {
                                    echo 'selected';
                                } ?>>Citric CIP Vol
                                </option>
                                <option value="citric_used_ltr" class="citric" <?php if ($dex[0]->qdata6 == 'citric_used_ltr') {
                                    echo 'selected';
                                } ?>>Citric Used in
                                    CIP</option>
                                <option value="citric_lowflow_ph" class="citric" <?php if ($dex[0]->qdata6 == 'citric_lowflow_ph') {
                                    echo 'selected';
                                } ?>>Citric LF pH
                                </option>
                                <option value="citric_lowflow_hrs" class="citric" <?php if ($dex[0]->qdata6 == 'citric_lowflow_hrs') {
                                    echo 'selected';
                                } ?>>Citric LF
                                    recirculation</option>
                                <option value="citric_lowflow_rate" class="citric" <?php if ($dex[0]->qdata6 == 'citric_lowflow_rate') {
                                    echo 'selected';
                                } ?>>Citric LF
                                    rate</option>
                                <option value="citric_lowflow_soaking" class="citric" <?php if ($dex[0]->qdata6 == 'citric_lowflow_soaking') {
                                    echo 'selected';
                                } ?>>Citric
                                    LF Soaking</option>
                                <option value="citric_highflow_ph" class="citric" <?php if ($dex[0]->qdata6 == 'citric_highflow_ph') {
                                    echo 'selected';
                                } ?>>Citric HF pH
                                </option>
                                <option value="citric_highflow_hrs" class="citric" <?php if ($dex[0]->qdata6 == 'citric_highflow_hrs') {
                                    echo 'selected';
                                } ?>>Citric HF
                                    Recirculation</option>
                                <option value="citric_highflow_rate" class="citric" <?php if ($dex[0]->qdata6 == 'citric_highflow_rate') {
                                    echo 'selected';
                                } ?>>Citric HF
                                    rate</option>
                                <option value="citric_highflow_soaking" class="citric" <?php if ($dex[0]->qdata6 == 'citric_highflow_soaking') {
                                    echo 'selected';
                                } ?>>Citric
                                    HF Soaking</option>
                                <option value="citric_rinse_cycle" class="citric" <?php if ($dex[0]->qdata6 == 'citric_rinse_cycle') {
                                    echo 'selected';
                                } ?>>Citric Rinse
                                    Cycles</option>
                                <option value="citric_cip_water_cons" class="citric" <?php if ($dex[0]->qdata6 == 'citric_cip_water_cons') {
                                    echo 'selected';
                                } ?>>Citric
                                    Rinse Vol</option>
                            </select>
                        </div>
                    </div>
                <td style="text-align: center;">

                    <!-- Button trigger modal series 6-->
                    <span id="panel6">
                        <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal"
                            data-bs-target="#modal-series6">
                            <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
                    <!-- Modal series 6-->
                    <div class="modal fade" id="modal-series6" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header modelheader6">
                                    <h5 class="modal-title" id="seriestitle6"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <div class="row mb-2">
                                        <label for="chart_type6" class="col-sm-4 col-form-label">Chart Type</label>
                                        <div class="col-sm-4">
                                            <select class="chart_render form-control form-select" id="chart_type6">
                                                <option value="spline" <?php if ($dex[0]->chart6 == 'spline') {
                                                    echo 'selected';
                                                } ?>>Line</option>
                                                <option value="areaspline" <?php if ($dex[0]->chart6 == 'areaspline') {
                                                    echo 'selected';
                                                } ?>>Area </option>
                                                <option value="column" <?php if ($dex[0]->chart6 == 'column') {
                                                    echo 'selected';
                                                } ?>>Column </option>
                                                <option value="scatter" <?php if ($dex[0]->chart6 == 'scatter') {
                                                    echo 'selected';
                                                } ?>>Scatter </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <label for="line_width6" class="col-sm-4 col-form-label">Line Width</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="line_width6"
                                                class="chart_render form-control" value="<?php echo $dex[0]->linewt6; ?>"
                                                min="0" max="4" step="0.1">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker6" class="col-sm-4 col-form-label">Marker Weight</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="marker6" class="chart_render form-control"
                                                value="<?php echo $dex[0]->mkr6; ?>" min="0" step="0.1"
                                                max="4">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker_shape6" class="col-sm-4 col-form-label">Marker
                                            Shape</label>
                                        <div class="col-sm-4">
                                            <select id="marker_shape6"
                                                class="chart_render form-control form-select">
                                                <option value="circle" <?php if ($dex[0]->mkrsp6 == 'circle') {
                                                    echo 'selected';
                                                } ?>>Circle </option>
                                                <option value="square" <?php if ($dex[0]->mkrsp6 == 'square') {
                                                    echo 'selected';
                                                } ?>>Square </option>
                                                <option value="triangle" <?php if ($dex[0]->mkrsp6 == 'triangle') {
                                                    echo 'selected';
                                                } ?>>Trianlge </option>
                                                <option value="diamond" <?php if ($dex[0]->mkrsp6 == 'diamond') {
                                                    echo 'selected';
                                                } ?>>Diamond </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="input-group">

                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="dt_label6" <?php if ($dex[0]->datalb6 == 'true') {
                                                    echo 'checked';
                                                } ?>>
                                            <label for="dt_label6" class="form-check-label col-auto">&nbsp; Show
                                                Data Labels</label>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="input-group">
                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="y_axis6" <?php if ($dex[0]->yaxis6 == 'true') {
                                                    echo 'checked';
                                                } ?>>
                                            <label for="y_axis6" class="form-check-label col-auto">&nbsp; Show
                                                Y-axis</label>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal end here   -->
                </td>

                </td>
                <td style="text-align: center; background-color: black; color:#3edbf0; "> <span
                        id="data_length6"></span></td>
                <td style="text-align: center; background-color: black; color:#f21170; "> <span
                        id="data_max6"></span> </td>
                <td style="text-align: center; background-color: black; color:#00ead3; "> <span
                        id="data_min6"></span> </td>
                <td style="text-align: center; background-color: black; color:#fff600; "> <span
                        id="data_avg6"></span> </td>
                <td style="text-align: center; background-color: black; color:#3ae374; "><span
                        id="sum6"></span> </td>
                <td style="text-align: center; background-color: black; color:#ced6e0; "><span
                        id="unit6"></span> </td>

            </tr>

            <tr class="tr7">
                <td>
                    <div class="input-group">
                        <div class="col-auto"><input type="checkbox" class="query series-chk" id="line7"
                                <?php if ($dex[0]->line7 == 'true') {
                                    echo 'checked';
                                } ?>>
                            &nbsp;7 &nbsp;<input type="color" id="pen7" name="pen7"
                                value="<?php echo $dex[0]->pen7; ?>" class="chart_render series-color"> &nbsp; </div>
                        <div class="col-auto">
                            <select class="query form-control form-control-sm form-select" id="ufdata7">
                                <option value="result_init_dp" <?php if ($dex[0]->qdata7 == 'result_init_dp') {
                                    echo 'selected';
                                } ?>>DP before CIP</option>
                                <option value="final_dp" <?php if ($dex[0]->qdata7 == 'final_dp') {
                                    echo 'selected';
                                } ?>>DP after CIP</option>
                                <option value="cip_sr" <?php if ($dex[0]->qdata7 == 'cip_sr') {
                                    echo 'selected';
                                } ?>>CIP Number</option>
                                <option value="running_days" <?php if ($dex[0]->qdata7 == 'running_days') {
                                    echo 'selected';
                                } ?>>Skid Running Days</option>
                                <option value="skid_flow" <?php if ($dex[0]->qdata7 == 'skid_flow') {
                                    echo 'selected';
                                } ?>>Skid Flow</option>
                                <option value="crt_lf_dp" <?php if ($dex[0]->qdata7 == 'crt_lf_dp') {
                                    echo 'selected';
                                } ?>>Cartridge DP during LF</option>
                                <option value="crt_hg_dp" <?php if ($dex[0]->qdata7 == 'crt_hg_dp') {
                                    echo 'selected';
                                } ?>>Cartridge DP during HF</option>
                                <option value="caustic_temp" class="caustic" <?php if ($dex[0]->qdata7 == 'caustic_temp') {
                                    echo 'selected';
                                } ?>>Caustic CIP Temp.
                                </option>
                                <option value="caustic_tnk_lvl" class="caustic" <?php if ($dex[0]->qdata7 == 'caustic_tnk_lvl') {
                                    echo 'selected';
                                } ?>>Caustic CIP
                                    Vol</option>
                                <option value="caustic_used_ltr" class="caustic" <?php if ($dex[0]->qdata7 == 'caustic_used_ltr') {
                                    echo 'selected';
                                } ?>>Caustic Used
                                    in CIP</option>
                                <option value="caustic_low_flow_ph" class="caustic" <?php if ($dex[0]->qdata7 == 'caustic_low_flow_ph') {
                                    echo 'selected';
                                } ?>>Caustic LF
                                    pH</option>
                                <option value="caustic_lowflow_hrs" class="caustic" <?php if ($dex[0]->qdata7 == 'caustic_lowflow_hrs') {
                                    echo 'selected';
                                } ?>>Caustic LF
                                    recirculation</option>
                                <option value="caustic_lowflow_rate" class="caustic" <?php if ($dex[0]->qdata7 == 'caustic_lowflow_rate') {
                                    echo 'selected';
                                } ?>>Caustic
                                    LF rate</option>
                                <option value="caustc_lowflow_soaking" class="caustic" <?php if ($dex[0]->qdata7 == 'caustc_lowflow_soaking') {
                                    echo 'selected';
                                } ?>>Caustic
                                    LF Soaking</option>
                                <option value="caustic_highflow_ph" class="caustic" <?php if ($dex[0]->qdata7 == 'caustic_highflow_ph') {
                                    echo 'selected';
                                } ?>>Caustic HF
                                    pH</option>
                                <option value="caustic_highflow_hrs" class="caustic" <?php if ($dex[0]->qdata7 == 'caustic_highflow_hrs') {
                                    echo 'selected';
                                } ?>>Caustic
                                    HF Recirculation</option>
                                <option value="caustic_highflow_rate" class="caustic" <?php if ($dex[0]->qdata7 == 'caustic_highflow_rate') {
                                    echo 'selected';
                                } ?>>Caustic
                                    HF rate</option>
                                <option value="caustic_highflow_soaking" class="caustic" <?php if ($dex[0]->qdata7 == 'caustic_highflow_soaking') {
                                    echo 'selected';
                                } ?>>
                                    Caustic HF Soaking</option>
                                <option value="caustic_cip_total_soaking" class="caustic" <?php if ($dex[0]->qdata7 == 'caustic_cip_total_soaking') {
                                    echo 'selected';
                                } ?>>
                                    Caustic CIP Total Soaking</option>
                                <option value="caustic_rinse_cycle" class="caustic" <?php if ($dex[0]->qdata7 == 'caustic_rinse_cycle') {
                                    echo 'selected';
                                } ?>>Caustic
                                    Rinse Cycles</option>
                                <option value="caustic_cip_water_vol" class="caustic" <?php if ($dex[0]->qdata7 == 'caustic_cip_water_vol') {
                                    echo 'selected';
                                } ?>>Caustic
                                    Rinse Vol</option>
                                <option value="citric_temp" class="citric" <?php if ($dex[0]->qdata7 == 'citric_temp') {
                                    echo 'selected';
                                } ?>>Citric CIP Temp.
                                </option>
                                <option value="citric_tnk_vol" class="citric" <?php if ($dex[0]->qdata7 == 'citric_tnk_vol') {
                                    echo 'selected';
                                } ?>>Citric CIP Vol
                                </option>
                                <option value="citric_used_ltr" class="citric" <?php if ($dex[0]->qdata7 == 'citric_used_ltr') {
                                    echo 'selected';
                                } ?>>Citric Used in
                                    CIP</option>
                                <option value="citric_lowflow_ph" class="citric" <?php if ($dex[0]->qdata7 == 'citric_lowflow_ph') {
                                    echo 'selected';
                                } ?>>Citric LF pH
                                </option>
                                <option value="citric_lowflow_hrs" class="citric" <?php if ($dex[0]->qdata7 == 'citric_lowflow_hrs') {
                                    echo 'selected';
                                } ?>>Citric LF
                                    recirculation</option>
                                <option value="citric_lowflow_rate" class="citric" <?php if ($dex[0]->qdata7 == 'citric_lowflow_rate') {
                                    echo 'selected';
                                } ?>>Citric LF
                                    rate</option>
                                <option value="citric_lowflow_soaking" class="citric" <?php if ($dex[0]->qdata7 == 'citric_lowflow_soaking') {
                                    echo 'selected';
                                } ?>>Citric
                                    LF Soaking</option>
                                <option value="citric_highflow_ph" class="citric" <?php if ($dex[0]->qdata7 == 'citric_highflow_ph') {
                                    echo 'selected';
                                } ?>>Citric HF pH
                                </option>
                                <option value="citric_highflow_hrs" class="citric" <?php if ($dex[0]->qdata7 == 'citric_highflow_hrs') {
                                    echo 'selected';
                                } ?>>Citric HF
                                    Recirculation</option>
                                <option value="citric_highflow_rate" class="citric" <?php if ($dex[0]->qdata7 == 'citric_highflow_rate') {
                                    echo 'selected';
                                } ?>>Citric HF
                                    rate</option>
                                <option value="citric_highflow_soaking" class="citric" <?php if ($dex[0]->qdata7 == 'citric_highflow_soaking') {
                                    echo 'selected';
                                } ?>>Citric
                                    HF Soaking</option>
                                <option value="citric_rinse_cycle" class="citric" <?php if ($dex[0]->qdata7 == 'citric_rinse_cycle') {
                                    echo 'selected';
                                } ?>>Citric Rinse
                                    Cycles</option>
                                <option value="citric_cip_water_cons" class="citric" <?php if ($dex[0]->qdata7 == 'citric_cip_water_cons') {
                                    echo 'selected';
                                } ?>>Citric
                                    Rinse Vol</option>
                            </select>
                        </div>
                    </div>
                <td style="text-align: center;">

                    <!-- Button trigger modal series 5-->
                    <span id="panel7">
                        <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal"
                            data-bs-target="#modal-series7">
                            <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
                    <!-- Modal series 5-->
                    <div class="modal fade" id="modal-series7" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header modelheader7">
                                    <h5 class="modal-title" id="seriestitle7"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="row mb-2">
                                        <label for="chart_type7" class="col-sm-4 col-form-label">Chart Type</label>
                                        <div class="col-sm-4">
                                            <select class="chart_render form-control form-select" id="chart_type7">
                                                <option value="spline" <?php if ($dex[0]->chart7 == 'spline') {
                                                    echo 'selected';
                                                } ?>>Line</option>
                                                <option value="areaspline" <?php if ($dex[0]->chart7 == 'areaspline') {
                                                    echo 'selected';
                                                } ?>>Area </option>
                                                <option value="column" <?php if ($dex[0]->chart7 == 'column') {
                                                    echo 'selected';
                                                } ?>>Column </option>
                                                <option value="scatter" <?php if ($dex[0]->chart7 == 'scatter') {
                                                    echo 'selected';
                                                } ?>>Scatter </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <label for="line_width7" class="col-sm-4 col-form-label">Line Width</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="line_width7"
                                                class="chart_render form-control" value="<?php echo $dex[0]->linewt7; ?>"
                                                min="0" max="4" step="0.1">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker7" class="col-sm-4 col-form-label">Marker Weight</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="marker7" class="chart_render form-control"
                                                value="<?php echo $dex[0]->mkr7; ?>" min="0" step="0.1"
                                                max="4">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker_shape7" class="col-sm-4 col-form-label">Marker
                                            Shape</label>
                                        <div class="col-sm-4">
                                            <select id="marker_shape7"
                                                class="chart_render form-control form-select">
                                                <option value="circle" <?php if ($dex[0]->mkrsp7 == 'circle') {
                                                    echo 'selected';
                                                } ?>>Circle </option>
                                                <option value="square" <?php if ($dex[0]->mkrsp7 == 'square') {
                                                    echo 'selected';
                                                } ?>>Square </option>
                                                <option value="triangle" <?php if ($dex[0]->mkrsp7 == 'triangle') {
                                                    echo 'selected';
                                                } ?>>Trianlge </option>
                                                <option value="diamond" <?php if ($dex[0]->mkrsp7 == 'diamond') {
                                                    echo 'selected';
                                                } ?>>Diamond </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="input-group">

                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="dt_label7" <?php if ($dex[0]->datalb7 == 'true') {
                                                    echo 'checked';
                                                } ?>>
                                            <label for="dt_label7" class="form-check-label col-auto">&nbsp; Show
                                                Data Labels</label>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="input-group">
                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="y_axis7" <?php if ($dex[0]->yaxis7 == 'true') {
                                                    echo 'checked';
                                                } ?>>
                                            <label for="y_axis7" class="form-check-label col-auto">&nbsp; Show
                                                Y-axis</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal end here   -->




                </td>

                </td>
                <td style="text-align: center; background-color: black; color:#3edbf0; "> <span
                        id="data_length7"></span></td>
                <td style="text-align: center; background-color: black; color:#f21170; "> <span
                        id="data_max7"></span> </td>
                <td style="text-align: center; background-color: black; color:#00ead3; "> <span
                        id="data_min7"></span> </td>
                <td style="text-align: center; background-color: black; color:#fff600; "> <span
                        id="data_avg7"></span> </td>
                <td style="text-align: center; background-color: black; color:#3ae374; "><span
                        id="sum7"></span> </td>
                <td style="text-align: center; background-color: black; color:#ced6e0; "><span
                        id="unit7"></span> </td>

            </tr>

        </tbody>
    </table>


    <div class="modal fade" id="sajid" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: green;">
                    <h5 class="modal-title" id="staticBackdropLabel">Chart Global Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row mb-2">
                        <label for="plot_width" class="col-sm-5 col-form-label">Plot Width Span</label>
                        <div class="col-sm-4">
                            <input type="number" id="plot_width" class="chart_render form-control"
                                min="1000" value="1500" step="200">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="pen_main" class="col-sm-5 col-form-label">Background Color</label>
                        <div class="col-sm-4">
                            <input type="color" id="pen_main" name="chart_background" value="#0d0d0d"
                                class="chart_render series-color">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="pen_grid" class="col-sm-5 col-form-label">Grid Lines Color</label>
                        <div class="col-sm-4">
                            <input type="color" id="pen_grid" name="grid_background" value="#8a8b89"
                                class="chart_render series-color">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="is_legend" class="col-sm-5 col-form-label">Show Legends</label>
                        <div class="col-sm-4">
                            <input type="checkbox" id="is_legend" name="is_legend" checked=""
                                class="chart_render main-chk">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="is_main_yaxis" class="col-sm-5 col-form-label">Y-axis % &nbsp;<i
                                class="fa fa-area-chart" aria-hidden="true"></i></label>
                        <div class="col-sm-4">
                            <input type="checkbox" id="is_main_yaxis" name="is_main_yaxis"
                                class="chart_render main-chk">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="export_width" class="col-sm-5 col-form-label">Export Width &nbsp;<i
                                class="fa fa-download" aria-hidden="true"></i></label>
                        <div class="col-sm-4">
                            <input type="number" id="export_width" class="chart_render form-control"
                                min="500" step="50" value="1500">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="export_height" class="col-sm-5 col-form-label">Export Height &nbsp;<i
                                class="fa fa-download" aria-hidden="true"></i></label>
                        <div class="col-sm-4">
                            <input type="number" id="export_height" class="chart_render form-control"
                                min="400" step="50" value="800">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="pen_export" class="col-sm-5 col-form-label">Background Color &nbsp;<i
                                class="fa fa-download" aria-hidden="true"></i></label>
                        <div class="col-sm-4">
                            <input type="color" id="pen_export" name="chart_background_export" value="#ffffff"
                                class="chart_render series-color">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="pen_export_title" class="col-sm-5 col-form-label">Title Color &nbsp;<i
                                class="fa fa-download" aria-hidden="true"></i></label>
                        <div class="col-sm-4">
                            <input type="color" id="pen_export_title" name="chart_background_title"
                                value="#1068c6" class="chart_render series-color">
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('js/stream/ro1_cip_analytics.js') }}"></script>

</body>

</html>
