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
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script type="text/javascript" src="{{asset('js/com.js') }}"></script>
<title> Veolink Data Export </title>
</head>
<body>
  <body>
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

  </tr>
  
      </tbody>
    </table>  	
   
  
  

    <div class="col-auto">
      <?php if (true) {
        $datar = array();
        $ddx = $dex[0]->pref;
        $bbc =json_decode($ddx);
echo $bbc->d1;
echo $bbc->d2;
echo $bbc->d3;
echo $bbc->d4;
echo $bbc->d5;
echo $bbc->d6;
echo $bbc->d7;
          //echo $bbc;
      } ?>
  </div>
  
  <div id="datatest">

  </div>
  
    <div style="margin-bottom:100px">

    </div>
  
  
  


  <x-footer_level1 /> 
<script type="text/javascript" src="{{asset('js/stream/veolink_dataExport.js') }}"></script>
</body>
</html>
