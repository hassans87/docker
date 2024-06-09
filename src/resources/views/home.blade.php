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
  <link href="{{ asset('css/com.css') }}" rel="stylesheet">
  <script type="text/javascript" src="{{asset('js/com.js') }}"></script>
  <title>Home</title>
</head>
<body class="" style="background-color:black;"> 
  <style>

.bdrx, a, th{
    color:rgb(255, 255, 255);
    background-color:rgb(0, 0, 0);
}
  .bdrx:hover, a:hover, th:hover{ 
    color:rgb(5, 239, 5); }
    
    .shimmer {
  animation: shimmer 4s linear infinite;
  background-image: linear-gradient(-70deg, 
    rgba(255,255,255,0) 46%, 
    rgba(255,255,255,.8) 50%, 
    rgba(255,255,255,.8) 52%, 
    rgba(255,255,255,0) 56%
  );
	background-size: 400% 100%;
}


@keyframes shimmer{
	0% {
		background-position: 100% 50%;
	}
	30% {
		background-position: 0% 50%;
	}
}

    </style>
<div class="">
<div style="backgound-color:black;">
  <div class="table-responsive" style="background-color:black;">
  <table class="table-borderless align-middle mb-0 mt-0">
    <thead class="badge-dark">
      <tr>
          <th class="text-light">&nbsp;<span style="font-size: 18px;"> 🖥️ </span> &nbsp;VeoLink</th>
          <th class="text-light ">&nbsp;<span style="font-size: 18px;"> 🦺 </span>&nbsp;Operation &nbsp;&nbsp;</th>        
          <th class="text-light ">&nbsp;<span style="font-size: 18px;"> ⚗️ </span>&nbsp;Laboratory&nbsp;&nbsp;</th>
          <th class="text-light "> <span style="font-size: 18px;"> 🧰 </span>&nbsp;Maintenance&nbsp;&nbsp;</th>
      </tr>
      </thead>
        <tbody> 
        <tr >
          <td class="bdrx"><a   href="{{ url('/swintake') }}"  style="text-decoration: none;" class="menu">
          <button class="btn text-light btn-outline-dark menu"> 🖥️&nbsp; SW Intake </button></a> 
          </td>
            <td class="bdrx">
              <a  href="{{ url('/ro1_cip') }}"  style="text-decoration: none;" class="menu">
                <button class="btn menu text-light btn-outline-dark"> <i class="ancher fa fa-flask text-warning" aria-hidden="true" ></i>&nbsp; RO1 CIP </button></a> </td>
          <td class="bdrx"><a   href="{{ url('/labCoolingWaterExport') }}"  style="text-decoration: none;" class="menu">
            <button class="btn text-light btn-outline-dark menu"> <i class="ancher fa fa-flask" aria-hidden="true" ></i>&nbsp;Cooling Water Export</button></a> 
            </td>
            <td class="bdrx"><a   href="{{ url('/DefectsMain') }}" style="text-decoration: none;" class="menu">
              <button class="btn text-light btn-outline-dark menu"> 📢&nbsp;Defects</button></a> 
              </td>
        </tr>
        <tr>
          <td class="bdrx"><a   href="{{ url('/dafnorth') }}"  style="text-decoration: none;" class="menu">
            <button class="btn text-light btn-outline-dark menu"> 🖥️&nbsp; DAF North</button></a> 
            </td>
            <td class="bdrx">
              <a   href="{{ url('/importExport') }}"  style="text-decoration: none;" class="menu">
                <button class="btn text-light btn-outline-dark menu"> 📊&nbsp;Production/Import/Export</button></a>
             </td>
             <td class="bdrx"><a   href="{{ url('/labDeminWaterExport') }}"  style="text-decoration: none;" class="menu">
              <button class="btn text-light btn-outline-dark menu"> <i class="ancher fa fa-flask" aria-hidden="true" ></i>&nbsp;Demin Water Export</button></a> 
              </td>
              <td class="bdrx"><a   href="#"  style="text-decoration: none;" class="menu not_ready">
                <button class="btn text-light btn-outline-dark menu">🧾 &nbsp;Permit Requests</button></a> 
                </td>
           </tr>
        <tr>
          <td class="bdrx"><a   href="{{ url('/dafsouth') }}"  style="text-decoration: none;" class="menu">
            <button class="btn text-light btn-outline-dark menu"> 🖥️&nbsp; DAF South</button></a> 
            </td>
            <td class="bdrx"><a   href="#"  style="text-decoration: none;" class="menu not_ready">
              <button class="btn text-light btn-outline-dark menu"> <i class="ancherx fa fa-flag" aria-hidden="true"></i>&nbsp; E-PTW</button></a> 
              </td>
              <td class="bdrx"><a   href="{{ url('/labRoFeed_x') }}"  style="text-decoration: none;" class="menu not_ready">
                <button class="btn text-light btn-outline-dark menu"> <i class="ancherx fa fa-flask" aria-hidden="true" ></i>&nbsp;RO Feed</button></a> 
                </td>
            <td class="bdrx" ><a   href="#"  style="text-decoration: none;" class="menu not_ready">
              <button class="btn text-light btn-outline-dark menu"> 📊&nbsp;KPI</button></a> 
             </td>
           </tr>

        <tr><td class="bdrx"> <a   href="{{ url('/scf') }}"  style="text-decoration: none;" class="menu">
          <button class="btn text-light btn-outline-dark menu"> 🖥️&nbsp; SCF</button></a>
            </td>
            <td class="bdrx"> <a   href="{{ url('/BlendingTank') }}"  style="text-decoration: none;" class="menu">
              <button class="btn text-light btn-outline-dark menu"> 🖥️&nbsp; Blending Tank</button></a> </td>

            <td class="bdrx"><a   href="{{ url('/labFirstPass_x') }}"  style="text-decoration: none;" class="menu not_ready">
              <button class="btn text-light btn-outline-dark menu"> <i class="ancherx fa fa-flask" aria-hidden="true" ></i>&nbsp;RO First Pass</button></a> 
              </td>
            <td> </td>
           </tr>
           <tr><td class="bdrx">
            <a   href={{ url('/uf_north') }} style="text-decoration: none;" class="menu">
              <button class="btn text-light btn-outline-dark menu">🖥️&nbsp; UF North</button></a>
              </td>
              <td><a   href={{ url('/RO1Conductvity') }} style="text-decoration: none;" class="menu">
                <button class="btn text-light btn-outline-dark menu"> 🖥️&nbsp;RO1 EC</button></a> </td>
              <td class="bdrx"><a   href="{{ url('/labSecondPass_x') }}"  style="text-decoration: none;" class="menu not_ready">
                <button class="btn text-light btn-outline-dark menu"> <i class="ancherx fa fa-flask" aria-hidden="true" ></i>&nbsp;RO Second Pass</button></a> 
                </td>
              <td> </td>
             </tr>
             <tr><td class="bdrx">
              <a   href={{ url('/uf_south') }}  style="text-decoration: none;" class="menu">
                <button class="btn text-light btn-outline-dark menu"> 🖥️&nbsp; UF South</button></a>
             </td>
             <td><a   href={{ url('/RO2Conductvity') }} style="text-decoration: none;" class="menu">
              <button class="btn text-light btn-outline-dark menu"> 🖥️&nbsp;RO2 EC</button></a> </td>
             <td class="bdrx">
              </td>
             <td> </td>
            </tr>
            <tr><td class="bdrx">
              <a   href={{ url('/ROfeed') }}  style="text-decoration: none;" class="menu">
                <button class="btn text-light btn-outline-dark menu">🖥️&nbsp; RO Feed</button></a>
             </td>
             <td> <a   href={{ url('/RO1DPI') }}  style="text-decoration: none;" class="menu">
              <button class="btn text-light btn-outline-dark menu"> 🖥️&nbsp; RO1 DPI</button></a> </td>
             <td class="bdrx">
              </td>
             <td> </td>
            </tr>
            <tr><td class="bdrx">
            </td>
            <td> </td>
            <td> </td>
            <td> </td>
           </tr>
           <tr><td class="bdrx shimmer">
            <a   href="{{ url('/ro1norm') }}"  style="text-decoration: none;" class="menu">   
              <button class="btn text-light btn-outline-dark menu">🖥️&nbsp; RO1 Normalization  </button></a>
           </td>
           <td><a   href={{ url('/onlineDBNPA') }}  style="text-decoration: none;" class="menu">
            <button class="btn text-light btn-outline-dark menu"> 🧪&nbsp;DBNPA Dosing</button></a> </td>
           <td> </td>
           <td> </td>
          </tr>
         <tr><td class="bdrx">
          <a  href="{{ url('/ro2norm') }}"  style="text-decoration: none;" class="menu">
            <button class="btn text-light btn-outline-dark menu"> 🖥️&nbsp; RO2 Normalization</button></a>
         </td>
         <td>
          <a  href="#"  style="text-decoration: none;" class="menu not_ready">
            <button class="btn text-light btn-outline-dark menu"> 🩺&nbsp; Pumps vibration</button></a>
        </td>
         <td> </td>
         <td> </td>
        </tr>
        <tr>
          <td class="bdrx">
          <a   href="{{ url('/brine') }}"  style="text-decoration: none;" class="menu">
            <button class="btn text-light btn-outline-dark menu"> 🖥️&nbsp;Brine Reject</button></a>  
        </td>
        <td><a   href="{{ url('/normscomparison') }}"  style="text-decoration: none;" class="menu">
          <button class="btn text-light btn-outline-dark menu"> 🚦 &nbsp; RO1 Data Pipeline </button></a>   </td>
        <td> </td>
        <td> </td>
       </tr>
       <tr><td class="bdrx">
        <a   href="{{ url('/PostCO2') }}"  style="text-decoration: none;" class="menu">
          <button class="btn text-light btn-outline-dark menu"> 🖥️ &nbsp;Post CO2</button></a>     
       </td>
       <td class="bdrx"><a   href="{{ url('/DataCleansing') }}"  style="text-decoration: none;" class="menu">
        <button class="btn text-light btn-outline-dark menu">  🧹 &nbsp; Data Cleansing</button></a> </td>
       <td> </td>
       <td> </td>
      </tr>
      <tr><td class="bdrx">
        <a   href="{{ url('/PostLime') }}"  style="text-decoration: none;" class="menu">
          <button class="btn text-light btn-outline-dark menu"> 🖥️ &nbsp;Post Lime</button></a>
       </td>
       <td> </td>
       <td> </td>
       <td> </td>
      </tr>
      <tr><td class="bdrx">
        <a  href="{{ url('/PostCl2') }}"  style="text-decoration: none;" class="menu" >
          <button class="btn text-light btn-outline-dark menu"> 🖥️ &nbsp;Post Cl2</button></a>
      </td>
      <td class="menu" >
        </td>
      <td> </td>
      <td> </td>
     </tr>
    <tr><td class="bdrx">
      
     </td>
     <td> </td>
     <td> </td>
     <td> </td>
    </tr>
      </tbody>
    </table> 
  </div>
