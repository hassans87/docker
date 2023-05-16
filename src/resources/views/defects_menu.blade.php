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
  <link href="{{ asset('css/com.css') }}" rel="stylesheet">
  <script type="text/javascript" src="{{asset('js/com.js') }}"></script>
  <title>Home</title>
</head>
<body class="jumbotron"> 
  <div class="container-fluid ">

    <div style="padding-left: 3rem; padding-right: 3rem; padding-bottom:3rem; 
    background: #d2dae2; margin-top: 0.1rem; border-top-right-radius: 3rem; border-bottom-left-radius: 3rem;">
    
     <div style="color:#ff3838; text-align:center; font-size: 1.5rem; font-weight: bold; background-color: #fff; border-bottom-right-radius: 2rem;
    border-bottom-left-radius: 2rem; display:inline-flex; padding-left:1.5rem; padding-right:1.5rem; padding-bottom:0.5rem;
    
    
     " class="text-center">Create New Defect</div>
    <form class="needs-validation" novalidate="">
      <div class="row g-3">
        <div class="col-sm-6">
          <label for="area" class="form-label">Area</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class ="fa fa-location-arrow " aria-hidden="true"></i></span>
            <select class="query form-control form-control-sm form-select" id="area" name="area">
              <option value="00Z">00Z</option>
              <option value="01Z">01Z</option>
              <option value="02Z">02Z</option>
              <option value="04Z">04Z</option>    
              <option value="05Z">05Z</option>  
              <option value="06Z">06Z</option>
              <option value="11Z">11Z</option>
              <option value="12Z">12Z</option>    
              </select>
          </div>
        </div>

        <div class="col-sm-6">
          <label for="equipment" class="form-label">Equipment</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class ="fa fa-cogs" aria-hidden="true"></i></span>
            <input type="text" class="form-control form-control-sm" name="equipment" id="equipment" placeholder="Pump, HOV, POV ..." required="">
          <div class="invalid-feedback">
              Your equipment is required.
            </div>
          </div>
        </div>
        
        <div class="col-sm-6">
          <label for="tag" class="form-label">Tag</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class ="fa fa-tag" aria-hidden="true"></i></span>
            <input type="text" class="form-control form-control-sm" name="tag" id="tag" placeholder="SWRO-41A-***" required="">
          </div>
        </div>

        <div class="col-sm-6">
          <label for="pidnumber" class="form-label">PID Number</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class ="fa fa-map" aria-hidden="true"></i></span>
            <input type="text" class="form-control form-control-sm" name="pidnumber" id="pidnumber" placeholder="SWRO-41A-***" required="">
          <div class="invalid-feedback">
              Your equipment is required.
            </div>
          </div>
        </div>

        <div class="col-sm-12">
          <label for="heading" class="form-label">Defect Heading</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class ="fa fa-th" aria-hidden="true"></i></span>
            <input type="text" class="form-control form-control-sm" name="heading" id="heading" placeholder="Defect Heading" required="">
          <div class="invalid-feedback">
              Your equipment is required.
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <label for="desciption" class="form-label">Description</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class ="fa fa-pencil-square-o" aria-hidden="true"></i></span>
            <textarea rows="7" cols="50"class="form-control form-control-sm" name="desciption" id="desciption" placeholder="Defect details" required=""></textarea>
          <div class="invalid-feedback">
              Your equipment is required.
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <label for="name" class="form-label">Name</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class ="fa fa-user-circle-o" aria-hidden="true"></i></span>
            <input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="Raised by" required="" value="{{Auth::user()->name;}}">
          <div class="invalid-feedback">
              Your equipment is required.
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <label for="eventdate" class="form-label">Date & Time</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class ="fa fa-calendar" aria-hidden="true"></i></span>
            <input type="datetime-local" class="form-control form-control-sm" name="eventdate" id="eventdate" required=""></textarea>
          <div class="invalid-feedback">
              Your equipment is required.
            </div>
          </div>
        </div>


      </div>

      

 

      <hr class="my-4">
      <button class="btn btn-primary btn-sm" type="submit"><i class ="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Submit</button>
      <button class="btn btn-danger btn-sm" type="submit"><i class ="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Clear Form</button>
    </form>
    
    
    
    </div>
    
    </div>
    <br>
  
    <x-footer_general /> 

</body>
</html>