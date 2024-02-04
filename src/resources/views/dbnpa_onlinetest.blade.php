<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href={{asset('icons/pulse.png')}} type="image/png" sizes="32x32">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/com.css') }}" rel="stylesheet">
  <script type="text/javascript" src="{{asset('js/notiflix 2.7.0/notiflix-2.7.0.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('js/notiflix 2.7.0/notiflix-aio-2.7.0.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script type="text/javascript" src="{{asset('js/highcharts11/highcharts.js') }}"></script>
  <script type="text/javascript" src="{{asset('js/highcharts11/highcharts-3d.js') }}"></script>
  <script type="text/javascript" src="{{asset('js/highcharts11/modules/exporting.js') }}"></script>
  <script type="text/javascript" src="{{asset('js/highcharts11/modules/offline-exporting.js') }}"></script>
  <script type="text/javascript" src="{{asset('js/highcharts11/modules/accessibility.js') }}"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script type="text/javascript" src="{{asset('js/com.js') }}"></script>
<title> DBNPA Online Dosing Test </title>
</head>
<body style="font-family: calibri;" class="">
    <style>
    .pheading{
        color:#636e72; background-color:#b2bec3; font-weight:bold;
    }
       
        </style>
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
  <tr class="tr1 table-light">      
                  <td><div class="input-group">
                  <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line1" checked="">
                   &nbsp;1 &nbsp;<input type="color" id="pen1" name="pen1" value="#d99608" class="chart_render series-color"> &nbsp; </div>
                  <div class="col-auto"> 
  <select class="query form-control form-control-sm form-select" id="ufdata1">
    <option value="x" disabled class="pheading">RO Feed Chemicals Dosing   &nbsp;</option>
    <option value="north_dbnpa_flow" >DBNPA North Line Flow &nbsp;</option>
    <option value="south_dbnpa_flow">DBNPA South Line Flow   &nbsp;</option>
    <option value="north_dbnpa_rate" >DBNPA North Line Dosing rate &nbsp;</option>
    <option value="south_dbnpa_rate">DBNPA South Line Dosing rate &nbsp;</option>
    <option value="north_sbs_flow" >SBS North Line Flow &nbsp;</option>
    <option value="south_sbs_flow">SBS South Line Flow   &nbsp;</option>
    <option value="north_sbs_rate" >SBS North Line Dosing rate &nbsp;</option>
    <option value="south_sbs_rate">SBS South Line Dosing rate &nbsp;</option>
    <option value="none" disabled class="pheading">RO skids DPI   &nbsp;</option>
    <option value="a_dpi" selected>41A DPI-906   &nbsp;</option>
    <option value="b_dpi">41B DPI-906   &nbsp;</option>
    <option value="c_dpi">41C DPI-906   &nbsp;</option>
    <option value="d_dpi">41D DPI-906   &nbsp;</option>
    <option value="e_dpi">41E DPI-906   &nbsp;</option>
    <option value="f_dpi">41F DPI-906   &nbsp;</option>
    <option value="g_dpi">41G DPI-906   &nbsp;</option>
    <option value="h_dpi">41H DPI-906   &nbsp;</option>
    <option value="i_dpi">41I DPI-906   &nbsp;</option>
    <option value="j_dpi">41J DPI-906   &nbsp;</option>
    <option value="k_dpi">41K DPI-906   &nbsp;</option>
    <option value="x" class="pheading" disabled>Salt Rejection  &nbsp;</option>
    <option value="a_saltrejection">41A Salt Rejection &nbsp;</option>
    <option value="b_saltrejection">41B Salt Rejection &nbsp;</option>
    <option value="c_saltrejection">41C Salt Rejection &nbsp;</option>
    <option value="d_saltrejection">41D Salt Rejection &nbsp;</option>
    <option value="e_saltrejection">41E Salt Rejection &nbsp;</option>
    <option value="f_saltrejection">41F Salt Rejection &nbsp;</option>
    <option value="g_saltrejection">41G Salt Rejection &nbsp;</option>
    <option value="h_saltrejection">41H Salt Rejection &nbsp;</option>
    <option value="i_saltrejection">41I Salt Rejection &nbsp;</option>
    <option value="j_saltrejection">41J Salt Rejection &nbsp;</option>
    <option value="k_saltrejection">41K Salt Rejection &nbsp;</option>
    <option value="x" class="pheading" disabled>RO Skids Rear EC  &nbsp;</option>
    <option value="a_rear_ec">41A Rear EC &nbsp;</option>
    <option value="b_rear_ec">41B Rear EC &nbsp;</option>
    <option value="c_rear_ec">41C Rear EC &nbsp;</option>
    <option value="d_rear_ec">41D Rear EC &nbsp;</option>
    <option value="e_rear_ec">41E Rear EC &nbsp;</option>
    <option value="f_rear_ec">41F Rear EC &nbsp;</option>
    <option value="g_rear_ec">41G Rear EC &nbsp;</option>
    <option value="h_rear_ec">41H Rear EC &nbsp;</option>
    <option value="i_rear_ec">41I Rear EC &nbsp;</option>
    <option value="j_rear_ec">41J Rear EC &nbsp;</option>
    <option value="k_rear_ec">41K Rear EC &nbsp;</option>
    <option value="x" class="pheading" disabled>RO Feed &nbsp;</option>
    <option value="north_rofeed"> RO North Line Flow &nbsp;</option>
    <option value="south_rofeed">RO South Line Flow &nbsp;</option>
    <option value="north_orp206">North Line ORP-206 &nbsp;</option>
    <option value="north_orp_202">North Line ORP-202 &nbsp;</option>
    <option value="south_orp206">South Line ORP-206 &nbsp;</option>
    <option value="south_orp202">South Line ORP-202 &nbsp;</option>
    <option value="north_temp">North Line Temp. &nbsp;</option>
    <option value="south_temp">South Line Temp.&nbsp;</option>
    <option value="north_ec">North Line EC &nbsp;</option>
    <option value="south_ec">South Line EC &nbsp;</option>
    <option value="plant_capacity">Plant Capacity Factor &nbsp;</option>
   </select>
                      </div>
                  </div></td><td style="text-align: center;">
                       
                                            <!-- Button trigger modal series 1-->
                                      <span id="panel1">
                                      <span class="model1 badge badge-light3d" data-bs-toggle="modal" data-bs-target="#modal1">
                                      <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i> </span> </span>
  
  
  
        <!-- Modal series 1-->
  <div class="modal fade" id="modal1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header modelheader1" style="background-color: rgb(217, 150, 8);">
          <h5 class="modal-title" id="seriestitle1">&nbsp;</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
  
  
    <div class="row mb-2">
      <label for="chart_type1" class="chart_render col-sm-4 col-form-label">Chart Type</label>
      <div class="col-sm-4">
        <select class="chart_render form-control form-select" id="chart_type1">
            <option value="spline" selected="">Line</option>
            <option value="areaspline" >Area </option>          
            <option value="column">Column </option> 
            <option value="scatter" >Scatter </option>          
          </select>  
      </div>
    </div>
  
    <div class="row mb-2">
      <label for="line_width1" class="col-sm-4 col-form-label">Line Width</label>
      <div class="col-sm-4">
      <input type="number" id="line_width1" class="chart_render rednder form-control" value="2.0" min="0" max="4" step="0.1">  
      </div>
    </div>
     <div class="row mb-2">
      <label for="marker1" class="col-sm-4 col-form-label">Marker Weight</label>
      <div class="col-sm-4">
      <input type="number" id="marker1" class="chart_render form-control" value="0.5" min="0" step="0.1" max="4"> 
      </div>
    </div>
     <div class="row mb-2">
      <label for="marker_shape1" class="col-sm-4 col-form-label">Marker Shape</label>
      <div class="col-sm-4">
       <select id="marker_shape1" class="chart_render form-control form-select">
            <option value="circle" selected="">Circle </option>
            <option value="square">Square </option>
            <option value="triangle">Trianlge </option>
            <option value="diamond">Diamond </option>
      </select>
      </div>
    </div>
  <div class="row mb-2">
      <div class="input-group">
  
       <input type="checkbox" class="chart_render form-check-input col-auto" id="dt_label1">  
       <label for="dt_label1" class="form-check-label col-auto">&nbsp; Show Data Labels</label>
      </div>
    </div>
  
  <div class="row mb-2">
      <div class="input-group">
       <input type="checkbox" class="chart_render form-check-input col-auto" id="y_axis1" checked="">
       <label for="y_axis1" class="form-check-label col-auto">&nbsp; Show Y-axis</label>
      </div>
    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>
  <!-- modal end here   -->
                   </div></td>
                  
                     
                  <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length1">719</span></td>
                  <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max1">50.0</span> </td>
                  <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min1">0.3</span> </td>
                  <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg1">1.1</span> </td>
                  <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit1"> NTU</span> </td>
                  
        
  </tr>
  <tr class="tr2 table-light">      
                  <td><div class="input-group">
                  <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line2" checked=""> 
                    &nbsp;2 &nbsp;<input type="color" id="pen2" name="pen2" value="#0652DD" class="chart_render series-color"> &nbsp; </div>
                  <div class="col-auto"> 
                   <select class="query form-control form-control-sm form-select" id="ufdata2">
                    <option value="x" disabled class="pheading">RO Feed Chemicals Dosing   &nbsp;</option>
    <option value="north_dbnpa_flow" >DBNPA North Line Flow &nbsp;</option>
    <option value="south_dbnpa_flow" >DBNPA South Line Flow   &nbsp;</option>
    <option value="north_dbnpa_rate" >DBNPA North Line Dosing rate &nbsp;</option>
    <option value="south_dbnpa_rate">DBNPA South Line Dosing rate &nbsp;</option>
    <option value="north_sbs_flow" >SBS North Line Flow &nbsp;</option>
    <option value="south_sbs_flow">SBS South Line Flow   &nbsp;</option>
    <option value="north_sbs_rate" >SBS North Line Dosing rate &nbsp;</option>
    <option value="south_sbs_rate">SBS South Line Dosing rate &nbsp;</option>
    <option value="none" disabled class="pheading">RO skids DPI   &nbsp;</option>
    <option value="a_dpi">41A DPI-906   &nbsp;</option>
    <option value="b_dpi" selected="">41B DPI-906   &nbsp;</option>
    <option value="c_dpi">41C DPI-906   &nbsp;</option>
    <option value="d_dpi">41D DPI-906   &nbsp;</option>
    <option value="e_dpi">41E DPI-906   &nbsp;</option>
    <option value="f_dpi">41F DPI-906   &nbsp;</option>
    <option value="g_dpi">41G DPI-906   &nbsp;</option>
    <option value="h_dpi">41H DPI-906   &nbsp;</option>
    <option value="i_dpi">41I DPI-906   &nbsp;</option>
    <option value="j_dpi">41J DPI-906   &nbsp;</option>
    <option value="k_dpi">41K DPI-906   &nbsp;</option>
    <option value="x" class="pheading" disabled>Salt Rejection  &nbsp;</option>
    <option value="a_saltrejection">41A Salt Rejection &nbsp;</option>
    <option value="b_saltrejection">41B Salt Rejection &nbsp;</option>
    <option value="c_saltrejection">41C Salt Rejection &nbsp;</option>
    <option value="d_saltrejection">41D Salt Rejection &nbsp;</option>
    <option value="e_saltrejection">41E Salt Rejection &nbsp;</option>
    <option value="f_saltrejection">41F Salt Rejection &nbsp;</option>
    <option value="g_saltrejection">41G Salt Rejection &nbsp;</option>
    <option value="h_saltrejection">41H Salt Rejection &nbsp;</option>
    <option value="i_saltrejection">41I Salt Rejection &nbsp;</option>
    <option value="j_saltrejection">41J Salt Rejection &nbsp;</option>
    <option value="k_saltrejection">41K Salt Rejection &nbsp;</option>
    <option value="x" class="pheading" disabled>RO Skids Rear EC  &nbsp;</option>
    <option value="a_rear_ec">41A Rear EC &nbsp;</option>
    <option value="b_rear_ec">41B Rear EC &nbsp;</option>
    <option value="c_rear_ec">41C Rear EC &nbsp;</option>
    <option value="d_rear_ec">41D Rear EC &nbsp;</option>
    <option value="e_rear_ec">41E Rear EC &nbsp;</option>
    <option value="f_rear_ec">41F Rear EC &nbsp;</option>
    <option value="g_rear_ec">41G Rear EC &nbsp;</option>
    <option value="h_rear_ec">41H Rear EC &nbsp;</option>
    <option value="i_rear_ec">41I Rear EC &nbsp;</option>
    <option value="j_rear_ec">41J Rear EC &nbsp;</option>
    <option value="k_rear_ec">41K Rear EC &nbsp;</option>
    <option value="x" class="pheading" disabled>RO Feed &nbsp;</option>
    <option value="north_rofeed"> RO North Line Flow &nbsp;</option>
    <option value="south_rofeed">RO South Line Flow &nbsp;</option>
    <option value="north_orp206">North Line ORP-206 &nbsp;</option>
    <option value="north_orp_202">North Line ORP-202 &nbsp;</option>
    <option value="south_orp206">South Line ORP-206 &nbsp;</option>
    <option value="south_orp202">South Line ORP-202 &nbsp;</option>
    <option value="north_temp">North Line Temp. &nbsp;</option>
    <option value="south_temp">South Line Temp.&nbsp;</option>
    <option value="north_ec">North Line EC &nbsp;</option>
    <option value="south_ec">South Line EC &nbsp;</option>
    <option value="plant_capacity">Plant Capacity Factor &nbsp;</option>
                  </select>
                  </div>  
  
                </div>
                 </td><td style="text-align: center;">
                       
                                            <!-- Button trigger modal series 2-->
                                      <span id="panel2">
                                      <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal" data-bs-target="#modal-series2">
                                      <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
  
     <!-- Modal series 2-->
  <div class="modal fade" id="modal-series2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header modelheader2" style="background-color: rgb(48, 45, 240);">
          <h5 class="modal-title" id="seriestitle2">Series 2:  Filtrated Water pH  &nbsp;</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
    <div class="row mb-2">
      <label for="chart_type2" class="col-sm-4 col-form-label">Chart Type</label>
      <div class="col-sm-4">
        <select class="chart_render form-control form-select" id="chart_type2">
            <option value="spline" selected="">Line</option>
            <option value="areaspline">Area </option>          
            <option value="column">Column </option> 
            <option value="scatter">Scatter </option>        
          </select>  
      </div>
    </div>
  
    <div class="row mb-2">
      <label for="line_width1" class="col-sm-4 col-form-label">Line Width</label>
      <div class="col-sm-4">
      <input type="number" id="line_width2" class="chart_render form-control" value="2.0" min="0" max="4" step="0.1">  
      </div>
    </div>
     <div class="row mb-2">
      <label for="marker1" class="col-sm-4 col-form-label">Marker Weight</label>
      <div class="col-sm-4">
      <input type="number" id="marker2" class="chart_render form-control" value="0.5" min="0" step="0.1" max="4"> 
      </div>
    </div>
     <div class="row mb-2">
      <label for="marker_shape2" class="col-sm-4 col-form-label">Marker Shape</label>
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
  
       <input type="checkbox" class="chart_render form-check-input col-auto" id="dt_label2"> 
       <label for="dt_label1" class="form-check-label col-auto">&nbsp; Show Data Labels</label>
      </div>
    </div>
  
  <div class="row mb-2">
      <div class="input-group">
       <input type="checkbox" class="chart_render form-check-input col-auto" id="y_axis2" checked="">
       <label for="y_axis1" class="form-check-label col-auto">&nbsp; Show Y-axis</label>
      </div>
    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>
  <!-- modal end here   -->
                   </div></td>
                    
                  
                     
                  <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length2">719</span></td>
                  <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max2">7.7</span> </td>
                  <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min2">7.3</span> </td>
                  <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg2">7.5</span> </td>
                  <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit2"> </span> </td>
        
  </tr>
  <tr class="tr3 table-light">      
                  <td><div class="input-group">
                  <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line3" checked=""> 
                    &nbsp;3 &nbsp;<input type="color" id="pen3" name="pen3" value="#cf0202" class="chart_render series-color"> &nbsp; </div>
                  <div class="col-auto"> 
                   <select class="query form-control form-control-sm form-select" id="ufdata3">
                    <option value="north_dbnpa_flow" >DBNPA North Line Flow &nbsp;</option>
                    <option value="south_dbnpa_flow" >DBNPA South Line Flow   &nbsp;</option>
                    <option value="north_dbnpa_rate" >DBNPA North Line Dosing rate &nbsp;</option>
                    <option value="south_dbnpa_rate">DBNPA South Line Dosing rate &nbsp;</option>
                    <option value="north_sbs_flow" >SBS North Line Flow &nbsp;</option>
                    <option value="south_sbs_flow">SBS South Line Flow   &nbsp;</option>
                    <option value="north_sbs_rate" >SBS North Line Dosing rate &nbsp;</option>
                    <option value="south_sbs_rate">SBS South Line Dosing rate &nbsp;</option>
                    <option value="none" disabled class="pheading">RO skids DPI   &nbsp;</option>
                    <option value="a_dpi">41A DPI-906   &nbsp;</option>
                    <option value="b_dpi">41B DPI-906   &nbsp;</option>
                    <option value="c_dpi" selected="">41C DPI-906   &nbsp;</option>
                    <option value="d_dpi">41D DPI-906   &nbsp;</option>
                    <option value="e_dpi">41E DPI-906   &nbsp;</option>
                    <option value="f_dpi">41F DPI-906   &nbsp;</option>
                    <option value="g_dpi">41G DPI-906   &nbsp;</option>
                    <option value="h_dpi">41H DPI-906   &nbsp;</option>
                    <option value="i_dpi">41I DPI-906   &nbsp;</option>
                    <option value="j_dpi">41J DPI-906   &nbsp;</option>
                    <option value="k_dpi">41K DPI-906   &nbsp;</option>
                    <option value="x" class="pheading" disabled>Salt Rejection  &nbsp;</option>
                    <option value="a_saltrejection">41A Salt Rejection &nbsp;</option>
                    <option value="b_saltrejection">41B Salt Rejection &nbsp;</option>
                    <option value="c_saltrejection">41C Salt Rejection &nbsp;</option>
                    <option value="d_saltrejection">41D Salt Rejection &nbsp;</option>
                    <option value="e_saltrejection">41E Salt Rejection &nbsp;</option>
                    <option value="f_saltrejection">41F Salt Rejection &nbsp;</option>
                    <option value="g_saltrejection">41G Salt Rejection &nbsp;</option>
                    <option value="h_saltrejection">41H Salt Rejection &nbsp;</option>
                    <option value="i_saltrejection">41I Salt Rejection &nbsp;</option>
                    <option value="j_saltrejection">41J Salt Rejection &nbsp;</option>
                    <option value="k_saltrejection">41K Salt Rejection &nbsp;</option>
                    <option value="x" class="pheading" disabled>RO Skids Rear EC  &nbsp;</option>
                    <option value="a_rear_ec">41A Rear EC &nbsp;</option>
                    <option value="b_rear_ec">41B Rear EC &nbsp;</option>
                    <option value="c_rear_ec">41C Rear EC &nbsp;</option>
                    <option value="d_rear_ec">41D Rear EC &nbsp;</option>
                    <option value="e_rear_ec">41E Rear EC &nbsp;</option>
                    <option value="f_rear_ec">41F Rear EC &nbsp;</option>
                    <option value="g_rear_ec">41G Rear EC &nbsp;</option>
                    <option value="h_rear_ec">41H Rear EC &nbsp;</option>
                    <option value="i_rear_ec">41I Rear EC &nbsp;</option>
                    <option value="j_rear_ec">41J Rear EC &nbsp;</option>
                    <option value="k_rear_ec">41K Rear EC &nbsp;</option>
                    <option value="x" class="pheading" disabled>RO Feed &nbsp;</option>
                    <option value="north_rofeed"> RO North Line Flow &nbsp;</option>
                    <option value="south_rofeed">RO South Line Flow &nbsp;</option>
                    <option value="north_orp206">North Line ORP-206 &nbsp;</option>
                    <option value="north_orp_202">North Line ORP-202 &nbsp;</option>
                    <option value="south_orp206">South Line ORP-206 &nbsp;</option>
                    <option value="south_orp202">South Line ORP-202 &nbsp;</option>
                    <option value="north_temp">North Line Temp. &nbsp;</option>
                    <option value="south_temp">South Line Temp.&nbsp;</option>
                    <option value="north_ec">North Line EC &nbsp;</option>
                    <option value="south_ec">South Line EC &nbsp;</option>
                    <option value="plant_capacity">Plant Capacity Factor &nbsp;</option>
                      </select>
                  </div>   </div>
                  </td><td style="text-align: center;">
                       
                                            <!-- Button trigger modal series 3-->
                                      <span id="panel3">
                                      <span type="" class="badge badge-light3d" data-bs-toggle="modal" data-bs-target="#modal-series3">
                                      <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
  
  
  
  <!-- Modal series 3-->
  <div class="modal fade" id="modal-series3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header modelheader3" style="background-color: rgb(207, 2, 2);">
          <h5 class="modal-title" id="seriestitle3">Series 3:  Sludge Pit Level  &nbsp;</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
  
  
    <div class="row mb-2">
      <label for="chart_type3" class="col-sm-4 col-form-label">Chart Type</label>
      <div class="col-sm-4">
        <select class="chart_render form-control form-select" id="chart_type3">
            <option value="spline" selected="">Line</option>
            <option value="areaspline">Area </option>          
            <option value="column">Column </option> 
            <option value="scatter" >Scatter </option>      
          </select>  
      </div>
    </div>
  
    <div class="row mb-2">
      <label for="line_width3" class="chart_render col-sm-4 col-form-label">Line Width</label>
      <div class="col-sm-4">
      <input type="number" id="line_width3" class="rednder form-control" value="2.0" min="0" max="4" step="0.1">  
      </div>
    </div>
     <div class="row mb-2">
      <label for="marker3" class="col-sm-4 col-form-label">Marker Weight</label>
      <div class="col-sm-4">
      <input type="number" id="marker3" class="chart_render form-control" value="0.5" min="0" step="0.1" max="4"> 
      </div>
    </div>
     <div class="row mb-2">
      <label for="marker_shape3" class="chart_render col-sm-4 col-form-label">Marker Shape</label>
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
  
       <input type="checkbox" class="chart_render form-check-input col-auto" id="dt_label3"> 
       <label for="dt_label3" class="form-check-label col-auto">&nbsp; Show Data Labels</label>
      </div>
    </div>
  
  <div class="row mb-2">
      <div class="input-group">
       <input type="checkbox" class="chart_render form-check-input col-auto" id="y_axis3" checked="">
       <label for="y_axis3" class="form-check-label col-auto">&nbsp; Show Y-axis</label>
      </div>
    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>
  <!-- modal end here   -->
                   </div></td>
                  
                     
                  <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length3">719</span></td>
                  <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max3">75.2</span> </td>
                  <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min3">27.3</span> </td>
                  <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg3">36.4</span> </td>
                  <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit3"> %</span> </td>
        
  </tr>
  <tr class="tr4 table-secondary">      
                  <td><div class="input-group">
                  <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line4" checked=""> 
                    &nbsp;4 &nbsp;<input type="color" id="pen4" name="pen4" value="#0eade1" class="chart_render series-color" style="display: none;"> &nbsp; </div>
                  <div class="col-auto"> 
                   <select class="query form-control form-control-sm form-select" id="ufdata4" style="display: none;">
                    <option value="north_dbnpa_flow" >DBNPA North Line Flow &nbsp;</option>
                    <option value="south_dbnpa_flow" >DBNPA South Line Flow   &nbsp;</option>
                    <option value="north_dbnpa_rate" >DBNPA North Line Dosing rate &nbsp;</option>
                    <option value="south_dbnpa_rate">DBNPA South Line Dosing rate &nbsp;</option>
                    <option value="north_sbs_flow" >SBS North Line Flow &nbsp;</option>
                    <option value="south_sbs_flow">SBS South Line Flow   &nbsp;</option>
                    <option value="north_sbs_rate" >SBS North Line Dosing rate &nbsp;</option>
                    <option value="south_sbs_rate">SBS South Line Dosing rate &nbsp;</option>
                    <option value="none" disabled class="pheading">RO skids DPI   &nbsp;</option>
                    <option value="a_dpi">41A DPI-906   &nbsp;</option>
                    <option value="b_dpi" >41B DPI-906   &nbsp;</option>
                    <option value="c_dpi" >41C DPI-906   &nbsp;</option>
                    <option value="d_dpi" selected="">41D DPI-906   &nbsp;</option>
                    <option value="e_dpi">41E DPI-906   &nbsp;</option>
                    <option value="f_dpi">41F DPI-906   &nbsp;</option>
                    <option value="g_dpi">41G DPI-906   &nbsp;</option>
                    <option value="h_dpi">41H DPI-906   &nbsp;</option>
                    <option value="i_dpi">41I DPI-906   &nbsp;</option>
                    <option value="j_dpi">41J DPI-906   &nbsp;</option>
                    <option value="k_dpi">41K DPI-906   &nbsp;</option>
                    <option value="x" class="pheading" disabled>Salt Rejection  &nbsp;</option>
                    <option value="a_saltrejection">41A Salt Rejection &nbsp;</option>
                    <option value="b_saltrejection">41B Salt Rejection &nbsp;</option>
                    <option value="c_saltrejection">41C Salt Rejection &nbsp;</option>
                    <option value="d_saltrejection">41D Salt Rejection &nbsp;</option>
                    <option value="e_saltrejection">41E Salt Rejection &nbsp;</option>
                    <option value="f_saltrejection">41F Salt Rejection &nbsp;</option>
                    <option value="g_saltrejection">41G Salt Rejection &nbsp;</option>
                    <option value="h_saltrejection">41H Salt Rejection &nbsp;</option>
                    <option value="i_saltrejection">41I Salt Rejection &nbsp;</option>
                    <option value="j_saltrejection">41J Salt Rejection &nbsp;</option>
                    <option value="k_saltrejection">41K Salt Rejection &nbsp;</option>
                    <option value="x" class="pheading" disabled>RO Skids Rear EC  &nbsp;</option>
                    <option value="a_rear_ec">41A Rear EC &nbsp;</option>
                    <option value="b_rear_ec">41B Rear EC &nbsp;</option>
                    <option value="c_rear_ec">41C Rear EC &nbsp;</option>
                    <option value="d_rear_ec">41D Rear EC &nbsp;</option>
                    <option value="e_rear_ec">41E Rear EC &nbsp;</option>
                    <option value="f_rear_ec">41F Rear EC &nbsp;</option>
                    <option value="g_rear_ec">41G Rear EC &nbsp;</option>
                    <option value="h_rear_ec">41H Rear EC &nbsp;</option>
                    <option value="i_rear_ec">41I Rear EC &nbsp;</option>
                    <option value="j_rear_ec">41J Rear EC &nbsp;</option>
                    <option value="k_rear_ec">41K Rear EC &nbsp;</option>
                    <option value="x" class="pheading" disabled>RO Feed &nbsp;</option>
                    <option value="north_rofeed"> RO North Line Flow &nbsp;</option>
                    <option value="south_rofeed">RO South Line Flow &nbsp;</option>
                    <option value="north_orp206">North Line ORP-206 &nbsp;</option>
                    <option value="north_orp_202">North Line ORP-202 &nbsp;</option>
                    <option value="south_orp206">South Line ORP-206 &nbsp;</option>
                    <option value="south_orp202">South Line ORP-202 &nbsp;</option>
                    <option value="north_temp">North Line Temp. &nbsp;</option>
                    <option value="south_temp">South Line Temp.&nbsp;</option>
                    <option value="north_ec">North Line EC &nbsp;</option>
                    <option value="south_ec">South Line EC &nbsp;</option>
                    <option value="plant_capacity">Plant Capacity Factor &nbsp;</option>
                  </select>
                  </div>  
  </div>
                  </td><td style="text-align: center;">
                       
                                            <!-- Button trigger modal series 4-->
                                      <span id="panel4" style="display: none;">
                                      <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal" data-bs-target="#modal-series4">
                                      <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
  <!-- Modal series 4-->
  <div class="modal fade" id="modal-series4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header modelheader4" style="background-color: rgb(14, 173, 225);">
          <h5 class="modal-title" id="seriestitle4">Series 4:  DAF 21D Flow  &nbsp;</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
  
  
    <div class="row mb-2">
      <label for="chart_type4" class="col-sm-4 col-form-label">Chart Type</label>
      <div class="col-sm-4">
        <select class="chart_render form-control form-select" id="chart_type4">
             <option value="spline" selected="">Line</option>
            <option value="areaspline">Area </option>          
            <option value="column">Column </option> 
            <option value="scatter" >Scatter </option>          
          </select>  
      </div>
    </div>
  
    <div class="row mb-2">
      <label for="line_width4" class="col-sm-4 col-form-label">Line Width</label>
      <div class="col-sm-4">
      <input type="number" id="line_width4" class="chart_render form-control" value="2.0" min="0" max="4" step="0.1">  
      </div>
    </div>
     <div class="row mb-2">
      <label for="marker4" class="col-sm-4 col-form-label">Marker Weight</label>
      <div class="col-sm-4">
      <input type="number" id="marker4" class="chart_render form-control" value="0.5" min="0" step="0.1" max="4"> 
      </div>
    </div>
     <div class="row mb-2">
      <label for="marker_shape4" class="col-sm-4 col-form-label">Marker Shape</label>
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
  
       <input type="checkbox" class="chart_render form-check-input col-auto" id="dt_label4"> 
       <label for="dt_label4" class="form-check-label col-auto">&nbsp; Show Data Labels</label>
      </div>
    </div>
  
  <div class="row mb-2">
      <div class="input-group">
       <input type="checkbox" class="chart_render form-check-input col-auto" id="y_axis4" checked="">
       <label for="y_axis4" class="form-check-label col-auto">&nbsp; Show Y-axis</label>
      </div>
    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>
  <!-- modal end here   -->
  
                   </div></td>
                  
                     
                  <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length4" style="display: none;"></span></td>
                  <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max4" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min4" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg4" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit4"> </span> </td>
        
  </tr>
  <tr class="tr5 table-secondary">      
                  <td><div class="input-group">
                  <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line5" checked=""> 
                    &nbsp;5 &nbsp;<input type="color" id="pen5" name="pen5" value="#f5ed05" class="chart_render series-color" style="display: none;"> &nbsp; </div>
                  <div class="col-auto"> 
                   <select class="query form-control form-control-sm form-select" id="ufdata5" style="display: none;">
                    <option value="north_dbnpa_flow" >DBNPA North Line Flow &nbsp;</option>
                    <option value="south_dbnpa_flow" >DBNPA South Line Flow   &nbsp;</option>
                    <option value="north_dbnpa_rate" >DBNPA North Line Dosing rate &nbsp;</option>
                    <option value="south_dbnpa_rate">DBNPA South Line Dosing rate &nbsp;</option>
                    <option value="north_sbs_flow" >SBS North Line Flow &nbsp;</option>
                    <option value="south_sbs_flow">SBS South Line Flow   &nbsp;</option>
                    <option value="north_sbs_rate" >SBS North Line Dosing rate &nbsp;</option>
                    <option value="south_sbs_rate">SBS South Line Dosing rate &nbsp;</option>
                    <option value="none" disabled class="pheading">RO skids DPI   &nbsp;</option>
                    <option value="a_dpi">41A DPI-906   &nbsp;</option>
                    <option value="b_dpi" >41B DPI-906   &nbsp;</option>
                    <option value="c_dpi">41C DPI-906   &nbsp;</option>
                    <option value="d_dpi">41D DPI-906   &nbsp;</option>
                    <option value="e_dpi" selected="">41E DPI-906   &nbsp;</option>
                    <option value="f_dpi">41F DPI-906   &nbsp;</option>
                    <option value="g_dpi">41G DPI-906   &nbsp;</option>
                    <option value="h_dpi">41H DPI-906   &nbsp;</option>
                    <option value="i_dpi">41I DPI-906   &nbsp;</option>
                    <option value="j_dpi">41J DPI-906   &nbsp;</option>
                    <option value="k_dpi">41K DPI-906   &nbsp;</option>
                    <option value="x" class="pheading" disabled>Salt Rejection  &nbsp;</option>
                    <option value="a_saltrejection">41A Salt Rejection &nbsp;</option>
                    <option value="b_saltrejection">41B Salt Rejection &nbsp;</option>
                    <option value="c_saltrejection">41C Salt Rejection &nbsp;</option>
                    <option value="d_saltrejection">41D Salt Rejection &nbsp;</option>
                    <option value="e_saltrejection">41E Salt Rejection &nbsp;</option>
                    <option value="f_saltrejection">41F Salt Rejection &nbsp;</option>
                    <option value="g_saltrejection">41G Salt Rejection &nbsp;</option>
                    <option value="h_saltrejection">41H Salt Rejection &nbsp;</option>
                    <option value="i_saltrejection">41I Salt Rejection &nbsp;</option>
                    <option value="j_saltrejection">41J Salt Rejection &nbsp;</option>
                    <option value="k_saltrejection">41K Salt Rejection &nbsp;</option>
                    <option value="x" class="pheading" disabled>RO Skids Rear EC  &nbsp;</option>
                    <option value="a_rear_ec">41A Rear EC &nbsp;</option>
                    <option value="b_rear_ec">41B Rear EC &nbsp;</option>
                    <option value="c_rear_ec">41C Rear EC &nbsp;</option>
                    <option value="d_rear_ec">41D Rear EC &nbsp;</option>
                    <option value="e_rear_ec">41E Rear EC &nbsp;</option>
                    <option value="f_rear_ec">41F Rear EC &nbsp;</option>
                    <option value="g_rear_ec">41G Rear EC &nbsp;</option>
                    <option value="h_rear_ec">41H Rear EC &nbsp;</option>
                    <option value="i_rear_ec">41I Rear EC &nbsp;</option>
                    <option value="j_rear_ec">41J Rear EC &nbsp;</option>
                    <option value="k_rear_ec">41K Rear EC &nbsp;</option>
                    <option value="x" class="pheading" disabled>RO Feed &nbsp;</option>
                    <option value="north_rofeed"> RO North Line Flow &nbsp;</option>
                    <option value="south_rofeed">RO South Line Flow &nbsp;</option>
                    <option value="north_orp206">North Line ORP-206 &nbsp;</option>
                    <option value="north_orp_202">North Line ORP-202 &nbsp;</option>
                    <option value="south_orp206">South Line ORP-206 &nbsp;</option>
                    <option value="south_orp202">South Line ORP-202 &nbsp;</option>
                    <option value="north_temp">North Line Temp. &nbsp;</option>
                    <option value="south_temp">South Line Temp.&nbsp;</option>
                    <option value="north_ec">North Line EC &nbsp;</option>
                    <option value="south_ec">South Line EC &nbsp;</option>
                    <option value="plant_capacity">Plant Capacity Factor &nbsp;</option>
                      </select>
                  </div>  
   </div>
                 </td><td style="text-align: center;">
                       
                                            <!-- Button trigger modal series 5-->
                                      <span id="panel5" style="display: none;">
                                      <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal" data-bs-target="#modal-series5">
                                      <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
  <!-- Modal series 5-->
  <div class="modal fade" id="modal-series5" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header modelheader5" style="background-color: rgb(245, 237, 5);">
          <h5 class="modal-title" id="seriestitle5">Series 5:  DAF 21E Flow  &nbsp;</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
  
  
    <div class="row mb-2">
      <label for="chart_type5" class="col-sm-4 col-form-label">Chart Type</label>
      <div class="col-sm-4">
        <select class="chart_render form-control form-select" id="chart_type5">
            <option value="spline" selected="">Line</option>
            <option value="areaspline">Area </option>          
            <option value="column">Column </option> 
            <option value="scatter" >Scatter </option>        
          </select>  
      </div>
    </div>
  
    <div class="row mb-2">
      <label for="line_width5" class="col-sm-4 col-form-label">Line Width</label>
      <div class="col-sm-4">
      <input type="number" id="line_width5" class="chart_render form-control" value="2.0" min="0" max="4" step="0.1">  
      </div>
    </div>
     <div class="row mb-2">
      <label for="marker5" class="col-sm-4 col-form-label">Marker Weight</label>
      <div class="col-sm-4">
      <input type="number" id="marker5" class="chart_render form-control" value="0.5" min="0" step="0.1" max="4"> 
      </div>
    </div>
     <div class="row mb-2">
      <label for="marker_shape5" class="col-sm-4 col-form-label">Marker Shape</label>
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
  
       <input type="checkbox" class="chart_render form-check-input col-auto" id="dt_label5"> 
       <label for="dt_label5" class="form-check-label col-auto">&nbsp; Show Data Labels</label>
      </div>
    </div>
  
  <div class="row mb-2">
      <div class="input-group">
       <input type="checkbox" class="chart_render form-check-input col-auto" id="y_axis5">
       <label for="y_axis5" class="form-check-label col-auto">&nbsp; Show Y-axis</label>
      </div>
    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>
  <!-- modal end here   -->
  
  
  
  
                   </div></td>
                  
                     
                  <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length5" style="display: none;"></span></td>
                  <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max5" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min5" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg5" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit5"> </span> </td>
        
  </tr>
  
  <tr class="tr6 table-secondary">      
                  <td><div class="input-group">
                  <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line6" checked=""> 
                    &nbsp;6 &nbsp;<input type="color" id="pen6" name="pen6" value="#12CBC4" class="chart_render series-color" style="display: none;"> &nbsp; </div> 
                  <div class="col-auto"> 
                  <select class="query form-control form-control-sm form-select" id="ufdata6" style="display: none;">
                    <option value="north_dbnpa_flow" >DBNPA North Line Flow &nbsp;</option>
                    <option value="south_dbnpa_flow" >DBNPA South Line Flow   &nbsp;</option>
                    <option value="north_dbnpa_rate" >DBNPA North Line Dosing rate &nbsp;</option>
                    <option value="south_dbnpa_rate">DBNPA South Line Dosing rate &nbsp;</option>
                    <option value="north_sbs_flow" >SBS North Line Flow &nbsp;</option>
                    <option value="south_sbs_flow">SBS South Line Flow   &nbsp;</option>
                    <option value="north_sbs_rate" >SBS North Line Dosing rate &nbsp;</option>
                    <option value="south_sbs_rate">SBS South Line Dosing rate &nbsp;</option>
                    <option value="none" disabled class="pheading">RO skids DPI   &nbsp;</option>
                    <option value="a_dpi">41A DPI-906   &nbsp;</option>
                    <option value="b_dpi" >41B DPI-906   &nbsp;</option>
                    <option value="c_dpi">41C DPI-906   &nbsp;</option>
                    <option value="d_dpi">41D DPI-906   &nbsp;</option>
                    <option value="e_dpi" >41E DPI-906   &nbsp;</option>
                    <option value="f_dpi" selected="">41F DPI-906   &nbsp;</option>
                    <option value="g_dpi" >41G DPI-906   &nbsp;</option>
                    <option value="h_dpi">41H DPI-906   &nbsp;</option>
                    <option value="i_dpi">41I DPI-906   &nbsp;</option>
                    <option value="j_dpi">41J DPI-906   &nbsp;</option>
                    <option value="k_dpi">41K DPI-906   &nbsp;</option>
                    <option value="x" class="pheading" disabled>Salt Rejection  &nbsp;</option>
                    <option value="a_saltrejection">41A Salt Rejection &nbsp;</option>
                    <option value="b_saltrejection">41B Salt Rejection &nbsp;</option>
                    <option value="c_saltrejection">41C Salt Rejection &nbsp;</option>
                    <option value="d_saltrejection">41D Salt Rejection &nbsp;</option>
                    <option value="e_saltrejection">41E Salt Rejection &nbsp;</option>
                    <option value="f_saltrejection">41F Salt Rejection &nbsp;</option>
                    <option value="g_saltrejection">41G Salt Rejection &nbsp;</option>
                    <option value="h_saltrejection">41H Salt Rejection &nbsp;</option>
                    <option value="i_saltrejection">41I Salt Rejection &nbsp;</option>
                    <option value="j_saltrejection">41J Salt Rejection &nbsp;</option>
                    <option value="k_saltrejection">41K Salt Rejection &nbsp;</option>
                    <option value="x" class="pheading" disabled>RO Skids Rear EC  &nbsp;</option>
                    <option value="a_rear_ec">41A Rear EC &nbsp;</option>
                    <option value="b_rear_ec">41B Rear EC &nbsp;</option>
                    <option value="c_rear_ec">41C Rear EC &nbsp;</option>
                    <option value="d_rear_ec">41D Rear EC &nbsp;</option>
                    <option value="e_rear_ec">41E Rear EC &nbsp;</option>
                    <option value="f_rear_ec">41F Rear EC &nbsp;</option>
                    <option value="g_rear_ec">41G Rear EC &nbsp;</option>
                    <option value="h_rear_ec">41H Rear EC &nbsp;</option>
                    <option value="i_rear_ec">41I Rear EC &nbsp;</option>
                    <option value="j_rear_ec">41J Rear EC &nbsp;</option>
                    <option value="k_rear_ec">41K Rear EC &nbsp;</option>
                    <option value="x" class="pheading" disabled>RO Feed &nbsp;</option>
                    <option value="north_rofeed"> RO North Line Flow &nbsp;</option>
                    <option value="south_rofeed">RO South Line Flow &nbsp;</option>
                    <option value="north_orp206">North Line ORP-206 &nbsp;</option>
                    <option value="north_orp_202">North Line ORP-202 &nbsp;</option>
                    <option value="south_orp206">South Line ORP-206 &nbsp;</option>
                    <option value="south_orp202">South Line ORP-202 &nbsp;</option>
                    <option value="north_temp">North Line Temp. &nbsp;</option>
                    <option value="south_temp">South Line Temp.&nbsp;</option>
                    <option value="north_ec">North Line EC &nbsp;</option>
                    <option value="south_ec">South Line EC &nbsp;</option>
                    <option value="plant_capacity">Plant Capacity Factor &nbsp;</option>
                      </select>
                  </div> </div>
                 </td><td style="text-align: center;">
                       
                                            <!-- Button trigger modal series 6-->
                                      <span id="panel6" style="display: none;">
                                      <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal" data-bs-target="#modal-series6">
                                      <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
  <!-- Modal series 6-->
  <div class="modal fade" id="modal-series6" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header modelheader6" style="background-color: rgb(226, 125, 8);">
          <h5 class="modal-title" id="seriestitle6">Series 6: DAF 21F Flow   &nbsp;</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
  
  
    <div class="row mb-2">
      <label for="chart_type6" class="col-sm-4 col-form-label">Chart Type</label>
      <div class="col-sm-4">
        <select class="chart_render form-control form-select" id="chart_type6">
            <option value="spline" selected="">Line</option>
            <option value="areaspline">Area </option>          
            <option value="column">Column </option> 
            <option value="scatter" >Scatter </option>        
          </select>  
      </div>
    </div>
  
    <div class="row mb-2">
      <label for="line_width6" class="col-sm-4 col-form-label">Line Width</label>
      <div class="col-sm-4">
      <input type="number" id="line_width6" class="chart_render form-control" value="2.0" min="0" max="4" step="0.1">  
      </div>
    </div>
     <div class="row mb-2">
      <label for="marker6" class="col-sm-4 col-form-label">Marker Weight</label>
      <div class="col-sm-4">
      <input type="number" id="marker6" class="chart_render form-control" value="0.5" min="0" step="0.1" max="4"> 
      </div>
    </div>
     <div class="row mb-2">
      <label for="marker_shape6" class="col-sm-4 col-form-label">Marker Shape</label>
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
  
       <input type="checkbox" class="chart_render form-check-input col-auto" id="dt_label6"> 
       <label for="dt_label6" class="form-check-label col-auto">&nbsp; Show Data Labels</label>
      </div>
    </div>
  
  <div class="row mb-2">
      <div class="input-group">
       <input type="checkbox" class="chart_render form-check-input col-auto" id="y_axis6" checked="">
       <label for="y_axis6" class="form-check-label col-auto">&nbsp; Show Y-axis</label>
      </div>
    </div>
  
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>
  <!-- modal end here   -->
                   </div></td>
                  
                     
                  <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length6" style="display: none;"></span></td>
                  <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max6" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min6" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg6" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit6"> </span> </td>
        
  </tr>
  
  <tr class="tr7 table-secondary">      
                  <td><div class="input-group">
                  <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line7" checked=""> 
                    &nbsp;7 &nbsp;<input type="color" id="pen7" name="pen7" value="#009432" class="chart_render series-color" style="display: none;"> &nbsp; </div> 
                  <div class="col-auto"> 
                  <select class="query form-control form-control-sm form-select" id="ufdata7" style="display: none;">
                    <option value="north_dbnpa_flow" >DBNPA North Line Flow &nbsp;</option>
                    <option value="south_dbnpa_flow" >DBNPA South Line Flow   &nbsp;</option>
                    <option value="north_dbnpa_rate" >DBNPA North Line Dosing rate &nbsp;</option>
                    <option value="south_dbnpa_rate">DBNPA South Line Dosing rate &nbsp;</option>
                    <option value="north_sbs_flow" >SBS North Line Flow &nbsp;</option>
                    <option value="south_sbs_flow">SBS South Line Flow   &nbsp;</option>
                    <option value="north_sbs_rate" >SBS North Line Dosing rate &nbsp;</option>
                    <option value="south_sbs_rate">SBS South Line Dosing rate &nbsp;</option>
                    <option value="none" disabled class="pheading">RO skids DPI   &nbsp;</option>
                    <option value="a_dpi">41A DPI-906   &nbsp;</option>
                    <option value="b_dpi" >41B DPI-906   &nbsp;</option>
                    <option value="c_dpi">41C DPI-906   &nbsp;</option>
                    <option value="d_dpi">41D DPI-906   &nbsp;</option>
                    <option value="e_dpi" >41E DPI-906   &nbsp;</option>
                    <option value="f_dpi">41F DPI-906   &nbsp;</option>
                    <option value="g_dpi" selected="">41G DPI-906   &nbsp;</option>
                    <option value="h_dpi" >41H DPI-906   &nbsp;</option>
                    <option value="i_dpi" >41I DPI-906   &nbsp;</option>
                    <option value="j_dpi">41J DPI-906   &nbsp;</option>
                    <option value="k_dpi">41K DPI-906   &nbsp;</option>
                    <option value="x" class="pheading" disabled>Salt Rejection  &nbsp;</option>
                    <option value="a_saltrejection">41A Salt Rejection &nbsp;</option>
                    <option value="b_saltrejection">41B Salt Rejection &nbsp;</option>
                    <option value="c_saltrejection">41C Salt Rejection &nbsp;</option>
                    <option value="d_saltrejection">41D Salt Rejection &nbsp;</option>
                    <option value="e_saltrejection">41E Salt Rejection &nbsp;</option>
                    <option value="f_saltrejection">41F Salt Rejection &nbsp;</option>
                    <option value="g_saltrejection">41G Salt Rejection &nbsp;</option>
                    <option value="h_saltrejection">41H Salt Rejection &nbsp;</option>
                    <option value="i_saltrejection">41I Salt Rejection &nbsp;</option>
                    <option value="j_saltrejection">41J Salt Rejection &nbsp;</option>
                    <option value="k_saltrejection">41K Salt Rejection &nbsp;</option>
                    <option value="x" class="pheading" disabled>RO Skids Rear EC  &nbsp;</option>
                    <option value="a_rear_ec">41A Rear EC &nbsp;</option>
                    <option value="b_rear_ec">41B Rear EC &nbsp;</option>
                    <option value="c_rear_ec">41C Rear EC &nbsp;</option>
                    <option value="d_rear_ec">41D Rear EC &nbsp;</option>
                    <option value="e_rear_ec">41E Rear EC &nbsp;</option>
                    <option value="f_rear_ec">41F Rear EC &nbsp;</option>
                    <option value="g_rear_ec">41G Rear EC &nbsp;</option>
                    <option value="h_rear_ec">41H Rear EC &nbsp;</option>
                    <option value="i_rear_ec">41I Rear EC &nbsp;</option>
                    <option value="j_rear_ec">41J Rear EC &nbsp;</option>
                    <option value="k_rear_ec">41K Rear EC &nbsp;</option>
                    <option value="x" class="pheading" disabled>RO Feed &nbsp;</option>
                    <option value="north_rofeed"> RO North Line Flow &nbsp;</option>
                    <option value="south_rofeed">RO South Line Flow &nbsp;</option>
                    <option value="north_orp206">North Line ORP-206 &nbsp;</option>
                    <option value="north_orp_202">North Line ORP-202 &nbsp;</option>
                    <option value="south_orp206">South Line ORP-206 &nbsp;</option>
                    <option value="south_orp202">South Line ORP-202 &nbsp;</option>
                    <option value="north_temp">North Line Temp. &nbsp;</option>
                    <option value="south_temp">South Line Temp.&nbsp;</option>
                    <option value="north_ec">North Line EC &nbsp;</option>
                    <option value="south_ec">South Line EC &nbsp;</option>
                    <option value="plant_capacity">Plant Capacity Factor &nbsp;</option>
                  </select>
                  </div> </div>
                 </td><td style="text-align: center;">
                       
                                            <!-- Button trigger modal series 5-->
                                      <span id="panel7" style="display: none;">
                                      <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal" data-bs-target="#modal-series7">
                                      <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
  <!-- Modal series 7-->
  <div class="modal fade" id="modal-series7" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header modelheader7" style="background-color: rgb(7, 23, 237);">
          <h5 class="modal-title" id="seriestitle7">Series 7:  DAF 21C Balloon Pressure  &nbsp;</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
      <input type="number" id="line_width7" class="chart_render form-control" value="2.0" min="0" max="4" step="0.1">  
      </div>
    </div>
     <div class="row mb-2">
      <label for="marker7" class="col-sm-4 col-form-label">Marker Weight</label>
      <div class="col-sm-4">
      <input type="number" id="marker7" class="chart_render form-control" value="0.5" min="0" step="0.1" max="4"> 
      </div>
    </div>
     <div class="row mb-2">
      <label for="marker_shape7" class="col-sm-4 col-form-label">Marker Shape</label>
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
  
       <input type="checkbox" class="chart_render form-check-input col-auto" id="dt_label7"> 
       <label for="dt_label7" class="form-check-label col-auto">&nbsp; Show Data Labels</label>
      </div>
    </div>
  
  <div class="row mb-2">
      <div class="input-group">
       <input type="checkbox" class="chart_render form-check-input col-auto" id="y_axis7">
       <label for="y_axis7" class="form-check-label col-auto">&nbsp; Show Y-axis</label>
      </div>
    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>
  <!-- modal end here   -->
