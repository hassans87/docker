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
          <th class="bdr">&nbsp;<i class="fa fa-television" aria-hidden="true"></i> &nbsp;VeoLink</th>
          <th class="bdr">&nbsp;<i class="fa fa-cube" aria-hidden="true"></i>&nbsp;Operation &nbsp;&nbsp;</th>        
          <th class="bdr">&nbsp;<i class="fa fa-flask" aria-hidden="true"></i>&nbsp;Laboratory&nbsp;&nbsp;</th>
          <th class="bdr">&nbsp;<i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;Maintenance&nbsp;&nbsp;</th>
      </tr>
      </thead>
        <tbody> 
        <tr >
          <td class="bdr"><a   href="{{ url('/swintake') }}"  style="text-decoration: none;" class="menu">
          <button class="btn btn-light menu"> <i class="ancher fa fa-database" aria-hidden="true" ></i>&nbsp; SW Intake </button></a> 
          </td>
            <td class="bdr">
              <a  href="{{ url('/ro1_cip') }}"  style="text-decoration: none;" class="menu">
                <button class="btn btn-light menu"> <i class="ancher fa fa-flask" aria-hidden="true" ></i>&nbsp; RO1 CIP </button></a> </td>
          <td class="bdr"><a   href="{{ url('/labCoolingWaterExport') }}"  style="text-decoration: none;" class="menu">
            <button class="btn btn-light menu"> <i class="ancher fa fa-flask" aria-hidden="true" ></i>&nbsp;Cooling Water Export</button></a> 
            </td>
            <td class="bdr"><a   href="{{ url('/DefectsMain') }}" style="text-decoration: none;" class="menu">
              <button class="btn btn-light menu"> <i class="ancherx fa fa-file-text-o" aria-hidden="true" ></i>&nbsp;Defects</button></a> 
              </td>
        </tr>
        <tr>
          <td class="bdr"><a   href="{{ url('/dafnorth') }}"  style="text-decoration: none;" class="menu">
            <button class="btn btn-light menu"> <i class="ancher fa fa-database" aria-hidden="true"></i>&nbsp; DAF North</button></a> 
            </td>
            <td class="bdr">
              <a   href="{{ url('/importExport') }}"  style="text-decoration: none;" class="menu">
                <button class="btn btn-light menu"> <i class="ancher fa fa-line-chart" aria-hidden="true"></i>&nbsp;Production/Import/Export</button></a>
             </td>
             <td class="bdr"><a   href="{{ url('/labDeminWaterExport') }}"  style="text-decoration: none;" class="menu">
              <button class="btn btn-light menu"> <i class="ancher fa fa-flask" aria-hidden="true" ></i>&nbsp;Demin Water Export</button></a> 
              </td>
              <td class="bdr"><a   href="#"  style="text-decoration: none;" class="menu not_ready">
                <button class="btn btn-light menu"> <i class="ancherx fa fa-file-text-o" aria-hidden="true" ></i>&nbsp;Permit Requests</button></a> 
                </td>
           </tr>
        <tr>
          <td class="bdr"><a   href="{{ url('/dafsouth') }}"  style="text-decoration: none;" class="menu">
            <button class="btn btn-light menu"> <i class="ancher fa fa-database" aria-hidden="true"></i>&nbsp; DAF South</button></a> 
            </td>
            <td class="bdr"><a   href="#"  style="text-decoration: none;" class="menu not_ready">
              <button class="btn btn-light menu"> <i class="ancherx fa fa-flag" aria-hidden="true"></i>&nbsp; E-PTW</button></a> 
              </td>
              <td class="bdr"><a   href="#"  style="text-decoration: none;" class="menu not_ready">
                <button class="btn btn-light menu"> <i class="ancherx fa fa-flask" aria-hidden="true" ></i>&nbsp;RO Feed</button></a> 
                </td>
            <td> </td>
           </tr>

        <tr><td class="bdr"> <a   href="{{ url('/scf') }}"  style="text-decoration: none;" class="menu">
          <button class="btn btn-light menu"> <i class="ancher fa fa-database" aria-hidden="true"></i>&nbsp; SCF</button></a>
            </td>
            <td> </td>
            <td class="bdr"><a   href="#"  style="text-decoration: none;" class="menu not_ready">
              <button class="btn btn-light menu"> <i class="ancherx fa fa-flask" aria-hidden="true" ></i>&nbsp;RO First Pass</button></a> 
              </td>
            <td> </td>
           </tr>
           <tr><td class="bdr">
            <a   href={{ url('/uf_north') }} style="text-decoration: none;" class="menu">
              <button class="btn btn-light menu"> <i class="ancher fa fa-database" aria-hidden="true"></i>&nbsp; UF North</button></a>
              </td>
              <td> </td>
              <td class="bdr"><a   href="#"  style="text-decoration: none;" class="menu not_ready">
                <button class="btn btn-light menu"> <i class="ancherx fa fa-flask" aria-hidden="true" ></i>&nbsp;RO Second Pass</button></a> 
                </td>
              <td> </td>
             </tr>
             <tr><td class="bdr">
              <a   href={{ url('/uf_south') }}  style="text-decoration: none;" class="menu">
                <button class="btn btn-light menu"> <i class="ancher fa fa-database" aria-hidden="true"></i>&nbsp; UF South</button></a>
             </td>
             <td> </td>
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
              <button class="btn btn-light menu"> <i class="ancher fa fa-database" aria-hidden="true"></i>&nbsp; RO1 Normalization  </button></a>
           </td>
           <td> </td>
           <td> </td>
           <td> </td>
          </tr>
         <tr><td class="bdr">
          <a  href="{{ url('/ro2norm') }}"  style="text-decoration: none;" class="menu">
            <button class="btn btn-light menu"> <i class="ancher fa fa-database" aria-hidden="true" ></i>&nbsp; RO2 Normalization</button></a>
         </td>
         <td> </td>
         <td> </td>
         <td> </td>
        </tr>
        <tr><td class="bdr">
          <a   href="{{ url('/brine') }}"  style="text-decoration: none;" class="menu">
            <button class="btn btn-light menu"> <i class="ancher fa fa-database" aria-hidden="true"></i>&nbsp;Brine Reject</button></a>  
        </td>
        <td> </td>
        <td> </td>
        <td> </td>
       </tr>
       <tr><td class="bdr">
        <a   href="{{ url('/PostCO2') }}"  style="text-decoration: none;" class="menu">
          <button class="btn btn-light menu"> <i class="ancher fa fa-database" aria-hidden="true"></i>&nbsp;Post CO2</button></a>     
       </td>
       <td> </td>
       <td> </td>
       <td> </td>
      </tr>
      <tr><td class="bdr">
        <a   href="{{ url('/PostLime') }}"  style="text-decoration: none;" class="menu">
          <button class="btn btn-light menu"> <i class="ancher fa fa-database" aria-hidden="true"></i>&nbsp;Post Lime</button></a>
       </td>
       <td> </td>
       <td> </td>
       <td> </td>
      </tr>
      <tr><td class="bdr">
        <a  href="{{ url('/PostCl2') }}"  style="text-decoration: none;" class="menu" >
          <button class="btn btn-light menu"> <i class="ancher fa fa-database" aria-hidden="true"></i>&nbsp;Post Cl2</button></a>
      </td>
      <td> </td>
      <td> </td>
      <td> </td>
     </tr>
    <tr><td class="bdr">
      <a   href="#"  style="text-decoration: none;" class="menu not_ready">
        <button class="btn btn-light menu"> <i class="ancherx fa fa-cloud-download" aria-hidden="true"></i>&nbsp;Data Download</button></a>
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
@if(session()->has('message'))
    <script>
      Notiflix.Notify.Info('{{session('message')}}');
    </script>
@endif

<script>
$('.not_ready').click(function(){
  Notiflix.Report.Failure('Database built in progress','Close');
  ;})

</script>

<nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav">
        <li class="nav-item" style="margin-top:8px">
         
          <form class="" method="POST" action="/logout" >
            @csrf
            <button type="submit" class="badge bg-light text-dark">
            <i class="fa fa-sign-out" aria-hidden="true" style="color:rgb(121, 119, 119);"></i>Logout</button>
            </form> 
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
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

</body>
</html>