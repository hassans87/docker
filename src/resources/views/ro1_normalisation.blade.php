<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href={{asset('icons/pulse.png')}} type="image/png" sizes="32x32">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="https{{asset('js/notiflix 2.7.0/notiflix-2.7.0.min.js') }}"></script>
    <script type="text/javascript" src="https{{asset('js/notiflix 2.7.0/notiflix-aio-2.7.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="https{{asset('js/highcharts/highcharts.js') }}"></script>
    <script type="text/javascript" src="https{{asset('js/highcharts/highcharts-3d.js') }}"></script>
    <script type="text/javascript" src="https{{asset('js/highcharts/modules/exporting.js') }}"></script>
    <script type="text/javascript" src="https{{asset('js/highcharts/modules/offline-exporting.js') }}"></script>
    <script type="text/javascript" src="https{{asset('js/highcharts/modules/accessibility.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
<title>RO First Pass </title>
</head>
<body>
    <figure id="plot_window" class="test_print loading-msg" style="width:98vw; height:90vh;"></figure>
    <style>
        .main-chk{
        width:20px;
        height:25px;
        margin-top:7px;
        border:none;
        padding:0px;
        margin-left:7px;
        }
        .series-chk{
          text-align: center; vertical-align:middle; width:17px; height:17px;
        }
        .series-color{
          width: 17px;
          border:none !important ;
          border-radius: 0.5rem;
          height:17px; padding:0px; margin:0px; background:none; vertical-align: middle;
        }
        .color-pic{
          width:20px; height:25px; margin-top:5px; border:none; padding:0px;  background:none; margin-left:5px;
        }
        .badge-light3d {
          text-align: center;
          color:#636e72;
          background: rgba(226,226,226,1);
        background: -moz-linear-gradient(top, rgba(226,226,226,1) 0%, rgba(219,219,219,1) 50%, rgba(209,209,209,1) 51%, rgba(254,254,254,1) 100%);
        background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(226,226,226,1)), color-stop(50%, rgba(219,219,219,1)), color-stop(51%, rgba(209,209,209,1)), color-stop(100%, rgba(254,254,254,1)));
        background: -webkit-linear-gradient(top, rgba(226,226,226,1) 0%, rgba(219,219,219,1) 50%, rgba(209,209,209,1) 51%, rgba(254,254,254,1) 100%);
        background: -o-linear-gradient(top, rgba(226,226,226,1) 0%, rgba(219,219,219,1) 50%, rgba(209,209,209,1) 51%, rgba(254,254,254,1) 100%);
        background: -ms-linear-gradient(top, rgba(226,226,226,1) 0%, rgba(219,219,219,1) 50%, rgba(209,209,209,1) 51%, rgba(254,254,254,1) 100%);
        background: linear-gradient(to bottom, rgba(226,226,226,1) 0%, rgba(219,219,219,1) 50%, rgba(209,209,209,1) 51%, rgba(254,254,254,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e2e2e2', endColorstr='#fefefe', GradientType=0 );

        }
        .table-light{
          background-color: white;
        }
        .table-secondary{
          background-color: silver;
        }
        .caustic{
        background-color:rgba(168, 61, 255, 0.40);

        }
        .citric{
        background-color:rgba(255, 168, 5, 0.40);
        }
        .mnbtn{
          border-radius: 7px 0px 0px 7px;
        }
        .mnbtn0{
          border-radius: 0px 7px 7px 0px;
        }
        .g1 {
    stroke-dasharray: 12;
    stroke-dashoffset: 100;
    animation: dash 8s linear infinite;
}

.g2 {
    stroke-dasharray: 11;
    stroke-dashoffset: 100;
    animation: dash 5s linear infinite;
}

.g3 {
    stroke-dasharray: 4;
    stroke-dashoffset: 50;
    animation: dash 3.5s linear infinite;
}

.g4 {
  animation: blink 1s infinite;
   animation-fill-mode: both;
}

.g5 {
    stroke-dasharray: 8;
    stroke-dashoffset: 100;
    animation: dash 1s linear infinite;
}
@keyframes blink {
   0% { opacity: 0.3 }
   50% { opacity: 1 }
   100% { opacity: 0.3 }
   }
@keyframes dash {
    from {
        stroke-dashoffset: 50;
    }

    to {
        stroke-dashoffset: 0;
    }
}

        </style>
          <script type="text/javascript">
        Notiflix.Block.Init({
        fontFamily:"Quicksand",
        useGoogleFont:true,
        backgroundColor:"rgba(0,0,0,0.86)",
        messageColor:"#dfe4ea",
        svgColor:"#18dcff",
        svgSize:"80px",
        messageFontSize:"16px"
        });
        //Notiflix.Block.Pulse('.loading-msg', 'Please wait Fetching data from server....');

        // Notiflix Notify Init - global.js
        Notiflix.Notify.Init({
          width:'250px',
          opacity:0.6,
          fontSize:'12px',
          timeout:3000,
          messageMaxLength:200,
          position:'right-bottom',
          cssAnimationStyle:"zoom",
        });

        </script>

<div class="input-group">
  <div class="col-auto" style="margin-right:5px;">
    <a href="{{ url('/home') }}">
      <button class="btn btn-sm badge-light3d">Home &nbsp;<i class="fa fa-home" aria-hidden="true" style="color:black;"></i></button></a>



    </div>
           <div class="col-auto" style="margin-right:5px;">
                  <!-- Button trigger modal -->
              <div class="input-group">
              <span class="btn btn-sm badge-light3d" data-bs-toggle="modal" data-bs-target="#sajid" style="margin-bottom:3px;">Global &nbsp;<i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span>
              </div>


      </div>
      <div class="col-auto" style="margin-right:8px;">
        <div class="input-group input-group-sm">
        <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">From</div>
       <input type="date" name="start_date" class="tensor-flow form-control form-control-sm" id="start_date" value="2023-01-01" min="2016-01-01" max="2023-11-10" required="" style="background-color:#dff9fb;">
    </div>
       </div>
      <div class="col-auto" style="margin-right:5px;">
            <div class="input-group input-group-sm">
            <div class="input-group-text badge-light3d mnbtn">To</div>
            <input type="date" name="end_date" id="end_date" value="2023-03-30" min="2016-01-31" max="2023-03-30" class="tensor-flow form-control form-control-sm" required="" style="background-color:#dff9fb;">
            </div>
      </div>

      <div class="col-auto" style="margin-right:5px;">
            <div class="input-group input-group-sm">
            <div class="input-group-text badge-light3d mnbtn">Skid</div>
            <select class="query form-control form-control-sm form-select" id="skidx" style="background-color:#dff9fb;">
              <option value="a"> 41-A</option>
              <option value="b">41-B</option>
              <option value="c">41-C</option>
              <option value="d">41-D</option>
              <option value="e">41-E</option>
              <option value="f">41-F</option>
              <option value="g">41-G</option>
              <option value="h">41-H</option>
              <option value="i">41-I</option>
              <option value="j">41-J</option>
              <option value="k" selected="">41-K</option>
              </select>
            </div>
      </div>
<div class="col-auto" style="margin-right:5px;">
    <div class="input-group input-group-sm">
    <div class="input-group-text badge-light3d mnbtn">Data Interval &nbsp;<i class="fa fa-clock-o" aria-hidden="true" style="color:black;"></i></div>
    <select class="query form-control form-control-sm form-select" id="invt" style="background-color:#dff9fb;">
      <option value="0.7">1 Hour</option>
      <option value="1.8" selected="">2 Hours</option>
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
            <div class="col-auto" style="margin-right:15px;">
            <div class="input-group input-group-sm">
            <span id="export_data" class="btn btn-info btn-sm">
            <i class="fa fa-database" aria-hidden="true" style="color:black;"></i>&nbsp; Data Download</span>
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
                      <th>&nbsp;&nbsp; Unit &nbsp;&nbsp;</th>

                  </tr>
                  </thead>
                    <tbody>
              <tr class="tr1 table-light">
                              <td> <div class="input-group input-group-sm">
                              <div class="col-auto "><input type="checkbox" class="query series-chk filter" id="line1" checked="">
                               &nbsp;1 &nbsp;<input type="color" id="pen1" name="pen1" value="#e41146" class="chart_render series-color"> &nbsp; </div>
                              <div class="col-auto">
              <select class="query form-control form-control-sm form-select input-group-sm" id="ufdata1">

              <option value="dpi_906" selected="" style="background-color:rgba(255,121,121,0.4);">DP (Head Loss)  &nbsp;&nbsp;</option>
              <option value="norm_perm_flow">Normalized Permeate Flow &nbsp;&nbsp;</option>
              <option value="norm_per_salt_rej">Salt Rejection </option>
              <option value="norm_per_salt_pas">Salt Passage  </option>
              <option value="feed_pres_pt108">Feed Pressure  </option>
              <option value="conc_pres_pt307">Concentrate Pressure  </option>
              <option value="per_pres_pt312">Permeate Pressure  </option>
              <option value="recovery" style="background-color:rgba(34,166,179,0.4);">Recovery (%)  </option>
              <option value="rear_permeate_ft905">Rear Permeate Flow  </option>
              <option value="front_permeate_ft_305">Front Permeate Flow  </option>
              <option value="full_flushing">Full Flushing  </option>
              <option value="membrane_flushing">Membrane Flushing Only </option>
              <option value="dbna_flushing">DBNPA Membrane Flushing  &nbsp;&nbsp;</option>
              <option value="cip" style="background-color:rgba(190,46,221,0.4);">CIP</option>
              <option value="feed_flow">Feed Flow  </option>
              <option value="hp_pump_ft101">HP Pump Flow  </option>
              <option value="eri_out_ft203">ERI  OUT Flow  </option>
              <option value="eri_inlet_ft207">ERI  INLET  Flow  </option>
              <option value="conc_flow_cal">Concentrate  Flow </option>
              <option value="overflush">Overflush %  </option>
              <option value="eri_hp_out_cond_at306">ERI HP OUT COND  </option>
              <option value="eri_hp_in_con_at206">ERI HP IN  COND  </option>
              <option value="mixing_eri_calc">Mixing % (ERI calc to be added) &nbsp;&nbsp;</option>
              <option value="feed_cond_at211">Feed Conductivity  </option>
              <option value="front_tds_calc">Calculated Front Perm TDS  </option>
              <option value="rear_tds_calc">Calculated Rear Perm TDS  </option>
              <option value="rear_cond_at301">Rear Permeate Conductivity  &nbsp;&nbsp;</option>
              <option value="front_cond_at303">Front Permeate Conductivity  &nbsp;&nbsp;</option>
              <option value="cond_average">Conductivity average  </option>
              <option value="tds_average">TDS average  </option>
              <option value="temp_calc">Calculated Temperature (C)  </option>
              <option value="feed_temp">Feed   Temperature (F)  </option>
              <option value="feed_temp_tit212">Feed   Temperature (C)  &nbsp;&nbsp;</option>
              <option value="days_operation">Days of Operation  &nbsp;&nbsp;</option>
              <option value="temp_correc_fac">Temperature Correction Factor  &nbsp;&nbsp;</option>
              <option value="calc_feed_brine_avg">Calculated Feed-Brine Avg Conc  &nbsp;&nbsp;</option>
              <option value="feed_brine_ro_press">Feed-Brine Osmotic Pressure  &nbsp;&nbsp;</option>
              <option value="per_ro_pres">Permeate Osmotic Pressure  &nbsp;&nbsp;</option>
              <option value="net_driving_press">Net Driving Pressure  &nbsp;&nbsp;</option>
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
                    <div class="modal-header modelheader1" style="background-color: rgb(228, 17, 70);">
                      <h5 class="modal-title" id="seriestitle1">Series 1: DP (Head Loss)  &nbsp;&nbsp;</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                <div class="row mb-2">
                  <label for="chart_type1" class="chart_render col-sm-4 col-form-label">Chart Type</label>
                  <div class="col-sm-4">
                    <select class="chart_render form-control form-select" id="chart_type1">
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
                  <input type="number" id="line_width1" class="chart_render rednder form-control" value="2.0" min="0" max="4" step="0.1">
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


                              <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length1">415</span></td>
                              <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max1">2.52</span> </td>
                              <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min1">2.00</span> </td>
                              <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg1">2.26</span> </td>
                              <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit1"> bar</span> </td>


              </tr>
              <tr class="tr2 table-light">
                              <td><div class="input-group">
                              <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line2" checked="">
                                &nbsp;2 &nbsp;<input type="color" id="pen2" name="pen2" value="#09f505" class="chart_render series-color"> &nbsp; </div>
                              <div class="col-auto">
                               <select class="query form-control form-control-sm form-select" id="ufdata2">
              <option value="dpi_906" style="background-color:rgba(255,121,121,0.4);">DP (Head Loss)  &nbsp;&nbsp;</option>
              <option value="norm_perm_flow">Normalized Permeate Flow &nbsp;&nbsp;</option>
              <option value="norm_per_salt_rej" selected="">Salt Rejection </option>
              <option value="norm_per_salt_pas">Salt Passage  </option>
              <option value="feed_pres_pt108">Feed Pressure  </option>
              <option value="conc_pres_pt307">Concentrate Pressure  </option>
              <option value="per_pres_pt312">Permeate Pressure  </option>
              <option value="recovery" style="background-color:rgba(34,166,179,0.4);">Recovery (%)  </option>
              <option value="rear_permeate_ft905">Rear Permeate Flow  </option>
              <option value="front_permeate_ft_305">Front Permeate Flow  </option>
              <option value="full_flushing">Full Flushing  </option>
              <option value="membrane_flushing">Membrane Flushing Only </option>
              <option value="dbna_flushing">DBNPA Membrane Flushing  &nbsp;&nbsp;</option>
              <option value="cip" style="background-color:rgba(190,46,221,0.4);">CIP</option>
              <option value="feed_flow">Feed Flow  </option>
              <option value="hp_pump_ft101">HP Pump Flow  </option>
              <option value="eri_out_ft203">ERI  OUT Flow  </option>
              <option value="eri_inlet_ft207">ERI  INLET  Flow  </option>
              <option value="conc_flow_cal">Concentrate  Flow </option>
              <option value="overflush">Overflush %  </option>
              <option value="eri_hp_out_cond_at306">ERI HP OUT COND  </option>
              <option value="eri_hp_in_con_at206">ERI HP IN  COND  </option>
              <option value="mixing_eri_calc">Mixing % (ERI calc to be added) &nbsp;&nbsp;</option>
              <option value="feed_cond_at211">Feed Conductivity  </option>
              <option value="front_tds_calc">Calculated Front Perm TDS  </option>
              <option value="rear_tds_calc">Calculated Rear Perm TDS  </option>
              <option value="rear_cond_at301">Rear Permeate Conductivity  &nbsp;&nbsp;</option>
              <option value="front_cond_at303">Front Permeate Conductivity  &nbsp;&nbsp;</option>
              <option value="cond_average">Conductivity average  </option>
              <option value="tds_average">TDS average  </option>
              <option value="temp_calc">Calculated Temperature (C)  </option>
              <option value="feed_temp">Feed   Temperature (F)  </option>
              <option value="feed_temp_tit212">Feed   Temperature (C)  &nbsp;&nbsp;</option>
              <option value="days_operation">Days of Operation  &nbsp;&nbsp;</option>
              <option value="temp_correc_fac">Temperature Correction Factor  &nbsp;&nbsp;</option>
              <option value="calc_feed_brine_avg">Calculated Feed-Brine Avg Conc  &nbsp;&nbsp;</option>
              <option value="feed_brine_ro_press">Feed-Brine Osmotic Pressure  &nbsp;&nbsp;</option>
              <option value="per_ro_pres">Permeate Osmotic Pressure  &nbsp;&nbsp;</option>
              <option value="net_driving_press">Net Driving Pressure  &nbsp;&nbsp;</option>
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
                    <div class="modal-header modelheader2" style="background-color: rgb(9, 245, 5);">
                      <h5 class="modal-title" id="seriestitle2">Series 2: Salt Rejection </h5>
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
                  <input type="number" id="line_width2" class="chart_render form-control" value="0" min="0" max="4" step="0.1">
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
                        <option value="square">Square </option>
                        <option value="triangle" selected="">Trianlge </option>
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



                              <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length2">414</span></td>
                              <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max2">99.6</span> </td>
                              <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min2">96.3</span> </td>
                              <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg2">98.3</span> </td>
                              <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit2"> %</span> </td>

              </tr>
              <tr class="tr3 table-light">
                              <td><div class="input-group">
                              <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line3" checked="">
                                &nbsp;3 &nbsp;<input type="color" id="pen3" name="pen3" value="#d707f2" class="chart_render series-color"> &nbsp; </div>
                              <div class="col-auto">
                               <select class="query form-control form-control-sm form-select" id="ufdata3">
              <option value="dpi_906" style="background-color:rgba(255,121,121,0.4);">DP (Head Loss)  &nbsp;&nbsp;</option>
              <option value="norm_perm_flow">Normalized Permeate Flow &nbsp;&nbsp;</option>
              <option value="norm_per_salt_rej">Salt Rejection </option>
              <option value="norm_per_salt_pas">Salt Passage  </option>
              <option value="feed_pres_pt108">Feed Pressure  </option>
              <option value="conc_pres_pt307">Concentrate Pressure  </option>
              <option value="per_pres_pt312">Permeate Pressure  </option>
              <option value="recovery" style="background-color:rgba(34,166,179,0.4);">Recovery (%)  </option>
              <option value="rear_permeate_ft905">Rear Permeate Flow  </option>
              <option value="front_permeate_ft_305">Front Permeate Flow  </option>
              <option value="full_flushing">Full Flushing  </option>
              <option value="membrane_flushing">Membrane Flushing Only </option>
              <option value="dbna_flushing" selected="">DBNPA Membrane Flushing  &nbsp;&nbsp;</option>
              <option value="cip" style="background-color:rgba(190,46,221,0.4);">CIP</option>
              <option value="feed_flow">Feed Flow  </option>
              <option value="hp_pump_ft101">HP Pump Flow  </option>
              <option value="eri_out_ft203">ERI  OUT Flow  </option>
              <option value="eri_inlet_ft207">ERI  INLET  Flow  </option>
              <option value="conc_flow_cal">Concentrate  Flow </option>
              <option value="overflush">Overflush %  </option>
              <option value="eri_hp_out_cond_at306">ERI HP OUT COND  </option>
              <option value="eri_hp_in_con_at206">ERI HP IN  COND  </option>
              <option value="mixing_eri_calc">Mixing % (ERI calc to be added) &nbsp;&nbsp;</option>
              <option value="feed_cond_at211">Feed Conductivity  </option>
              <option value="front_tds_calc">Calculated Front Perm TDS  </option>
              <option value="rear_tds_calc">Calculated Rear Perm TDS  </option>
              <option value="rear_cond_at301">Rear Permeate Conductivity  &nbsp;&nbsp;</option>
              <option value="front_cond_at303">Front Permeate Conductivity  &nbsp;&nbsp;</option>
              <option value="cond_average">Conductivity average  </option>
              <option value="tds_average">TDS average  </option>
              <option value="temp_calc">Calculated Temperature (C)  </option>
              <option value="feed_temp">Feed   Temperature (F)  </option>
              <option value="feed_temp_tit212">Feed   Temperature (C)  &nbsp;&nbsp;</option>
              <option value="days_operation">Days of Operation  &nbsp;&nbsp;</option>
              <option value="temp_correc_fac">Temperature Correction Factor  &nbsp;&nbsp;</option>
              <option value="calc_feed_brine_avg">Calculated Feed-Brine Avg Conc  &nbsp;&nbsp;</option>
              <option value="feed_brine_ro_press">Feed-Brine Osmotic Pressure  &nbsp;&nbsp;</option>
              <option value="per_ro_pres">Permeate Osmotic Pressure  &nbsp;&nbsp;</option>
              <option value="net_driving_press">Net Driving Pressure  &nbsp;&nbsp;</option>
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
                    <div class="modal-header modelheader3" style="background-color: rgb(215, 7, 242);">
                      <h5 class="modal-title" id="seriestitle3">Series 3: DBNPA Membrane Flushing  &nbsp;&nbsp;</h5>
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
                  <input type="number" id="marker3" class="chart_render form-control" value="4" min="0" step="0.1" max="4">
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


                              <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length3">8</span></td>
                              <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max3"> </span> </td>
                              <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min3"> </span> </td>
                              <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg3"> </span> </td>
                              <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit3"> </span> </td>

              </tr>
              <tr class="tr4 table-secondary">
                              <td><div class="input-group">
                              <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line4">
                                &nbsp;4 &nbsp;<input type="color" id="pen4" name="pen4" value="#0eade1" class="chart_render series-color" style="display: none;"> &nbsp; </div>
                              <div class="col-auto">
                               <select class="query form-control form-control-sm form-select" id="ufdata4" style="display: none;">
              <option value="dpi_906" style="background-color:rgba(255,121,121,0.4);">DP (Head Loss)  &nbsp;&nbsp;</option>
              <option value="norm_perm_flow">Normalized Permeate Flow &nbsp;&nbsp;</option>
              <option value="norm_per_salt_rej">Salt Rejection </option>
              <option value="norm_per_salt_pas">Salt Passage  </option>
              <option value="feed_pres_pt108">Feed Pressure  </option>
              <option value="conc_pres_pt307">Concentrate Pressure  </option>
              <option value="per_pres_pt312">Permeate Pressure  </option>
              <option value="recovery" style="background-color:rgba(34,166,179,0.4);">Recovery (%)  </option>
              <option value="rear_permeate_ft905">Rear Permeate Flow  </option>
              <option value="front_permeate_ft_305">Front Permeate Flow  </option>
              <option value="full_flushing">Full Flushing  </option>
              <option value="membrane_flushing">Membrane Flushing Only </option>
              <option value="dbna_flushing">DBNPA Membrane Flushing  &nbsp;&nbsp;</option>
              <option value="cip" style="background-color:rgba(190,46,221,0.4);">CIP</option>
              <option value="feed_flow">Feed Flow  </option>
              <option value="hp_pump_ft101">HP Pump Flow  </option>
              <option value="eri_out_ft203">ERI  OUT Flow  </option>
              <option value="eri_inlet_ft207">ERI  INLET  Flow  </option>
              <option value="conc_flow_cal">Concentrate  Flow </option>
              <option value="overflush" selected="">Overflush %  </option>
              <option value="eri_hp_out_cond_at306">ERI HP OUT COND  </option>
              <option value="eri_hp_in_con_at206">ERI HP IN  COND  </option>
              <option value="mixing_eri_calc">Mixing % (ERI calc to be added) &nbsp;&nbsp;</option>
              <option value="feed_cond_at211">Feed Conductivity  </option>
              <option value="front_tds_calc">Calculated Front Perm TDS  </option>
              <option value="rear_tds_calc">Calculated Rear Perm TDS  </option>
              <option value="rear_cond_at301">Rear Permeate Conductivity  &nbsp;&nbsp;</option>
              <option value="front_cond_at303">Front Permeate Conductivity  &nbsp;&nbsp;</option>
              <option value="cond_average">Conductivity average  </option>
              <option value="tds_average">TDS average  </option>
              <option value="temp_calc">Calculated Temperature (C)  </option>
              <option value="feed_temp">Feed   Temperature (F)  </option>
              <option value="feed_temp_tit212">Feed   Temperature (C)  &nbsp;&nbsp;</option>
              <option value="days_operation">Days of Operation  &nbsp;&nbsp;</option>
              <option value="temp_correc_fac">Temperature Correction Factor  &nbsp;&nbsp;</option>
              <option value="calc_feed_brine_avg">Calculated Feed-Brine Avg Conc  &nbsp;&nbsp;</option>
              <option value="feed_brine_ro_press">Feed-Brine Osmotic Pressure  &nbsp;&nbsp;</option>
              <option value="per_ro_pres">Permeate Osmotic Pressure  &nbsp;&nbsp;</option>
              <option value="net_driving_press">Net Driving Pressure  &nbsp;&nbsp;</option>
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
                      <h5 class="modal-title" id="seriestitle4">Series 4: Overflush %  </h5>
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
                        <option value="scatter">Scatter </option>
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


                              <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length4" style="display: none;"></span></td>
                              <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max4" style="display: none;"></span> </td>
                              <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min4" style="display: none;"></span> </td>
                              <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg4" style="display: none;"></span> </td>
                              <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit4"> </span> </td>

              </tr>
              <tr class="tr5 table-secondary">
                              <td><div class="input-group">
                              <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line5">
                                &nbsp;5 &nbsp;<input type="color" id="pen5" name="pen5" value="#21e713" class="chart_render series-color" style="display: none;"> &nbsp; </div>
                              <div class="col-auto">
                               <select class="query form-control form-control-sm form-select" id="ufdata5" style="display: none;">
              <option value="dpi_906" style="background-color:rgba(255,121,121,0.4);">DP (Head Loss)  &nbsp;&nbsp;</option>
              <option value="norm_perm_flow">Normalized Permeate Flow &nbsp;&nbsp;</option>
              <option value="norm_per_salt_rej">Salt Rejection </option>
              <option value="norm_per_salt_pas">Salt Passage  </option>
              <option value="feed_pres_pt108">Feed Pressure  </option>
              <option value="conc_pres_pt307">Concentrate Pressure  </option>
              <option value="per_pres_pt312">Permeate Pressure  </option>
              <option value="recovery" style="background-color:rgba(34,166,179,0.4);">Recovery (%)  </option>
              <option value="rear_permeate_ft905">Rear Permeate Flow  </option>
              <option value="front_permeate_ft_305">Front Permeate Flow  </option>
              <option value="full_flushing">Full Flushing  </option>
              <option value="membrane_flushing">Membrane Flushing Only </option>
              <option value="dbna_flushing">DBNPA Membrane Flushing  &nbsp;&nbsp;</option>
              <option value="cip" selected="" style="background-color:rgba(190,46,221,0.4);">CIP</option>
              <option value="feed_flow">Feed Flow  </option>
              <option value="hp_pump_ft101">HP Pump Flow  </option>
              <option value="eri_out_ft203">ERI  OUT Flow  </option>
              <option value="eri_inlet_ft207">ERI  INLET  Flow  </option>
              <option value="conc_flow_cal">Concentrate  Flow </option>
              <option value="overflush">Overflush %  </option>
              <option value="eri_hp_out_cond_at306">ERI HP OUT COND  </option>
              <option value="eri_hp_in_con_at206">ERI HP IN  COND  </option>
              <option value="mixing_eri_calc">Mixing % (ERI calc to be added) &nbsp;&nbsp;</option>
              <option value="feed_cond_at211">Feed Conductivity  </option>
              <option value="front_tds_calc">Calculated Front Perm TDS  </option>
              <option value="rear_tds_calc">Calculated Rear Perm TDS  </option>
              <option value="rear_cond_at301">Rear Permeate Conductivity  &nbsp;&nbsp;</option>
              <option value="front_cond_at303">Front Permeate Conductivity  &nbsp;&nbsp;</option>
              <option value="cond_average">Conductivity average  </option>
              <option value="tds_average">TDS average  </option>
              <option value="temp_calc">Calculated Temperature (C)  </option>
              <option value="feed_temp">Feed   Temperature (F)  </option>
              <option value="feed_temp_tit212">Feed   Temperature (C)  &nbsp;&nbsp;</option>
              <option value="days_operation">Days of Operation  &nbsp;&nbsp;</option>
              <option value="temp_correc_fac">Temperature Correction Factor  &nbsp;&nbsp;</option>
              <option value="calc_feed_brine_avg">Calculated Feed-Brine Avg Conc  &nbsp;&nbsp;</option>
              <option value="feed_brine_ro_press">Feed-Brine Osmotic Pressure  &nbsp;&nbsp;</option>
              <option value="per_ro_pres">Permeate Osmotic Pressure  &nbsp;&nbsp;</option>
              <option value="net_driving_press">Net Driving Pressure  &nbsp;&nbsp;</option>
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
                    <div class="modal-header modelheader5" style="background-color: rgb(33, 231, 19);">
                      <h5 class="modal-title" id="seriestitle5">Series 5: CIP</h5>
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
                  <input type="number" id="marker5" class="chart_render form-control" value="4" min="0" step="0.1" max="4">
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
                   <input type="checkbox" class="chart_render form-check-input col-auto" id="y_axis5" checked="">
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
                              <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line6">
                                &nbsp;6 &nbsp;<input type="color" id="pen6" name="pen6" value="#e27d08" class="chart_render series-color" style="display: none;"> &nbsp; </div>
                              <div class="col-auto">
                              <select class="query form-control form-control-sm form-select" id="ufdata6" style="display: none;">
              <option value="dpi_906" style="background-color:rgba(255,121,121,0.4);">DP (Head Loss)  &nbsp;&nbsp;</option>
              <option value="norm_perm_flow">Normalized Permeate Flow &nbsp;&nbsp;</option>
              <option value="norm_per_salt_rej">Salt Rejection </option>
              <option value="norm_per_salt_pas">Salt Passage  </option>
              <option value="feed_pres_pt108">Feed Pressure  </option>
              <option value="conc_pres_pt307">Concentrate Pressure  </option>
              <option value="per_pres_pt312" selected="">Permeate Pressure  </option>
              <option value="recovery" style="background-color:rgba(34,166,179,0.4);">Recovery (%)  </option>
              <option value="rear_permeate_ft905">Rear Permeate Flow  </option>
              <option value="front_permeate_ft_305">Front Permeate Flow  </option>
              <option value="full_flushing">Full Flushing  </option>
              <option value="membrane_flushing">Membrane Flushing Only </option>
              <option value="dbna_flushing">DBNPA Membrane Flushing  &nbsp;&nbsp;</option>
              <option value="cip" style="background-color:rgba(190,46,221,0.4);">CIP</option>
              <option value="feed_flow">Feed Flow  </option>
              <option value="hp_pump_ft101">HP Pump Flow  </option>
              <option value="eri_out_ft203">ERI  OUT Flow  </option>
              <option value="eri_inlet_ft207">ERI  INLET  Flow  </option>
              <option value="conc_flow_cal">Concentrate  Flow </option>
              <option value="overflush">Overflush %  </option>
              <option value="eri_hp_out_cond_at306">ERI HP OUT COND  </option>
              <option value="eri_hp_in_con_at206">ERI HP IN  COND  </option>
              <option value="mixing_eri_calc">Mixing % (ERI calc to be added) &nbsp;&nbsp;</option>
              <option value="feed_cond_at211">Feed Conductivity  </option>
              <option value="front_tds_calc">Calculated Front Perm TDS  </option>
              <option value="rear_tds_calc">Calculated Rear Perm TDS  </option>
              <option value="rear_cond_at301">Rear Permeate Conductivity  &nbsp;&nbsp;</option>
              <option value="front_cond_at303">Front Permeate Conductivity  &nbsp;&nbsp;</option>
              <option value="cond_average">Conductivity average  </option>
              <option value="tds_average">TDS average  </option>
              <option value="temp_calc">Calculated Temperature (C)  </option>
              <option value="feed_temp">Feed   Temperature (F)  </option>
              <option value="feed_temp_tit212">Feed   Temperature (C)  &nbsp;&nbsp;</option>
              <option value="days_operation">Days of Operation  &nbsp;&nbsp;</option>
              <option value="temp_correc_fac">Temperature Correction Factor  &nbsp;&nbsp;</option>
              <option value="calc_feed_brine_avg">Calculated Feed-Brine Avg Conc  &nbsp;&nbsp;</option>
              <option value="feed_brine_ro_press">Feed-Brine Osmotic Pressure  &nbsp;&nbsp;</option>
              <option value="per_ro_pres">Permeate Osmotic Pressure  &nbsp;&nbsp;</option>
              <option value="net_driving_press">Net Driving Pressure  &nbsp;&nbsp;</option>
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
                      <h5 class="modal-title" id="seriestitle6">Series 6: Permeate Pressure  </h5>
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
                        <option value="scatter">Scatter </option>
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


                              <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length6" style="display: none;"></span></td>
                              <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max6" style="display: none;"></span> </td>
                              <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min6" style="display: none;"></span> </td>
                              <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg6" style="display: none;"></span> </td>
                              <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit6"> </span> </td>

              </tr>

              <tr class="tr7 table-secondary">
                              <td><div class="input-group">
                              <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line7">
                                &nbsp;7 &nbsp;<input type="color" id="pen7" name="pen7" value="#0717ed" class="chart_render series-color" style="display: none;"> &nbsp; </div>
                              <div class="col-auto">
                              <select class="query form-control form-control-sm form-select" id="ufdata7" style="display: none;">
              <option value="dpi_906" style="background-color:rgba(255,121,121,0.4);">DP (Head Loss)  &nbsp;&nbsp;</option>
              <option value="norm_perm_flow">Normalized Permeate Flow &nbsp;&nbsp;</option>
              <option value="norm_per_salt_rej">Salt Rejection </option>
              <option value="norm_per_salt_pas">Salt Passage  </option>
              <option value="feed_pres_pt108">Feed Pressure  </option>
              <option value="conc_pres_pt307">Concentrate Pressure  </option>
              <option value="per_pres_pt312">Permeate Pressure  </option>
              <option value="recovery" style="background-color:rgba(34,166,179,0.4);">Recovery (%)  </option>
              <option value="rear_permeate_ft905">Rear Permeate Flow  </option>
              <option value="front_permeate_ft_305">Front Permeate Flow  </option>
              <option value="full_flushing">Full Flushing  </option>
              <option value="membrane_flushing">Membrane Flushing Only </option>
              <option value="dbna_flushing">DBNPA Membrane Flushing  &nbsp;&nbsp;</option>
              <option value="cip" style="background-color:rgba(190,46,221,0.4);">CIP</option>
              <option value="feed_flow" selected="">Feed Flow  </option>
              <option value="hp_pump_ft101">HP Pump Flow  </option>
              <option value="eri_out_ft203">ERI  OUT Flow  </option>
              <option value="eri_inlet_ft207">ERI  INLET  Flow  </option>
              <option value="conc_flow_cal">Concentrate  Flow </option>
              <option value="overflush">Overflush %  </option>
              <option value="eri_hp_out_cond_at306">ERI HP OUT COND  </option>
              <option value="eri_hp_in_con_at206">ERI HP IN  COND  </option>
              <option value="mixing_eri_calc">Mixing % (ERI calc to be added) &nbsp;&nbsp;</option>
              <option value="feed_cond_at211">Feed Conductivity  </option>
              <option value="front_tds_calc">Calculated Front Perm TDS  </option>
              <option value="rear_tds_calc">Calculated Rear Perm TDS  </option>
              <option value="rear_cond_at301">Rear Permeate Conductivity  &nbsp;&nbsp;</option>
              <option value="front_cond_at303">Front Permeate Conductivity  &nbsp;&nbsp;</option>
              <option value="cond_average">Conductivity average  </option>
              <option value="tds_average">TDS average  </option>
              <option value="temp_calc">Calculated Temperature (C)  </option>
              <option value="feed_temp">Feed   Temperature (F)  </option>
              <option value="feed_temp_tit212">Feed   Temperature (C)  &nbsp;&nbsp;</option>
              <option value="days_operation">Days of Operation  &nbsp;&nbsp;</option>
              <option value="temp_correc_fac">Temperature Correction Factor  &nbsp;&nbsp;</option>
              <option value="calc_feed_brine_avg">Calculated Feed-Brine Avg Conc  &nbsp;&nbsp;</option>
              <option value="feed_brine_ro_press">Feed-Brine Osmotic Pressure  &nbsp;&nbsp;</option>
              <option value="per_ro_pres">Permeate Osmotic Pressure  &nbsp;&nbsp;</option>
              <option value="net_driving_press">Net Driving Pressure  &nbsp;&nbsp;</option>
                              </select>
                              </div> </div>
                             </td><td style="text-align: center;">

                                                        <!-- Button trigger modal series 5-->
                                                  <span id="panel7" style="display: none;">
                                                  <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal" data-bs-target="#modal-series7">
                                                  <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
              <!-- Modal series 5-->
              <div class="modal fade" id="modal-series7" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header modelheader7" style="background-color: rgb(7, 23, 237);">
                      <h5 class="modal-title" id="seriestitle7">Series 7: Feed Flow  </h5>
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


                              <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length7" style="display: none;"></span></td>
                              <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max7" style="display: none;"></span> </td>
                              <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min7" style="display: none;"></span> </td>
                              <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg7" style="display: none;"></span> </td>
                              <td style="text-align: center; background-color: black; color:#ced6e0; "><span id="unit7"> </span> </td>

              </tr>

                  </tbody>
                </table>
                <div class="modal fade" id="sajid" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header badge-light3d">
                        <h5 class="modal-title" id="staticBackdropLabel">Chart Global Settings</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                <div class="row mb-2">
                    <label for="plot_width" class="col-sm-5 col-form-label">Plot Width Span <i class="fa fa-arrows-h" aria-hidden="true"></i> Px</label>
                    <div class="col-sm-4">
                      <input type="number" id="plot_width" class="chart_render form-control" min="1000" value="1500" step="200">
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="pen_main" class="col-sm-5 col-form-label">Background Color <i class="fa fa-eyedropper" aria-hidden="true"></i></label>
                    <div class="col-sm-4">
                     <input type="color" id="pen_main" name="chart_background" value="#0d0d0d" class="chart_render series-color">
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="pen_grid" class="col-sm-5 col-form-label">Grid Lines Color <i class="fa fa-eyedropper" aria-hidden="true"></i></label>
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
                      <input type="number" id="export_width" class="chart_render form-control" min="500" step="50" value="1500">
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
                      <input type="color" id="pen_export_title" name="chart_background_title" value="#1068c6" class="chart_render series-color">
                    </div>
                </div>


                </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                      </div>
                    </div>
                  </div>
                </div>
    <script type="text/javascript" src="{{asset('js/stream/ro1_normalisation.js') }}"></script>

</body>
</html>