</div></td>
                  
                     
<td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length7" style="display: none;"></span></td>
<td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max7" style="display: none;"></span> </td>
<td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min7" style="display: none;"></span> </td>
<td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg7" style="display: none;"></span> </td>
<td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit7"> </span> </td>

</tr>
  
  <tr class="tr8 table-secondary">      
    <td><div class="input-group">
    <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line8" checked=""> 
      &nbsp;8 &nbsp;<input type="color" id="pen8" name="pen8" value="#7158e2" class="chart_render series-color" style="display: none;"> &nbsp; </div> 
    <div class="col-auto"> 
    <select class="query form-control form-control-sm form-select" id="ufdata8" style="display: none;">
      <option value="north_dbnpa_flow" >DBNPA North Line Flow &nbsp;</option>
      <option value="south_dbnpa_flow" >DBNPA South Line Flow   &nbsp;</option>
      <option value="north_dbnpa_rate" >DBNPA North Line Dosing rate &nbsp;</option>
      <option value="south_dbnpa_rate">DBNPA South Line Dosing rate &nbsp;</option>
      <option value="north_sbs_flow" >SBS North Line Flow &nbsp;</option>
      <option value="south_sbs_flow">SBS South Line Flow   &nbsp;</option>
      <option value="north_sbs_rate" >SBS North Line Dosing rate &nbsp;</option>
      <option value="south_sbs_rate">SBS South Line Dosing rate &nbsp;</option>
      <option value="none" disabled class="pheading">RO skids DPI   &nbsp;</option>
      <option value="a_dpi">41A DPI-906   &nbsp;</option>
      <option value="b_dpi" >41B DPI-906   &nbsp;</option>
      <option value="c_dpi">41C DPI-906   &nbsp;</option>
      <option value="d_dpi">41D DPI-906   &nbsp;</option>
      <option value="e_dpi" >41E DPI-906   &nbsp;</option>
      <option value="f_dpi">41F DPI-906   &nbsp;</option>
      <option value="g_dpi" >41G DPI-906   &nbsp;</option>
      <option value="h_dpi" selected="">41H DPI-906   &nbsp;</option>
      <option value="i_dpi" >41I DPI-906   &nbsp;</option>
      <option value="j_dpi" >41J DPI-906   &nbsp;</option>
      <option value="k_dpi">41K DPI-906   &nbsp;</option>
      <option value="x" class="pheading" disabled>Salt Rejection  &nbsp;</option>
      <option value="a_saltrejection">41A Salt Rejection &nbsp;</option>
      <option value="b_saltrejection">41B Salt Rejection &nbsp;</option>
      <option value="c_saltrejection">41C Salt Rejection &nbsp;</option>
      <option value="d_saltrejection">41D Salt Rejection &nbsp;</option>
      <option value="e_saltrejection">41E Salt Rejection &nbsp;</option>
      <option value="f_saltrejection">41F Salt Rejection &nbsp;</option>
      <option value="g_saltrejection">41G Salt Rejection &nbsp;</option>
      <option value="h_saltrejection">41H Salt Rejection &nbsp;</option>
      <option value="i_saltrejection">41I Salt Rejection &nbsp;</option>
      <option value="j_saltrejection">41J Salt Rejection &nbsp;</option>
      <option value="k_saltrejection">41K Salt Rejection &nbsp;</option>
      <option value="x" class="pheading" disabled>RO Skids Rear EC  &nbsp;</option>
      <option value="a_rear_ec">41A Rear EC &nbsp;</option>
      <option value="b_rear_ec">41B Rear EC &nbsp;</option>
      <option value="c_rear_ec">41C Rear EC &nbsp;</option>
      <option value="d_rear_ec">41D Rear EC &nbsp;</option>
      <option value="e_rear_ec">41E Rear EC &nbsp;</option>
      <option value="f_rear_ec">41F Rear EC &nbsp;</option>
      <option value="g_rear_ec">41G Rear EC &nbsp;</option>
      <option value="h_rear_ec">41H Rear EC &nbsp;</option>
      <option value="i_rear_ec">41I Rear EC &nbsp;</option>
      <option value="j_rear_ec">41J Rear EC &nbsp;</option>
      <option value="k_rear_ec">41K Rear EC &nbsp;</option>
      <option value="x" class="pheading" disabled>RO Feed &nbsp;</option>
      <option value="north_rofeed"> RO North Line Flow &nbsp;</option>
      <option value="south_rofeed">RO South Line Flow &nbsp;</option>
      <option value="north_orp206">North Line ORP-206 &nbsp;</option>
      <option value="north_orp_202">North Line ORP-202 &nbsp;</option>
      <option value="south_orp206">South Line ORP-206 &nbsp;</option>
      <option value="south_orp202">South Line ORP-202 &nbsp;</option>
      <option value="north_temp">North Line Temp. &nbsp;</option>
      <option value="south_temp">South Line Temp.&nbsp;</option>
      <option value="north_ec">North Line EC &nbsp;</option>
      <option value="south_ec">South Line EC &nbsp;</option>
      <option value="plant_capacity">Plant Capacity Factor &nbsp;</option>
    </select>
    </div> </div>
   </td><td style="text-align: center;">
         
                              <!-- Button trigger modal series 8-->
                        <span id="panel8" style="display: none;">
                        <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal" data-bs-target="#modal-series8">
                        <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
