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
<title> Lab CW Export </title>
</head>
<body style="font-family: calibri;" class="">
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
          <th>&nbsp;&nbsp; Frequency &nbsp;&nbsp;</th>
          <th>&nbsp;&nbsp; Normal Range &nbsp;&nbsp;</th>
          
      </tr>
      </thead>
        <tbody> 
  <tr class="tr1 table-light">      
                  <td><div class="input-group">
                  <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line1" checked="">
                   &nbsp;1 &nbsp;<input type="color" id="pen1" name="pen1" value="#d99608" class="chart_render series-color"> &nbsp; </div>
                  <div class="col-auto"> 
  <select class="query form-control form-control-sm form-select" id="ufdata1">
    <option value="turb_lab" class="lab">Turbidity Lab </option>
    <option value="turb_ait200a" class="dcs">Turbidity Online AIT_200A </option>
    <option value="turb_ait200b" class="dcs">Turbidity Online AIT_200B </option>
    <option value="ph_lab" class="lab">pH Lab </option>
    <option value="ph_201a" class="dcs">pH Online AIT_201A </option>
    <option value="ph_201b" class="dcs">pH Online AIT_201B </option>
    <option value="frc_lab"  class="lab">FRC Lab </option>
    <option value="frc_ait203a" class="dcs">FRC Online AIC_203A </option>
    <option value="frc_ait203b" class="dcs">FRC Online AIC_203B </option>
    <option value="ec_lab" class="lab">Conductivity Lab </option>
    <option value="ec_ait202a" class="dcs">Conductivity Online AIT_202A </option>
    <option value="ec_ait202b" class="dcs">Conductivity Online AIT_202B </option>
    <option value="tot_alk" class="lab">Total Alkalinity Lab</option>
    <option value="tot_alkait204" class="dcs">Total Alkalinity Online AIT_204 </option>
    <option value="tot_hardness" class="lab">Total Hardness Lab </option>
    <option value="cah_lab" class="lab">CaH Lab </option>
    <option value="ca_lab" class="lab">Ca Lab </option>
    <option value="tds_lab" class="lab">TDS Lab </option>
    <option value="chloride_lab" class="lab">Chloride Lab </option>
    <option value="lsi_lab" selected="" class="lab">LSI Lab </option>
    <option value="temp_ti202" class="dcs">Temperature Online TI_202 </option>
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
          <h5 class="modal-title" id="seriestitle1">Series 1: Filtrated Water Turbidity   &nbsp;</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
  
  
    <div class="row mb-2">
      <label for="chart_type1" class="chart_render col-sm-4 col-form-label">Chart Type</label>
      <div class="col-sm-4">
        <select class="chart_render form-control form-select" id="chart_type1">
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
      <input type="number" id="line_width1" class="chart_render rednder form-control" value="0.5" min="0" max="4" step="0.1">  
      </div>
    </div>
     <div class="row mb-2">
      <label for="marker1" class="col-sm-4 col-form-label">Marker Weight</label>
      <div class="col-sm-4">
      <input type="number" id="marker1" class="chart_render form-control" value="2.5" min="0" step="0.1" max="4"> 
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
                  
                     
                  <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length1"></span></td>
                  <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max1"></span> </td>
                  <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min1"></span> </td>
                  <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg1"></span> </td>
                  <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit1"></span> </td>
                  <td style="text-align: center; background-color: black; color:#ced6e0;"> <span id="frequency1"></span> </td>
                  <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="norms1"></span> </td>
                  
        
  </tr>
  <tr class="tr2 table-light">      
                  <td><div class="input-group">
                  <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line2" checked=""> 
                    &nbsp;2 &nbsp;<input type="color" id="pen2" name="pen2" value="#302df0" class="chart_render series-color"> &nbsp; </div>
                  <div class="col-auto"> 
                   <select class="query form-control form-control-sm form-select" id="ufdata2">
                    <option value="turb_lab" class="lab">Turbidity Lab </option>
                    <option value="turb_ait200a" class="dcs">Turbidity Online AIT_200A </option>
                    <option value="turb_ait200b" class="dcs">Turbidity Online AIT_200B </option>
                    <option value="ph_lab" class="lab">pH Lab </option>
                    <option value="ph_201a" class="dcs">pH Online AIT_201A </option>
                    <option value="ph_201b" class="dcs">pH Online AIT_201B </option>
                    <option value="frc_lab" class="lab">FRC Lab </option>
                    <option value="frc_ait203a" class="dcs">FRC Online AIC_203A </option>
                    <option value="frc_ait203b" class="dcs">FRC Online AIC_203B </option>
                    <option value="ec_lab" class="lab">Conductivity Lab </option>
                    <option value="ec_ait202a" class="dcs">Conductivity Online AIT_202A </option>
                    <option value="ec_ait202b" class="dcs">Conductivity Online AIT_202B </option>
                    <option value="tot_alk" selected="" class="lab">Total Alkalinity Lab</option>
                    <option value="tot_alkait204" class="dcs">Total Alkalinity Online AIT_204 </option>
                    <option value="tot_hardness" class="lab">Total Hardness Lab </option>
                    <option value="cah_lab" class="lab">CaH Lab </option>
                    <option value="ca_lab" class="lab">Ca Lab </option>
                    <option value="tds_lab" class="lab">TDS Lab </option>
                    <option value="chloride_lab" class="lab">Chloride Lab </option>
                    <option value="lsi_lab" class="lab">LSI Lab </option>
                    <option value="temp_ti202" class="dcs">Temperature Online TI_202 </option>
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
      <input type="number" id="line_width2" class="chart_render form-control" value="1.8" min="0" max="4" step="0.1">  
      </div>
    </div>
     <div class="row mb-2">
      <label for="marker1" class="col-sm-4 col-form-label">Marker Weight</label>
      <div class="col-sm-4">
      <input type="number" id="marker2" class="chart_render form-control" value="2.5" min="0" step="0.1" max="4"> 
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
                    
                  
                     
                   <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length2"></span></td>
                   <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max2"></span> </td>
                   <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min2"></span> </td>
                   <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg2"></span> </td>
                   <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit2"></span> </td>
                   <td style="text-align: center; background-color: black; color:#ced6e0;"> <span id="frequency2"></span> </td>
                   <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="norms2"></span> </td>
        
  </tr>
  <tr class="tr3 table-light">      
                  <td><div class="input-group">
                  <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line3" checked=""> 
                    &nbsp;3 &nbsp;<input type="color" id="pen3" name="pen3" value="#cf0202" class="chart_render series-color"> &nbsp; </div>
                  <div class="col-auto"> 
                   <select class="query form-control form-control-sm form-select" id="ufdata3">
                    <option value="turb_lab" class="lab">Turbidity Lab </option>
                    <option value="turb_ait200a" class="dcs">Turbidity Online AIT_200A </option>
                    <option value="turb_ait200b" class="dcs">Turbidity Online AIT_200B </option>
                    <option value="ph_lab" class="lab">pH Lab </option>
                    <option value="ph_201a" class="dcs">pH Online AIT_201A </option>
                    <option value="ph_201b" class="dcs">pH Online AIT_201B </option>
                    <option value="frc_lab" class="lab">FRC Lab </option>
                    <option value="frc_ait203a" class="dcs">FRC Online AIC_203A </option>
                    <option value="frc_ait203b" class="dcs">FRC Online AIC_203B </option>
                    <option value="ec_lab"  class="lab">Conductivity Lab </option>
                    <option value="ec_ait202a" class="dcs">Conductivity Online AIT_202A </option>
                    <option value="ec_ait202b" class="dcs">Conductivity Online AIT_202B </option>
                    <option value="tot_alk" class="lab">Total Alkalinity Lab</option>
                    <option value="tot_alkait204" class="dcs">Total Alkalinity Online AIT_204 </option>
                    <option value="tot_hardness" class="lab">Total Hardness Lab </option>
                    <option value="cah_lab" class="lab">CaH Lab </option>
                    <option value="ca_lab" class="lab">Ca Lab </option>
                    <option value="tds_lab" class="lab">TDS Lab </option>
                    <option value="chloride_lab" class="lab">Chloride Lab </option>
                    <option value="lsi_lab" class="lab">LSI Lab </option>
                    <option value="temp_ti202" selected="" class="dcs">Temperature Online TI_202 </option>
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
            <option value="spline">Line</option>
            <option value="areaspline">Area </option>          
            <option value="column">Column </option> 
            <option value="scatter" selected="">Scatter </option>      
          </select>  
      </div>
    </div>
  
    <div class="row mb-2">
      <label for="line_width3" class="chart_render col-sm-4 col-form-label">Line Width</label>
      <div class="col-sm-4">
      <input type="number" id="line_width3" class="rednder form-control" value="1.2" min="0" max="4" step="0.1">  
      </div>
    </div>
     <div class="row mb-2">
      <label for="marker3" class="col-sm-4 col-form-label">Marker Weight</label>
      <div class="col-sm-4">
      <input type="number" id="marker3" class="chart_render form-control" value="2.5" min="0" step="0.1" max="4"> 
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
                   <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length3"></span></td>
                   <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max3"></span> </td>
                   <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min3"></span> </td>
                   <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg3"></span> </td>
                   <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit3"></span> </td>
                   <td style="text-align: center; background-color: black; color:#ced6e0;"> <span id="frequency3"></span> </td>
                   <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="norms3"></span> </td>
  </tr>
  <tr class="tr4 table-secondary">      
                  <td><div class="input-group">
                  <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line4" checked=""> 
                    &nbsp;4 &nbsp;<input type="color" id="pen4" name="pen4" value="#32ff7e" class="chart_render series-color" style="display: none;"> &nbsp; </div>
                  <div class="col-auto"> 
                   <select class="query form-control form-control-sm form-select" id="ufdata4" style="display: none;">
                    <option value="turb_lab"  class="lab">Turbidity Lab </option>
                    <option value="turb_ait200a" class="dcs">Turbidity Online AIT_200A </option>
                    <option value="turb_ait200b" class="dcs">Turbidity Online AIT_200B </option>
                    <option value="ph_lab" selected="" class="lab">pH Lab </option>
                    <option value="ph_201a" class="dcs">pH Online AIT_201A </option>
                    <option value="ph_201b" class="dcs">pH Online AIT_201B </option>
                    <option value="frc_lab" class="lab">FRC Lab </option>
                    <option value="frc_ait203a" class="dcs">FRC Online AIC_203A </option>
                    <option value="frc_ait203b" class="dcs">FRC Online AIC_203B </option>
                    <option value="ec_lab" class="lab">Conductivity Lab </option>
                    <option value="ec_ait202a" class="dcs">Conductivity Online AIT_202A </option>
                    <option value="ec_ait202b" class="dcs">Conductivity Online AIT_202B </option>
                    <option value="tot_alk" class="lab">Total Alkalinity Lab</option>
                    <option value="tot_alkait204" class="dcs">Total Alkalinity Online AIT_204 </option>
                    <option value="tot_hardness" class="lab">Total Hardness Lab </option>
                    <option value="cah_lab" class="lab">CaH Lab </option>
                    <option value="ca_lab" class="lab">Ca Lab </option>
                    <option value="tds_lab" class="lab">TDS Lab </option>
                    <option value="chloride_lab" class="lab">Chloride Lab </option>
                    <option value="lsi_lab" class="lab">LSI Lab </option>
                    <option value="temp_ti202" class="dcs">Temperature Online TI_202 </option>
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
             <option value="spline">Line</option>
            <option value="areaspline">Area </option>          
            <option value="column">Column </option> 
            <option value="scatter" selected="">Scatter </option>          
          </select>  
      </div>
    </div>
  
    <div class="row mb-2">
      <label for="line_width4" class="col-sm-4 col-form-label">Line Width</label>
      <div class="col-sm-4">
      <input type="number" id="line_width4" class="chart_render form-control" value="1.5" min="0" max="4" step="0.1">  
      </div>
    </div>
     <div class="row mb-2">
      <label for="marker4" class="col-sm-4 col-form-label">Marker Weight</label>
      <div class="col-sm-4">
      <input type="number" id="marker4" class="chart_render form-control" value="2.5" min="0" step="0.1" max="4"> 
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
                   <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length4"></span></td>
                   <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max4"></span> </td>
                   <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min4"></span> </td>
                   <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg4"></span> </td>
                   <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit4"></span> </td>
                   <td style="text-align: center; background-color: black; color:#ced6e0;"> <span id="frequency4"></span> </td>
                   <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="norms4"></span> </td>
  </tr>
  <tr class="tr5 table-secondary">      
                  <td><div class="input-group">
                  <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line5"> 
                    &nbsp;5 &nbsp;<input type="color" id="pen5" name="pen5" value="#f5ed05" class="chart_render series-color" style="display: none;"> &nbsp; </div>
                  <div class="col-auto"> 
                   <select class="query form-control form-control-sm form-select" id="ufdata5" style="display: none;">
                    <option value="turb_lab" class="lab">Turbidity Lab </option>
                    <option value="turb_ait200a" class="dcs">Turbidity Online AIT_200A </option>
                    <option value="turb_ait200b" class="dcs">Turbidity Online AIT_200B </option>
                    <option value="ph_lab" class="lab">pH Lab </option>
                    <option value="ph_201a" class="dcs">pH Online AIT_201A </option>
                    <option value="ph_201b" class="dcs">pH Online AIT_201B </option>
                    <option value="frc_lab" class="lab">FRC Lab </option>
                    <option value="frc_ait203a" class="dcs">FRC Online AIC_203A </option>
                    <option value="frc_ait203b" class="dcs">FRC Online AIC_203B </option>
                    <option value="ec_lab" class="lab">Conductivity Lab </option>
                    <option value="ec_ait202a" class="dcs">Conductivity Online AIT_202A </option>
                    <option value="ec_ait202b" class="dcs">Conductivity Online AIT_202B </option>
                    <option value="tot_alk" class="lab">Total Alkalinity Lab</option>
                    <option value="tot_alkait204" class="dcs">Total Alkalinity Online AIT_204 </option>
                    <option value="tot_hardness" class="lab">Total Hardness Lab </option>
                    <option value="cah_lab" class="lab">CaH Lab </option>
                    <option value="ca_lab" class="lab">Ca Lab </option>
                    <option value="tds_lab" class="lab">TDS Lab </option>
                    <option value="chloride_lab" selected="" class="lab">Chloride Lab </option>
                    <option value="lsi_lab" class="lab">LSI Lab </option>
                    <option value="temp_ti202" class="dcs">Temperature Online TI_202 </option>
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
            <option value="spline">Line</option>
            <option value="areaspline">Area </option>          
            <option value="column">Column </option> 
            <option value="scatter" selected="">Scatter </option>        
          </select>  
      </div>
    </div>
  
    <div class="row mb-2">
      <label for="line_width5" class="col-sm-4 col-form-label">Line Width</label>
      <div class="col-sm-4">
      <input type="number" id="line_width5" class="chart_render form-control" value="0" min="0" max="4" step="0.1">  
      </div>
    </div>
     <div class="row mb-2">
      <label for="marker5" class="col-sm-4 col-form-label">Marker Weight</label>
      <div class="col-sm-4">
      <input type="number" id="marker5" class="chart_render form-control" value="2.5" min="0" step="0.1" max="4"> 
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
                   <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length5"></span></td>
                   <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max5"></span> </td>
                   <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min5"></span> </td>
                   <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg5"></span> </td>
                   <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit5"></span> </td>
                   <td style="text-align: center; background-color: black; color:#ced6e0;"> <span id="frequency5"></span> </td>
                   <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="norms5"></span> </td>
        
  </tr>
  
  <tr class="tr6 table-secondary">      
                  <td><div class="input-group">
                  <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line6"> 
                    &nbsp;6 &nbsp;<input type="color" id="pen6" name="pen6" value="#e27d08" class="chart_render series-color" style="display: none;"> &nbsp; </div> 
                  <div class="col-auto"> 
                  <select class="query form-control form-control-sm form-select" id="ufdata6" style="display: none;">
                    <option value="turb_lab" class="lab">Turbidity Lab </option>
                    <option value="turb_ait200a" class="dcs">Turbidity Online AIT_200A </option>
                    <option value="turb_ait200b" class="dcs">Turbidity Online AIT_200B </option>
                    <option value="ph_lab" class="lab">pH Lab </option>
                    <option value="ph_201a" class="dcs">pH Online AIT_201A </option>
                    <option value="ph_201b" class="dcs">pH Online AIT_201B </option>
                    <option value="frc_lab" class="lab">FRC Lab </option>
                    <option value="frc_ait203a" class="dcs">FRC Online AIC_203A </option>
                    <option value="frc_ait203b" class="dcs">FRC Online AIC_203B </option>
                    <option value="ec_lab" class="lab">Conductivity Lab </option>
                    <option value="ec_ait202a" class="dcs">Conductivity Online AIT_202A </option>
                    <option value="ec_ait202b" class="dcs">Conductivity Online AIT_202B </option>
                    <option value="tot_alk" selected="" class="lab">Total Alkalinity Lab</option>
                    <option value="tot_alkait204" class="dcs">Total Alkalinity Online AIT_204 </option>
                    <option value="tot_hardness" class="lab">Total Hardness Lab </option>
                    <option value="cah_lab" class="lab">CaH Lab </option>
                    <option value="ca_lab" class="lab">Ca Lab </option>
                    <option value="tds_lab" class="lab">TDS Lab </option>
                    <option value="chloride_lab" class="lab">Chloride Lab </option>
                    <option value="lsi_lab" class="lab">LSI Lab </option>
                    <option value="temp_ti202" class="dcs">Temperature Online TI_202 </option>
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
            <option value="spline">Line</option>
            <option value="areaspline">Area </option>          
            <option value="column">Column </option> 
            <option value="scatter" selected="">Scatter </option>        
          </select>  
      </div>
    </div>
  
    <div class="row mb-2">
      <label for="line_width6" class="col-sm-4 col-form-label">Line Width</label>
      <div class="col-sm-4">
      <input type="number" id="line_width6" class="chart_render form-control" value="1.5" min="0" max="4" step="0.1">  
      </div>
    </div>
     <div class="row mb-2">
      <label for="marker6" class="col-sm-4 col-form-label">Marker Weight</label>
      <div class="col-sm-4">
      <input type="number" id="marker6" class="chart_render form-control" value="2.5" min="0" step="0.1" max="4"> 
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
                   <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length6"></span></td>
                   <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max56"></span> </td>
                   <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min6"></span> </td>
                   <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg6"></span> </td>
                   <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit6"></span> </td>
                   <td style="text-align: center; background-color: black; color:#ced6e0;"> <span id="frequency6"></span> </td>
                   <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="norms6"></span> </td>
        
  </tr>
  
  <tr class="tr7 table-secondary">      
                  <td><div class="input-group">
                  <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line7"> 
                    &nbsp;7 &nbsp;<input type="color" id="pen7" name="pen7" value="#0717ed" class="chart_render series-color" style="display: none;"> &nbsp; </div> 
                  <div class="col-auto"> 
                  <select class="query form-control form-control-sm form-select" id="ufdata7" style="display: none;">
                    <option value="turb_lab" class="lab">Turbidity Lab </option>
                    <option value="turb_ait200a" class="dcs">Turbidity Online AIT_200A </option>
                    <option value="turb_ait200b" class="dcs">Turbidity Online AIT_200B </option>
                    <option value="ph_lab" class="lab">pH Lab </option>
                    <option value="ph_201a" class="dcs">pH Online AIT_201A </option>
                    <option value="ph_201b" class="dcs">pH Online AIT_201B </option>
                    <option value="frc_lab" class="lab">FRC Lab </option>
                    <option value="frc_ait203a" class="dcs">FRC Online AIC_203A </option>
                    <option value="frc_ait203b" class="dcs">FRC Online AIC_203B </option>
                    <option value="ec_lab" class="lab">Conductivity Lab </option>
                    <option value="ec_ait202a" class="dcs">Conductivity Online AIT_202A </option>
                    <option value="ec_ait202b" class="dcs">Conductivity Online AIT_202B </option>
                    <option value="tot_alk" class="lab">Total Alkalinity Lab</option>
                    <option value="tot_alkait204" class="dcs">Total Alkalinity Online AIT_204 </option>
                    <option value="tot_hardness" class="lab">Total Hardness Lab </option>
                    <option value="cah_lab" class="lab"selected="">CaH Lab </option>
                    <option value="ca_lab" class="lab">Ca Lab </option>
                    <option value="tds_lab" class="lab">TDS Lab </option>
                    <option value="chloride_lab" class="lab">Chloride Lab </option>
                    <option value="lsi_lab" class="lab">LSI Lab </option>
                    <option value="temp_ti202" class="dcs">Temperature Online TI_202 </option>
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
      <input type="number" id="line_width7" class="chart_render form-control" value="1.5" min="0" max="4" step="0.1">  
      </div>
    </div>
     <div class="row mb-2">
      <label for="marker7" class="col-sm-4 col-form-label">Marker Weight</label>
      <div class="col-sm-4">
      <input type="number" id="marker7" class="chart_render form-control" value="2.5" min="0" step="0.1" max="4"> 
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
                   <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length7"></span></td>
                   <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max57"></span> </td>
                   <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min7"></span> </td>
                   <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg7"></span> </td>
                   <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit7"></span> </td>
                   <td style="text-align: center; background-color: black; color:#ced6e0;"> <span id="frequency7"></span> </td>
                   <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="norms7"></span> </td>
        
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
         <input type="number" id="export_height" class="chart_render form-control" min="400" step="50" value="700"> 
      </div>
  </div>
  <div class="row mb-2">
      <label for="pen_export" class="col-sm-5 col-form-label">Background Color &nbsp;<i class="fa fa-download" aria-hidden="true"></i></label>
      <div class="col-sm-4">
         <input type="color" id="pen_export" name="chart_background_export" value="#ffffff" class="chart_render series-color">
      </div>
  </div>
  <div class="row mb-2">
      <label for="pen_export_title" class="col-sm-5 col-form-label">Title Color &nbsp;<i class="fa fa-download" aria-hidden="true"></i></label>
      <div class="col-sm-4">
        <input type="color" id="pen_export_title" name="chart_background_title" value="#c61010" class="chart_render series-color">
      </div>
  </div>
  
  
  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>
  
  <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark" style="background-color:rgba(0, 0, 0, 0.7); padding-top:2px; padding-bottom:0px;">
    <div class="container-fluid" >
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav" >
          <li class="nav-item">
            <div class="col-auto" style="margin-right:3px;">
                <a href="{{ url('/home') }}"> 
                    <button class="btn btn-sm badge-light3d"><span style="font-size: 14px;"> 🏠 </span> &nbsp; Home &nbsp;
                        </button></a>
                </div>
          </li>
          <li class="nav-item">
            <div class="col-auto" style="margin-right:3px;">
                <!-- Button trigger modal -->   
            <div class="input-group">
            <span class="btn btn-sm badge-light3d" data-bs-toggle="modal" data-bs-target="#sajid" style="margin-bottom:3px;"><span style="font-size: 14px;"> ⚙️ </span>Global </span>
            </div>
    </div> </li>
    <li class="nav-item">
      <div class="col-auto" style="margin-right:3px;">
          <!-- Button trigger modal -->   
      <div class="input-group">
      <span class="btn btn-sm badge-light3d" data-bs-toggle="modal" data-bs-target="#conf_yaxix" style="margin-bottom:3px;"><span style="font-size: 14px;"> 📐 </span> Y-Axis </span>
      </div>
  </div> </li>
    <li class="nav-item">
    <div class="col-auto" style="margin-right:3px;">
      <div class="input-group input-group-sm">
        <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">🗓️ From</div>
  
        <input type="date" name="start_date" class="tensor-flow form-control form-control-sm" id="start_date" value="2016-12-01" min="2016-01-01" max="2027-11-10" required="" style="background-color:#dff9fb;">
      </div>
    </div> </li>
    <li class="nav-item">
    <div class="col-auto" style="margin-right:3px;">
      <div class="input-group input-group-sm">
        <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">🗓️ To</div>
        <input type="date" name="end_date" id="end_date" value="2023-07-27" min="2016-01-31" max="2027-03-30" class="tensor-flow form-control form-control-sm" required="" style="background-color:#dff9fb;">
      </div>
    </div> </li>
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
   
  <script type="text/javascript" src="{{asset('js/stream/cw_export.js') }}"></script>
  
  </body>
</html>

