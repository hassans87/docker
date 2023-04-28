<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href={{('icons/hmain.png')}} type="image/png" sizes="32x32">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ ('css/font-awesome.min.css') }}" rel="stylesheet">
  <script type="text/javascript" src="{{asset('js/notiflix 2.7.0/notiflix-2.7.0.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('js/notiflix 2.7.0/notiflix-aio-2.7.0.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <title>Home</title>
</head>
<body>
  
  <style>
    
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
    font-weight: bold;
     
      
    }
    .menu a{
     color:#2f3542;
     text-decoration: none;
    }
     </style>
<script>
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
      opacity:0.9,
      fontSize:'12px',
      timeout:3000,
      messageMaxLength:200,
      position:'right-bottom',
      cssAnimationStyle:"zoom",
    });
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
  </script>




<div class="container-fluid">
<div class="row"> 
<div class="col">
<div class="btn-group-vertical glass1">
<button class="btn btn-light menu"> <a   href="{{ url('/ro1norm') }}"  style="text-decoration: none;"><img src={{asset('icons/stocks.png')}}  width="32px" style="vertical-align: middle;">&nbsp; RO1 Normalization </a> </button>
<button class="btn btn-light menu"> <a  href="{{ url('/ro1_cip') }}"  style="text-decoration: none;"><img src={{asset('icons/main-lab.png')}}  width="32px" style="vertical-align: middle;">&nbsp; RO1 CIP</a> </button>
<button class="btn btn-light menu"> <a  href="#"  style="text-decoration: none;"><img src={{asset('icons/error.png')}}  width="32px" style="vertical-align: middle;">&nbsp; RO Common</a> </button>
<button class="btn btn-light menu"> <a  href="#"  style="text-decoration: none;"><img src={{asset('icons/error.png')}}  width="32px" style="vertical-align: middle;">&nbsp; RO2 Normalization New</a> </button>
<button class="btn btn-light menu"> <a href="#"  style="text-decoration: none;"><img src={{asset('icons/error.png')}}  width="32px" style="vertical-align: middle;">&nbsp; RO2 Normalization </a> </button>
<button class="btn btn-light menu"> <a  href="#"  style="text-decoration: none;"><img src={{asset('icons/error.png')}}  width="32px" style="vertical-align: middle;">&nbsp; RO2 Vibrations </a> </button>
<button class="btn btn-light menu"> <a  href="#"  style="text-decoration: none;"><img src={{asset('icons/error.png')}}  width="32px" style="vertical-align: middle;">&nbsp; RO1 CIP</a> </button>
<button class="btn btn-light menu"> <a  href="#"  style="text-decoration: none;"><img src={{asset('icons/error.png')}}  width="32px" style="vertical-align: middle;">&nbsp; Import/Exports</a> </button>

<button class="btn btn-light menu"> <a  href="{{ url('/register') }}"  style="text-decoration: none;"><img src={{asset('icons/new_user.png')}}  width="32px" style="vertical-align: middle;">&nbsp; Add New User</a></button>
<form class="inline" method="POST" action="/logout">
@csrf
<button type="submit" class="btn btn-light menu">
<i class="fa fa-sign-out" aria-hidden="true" style="color:red;"></i>
Logout
</button>
</form>



  </div> </div>



</div>

</div>
@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
    <script>
      Notiflix.Notify.Info('{{session('message')}}');
    </script>
</div>
@endif



</body>
</html>