<!-- Modal series 8-->
<div class="modal fade" id="modal-series8" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header modelheader8" style="background-color: rgb(7, 23, 237);">
<h5 class="modal-title" id="seriestitle8">  &nbsp;</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

<div class="row mb-2">
<label for="chart_type8" class="col-sm-4 col-form-label">Chart Type</label>
<div class="col-sm-4">
<select class="chart_render form-control form-select" id="chart_type8">
<option value="spline" selected="">Line</option>
<option value="areaspline">Area </option>          
<option value="column">Column </option> 
<option value="scatter">Scatter </option>        
</select>  
</div>
</div>

<div class="row mb-2">
<label for="line_width8" class="col-sm-4 col-form-label">Line Width</label>
<div class="col-sm-4">
<input type="number" id="line_width8" class="chart_render form-control" value="2.0" min="0" max="4" step="0.1">  
</div>
</div>
<div class="row mb-2">
<label for="marker8" class="col-sm-4 col-form-label">Marker Weight</label>
<div class="col-sm-4">
<input type="number" id="marker8" class="chart_render form-control" value="0.5" min="0" step="0.1" max="4"> 
</div>
</div>
<div class="row mb-2">
<label for="marker_shape8" class="col-sm-4 col-form-label">Marker Shape</label>
<div class="col-sm-4">
<select id="marker_shape8" class="chart_render form-control form-select">
<option value="circle">Circle </option>
<option value="square">Square </option>
<option value="triangle" selected="">Trianlge </option>
<option value="diamond">Diamond </option>
</select>
</div>
</div>
<div class="row mb-2">
<div class="input-group">

