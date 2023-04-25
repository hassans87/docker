<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href={{asset('icons/hmain.png')}} type="image/png" sizes="32x32">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <title>Home</title>
</head>
<body>
  <style>
    .bgx{
      background-color:#f5f6fa;
      /*
     background: white;
      background: linear-gradient(to bottom right, white 0%, #53e3a6 100%); */
     
     }
    
    .glass {
      
        background: linear-gradient(
        to right bottom,
        rgba(255, 255, 255, 0.7),
        rgba(255, 255, 255, 0.3)
      ); 
      z-index: 2;
      backdrop-filter: blur(2rem);
      display: flex;
      
      
    }
    .glass1 {
      
        background: linear-gradient(
        to right bottom,
        rgba(255, 255, 255, 0.7),
        rgba(255, 255, 255, 0.3)
      ); 
      z-index: 2;
      backdrop-filter: blur(2rem);
      border-top-right-radius: 1rem;
      border-top-left-radius: 1rem;
      
    }
    .glass_active {
        background: red;
        background: linear-gradient(
        to right bottom,
        rgba(255, 71, 87, 0.9),
        rgba(255, 71, 87, 0.6)
      ); 
      z-index: 2;
      backdrop-filter: blur(2rem);
      display: flex; 
      
    }
      .menu{
    font-size:0.9rem; 
    font-family: calibri; 
    color:#2f3542;
    width:100%;
    display: block;
    text-align:left;
     
      
    }
    .menu a{
     color:#2f3542;
     text-decoration: none;
    }
     </style>

<div class="row1"> 
  <div class="col-lg-2">
  <div class="btn-group-vertical" style="width:100%;">

  <a class="btn btn-light menu"  href="{{ url('/ro1norm') }}"  style="text-decoration: none;"><img src={{asset('icons/stocks.png')}}  width="32px" style="vertical-align: middle;">&nbsp; RO1 Normalization </a>
  <a class="btn btn-light menu"  href="{{ url('/ro1_cip') }}"  style="text-decoration: none;"><img src={{asset('icons/stocks.png')}}  width="32px" style="vertical-align: middle;">&nbsp; RO1 CIP</a>
  <a class="btn btn-light menu"  href="{{ url('/') }}"  style="text-decoration: none;"><img src={{asset('icons/stocks.png')}}  width="32px" style="vertical-align: middle;">&nbsp; RO Common</a>
  <a class="btn btn-light menu"  href="{{ url('/') }}"  style="text-decoration: none;"><img src={{asset('icons/stocks.png')}}  width="32px" style="vertical-align: middle;">&nbsp; RO2 Normalization New</a>
  <a class="btn btn-light menu"  href="{{ url('/') }}"  style="text-decoration: none;"><img src={{asset('icons/stocks.png')}}  width="32px" style="vertical-align: middle;">&nbsp; RO2 Normalization </a>
  <a class="btn btn-light menu"  href="{{ url('/') }}"  style="text-decoration: none;"><img src={{asset('icons/stocks.png')}}  width="32px" style="vertical-align: middle;">&nbsp; RO2 Vibrations </a>
  <a class="btn btn-light menu"  href="{{ url('/') }}"  style="text-decoration: none;"><img src={{asset('icons/stocks.png')}}  width="32px" style="vertical-align: middle;">&nbsp; RO1 CIP</a>
  <a class="btn btn-light menu"  href="{{ url('/') }}"  style="text-decoration: none;"><img src={{asset('icons/stocks.png')}}  width="32px" style="vertical-align: middle;">&nbsp; Import/Exports</a>

  </div> </div>
</div>


<div class="col-lg-2" style="height:100vh;">
  <div class="btn-group-vertical">
  </div></div>
  <div class="col-lg-8" >
  <div id="clock" class="light" style="z-index: 100;">

  </div>


</body>
</html>