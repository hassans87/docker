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
    <title> RO Second Pass </title>
</head>

<body style="font-family: calibri;">
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




    <figure id="plot_window" class="test_print loading-msg" style="height:93vh;"></figure>
    <table class="table-sm table-responsive table-light table-bordered">
        <thead class="badge-light3d">
            <tr>
                <th>Series</th>
                <th>&nbsp;&nbsp;Settings &nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;Data Points&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;Max Value &nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;Min Value &nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;Avg. Value &nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp; Unit &nbsp;&nbsp;</th>

            </tr>
        </thead>
        <tbody>
            <tr class="tr1 table-secondary">
                <td>
                    <div class="input-group">
                        <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line1"
                                <?php if ($param->isline1 == 'true') {
                                    echo 'checked';
                                } ?>>
                            &nbsp;1 &nbsp;<input type="color" id="pen1" name="pen1"
                                value="<?php try {
                                    echo $param->pen1;
                                } catch (Throwable $e) {
                                    echo $colors[0];
                                } ?>" class="chart_render series-color" style="display: none;">
                            &nbsp; </div>
                        <div class="col-auto">
                            <select class="query form-control form-control-sm form-select" id="ufdata1"
                                style="display: none;">
                                <option value="cip" {{ serInd('cip', $param->qdata1) }}> CIP &nbsp;</option>
                                <option value="dp_stage1_calc" {{ serInd('dp_stage1_calc', $param->qdata1) }}>Stage-1
                                    DP (Calc) &nbsp;</option>
                                <option value="dp_stage2_calc" {{ serInd('dp_stage2_calc', $param->qdata1) }}>Stage-2
                                    DP (Calc) &nbsp;</option>
                                <option value="dp_total" {{ serInd('dp_total', $param->qdata1) }}> DP Total (calc)
                                    &nbsp;</option>
                                <option value="tmp_2nd_pass" {{ serInd('tmp_2nd_pass', $param->qdata1) }}> 2nd Pass TMP
                                    &nbsp;</option>
                                <option value="tot_recovery" {{ serInd('tot_recovery', $param->qdata1) }}> Total
                                    Recovery (Calc) &nbsp;</option>
                                <option value="perm_flux" {{ serInd('perm_flux', $param->qdata1) }}>2nd Pass Permeate
                                    Flux &nbsp;</option>
                                <option value="tds_at_mem_surf" {{ serInd('tds_at_mem_surf', $param->qdata1) }}>TDS at
                                    Membrane Surface (Calc) &nbsp;</option>
                                <option value="net_drv_pres" {{ serInd('net_drv_pres', $param->qdata1) }}> 2nd Pass
                                    NDP: TMP - Δπ &nbsp;</option>
                                <option value="t_cor_salt_pas" {{ serInd('t_cor_salt_pas', $param->qdata1) }}> Total
                                    Salt Passage &nbsp;</option>
                                <option value="tot_permeab" {{ serInd('tot_permeab', $param->qdata1) }}>Total
                                    Permeability &nbsp;</option>
                                <option value="feed_wtr_temp" {{ serInd('feed_wtr_temp', $param->qdata1) }}>Feed Water
                                    Temperature &nbsp;</option>
                                <option value="feed_cond" {{ serInd('feed_cond', $param->qdata1) }}>Feed Water EC
                                    &nbsp;</option>
                                <option value="stage2_cond" {{ serInd('stage2_cond', $param->qdata1) }}>Stage-2
                                    Permeate EC &nbsp;</option>
                                <option value="permeate_cond" {{ serInd('permeate_cond', $param->qdata1) }}> Permeate
                                    Common EC&nbsp;</option>
                                <option value="feed_pres" {{ serInd('feed_pres', $param->qdata1) }}> Feed Pressure
                                    PT-105 &nbsp;</option>
                                <option value="feed_pres_2ndstg" {{ serInd('feed_pres_2ndstg', $param->qdata1) }}>
                                    Stage-2 Feed Pressure PT-110 &nbsp;</option>
                                <option value="brine_pres_2ndstg" {{ serInd('brine_pres_2ndstg', $param->qdata1) }}>
                                    Stage-2 Brine Pressure PT-113 &nbsp;</option>
                                <option value="stage1_per_pres" {{ serInd('stage1_per_pres', $param->qdata1) }}>Stage-1
                                    Permeate Pressure PIT-107 &nbsp;</option>
                                <option value="totalfeed_calc" {{ serInd('totalfeed_calc', $param->qdata1) }}>Total
                                    Feed Flow FI-903 &nbsp;</option>
                                <option value="stage1_perm_flow" {{ serInd('stage1_perm_flow', $param->qdata1) }}>
                                    Stage-1 Permeate Flow FIT-108 &nbsp;</option>
                                <option value="stage2_perm_flow" {{ serInd('stage2_perm_flow', $param->qdata1) }}>
                                    Stage-2 Permeate Flow FIT-111 &nbsp;</option>
                                <option value="total_perm_flow" {{ serInd('total_perm_flow', $param->qdata1) }}>Total
                                    Permeate Flow (Calc) &nbsp;</option>
                                <option value="brine_flowrate" {{ serInd('brine_flowrate', $param->qdata1) }}> Brine
                                    Flowrate FIT-114 &nbsp;</option>
                                <option value="brine_rofeed" {{ serInd('brine_rofeed', $param->qdata1) }}> Brine to RO
                                    Feed header&nbsp;</option>
                                <option value="brine_nl" {{ serInd('brine_nl', $param->qdata1) }}>2nd Pass Brine Flow
                                    to North Line &nbsp;</option>
                                <option value="brine_sl" {{ serInd('brine_sl', $param->qdata1) }}>2nd Pass Brine Flow
                                    to South Line &nbsp;</option>
                            </select>
                        </div>
                    </div>
                </td>
                <td style="text-align: center;">

                    <!-- Button trigger modal series 1-->
                    <span id="panel1" style="display: none;">
                        <span class="model1 badge badge-light3d" data-bs-toggle="modal" data-bs-target="#modal1">
                            <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i> </span> </span>



                    <!-- Modal series 1-->
                    <div class="modal fade" id="modal1" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header modelheader1" style="background-color: rgb(228, 7, 7);">
                                    <h5 class="modal-title" id="seriestitle1">Series 1: CIP &nbsp;</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <div class="row mb-2">
                                        <label for="chart_type1" class="chart_render col-sm-4 col-form-label">Chart
                                            Type</label>
                                        <div class="col-sm-4">
                                            <select class="chart_render form-control form-select" id="chart_type1">
                                                <option value="spline" {{ serInd('spline', $param->charttype1) }}>Line
                                                </option>
                                                <option value="areaspline"
                                                    {{ serInd('areaspline', $param->charttype1) }}>Area </option>
                                                <option value="column" {{ serInd('column', $param->charttype1) }}>
                                                    Column </option>
                                                <option value="scatter" {{ serInd('scatter', $param->charttype1) }}>
                                                    Scatter </option>
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
                                            <input type="number" id="marker1" class="chart_render form-control"
                                                value="{{ $param->markerWg1 }}" min="0" step="1"
                                                max="4">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker_shape1" class="col-sm-4 col-form-label">Marker
                                            Shape</label>
                                        <div class="col-sm-4">
                                            <select id="marker_shape1" class="chart_render form-control form-select">
                                                <option value="circle" {{ serInd('circle', $param->markerSp1) }}>
                                                    Circle </option>
                                                <option value="square" {{ serInd('square', $param->markerSp1) }}>
                                                    Square </option>
                                                <option value="triangle" {{ serInd('triangle', $param->markerSp1) }}>
                                                    Trianlge </option>
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


                <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length1"
                        style="display: none;"></span></td>
                <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max1"
                        style="display: none;"></span> </td>
                <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min1"
                        style="display: none;"></span> </td>
                <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg1"
                        style="display: none;"></span> </td>
                <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit1"> </span>
                </td>


            </tr>
            <tr class="tr2 table-light">
                <td>
                    <div class="input-group">
                        <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line2"
                                <?php if ($param->isline2 == 'true') {
                                    echo 'checked';
                                } ?>>
                            &nbsp;2 &nbsp;<input type="color" id="pen2" name="pen2" value="#09f505"
                                class="chart_render series-color"> &nbsp; </div>
                        <div class="col-auto">
                            <select class="query form-control form-control-sm form-select" id="ufdata2">
                                <option value="cip" {{ serInd('cip', $param->qdata2) }}> CIP &nbsp;</option>
                                <option value="dp_stage1_calc" {{ serInd('dp_stage1_calc', $param->qdata2) }}>Stage-1
                                    DP (Calc) &nbsp;</option>
                                <option value="dp_stage2_calc" {{ serInd('dp_stage2_calc', $param->qdata2) }}>Stage-2
                                    DP (Calc) &nbsp;</option>
                                <option value="dp_total" {{ serInd('dp_total', $param->qdata2) }}> DP Total (calc)
                                    &nbsp;</option>
                                <option value="tmp_2nd_pass" {{ serInd('tmp_2nd_pass', $param->qdata2) }}> 2nd Pass
                                    TMP &nbsp;</option>
                                <option value="tot_recovery" {{ serInd('tot_recovery', $param->qdata2) }}> Total
                                    Recovery (Calc) &nbsp;</option>
                                <option value="perm_flux" {{ serInd('perm_flux', $param->qdata2) }}>2nd Pass Permeate
                                    Flux &nbsp;</option>
                                <option value="tds_at_mem_surf" {{ serInd('tds_at_mem_surf', $param->qdata2) }}>TDS at
                                    Membrane Surface (Calc) &nbsp;</option>
                                <option value="net_drv_pres" {{ serInd('net_drv_pres', $param->qdata2) }}> 2nd Pass
                                    NDP: TMP - Δπ &nbsp;</option>
                                <option value="t_cor_salt_pas" {{ serInd('t_cor_salt_pas', $param->qdata2) }}> Total
                                    Salt Passage &nbsp;</option>
                                <option value="tot_permeab" {{ serInd('tot_permeab', $param->qdata2) }}>Total
                                    Permeability &nbsp;</option>
                                <option value="feed_wtr_temp" {{ serInd('feed_wtr_temp', $param->qdata2) }}>Feed Water
                                    Temperature &nbsp;</option>
                                <option value="feed_cond" {{ serInd('feed_cond', $param->qdata2) }}>Feed Water EC
                                    &nbsp;</option>
                                <option value="stage2_cond" {{ serInd('stage2_cond', $param->qdata2) }}>Stage-2
                                    Permeate EC &nbsp;</option>
                                <option value="permeate_cond" {{ serInd('permeate_cond', $param->qdata2) }}> Permeate
                                    Common EC&nbsp;</option>
                                <option value="feed_pres" {{ serInd('feed_pres', $param->qdata2) }}> Feed Pressure
                                    PT-105 &nbsp;</option>
                                <option value="feed_pres_2ndstg" {{ serInd('feed_pres_2ndstg', $param->qdata2) }}>
                                    Stage-2 Feed Pressure PT-110 &nbsp;</option>
                                <option value="brine_pres_2ndstg" {{ serInd('brine_pres_2ndstg', $param->qdata2) }}>
                                    Stage-2 Brine Pressure PT-113 &nbsp;</option>
                                <option value="stage1_per_pres" {{ serInd('stage1_per_pres', $param->qdata2) }}>
                                    Stage-1 Permeate Pressure PIT-107 &nbsp;</option>
                                <option value="totalfeed_calc" {{ serInd('totalfeed_calc', $param->qdata2) }}>Total
                                    Feed Flow FI-903 &nbsp;</option>
                                <option value="stage1_perm_flow" {{ serInd('stage1_perm_flow', $param->qdata2) }}>
                                    Stage-1 Permeate Flow FIT-108 &nbsp;</option>
                                <option value="stage2_perm_flow" {{ serInd('stage2_perm_flow', $param->qdata2) }}>
                                    Stage-2 Permeate Flow FIT-111 &nbsp;</option>
                                <option value="total_perm_flow" {{ serInd('total_perm_flow', $param->qdata2) }}>Total
                                    Permeate Flow (Calc) &nbsp;</option>
                                <option value="brine_flowrate" {{ serInd('brine_flowrate', $param->qdata2) }}> Brine
                                    Flowrate FIT-114 &nbsp;</option>
                                <option value="brine_rofeed" {{ serInd('brine_rofeed', $param->qdata2) }}> Brine to RO
                                    Feed header&nbsp;</option>
                                <option value="brine_nl" {{ serInd('brine_nl', $param->qdata2) }}>2nd Pass Brine Flow
                                    to North Line &nbsp;</option>
                                <option value="brine_sl" {{ serInd('brine_sl', $param->qdata2) }}>2nd Pass Brine Flow
                                    to South Line &nbsp;</option>
                            </select>
                        </div>

                    </div>
                </td>
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
                                <div class="modal-header modelheader2" style="background-color: rgb(9, 245, 5);">
                                    <h5 class="modal-title" id="seriestitle2">Series 2: Total Feed Flow FI-903 &nbsp;
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-2">
                                        <label for="chart_type2" class="col-sm-4 col-form-label">Chart Type</label>
                                        <div class="col-sm-4">
                                            <select class="chart_render form-control form-select" id="chart_type2">
                                                <option value="spline">Line</option>
                                                <option value="areaspline">Area </option>
                                                <option value="column">Column </option>
                                                <option value="scatter" selected="">Scatter </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <label for="line_width1" class="col-sm-4 col-form-label">Line Width</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="line_width2" class="chart_render form-control"
                                                value="1.5" min="0" max="4" step="0.1">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker1" class="col-sm-4 col-form-label">Marker Weight</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="marker2" class="chart_render form-control"
                                                value="2.5" min="0" step="0.1" max="4">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker_shape2" class="col-sm-4 col-form-label">Marker
                                            Shape</label>
                                        <div class="col-sm-4">
                                            <select id="marker_shape2" class="chart_render form-control form-select">
                                                <option value="circle">Circle </option>
                                                <option value="square" selected="">Square </option>
                                                <option value="triangle">Trianlge </option>
                                                <option value="diamond">Diamond </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="input-group">

                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="dt_label2">
                                            <label for="dt_label1" class="form-check-label col-auto">&nbsp; Show Data
                                                Labels</label>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="input-group">
                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="y_axis2" checked="">
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
                    </div>
                </td>



                <td style="text-align: center; background-color: black; color:#3edbf0; "> <span
                        id="data_length2">90</span></td>
                <td style="text-align: center; background-color: black; color:#f21170; "> <span
                        id="data_max2">1609</span> </td>
                <td style="text-align: center; background-color: black; color:#00ead3; "> <span
                        id="data_min2">309</span> </td>
                <td style="text-align: center; background-color: black; color:#fff600; "> <span
                        id="data_avg2">1332</span> </td>
                <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit2">
                        m<sup>3</sup>/h</span> </td>

            </tr>
            <tr class="tr3 table-light">
                <td>
                    <div class="input-group">
                        <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line3"
                                <?php if ($param->isline3 == 'true') {
                                    echo 'checked';
                                } ?>>
                            &nbsp;3 &nbsp;<input type="color" id="pen3" name="pen3" value="#d707f2"
                                class="chart_render series-color"> &nbsp; </div>
                        <div class="col-auto">
                            <select class="query form-control form-control-sm form-select" id="ufdata3">
                                <option value="cip" {{ serInd('cip', $param->qdata3) }}> CIP &nbsp;</option>
                                <option value="dp_stage1_calc" {{ serInd('dp_stage1_calc', $param->qdata3) }}>Stage-1
                                    DP (Calc) &nbsp;</option>
                                <option value="dp_stage2_calc" {{ serInd('dp_stage2_calc', $param->qdata3) }}>Stage-2
                                    DP (Calc) &nbsp;</option>
                                <option value="dp_total" {{ serInd('dp_total', $param->qdata3) }}> DP Total (calc)
                                    &nbsp;</option>
                                <option value="tmp_2nd_pass" {{ serInd('tmp_2nd_pass', $param->qdata3) }}> 2nd Pass
                                    TMP &nbsp;</option>
                                <option value="tot_recovery" {{ serInd('tot_recovery', $param->qdata3) }}> Total
                                    Recovery (Calc) &nbsp;</option>
                                <option value="perm_flux" {{ serInd('perm_flux', $param->qdata3) }}>2nd Pass Permeate
                                    Flux &nbsp;</option>
                                <option value="tds_at_mem_surf" {{ serInd('tds_at_mem_surf', $param->qdata3) }}>TDS at
                                    Membrane Surface (Calc) &nbsp;</option>
                                <option value="net_drv_pres" {{ serInd('net_drv_pres', $param->qdata3) }}> 2nd Pass
                                    NDP: TMP - Δπ &nbsp;</option>
                                <option value="t_cor_salt_pas" {{ serInd('t_cor_salt_pas', $param->qdata3) }}> Total
                                    Salt Passage &nbsp;</option>
                                <option value="tot_permeab" {{ serInd('tot_permeab', $param->qdata3) }}>Total
                                    Permeability &nbsp;</option>
                                <option value="feed_wtr_temp" {{ serInd('feed_wtr_temp', $param->qdata3) }}>Feed Water
                                    Temperature &nbsp;</option>
                                <option value="feed_cond" {{ serInd('feed_cond', $param->qdata3) }}>Feed Water EC
                                    &nbsp;</option>
                                <option value="stage2_cond" {{ serInd('stage2_cond', $param->qdata3) }}>Stage-2
                                    Permeate EC &nbsp;</option>
                                <option value="permeate_cond" {{ serInd('permeate_cond', $param->qdata3) }}> Permeate
                                    Common EC&nbsp;</option>
                                <option value="feed_pres" {{ serInd('feed_pres', $param->qdata3) }}> Feed Pressure
                                    PT-105 &nbsp;</option>
                                <option value="feed_pres_2ndstg" {{ serInd('feed_pres_2ndstg', $param->qdata3) }}>
                                    Stage-2 Feed Pressure PT-110 &nbsp;</option>
                                <option value="brine_pres_2ndstg" {{ serInd('brine_pres_2ndstg', $param->qdata3) }}>
                                    Stage-2 Brine Pressure PT-113 &nbsp;</option>
                                <option value="stage1_per_pres" {{ serInd('stage1_per_pres', $param->qdata3) }}>
                                    Stage-1 Permeate Pressure PIT-107 &nbsp;</option>
                                <option value="totalfeed_calc" {{ serInd('totalfeed_calc', $param->qdata3) }}>Total
                                    Feed Flow FI-903 &nbsp;</option>
                                <option value="stage1_perm_flow" {{ serInd('stage1_perm_flow', $param->qdata3) }}>
                                    Stage-1 Permeate Flow FIT-108 &nbsp;</option>
                                <option value="stage2_perm_flow" {{ serInd('stage2_perm_flow', $param->qdata3) }}>
                                    Stage-2 Permeate Flow FIT-111 &nbsp;</option>
                                <option value="total_perm_flow" {{ serInd('total_perm_flow', $param->qdata3) }}>Total
                                    Permeate Flow (Calc) &nbsp;</option>
                                <option value="brine_flowrate" {{ serInd('brine_flowrate', $param->qdata3) }}> Brine
                                    Flowrate FIT-114 &nbsp;</option>
                                <option value="brine_rofeed" {{ serInd('brine_rofeed', $param->qdata3) }}> Brine to
                                    RO Feed header&nbsp;</option>
                                <option value="brine_nl" {{ serInd('brine_nl', $param->qdata3) }}>2nd Pass Brine Flow
                                    to North Line &nbsp;</option>
                                <option value="brine_sl" {{ serInd('brine_sl', $param->qdata3) }}>2nd Pass Brine Flow
                                    to South Line &nbsp;</option>
                            </select>
                        </div>
                    </div>
                </td>
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
                                <div class="modal-header modelheader3" style="background-color: rgb(215, 7, 242);">
                                    <h5 class="modal-title" id="seriestitle3">Series 3: Feed Water EC &nbsp;</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <div class="row mb-2">
                                        <label for="chart_type3" class="col-sm-4 col-form-label">Chart Type</label>
                                        <div class="col-sm-4">
                                            <select class="chart_render form-control form-select" id="chart_type3">
                                                <option value="spline">Line</option>
                                                <option value="areaspline">Area </option>
                                                <option value="column">Column </option>
                                                <option value="scatter" selected="">Scatter </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <label for="line_width3" class="chart_render col-sm-4 col-form-label">Line
                                            Width</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="line_width3" class="rednder form-control"
                                                value="1.2" min="0" max="4" step="0.1">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker3" class="col-sm-4 col-form-label">Marker Weight</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="marker3" class="chart_render form-control"
                                                value="1.5" min="0" step="0.1" max="4">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker_shape3" class="chart_render col-sm-4 col-form-label">Marker
                                            Shape</label>
                                        <div class="col-sm-4">
                                            <select id="marker_shape3" class="chart_render form-control form-select">
                                                <option value="circle">Circle </option>
                                                <option value="square">Square </option>
                                                <option value="triangle">Trianlge </option>
                                                <option value="diamond" selected="">Diamond </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="input-group">

                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="dt_label3">
                                            <label for="dt_label3" class="form-check-label col-auto">&nbsp; Show Data
                                                Labels</label>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="input-group">
                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="y_axis3" checked="">
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
                    </div>
                </td>


                <td style="text-align: center; background-color: black; color:#3edbf0; "> <span
                        id="data_length3">90</span></td>
                <td style="text-align: center; background-color: black; color:#f21170; "> <span
                        id="data_max3">1986</span> </td>
                <td style="text-align: center; background-color: black; color:#00ead3; "> <span
                        id="data_min3">1299</span> </td>
                <td style="text-align: center; background-color: black; color:#fff600; "> <span
                        id="data_avg3">1633</span> </td>
                <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit3">
                        uS/cm</span> </td>

            </tr>
            <tr class="tr4 table-light">
                <td>
                    <div class="input-group">
                        <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line4"
                                <?php if ($param->isline4 == 'true') {
                                    echo 'checked';
                                } ?>>
                            &nbsp;4 &nbsp;<input type="color" id="pen4" name="pen4" value="#c5112c"
                                class="chart_render series-color"> &nbsp; </div>
                        <div class="col-auto">
                            <select class="query form-control form-control-sm form-select" id="ufdata4">
                                <option value="cip" {{ serInd('cip', $param->qdata4) }}> CIP &nbsp;</option>
                                <option value="dp_stage1_calc" {{ serInd('dp_stage1_calc', $param->qdata4) }}>Stage-1
                                    DP (Calc) &nbsp;</option>
                                <option value="dp_stage2_calc" {{ serInd('dp_stage2_calc', $param->qdata4) }}>Stage-2
                                    DP (Calc) &nbsp;</option>
                                <option value="dp_total" {{ serInd('dp_total', $param->qdata4) }}> DP Total (calc)
                                    &nbsp;</option>
                                <option value="tmp_2nd_pass" {{ serInd('tmp_2nd_pass', $param->qdata4) }}> 2nd Pass
                                    TMP &nbsp;</option>
                                <option value="tot_recovery" {{ serInd('tot_recovery', $param->qdata4) }}> Total
                                    Recovery (Calc) &nbsp;</option>
                                <option value="perm_flux" {{ serInd('perm_flux', $param->qdata4) }}>2nd Pass Permeate
                                    Flux &nbsp;</option>
                                <option value="tds_at_mem_surf" {{ serInd('tds_at_mem_surf', $param->qdata4) }}>TDS
                                    at Membrane Surface (Calc) &nbsp;</option>
                                <option value="net_drv_pres" {{ serInd('net_drv_pres', $param->qdata4) }}> 2nd Pass
                                    NDP: TMP - Δπ &nbsp;</option>
                                <option value="t_cor_salt_pas" {{ serInd('t_cor_salt_pas', $param->qdata4) }}> Total
                                    Salt Passage &nbsp;</option>
                                <option value="tot_permeab" {{ serInd('tot_permeab', $param->qdata4) }}>Total
                                    Permeability &nbsp;</option>
                                <option value="feed_wtr_temp" {{ serInd('feed_wtr_temp', $param->qdata4) }}>Feed
                                    Water Temperature &nbsp;</option>
                                <option value="feed_cond" {{ serInd('feed_cond', $param->qdata4) }}>Feed Water EC
                                    &nbsp;</option>
                                <option value="stage2_cond" {{ serInd('stage2_cond', $param->qdata4) }}>Stage-2
                                    Permeate EC &nbsp;</option>
                                <option value="permeate_cond" {{ serInd('permeate_cond', $param->qdata4) }}> Permeate
                                    Common EC&nbsp;</option>
                                <option value="feed_pres" {{ serInd('feed_pres', $param->qdata4) }}> Feed Pressure
                                    PT-105 &nbsp;</option>
                                <option value="feed_pres_2ndstg" {{ serInd('feed_pres_2ndstg', $param->qdata4) }}>
                                    Stage-2 Feed Pressure PT-110 &nbsp;</option>
                                <option value="brine_pres_2ndstg" {{ serInd('brine_pres_2ndstg', $param->qdata4) }}>
                                    Stage-2 Brine Pressure PT-113 &nbsp;</option>
                                <option value="stage1_per_pres" {{ serInd('stage1_per_pres', $param->qdata4) }}>
                                    Stage-1 Permeate Pressure PIT-107 &nbsp;</option>
                                <option value="totalfeed_calc" {{ serInd('totalfeed_calc', $param->qdata4) }}>Total
                                    Feed Flow FI-903 &nbsp;</option>
                                <option value="stage1_perm_flow" {{ serInd('stage1_perm_flow', $param->qdata4) }}>
                                    Stage-1 Permeate Flow FIT-108 &nbsp;</option>
                                <option value="stage2_perm_flow" {{ serInd('stage2_perm_flow', $param->qdata4) }}>
                                    Stage-2 Permeate Flow FIT-111 &nbsp;</option>
                                <option value="total_perm_flow" {{ serInd('total_perm_flow', $param->qdata4) }}>Total
                                    Permeate Flow (Calc) &nbsp;</option>
                                <option value="brine_flowrate" {{ serInd('brine_flowrate', $param->qdata4) }}> Brine
                                    Flowrate FIT-114 &nbsp;</option>
                                <option value="brine_rofeed" {{ serInd('brine_rofeed', $param->qdata4) }}> Brine to
                                    RO Feed header&nbsp;</option>
                                <option value="brine_nl" {{ serInd('brine_nl', $param->qdata4) }}>2nd Pass Brine Flow
                                    to North Line &nbsp;</option>
                                <option value="brine_sl" {{ serInd('brine_sl', $param->qdata4) }}>2nd Pass Brine Flow
                                    to South Line &nbsp;</option>
                            </select>
                        </div>
                    </div>
                </td>
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
                                <div class="modal-header modelheader4" style="background-color: rgb(197, 17, 44);">
                                    <h5 class="modal-title" id="seriestitle4">Series 4: Stage-1 DP (Calc) &nbsp;</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <div class="row mb-2">
                                        <label for="chart_type4" class="col-sm-4 col-form-label">Chart Type</label>
                                        <div class="col-sm-4">
                                            <select class="chart_render form-control form-select" id="chart_type4">
                                                <option value="spline" selected="">Line</option>
                                                <option value="areaspline">Area </option>
                                                <option value="column">Column </option>
                                                <option value="scatter">Scatter </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <label for="line_width4" class="col-sm-4 col-form-label">Line Width</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="line_width4" class="chart_render form-control"
                                                value="1.5" min="0" max="4" step="0.1">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker4" class="col-sm-4 col-form-label">Marker Weight</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="marker4" class="chart_render form-control"
                                                value="2.5" min="0" step="0.1" max="4">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker_shape4" class="col-sm-4 col-form-label">Marker
                                            Shape</label>
                                        <div class="col-sm-4">
                                            <select id="marker_shape4" class="chart_render form-control form-select">
                                                <option value="circle">Circle </option>
                                                <option value="square">Square </option>
                                                <option value="triangle" selected="">Trianlge </option>
                                                <option value="diamond">Diamond </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="input-group">

                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="dt_label4">
                                            <label for="dt_label4" class="form-check-label col-auto">&nbsp; Show Data
                                                Labels</label>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="input-group">
                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="y_axis4" checked="">
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

                    </div>
                </td>


                <td style="text-align: center; background-color: black; color:#3edbf0; "> <span
                        id="data_length4">90</span></td>
                <td style="text-align: center; background-color: black; color:#f21170; "> <span
                        id="data_max4">3.08</span> </td>
                <td style="text-align: center; background-color: black; color:#00ead3; "> <span
                        id="data_min4">0.04</span> </td>
                <td style="text-align: center; background-color: black; color:#fff600; "> <span
                        id="data_avg4">2.33</span> </td>
                <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit4">
                        bar</span> </td>

            </tr>
            <tr class="tr5 table-light">
                <td>
                    <div class="input-group">
                        <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line5"
                                <?php if ($param->isline5 == 'true') {
                                    echo 'checked';
                                } ?>>
                            &nbsp;5 &nbsp;<input type="color" id="pen5" name="pen5" value="#dde105"
                                class="chart_render series-color"> &nbsp; </div>
                        <div class="col-auto">
                            <select class="query form-control form-control-sm form-select" id="ufdata5">
                                <option value="cip" {{ serInd('cip', $param->qdata5) }}> CIP &nbsp;</option>
                                <option value="dp_stage1_calc" {{ serInd('dp_stage1_calc', $param->qdata5) }}>Stage-1
                                    DP (Calc) &nbsp;</option>
                                <option value="dp_stage2_calc" {{ serInd('dp_stage2_calc', $param->qdata5) }}>Stage-2
                                    DP (Calc) &nbsp;</option>
                                <option value="dp_total" {{ serInd('dp_total', $param->qdata5) }}> DP Total (calc)
                                    &nbsp;</option>
                                <option value="tmp_2nd_pass" {{ serInd('tmp_2nd_pass', $param->qdata5) }}> 2nd Pass
                                    TMP &nbsp;</option>
                                <option value="tot_recovery" {{ serInd('tot_recovery', $param->qdata5) }}> Total
                                    Recovery (Calc) &nbsp;</option>
                                <option value="perm_flux" {{ serInd('perm_flux', $param->qdata5) }}>2nd Pass Permeate
                                    Flux &nbsp;</option>
                                <option value="tds_at_mem_surf" {{ serInd('tds_at_mem_surf', $param->qdata5) }}>TDS
                                    at Membrane Surface (Calc) &nbsp;</option>
                                <option value="net_drv_pres" {{ serInd('net_drv_pres', $param->qdata5) }}> 2nd Pass
                                    NDP: TMP - Δπ &nbsp;</option>
                                <option value="t_cor_salt_pas" {{ serInd('t_cor_salt_pas', $param->qdata5) }}> Total
                                    Salt Passage &nbsp;</option>
                                <option value="tot_permeab" {{ serInd('tot_permeab', $param->qdata5) }}>Total
                                    Permeability &nbsp;</option>
                                <option value="feed_wtr_temp" {{ serInd('feed_wtr_temp', $param->qdata5) }}>Feed
                                    Water Temperature &nbsp;</option>
                                <option value="feed_cond" {{ serInd('feed_cond', $param->qdata5) }}>Feed Water EC
                                    &nbsp;</option>
                                <option value="stage2_cond" {{ serInd('stage2_cond', $param->qdata5) }}>Stage-2
                                    Permeate EC &nbsp;</option>
                                <option value="permeate_cond" {{ serInd('permeate_cond', $param->qdata5) }}> Permeate
                                    Common EC&nbsp;</option>
                                <option value="feed_pres" {{ serInd('feed_pres', $param->qdata5) }}> Feed Pressure
                                    PT-105 &nbsp;</option>
                                <option value="feed_pres_2ndstg" {{ serInd('feed_pres_2ndstg', $param->qdata5) }}>
                                    Stage-2 Feed Pressure PT-110 &nbsp;</option>
                                <option value="brine_pres_2ndstg" {{ serInd('brine_pres_2ndstg', $param->qdata5) }}>
                                    Stage-2 Brine Pressure PT-113 &nbsp;</option>
                                <option value="stage1_per_pres" {{ serInd('stage1_per_pres', $param->qdata5) }}>
                                    Stage-1 Permeate Pressure PIT-107 &nbsp;</option>
                                <option value="totalfeed_calc" {{ serInd('totalfeed_calc', $param->qdata5) }}>Total
                                    Feed Flow FI-903 &nbsp;</option>
                                <option value="stage1_perm_flow" {{ serInd('stage1_perm_flow', $param->qdata5) }}>
                                    Stage-1 Permeate Flow FIT-108 &nbsp;</option>
                                <option value="stage2_perm_flow" {{ serInd('stage2_perm_flow', $param->qdata5) }}>
                                    Stage-2 Permeate Flow FIT-111 &nbsp;</option>
                                <option value="total_perm_flow" {{ serInd('total_perm_flow', $param->qdata5) }}>Total
                                    Permeate Flow (Calc) &nbsp;</option>
                                <option value="brine_flowrate" {{ serInd('brine_flowrate', $param->qdata5) }}> Brine
                                    Flowrate FIT-114 &nbsp;</option>
                                <option value="brine_rofeed" {{ serInd('brine_rofeed', $param->qdata5) }}> Brine to
                                    RO Feed header&nbsp;</option>
                                <option value="brine_nl" {{ serInd('brine_nl', $param->qdata5) }}>2nd Pass Brine Flow
                                    to North Line &nbsp;</option>
                                <option value="brine_sl" {{ serInd('brine_sl', $param->qdata5) }}>2nd Pass Brine Flow
                                    to South Line &nbsp;</option>
                            </select>
                        </div>
                    </div>
                </td>
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
                                <div class="modal-header modelheader5" style="background-color: rgb(221, 225, 5);">
                                    <h5 class="modal-title" id="seriestitle5">Series 5: Stage-2 DP (Calc) &nbsp;</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <div class="row mb-2">
                                        <label for="chart_type5" class="col-sm-4 col-form-label">Chart Type</label>
                                        <div class="col-sm-4">
                                            <select class="chart_render form-control form-select" id="chart_type5">
                                                <option value="spline" selected="">Line</option>
                                                <option value="areaspline">Area </option>
                                                <option value="column">Column </option>
                                                <option value="scatter">Scatter </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <label for="line_width5" class="col-sm-4 col-form-label">Line Width</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="line_width5" class="chart_render form-control"
                                                value="1.2" min="0" max="4" step="0.1">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker5" class="col-sm-4 col-form-label">Marker Weight</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="marker5" class="chart_render form-control"
                                                value="4" min="0" step="0.1" max="4">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker_shape5" class="col-sm-4 col-form-label">Marker
                                            Shape</label>
                                        <div class="col-sm-4">
                                            <select id="marker_shape5" class="chart_render form-control form-select">
                                                <option value="circle">Circle </option>
                                                <option value="square">Square </option>
                                                <option value="triangle" selected="">Trianlge </option>
                                                <option value="diamond">Diamond </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="input-group">

                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="dt_label5">
                                            <label for="dt_label5" class="form-check-label col-auto">&nbsp; Show Data
                                                Labels</label>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="input-group">
                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="y_axis5" checked="">
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




                    </div>
                </td>


                <td style="text-align: center; background-color: black; color:#3edbf0; "> <span
                        id="data_length5">90</span></td>
                <td style="text-align: center; background-color: black; color:#f21170; "> <span
                        id="data_max5">2.53</span> </td>
                <td style="text-align: center; background-color: black; color:#00ead3; "> <span
                        id="data_min5">-0.18</span> </td>
                <td style="text-align: center; background-color: black; color:#fff600; "> <span
                        id="data_avg5">1.82</span> </td>
                <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit5">
                        bar</span> </td>

            </tr>

            <tr class="tr6 table-secondary">
                <td>
                    <div class="input-group">
                        <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line6"
                                <?php if ($param->isline6 == 'true') {
                                    echo 'checked';
                                } ?>>
                            &nbsp;6 &nbsp;<input type="color" id="pen6" name="pen6" value="#e27d08"
                                class="chart_render series-color" style="display: none;"> &nbsp; </div>
                        <div class="col-auto">
                            <select class="query form-control form-control-sm form-select" id="ufdata6"
                                style="display: none;">
                                <option value="cip" {{ serInd('cip', $param->qdata6) }}> CIP &nbsp;</option>
                                <option value="dp_stage1_calc" {{ serInd('dp_stage1_calc', $param->qdata6) }}>Stage-1
                                    DP (Calc) &nbsp;</option>
                                <option value="dp_stage2_calc" {{ serInd('dp_stage2_calc', $param->qdata6) }}>Stage-2
                                    DP (Calc) &nbsp;</option>
                                <option value="dp_total" {{ serInd('dp_total', $param->qdata6) }}> DP Total (calc)
                                    &nbsp;</option>
                                <option value="tmp_2nd_pass" {{ serInd('tmp_2nd_pass', $param->qdata6) }}> 2nd Pass
                                    TMP &nbsp;</option>
                                <option value="tot_recovery" {{ serInd('tot_recovery', $param->qdata6) }}> Total
                                    Recovery (Calc) &nbsp;</option>
                                <option value="perm_flux" {{ serInd('perm_flux', $param->qdata6) }}>2nd Pass Permeate
                                    Flux &nbsp;</option>
                                <option value="tds_at_mem_surf" {{ serInd('tds_at_mem_surf', $param->qdata6) }}>TDS
                                    at Membrane Surface (Calc) &nbsp;</option>
                                <option value="net_drv_pres" {{ serInd('net_drv_pres', $param->qdata6) }}> 2nd Pass
                                    NDP: TMP - Δπ &nbsp;</option>
                                <option value="t_cor_salt_pas" {{ serInd('t_cor_salt_pas', $param->qdata6) }}> Total
                                    Salt Passage &nbsp;</option>
                                <option value="tot_permeab" {{ serInd('tot_permeab', $param->qdata6) }}>Total
                                    Permeability &nbsp;</option>
                                <option value="feed_wtr_temp" {{ serInd('feed_wtr_temp', $param->qdata6) }}>Feed
                                    Water Temperature &nbsp;</option>
                                <option value="feed_cond" {{ serInd('feed_cond', $param->qdata6) }}>Feed Water EC
                                    &nbsp;</option>
                                <option value="stage2_cond" {{ serInd('stage2_cond', $param->qdata6) }}>Stage-2
                                    Permeate EC &nbsp;</option>
                                <option value="permeate_cond" {{ serInd('permeate_cond', $param->qdata6) }}> Permeate
                                    Common EC&nbsp;</option>
                                <option value="feed_pres" {{ serInd('feed_pres', $param->qdata6) }}> Feed Pressure
                                    PT-105 &nbsp;</option>
                                <option value="feed_pres_2ndstg" {{ serInd('feed_pres_2ndstg', $param->qdata6) }}>
                                    Stage-2 Feed Pressure PT-110 &nbsp;</option>
                                <option value="brine_pres_2ndstg" {{ serInd('brine_pres_2ndstg', $param->qdata6) }}>
                                    Stage-2 Brine Pressure PT-113 &nbsp;</option>
                                <option value="stage1_per_pres" {{ serInd('stage1_per_pres', $param->qdata6) }}>
                                    Stage-1 Permeate Pressure PIT-107 &nbsp;</option>
                                <option value="totalfeed_calc" {{ serInd('totalfeed_calc', $param->qdata6) }}>Total
                                    Feed Flow FI-903 &nbsp;</option>
                                <option value="stage1_perm_flow" {{ serInd('stage1_perm_flow', $param->qdata6) }}>
                                    Stage-1 Permeate Flow FIT-108 &nbsp;</option>
                                <option value="stage2_perm_flow" {{ serInd('stage2_perm_flow', $param->qdata6) }}>
                                    Stage-2 Permeate Flow FIT-111 &nbsp;</option>
                                <option value="total_perm_flow" {{ serInd('total_perm_flow', $param->qdata6) }}>Total
                                    Permeate Flow (Calc) &nbsp;</option>
                                <option value="brine_flowrate" {{ serInd('brine_flowrate', $param->qdata6) }}> Brine
                                    Flowrate FIT-114 &nbsp;</option>
                                <option value="brine_rofeed" {{ serInd('brine_rofeed', $param->qdata6) }}> Brine to
                                    RO Feed header&nbsp;</option>
                                <option value="brine_nl" {{ serInd('brine_nl', $param->qdata6) }}>2nd Pass Brine Flow
                                    to North Line &nbsp;</option>
                                <option value="brine_sl" {{ serInd('brine_sl', $param->qdata6) }}>2nd Pass Brine Flow
                                    to South Line &nbsp;</option>
                            </select>
                        </div>
                    </div>
                </td>
                <td style="text-align: center;">

                    <!-- Button trigger modal series 6-->
                    <span id="panel6" style="display: none;">
                        <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal"
                            data-bs-target="#modal-series6">
                            <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
                    <!-- Modal series 6-->
                    <div class="modal fade" id="modal-series6" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header modelheader6" style="background-color: rgb(226, 125, 8);">
                                    <h5 class="modal-title" id="seriestitle6">Series 6: Stage-1 DPI-906 &nbsp;</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <div class="row mb-2">
                                        <label for="chart_type6" class="col-sm-4 col-form-label">Chart Type</label>
                                        <div class="col-sm-4">
                                            <select class="chart_render form-control form-select" id="chart_type6">
                                                <option value="spline" selected="">Line</option>
                                                <option value="areaspline">Area </option>
                                                <option value="column">Column </option>
                                                <option value="scatter">Scatter </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <label for="line_width6" class="col-sm-4 col-form-label">Line Width</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="line_width6" class="chart_render form-control"
                                                value="1.5" min="0" max="4" step="0.1">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker6" class="col-sm-4 col-form-label">Marker Weight</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="marker6" class="chart_render form-control"
                                                value="2.5" min="0" step="0.1" max="4">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker_shape6" class="col-sm-4 col-form-label">Marker
                                            Shape</label>
                                        <div class="col-sm-4">
                                            <select id="marker_shape6" class="chart_render form-control form-select">
                                                <option value="circle">Circle </option>
                                                <option value="square">Square </option>
                                                <option value="triangle" selected="">Trianlge </option>
                                                <option value="diamond">Diamond </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="input-group">

                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="dt_label6">
                                            <label for="dt_label6" class="form-check-label col-auto">&nbsp; Show Data
                                                Labels</label>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="input-group">
                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="y_axis6" checked="">
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
                <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit6"> </span>
                </td>

            </tr>

            <tr class="tr7 table-secondary">
                <td>
                    <div class="input-group">
                        <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line7"
                                <?php if ($param->isline7 == 'true') {
                                    echo 'checked';
                                } ?>>
                            &nbsp;7 &nbsp;<input type="color" id="pen7" name="pen7" value="#0717ed"
                                class="chart_render series-color" style="display: none;"> &nbsp; </div>
                        <div class="col-auto">
                            <select class="query form-control form-control-sm form-select" id="ufdata7"
                                style="display: none;">
                                <option value="cip" {{ serInd('cip', $param->qdata7) }}> CIP &nbsp;</option>
                                <option value="dp_stage1_calc" {{ serInd('dp_stage1_calc', $param->qdata7) }}>Stage-1
                                    DP (Calc) &nbsp;</option>
                                <option value="dp_stage2_calc" {{ serInd('dp_stage2_calc', $param->qdata7) }}>Stage-2
                                    DP (Calc) &nbsp;</option>
                                <option value="dp_total" {{ serInd('dp_total', $param->qdata7) }}> DP Total (calc)
                                    &nbsp;</option>
                                <option value="tmp_2nd_pass" {{ serInd('tmp_2nd_pass', $param->qdata7) }}> 2nd Pass
                                    TMP &nbsp;</option>
                                <option value="tot_recovery" {{ serInd('tot_recovery', $param->qdata7) }}> Total
                                    Recovery (Calc) &nbsp;</option>
                                <option value="perm_flux" {{ serInd('perm_flux', $param->qdata7) }}>2nd Pass Permeate
                                    Flux &nbsp;</option>
                                <option value="tds_at_mem_surf" {{ serInd('tds_at_mem_surf', $param->qdata7) }}>TDS
                                    at Membrane Surface (Calc) &nbsp;</option>
                                <option value="net_drv_pres" {{ serInd('net_drv_pres', $param->qdata7) }}> 2nd Pass
                                    NDP: TMP - Δπ &nbsp;</option>
                                <option value="t_cor_salt_pas" {{ serInd('t_cor_salt_pas', $param->qdata7) }}> Total
                                    Salt Passage &nbsp;</option>
                                <option value="tot_permeab" {{ serInd('tot_permeab', $param->qdata7) }}>Total
                                    Permeability &nbsp;</option>
                                <option value="feed_wtr_temp" {{ serInd('feed_wtr_temp', $param->qdata7) }}>Feed
                                    Water Temperature &nbsp;</option>
                                <option value="feed_cond" {{ serInd('feed_cond', $param->qdata7) }}>Feed Water EC
                                    &nbsp;</option>
                                <option value="stage2_cond" {{ serInd('stage2_cond', $param->qdata7) }}>Stage-2
                                    Permeate EC &nbsp;</option>
                                <option value="permeate_cond" {{ serInd('permeate_cond', $param->qdata7) }}> Permeate
                                    Common EC&nbsp;</option>
                                <option value="feed_pres" {{ serInd('feed_pres', $param->qdata7) }}> Feed Pressure
                                    PT-105 &nbsp;</option>
                                <option value="feed_pres_2ndstg" {{ serInd('feed_pres_2ndstg', $param->qdata7) }}>
                                    Stage-2 Feed Pressure PT-110 &nbsp;</option>
                                <option value="brine_pres_2ndstg" {{ serInd('brine_pres_2ndstg', $param->qdata7) }}>
                                    Stage-2 Brine Pressure PT-113 &nbsp;</option>
                                <option value="stage1_per_pres" {{ serInd('stage1_per_pres', $param->qdata7) }}>
                                    Stage-1 Permeate Pressure PIT-107 &nbsp;</option>
                                <option value="totalfeed_calc" {{ serInd('totalfeed_calc', $param->qdata7) }}>Total
                                    Feed Flow FI-903 &nbsp;</option>
                                <option value="stage1_perm_flow" {{ serInd('stage1_perm_flow', $param->qdata7) }}>
                                    Stage-1 Permeate Flow FIT-108 &nbsp;</option>
                                <option value="stage2_perm_flow" {{ serInd('stage2_perm_flow', $param->qdata7) }}>
                                    Stage-2 Permeate Flow FIT-111 &nbsp;</option>
                                <option value="total_perm_flow" {{ serInd('total_perm_flow', $param->qdata7) }}>Total
                                    Permeate Flow (Calc) &nbsp;</option>
                                <option value="brine_flowrate" {{ serInd('brine_flowrate', $param->qdata7) }}> Brine
                                    Flowrate FIT-114 &nbsp;</option>
                                <option value="brine_rofeed" {{ serInd('brine_rofeed', $param->qdata7) }}> Brine to
                                    RO Feed header&nbsp;</option>
                                <option value="brine_nl" {{ serInd('brine_nl', $param->qdata7) }}>2nd Pass Brine Flow
                                    to North Line &nbsp;</option>
                                <option value="brine_sl" {{ serInd('brine_sl', $param->qdata7) }}>2nd Pass Brine Flow
                                    to South Line &nbsp;</option>
                            </select>
                        </div>
                    </div>
                </td>
                <td style="text-align: center;">

                    <!-- Button trigger modal series 5-->
                    <span id="panel7" style="display: none;">
                        <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal"
                            data-bs-target="#modal-series7">
                            <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
                    <!-- Modal series 5-->
                    <div class="modal fade" id="modal-series7" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header modelheader7" style="background-color: rgb(7, 23, 237);">
                                    <h5 class="modal-title" id="seriestitle7">Series 7: Stage-1 DPI-906 &nbsp;</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="row mb-2">
                                        <label for="chart_type7" class="col-sm-4 col-form-label">Chart Type</label>
                                        <div class="col-sm-4">
                                            <select class="chart_render form-control form-select" id="chart_type7">
                                                <option value="spline" selected="">Line</option>
                                                <option value="areaspline">Area </option>
                                                <option value="column">Column </option>
                                                <option value="scatter">Scatter </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <label for="line_width7" class="col-sm-4 col-form-label">Line Width</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="line_width7" class="chart_render form-control"
                                                value="1.5" min="0" max="4" step="0.1">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker7" class="col-sm-4 col-form-label">Marker Weight</label>
                                        <div class="col-sm-4">
                                            <input type="number" id="marker7" class="chart_render form-control"
                                                value="2.5" min="0" step="0.1" max="4">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="marker_shape7" class="col-sm-4 col-form-label">Marker
                                            Shape</label>
                                        <div class="col-sm-4">
                                            <select id="marker_shape7" class="chart_render form-control form-select">
                                                <option value="circle">Circle </option>
                                                <option value="square">Square </option>
                                                <option value="triangle" selected="">Trianlge </option>
                                                <option value="diamond">Diamond </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="input-group">

                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="dt_label7">
                                            <label for="dt_label7" class="form-check-label col-auto">&nbsp; Show
                                                Data Labels</label>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="input-group">
                                            <input type="checkbox" class="chart_render form-check-input col-auto"
                                                id="y_axis7">
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




                    </div>
                </td>


                <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length7"
                        style="display: none;"></span></td>
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


    <div style="margin-bottom:100px">

    </div>

    <!-- Modal chart global settings-->
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
                                <option value="a" {{ serInd('a', $param->skid1) }}> 43-A</option>
                                <option value="b" {{ serInd('b', $param->skid1) }}>43-B</option>
                                <option value="c" {{ serInd('c', $param->skid1) }}>43-C</option>
                                <option value="d" {{ serInd('d', $param->skid1) }}>43-D</option>
                                <option value="e" {{ serInd('e', $param->skid1) }}>43-E</option>
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
                            <a href="#">
                                <button id="trigger_tb" class="btn badge-light3d btn-sm">
                                    <span style="font-size: 14px;"> 📦 </span> Data Table</button>
                            </a>
                        </div>
                    </div>
            </ul>
        </div>
    </div>
</nav>




    <script type="text/javascript" src="{{ asset('js/stream/ro2_normalization.js') }}"></script>
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