<input type="checkbox" class="chart_render form-check-input col-auto" id="dt_label8"> 
<label for="dt_label8" class="form-check-label col-auto">&nbsp; Show Data Labels</label>
</div>
</div>

<div class="row mb-2">
<div class="input-group">
<input type="checkbox" class="chart_render form-check-input col-auto" id="y_axis8">
<label for="y_axis8" class="form-check-label col-auto">&nbsp; Show Y-axis</label>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

</div>
</div>
</div>
</div>
<!-- modal end here   -->
  
                   </div></td>
                  
                     
                  <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length8" style="display: none;"></span></td>
                  <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max8" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min8" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg8" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit8"> </span> </td>
        
  </tr>
  <tr class="tr9 table-secondary">      
    <td><div class="input-group">
    <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line9" checked> 
      &nbsp;9 &nbsp;<input type="color" id="pen9" name="pen9" value="#e84393" class="chart_render series-color" style="display: none;"> &nbsp; </div> 
    <div class="col-auto"> 
    <select class="query form-control form-control-sm form-select" id="ufdata9" style="display: none;">
      <option value="north_dbnpa_flow" >DBNPA North Line Flow &nbsp;</option>
      <option value="south_dbnpa_flow" >DBNPA South Line Flow   &nbsp;</option>
      <option value="north_dbnpa_rate" >DBNPA North Line Dosing rate &nbsp;</option>
      <option value="south_dbnpa_rate">DBNPA South Line Dosing rate &nbsp;</option>
      <option value="north_sbs_flow" >SBS North Line Flow &nbsp;</option>
      <option value="south_sbs_flow">SBS South Line Flow   &nbsp;</option>
      <option value="north_sbs_rate" >SBS North Line Dosing rate &nbsp;</option>
      <option value="south_sbs_rate">SBS South Line Dosing rate &nbsp;</option>
      <option value="none" disabled class="pheading">RO skids DPI   &nbsp;</option>
      <option value="a_dpi">41A DPI-906   &nbsp;</option>
      <option value="b_dpi" >41B DPI-906   &nbsp;</option>
      <option value="c_dpi">41C DPI-906   &nbsp;</option>
      <option value="d_dpi">41D DPI-906   &nbsp;</option>
      <option value="e_dpi" >41E DPI-906   &nbsp;</option>
      <option value="f_dpi">41F DPI-906   &nbsp;</option>
      <option value="g_dpi" >41G DPI-906   &nbsp;</option>
      <option value="h_dpi">41H DPI-906   &nbsp;</option>
      <option value="i_dpi" selected="">41I DPI-906   &nbsp;</option>
      <option value="j_dpi">41J DPI-906   &nbsp;</option>
      <option value="k_dpi">41K DPI-906   &nbsp;</option>
      <option value="x" class="pheading" disabled>Salt Rejection  &nbsp;</option>
      <option value="a_saltrejection">41A Salt Rejection &nbsp;</option>
      <option value="b_saltrejection" >41B Salt Rejection &nbsp;</option>
      <option value="c_saltrejection">41C Salt Rejection &nbsp;</option>
      <option value="d_saltrejection">41D Salt Rejection &nbsp;</option>
      <option value="e_saltrejection">41E Salt Rejection &nbsp;</option>
      <option value="f_saltrejection">41F Salt Rejection &nbsp;</option>
      <option value="g_saltrejection">41G Salt Rejection &nbsp;</option>
      <option value="h_saltrejection">41H Salt Rejection &nbsp;</option>
      <option value="i_saltrejection">41I Salt Rejection &nbsp;</option>
      <option value="j_saltrejection">41J Salt Rejection &nbsp;</option>
      <option value="k_saltrejection">41K Salt Rejection &nbsp;</option>
      <option value="x" class="pheading" disabled>RO Skids Rear EC  &nbsp;</option>
      <option value="a_rear_ec">41A Rear EC &nbsp;</option>
      <option value="b_rear_ec">41B Rear EC &nbsp;</option>
      <option value="c_rear_ec">41C Rear EC &nbsp;</option>
      <option value="d_rear_ec">41D Rear EC &nbsp;</option>
      <option value="e_rear_ec">41E Rear EC &nbsp;</option>
      <option value="f_rear_ec">41F Rear EC &nbsp;</option>
      <option value="g_rear_ec">41G Rear EC &nbsp;</option>
      <option value="h_rear_ec">41H Rear EC &nbsp;</option>
      <option value="i_rear_ec">41I Rear EC &nbsp;</option>
      <option value="j_rear_ec">41J Rear EC &nbsp;</option>
      <option value="k_rear_ec">41K Rear EC &nbsp;</option>
      <option value="x" class="pheading" disabled>RO Feed &nbsp;</option>
      <option value="north_rofeed"> RO North Line Flow &nbsp;</option>
      <option value="south_rofeed">RO South Line Flow &nbsp;</option>
      <option value="north_orp206">North Line ORP-206 &nbsp;</option>
      <option value="north_orp_202">North Line ORP-202 &nbsp;</option>
      <option value="south_orp206">South Line ORP-206 &nbsp;</option>
      <option value="south_orp202">South Line ORP-202 &nbsp;</option>
      <option value="north_temp">North Line Temp. &nbsp;</option>
      <option value="south_temp">South Line Temp.&nbsp;</option>
      <option value="north_ec">North Line EC &nbsp;</option>
      <option value="south_ec">South Line EC &nbsp;</option>
      <option value="plant_capacity">Plant Capacity Factor &nbsp;</option>
    </select>
    </div> </div>
   </td><td style="text-align: center;">
         
                              <!-- Button trigger modal series 9-->
                        <span id="panel9" style="display: none;">
                        <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal" data-bs-target="#modal-series9">
                        <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
