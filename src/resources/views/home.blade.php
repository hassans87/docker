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
<body class="jumbotron"> 
<div class="wrapper">
<div class="">
  <div class="table-responsive">
  <table class="table-borderless align-middle mb-0 mt-0">
    <thead class="badge-light3d">
      <tr>
          <th class="bdr">&nbsp;<span style="font-size: 18px;"> 🖥️ </span> &nbsp;VeoLink</th>
          <th class="bdr">&nbsp;<span style="font-size: 18px;"> 🦺 </span>&nbsp;Operation &nbsp;&nbsp;</th>        
          <th class="bdr">&nbsp;<span style="font-size: 18px;"> ⚗️ </span>&nbsp;Laboratory&nbsp;&nbsp;</th>
          <th> <span style="font-size: 18px;"> 🧰 </span>&nbsp;Maintenance&nbsp;&nbsp;</th>
      </tr>
      </thead>
        <tbody> 
        <tr >
          <td class="bdr"><a   href="{{ url('/swintake') }}"  style="text-decoration: none;" class="menu">
          <button class="btn btn-light menu"> 📀&nbsp; SW Intake </button></a> 
          </td>
            <td class="bdr">
              <a  href="{{ url('/ro1_cip') }}"  style="text-decoration: none;" class="menu">
                <button class="btn btn-light menu"> <i class="ancher fa fa-flask text-success" aria-hidden="true" ></i>&nbsp; RO1 CIP </button></a> </td>
          <td class="bdr"><a   href="{{ url('/labCoolingWaterExport') }}"  style="text-decoration: none;" class="menu">
            <button class="btn btn-light menu"> <i class="ancher fa fa-flask" aria-hidden="true" ></i>&nbsp;Cooling Water Export</button></a> 
            </td>
            <td class="bdr"><a   href="{{ url('/DefectsMain') }}" style="text-decoration: none;" class="menu">
              <button class="btn btn-light menu"> 📢&nbsp;Defects</button></a> 
              </td>
        </tr>
        <tr>
          <td class="bdr"><a   href="{{ url('/dafnorth') }}"  style="text-decoration: none;" class="menu">
            <button class="btn btn-light menu"> 📀&nbsp; DAF North</button></a> 
            </td>
            <td class="bdr">
              <a   href="{{ url('/importExport') }}"  style="text-decoration: none;" class="menu">
                <button class="btn btn-light menu"> 📊&nbsp;Production/Import/Export</button></a>
             </td>
             <td class="bdr"><a   href="{{ url('/labDeminWaterExport') }}"  style="text-decoration: none;" class="menu">
              <button class="btn btn-light menu"> <i class="ancher fa fa-flask" aria-hidden="true" ></i>&nbsp;Demin Water Export</button></a> 
              </td>
              <td class="bdr"><a   href="#"  style="text-decoration: none;" class="menu not_ready">
                <button class="btn btn-light menu">🧾 &nbsp;Permit Requests</button></a> 
                </td>
           </tr>
        <tr>
          <td class="bdr"><a   href="{{ url('/dafsouth') }}"  style="text-decoration: none;" class="menu">
            <button class="btn btn-light menu"> 📀&nbsp; DAF South</button></a> 
            </td>
            <td class="bdr"><a   href="#"  style="text-decoration: none;" class="menu not_ready">
              <button class="btn btn-light menu"> <i class="ancherx fa fa-flag" aria-hidden="true"></i>&nbsp; E-PTW</button></a> 
              </td>
              <td class="bdr"><a   href="{{ url('/labRoFeed_x') }}"  style="text-decoration: none;" class="menu not_ready">
                <button class="btn btn-light menu"> <i class="ancherx fa fa-flask" aria-hidden="true" ></i>&nbsp;RO Feed</button></a> 
                </td>
            <td class="bdr" ><a   href="#"  style="text-decoration: none;" class="menu not_ready">
              <button class="btn btn-light menu"> 📊&nbsp;KPI</button></a> 
             </td>
           </tr>

        <tr><td class="bdr"> <a   href="{{ url('/scf') }}"  style="text-decoration: none;" class="menu">
          <button class="btn btn-light menu"> 📀&nbsp; SCF</button></a>
            </td>
            <td class="bdr"> <a   href="{{ url('/BlendingTank') }}"  style="text-decoration: none;" class="menu">
              <button class="btn btn-light menu"> 🖥️&nbsp; Blending Tank</button></a> </td>

            <td class="bdr"><a   href="{{ url('/labFirstPass_x') }}"  style="text-decoration: none;" class="menu not_ready">
              <button class="btn btn-light menu"> <i class="ancherx fa fa-flask" aria-hidden="true" ></i>&nbsp;RO First Pass</button></a> 
              </td>
            <td> </td>
           </tr>
           <tr><td class="bdr">
            <a   href={{ url('/uf_north') }} style="text-decoration: none;" class="menu">
              <button class="btn btn-light menu"> 📀&nbsp; UF North</button></a>
              </td>
              <td><a   href={{ url('/RO1Conductvity') }} style="text-decoration: none;" class="menu">
                <button class="btn btn-light menu"> 🖥️&nbsp;RO1 EC</button></a> </td>
              <td class="bdr"><a   href="{{ url('/labSecondPass_x') }}"  style="text-decoration: none;" class="menu not_ready">
                <button class="btn btn-light menu"> <i class="ancherx fa fa-flask" aria-hidden="true" ></i>&nbsp;RO Second Pass</button></a> 
                </td>
              <td> </td>
             </tr>
             <tr><td class="bdr">
              <a   href={{ url('/uf_south') }}  style="text-decoration: none;" class="menu">
                <button class="btn btn-light menu"> 📀&nbsp; UF South</button></a>
             </td>
             <td><a   href={{ url('/RO2Conductvity') }} style="text-decoration: none;" class="menu">
              <button class="btn btn-light menu"> 🖥️&nbsp;RO2 EC</button></a> </td>
             <td class="bdr">
              </td>
             <td> </td>
            </tr>
            <tr><td class="bdr">
              <a   href={{ url('/ROfeed') }}  style="text-decoration: none;" class="menu">
                <button class="btn btn-light menu"> 📀&nbsp; RO Feed</button></a>
             </td>
             <td> <a   href={{ url('/RO1DPI') }}  style="text-decoration: none;" class="menu">
              <button class="btn btn-light menu"> 🖥️&nbsp; RO1 DPI</button></a> </td>
             <td class="bdr">
              </td>
             <td> </td>
            </tr>
            <tr><td class="bdr">
            </td>
            <td> </td>
            <td> </td>
            <td> </td>
           </tr>
           <tr><td class="bdr">
            <a   href="{{ url('/ro1norm') }}"  style="text-decoration: none;" class="menu">   
              <button class="btn btn-light menu"> 📀&nbsp; RO1 Normalization  </button></a>
           </td>
           <td><a   href={{ url('/onlineDBNPA') }}  style="text-decoration: none;" class="menu">
            <button class="btn btn-light menu"> 🧪&nbsp;DBNPA Dosing</button></a> </td>
           <td> </td>
           <td> </td>
          </tr>
         <tr><td class="bdr">
          <a  href="{{ url('/ro2norm') }}"  style="text-decoration: none;" class="menu">
            <button class="btn btn-light menu"> 📀&nbsp; RO2 Normalization</button></a>
         </td>
         <td>
          <a  href="#"  style="text-decoration: none;" class="menu not_ready">
            <button class="btn btn-light menu"> 🩺&nbsp; Pumps vibration</button></a>
        </td>
         <td> </td>
         <td> </td>
        </tr>
        <tr><td class="bdr">
          <a   href="{{ url('/brine') }}"  style="text-decoration: none;" class="menu">
            <button class="btn btn-light menu"> 📀&nbsp;Brine Reject</button></a>  
        </td>
        <td> </td>
        <td> </td>
        <td> </td>
       </tr>
       <tr><td class="bdr">
        <a   href="{{ url('/PostCO2') }}"  style="text-decoration: none;" class="menu">
          <button class="btn btn-light menu"> 📀&nbsp;Post CO2</button></a>     
       </td>
       <td> </td>
       <td> </td>
       <td> </td>
      </tr>
      <tr><td class="bdr">
        <a   href="{{ url('/PostLime') }}"  style="text-decoration: none;" class="menu">
          <button class="btn btn-light menu"> 📀&nbsp;Post Lime</button></a>
       </td>
       <td> </td>
       <td> </td>
       <td> </td>
      </tr>
      <tr><td class="bdr">
        <a  href="{{ url('/PostCl2') }}"  style="text-decoration: none;" class="menu" >
          <button class="btn btn-light menu"> 📀&nbsp;Post Cl2</button></a>
      </td>
      <td class="menu" >
        </td>
      <td> </td>
      <td> </td>
     </tr>
    <tr><td class="bdr">
      
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

<nav class="navbar fixed-bottom navbar-expand-sm navbar-dark" style="background-color:rgba(0, 0, 0, 0.7); padding-top:2px; padding-bottom:0px;">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav">
        <li class="nav-item">
          <div class="col-auto" style="margin-right:3px;">
            <form class="" method="POST" action="/logout" >
              @csrf
              <button type="submit" class="btn btn-sm badge-light3d">
                🛑 Logout</button>
              </form> </div>
                    
        </li>
        <li class="nav-item">
          <a  href="{{ url('/register') }}"  style="text-decoration: none;" class="btn btn-sm badge-light3d">
            ➕&nbsp;Add New User</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

</body>
</html>