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
  <script type="text/javascript" src="{{asset('js/notiflix 3.2.6/notiflix-3.2.6.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('js/notiflix 3.2.6/notiflix-aio-3.2.6.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.0/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/cr-1.5.4/fc-3.3.3/fh-3.1.9/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.5/datatables.min.css"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
<title>RO First Pass </title>
</head>
<body>
    <?php  $ddx = $dex[0]->pref;
    $param =json_decode($ddx); 
    $colors =array("#ff3838","#17c0eb","#32ff7e","#c56cf0","#ffaf40","#FC427B","#55E6C1","#25CCF7");
    function userPref($dbparam){
      try{echo $dbparam;}catch(Throwable $e){}
    }
    function serInd($sd,$sdx){
      if($sd==$sdx){
        return 'selected="""';
      }
    }
  
    function checkIf($sdx){
      if($sdx=="true"){
        return 'checked="""';
      }
    }
    
    ?>
<style>
.cll{
margin:0; 
padding:0;  
width:20px;
overflow:hidden;
inline-size:20px;
overflow-wrap: break-word;
}
    </style>

<div class="tg scrollspy-example"  data-bs-spy="scroll" data-bs-target="#navbar-example" style="font-size:9px; margin-bottom:50px;"></div>


                <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark" style="background-color:rgba(0, 0, 0, 0.7); padding-top:2px; padding-bottom:0px;">
                  <div class="container-fluid" >
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                      <ul class="navbar-nav" >
                        <li class="nav-item" style="margin-top:8px">
                        </li>
                        <li class="nav-item">
                          <div class="col-auto" style="margin-right:3px;">
                              <a href="{{ url('/home') }}"> 
                                  <button class="btn btn-sm badge-light3d"><span style="font-size: 14px;"> 🏠 </span> &nbsp; Home &nbsp;
                                      </button></a>
                              </div>
                        </li>
                  <li class="nav-item">
                  <div class="col-auto" style="margin-right:3px;">
                    <div class="input-group input-group-sm">
                      <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">🗓️ From</div>
              
                      <input type="date" name="start_date" class="tensor-flow form-control form-control-sm" id="start_date" value="{{$param->date1 }}" min="2016-01-01" max="2027-11-10" required="" style="background-color:#dff9fb;">
                    </div>
                  </div> </li>
                  <li class="nav-item">
                  <div class="col-auto" style="margin-right:3px;">
                    <div class="input-group input-group-sm">
                      <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">🗓️ To</div>
                      <input type="date" name="end_date" id="end_date" value="{{$param->date2}}" min="2016-01-31" max="2027-03-30" class="tensor-flow form-control form-control-sm" required="" style="background-color:#dff9fb;">
                    </div>
                  </div> </li>
                  <li class="nav-item">
                      <div class="col-auto" style="margin-right:3px;">
                          <div class="input-group input-group-sm">
                          <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm"><span style="font-size: 14px;"> 🏷️  </span></div>
                          <select class="query form-control form-control-sm form-select" id="skidx" style="background-color:#dff9fb;">
                              <option value="a" {{serInd("a",$param->skid1)}}> 41-A</option>
                              <option value="b" {{serInd("b",$param->skid1)}}>41-B</option>
                              <option value="c" {{serInd("c",$param->skid1)}}>41-C</option>
                              <option value="d" {{serInd("d",$param->skid1)}}>41-D</option>
                              <option value="e" {{serInd("e",$param->skid1)}}>41-E</option>
                              <option value="f" {{serInd("f",$param->skid1)}}>41-F</option>
                              <option value="g" {{serInd("g",$param->skid1)}}>41-G</option>
                              <option value="h" {{serInd("h",$param->skid1)}}>41-H</option>
                              <option value="i" {{serInd("i",$param->skid1)}}>41-I</option>
                              <option value="j" {{serInd("j",$param->skid1)}}>41-J</option>
                              <option value="k" {{serInd("k",$param->skid1)}}>41-K</option> 
                            </select>
                          </div>
                      </div> </li>
                        <li class="nav-item">
                          <div class="col-auto" style="margin-right:3px;">
                              <div class="input-group input-group-sm">
                              <div class="input-group-text badge-light3d mnbtn" id="inputGroup-sizing-sm">📶 Order</div>
                              <select class="query form-control form-control-sm form-select" id="order" style="background-color:#dff9fb;">
                                <option value="ASC" >Asc</option>
                                <option value="DESC" >Desc</option>  
                                </select>
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
                            <li class="nav-item">
                              <div class="col-auto" style="margin-right:3px;">
                                <div class="input-group input-group-sm">
                                  <a href="{{url('/ro1norm') }}">
                                    <button id="trigger_tb" class="btn badge-light3d btn-sm">
                                    <span style="font-size: 14px;"> 📉 </span> Trend</button>
</a>
                                </div>
                              </div> 
                      </ul>
                    </div>
                  </div>
                </nav>
<script type="text/javascript" src="{{asset('js/stream/ro1_norms_dataexport.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.0/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/cr-1.5.4/fc-3.3.3/fh-3.1.9/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.5/datatables.min.js"></script>

</body>
</html>
