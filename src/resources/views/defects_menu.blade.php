<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href={{('icons/hmain.png')}} type="image/png" sizes="32x32">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link href="{{ ('css/font-awesome.min.css') }}" rel="stylesheet">
  <script type="text/javascript" src="{{asset('js/notiflix 2.7.0/notiflix-2.7.0.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('js/notiflix 2.7.0/notiflix-aio-2.7.0.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="{{ asset('../css/com.css') }}" rel="stylesheet">
  <script type="text/javascript" src="{{asset('js/com.js') }}"></script>
  <title>Defects Main</title>
</head>
<body class="">
      <table class="table-borderless align-middle mb-0 mt-0">
          </thead>
            <tbody> 
            <tr >
              <td class="bdr"> <a href="{{url('/addnewDefect')}}"  style="text-decoration: none;" class="menu">
              <button class="btn btn-light menu"> <i class="ancher fa fa-plus text-danger" aria-hidden="true" ></i>&nbsp; New Defect </button></a> 
              </td>
                <td class="bdr"> <a href="{{url('/mdrf_defects_list')}}"  style="text-decoration: none;" class="menu">
                  <button class="btn btn-light menu">🗂️&nbsp; MDRF Defects </button></a>
                  </td>
              <td class="bdr"> 
                </td>
                <td class="bdr">  
                  </td>
            </tr>
            <tr >
              <td class="bdr"> <a href="{{url('/raw_defects_list')}}"  style="text-decoration: none;" class="menu">
              <button class="btn btn-light menu"> <i class="ancher fa fa-database" aria-hidden="true" ></i>&nbsp;Defects Collection</button></a> 
              </td>
                <td class="bdr">
                  </td>
              <td class="bdr"> 
                </td>
                <td class="bdr">  
                  </td>
            </tr>
    
            <tr >
              <td class="bdr"> <a href="{{url('/raw_defects_list')}}"  style="text-decoration: none;" class="menu">
              <button class="btn btn-light menu"> <i class="ancher fa fa-trash-o" aria-hidden="true" ></i>&nbsp;Discarded Defects</button></a> 
              </td>
                <td class="bdr">
                  </td>
              <td class="bdr"> 
                </td>
                <td class="bdr">  
                  </td>
            </tr>
 


 
          </tbody>
        </table>

    <br>

    <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark" style="background-color:rgba(0, 0, 0, 0.7); padding-top:2px; padding-bottom:0px;">
      <div class="container-fluid" >
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav" >
            <li class="nav-item" style="margin-top:8px">
            </li>
            <li class="nav-item">
              <div class="col-auto" style="margin-right:3px;">
                  <a href="{{ url('/home') }}"> 
                      <button class="btn btn-sm badge-light3d"> 🏠 &nbsp; Home &nbsp;
                          </button></a>
                  </div>
            </li>


          </ul>
        </div>
      </div>
    </nav> 

</body>
</html>