</div>

</div>
<div style="display:none; background-color:aqua;" id="checkin">
  <button class="btn btn-sm btn-danger" >Log in </button>
    </div>

@if(session()->has('message'))
    <script>
      Notiflix.Notify.Info('{{session('message')}}');
    </script>
@endif

<script>



$('.not_ready').click(function(){
  Notiflix.Report.Failure('Database built in progress','Close');
  ;})

  $('#checkme').click(function(){
  Notiflix.Report.Info('Session expired','Login again session has been expired!','/google.com');
  
    window.location.replace("./swintake")
 
  ;});

</script>

<nav class="navbar fixed-bottom navbar-expand-sm navbar-dark" style="background-color:rgba(0, 0, 0, 0.8); padding-top:2px; padding-bottom:0px;">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav">
        <li class="nav-item">
          <div class="col-auto" style="margin-right:3px;">
            <form class="" method="POST" action="/logout" >
              @csrf
              <button type="submit" class="btn btn-sm text-light btn-outline-dark">
                🛑 Logout</button>
              </form> </div>
                    
        </li>
        <li class="nav-item">
          <a  href="{{ url('/register') }}"  style="text-decoration: none;" class="btn btn-sm text-light btn-outline-dark">
            ➕&nbsp;Add New User</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

</body>
</html>