<!-- Modal series 9-->
<div class="modal fade" id="modal-series9" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header modelheader9" style="background-color: rgb(7, 23, 237);">
<h5 class="modal-title" id="seriestitle9">  &nbsp;</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

<div class="row mb-2">
<label for="chart_type9" class="col-sm-4 col-form-label">Chart Type</label>
<div class="col-sm-4">
<select class="chart_render form-control form-select" id="chart_type9">
<option value="spline" selected="">Line</option>
<option value="areaspline">Area </option>          
<option value="column">Column </option> 
<option value="scatter">Scatter </option>        
</select>  
</div>
</div>

<div class="row mb-2">
<label for="line_width9" class="col-sm-4 col-form-label">Line Width</label>
<div class="col-sm-4">
<input type="number" id="line_width9" class="chart_render form-control" value="2.0" min="0" max="4" step="0.1">  
</div>
</div>
<div class="row mb-2">
<label for="marker9" class="col-sm-4 col-form-label">Marker Weight</label>
<div class="col-sm-4">
<input type="number" id="marker9" class="chart_render form-control" value="0.5" min="0" step="0.1" max="4"> 
</div>
</div>
<div class="row mb-2">
<label for="marker_shape9" class="col-sm-4 col-form-label">Marker Shape</label>
<div class="col-sm-4">
<select id="marker_shape9" class="chart_render form-control form-select">
<option value="circle">Circle </option>
<option value="square">Square </option>
<option value="triangle" selected="">Trianlge </option>
<option value="diamond">Diamond </option>
</select>
</div>
</div>
<div class="row mb-2">
<div class="input-group">

