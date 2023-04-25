<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href={{asset('icons/pulse.png')}} type="image/png" sizes="32x32">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('js/notiflix 2.7.0/notiflix-2.7.0.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/notiflix 2.7.0/notiflix-aio-2.7.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('js/highcharts/highcharts.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/highcharts/highcharts-3d.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/highcharts/modules/exporting.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/highcharts/modules/offline-exporting.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/highcharts/modules/accessibility.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
<title>Ultrafiltraion</title>
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
        <div class="input-group-text badge-light3d mnbtn">Line</div>
        <select class="query form-control form-control-sm form-select" id="skidx" style="background-color:#dff9fb;">
          <option value="uf_north">North</option>
          <option value="uf_south">South</option>
          </select>
        </div>
  </div>
      <div class="col-auto" style="margin-right:5px;">
            <div class="input-group input-group-sm">
            <div class="input-group-text badge-light3d mnbtn">Skid</div>
            <select class="query form-control form-control-sm form-select" id="skidx" style="background-color:#dff9fb;">
              <option value="a">A</option>
              <option value="b">B</option>
              <option value="c">C</option>
              <option value="d">D</option>
              <option value="e">E</option>
              <option value="f">F</option>
              <option value="g">G</option>
              <option value="h">H</option>
              <option value="i">I</option>
              <option value="j">J</option>
              <option value="k">K</option>
              <option value="l">L</option>
              <option value="m">M</option>
              <option value="n">N</option>
              <option value="o">O</option>
              </select>
            </div>
      </div>
<div class="col-auto" style="margin-right:5px;">
    <div class="input-group input-group-sm">
    <div class="input-group-text badge-light3d mnbtn">Data Interval &nbsp;<i class="fa fa-clock-o" aria-hidden="true" style="color:black;"></i></div>
    <select class="query form-control form-control-sm form-select" id="invt" style="background-color:#dff9fb;">
      <option value="14" >15 Minutes</option>
      <option value="28" selected>30 Minutes</option>
      <option value="59" >1 Hour</option>
      <option value="117" >2 Hours</option>    
      <option value="230" >4 Hours</option>  
      <option value="450" >8 Hours</option>
      <option value="700" >12 Hours</option>
      <option value="1400" >24 Hours</option>  
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
                      <th>Settings </th>        
                      <th>Data Points</th>
                      <th>Max Value </th>
                      <th>Min Value </th>
                      <th>Avg. Value </th>
                      <th>&nbsp; Unit &nbsp;</th>
                  </tr>
                  </thead>
                    <tbody> 
              <tr class="tr1 table-light">      
                              <td>       <div class="input-group">
                              <div class="col-auto"><input type="checkbox" class="series-chk filter" id="line1">
                               &nbsp;1 &nbsp;<input type="color" id="pen1" name="pen1" value="#dc0462" class="chart_render series-color" style=""> &nbsp; </div>
                              <div class="col-auto"> 
                              <select class="query form-control form-control-sm form-select mnbtn" id="alpha1" style="">
                              <option value="a">A</option>
                              <option value="b">B</option>  
                              <option value="c">C</option>
                              <option value="d">D</option>
                              <option value="e">E</option>
                              <option value="f">F</option>
                              <option value="g">G</option>
                              <option value="h" selected="">H</option>
                              <option value="i">I</option>
                              <option value="j">J</option>
                              <option value="k">K</option>
                              <option value="l">L</option>
                              <option value="m">M</option>
                              <option value="n">N</option>
                              <option value="o">O</option>
                              </select>
                              </div>  
                              <div class="col-auto"> 
                              <select class="query form-control form-control-sm form-select mnbtn0" id="ufdata1" style="">
                                                <option value="permeability">Permeability</option>
                                                <option value="tmp">TMP</option> 
                                                <option value="flux" selected="">Flux</option>           
                                                <option value="pcv">PCV-001</option> 
                                                <option value="bw_counter">Backwash Counter</option>  
                                                   
                                  </select>
                                  </div> </div>
                              </td><td style="text-align: center;">
                                   
                                                        <!-- Button trigger modal series 1-->
                                                  <span id="panel1" style="">
                                                  <span class="model1 badge badge-light3d" data-bs-toggle="modal" data-bs-target="#modal1">
                                                  <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i> </span> </span>
              
              
              
                    <!-- Modal series 1-->
              <div class="modal fade" id="modal1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header modelheader1" style="background-color: rgb(220, 4, 98);">
                      <h5 class="modal-title" id="seriestitle1">Series 1: Flux</h5>
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
                  <input type="number" id="line_width1" class="chart_render rednder form-control" value="0.7" min="0" max="4" step="0.1">  
                  </div>
                </div>
                 <div class="row mb-2">
                  <label for="marker1" class="col-sm-4 col-form-label">Marker Weight</label>
                  <div class="col-sm-4">
                  <input type="number" id="marker1" class="chart_render form-control" value="1.5" min="0" step="0.1" max="4"> 
                  </div>
                </div>
                 <div class="row mb-2">
                  <label for="marker_shape1" class="col-sm-4 col-form-label">Marker Shape</label>
                  <div class="col-sm-4">
                   <select id="marker_shape1" class="chart_render form-control form-select">
                        <option value="circle">Circle </option>
                        <option value="square" selected="">Square </option>
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
              
                <div class="row mb-2">
                  <div class="input-group">
                  <input type="checkbox" id="isOffset1" style="display:inline;" class="filtercheck">
                  <label for="isOffset1" class="col-auto col-form-label">&nbsp; Data Off-set min | max &nbsp;</label>
                    <div class="col-auto">
                    <input type="number" id="offsetmin1" class="form-control" value="150" step="1" style="width:5rem;text-align:center;display:inline;" disabled=""> </div>
                    <div class="col-auto">
                    <input type="number" id="offsetmax1" class="form-control" value="550" step="1" style="width:5rem;text-align:center;display:inline;" disabled="">
                    </div>
                </div>
              </div>
                    <div class="modal-footer">
                      <button class="apply_filter btn btn-danger btn-sm form-check" id="fltr1" disabled=""><i class="fa fa-filter" aria-hidden="true" style="color:black;"></i>&nbsp;Apply Filter</button>
                      <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- modal end here   -->
                               </div></td>
                              
                                 
                              <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length1" style="">777</span></td>
                              <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max1" style="">55.0</span> </td>
                              <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min1" style="">0.0</span> </td>
                              <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg1" style="">35.3</span> </td>
                              <td style="text-align: center; background-color: black; color:#ffffff; "><span id="unit1"> lmh</span> </td>
                    
              </tr>
              <tr class="tr2 table-light">      
                              <td><div class="input-group">
                              <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line2"> 
                                &nbsp;2 &nbsp;<input type="color" id="pen2" name="pen2" value="#09aa9f" class="chart_render series-color" style=""> &nbsp; </div>
                              <div class="col-auto"> 
                              <select class="query form-control form-control-sm form-select mnbtn" id="alpha2" style="">
                              <option value="a">A</option>
                              <option value="b" selected="">B</option>  
                              <option value="c">C</option>
                              <option value="d">D</option>
                              <option value="e">E</option>
                              <option value="f">F</option>
                              <option value="g">G</option>
                              <option value="h">H</option>
                              <option value="i">I</option>
                              <option value="j">J</option>
                              <option value="k">K</option>
                              <option value="l">L</option>
                              <option value="m">M</option>
                              <option value="n">N</option>
                              <option value="o">O</option>
                              </select>
                              </div>  
                              <div class="col-auto"> 
                              <select class="query form-control form-control-sm form-select mnbtn0" id="ufdata2" style="">
                                                <option value="permeability">Permeability</option>
                                                <option value="tmp">TMP</option> 
                                                <option value="flux">Flux</option>           
                                                <option value="pcv">PCV-001</option> 
                                                <option value="bw_counter" selected="">Backwash Counter</option> 
                                                          
                                  </select>
                              </div> 
              
              
              
                            </div>
                             </td><td style="text-align: center;">
                                   
                                                        <!-- Button trigger modal series 2-->
                                                  <span id="panel2" style="">
                                                  <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal" data-bs-target="#modal-series2">
                                                  <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
              
                 <!-- Modal series 2-->
              <div class="modal fade" id="modal-series2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header modelheader2" style="background-color: rgb(9, 170, 159);">
                      <h5 class="modal-title" id="seriestitle2">Series 2: Backwash Counter</h5>
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
                   <input type="checkbox" class="chart_render form-check-input col-auto" id="y_axis2">
                   <label for="y_axis1" class="form-check-label col-auto">&nbsp; Show Y-axis</label>
                  </div>
                </div>
              
                <div class="row mb-2">
                  <div class="input-group">
                  <input type="checkbox" id="isOffset2" style="display:inline;" class="filtercheck">
                  <label for="isOffset2" class="col-auto col-form-label">&nbsp; Data Off-set min | max &nbsp;</label>
                    <div class="col-auto">
                    <input type="number" id="offsetmin2" class="form-control" value="150" step="1" style="width:5rem;text-align:center;display:inline;" disabled=""> </div>
                    <div class="col-auto">
                    <input type="number" id="offsetmax2" class="form-control" value="550" step="1" style="width:5rem;text-align:center;display:inline;" disabled="">
              
                    </div>
                </div>
              </div>
                    <div class="modal-footer">
                      <button class="apply_filter btn btn-danger btn-sm form-check" id="fltr2" disabled=""><i class="fa fa-filter" aria-hidden="true" style="color:black;"></i>&nbsp;Apply Filter</button>
                      <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- modal end here   -->
                               </div></td>
                                
                              
                                 
                              <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length2" style="">1189</span></td>
                              <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max2" style="">25</span> </td>
                              <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min2" style="">1</span> </td>
                              <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg2" style="">12</span> </td>
                              <td style="text-align: center; background-color: black; color:#ffffff; "><span id="unit2"> </span> </td>
                    
              </tr>
              <tr class="tr3 table-light">      
                              <td><div class="input-group">
                              <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line3"> 
                                &nbsp;3 &nbsp;<input type="color" id="pen3" name="pen3" value="#d707f2" class="chart_render series-color" style=""> &nbsp; </div>
                              <div class="col-auto"> 
                              <select class="query form-control form-control-sm form-select mnbtn" id="alpha3" style="">
                              <option value="a" selected="">A</option>
                              <option value="b">B</option>  
                              <option value="c">C</option>
                              <option value="d">D</option>
                              <option value="e">E</option>
                              <option value="f">F</option>
                              <option value="g">G</option>
                              <option value="h">H</option>
                              <option value="i">I</option>
                              <option value="j">J</option>
                              <option value="k">K</option>
                              <option value="l">L</option>
                              <option value="m">M</option>
                              <option value="n">N</option>
                              <option value="o">O</option>
                              </select>
                              </div>  
                              <div class="col-auto"> 
                              <select class="query form-control form-control-sm form-select mnbtn0" id="ufdata3" style="">
                                                <option value="permeability">Permeability</option>
                                                <option value="tmp">TMP</option> 
                                                <option value="flux" selected="">Flux</option>           
                                                <option value="pcv">PCV-001</option> 
                                                <option value="bw_counter">Backwash Counter</option>  
                                                 
                                                          
                                  </select>
                              </div> </div>
                              </td><td style="text-align: center;">
                                   
                                                        <!-- Button trigger modal series 3-->
                                                  <span id="panel3" style="">
                                                  <span type="" class="badge badge-light3d" data-bs-toggle="modal" data-bs-target="#modal-series3">
                                                  <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
              
              
              
              <!-- Modal series 3-->
              <div class="modal fade" id="modal-series3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header modelheader3" style="background-color: rgb(215, 7, 242);">
                      <h5 class="modal-title" id="seriestitle3">Series 3: Flux</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
              
              
                <div class="row mb-2">
                  <label for="chart_type3" class="col-sm-4 col-form-label">Chart Type</label>
                  <div class="col-sm-4">
                    <select class="chart_render form-control form-select" id="chart_type3">
                        <option value="spline">Line</option>
                        <option value="areaspline" selected="">Area </option>          
                        <option value="column">Column </option> 
                        <option value="scatter">Scatter </option>      
                      </select>  
                  </div>
                </div>
              
                <div class="row mb-2">
                  <label for="line_width3" class="chart_render col-sm-4 col-form-label">Line Width</label>
                  <div class="col-sm-4">
                  <input type="number" id="line_width3" class="rednder form-control" value="1.5" min="0" max="4" step="0.1">  
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
                        <option value="triangle" selected="">Trianlge </option>
                        <option value="diamond">Diamond </option>
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
                   <input type="checkbox" class="chart_render form-check-input col-auto" id="y_axis3">
                   <label for="y_axis3" class="form-check-label col-auto">&nbsp; Show Y-axis</label>
                  </div>
                </div>
              
                <div class="row mb-2">
                  <div class="input-group">
                  <input type="checkbox" id="isOffset3" style="display:inline;" class="filtercheck">
                  <label for="isOffset3" class="col-auto col-form-label">&nbsp; Data Off-set min | max &nbsp;</label>
                    <div class="col-auto">
                    <input type="number" id="offsetmin3" class="form-control" value="0" step="1" style="width:5rem;text-align:center;display:inline;" disabled=""> </div>
                    <div class="col-auto">
                    <input type="number" id="offsetmax3" class="form-control" value="1" step="1" style="width:5rem;text-align:center;display:inline;" disabled="">
                    
                    </div>
                </div>
              </div>
                    <div class="modal-footer">
                      <button class="apply_filter btn btn-danger btn-sm form-check" id="fltr3" disabled=""><i class="fa fa-filter" aria-hidden="true" style="color:black;"></i>&nbsp;Apply Filter</button>
                      <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- modal end here   -->
                               </div></td>
                              
                                 
                              <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length3" style="">475</span></td>
                              <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max3" style="">48.6</span> </td>
                              <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min3" style="">0.0</span> </td>
                              <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg3" style="">36.8</span> </td>
                              <td style="text-align: center; background-color: black; color:#ffffff; "><span id="unit3"> lmh</span> </td>
                    
              </tr>
              <tr class="tr4 table-secondary">      
                              <td><div class="input-group">
                              <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line4"> 
                                &nbsp;4 &nbsp;<input type="color" id="pen4" name="pen4" value="#0eade1" class="chart_render series-color" style="display: none;"> &nbsp; </div>
                              <div class="col-auto"> 
                              <select class="query form-control form-control-sm form-select mnbtn" id="alpha4" style="display: none;">
                              <option value="a" selected="">A</option>
                              <option value="b">B</option>  
                              <option value="c">C</option>
                              <option value="d">D</option>
                              <option value="e">E</option>
                              <option value="f">F</option>
                              <option value="g">G</option>
                              <option value="h">H</option>
                              <option value="i">I</option>
                              <option value="j">J</option>
                              <option value="k">K</option>
                              <option value="l">L</option>
                              <option value="m">M</option>
                              <option value="n">N</option>
                              <option value="o">O</option>
                              </select>
                              </div>  
                              <div class="col-auto"> 
                              <select class="query form-control form-control-sm form-select mnbtn0" id="ufdata4" style="display: none;">
                                                <option value="permeability">Permeability</option>
                                                <option value="tmp">TMP</option> 
                                                <option value="flux">Flux</option>           
                                                <option value="pcv" selected="">PCV-001</option> 
                                                <option value="bw_counter">Backwash Counter</option>  
                                                  
                                                          
                                  </select>
                              </div> </div>
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
                      <h5 class="modal-title" id="seriestitle4">Series 4: PCV-001</h5>
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
                   <input type="checkbox" class="chart_render form-check-input col-auto" id="y_axis4">
                   <label for="y_axis4" class="form-check-label col-auto">&nbsp; Show Y-axis</label>
                  </div>
                </div>
              
                <div class="row mb-2">
                  <div class="input-group">
                  <input type="checkbox" id="isOffset4" style="display:inline;" class="filtercheck" checked="">
                  <label for="isOffset4" class="col-auto col-form-label">&nbsp; Data Off-set min | max &nbsp;</label>
                    <div class="col-auto">
                    <input type="number" id="offsetmin4" class="form-control" value="0" step="1" style="width:5rem;text-align:center;display:inline;"> </div>
                    <div class="col-auto">
                    <input type="number" id="offsetmax4" class="form-control" value="1" step="1" style="width:5rem;text-align:center;display:inline;">
                    </div>
                </div>
              </div>
                    <div class="modal-footer">
                      <button class="apply_filter btn btn-danger btn-sm form-check" id="fltr4"><i class="fa fa-filter" aria-hidden="true" style="color:black;"></i>&nbsp;Apply Filter</button>
                      <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- modal end here   -->
              
                               </div></td>
                              
                                 
                              <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length4" style="display: none;">0</span></td>
                              <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max4" style="display: none;">-</span> </td>
                              <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min4" style="display: none;">-</span> </td>
                              <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg4" style="display: none;">-</span> </td>
                              <td style="text-align: center; background-color: black; color:#ffffff; "><span id="unit4"> </span> </td>
                    
              </tr>
              <tr class="tr5 table-secondary">      
                              <td><div class="input-group">
                              <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line5" checked=""> 
                                &nbsp;5 &nbsp;<input type="color" id="pen5" name="pen5" value="#283de2" class="chart_render series-color" style="display: none;"> &nbsp; </div>
                              <div class="col-auto"> 
                              <select class="query form-control form-control-sm form-select mnbtn" id="alpha5" disabled="" style="display: none;">
                              <option value="31" selected="">31</option>  
                              </select>
                              </div>  
                              <div class="col-auto"> 
                              <select class="query form-control form-control-sm form-select mnbtn0" id="ufdata5" style="display: none;">
                              <option value="turbidity">Turbidity</option>
                                                <option value="frc">FRC</option> 
                                                <option value="uv_254">UV-254</option>           
                                                <option value="n_skids">Number of Skids</option> 
                                                <option value="online_skids_flow">Total Flow</option>
                                                <option value="avg_permeability" selected="">Average Permeability</option> 
                                                <option value="avg_flux">Average Flux</option>
                                                <option value="avg_tmp">Average TMP</option>           
                                                  
                                                          
                                  </select>
                              </div> </div>
                             </td><td style="text-align: center;">
                                   
                                                        <!-- Button trigger modal series 5-->
                                                  <span id="panel5" style="display: none;">
                                                  <span type="" class="badge badge-light3d badge-pill" data-bs-toggle="modal" data-bs-target="#modal-series5">
                                                  <i class="fa fa-wrench" aria-hidden="true" style="color:black;"></i></span> </span>
              <!-- Modal series 5-->
              <div class="modal fade" id="modal-series5" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header modelheader5" style="background-color: rgb(40, 61, 226);">
                      <h5 class="modal-title" id="seriestitle5">Series 5: Average Permeability</h5>
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
                  <input type="number" id="line_width5" class="chart_render form-control" value="1.5" min="0" max="4" step="0.1">  
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
                   <input type="checkbox" class="chart_render form-check-input col-auto" id="y_axis5" checked="">
                   <label for="y_axis5" class="form-check-label col-auto">&nbsp; Show Y-axis</label>
                  </div>
                </div>
              
                <div class="row mb-2">
                  <div class="input-group">
                  <input type="checkbox" id="isOffset5" style="display:inline;" class="filtercheck">
                  <label for="isOffset5" class="col-auto col-form-label">&nbsp; Data Off-set min | max &nbsp;</label>
                    <div class="col-auto">
                    <input type="number" id="offsetmin5" class="form-control" value="0" step="1" style="width:5rem;text-align:center;display:inline;" disabled=""> </div>
                    <div class="col-auto">
                    <input type="number" id="offsetmax5" class="form-control" value="1" step="1" style="width:5rem;text-align:center;display:inline;" disabled="">
                    </div>
                </div>
              </div>
                    <div class="modal-footer">
                      <button class="apply_filter btn btn-danger btn-sm form-check" id="fltr5" disabled=""><i class="fa fa-filter" aria-hidden="true" style="color:black;"></i>&nbsp;Apply Filter</button>
                      <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- modal end here   -->
              
              
              
              
                               </div></td>
                              
                                 
                              <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length5" style="display: none;">0</span></td>
                              <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max5" style="display: none;">-</span> </td>
                              <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min5" style="display: none;">-</span> </td>
                              <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg5" style="display: none;">-</span> </td>
                              <td style="text-align: center; background-color: black; color:#ffffff; "><span id="unit5"> </span> </td>
                    
              </tr>
              
              <tr class="tr6 table-secondary">      
                              <td><div class="input-group">
                              <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line6" checked=""> 
                                &nbsp;6 &nbsp;<input type="color" id="pen6" name="pen6" value="#2ce614" class="chart_render series-color" style="display: none;"> &nbsp; </div>
                              <div class="col-auto"> 
                              <select class="query form-control form-control-sm form-select mnbtn" id="alpha6" disabled="" style="display: none;">
                              <option value="31" selected="">31</option>  
                              </select>
                              </div>  
                              <div class="col-auto"> 
                              <select class="query form-control form-control-sm form-select mnbtn0" id="ufdata6" style="display: none;">
                                                <option value="turbidity">Turbidity</option>
                                                <option value="frc">FRC</option> 
                                                <option value="uv_254">UV-254</option>           
                                                <option value="n_skids">Number of Skids</option> 
                                                <option value="online_skids_flow">Total Flow</option>
                                                <option value="avg_permeability">Average Permeability</option> 
                                                <option value="avg_flux" selected="">Average Flux</option>
                                                <option value="avg_tmp">Average TMP</option>                    
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
                    <div class="modal-header modelheader6" style="background-color: rgb(44, 230, 20);">
                      <h5 class="modal-title" id="seriestitle6">Series 6: Average Flux</h5>
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
              
                <div class="row mb-2">
                  <div class="input-group">
                  <input type="checkbox" id="isOffset6" style="display:inline;" class="filtercheck">
                  <label for="isOffset6" class="col-auto col-form-label">&nbsp; Data Off-set min | max &nbsp;</label>
                    <div class="col-auto">
                    <input type="number" id="offsetmin6" class="form-control" value="0" step="1" style="width:5rem;text-align:center;display:inline;" disabled=""> </div>
                    <div class="col-auto">
                    <input type="number" id="offsetmax6" class="form-control" value="1" step="1" style="width:5rem;text-align:center;display:inline;" disabled="">
                    </div>
                </div>
              </div>
                    <div class="modal-footer">
                    <button class="apply_filter btn btn-danger btn-sm form-check" id="fltr6" disabled=""><i class="fa fa-filter" aria-hidden="true" style="color:black;"></i>&nbsp;Apply Filter</button>
                      <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- modal end here   -->
              
              
              
              
                               </div></td>
                              
                                 
                              <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length6" style="display: none;">0</span></td>
                              <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max6" style="display: none;">-</span> </td>
                              <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min6" style="display: none;">-</span> </td>
                              <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg6" style="display: none;">-</span> </td>
                              <td style="text-align: center; background-color: black; color:#ffffff; "><span id="unit6"> </span> </td>
                    
              </tr>
              
              <tr class="tr7 table-secondary">      
                              <td><div class="input-group">
                              <div class="col-auto"><input type="checkbox" class="query series-chk filter" id="line7" checked=""> 
                                &nbsp;7 &nbsp;<input type="color" id="pen7" name="pen7" value="#d41c53" class="chart_render series-color" style="display: none;"> &nbsp; </div>
                              <div class="col-auto"> 
                              <select class="query form-control form-control-sm form-select mnbtn" id="alpha7" disabled="" style="display: none;">
                              <option value="31" selected="">31</option>
                              </select>
                              </div>  
                              <div class="col-auto"> 
                              <select class="query form-control form-control-sm form-select mnbtn0" id="ufdata7" style="display: none;">
                                                <option value="turbidity">Turbidity</option>
                                                <option value="frc">FRC</option> 
                                                <option value="uv_254">UV-254</option>           
                                                <option value="n_skids">Number of Skids</option> 
                                                <option value="online_skids_flow">Total Flow</option>
                                                <option value="avg_permeability">Average Permeability</option> 
                                                <option value="avg_flux">Average Flux</option>
                                                <option value="avg_tmp" selected="">Average TMP</option>          
                                                  
                                                          
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
                    <div class="modal-header modelheader7" style="background-color: rgb(212, 28, 83);">
                      <h5 class="modal-title" id="seriestitle7">Series 7: Average TMP</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
              
                <div class="row mb-2">
                  <label for="chart_type7" class="col-sm-4 col-form-label">Chart Type</label>
                  <div class="col-sm-4">
                    <select class="chart_render form-control form-select" id="chart_type7">
                        <option value="spline">Line</option>
                        <option value="areaspline">Area </option>          
                        <option value="column">Column </option> 
                        <option value="scatter" selected="">Scatter </option>        
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
                   <input type="checkbox" class="chart_render form-check-input col-auto" id="y_axis7" checked="">
                   <label for="y_axis7" class="form-check-label col-auto">&nbsp; Show Y-axis</label>
                  </div>
                </div>
              
                <div class="row mb-2">
                  <div class="input-group">
                  <input type="checkbox" id="isOffset7" style="display:inline;" class="filtercheck">
                  <label for="isOffset7" class="col-auto col-form-label">&nbsp; Data Off-set min | max &nbsp;</label>
                    <div class="col-auto">
                    <input type="number" id="offsetmin7" class="form-control" value="0" step="1" style="width:5rem;text-align:center;display:inline;" disabled=""> </div>
                    <div class="col-auto">
                    <input type="number" id="offsetmax7" class="form-control" value="1" step="1" style="width:5rem;text-align:center;display:inline;" disabled="">
                    </div>
                </div>
              </div>
                    <div class="modal-footer">
                    <button class="apply_filter btn btn-danger btn-sm form-check" id="fltr7" disabled=""><i class="fa fa-filter" aria-hidden="true" style="color:black;"></i>&nbsp;Apply Filter</button>
                      <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- modal end here   -->
              
              
              
              
                               </div></td>
                              
                                 
                              <td style="text-align: center; background-color: black; color:#3edbf0; "> <span id="data_length7" style="display: none;">0</span></td>
                              <td style="text-align: center; background-color: black; color:#f21170; "> <span id="data_max7" style="display: none;">-</span> </td>
                              <td style="text-align: center; background-color: black; color:#00ead3; "> <span id="data_min7" style="display: none;">-</span> </td>
                              <td style="text-align: center; background-color: black; color:#fff600; "> <span id="data_avg7" style="display: none;">-</span> </td>
                              <td style="text-align: center; background-color: black; color:#ffffff; "><span id="unit7"> </span> </td>
                    
              </tr>
              
                  </tbody>
                </table>

<script type="text/javascript" src="{{asset('js/stream/ultrafiltration.js') }}"></script>
</body>
</html>
