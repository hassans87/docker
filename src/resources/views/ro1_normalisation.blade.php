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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="{{ asset('js/com.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_red.css">
    <title>RO First Pass </title>
</head>

<body>
    <?php
    $ddx = $dex[0]->pref;
    $param = json_decode($ddx);
    $colors = ['#ff3838', '#17c0eb', '#32ff7e', '#c56cf0', '#ffaf40', '#FC427B', '#55E6C1', '#25CCF7'];
    function userPref($dbparam)
    {
        try {
            echo $dbparam;
        } catch (Throwable $e) {
        }
    }
    function serInd($sd, $sdx)
    {
        if ($sd == $sdx) {
            return 'selected="""';
        }
    }
    
    function checkIf($sdx)
    {
        if ($sdx == 'true') {
            return 'checked="""';
        }
    }
    
    ?>

    <div id="graph">
        <figure id="plot_window" class="test_print loading-msg" style="height:93vh;"></figure>
        
        <style>
            .short_cut, .short_cutx, .short_cutxa, .short_cutxb{
              border:1px solid #a4b0be;
            }
                </style>
              <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                <button type="button" class="short_cut btn btn-sm badge-light3d" id="norm_a">Norm</button>
                <button type="button" class="short_cut btn btn-sm badge-light3d" id="dpix">DPI</button>
                <button type="button" class="short_cut btn btn-sm badge-light3d" id="flow_q">Flow</button>
                <button type="button" class="short_cut btn btn-sm badge-light3d" id="feed_pressure">Pressure</button>
                <button type="button" class="short_cut btn btn-sm badge-light3d" id="ec_com">Conductivity</button>
                <button type="button" class="short_cut btn btn-sm badge-light3d" id="rec_feedEC">Recovery - Feed EC</button>
                <button type="button" class="short_cut btn btn-sm badge-light3d" id="press_temp_dp">Pressure - Temperature</button>
                <button type="button" class="short_cut btn btn-sm badge-light3d" id="feed_flow_dpi">Feed Flow - DPI</button>
                <button type="button" class="short_cut btn btn-sm badge-light3d" id="rec_saltPassage">Salt Passage</button>
                <button type="button" class="short_cut btn btn-sm badge-light3d" id="overFlush">Overflush</button>
              </div>


        <table class="table-sm table-responsive table-light table-bordered">
            <thead class="badge-light3d">
                <tr>
                    <th>Series</th>
                    <th>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Settings  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</th>
                    <th>&nbsp;&nbsp;Data Points&nbsp;&nbsp;</th>
                    <th>&nbsp;&nbsp;Max Value &nbsp;&nbsp;</th>
                    <th>&nbsp;&nbsp;Min Value &nbsp;&nbsp;</th>
                    <th>&nbsp;&nbsp;Avg. Value &nbsp;&nbsp;</th>
                    <th>&nbsp;&nbsp; Unit &nbsp;&nbsp;</th>

                </tr>
            </thead>
            <tbody>
                <tr class="tr1 table-light">
                    <td>
                        <div class="input-group input-group-sm">
                            <div class="col-auto "><input type="checkbox" class="query series-chk filter" id="line1"
                                    <?php if ($param->isline1 == 'true') {
                                        echo 'checked';
                                    } ?>>
                                &nbsp;1 &nbsp;<input type="color" id="pen1" name="pen1"
                                    value="<?php try {
                                        echo $param->pen1;
                                    } catch (Throwable $e) {
                                        echo $colors[0];} ?>" 
                                        class="chart_render series-color"> &nbsp; </div>
                            <div class="col-auto input-group-sm">
                                <select class="query form-control form-select input-group-sm" id="ufdata1">
                                    <option value="dpi_906" {{ serInd('dpi_906', $param->qdata1) }}
                                        style="background-color:rgba(255,121,121,0.4);">DP (Head Loss) &nbsp;&nbsp;
                                    </option>
                                    <option value="norm_perm_flow" {{ serInd('norm_perm_flow', $param->qdata1) }}>
                                        Normalized Permeate Flow &nbsp;&nbsp;</option>
                                    <option value="norm_per_salt_rej" {{ serInd('norm_per_salt_rej', $param->qdata1) }}>
                                        Salt Rejection </option>
                                    <option value="norm_per_salt_pas" {{ serInd('norm_per_salt_pas', $param->qdata1) }}>
                                        Salt Passage </option>
                                    <option value="feed_pres_pt108" {{ serInd('feed_pres_pt108', $param->qdata1) }}>Feed
                                        Pressure </option>
                                    <option value="conc_pres_pt307" {{ serInd('conc_pres_pt307', $param->qdata1) }}>
                                        Concentrate Pressure </option>
                                    <option value="per_pres_pt312" {{ serInd('per_pres_pt312', $param->qdata1) }}>
                                        Permeate Pressure </option>
                                    <option value="recovery" {{ serInd('recovery', $param->qdata1) }}
                                        style="background-color:rgba(34,166,179,0.4);">Recovery (%) </option>
                                    <option value="rear_permeate_ft905"
                                        {{ serInd('rear_permeate_ft905', $param->qdata1) }}>Rear Permeate Flow </option>
                                    <option value="front_permeate_ft_305"
                                        {{ serInd('front_permeate_ft_305', $param->qdata1) }}>Front Permeate Flow
                                    </option>
                                    <option value="full_flushing" {{ serInd('full_flushing', $param->qdata1) }}>Full
                                        Flushing </option>
                                    <option value="membrane_flushing" {{ serInd('membrane_flushing', $param->qdata1) }}>
                                        Membrane Flushing Only </option>
                                    <option value="dbna_flushing" {{ serInd('dbna_flushing', $param->qdata1) }}>DBNPA
                                        Membrane Flushing &nbsp;&nbsp;</option>
                                    <option value="cip" {{ serInd('cip', $param->qdata1) }}
                                        style="background-color:rgba(190,46,221,0.4);">CIP</option>
                                    <option value="feed_flow" {{ serInd('feed_flow', $param->qdata1) }}>Feed Flow
                                    </option>
                                    <option value="hp_pump_ft101" {{ serInd('hp_pump_ft101', $param->qdata1) }}>HP Pump
                                        Flow </option>
                                    <option value="eri_out_ft203" {{ serInd('eri_out_ft203', $param->qdata1) }}>ERI OUT
                                        Flow </option>
                                    <option value="eri_inlet_ft207" {{ serInd('eri_inlet_ft207', $param->qdata1) }}>ERI
                                        INLET Flow </option>
                                    <option value="conc_flow_cal" {{ serInd('conc_flow_cal', $param->qdata1) }}>
                                        Concentrate Flow </option>
                                    <option value="overflush" {{ serInd('overflush', $param->qdata1) }}>Overflush %
                                    </option>
                                    <option value="eri_hp_out_cond_at306"
                                        {{ serInd('eri_hp_out_cond_at306', $param->qdata1) }}>ERI HP OUT COND </option>
                                    <option value="eri_hp_in_con_at206"
                                        {{ serInd('eri_hp_in_con_at206', $param->qdata1) }}>ERI HP IN COND </option>
                                    <option value="mixing_eri_calc" {{ serInd('mixing_eri_calc', $param->qdata1) }}>
                                        Mixing % (ERI calc to be added) &nbsp;&nbsp;</option>
                                    <option value="feed_cond_at211" {{ serInd('feed_cond_at211', $param->qdata1) }}>Feed
                                        Conductivity </option>
                                    <option value="front_tds_calc" {{ serInd('front_tds_calc', $param->qdata1) }}>
                                        Calculated Front Perm TDS </option>
                                    <option value="rear_tds_calc" {{ serInd('rear_tds_calc', $param->qdata1) }}>
                                        Calculated Rear Perm TDS </option>
                                    <option value="rear_cond_at301" {{ serInd('rear_cond_at301', $param->qdata1) }}>Rear
                                        Permeate Conductivity &nbsp;&nbsp;</option>
                                    <option value="front_cond_at303" {{ serInd('front_cond_at303', $param->qdata1) }}>
                                        Front Permeate Conductivity &nbsp;&nbsp;</option>
                                    <option value="cond_average" {{ serInd('cond_average', $param->qdata1) }}>
                                        Conductivity average </option>
                                    <option value="tds_average" {{ serInd('tds_average', $param->qdata1) }}>TDS average
                                    </option>
                                    <option value="temp_calc" {{ serInd('temp_calc', $param->qdata1) }}>Calculated
                                        Temperature (C) </option>
                                    <option value="feed_temp" {{ serInd('feed_temp', $param->qdata1) }}>Feed Temperature
                                        (F) </option>
                                    <option value="feed_temp_tit212" {{ serInd('feed_temp_tit212', $param->qdata1) }}>
                                        Feed Temperature (C) &nbsp;&nbsp;</option>
                                    <option value="days_operation" {{ serInd('days_operation', $param->qdata1) }}>Days
                                        of Operation &nbsp;&nbsp;</option>
                                    <option value="temp_correc_fac" {{ serInd('temp_correc_fac', $param->qdata1) }}>
                                        Temperature Correction Factor &nbsp;&nbsp;</option>
                                    <option value="calc_feed_brine_avg"
                                        {{ serInd('calc_feed_brine_avg', $param->qdata1) }}>Calculated Feed-Brine Avg
                                        Conc &nbsp;&nbsp;</option>
                                    <option value="feed_brine_ro_press"
                                        {{ serInd('feed_brine_ro_press', $param->qdata1) }}>Feed-Brine Osmotic Pressure
                                        &nbsp;&nbsp;</option>
                                    <option value="per_ro_pres" {{ serInd('per_ro_pres', $param->qdata1) }}>Permeate
                                        Osmotic Pressure &nbsp;&nbsp;</option>
                                    <option value="net_driving_press" {{ serInd('net_driving_press', $param->qdata1) }}>
                                        Net Driving Pressure &nbsp;&nbsp;</option>
                                </select>
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
                                                    <option value="spline" {{ serInd('spline', $param->charttype1) }}>
                                                        Line</option>
                                                    <option value="areaspline"
                                                        {{ serInd('areaspline', $param->charttype1) }}>Area </option>
                                                    <option value="column" {{ serInd('column', $param->charttype1) }}>
                                                        Column </option>
                                                    <option value="scatter"
                                                        {{ serInd('scatter', $param->charttype1) }}>Scatter </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="line_width1" class="col-sm-4 col-form-label">Line
                                                Width</label>
                                            <div class="col-sm-4">
                                                <input type="number" id="line_width1"
                                                    class="chart_render rednder form-control"
                                                    value="{{ $param->lineWidth1 }}" min="0" max="4"
                                                    step="0.1">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="marker1" class="col-sm-4 col-form-label">Marker
                                                Weight</label>
                                            <div class="col-sm-4">
                                                <input type="number" id="marker1"
                                                    class="chart_render form-control" value="{{ $param->markerWg1 }}"
                                                    min="0" step="1" max="4">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="marker_shape1" class="col-sm-4 col-form-label">Marker
                                                Shape</label>
                                            <div class="col-sm-4">
                                                <select id="marker_shape1"
                                                    class="chart_render form-control form-select">
                                                    <option value="circle" {{ serInd('circle', $param->markerSp1) }}>
                                                        Circle </option>
                                                    <option value="square" {{ serInd('square', $param->markerSp1) }}>
                                                        Square </option>
                                                    <option value="triangle"
                                                        {{ serInd('triangle', $param->markerSp1) }}>Trianlge </option>
                                                    <option value="diamond" {{ serInd('diamond', $param->markerSp1) }}>
                                                        Diamond </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="input-group">

                                                <input type="checkbox" class="chart_render form-check-input col-auto"
                                                    id="dt_label1" <?php if ($param->dataLb1 == 'true') {
                                                        echo 'checked';
                                                    } ?>>
                                                <label for="dt_label1" class="form-check-label col-auto">&nbsp; Show
                                                    Data Labels</label>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="input-group">
                                                <input type="checkbox" class="chart_render form-check-input col-auto"
                                                    id="y_axis1" <?php if ($param->yaxis1 == 'true') {
                                                        echo 'checked';
                                                    } ?>>
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
                            bar</span> </td>


                </tr>
                <tr class="tr2 table-light">
                    <td>
                        <div class="input-group">
                            <div class="col-auto"><input type="checkbox" class="query series-chk filter"
                                    id="line2" <?php if ($param->isline2 == 'true') {
                                        echo 'checked';
                                    } ?>>
                                &nbsp;2 &nbsp;<input type="color" id="pen2" name="pen2"
                                    value="{{ userPref($param->pen2) }}" class="chart_render series-color"> &nbsp;
                            </div>
                            <div class="col-auto input-group-sm">
                                <select class="query form-control form-select" id="ufdata2">
                                    <option value="dpi_906" {{ serInd('dpi_906', $param->qdata2) }}
                                        style="background-color:rgba(255,121,121,0.4);">DP (Head Loss) &nbsp;&nbsp;
                                    </option>
                                    <option value="norm_perm_flow" {{ serInd('norm_perm_flow', $param->qdata2) }}>
                                        Normalized Permeate Flow &nbsp;&nbsp;</option>
                                    <option value="norm_per_salt_rej"
                                        {{ serInd('norm_per_salt_rej', $param->qdata2) }}>Salt Rejection </option>
                                    <option value="norm_per_salt_pas"
                                        {{ serInd('norm_per_salt_pas', $param->qdata2) }}>Salt Passage </option>
                                    <option value="feed_pres_pt108" {{ serInd('feed_pres_pt108', $param->qdata2) }}>
                                        Feed Pressure </option>
                                    <option value="conc_pres_pt307" {{ serInd('conc_pres_pt307', $param->qdata2) }}>
                                        Concentrate Pressure </option>
                                    <option value="per_pres_pt312" {{ serInd('per_pres_pt312', $param->qdata2) }}>
                                        Permeate Pressure </option>
                                    <option value="recovery" {{ serInd('recovery', $param->qdata2) }}
                                        style="background-color:rgba(34,166,179,0.4);">Recovery (%) </option>
                                    <option value="rear_permeate_ft905"
                                        {{ serInd('rear_permeate_ft905', $param->qdata2) }}>Rear Permeate Flow </option>
                                    <option value="front_permeate_ft_305"
                                        {{ serInd('front_permeate_ft_305', $param->qdata2) }}>Front Permeate Flow
                                    </option>
                                    <option value="full_flushing" {{ serInd('full_flushing', $param->qdata2) }}>Full
                                        Flushing </option>
                                    <option value="membrane_flushing"
                                        {{ serInd('membrane_flushing', $param->qdata2) }}>Membrane Flushing Only
                                    </option>
                                    <option value="dbna_flushing" {{ serInd('dbna_flushing', $param->qdata2) }}>DBNPA
                                        Membrane Flushing &nbsp;&nbsp;</option>
                                    <option value="cip" {{ serInd('cip', $param->qdata2) }}
                                        style="background-color:rgba(190,46,221,0.4);">CIP</option>
                                    <option value="feed_flow" {{ serInd('feed_flow', $param->qdata2) }}>Feed Flow
                                    </option>
                                    <option value="hp_pump_ft101" {{ serInd('hp_pump_ft101', $param->qdata2) }}>HP Pump
                                        Flow </option>
                                    <option value="eri_out_ft203" {{ serInd('eri_out_ft203', $param->qdata2) }}>ERI OUT
                                        Flow </option>
                                    <option value="eri_inlet_ft207" {{ serInd('eri_inlet_ft207', $param->qdata2) }}>ERI
                                        INLET Flow </option>
                                    <option value="conc_flow_cal" {{ serInd('conc_flow_cal', $param->qdata2) }}>
                                        Concentrate Flow </option>
                                    <option value="overflush" {{ serInd('overflush', $param->qdata2) }}>Overflush %
                                    </option>
                                    <option value="eri_hp_out_cond_at306"
                                        {{ serInd('eri_hp_out_cond_at306', $param->qdata2) }}>ERI HP OUT COND </option>
                                    <option value="eri_hp_in_con_at206"
                                        {{ serInd('eri_hp_in_con_at206', $param->qdata2) }}>ERI HP IN COND </option>
                                    <option value="mixing_eri_calc" {{ serInd('mixing_eri_calc', $param->qdata2) }}>
                                        Mixing % (ERI calc to be added) &nbsp;&nbsp;</option>
                                    <option value="feed_cond_at211" {{ serInd('feed_cond_at211', $param->qdata2) }}>
                                        Feed Conductivity </option>
                                    <option value="front_tds_calc" {{ serInd('front_tds_calc', $param->qdata2) }}>
                                        Calculated Front Perm TDS </option>
                                    <option value="rear_tds_calc" {{ serInd('rear_tds_calc', $param->qdata2) }}>
                                        Calculated Rear Perm TDS </option>
                                    <option value="rear_cond_at301" {{ serInd('rear_cond_at301', $param->qdata2) }}>
                                        Rear Permeate Conductivity &nbsp;&nbsp;</option>
                                    <option value="front_cond_at303" {{ serInd('front_cond_at303', $param->qdata2) }}>
                                        Front Permeate Conductivity &nbsp;&nbsp;</option>
                                    <option value="cond_average" {{ serInd('cond_average', $param->qdata2) }}>
                                        Conductivity average </option>
                                    <option value="tds_average" {{ serInd('tds_average', $param->qdata2) }}>TDS average
                                    </option>
                                    <option value="temp_calc" {{ serInd('temp_calc', $param->qdata2) }}>Calculated
                                        Temperature (C) </option>
                                    <option value="feed_temp" {{ serInd('feed_temp', $param->qdata2) }}>Feed
                                        Temperature (F) </option>
                                    <option value="feed_temp_tit212" {{ serInd('feed_temp_tit212', $param->qdata2) }}>
                                        Feed Temperature (C) &nbsp;&nbsp;</option>
                                    <option value="days_operation" {{ serInd('days_operation', $param->qdata2) }}>Days
                                        of Operation &nbsp;&nbsp;</option>
                                    <option value="temp_correc_fac" {{ serInd('temp_correc_fac', $param->qdata2) }}>
                                        Temperature Correction Factor &nbsp;&nbsp;</option>
                                    <option value="calc_feed_brine_avg"
                                        {{ serInd('calc_feed_brine_avg', $param->qdata2) }}>Calculated Feed-Brine Avg
                                        Conc &nbsp;&nbsp;</option>
                                    <option value="feed_brine_ro_press"
                                        {{ serInd('feed_brine_ro_press', $param->qdata2) }}>Feed-Brine Osmotic Pressure
                                        &nbsp;&nbsp;</option>
                                    <option value="per_ro_pres" {{ serInd('per_ro_pres', $param->qdata2) }}>Permeate
                                        Osmotic Pressure &nbsp;&nbsp;</option>
                                    <option value="net_driving_press"
                                        {{ serInd('net_driving_press', $param->qdata2) }}>Net Driving Pressure
                                        &nbsp;&nbsp;</option>
                                </select>
                            </div>

                        </div>
                    </td>
                    <td style="text-align: center;">

                        <!-- Button trigger modal series 2-->
                        <span id="panel2">
                            <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal"
                                data-bs-target="#modal-series2">
                                ⚙️</span> </span>

                        <!-- Modal series 2-->
                        <div class="modal fade" id="modal-series2" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header modelheader2" style="background-color: rgb(9, 245, 5);">
                                        <h5 class="modal-title" id="seriestitle2">Series 2: Salt Rejection </h5>
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
                                                    <option value="spline" {{ serInd('spline', $param->charttype2) }}>
                                                        Line</option>
                                                    <option value="areaspline"
                                                        {{ serInd('areaspline', $param->charttype2) }}>Area </option>
                                                    <option value="column" {{ serInd('column', $param->charttype2) }}>
                                                        Column </option>
                                                    <option value="scatter"
                                                        {{ serInd('scatter', $param->charttype2) }}>Scatter </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="line_width1" class="col-sm-4 col-form-label">Line
                                                Width</label>
                                            <div class="col-sm-4">
                                                <input type="number" id="line_width2"
                                                    class="chart_render form-control"
                                                    value="{{ $param->lineWidth2 }}" min="0" max="4"
                                                    step="0.1">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="marker2" class="col-sm-4 col-form-label">Marker
                                                Weight</label>
                                            <div class="col-sm-4">
                                                <input type="number" id="marker2"
                                                    class="chart_render form-control"
                                                    value="{{ $param->markerWg2 }}" min="0" step="0.1"
                                                    max="4">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="marker_shape2" class="col-sm-4 col-form-label">Marker
                                                Shape</label>
                                            <div class="col-sm-4">
                                                <select id="marker_shape2"
                                                    class="chart_render form-control form-select">
                                                    <option value="circle" {{ serInd('circle', $param->markerSp2) }}>
                                                        Circle </option>
                                                    <option value="square" {{ serInd('square', $param->markerSp2) }}>
                                                        Square </option>
                                                    <option value="triangle"
                                                        {{ serInd('triangle', $param->markerSp2) }}>Trianlge </option>
                                                    <option value="diamond"
                                                        {{ serInd('diamond', $param->markerSp2) }}>Diamond </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="input-group">

                                                <input type="checkbox" class="chart_render form-check-input col-auto"
                                                    id="dt_label2" <?php if ($param->dataLb2 == 'true') {
                                                        echo 'checked';
                                                    } ?>>
                                                <label for="dt_label2" class="form-check-label col-auto">&nbsp; Show
                                                    Data Labels</label>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="input-group">
                                                <input type="checkbox" class="chart_render form-check-input col-auto"
                                                    id="y_axis2" <?php if ($param->yaxis2 == 'true') {
                                                        echo 'checked';
                                                    } ?>>
                                                <label for="y_axis2" class="form-check-label col-auto">&nbsp; Show
                                                    Y-axis</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm secondary apply_changes">Apply
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
                            id="data_length2">414</span></td>
                    <td style="text-align: center; background-color: black; color:#f21170; "> <span
                            id="data_max2">99.6</span> </td>
                    <td style="text-align: center; background-color: black; color:#00ead3; "> <span
                            id="data_min2">96.3</span> </td>
                    <td style="text-align: center; background-color: black; color:#fff600; "> <span
                            id="data_avg2">98.3</span> </td>
                    <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit2">
                            %</span> </td>

                </tr>
                <tr class="tr3 table-light">
                    <td>
                        <div class="input-group">
                            <div class="col-auto"><input type="checkbox" class="query series-chk filter"
                                    id="line3" <?php if ($param->isline3 == 'true') {
                                        echo 'checked';
                                    } ?>>
                                &nbsp;3 &nbsp;<input type="color" id="pen3" name="pen3"
                                    value="{{ $param->pen3 }}" class="chart_render series-color"> &nbsp; </div>
                            <div class="col-auto input-group-sm">
                                <select class="query form-control form-select" id="ufdata3">
                                    <option value="dpi_906" {{ serInd('dpi_906', $param->qdata3) }}
                                        style="background-color:rgba(255,121,121,0.4);">DP (Head Loss) &nbsp;&nbsp;
                                    </option>
                                    <option value="norm_perm_flow" {{ serInd('norm_perm_flow', $param->qdata3) }}>
                                        Normalized Permeate Flow &nbsp;&nbsp;</option>
                                    <option value="norm_per_salt_rej"
                                        {{ serInd('norm_per_salt_rej', $param->qdata3) }}>Salt Rejection </option>
                                    <option value="norm_per_salt_pas"
                                        {{ serInd('norm_per_salt_pas', $param->qdata3) }}>Salt Passage </option>
                                    <option value="feed_pres_pt108" {{ serInd('feed_pres_pt108', $param->qdata3) }}>
                                        Feed Pressure </option>
                                    <option value="conc_pres_pt307" {{ serInd('conc_pres_pt307', $param->qdata3) }}>
                                        Concentrate Pressure </option>
                                    <option value="per_pres_pt312" {{ serInd('per_pres_pt312', $param->qdata3) }}>
                                        Permeate Pressure </option>
                                    <option value="recovery" {{ serInd('recovery', $param->qdata3) }}
                                        style="background-color:rgba(34,166,179,0.4);">Recovery (%) </option>
                                    <option value="rear_permeate_ft905"
                                        {{ serInd('rear_permeate_ft905', $param->qdata3) }}>Rear Permeate Flow
                                    </option>
                                    <option value="front_permeate_ft_305"
                                        {{ serInd('front_permeate_ft_305', $param->qdata3) }}>Front Permeate Flow
                                    </option>
                                    <option value="full_flushing" {{ serInd('full_flushing', $param->qdata3) }}>Full
                                        Flushing </option>
                                    <option value="membrane_flushing"
                                        {{ serInd('membrane_flushing', $param->qdata3) }}>Membrane Flushing Only
                                    </option>
                                    <option value="dbna_flushing" {{ serInd('dbna_flushing', $param->qdata3) }}>DBNPA
                                        Membrane Flushing &nbsp;&nbsp;</option>
                                    <option value="cip" {{ serInd('cip', $param->qdata3) }}
                                        style="background-color:rgba(190,46,221,0.4);">CIP</option>
                                    <option value="feed_flow" {{ serInd('feed_flow', $param->qdata3) }}>Feed Flow
                                    </option>
                                    <option value="hp_pump_ft101" {{ serInd('hp_pump_ft101', $param->qdata3) }}>HP
                                        Pump Flow </option>
                                    <option value="eri_out_ft203" {{ serInd('eri_out_ft203', $param->qdata3) }}>ERI
                                        OUT Flow </option>
                                    <option value="eri_inlet_ft207" {{ serInd('eri_inlet_ft207', $param->qdata3) }}>
                                        ERI INLET Flow </option>
                                    <option value="conc_flow_cal" {{ serInd('conc_flow_cal', $param->qdata3) }}>
                                        Concentrate Flow </option>
                                    <option value="overflush" {{ serInd('overflush', $param->qdata3) }}>Overflush %
                                    </option>
                                    <option value="eri_hp_out_cond_at306"
                                        {{ serInd('eri_hp_out_cond_at306', $param->qdata3) }}>ERI HP OUT COND </option>
                                    <option value="eri_hp_in_con_at206"
                                        {{ serInd('eri_hp_in_con_at206', $param->qdata3) }}>ERI HP IN COND </option>
                                    <option value="mixing_eri_calc" {{ serInd('mixing_eri_calc', $param->qdata3) }}>
                                        Mixing % (ERI calc to be added) &nbsp;&nbsp;</option>
                                    <option value="feed_cond_at211" {{ serInd('feed_cond_at211', $param->qdata3) }}>
                                        Feed Conductivity </option>
                                    <option value="front_tds_calc" {{ serInd('front_tds_calc', $param->qdata3) }}>
                                        Calculated Front Perm TDS </option>
                                    <option value="rear_tds_calc" {{ serInd('rear_tds_calc', $param->qdata3) }}>
                                        Calculated Rear Perm TDS </option>
                                    <option value="rear_cond_at301" {{ serInd('rear_cond_at301', $param->qdata3) }}>
                                        Rear Permeate Conductivity &nbsp;&nbsp;</option>
                                    <option value="front_cond_at303" {{ serInd('front_cond_at303', $param->qdata3) }}>
                                        Front Permeate Conductivity &nbsp;&nbsp;</option>
                                    <option value="cond_average" {{ serInd('cond_average', $param->qdata3) }}>
                                        Conductivity average </option>
                                    <option value="tds_average" {{ serInd('tds_average', $param->qdata3) }}>TDS
                                        average </option>
                                    <option value="temp_calc" {{ serInd('temp_calc', $param->qdata3) }}>Calculated
                                        Temperature (C) </option>
                                    <option value="feed_temp" {{ serInd('feed_temp', $param->qdata3) }}>Feed
                                        Temperature (F) </option>
                                    <option value="feed_temp_tit212" {{ serInd('feed_temp_tit212', $param->qdata3) }}>
                                        Feed Temperature (C) &nbsp;&nbsp;</option>
                                    <option value="days_operation" {{ serInd('days_operation', $param->qdata3) }}>Days
                                        of Operation &nbsp;&nbsp;</option>
                                    <option value="temp_correc_fac" {{ serInd('temp_correc_fac', $param->qdata3) }}>
                                        Temperature Correction Factor &nbsp;&nbsp;</option>
                                    <option value="calc_feed_brine_avg"
                                        {{ serInd('calc_feed_brine_avg', $param->qdata3) }}>Calculated Feed-Brine Avg
                                        Conc &nbsp;&nbsp;</option>
                                    <option value="feed_brine_ro_press"
                                        {{ serInd('feed_brine_ro_press', $param->qdata3) }}>Feed-Brine Osmotic Pressure
                                        &nbsp;&nbsp;</option>
                                    <option value="per_ro_pres" {{ serInd('per_ro_pres', $param->qdata3) }}>Permeate
                                        Osmotic Pressure &nbsp;&nbsp;</option>
                                    <option value="net_driving_press"
                                        {{ serInd('net_driving_press', $param->qdata3) }}>Net Driving Pressure
                                        &nbsp;&nbsp;</option>
                                </select>
                            </div>
                        </div>
                    </td>
                    <td style="text-align: center;">

                        <!-- Button trigger modal series 3-->
                        <span id="panel3">
                            <span type="" class="badge badge-light3d" data-bs-toggle="modal"
                                data-bs-target="#modal-series3">
                                ⚙️</span> </span>



                        <!-- Modal series 3-->
                        <div class="modal fade" id="modal-series3" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header modelheader3"
                                        style="background-color: rgb(215, 7, 242);">
                                        <h5 class="modal-title" id="seriestitle3">Series 3: DBNPA Membrane Flushing
                                            &nbsp;&nbsp;</h5>
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
                                                    <option value="spline" {{ serInd('spline', $param->charttype3) }}>
                                                        Line</option>
                                                    <option value="areaspline"
                                                        {{ serInd('areaspline', $param->charttype3) }}>Area </option>
                                                    <option value="column" {{ serInd('column', $param->charttype3) }}>
                                                        Column </option>
                                                    <option value="scatter"
                                                        {{ serInd('scatter', $param->charttype3) }}>Scatter </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="line_width3" class="chart_render col-sm-4 col-form-label">Line
                                                Width</label>
                                            <div class="col-sm-4">
                                                <input type="number" id="line_width3" class="rednder form-control"
                                                    value="{{ $param->lineWidth3 }}" min="0" max="4"
                                                    step="0.1">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="marker3" class="col-sm-4 col-form-label">Marker
                                                Weight</label>
                                            <div class="col-sm-4">
                                                <input type="number" id="marker3"
                                                    class="chart_render form-control"
                                                    value="{{ $param->markerWg3 }}" min="0" step="0.1"
                                                    max="4">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="marker_shape3"
                                                class="chart_render col-sm-4 col-form-label">Marker Shape</label>
                                            <div class="col-sm-4">
                                                <select id="marker_shape3"
                                                    class="chart_render form-control form-select">
                                                    <option value="circle" {{ serInd('circle', $param->markerSp3) }}>
                                                        Circle </option>
                                                    <option value="square" {{ serInd('square', $param->markerSp3) }}>
                                                        Square </option>
                                                    <option value="triangle"
                                                        {{ serInd('triangle', $param->markerSp3) }}>Trianlge </option>
                                                    <option value="diamond"
                                                        {{ serInd('diamond', $param->markerSp3) }}>Diamond </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="input-group">

                                                <input type="checkbox" class="chart_render form-check-input col-auto"
                                                    id="dt_label3" <?php if ($param->dataLb3 == 'true') {
                                                        echo 'checked';
                                                    } ?>>
                                                <label for="dt_label3" class="form-check-label col-auto">&nbsp; Show
                                                    Data Labels</label>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="input-group">
                                                <input type="checkbox" class="chart_render form-check-input col-auto"
                                                    id="y_axis3" <?php if ($param->yaxis3 == 'true') {
                                                        echo 'checked';
                                                    } ?>>
                                                <label for="y_axis3" class="form-check-label col-auto">&nbsp; Show
                                                    Y-axis</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"
                                                class="btn btn-sm btn-secondary apply_changes">Apply Changes</button>
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
                            id="data_length3">8</span></td>
                    <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max3">
                        </span> </td>
                    <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min3">
                        </span> </td>
                    <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg3">
                        </span> </td>
                    <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit3">
                        </span> </td>

                </tr>
                <tr class="tr4 table-secondary">
                    <td>
                        <div class="input-group">
                            <div class="col-auto"><input type="checkbox" class="query series-chk filter"
                                    id="line4" <?php if ($param->isline4 == 'true') {
                                        echo 'checked';
                                    } ?>>
                                &nbsp;4 &nbsp;<input type="color" id="pen4" name="pen4"
                                    value="{{ $param->pen4 }}" class="chart_render series-color"
                                    style="display: none;"> &nbsp; </div>
                            <div class="col-auto input-group-sm">
                                <select class="query form-control form-select" id="ufdata4" style="display: none;">
                                    <option value="dpi_906" {{ serInd('dpi_906', $param->qdata4) }}
                                        style="background-color:rgba(255,121,121,0.4);">DP (Head Loss) &nbsp;&nbsp;
                                    </option>
                                    <option value="norm_perm_flow" {{ serInd('norm_perm_flow', $param->qdata4) }}>
                                        Normalized Permeate Flow &nbsp;&nbsp;</option>
                                    <option value="norm_per_salt_rej"
                                        {{ serInd('norm_per_salt_rej', $param->qdata4) }}>Salt Rejection </option>
                                    <option value="norm_per_salt_pas"
                                        {{ serInd('norm_per_salt_pas', $param->qdata4) }}>Salt Passage </option>
                                    <option value="feed_pres_pt108" {{ serInd('feed_pres_pt108', $param->qdata4) }}>
                                        Feed Pressure </option>
                                    <option value="conc_pres_pt307" {{ serInd('conc_pres_pt307', $param->qdata4) }}>
                                        Concentrate Pressure </option>
                                    <option value="per_pres_pt312" {{ serInd('per_pres_pt312', $param->qdata4) }}>
                                        Permeate Pressure </option>
                                    <option value="recovery" {{ serInd('recovery', $param->qdata4) }}
                                        style="background-color:rgba(34,166,179,0.4);">Recovery (%) </option>
                                    <option value="rear_permeate_ft905"
                                        {{ serInd('rear_permeate_ft905', $param->qdata4) }}>Rear Permeate Flow
                                    </option>
                                    <option value="front_permeate_ft_305"
                                        {{ serInd('front_permeate_ft_305', $param->qdata4) }}>Front Permeate Flow
                                    </option>
                                    <option value="full_flushing" {{ serInd('full_flushing', $param->qdata4) }}>Full
                                        Flushing </option>
                                    <option value="membrane_flushing"
                                        {{ serInd('membrane_flushing', $param->qdata4) }}>Membrane Flushing Only
                                    </option>
                                    <option value="dbna_flushing" {{ serInd('dbna_flushing', $param->qdata4) }}>DBNPA
                                        Membrane Flushing &nbsp;&nbsp;</option>
                                    <option value="cip" {{ serInd('cip', $param->qdata4) }}
                                        style="background-color:rgba(190,46,221,0.4);">CIP</option>
                                    <option value="feed_flow" {{ serInd('feed_flow', $param->qdata4) }}>Feed Flow
                                    </option>
                                    <option value="hp_pump_ft101" {{ serInd('hp_pump_ft101', $param->qdata4) }}>HP
                                        Pump Flow </option>
                                    <option value="eri_out_ft203" {{ serInd('eri_out_ft203', $param->qdata4) }}>ERI
                                        OUT Flow </option>
                                    <option value="eri_inlet_ft207" {{ serInd('eri_inlet_ft207', $param->qdata4) }}>
                                        ERI INLET Flow </option>
                                    <option value="conc_flow_cal" {{ serInd('conc_flow_cal', $param->qdata4) }}>
                                        Concentrate Flow </option>
                                    <option value="overflush" {{ serInd('overflush', $param->qdata4) }}>Overflush %
                                    </option>
                                    <option value="eri_hp_out_cond_at306"
                                        {{ serInd('eri_hp_out_cond_at306', $param->qdata4) }}>ERI HP OUT COND </option>
                                    <option value="eri_hp_in_con_at206"
                                        {{ serInd('eri_hp_in_con_at206', $param->qdata4) }}>ERI HP IN COND </option>
                                    <option value="mixing_eri_calc" {{ serInd('mixing_eri_calc', $param->qdata4) }}>
                                        Mixing % (ERI calc to be added) &nbsp;&nbsp;</option>
                                    <option value="feed_cond_at211" {{ serInd('feed_cond_at211', $param->qdata4) }}>
                                        Feed Conductivity </option>
                                    <option value="front_tds_calc" {{ serInd('front_tds_calc', $param->qdata4) }}>
                                        Calculated Front Perm TDS </option>
                                    <option value="rear_tds_calc" {{ serInd('rear_tds_calc', $param->qdata4) }}>
                                        Calculated Rear Perm TDS </option>
                                    <option value="rear_cond_at301" {{ serInd('rear_cond_at301', $param->qdata4) }}>
                                        Rear Permeate Conductivity &nbsp;&nbsp;</option>
                                    <option value="front_cond_at303" {{ serInd('front_cond_at303', $param->qdata4) }}>
                                        Front Permeate Conductivity &nbsp;&nbsp;</option>
                                    <option value="cond_average" {{ serInd('cond_average', $param->qdata4) }}>
                                        Conductivity average </option>
                                    <option value="tds_average" {{ serInd('tds_average', $param->qdata4) }}>TDS
                                        average </option>
                                    <option value="temp_calc" {{ serInd('temp_calc', $param->qdata4) }}>Calculated
                                        Temperature (C) </option>
                                    <option value="feed_temp" {{ serInd('feed_temp', $param->qdata4) }}>Feed
                                        Temperature (F) </option>
                                    <option value="feed_temp_tit212" {{ serInd('feed_temp_tit212', $param->qdata4) }}>
                                        Feed Temperature (C) &nbsp;&nbsp;</option>
                                    <option value="days_operation" {{ serInd('days_operation', $param->qdata4) }}>Days
                                        of Operation &nbsp;&nbsp;</option>
                                    <option value="temp_correc_fac" {{ serInd('temp_correc_fac', $param->qdata4) }}>
                                        Temperature Correction Factor &nbsp;&nbsp;</option>
                                    <option value="calc_feed_brine_avg"
                                        {{ serInd('calc_feed_brine_avg', $param->qdata4) }}>Calculated Feed-Brine Avg
                                        Conc &nbsp;&nbsp;</option>
                                    <option value="feed_brine_ro_press"
                                        {{ serInd('feed_brine_ro_press', $param->qdata4) }}>Feed-Brine Osmotic Pressure
                                        &nbsp;&nbsp;</option>
                                    <option value="per_ro_pres" {{ serInd('per_ro_pres', $param->qdata4) }}>Permeate
                                        Osmotic Pressure &nbsp;&nbsp;</option>
                                    <option value="net_driving_press"
                                        {{ serInd('net_driving_press', $param->qdata4) }}>Net Driving Pressure
                                        &nbsp;&nbsp;</option>
                                </select>
                            </div>
                        </div>
                    </td>
                    <td style="text-align: center;">

                        <!-- Button trigger modal series 4-->
                        <span id="panel4" style="display: none;">
                            <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal"
                                data-bs-target="#modal-series4">
                                ⚙️</span> </span>
                        <!-- Modal series 4-->
                        <div class="modal fade" id="modal-series4" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header modelheader4"
                                        style="background-color: rgb(14, 173, 225);">
                                        <h5 class="modal-title" id="seriestitle4">Series 4: Overflush % </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">


                                        <div class="row mb-2">
                                            <label for="chart_type4" class="col-sm-4 col-form-label">Chart
                                                Type</label>
                                            <div class="col-sm-4">
                                                <select class="chart_render form-control form-select"
                                                    id="chart_type4">
                                                    <option value="spline" {{ serInd('spline', $param->charttype4) }}>
                                                        Line</option>
                                                    <option value="areaspline"
                                                        {{ serInd('areaspline', $param->charttype4) }}>Area </option>
                                                    <option value="column" {{ serInd('column', $param->charttype4) }}>
                                                        Column </option>
                                                    <option value="scatter"
                                                        {{ serInd('scatter', $param->charttype4) }}>Scatter </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="line_width4" class="col-sm-4 col-form-label">Line
                                                Width</label>
                                            <div class="col-sm-4">
                                                <input type="number" id="line_width4"
                                                    class="chart_render form-control"
                                                    value="{{ $param->lineWidth4 }}" min="0" max="4"
                                                    step="0.1">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="marker4" class="col-sm-4 col-form-label">Marker
                                                Weight</label>
                                            <div class="col-sm-4">
                                                <input type="number" id="marker4"
                                                    class="chart_render form-control"
                                                    value="{{ $param->markerWg4 }}" min="0" step="0.1"
                                                    max="4">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="marker_shape4" class="col-sm-4 col-form-label">Marker
                                                Shape</label>
                                            <div class="col-sm-4">
                                                <select id="marker_shape4"
                                                    class="chart_render form-control form-select">
                                                    <option value="circle" {{ serInd('circle', $param->markerSp4) }}>
                                                        Circle </option>
                                                    <option value="square" {{ serInd('square', $param->markerSp4) }}>
                                                        Square </option>
                                                    <option value="triangle"
                                                        {{ serInd('triangle', $param->markerSp4) }}>Trianlge </option>
                                                    <option value="diamond"
                                                        {{ serInd('diamond', $param->markerSp4) }}>Diamond </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="input-group">

                                                <input type="checkbox" class="chart_render form-check-input col-auto"
                                                    id="dt_label4" <?php if ($param->dataLb4 == 'true') {
                                                        echo 'checked';
                                                    } ?>>
                                                <label for="dt_label4" class="form-check-label col-auto">&nbsp; Show
                                                    Data Labels</label>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="input-group">
                                                <input type="checkbox" class="chart_render form-check-input col-auto"
                                                    id="y_axis4" <?php if ($param->yaxis4 == 'true') {
                                                        echo 'checked';
                                                    } ?>>
                                                <label for="y_axis4" class="form-check-label col-auto">&nbsp; Show
                                                    Y-axis</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"
                                                class="btn btn-sm btn-secondary apply_changes">Apply Changes</button>
                                            <button type="button" class="btn btn-sm btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal end here   -->

                        </div>
                    </td>


                    <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length4"
                            style="display: none;"></span></td>
                    <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max4"
                            style="display: none;"></span> </td>
                    <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min4"
                            style="display: none;"></span> </td>
                    <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg4"
                            style="display: none;"></span> </td>
                    <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit4">
                        </span> </td>

                </tr>
                <tr class="tr5 table-secondary">
                    <td>
                        <div class="input-group">
                            <div class="col-auto"><input type="checkbox" class="query series-chk filter"
                                    id="line5" <?php if ($param->isline5 == 'true') {
                                        echo 'checked';
                                    } ?>>
                                &nbsp;5 &nbsp;<input type="color" id="pen5" name="pen5"
                                    value="{{ $param->pen5 }}" class="chart_render series-color"
                                    style="display: none;"> &nbsp; </div>
                            <div class="col-auto input-group-sm">
                                <select class="query form-control form-select" id="ufdata5" style="display: none;">
                                    <option value="dpi_906" {{ serInd('dpi_906', $param->qdata5) }}
                                        style="background-color:rgba(255,121,121,0.4);">DP (Head Loss) &nbsp;&nbsp;
                                    </option>
                                    <option value="norm_perm_flow" {{ serInd('norm_perm_flow', $param->qdata5) }}>
                                        Normalized Permeate Flow &nbsp;&nbsp;</option>
                                    <option value="norm_per_salt_rej"
                                        {{ serInd('norm_per_salt_rej', $param->qdata5) }}>Salt Rejection </option>
                                    <option value="norm_per_salt_pas"
                                        {{ serInd('norm_per_salt_pas', $param->qdata5) }}>Salt Passage </option>
                                    <option value="feed_pres_pt108" {{ serInd('feed_pres_pt108', $param->qdata5) }}>
                                        Feed Pressure </option>
                                    <option value="conc_pres_pt307" {{ serInd('conc_pres_pt307', $param->qdata5) }}>
                                        Concentrate Pressure </option>
                                    <option value="per_pres_pt312" {{ serInd('per_pres_pt312', $param->qdata5) }}>
                                        Permeate Pressure </option>
                                    <option value="recovery" {{ serInd('recovery', $param->qdata5) }}
                                        style="background-color:rgba(34,166,179,0.4);">Recovery (%) </option>
                                    <option value="rear_permeate_ft905"
                                        {{ serInd('rear_permeate_ft905', $param->qdata5) }}>Rear Permeate Flow
                                    </option>
                                    <option value="front_permeate_ft_305"
                                        {{ serInd('front_permeate_ft_305', $param->qdata5) }}>Front Permeate Flow
                                    </option>
                                    <option value="full_flushing" {{ serInd('full_flushing', $param->qdata5) }}>Full
                                        Flushing </option>
                                    <option value="membrane_flushing"
                                        {{ serInd('membrane_flushing', $param->qdata5) }}>Membrane Flushing Only
                                    </option>
                                    <option value="dbna_flushing" {{ serInd('dbna_flushing', $param->qdata5) }}>DBNPA
                                        Membrane Flushing &nbsp;&nbsp;</option>
                                    <option value="cip" {{ serInd('cip', $param->qdata5) }}
                                        style="background-color:rgba(190,46,221,0.4);">CIP</option>
                                    <option value="feed_flow" {{ serInd('feed_flow', $param->qdata5) }}>Feed Flow
                                    </option>
                                    <option value="hp_pump_ft101" {{ serInd('hp_pump_ft101', $param->qdata5) }}>HP
                                        Pump Flow </option>
                                    <option value="eri_out_ft203" {{ serInd('eri_out_ft203', $param->qdata5) }}>ERI
                                        OUT Flow </option>
                                    <option value="eri_inlet_ft207" {{ serInd('eri_inlet_ft207', $param->qdata5) }}>
                                        ERI INLET Flow </option>
                                    <option value="conc_flow_cal" {{ serInd('conc_flow_cal', $param->qdata5) }}>
                                        Concentrate Flow </option>
                                    <option value="overflush" {{ serInd('overflush', $param->qdata5) }}>Overflush %
                                    </option>
                                    <option value="eri_hp_out_cond_at306"
                                        {{ serInd('eri_hp_out_cond_at306', $param->qdata5) }}>ERI HP OUT COND </option>
                                    <option value="eri_hp_in_con_at206"
                                        {{ serInd('eri_hp_in_con_at206', $param->qdata5) }}>ERI HP IN COND </option>
                                    <option value="mixing_eri_calc" {{ serInd('mixing_eri_calc', $param->qdata5) }}>
                                        Mixing % (ERI calc to be added) &nbsp;&nbsp;</option>
                                    <option value="feed_cond_at211" {{ serInd('feed_cond_at211', $param->qdata5) }}>
                                        Feed Conductivity </option>
                                    <option value="front_tds_calc" {{ serInd('front_tds_calc', $param->qdata5) }}>
                                        Calculated Front Perm TDS </option>
                                    <option value="rear_tds_calc" {{ serInd('rear_tds_calc', $param->qdata5) }}>
                                        Calculated Rear Perm TDS </option>
                                    <option value="rear_cond_at301" {{ serInd('rear_cond_at301', $param->qdata5) }}>
                                        Rear Permeate Conductivity &nbsp;&nbsp;</option>
                                    <option value="front_cond_at303" {{ serInd('front_cond_at303', $param->qdata5) }}>
                                        Front Permeate Conductivity &nbsp;&nbsp;</option>
                                    <option value="cond_average" {{ serInd('cond_average', $param->qdata5) }}>
                                        Conductivity average </option>
                                    <option value="tds_average" {{ serInd('tds_average', $param->qdata5) }}>TDS
                                        average </option>
                                    <option value="temp_calc" {{ serInd('temp_calc', $param->qdata5) }}>Calculated
                                        Temperature (C) </option>
                                    <option value="feed_temp" {{ serInd('feed_temp', $param->qdata5) }}>Feed
                                        Temperature (F) </option>
                                    <option value="feed_temp_tit212" {{ serInd('feed_temp_tit212', $param->qdata5) }}>
                                        Feed Temperature (C) &nbsp;&nbsp;</option>
                                    <option value="days_operation" {{ serInd('days_operation', $param->qdata5) }}>Days
                                        of Operation &nbsp;&nbsp;</option>
                                    <option value="temp_correc_fac" {{ serInd('temp_correc_fac', $param->qdata5) }}>
                                        Temperature Correction Factor &nbsp;&nbsp;</option>
                                    <option value="calc_feed_brine_avg"
                                        {{ serInd('calc_feed_brine_avg', $param->qdata5) }}>Calculated Feed-Brine Avg
                                        Conc &nbsp;&nbsp;</option>
                                    <option value="feed_brine_ro_press"
                                        {{ serInd('feed_brine_ro_press', $param->qdata5) }}>Feed-Brine Osmotic Pressure
                                        &nbsp;&nbsp;</option>
                                    <option value="per_ro_pres" {{ serInd('per_ro_pres', $param->qdata5) }}>Permeate
                                        Osmotic Pressure &nbsp;&nbsp;</option>
                                    <option value="net_driving_press"
                                        {{ serInd('net_driving_press', $param->qdata5) }}>Net Driving Pressure
                                        &nbsp;&nbsp;</option>
                                </select>
                            </div>
                        </div>
                    </td>
                    <td style="text-align: center;">

                        <!-- Button trigger modal series 5-->
                        <span id="panel5" style="display: none;">
                            <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal"
                                data-bs-target="#modal-series5">
                                ⚙️</span> </span>
                        <!-- Modal series 5-->
                        <div class="modal fade" id="modal-series5" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header modelheader5"
                                        style="background-color: rgb(33, 231, 19);">
                                        <h5 class="modal-title" id="seriestitle5">Series 5: CIP</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">


                                        <div class="row mb-2">
                                            <label for="chart_type5" class="col-sm-4 col-form-label">Chart
                                                Type</label>
                                            <div class="col-sm-4">
                                                <select class="chart_render form-control form-select"
                                                    id="chart_type5">
                                                    <option value="spline" {{ serInd('spline', $param->charttype5) }}>
                                                        Line</option>
                                                    <option value="areaspline"
                                                        {{ serInd('areaspline', $param->charttype5) }}>Area </option>
                                                    <option value="column" {{ serInd('column', $param->charttype5) }}>
                                                        Column </option>
                                                    <option value="scatter"
                                                        {{ serInd('scatter', $param->charttype5) }}>Scatter </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="line_width5" class="col-sm-4 col-form-label">Line
                                                Width</label>
                                            <div class="col-sm-4">
                                                <input type="number" id="line_width5"
                                                    class="chart_render form-control"
                                                    value="{{ $param->lineWidth5 }}" min="0" max="4"
                                                    step="0.1">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="marker5" class="col-sm-4 col-form-label">Marker
                                                Weight</label>
                                            <div class="col-sm-4">
                                                <input type="number" id="marker5"
                                                    class="chart_render form-control"
                                                    value="{{ $param->markerWg5 }}" min="0" step="0.1"
                                                    max="4">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="marker_shape5" class="col-sm-4 col-form-label">Marker
                                                Shape</label>
                                            <div class="col-sm-4">
                                                <select id="marker_shape5"
                                                    class="chart_render form-control form-select">
                                                    <option value="circle" {{ serInd('circle', $param->markerSp5) }}>
                                                        Circle </option>
                                                    <option value="square" {{ serInd('square', $param->markerSp5) }}>
                                                        Square </option>
                                                    <option value="triangle"
                                                        {{ serInd('triangle', $param->markerSp5) }}>Trianlge </option>
                                                    <option value="diamond"
                                                        {{ serInd('diamond', $param->markerSp5) }}>Diamond </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="input-group">

                                                <input type="checkbox" class="chart_render form-check-input col-auto"
                                                    id="dt_label5" <?php if ($param->dataLb5 == 'true') {
                                                        echo 'checked';
                                                    } ?>>
                                                <label for="dt_label5" class="form-check-label col-auto">&nbsp; Show
                                                    Data Labels</label>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="input-group">
                                                <input type="checkbox" class="chart_render form-check-input col-auto"
                                                    id="y_axis5" <?php if ($param->yaxis5 == 'true') {
                                                        echo 'checked';
                                                    } ?>>
                                                <label for="y_axis5" class="form-check-label col-auto">&nbsp; Show
                                                    Y-axis</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"
                                                class="btn btn-sm btn-secondary apply_changes">Apply Changes</button>
                                            <button type="button" class="btn btn-sm btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal end here   -->




                        </div>
                    </td>


                    <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length5"
                            style="display: none;"></span></td>
                    <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max5"
                            style="display: none;"></span> </td>
                    <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min5"
                            style="display: none;"></span> </td>
                    <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg5"
                            style="display: none;"></span> </td>
                    <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit5">
                        </span> </td>

                </tr>

                <tr class="tr6 table-secondary">
                    <td>
                        <div class="input-group">
                            <div class="col-auto"><input type="checkbox" class="query series-chk filter"
                                    id="line6" <?php if ($param->isline6 == 'true') {
                                        echo 'checked';
                                    } ?>>
                                &nbsp;6 &nbsp;<input type="color" id="pen6" name="pen6"
                                    value="{{ $param->pen6 }}" class="chart_render series-color"
                                    style="display: none;"> &nbsp; </div>
                            <div class="col-auto input-group-sm">
                                <select class="query form-control form-select" id="ufdata6" style="display: none;">
                                    <option value="dpi_906" {{ serInd('dpi_906', $param->qdata6) }}
                                        style="background-color:rgba(255,121,121,0.4);">DP (Head Loss) &nbsp;&nbsp;
                                    </option>
                                    <option value="norm_perm_flow" {{ serInd('norm_perm_flow', $param->qdata6) }}>
                                        Normalized Permeate Flow &nbsp;&nbsp;</option>
                                    <option value="norm_per_salt_rej"
                                        {{ serInd('norm_per_salt_rej', $param->qdata6) }}>Salt Rejection </option>
                                    <option value="norm_per_salt_pas"
                                        {{ serInd('norm_per_salt_pas', $param->qdata6) }}>Salt Passage </option>
                                    <option value="feed_pres_pt108" {{ serInd('feed_pres_pt108', $param->qdata6) }}>
                                        Feed Pressure </option>
                                    <option value="conc_pres_pt307" {{ serInd('conc_pres_pt307', $param->qdata6) }}>
                                        Concentrate Pressure </option>
                                    <option value="per_pres_pt312" {{ serInd('per_pres_pt312', $param->qdata6) }}>
                                        Permeate Pressure </option>
                                    <option value="recovery" {{ serInd('recovery', $param->qdata6) }}
                                        style="background-color:rgba(34,166,179,0.4);">Recovery (%) </option>
                                    <option value="rear_permeate_ft905"
                                        {{ serInd('rear_permeate_ft905', $param->qdata6) }}>Rear Permeate Flow
                                    </option>
                                    <option value="front_permeate_ft_305"
                                        {{ serInd('front_permeate_ft_305', $param->qdata6) }}>Front Permeate Flow
                                    </option>
                                    <option value="full_flushing" {{ serInd('full_flushing', $param->qdata6) }}>Full
                                        Flushing </option>
                                    <option value="membrane_flushing"
                                        {{ serInd('membrane_flushing', $param->qdata6) }}>Membrane Flushing Only
                                    </option>
                                    <option value="dbna_flushing" {{ serInd('dbna_flushing', $param->qdata6) }}>DBNPA
                                        Membrane Flushing &nbsp;&nbsp;</option>
                                    <option value="cip" {{ serInd('cip', $param->qdata6) }}
                                        style="background-color:rgba(190,46,221,0.4);">CIP</option>
                                    <option value="feed_flow" {{ serInd('feed_flow', $param->qdata6) }}>Feed Flow
                                    </option>
                                    <option value="hp_pump_ft101" {{ serInd('hp_pump_ft101', $param->qdata6) }}>HP
                                        Pump Flow </option>
                                    <option value="eri_out_ft203" {{ serInd('eri_out_ft203', $param->qdata6) }}>ERI
                                        OUT Flow </option>
                                    <option value="eri_inlet_ft207" {{ serInd('eri_inlet_ft207', $param->qdata6) }}>
                                        ERI INLET Flow </option>
                                    <option value="conc_flow_cal" {{ serInd('conc_flow_cal', $param->qdata6) }}>
                                        Concentrate Flow </option>
                                    <option value="overflush" {{ serInd('overflush', $param->qdata6) }}>Overflush %
                                    </option>
                                    <option value="eri_hp_out_cond_at306"
                                        {{ serInd('eri_hp_out_cond_at306', $param->qdata6) }}>ERI HP OUT COND </option>
                                    <option value="eri_hp_in_con_at206"
                                        {{ serInd('eri_hp_in_con_at206', $param->qdata6) }}>ERI HP IN COND </option>
                                    <option value="mixing_eri_calc" {{ serInd('mixing_eri_calc', $param->qdata6) }}>
                                        Mixing % (ERI calc to be added) &nbsp;&nbsp;</option>
                                    <option value="feed_cond_at211" {{ serInd('feed_cond_at211', $param->qdata6) }}>
                                        Feed Conductivity </option>
                                    <option value="front_tds_calc" {{ serInd('front_tds_calc', $param->qdata6) }}>
                                        Calculated Front Perm TDS </option>
                                    <option value="rear_tds_calc" {{ serInd('rear_tds_calc', $param->qdata6) }}>
                                        Calculated Rear Perm TDS </option>
                                    <option value="rear_cond_at301" {{ serInd('rear_cond_at301', $param->qdata6) }}>
                                        Rear Permeate Conductivity &nbsp;&nbsp;</option>
                                    <option value="front_cond_at303" {{ serInd('front_cond_at303', $param->qdata6) }}>
                                        Front Permeate Conductivity &nbsp;&nbsp;</option>
                                    <option value="cond_average" {{ serInd('cond_average', $param->qdata6) }}>
                                        Conductivity average </option>
                                    <option value="tds_average" {{ serInd('tds_average', $param->qdata6) }}>TDS
                                        average </option>
                                    <option value="temp_calc" {{ serInd('temp_calc', $param->qdata6) }}>Calculated
                                        Temperature (C) </option>
                                    <option value="feed_temp" {{ serInd('feed_temp', $param->qdata6) }}>Feed
                                        Temperature (F) </option>
                                    <option value="feed_temp_tit212" {{ serInd('feed_temp_tit212', $param->qdata6) }}>
                                        Feed Temperature (C) &nbsp;&nbsp;</option>
                                    <option value="days_operation" {{ serInd('days_operation', $param->qdata6) }}>Days
                                        of Operation &nbsp;&nbsp;</option>
                                    <option value="temp_correc_fac" {{ serInd('temp_correc_fac', $param->qdata6) }}>
                                        Temperature Correction Factor &nbsp;&nbsp;</option>
                                    <option value="calc_feed_brine_avg"
                                        {{ serInd('calc_feed_brine_avg', $param->qdata6) }}>Calculated Feed-Brine Avg
                                        Conc &nbsp;&nbsp;</option>
                                    <option value="feed_brine_ro_press"
                                        {{ serInd('feed_brine_ro_press', $param->qdata6) }}>Feed-Brine Osmotic Pressure
                                        &nbsp;&nbsp;</option>
                                    <option value="per_ro_pres" {{ serInd('per_ro_pres', $param->qdata6) }}>Permeate
                                        Osmotic Pressure &nbsp;&nbsp;</option>
                                    <option value="net_driving_press"
                                        {{ serInd('net_driving_press', $param->qdata6) }}>Net Driving Pressure
                                        &nbsp;&nbsp;</option>
                                </select>
                            </div>
                        </div>
                    </td>
                    <td style="text-align: center;">

                        <!-- Button trigger modal series 6-->
                        <span id="panel6" style="display: none;">
                            <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal"
                                data-bs-target="#modal-series6">
                                ⚙️</span> </span>
                        <!-- Modal series 6-->
                        <div class="modal fade" id="modal-series6" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header modelheader6"
                                        style="background-color: rgb(226, 125, 8);">
                                        <h5 class="modal-title" id="seriestitle6">Series 6: Permeate Pressure </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">


                                        <div class="row mb-2">
                                            <label for="chart_type6" class="col-sm-4 col-form-label">Chart
                                                Type</label>
                                            <div class="col-sm-4">
                                                <select class="chart_render form-control form-select"
                                                    id="chart_type6">
                                                    <option value="spline" {{ serInd('spline', $param->charttype6) }}>
                                                        Line</option>
                                                    <option value="areaspline"
                                                        {{ serInd('areaspline', $param->charttype6) }}>Area </option>
                                                    <option value="column" {{ serInd('column', $param->charttype6) }}>
                                                        Column </option>
                                                    <option value="scatter"
                                                        {{ serInd('scatter', $param->charttype6) }}>Scatter </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="line_width6" class="col-sm-4 col-form-label">Line
                                                Width</label>
                                            <div class="col-sm-4">
                                                <input type="number" id="line_width6"
                                                    class="chart_render form-control"
                                                    value="{{ $param->lineWidth6 }}" min="0" max="4"
                                                    step="0.1">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="marker6" class="col-sm-4 col-form-label">Marker
                                                Weight</label>
                                            <div class="col-sm-4">
                                                <input type="number" id="marker6"
                                                    class="chart_render form-control"
                                                    value="{{ $param->markerWg6 }}" min="0" step="0.1"
                                                    max="4">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="marker_shape6" class="col-sm-4 col-form-label">Marker
                                                Shape</label>
                                            <div class="col-sm-4">
                                                <select id="marker_shape6"
                                                    class="chart_render form-control form-select">
                                                    <option value="circle" {{ serInd('circle', $param->markerSp6) }}>
                                                        Circle </option>
                                                    <option value="square" {{ serInd('square', $param->markerSp6) }}>
                                                        Square </option>
                                                    <option value="triangle"
                                                        {{ serInd('triangle', $param->markerSp6) }}>Trianlge </option>
                                                    <option value="diamond"
                                                        {{ serInd('diamond', $param->markerSp6) }}>Diamond </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="input-group">

                                                <input type="checkbox" class="chart_render form-check-input col-auto"
                                                    id="dt_label6" <?php if ($param->dataLb6 == 'true') {
                                                        echo 'checked';
                                                    } ?>>
                                                <label for="dt_label6" class="form-check-label col-auto">&nbsp; Show
                                                    Data Labels</label>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="input-group">
                                                <input type="checkbox" class="chart_render form-check-input col-auto"
                                                    id="y_axis6" <?php if ($param->yaxis6 == 'true') {
                                                        echo 'checked';
                                                    } ?>>
                                                <label for="y_axis6" class="form-check-label col-auto">&nbsp; Show
                                                    Y-axis</label>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button"
                                                class="btn btn-sm btn-secondary apply_changes">Apply Changes</button>
                                            <button type="button" class="btn btn-sm btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal end here   -->
                        </div>
                    </td>


                    <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length6"
                            style="display: none;"></span></td>
                    <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max6"
                            style="display: none;"></span> </td>
                    <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min6"
                            style="display: none;"></span> </td>
                    <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg6"
                            style="display: none;"></span> </td>
                    <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit6">
                        </span> </td>

                </tr>

                <tr class="tr7 table-secondary">
                    <td>
                        <div class="input-group">
                            <div class="col-auto"><input type="checkbox" class="query series-chk filter"
                                    id="line7" <?php if ($param->isline7 == 'true') {
                                        echo 'checked';
                                    } ?>>
                                &nbsp;7 &nbsp;<input type="color" id="pen7" name="pen7"
                                    value="{{ $param->pen7 }}" class="chart_render series-color"
                                    style="display: none;"> &nbsp; </div>
                            <div class="col-auto input-group-sm">
                                <select class="query form-control form-select" id="ufdata7" style="display: none;">
                                    <option value="dpi_906" {{ serInd('dpi_906', $param->qdata7) }}
                                        style="background-color:rgba(255,121,121,0.4);">DP (Head Loss) &nbsp;&nbsp;
                                    </option>
                                    <option value="norm_perm_flow" {{ serInd('norm_perm_flow', $param->qdata7) }}>
                                        Normalized Permeate Flow &nbsp;&nbsp;</option>
                                    <option value="norm_per_salt_rej"
                                        {{ serInd('norm_per_salt_rej', $param->qdata7) }}>Salt Rejection </option>
                                    <option value="norm_per_salt_pas"
                                        {{ serInd('norm_per_salt_pas', $param->qdata7) }}>Salt Passage </option>
                                    <option value="feed_pres_pt108" {{ serInd('feed_pres_pt108', $param->qdata7) }}>
                                        Feed Pressure </option>
                                    <option value="conc_pres_pt307" {{ serInd('conc_pres_pt307', $param->qdata7) }}>
                                        Concentrate Pressure </option>
                                    <option value="per_pres_pt312" {{ serInd('per_pres_pt312', $param->qdata7) }}>
                                        Permeate Pressure </option>
                                    <option value="recovery" {{ serInd('recovery', $param->qdata7) }}
                                        style="background-color:rgba(34,166,179,0.4);">Recovery (%) </option>
                                    <option value="rear_permeate_ft905"
                                        {{ serInd('rear_permeate_ft905', $param->qdata7) }}>Rear Permeate Flow
                                    </option>
                                    <option value="front_permeate_ft_305"
                                        {{ serInd('front_permeate_ft_305', $param->qdata7) }}>Front Permeate Flow
                                    </option>
                                    <option value="full_flushing" {{ serInd('full_flushing', $param->qdata7) }}>Full
                                        Flushing </option>
                                    <option value="membrane_flushing"
                                        {{ serInd('membrane_flushing', $param->qdata7) }}>Membrane Flushing Only
                                    </option>
                                    <option value="dbna_flushing" {{ serInd('dbna_flushing', $param->qdata7) }}>DBNPA
                                        Membrane Flushing &nbsp;&nbsp;</option>
                                    <option value="cip" {{ serInd('cip', $param->qdata7) }}
                                        style="background-color:rgba(190,46,221,0.4);">CIP</option>
                                    <option value="feed_flow" {{ serInd('feed_flow', $param->qdata7) }}>Feed Flow
                                    </option>
                                    <option value="hp_pump_ft101" {{ serInd('hp_pump_ft101', $param->qdata7) }}>HP
                                        Pump Flow </option>
                                    <option value="eri_out_ft203" {{ serInd('eri_out_ft203', $param->qdata7) }}>ERI
                                        OUT Flow </option>
                                    <option value="eri_inlet_ft207" {{ serInd('eri_inlet_ft207', $param->qdata7) }}>
                                        ERI INLET Flow </option>
                                    <option value="conc_flow_cal" {{ serInd('conc_flow_cal', $param->qdata7) }}>
                                        Concentrate Flow </option>
                                    <option value="overflush" {{ serInd('overflush', $param->qdata7) }}>Overflush %
                                    </option>
                                    <option value="eri_hp_out_cond_at306"
                                        {{ serInd('eri_hp_out_cond_at306', $param->qdata7) }}>ERI HP OUT COND </option>
                                    <option value="eri_hp_in_con_at206"
                                        {{ serInd('eri_hp_in_con_at206', $param->qdata7) }}>ERI HP IN COND </option>
                                    <option value="mixing_eri_calc" {{ serInd('mixing_eri_calc', $param->qdata7) }}>
                                        Mixing % (ERI calc to be added) &nbsp;&nbsp;</option>
                                    <option value="feed_cond_at211" {{ serInd('feed_cond_at211', $param->qdata7) }}>
                                        Feed Conductivity </option>
                                    <option value="front_tds_calc" {{ serInd('front_tds_calc', $param->qdata7) }}>
                                        Calculated Front Perm TDS </option>
                                    <option value="rear_tds_calc" {{ serInd('rear_tds_calc', $param->qdata7) }}>
                                        Calculated Rear Perm TDS </option>
                                    <option value="rear_cond_at301" {{ serInd('rear_cond_at301', $param->qdata7) }}>
                                        Rear Permeate Conductivity &nbsp;&nbsp;</option>
                                    <option value="front_cond_at303"
                                        {{ serInd('front_cond_at303', $param->qdata7) }}>Front Permeate Conductivity
                                        &nbsp;&nbsp;</option>
                                    <option value="cond_average" {{ serInd('cond_average', $param->qdata7) }}>
                                        Conductivity average </option>
                                    <option value="tds_average" {{ serInd('tds_average', $param->qdata7) }}>TDS
                                        average </option>
                                    <option value="temp_calc" {{ serInd('temp_calc', $param->qdata7) }}>Calculated
                                        Temperature (C) </option>
                                    <option value="feed_temp" {{ serInd('feed_temp', $param->qdata7) }}>Feed
                                        Temperature (F) </option>
                                    <option value="feed_temp_tit212"
                                        {{ serInd('feed_temp_tit212', $param->qdata7) }}>Feed Temperature (C)
                                        &nbsp;&nbsp;</option>
                                    <option value="days_operation" {{ serInd('days_operation', $param->qdata7) }}>
                                        Days of Operation &nbsp;&nbsp;</option>
                                    <option value="temp_correc_fac" {{ serInd('temp_correc_fac', $param->qdata7) }}>
                                        Temperature Correction Factor &nbsp;&nbsp;</option>
                                    <option value="calc_feed_brine_avg"
                                        {{ serInd('calc_feed_brine_avg', $param->qdata7) }}>Calculated Feed-Brine Avg
                                        Conc &nbsp;&nbsp;</option>
                                    <option value="feed_brine_ro_press"
                                        {{ serInd('feed_brine_ro_press', $param->qdata7) }}>Feed-Brine Osmotic Pressure
                                        &nbsp;&nbsp;</option>
                                    <option value="per_ro_pres" {{ serInd('per_ro_pres', $param->qdata7) }}>Permeate
                                        Osmotic Pressure &nbsp;&nbsp;</option>
                                    <option value="net_driving_press"
                                        {{ serInd('net_driving_press', $param->qdata7) }}>Net Driving Pressure
                                        &nbsp;&nbsp;</option>
                                </select>
                            </div>
                        </div>
                    </td>
                    <td style="text-align: center;">

                        <!-- Button trigger modal series 5-->
                        <span id="panel7" style="display: none;">
                            <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal"
                                data-bs-target="#modal-series7">
                                ⚙️</span> </span>
                        <!-- Modal series 5-->
                        <div class="modal fade" id="modal-series7" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header modelheader7"
                                        style="background-color: rgb(7, 23, 237);">
                                        <h5 class="modal-title" id="seriestitle7">Series 7: Feed Flow </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row mb-2">
                                            <label for="chart_type7" class="col-sm-4 col-form-label">Chart
                                                Type</label>
                                            <div class="col-sm-4">
                                                <select class="chart_render form-control form-select"
                                                    id="chart_type7">
                                                    <option value="spline"
                                                        {{ serInd('spline', $param->charttype7) }}>Line</option>
                                                    <option value="areaspline"
                                                        {{ serInd('areaspline', $param->charttype7) }}>Area </option>
                                                    <option value="column"
                                                        {{ serInd('column', $param->charttype7) }}>Column </option>
                                                    <option value="scatter"
                                                        {{ serInd('scatter', $param->charttype7) }}>Scatter </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="line_width7" class="col-sm-4 col-form-label">Line
                                                Width</label>
                                            <div class="col-sm-4">
                                                <input type="number" id="line_width7"
                                                    class="chart_render form-control"
                                                    value="{{ $param->lineWidth7 }}" min="0"
                                                    max="4" step="0.1">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="marker7" class="col-sm-4 col-form-label">Marker
                                                Weight</label>
                                            <div class="col-sm-4">
                                                <input type="number" id="marker7"
                                                    class="chart_render form-control"
                                                    value="{{ $param->markerWg7 }}" min="0"
                                                    step="0.1" max="4">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="marker_shape7" class="col-sm-4 col-form-label">Marker
                                                Shape</label>
                                            <div class="col-sm-4">
                                                <select id="marker_shape7"
                                                    class="chart_render form-control form-select">
                                                    <option value="circle" {{ serInd('circle', $param->markerSp7) }}>
                                                        Circle </option>
                                                    <option value="square" {{ serInd('square', $param->markerSp7) }}>
                                                        Square </option>
                                                    <option value="triangle"
                                                        {{ serInd('triangle', $param->markerSp7) }}>Trianlge </option>
                                                    <option value="diamond"
                                                        {{ serInd('diamond', $param->markerSp7) }}>Diamond </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="input-group">

                                                <input type="checkbox"
                                                    class="chart_render form-check-input col-auto" id="dt_label7"
                                                    <?php if ($param->dataLb7 == 'true') {
                                                        echo 'checked';
                                                    } ?>>
                                                <label for="dt_label7" class="form-check-label col-auto">&nbsp; Show
                                                    Data Labels</label>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="input-group">
                                                <input type="checkbox"
                                                    class="chart_render form-check-input col-auto" id="y_axis7"
                                                    <?php if ($param->yaxis7 == 'true') {
                                                        echo 'checked';
                                                    } ?>>
                                                <label for="y_axis7" class="form-check-label col-auto">&nbsp; Show
                                                    Y-axis</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"
                                                class="btn btn-sm btn-secondary apply_changes">Apply Changes</button>
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
                            id="data_length7" style="display: none;"></span></td>
                    <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max7"
                            style="display: none;"></span> </td>
                    <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min7"
                            style="display: none;"></span> </td>
                    <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg7"
                            style="display: none;"></span> </td>
                    <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit7">
                        </span> </td>

                </tr>

            </tbody>
        </table>
    </div>

    <div style="margin-bottom:100px">

    </div>


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
                                value="{{ $param->plotbg }}" class="chart_render series-color">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="pen_grid" class="col-sm-5 col-form-label">🎨 Grid Lines Color </label>
                        <div class="col-sm-4">
                            <input type="color" id="pen_grid" name="grid_background"
                                value="{{ $param->grid }}" class="chart_render series-color">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="is_legend" class="col-sm-5 col-form-label">Show Legends</label>
                        <div class="col-sm-4">
                            <input type="checkbox" id="is_legend" name="is_legend"
                                {{ checkIf($param->isLegend) }} class="chart_render main-chk">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="is_main_yaxis" class="col-sm-5 col-form-label">Common Y-axis % &nbsp;<i
                                class="fa fa-area-chart" aria-hidden="true"></i></label>
                        <div class="col-sm-4">
                            <input type="checkbox" id="is_main_yaxis" name="is_main_yaxis"
                                class="chart_render main-chk" {{ checkIf($param->isYaxis) }}>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="export_width" class="col-sm-5 col-form-label">Export Width </label>
                        <div class="col-sm-4">
                            <input type="number" id="export_width" class="chart_render form-control"
                                min="500" step="50" value="{{ $param->expoWidth }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="export_height" class="col-sm-5 col-form-label">Export Height </label>
                        <div class="col-sm-4">
                            <input type="number" id="export_height" class="chart_render form-control"
                                min="400" step="50" value="{{ $param->expoHeight }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="pen_export" class="col-sm-6 col-form-label">🪂 Export Background Color</label>
                        <div class="col-sm-4">
                            <input type="color" id="pen_export" name="chart_background_export"
                                value="{{ $param->expobg }}" class="chart_render series-color">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="chart_title" class="col-sm-5 col-form-label">Title &nbsp;</label>
                        <div class="col-sm-4">
                            <input type="text" id="chart_title" name="chart_background_title"
                                value="{{ $param->plotTitle }}" class="chart_render form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="pen_export_title" class="col-sm-5 col-form-label">🎨 Title Color</label>
                        <div class="col-sm-4">
                            <input type="color" id="pen_export_title" name="chart_background_title"
                                value="{{ $param->expotitle }}" class="chart_render series-color">
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



    <div class="modal fade modal-lg" id="conf_yaxix" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header badge-light3d">
                    <h5 class="modal-title" id="staticBackdropLabel">Y-Axis Configurations</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-sm table-responsive" style="font-size:9px;">
                        <tr style="text-align: center; vertical-align:middle;">
                            <th>Assign to</th>
                            <th>Title</th>
                            <th>🎨 Title Color </th>
                            <th>🎨 Range Color </th>
                            <th>Show oppsite</th>
                            <th>Min Range </th>
                            <th>Max Range </th>
                        </tr>
                        <tbody>
                            <tr style="text-align: center; vertical-align:middle;">
                                <td>DPI </td>
                                <td> <input type="text" id="yaxis_heading1" name="yaxis_heading1"
                                        value="{{ $param->y1title }}"
                                        class="chart_render form-control form-control-sm"> </td>
                                <td> <input type="color" id="yaxis_title_color1" name="yaxis_title_color1"
                                        value="{{ $param->y1titlecolor }}" class="chart_render series-color"></td>
                                <td> <input type="color" id="yaxis_color1" name="yaxis_color1"
                                        value="{{ $param->y1rangecolor }}" class="chart_render series-color"></td>
                                <td> <input type="checkbox" id="yaxis_opposite1" name="yaxis_opposite1"
                                        class="chart_render main-chk" {{ checkIf($param->y1opposite) }}> </td>
                                <td> <input type="number" id="yaxis_min1" name="yaxis_min1"
                                        class="chart_render form-control form-control-sm"
                                        value="{{ $param->y1min }}" step="0.1" maxlength="4"
                                        size="4"> </td>
                                <td> <input type="number" id="yaxis_max1" name="yaxis_max1"
                                        class="chart_render form-control form-control-sm"
                                        value="{{ $param->y1max }}" step="0.1" maxlength="4"
                                        size="4"> </td>
                            </tr>

                            <tr style="text-align: center; vertical-align:middle;">
                                <td>Flow </td>
                                <td> <input type="text" id="yaxis_heading2" name="yaxis_heading2"
                                        value="{{ $param->y2title }}"
                                        class="chart_render form-control form-control-sm"> </td>
                                <td> <input type="color" id="yaxis_title_color2" name="yaxis_title_color2"
                                        value="{{ $param->y2titlecolor }}" class="chart_render series-color"></td>
                                <td> <input type="color" id="yaxis_color2" name="yaxis_color2"
                                        value="{{ $param->y2rangecolor }}" class="chart_render series-color"></td>
                                <td> <input type="checkbox" id="yaxis_opposite2" name="yaxis_opposite2"
                                        class="chart_render main-chk" {{ checkIf($param->y1opposite) }}> </td>
                                <td> <input type="number" id="yaxis_min2" name="yaxis_min2"
                                        class="chart_render form-control form-control-sm"
                                        value="{{ $param->y2min }}" step="0.1"> </td>
                                <td> <input type="number" id="yaxis_max2" name="yaxis_max2"
                                        class="chart_render form-control form-control-sm"
                                        value="{{ $param->y2max }}" step="0.1"> </td>
                            </tr>
                            <tr style="text-align: center; vertical-align:middle;">
                                <td>Pressure </td>
                                <td> <input type="text" id="yaxis_heading3" name="yaxis_heading3"
                                        value="{{ $param->y3title }}"
                                        class="chart_render form-control form-control-sm"> </td>
                                <td> <input type="color" id="yaxis_title_color3" name="yaxis_title_color3"
                                        value="{{ $param->y3titlecolor }}" class="chart_render series-color"></td>
                                <td> <input type="color" id="yaxis_color3" name="yaxis_color3"
                                        value="{{ $param->y3rangecolor }}" class="chart_render series-color"></td>
                                <td> <input type="checkbox" id="yaxis_opposite3" name="yaxis_opposite3"
                                        class="chart_render main-chk" {{ checkIf($param->y3opposite) }}> </td>
                                <td> <input type="number" id="yaxis_min3" name="yaxis_min3"
                                        class="chart_render form-control form-control-sm"
                                        value="{{ $param->y3min }}" step="0.1"> </td>
                                <td> <input type="number" id="yaxis_max3" name="yaxis_max3"
                                        class="chart_render form-control form-control-sm"
                                        value="{{ $param->y3max }}" step="0.1"> </td>
                            </tr>

                            <tr style="text-align: center; vertical-align:middle;">
                                <td>Salt Rejection </td>
                                <td> <input type="text" id="yaxis_heading4" name="yaxis_heading4"
                                        value="{{ $param->y4title }}"
                                        class="chart_render form-control form-control-sm"> </td>
                                <td> <input type="color" id="yaxis_title_color4" name="yaxis_title_color4"
                                        value="{{ $param->y4titlecolor }}" class="chart_render series-color"></td>
                                <td> <input type="color" id="yaxis_color4" name="yaxis_color4"
                                        value="{{ $param->y4rangecolor }}" class="chart_render series-color"></td>
                                <td> <input type="checkbox" id="yaxis_opposite4" name="yaxis_opposite4"
                                        class="chart_render main-chk" {{ checkIf($param->y4opposite) }}> </td>
                                <td> <input type="number" id="yaxis_min4" name="yaxis_min4"
                                        class="chart_render form-control form-control-sm"
                                        value="{{ $param->y4min }}" step="0.1"> </td>
                                <td> <input type="number" id="yaxis_max4" name="yaxis_max4"
                                        class="chart_render form-control form-control-sm"
                                        value="{{ $param->y4max }}" step="0.1"> </td>
                            </tr>

                            <tr style="text-align: center; vertical-align:middle;">
                                <td>Salt Passage </td>
                                <td> <input type="text" id="yaxis_heading5" name="yaxis_heading5"
                                        value="{{ $param->y5title }}"
                                        class="chart_render form-control form-control-sm"> </td>
                                <td> <input type="color" id="yaxis_title_color5" name="yaxis_title_color5"
                                        value="{{ $param->y5titlecolor }}" class="chart_render series-color"></td>
                                <td> <input type="color" id="yaxis_color5" name="yaxis_color5"
                                        value="{{ $param->y5rangecolor }}" class="chart_render series-color"></td>
                                <td> <input type="checkbox" id="yaxis_opposite5" name="yaxis_opposite5"
                                        class="chart_render main-chk" {{ checkIf($param->y5opposite) }}> </td>
                                <td> <input type="number" id="yaxis_min5" name="yaxis_min5"
                                        class="chart_render form-control form-control-sm"
                                        value="{{ $param->y5min }}" step="0.1"> </td>
                                <td> <input type="number" id="yaxis_max5" name="yaxis_max5"
                                        class="chart_render form-control form-control-sm"
                                        value="{{ $param->y5max }}" step="0.1"> </td>
                            </tr>

                            <tr style="text-align: center; vertical-align:middle;">
                                <td>high EC </td>
                                <td> <input type="text" id="yaxis_heading6" name="yaxis_heading6"
                                        value="{{ $param->y6title }}"
                                        class="chart_render form-control form-control-sm"> </td>
                                <td> <input type="color" id="yaxis_title_color6" name="yaxis_title_color6"
                                        value="{{ $param->y6titlecolor }}" class="chart_render series-color"></td>
                                <td> <input type="color" id="yaxis_color6" name="yaxis_color6"
                                        value="{{ $param->y6rangecolor }}" class="chart_render series-color"></td>
                                <td> <input type="checkbox" id="yaxis_opposite6" name="yaxis_opposite6"
                                        class="chart_render main-chk" {{ checkIf($param->y6opposite) }}> </td>
                                <td> <input type="number" id="yaxis_min6" name="yaxis_min6"
                                        class="chart_render form-control form-control-sm"
                                        value="{{ $param->y6min }}" step="0.1"> </td>
                                <td> <input type="number" id="yaxis_max6" name="yaxis_max6"
                                        class="chart_render form-control form-control-sm"
                                        value="{{ $param->y6max }}" step="0.1"> </td>
                            </tr>

                            <tr style="text-align: center; vertical-align:middle;">
                                <td>low EC </td>
                                <td> <input type="text" id="yaxis_heading7" name="yaxis_heading7"
                                        value="{{ $param->y7title }}"
                                        class="chart_render form-control form-control-sm"> </td>
                                <td> <input type="color" id="yaxis_title_color7" name="yaxis_title_color7"
                                        value="{{ $param->y7titlecolor }}" class="chart_render series-color"></td>
                                <td> <input type="color" id="yaxis_color7" name="yaxis_color7"
                                        value="{{ $param->y7rangecolor }}" class="chart_render series-color"></td>
                                <td> <input type="checkbox" id="yaxis_opposite7" name="yaxis_opposite7"
                                        class="chart_render main-chk" {{ checkIf($param->y7opposite) }}> </td>
                                <td> <input type="number" id="yaxis_min7" name="yaxis_min7"
                                        class="chart_render form-control form-control-sm"
                                        value="{{ $param->y7min }}" step="0.1"> </td>
                                <td> <input type="number" id="yaxis_max7" name="yaxis_max7"
                                        class="chart_render form-control form-control-sm"
                                        value="{{ $param->y7max }}" step="0.1"> </td>
                            </tr>

                            <tr style="text-align: center; vertical-align:middle;">
                                <td>TDS </td>
                                <td> <input type="text" id="yaxis_heading8" name="yaxis_heading8"
                                        value="{{ $param->y8title }}"
                                        class="chart_render form-control form-control-sm"> </td>
                                <td> <input type="color" id="yaxis_title_color8" name="yaxis_title_color8"
                                        value="{{ $param->y8titlecolor }}" class="chart_render series-color"></td>
                                <td> <input type="color" id="yaxis_color8" name="yaxis_color8"
                                        value="{{ $param->y8rangecolor }}" class="chart_render series-color"></td>
                                <td> <input type="checkbox" id="yaxis_opposite8" name="yaxis_opposite8"
                                        class="chart_render main-chk" {{ checkIf($param->y8opposite) }}> </td>
                                <td> <input type="number" id="yaxis_min8" name="yaxis_min8"
                                        class="chart_render form-control form-control-sm"
                                        value="{{ $param->y8min }}" step="0.1"> </td>
                                <td> <input type="number" id="yaxis_max8" name="yaxis_max8"
                                        class="chart_render form-control form-control-sm"
                                        value="{{ $param->y8max }}" step="0.1"> </td>
                            </tr>

                            <tr style="text-align: center; vertical-align:middle;">
                                <td>Temp.°F </td>
                                <td> <input type="text" id="yaxis_heading9" name="yaxis_heading9"
                                        value="{{ $param->y9title }}"
                                        class="chart_render form-control form-control-sm"> </td>
                                <td> <input type="color" id="yaxis_title_color9" name="yaxis_title_color9"
                                        value="{{ $param->y9titlecolor }}" class="chart_render series-color"></td>
                                <td> <input type="color" id="yaxis_color9" name="yaxis_color9"
                                        value="{{ $param->y9rangecolor }}" class="chart_render series-color"></td>
                                <td> <input type="checkbox" id="yaxis_opposite9" name="yaxis_opposite9"
                                        class="chart_render main-chk" {{ checkIf($param->y9opposite) }}> </td>
                                <td> <input type="number" id="yaxis_min9" name="yaxis_min9"
                                        class="chart_render form-control form-control-sm"
                                        value="{{ $param->y9min }}" step="0.1"> </td>
                                <td> <input type="number" id="yaxis_max9" name="yaxis_max9"
                                        class="chart_render form-control form-control-sm"
                                        value="{{ $param->y9max }}" step="0.1"> </td>
                            </tr>

                            <tr style="text-align: center; vertical-align:middle;">
                                <td>Temp °C </td>
                                <td> <input type="text" id="yaxis_heading10" name="yaxis_heading10"
                                        value="{{ $param->y10title }}"
                                        class="chart_render form-control form-control-sm"> </td>
                                <td> <input type="color" id="yaxis_title_color10" name="yaxis_title_color10"
                                        value="{{ $param->y10titlecolor }}" class="chart_render series-color">
                                </td>
                                <td> <input type="color" id="yaxis_color10" name="yaxis_color10"
                                        value="{{ $param->y10rangecolor }}" class="chart_render series-color">
                                </td>
                                <td> <input type="checkbox" id="yaxis_opposite10" name="yaxis_opposite10"
                                        class="chart_render main-chk" {{ checkIf($param->y10opposite) }}> </td>
                                <td> <input type="number" id="yaxis_min10" name="yaxis_min10"
                                        class="chart_render form-control form-control-sm"
                                        value="{{ $param->y10min }}" step="0.1"> </td>
                                <td> <input type="number" id="yaxis_max10" name="yaxis_max10"
                                        class="chart_render form-control form-control-sm"
                                        value="{{ $param->y10max }}" step="0.1"> </td>
                            </tr>
                        </tbody>
                    </table>



                </div>

                <div class="modal-footer">
                    <span>These configurations are applicable to individual user only </span>
                    <button type="button" class="btn btn-sm btn-secondary apply_changes">Apply Changes</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>





    <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark"
        style="background-color:rgba(0, 0, 0, 0.986); padding-top:2px; padding-bottom:0px;">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:3px;">
                            <a href="{{ url('/home') }}">
                                <button class="btn btn-sm badge-light3d"><span style="font-size: 14px;"> 🏠 </span>
                                    &nbsp;
                                </button></a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:3px;">
                            <!-- Button trigger modal -->
                            <div class="input-group">
                                <span class="btn btn-sm badge-light3d" data-bs-toggle="modal"
                                    data-bs-target="#sajid" style="margin-bottom:3px;"><span
                                        style="font-size: 14px;"> ⚙️ </span></span>
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
                                <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">🗓️ From
                                </div>

                                <input type="date" name="start_date"
                                    class="tensor-flow form-control form-control-sm" id="start_date"
                                    value="{{ $param->date1 }}" min="2016-01-01" max="2027-11-10"
                                    required="" style="background-color:#dff9fb;">
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:3px;">
                            <div class="input-group input-group-sm">
                                <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">🗓️ To
                                </div>
                                <input type="date" name="end_date" id="end_date"
                                    value="{{ $param->date2 }}" min="2016-01-31" max="2027-03-30"
                                    class="tensor-flow form-control form-control-sm" required=""
                                    style="background-color:#dff9fb;">
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
                                    <option value="a" {{ serInd('a', $param->skid1) }}> 41-A</option>
                                    <option value="b" {{ serInd('b', $param->skid1) }}>41-B</option>
                                    <option value="c" {{ serInd('c', $param->skid1) }}>41-C</option>
                                    <option value="d" {{ serInd('d', $param->skid1) }}>41-D</option>
                                    <option value="e" {{ serInd('e', $param->skid1) }}>41-E</option>
                                    <option value="f" {{ serInd('f', $param->skid1) }}>41-F</option>
                                    <option value="g" {{ serInd('g', $param->skid1) }}>41-G</option>
                                    <option value="h" {{ serInd('h', $param->skid1) }}>41-H</option>
                                    <option value="i" {{ serInd('i', $param->skid1) }}>41-I</option>
                                    <option value="j" {{ serInd('j', $param->skid1) }}>41-J</option>
                                    <option value="k" {{ serInd('k', $param->skid1) }}>41-K</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:3px;">
                            <div class="input-group input-group-sm">
                                <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">🕝
                                    Interval</div>
                                <select class="query form-control form-control-sm form-select" id="invt"
                                    style="background-color:#dff9fb;">
                                    <option value="0.7" {{ serInd('0.7', $param->invt) }}>1 hr</option>
                                    <option value="1.8" {{ serInd('1.8', $param->invt) }}>2 hrs</option>
                                    <option value="3.7" {{ serInd('3.7', $param->invt) }}>4 Hrs</option>
                                    <option value="5.7" {{ serInd('5.7', $param->invt) }}>6 Hrs</option>
                                    <option value="7.7" {{ serInd('7.7', $param->invt) }}>8 Hrs</option>
                                    <option value="11" {{ serInd('11', $param->invt) }}>12 Hrs</option>
                                    <option value="23" {{ serInd('23', $param->invt) }}>24 Hrs</option>
                                    <option value="47" {{ serInd('47', $param->invt) }}>48 Hrs</option>
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
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:3px;">
                            <div class="input-group input-group-sm">
                                <a href="{{ url('/ro1dataExport') }}">
                                    <button id="trigger_tb" class="btn badge-light3d btn-sm">
                                        <span style="font-size: 14px;"> 📦 </span> Data Table</button>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script type="text/javascript" src="{{ asset('js/stream/ro1_normalisation.js') }}"></script>
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
</body>

</html>