<input type="checkbox" class="chart_render form-check-input col-auto" id="dt_label9"> 
<label for="dt_label9" class="form-check-label col-auto">&nbsp; Show Data Labels</label>
</div>
</div>

<div class="row mb-2">
<div class="input-group">
<input type="checkbox" class="chart_render form-check-input col-auto" id="y_axis9">
<label for="y_axis9" class="form-check-label col-auto">&nbsp; Show Y-axis</label>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

</div>
</div>
</div>
</div>
<!-- modal end here  9 -->
  
                   </div></td>
                  
                     
                  <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length9" style="display: none;"></span></td>
                  <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max9" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min9" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg9" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit9"> </span> </td>
        
  </tr>
  <tr class="tr10 table-secondary">      
    <td><div class="input-group">
    <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line10" checked> 
      &nbsp;10<input type="color" id="pen10" name="pen10" value="#C4E538" class="chart_render series-color" style="display: none;"> &nbsp; </div> 
    <div class="col-auto"> 
    <select class="query form-control form-control-sm form-select" id="ufdata10" style="display: none;">
      <option value="north_dbnpa_flow" >DBNPA North Line Flow &nbsp;</option>
      <option value="south_dbnpa_flow" >DBNPA South Line Flow   &nbsp;</option>
      <option value="north_dbnpa_rate" >DBNPA North Line Dosing rate &nbsp;</option>
      <option value="south_dbnpa_rate">DBNPA South Line Dosing rate &nbsp;</option>
      <option value="north_sbs_flow" >SBS North Line Flow &nbsp;</option>
      <option value="south_sbs_flow">SBS South Line Flow   &nbsp;</option>
      <option value="north_sbs_rate" >SBS North Line Dosing rate &nbsp;</option>
      <option value="south_sbs_rate">SBS South Line Dosing rate &nbsp;</option>
      <option value="none" disabled class="pheading">RO skids DPI   &nbsp;</option>
      <option value="a_dpi">41A DPI-906   &nbsp;</option>
      <option value="b_dpi" >41B DPI-906   &nbsp;</option>
      <option value="c_dpi">41C DPI-906   &nbsp;</option>
      <option value="d_dpi">41D DPI-906   &nbsp;</option>
      <option value="e_dpi" >41E DPI-906   &nbsp;</option>
      <option value="f_dpi">41F DPI-906   &nbsp;</option>
      <option value="g_dpi" >41G DPI-906   &nbsp;</option>
      <option value="h_dpi">41H DPI-906   &nbsp;</option>
      <option value="i_dpi" >41I DPI-906   &nbsp;</option>
      <option value="j_dpi" selected="">41J DPI-906   &nbsp;</option>
      <option value="k_dpi">41K DPI-906   &nbsp;</option>
      <option value="x" class="pheading" disabled>Salt Rejection  &nbsp;</option>
      <option value="a_saltrejection">41A Salt Rejection &nbsp;</option>
      <option value="b_saltrejection">41B Salt Rejection &nbsp;</option>
      <option value="c_saltrejection" >41C Salt Rejection &nbsp;</option>
      <option value="d_saltrejection">41D Salt Rejection &nbsp;</option>
      <option value="e_saltrejection">41E Salt Rejection &nbsp;</option>
      <option value="f_saltrejection">41F Salt Rejection &nbsp;</option>
      <option value="g_saltrejection">41G Salt Rejection &nbsp;</option>
      <option value="h_saltrejection">41H Salt Rejection &nbsp;</option>
      <option value="i_saltrejection">41I Salt Rejection &nbsp;</option>
      <option value="j_saltrejection">41J Salt Rejection &nbsp;</option>
      <option value="k_saltrejection">41K Salt Rejection &nbsp;</option>
      <option value="x" class="pheading" disabled>RO Skids Rear EC  &nbsp;</option>
      <option value="a_rear_ec">41A Rear EC &nbsp;</option>
      <option value="b_rear_ec">41B Rear EC &nbsp;</option>
      <option value="c_rear_ec">41C Rear EC &nbsp;</option>
      <option value="d_rear_ec">41D Rear EC &nbsp;</option>
      <option value="e_rear_ec">41E Rear EC &nbsp;</option>
      <option value="f_rear_ec">41F Rear EC &nbsp;</option>
      <option value="g_rear_ec">41G Rear EC &nbsp;</option>
      <option value="h_rear_ec">41H Rear EC &nbsp;</option>
      <option value="i_rear_ec">41I Rear EC &nbsp;</option>
      <option value="j_rear_ec">41J Rear EC &nbsp;</option>
      <option value="k_rear_ec">41K Rear EC &nbsp;</option>
      <option value="x" class="pheading" disabled>RO Feed &nbsp;</option>
      <option value="north_rofeed"> RO North Line Flow &nbsp;</option>
      <option value="south_rofeed">RO South Line Flow &nbsp;</option>
      <option value="north_orp206">North Line ORP-206 &nbsp;</option>
      <option value="north_orp_202">North Line ORP-202 &nbsp;</option>
      <option value="south_orp206">South Line ORP-206 &nbsp;</option>
      <option value="south_orp202">South Line ORP-202 &nbsp;</option>
      <option value="north_temp">North Line Temp. &nbsp;</option>
      <option value="south_temp">South Line Temp.&nbsp;</option>
      <option value="north_ec">North Line EC &nbsp;</option>
      <option value="south_ec">South Line EC &nbsp;</option>
      <option value="plant_capacity">Plant Capacity Factor &nbsp;</option>
    </select>
    </div> </div>
   </td><td style="text-align: center;">
         
                              <!-- Button trigger modal series 10-->
                        <span id="panel10" style="display: none;">
                        <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal" data-bs-target="#modal-series10">
                        <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
<!-- Modal series 10-->
<div class="modal fade" id="modal-series10" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header modelheader10" style="background-color: rgb(7, 23, 237);">
<h5 class="modal-title" id="seriestitle10">  &nbsp;</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

<div class="row mb-2">
<label for="chart_type10" class="col-sm-4 col-form-label">Chart Type</label>
<div class="col-sm-4">
<select class="chart_render form-control form-select" id="chart_type10">
<option value="spline" selected="">Line</option>
<option value="areaspline">Area </option>          
<option value="column">Column </option> 
<option value="scatter">Scatter </option>        
</select>  
</div>
</div>

<div class="row mb-2">
<label for="line_width10" class="col-sm-4 col-form-label">Line Width</label>
<div class="col-sm-4">
<input type="number" id="line_width10" class="chart_render form-control" value="2.0" min="0" max="4" step="0.1">  
</div>
</div>
<div class="row mb-2">
<label for="marker10" class="col-sm-4 col-form-label">Marker Weight</label>
<div class="col-sm-4">
<input type="number" id="marker10" class="chart_render form-control" value="0.5" min="0" step="0.1" max="4"> 
</div>
</div>
<div class="row mb-2">
<label for="marker_shape10" class="col-sm-4 col-form-label">Marker Shape</label>
<div class="col-sm-4">
<select id="marker_shape10" class="chart_render form-control form-select">
<option value="circle">Circle </option>
<option value="square">Square </option>
<option value="triangle" selected="">Trianlge </option>
<option value="diamond">Diamond </option>
</select>
</div>
</div>
<div class="row mb-2">
<div class="input-group">

<input type="checkbox" class="chart_render form-check-input col-auto" id="dt_label10"> 
<label for="dt_label10" class="form-check-label col-auto">&nbsp; Show Data Labels</label>
</div>
</div>

<div class="row mb-2">
<div class="input-group">
<input type="checkbox" class="chart_render form-check-input col-auto" id="y_axis10">
<label for="y_axis10" class="form-check-label col-auto">&nbsp; Show Y-axis</label>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

</div>
</div>
</div>
</div>
<!-- modal end here  10-->
  
                   </div></td>
                  
                     
                  <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length10" style="display: none;"></span></td>
                  <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max10" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min10" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg10" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit10"> </span> </td>
        
  </tr>

  <tr class="tr11 table-secondary">      
    <td><div class="input-group">
    <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line11" checked> 
      &nbsp;11<input type="color" id="pen11" name="pen11" value="#2c3e50" class="chart_render series-color" style="display: none;"> &nbsp; </div> 
    <div class="col-auto"> 
    <select class="query form-control form-control-sm form-select" id="ufdata11" style="display: none;">
      <option value="north_dbnpa_flow" >DBNPA North Line Flow &nbsp;</option>
      <option value="south_dbnpa_flow" >DBNPA South Line Flow   &nbsp;</option>
      <option value="north_dbnpa_rate" >DBNPA North Line Dosing rate &nbsp;</option>
      <option value="south_dbnpa_rate">DBNPA South Line Dosing rate &nbsp;</option>
      <option value="north_sbs_flow" >SBS North Line Flow &nbsp;</option>
      <option value="south_sbs_flow">SBS South Line Flow   &nbsp;</option>
      <option value="north_sbs_rate" >SBS North Line Dosing rate &nbsp;</option>
      <option value="south_sbs_rate">SBS South Line Dosing rate &nbsp;</option>
      <option value="none" disabled class="pheading">RO skids DPI   &nbsp;</option>
      <option value="a_dpi">41A DPI-906   &nbsp;</option>
      <option value="b_dpi" >41B DPI-906   &nbsp;</option>
      <option value="c_dpi">41C DPI-906   &nbsp;</option>
      <option value="d_dpi">41D DPI-906   &nbsp;</option>
      <option value="e_dpi" >41E DPI-906   &nbsp;</option>
      <option value="f_dpi">41F DPI-906   &nbsp;</option>
      <option value="g_dpi" >41G DPI-906   &nbsp;</option>
      <option value="h_dpi">41H DPI-906   &nbsp;</option>
      <option value="i_dpi" >41I DPI-906   &nbsp;</option>
      <option value="j_dpi" >41J DPI-906   &nbsp;</option>
      <option value="k_dpi" selected="">41K DPI-906   &nbsp;</option>
      <option value="x" class="pheading" disabled>Salt Rejection  &nbsp;</option>
      <option value="a_saltrejection">41A Salt Rejection &nbsp;</option>
      <option value="b_saltrejection">41B Salt Rejection &nbsp;</option>
      <option value="c_saltrejection" >41C Salt Rejection &nbsp;</option>
      <option value="d_saltrejection">41D Salt Rejection &nbsp;</option>
      <option value="e_saltrejection">41E Salt Rejection &nbsp;</option>
      <option value="f_saltrejection">41F Salt Rejection &nbsp;</option>
      <option value="g_saltrejection">41G Salt Rejection &nbsp;</option>
      <option value="h_saltrejection">41H Salt Rejection &nbsp;</option>
      <option value="i_saltrejection">41I Salt Rejection &nbsp;</option>
      <option value="j_saltrejection">41J Salt Rejection &nbsp;</option>
      <option value="k_saltrejection">41K Salt Rejection &nbsp;</option>
      <option value="x" class="pheading" disabled>RO Skids Rear EC  &nbsp;</option>
      <option value="a_rear_ec">41A Rear EC &nbsp;</option>
      <option value="b_rear_ec">41B Rear EC &nbsp;</option>
      <option value="c_rear_ec">41C Rear EC &nbsp;</option>
      <option value="d_rear_ec">41D Rear EC &nbsp;</option>
      <option value="e_rear_ec">41E Rear EC &nbsp;</option>
      <option value="f_rear_ec">41F Rear EC &nbsp;</option>
      <option value="g_rear_ec">41G Rear EC &nbsp;</option>
      <option value="h_rear_ec">41H Rear EC &nbsp;</option>
      <option value="i_rear_ec">41I Rear EC &nbsp;</option>
      <option value="j_rear_ec">41J Rear EC &nbsp;</option>
      <option value="k_rear_ec">41K Rear EC &nbsp;</option>
      <option value="x" class="pheading" disabled>RO Feed &nbsp;</option>
      <option value="north_rofeed"> RO North Line Flow &nbsp;</option>
      <option value="south_rofeed">RO South Line Flow &nbsp;</option>
      <option value="north_orp206">North Line ORP-206 &nbsp;</option>
      <option value="north_orp_202">North Line ORP-202 &nbsp;</option>
      <option value="south_orp206">South Line ORP-206 &nbsp;</option>
      <option value="south_orp202">South Line ORP-202 &nbsp;</option>
      <option value="north_temp">North Line Temp. &nbsp;</option>
      <option value="south_temp">South Line Temp.&nbsp;</option>
      <option value="north_ec">North Line EC &nbsp;</option>
      <option value="south_ec">South Line EC &nbsp;</option>
      <option value="plant_capacity">Plant Capacity Factor &nbsp;</option>
    </select>
    </div> </div>
   </td><td style="text-align: center;">
         
                              <!-- Button trigger modal series 11-->
                        <span id="panel11" style="display: none;">
                        <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal" data-bs-target="#modal-series11">
                        <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
<!-- Modal series 11-->
<div class="modal fade" id="modal-series11" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header modelheader11" style="background-color: rgb(7, 23, 237);">
<h5 class="modal-title" id="seriestitle10">  &nbsp;</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

<div class="row mb-2">
<label for="chart_type11" class="col-sm-4 col-form-label">Chart Type</label>
<div class="col-sm-4">
<select class="chart_render form-control form-select" id="chart_type11">
<option value="spline" selected="">Line</option>
<option value="areaspline">Area </option>          
<option value="column">Column </option> 
<option value="scatter">Scatter </option>        
</select>  
</div>
</div>

<div class="row mb-2">
<label for="line_width11" class="col-sm-4 col-form-label">Line Width</label>
<div class="col-sm-4">
<input type="number" id="line_width11" class="chart_render form-control" value="2.0" min="0" max="4" step="0.1">  
</div>
</div>
<div class="row mb-2">
<label for="marker11" class="col-sm-4 col-form-label">Marker Weight</label>
<div class="col-sm-4">
<input type="number" id="marker11" class="chart_render form-control" value="0.5" min="0" step="0.1" max="4"> 
</div>
</div>
<div class="row mb-2">
<label for="marker_shape11" class="col-sm-4 col-form-label">Marker Shape</label>
<div class="col-sm-4">
<select id="marker_shape11" class="chart_render form-control form-select">
<option value="circle">Circle </option>
<option value="square">Square </option>
<option value="triangle" selected="">Trianlge </option>
<option value="diamond">Diamond </option>
</select>
</div>
</div>
<div class="row mb-2">
<div class="input-group">

<input type="checkbox" class="chart_render form-check-input col-auto" id="dt_label11"> 
<label for="dt_label11" class="form-check-label col-auto">&nbsp; Show Data Labels</label>
</div>
</div>

<div class="row mb-2">
<div class="input-group">
<input type="checkbox" class="chart_render form-check-input col-auto" id="y_axis11">
<label for="y_axis11" class="form-check-label col-auto">&nbsp; Show Y-axis</label>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

</div>
</div>
</div>
</div>
<!-- modal end here  11-->
  
                   </div></td>
                  
                     
                  <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length11" style="display: none;"></span></td>
                  <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max11" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min11" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg11" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit11"> </span> </td>
        
  </tr>

  <tr class="tr12 table-secondary">      
    <td><div class="input-group">
    <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line12" checked> 
      &nbsp;12<input type="color" id="pen12" name="pen12" value="#FFC312" class="chart_render series-color" style="display: none;"> &nbsp; </div> 
    <div class="col-auto"> 
    <select class="query form-control form-control-sm form-select" id="ufdata12" style="display: none;">
      <option value="north_dbnpa_flow" >DBNPA North Line Flow &nbsp;</option>
      <option value="south_dbnpa_flow" >DBNPA South Line Flow   &nbsp;</option>
      <option value="north_dbnpa_rate" >DBNPA North Line Dosing rate &nbsp;</option>
      <option value="south_dbnpa_rate">DBNPA South Line Dosing rate &nbsp;</option>
      <option value="north_sbs_flow" >SBS North Line Flow &nbsp;</option>
      <option value="south_sbs_flow">SBS South Line Flow   &nbsp;</option>
      <option value="north_sbs_rate" >SBS North Line Dosing rate &nbsp;</option>
      <option value="south_sbs_rate">SBS South Line Dosing rate &nbsp;</option>
      <option value="none" disabled class="pheading">RO skids DPI   &nbsp;</option>
      <option value="a_dpi">41A DPI-906   &nbsp;</option>
      <option value="b_dpi" >41B DPI-906   &nbsp;</option>
      <option value="c_dpi">41C DPI-906   &nbsp;</option>
      <option value="d_dpi">41D DPI-906   &nbsp;</option>
      <option value="e_dpi" >41E DPI-906   &nbsp;</option>
      <option value="f_dpi">41F DPI-906   &nbsp;</option>
      <option value="g_dpi" >41G DPI-906   &nbsp;</option>
      <option value="h_dpi">41H DPI-906   &nbsp;</option>
      <option value="i_dpi" >41I DPI-906   &nbsp;</option>
      <option value="j_dpi" >41J DPI-906   &nbsp;</option>
      <option value="k_dpi" >41K DPI-906   &nbsp;</option>
      <option value="x" class="pheading" disabled>Salt Rejection  &nbsp;</option>
      <option value="a_saltrejection">41A Salt Rejection &nbsp;</option>
      <option value="b_saltrejection">41B Salt Rejection &nbsp;</option>
      <option value="c_saltrejection" >41C Salt Rejection &nbsp;</option>
      <option value="d_saltrejection">41D Salt Rejection &nbsp;</option>
      <option value="e_saltrejection">41E Salt Rejection &nbsp;</option>
      <option value="f_saltrejection">41F Salt Rejection &nbsp;</option>
      <option value="g_saltrejection">41G Salt Rejection &nbsp;</option>
      <option value="h_saltrejection">41H Salt Rejection &nbsp;</option>
      <option value="i_saltrejection">41I Salt Rejection &nbsp;</option>
      <option value="j_saltrejection">41J Salt Rejection &nbsp;</option>
      <option value="k_saltrejection">41K Salt Rejection &nbsp;</option>
      <option value="x" class="pheading" disabled>RO Skids Rear EC  &nbsp;</option>
      <option value="a_rear_ec">41A Rear EC &nbsp;</option>
      <option value="b_rear_ec">41B Rear EC &nbsp;</option>
      <option value="c_rear_ec">41C Rear EC &nbsp;</option>
      <option value="d_rear_ec">41D Rear EC &nbsp;</option>
      <option value="e_rear_ec">41E Rear EC &nbsp;</option>
      <option value="f_rear_ec">41F Rear EC &nbsp;</option>
      <option value="g_rear_ec">41G Rear EC &nbsp;</option>
      <option value="h_rear_ec">41H Rear EC &nbsp;</option>
      <option value="i_rear_ec">41I Rear EC &nbsp;</option>
      <option value="j_rear_ec">41J Rear EC &nbsp;</option>
      <option value="k_rear_ec">41K Rear EC &nbsp;</option>
      <option value="x" class="pheading" disabled>RO Feed &nbsp;</option>
      <option value="north_rofeed"> RO North Line Flow &nbsp;</option>
      <option value="south_rofeed">RO South Line Flow &nbsp;</option>
      <option value="north_orp206">North Line ORP-206 &nbsp;</option>
      <option value="north_orp_202">North Line ORP-202 &nbsp;</option>
      <option value="south_orp206">South Line ORP-206 &nbsp;</option>
      <option value="south_orp202">South Line ORP-202 &nbsp;</option>
      <option value="north_temp" selected="">North Line Temp. &nbsp;</option>
      <option value="south_temp">South Line Temp.&nbsp;</option>
      <option value="north_ec">North Line EC &nbsp;</option>
      <option value="south_ec">South Line EC &nbsp;</option>
      <option value="plant_capacity">Plant Capacity Factor &nbsp;</option>
      <option value="feed_side_dbnpa">DBNPA-Feed &nbsp;</option>
      
    </select>
    </div> </div>
   </td><td style="text-align: center;">
         
                              <!-- Button trigger modal series 12-->
                        <span id="panel12" style="display: none;">
                        <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal" data-bs-target="#modal-series12">
                        <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
<!-- Modal series 12-->
<div class="modal fade" id="modal-series12" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header modelheader12" style="background-color: rgb(7, 23, 237);">
<h5 class="modal-title" id="seriestitle12">  &nbsp;</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

<div class="row mb-2">
<label for="chart_type12" class="col-sm-4 col-form-label">Chart Type</label>
<div class="col-sm-4">
<select class="chart_render form-control form-select" id="chart_type12">
<option value="spline" >Line</option>
<option value="areaspline">Area </option>          
<option value="column">Column </option> 
<option value="scatter" selected="">Scatter </option>        
</select>  
</div>
</div>

<div class="row mb-2">
<label for="line_width12" class="col-sm-4 col-form-label">Line Width</label>
<div class="col-sm-4">
<input type="number" id="line_width12" class="chart_render form-control" value="0" min="0" max="4" step="0.1">  
</div>
</div>
<div class="row mb-2">
<label for="marker12" class="col-sm-4 col-form-label">Marker Weight</label>
<div class="col-sm-4">
<input type="number" id="marker12" class="chart_render form-control" value="4" min="0" step="0.1" max="4"> 
</div>
</div>
<div class="row mb-2">
<label for="marker_shape12" class="col-sm-4 col-form-label">Marker Shape</label>
<div class="col-sm-4">
<select id="marker_shape12" class="chart_render form-control form-select">
<option value="circle" selected="">Circle </option>
<option value="square">Square </option>
<option value="triangle" >Trianlge </option>
<option value="diamond" >Diamond </option>
</select>
</div>
</div>
<div class="row mb-2">
<div class="input-group">

<input type="checkbox" class="chart_render form-check-input col-auto" id="dt_label12"> 
<label for="dt_label12" class="form-check-label col-auto">&nbsp; Show Data Labels</label>
</div>
</div>

<div class="row mb-2">
<div class="input-group">
<input type="checkbox" class="chart_render form-check-input col-auto" id="y_axis12" checked>
<label for="y_axis12" class="form-check-label col-auto">&nbsp; Show Y-axis</label>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

</div>
</div>
</div>
</div>
<!-- modal end here  12-->
  
                   </div></td>
                  
                     
                  <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length12" style="display: none;"></span></td>
                  <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max12" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min12" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg12" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit12"> </span> </td>
        
  </tr>



  <tr class="tr13 table-secondary">      
    <td><div class="input-group">
    <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line13"> 
      &nbsp;13<input type="color" id="pen13" name="pen13" value="#00b894" class="chart_render series-color" style="display: none;"> &nbsp; </div> 
    <div class="col-auto"> 
    <select class="query form-control form-control-sm form-select" id="ufdata13" style="display: none;">
      <option value="north_dbnpa_flow" >DBNPA North Line Flow &nbsp;</option>
      <option value="south_dbnpa_flow" >DBNPA South Line Flow   &nbsp;</option>
      <option value="north_dbnpa_rate" >DBNPA North Line Dosing rate &nbsp;</option>
      <option value="south_dbnpa_rate">DBNPA South Line Dosing rate &nbsp;</option>
      <option value="north_sbs_flow" >SBS North Line Flow &nbsp;</option>
      <option value="south_sbs_flow">SBS South Line Flow   &nbsp;</option>
      <option value="north_sbs_rate" >SBS North Line Dosing rate &nbsp;</option>
      <option value="south_sbs_rate">SBS South Line Dosing rate &nbsp;</option>
      <option value="none" disabled class="pheading">RO skids DPI   &nbsp;</option>
      <option value="a_dpi">41A DPI-906   &nbsp;</option>
      <option value="b_dpi" >41B DPI-906   &nbsp;</option>
      <option value="c_dpi">41C DPI-906   &nbsp;</option>
      <option value="d_dpi">41D DPI-906   &nbsp;</option>
      <option value="e_dpi" >41E DPI-906   &nbsp;</option>
      <option value="f_dpi">41F DPI-906   &nbsp;</option>
      <option value="g_dpi" >41G DPI-906   &nbsp;</option>
      <option value="h_dpi">41H DPI-906   &nbsp;</option>
      <option value="i_dpi" >41I DPI-906   &nbsp;</option>
      <option value="j_dpi" >41J DPI-906   &nbsp;</option>
      <option value="k_dpi" >41K DPI-906   &nbsp;</option>
      <option value="x" class="pheading" disabled>Salt Rejection  &nbsp;</option>
      <option value="a_saltrejection">41A Salt Rejection &nbsp;</option>
      <option value="b_saltrejection">41B Salt Rejection &nbsp;</option>
      <option value="c_saltrejection" >41C Salt Rejection &nbsp;</option>
      <option value="d_saltrejection">41D Salt Rejection &nbsp;</option>
      <option value="e_saltrejection">41E Salt Rejection &nbsp;</option>
      <option value="f_saltrejection">41F Salt Rejection &nbsp;</option>
      <option value="g_saltrejection">41G Salt Rejection &nbsp;</option>
      <option value="h_saltrejection">41H Salt Rejection &nbsp;</option>
      <option value="i_saltrejection">41I Salt Rejection &nbsp;</option>
      <option value="j_saltrejection">41J Salt Rejection &nbsp;</option>
      <option value="k_saltrejection">41K Salt Rejection &nbsp;</option>
      <option value="x" class="pheading" disabled>RO Skids Rear EC  &nbsp;</option>
      <option value="a_rear_ec">41A Rear EC &nbsp;</option>
      <option value="b_rear_ec">41B Rear EC &nbsp;</option>
      <option value="c_rear_ec">41C Rear EC &nbsp;</option>
      <option value="d_rear_ec">41D Rear EC &nbsp;</option>
      <option value="e_rear_ec">41E Rear EC &nbsp;</option>
      <option value="f_rear_ec">41F Rear EC &nbsp;</option>
      <option value="g_rear_ec">41G Rear EC &nbsp;</option>
      <option value="h_rear_ec">41H Rear EC &nbsp;</option>
      <option value="i_rear_ec">41I Rear EC &nbsp;</option>
      <option value="j_rear_ec">41J Rear EC &nbsp;</option>
      <option value="k_rear_ec">41K Rear EC &nbsp;</option>
      <option value="x" class="pheading" disabled>RO Feed &nbsp;</option>
      <option value="north_rofeed"> RO North Line Flow &nbsp;</option>
      <option value="south_rofeed">RO South Line Flow &nbsp;</option>
      <option value="north_orp206">North Line ORP-206 &nbsp;</option>
      <option value="north_orp_202">North Line ORP-202 &nbsp;</option>
      <option value="south_orp206">South Line ORP-206 &nbsp;</option>
      <option value="south_orp202">South Line ORP-202 &nbsp;</option>
      <option value="north_temp" selected="">North Line Temp. &nbsp;</option>
      <option value="south_temp">South Line Temp.&nbsp;</option>
      <option value="north_ec">North Line EC &nbsp;</option>
      <option value="south_ec">South Line EC &nbsp;</option>
      <option value="plant_capacity">Plant Capacity Factor &nbsp;</option>
      <option value="brine_side_dbnpa">DBNPA-Brine &nbsp;</option>
    </select>
    </div> </div>
   </td><td style="text-align: center;">
         
                              <!-- Button trigger modal series 12-->
                        <span id="panel13" style="display: none;">
                        <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal" data-bs-target="#modal-series13">
                        <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
<!-- Modal series 13-->
<div class="modal fade" id="modal-series13" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header modelheader13" style="background-color: rgb(7, 23, 237);">
<h5 class="modal-title" id="seriestitle13">  &nbsp;</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

<div class="row mb-2">
<label for="chart_type13" class="col-sm-4 col-form-label">Chart Type</label>
<div class="col-sm-4">
<select class="chart_render form-control form-select" id="chart_type13">
<option value="spline" >Line</option>
<option value="areaspline">Area </option>          
<option value="column">Column </option> 
<option value="scatter" selected="">Scatter </option>        
</select>  
</div>
</div>

<div class="row mb-2">
<label for="line_width13" class="col-sm-4 col-form-label">Line Width</label>
<div class="col-sm-4">
<input type="number" id="line_width13" class="chart_render form-control" value="0" min="0" max="4" step="0.1">  
</div>
</div>
<div class="row mb-2">
<label for="marker13" class="col-sm-4 col-form-label">Marker Weight</label>
<div class="col-sm-4">
<input type="number" id="marker13" class="chart_render form-control" value="4" min="0" step="0.1" max="4"> 
</div>
</div>
<div class="row mb-2">
<label for="marker_shape13" class="col-sm-4 col-form-label">Marker Shape</label>
<div class="col-sm-4">
<select id="marker_shape13" class="chart_render form-control form-select">
<option value="circle" selected="">Circle </option>
<option value="square" >Square </option>
<option value="triangle" >Trianlge </option>
<option value="diamond">Diamond </option>
</select>
</div>
</div>
<div class="row mb-2">
<div class="input-group">

<input type="checkbox" class="chart_render form-check-input col-auto" id="dt_label13"> 
<label for="dt_label13" class="form-check-label col-auto">&nbsp; Show Data Labels</label>
</div>
</div>

<div class="row mb-2">
<div class="input-group">
<input type="checkbox" class="chart_render form-check-input col-auto" id="y_axis13">
<label for="y_axis13" class="form-check-label col-auto">&nbsp; Show Y-axis</label>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

</div>
</div>
</div>
</div>
<!-- modal end here  13-->
  
                   </div></td>
                  
                     
                  <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length13" style="display: none;"></span></td>
                  <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max13" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min13" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg13" style="display: none;"></span> </td>
                  <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit13"> </span> </td>
        
  </tr>

      </tbody>
    </table>  	
   
    <div style="margin-bottom:100px">

    </div>
  
  
  <!-- Modal chart global settings-->
  <div class="modal fade" id="sajid" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" style="background-color: green;">
          <h5 class="modal-title" id="staticBackdropLabel">Chart Global Settings</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
  <div class="row mb-2">
      <label for="pen_main" class="col-sm-5 col-form-label">Background Color</label>  
      <div class="col-sm-4">
       <input type="color" id="pen_main" name="chart_background" value="#000000" class="chart_render series-color"> 
      </div>
  </div>
  
  <div class="row mb-2">
      <label for="pen_grid" class="col-sm-5 col-form-label">Grid Lines Color</label>
      <div class="col-sm-4">
       <input type="color" id="pen_grid" name="grid_background" value="#8a8b89" class="chart_render series-color">
      </div>
  </div>
  
  <div class="row mb-2">
      <label for="is_legend" class="col-sm-5 col-form-label">Show Legends</label>
      <div class="col-sm-4">
        <input type="checkbox" id="is_legend" name="is_legend" checked="" class="chart_render main-chk">
      </div>
  </div>
  <div class="row mb-2">
      <label for="is_main_yaxis" class="col-sm-5 col-form-label">Y-axis % &nbsp;<i class="fa fa-area-chart" aria-hidden="true"></i></label>
      <div class="col-sm-4">
        <input type="checkbox" id="is_main_yaxis" name="is_main_yaxis" class="chart_render main-chk">
      </div>
  </div>
  
  <div class="row mb-2">
      <label for="export_width" class="col-sm-5 col-form-label">Export Width &nbsp;<i class="fa fa-download" aria-hidden="true"></i></label>
      <div class="col-sm-4">
        <input type="number" id="export_width" class="chart_render form-control" min="500" step="50" value="1400">
      </div>
  </div>
  <div class="row mb-2">
      <label for="export_height" class="col-sm-5 col-form-label">Export Height &nbsp;<i class="fa fa-download" aria-hidden="true"></i></label>
      <div class="col-sm-4">
         <input type="number" id="export_height" class="chart_render form-control" min="400" step="50" value="600"> 
      </div>
  </div>
  <div class="row mb-2">
      <label for="pen_export" class="col-sm-5 col-form-label">Background Color &nbsp;<i class="fa fa-download" aria-hidden="true"></i></label>
      <div class="col-sm-4">
         <input type="color" id="pen_export" name="chart_background_export" value="#FAFAFA" class="chart_render series-color">
      </div>
  </div>
  <div class="row mb-2">
      <label for="pen_export_title" class="col-sm-5 col-form-label">Title Color &nbsp;<i class="fa fa-download" aria-hidden="true"></i></label>
      <div class="col-sm-4">
        <input type="color" id="pen_export_title" name="chart_background_title" value="#c61010" class="chart_render series-color">
      </div>
  </div>
  <div class="row mb-2">
    <label for="chr_title" class="col-sm-5 col-form-label">Title &nbsp;<i class="fa fa-download" aria-hidden="true"></i></label>
    <div class="col-sm-4">
      <input type="text" id="chr_title" name="chr_title" value="EC & DP" class="chart_render series-color">
    </div>
</div>
  
  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>
  
  
  <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark" style="background-color:rgba(0, 0, 0, 0.8)">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item" style="margin-top:8px">
          </li>
          <li class="nav-item dropup">
            <a class="nav-link" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bars" aria-hidden="true" style="color:rgb(121, 119, 119);"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdown10">
              <li><a  href="{{ url('/register') }}"  style="text-decoration: none;" class="dropdown-item menu ">
               <i class="ancher fa fa-user-plus" aria-hidden="true"></i>&nbsp;Add New User</a></li>
              <li><a class="dropdown-item" href="#">User Profile</a></li>
              <li><a class="dropdown-item" href="#">
                <i class="fa fa-key" aria-hidden="true"></i>&nbsp;Change Password</a></li>
              <li><a class="dropdown-item" href="#">Admin</a></li>
              <li>
                <form class="" method="POST" action="/logout" >
                    @csrf
                    <button type="submit" class="dropdown-item menu">
                    <i class="fa fa-sign-out" aria-hidden="true" style="color:rgb(18, 17, 17);"></i> &nbsp;Logout</button>
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
            <div class="col-auto" style="margin-right:5px;">
                <!-- Button trigger modal -->   
            <div class="input-group">
            <span class="btn btn-sm badge-light3d" data-bs-toggle="modal" data-bs-target="#sajid" style="margin-bottom:3px;">Global &nbsp;<i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span>
            </div>
    </div> </li>
    <li class="nav-item">
    <div class="col-auto" style="margin-right:8px;">
      <div class="input-group input-group-sm">
        <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">From</div>

        <input type="datetime-local" name="start_date" class="tensor-flow form-control form-control-sm" id="start_date" value="2023-12-24 00:00" min="2016-01-01 00:00" max="2027-11-10 00:00" required="" style="background-color:#dff9fb;">
      </div>
    </div> </li>
    <li class="nav-item">
    <div class="col-auto" style="margin-right:5px;">
      <div class="input-group input-group-sm">
        <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">To</div>
        <input type="datetime-local" name="end_date" id="end_date" value="2024-01-31 23:59" min="2016-01-31" max="2027-03-30" class="tensor-flow form-control form-control-sm" required="" style="background-color:#dff9fb;">
      </div>
    </div> </li>
    <li class="nav-item">
    <div class="col-auto" style="margin-right:15px;">
      <div class="input-group input-group-sm">
        <button id="query_fire" class="query_fire btn btn-warning btn-sm form-check">
          <i class="fa fa-rocket" aria-hidden="true" style="color:black;"></i>&nbsp; Send Query</button>
      </div>
    </div>
          </li>

          <li class="nav-item">
            <div class="col-auto" style="margin-right:15px;">
              <div class="input-group input-group-sm">
                <button id="dpi_query" class="btn btn-danger btn-sm form-check">
                  <i class="fa fa-sliders" aria-hidden="true" style="color:black;"></i>&nbsp; Skid Dpi</button>
              </div>
            </div>
                  </li>
                  <li class="nav-item">
                    <div class="col-auto" style="margin-right:15px;">
                      <div class="input-group input-group-sm">
                        <button id="ec_query" class="btn btn-primary btn-sm form-check">
                          <i class="fa fa-sliders" aria-hidden="true" style="color:black;"></i>&nbsp; Skid EC</button>
                      </div>
                    </div>
                          </li>

                          <li class="nav-item">
                            <div class="col-auto" style="margin-right:15px;">
                              <div class="input-group input-group-sm">
                                <button id="salt_rejection_query" class="btn btn-info btn-sm form-check">
                                  <i class="fa fa-sliders" aria-hidden="true" style="color:black;"></i>&nbsp; Salt Rejection</button>
                              </div>
                            </div>
                                  </li>


        </ul>
      </div>
    </div>
  </nav>
  
  <script type="text/javascript" src="{{asset('js/stream/dbnpa_online_test.js') }}"></script>
  
  </body>
</html>

