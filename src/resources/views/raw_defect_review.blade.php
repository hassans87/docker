<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href={{('../icons/hmain.png')}} type="image/png" sizes="32x32">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link href="{{ ('../css/font-awesome.min.css') }}" rel="stylesheet">
  <script type="text/javascript" src="{{asset('js/notiflix 2.7.0/notiflix-2.7.0.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('js/notiflix 2.7.0/notiflix-aio-2.7.0.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="{{ asset('css/com.css') }}" rel="stylesheet">
  <script type="text/javascript" src="{{asset('js/com.js') }}"></script>
  <title>Update Defect</title>
</head>
<body class="jumbotron"> 
  <div class="container">

    <div style="padding-left: 3rem; padding-right: 3rem; padding-bottom:3rem; 
    background: #d2dae2; margin-top: 0.1rem; border-top-right-radius: 3rem; border-bottom-left-radius: 3rem;">
    
     <div style="color:#ff3838; font-size: 1.5rem; font-weight: bold; background-color: #fff; border-bottom-right-radius: 2rem;
    border-bottom-left-radius: 2rem; display:inline-flex; padding-left:1.5rem; padding-right:1.5rem; padding-bottom:0.5rem;
  display: block;
  margin-left: auto;
  margin-right: auto;
  width:30%;
     " class="text-center">Update Defect</div>
    <form class="" method="POST" action="newDefectSubmission" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{csrf_token()}}" />
      <div class="row g-3">
        
        <div class="col-sm-4">
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
              <option value="13Z">13Z</option>
              <option value="15Z">15Z</option>
              <option value="16B">16B</option>
              <option value="20Z">20Z</option>
              <option value="21Z">21Z</option>
              <option value="22Z">22Z</option>
              <option value="23Z">23Z</option>
              <option value="30Z">30Z</option>
              <option value="31Z">31Z</option>
              <option value="32Z">32Z</option>
              <option value="33Z">33Z</option> 
              <option value="34Z">34Z</option>
              <option value="35Z">35Z</option>
              <option value="37Z">37Z</option>
              <option value="40Z">40Z</option>
              <option value="41Z">41Z</option>
              <option value="43Z">43Z</option>
              <option value="44Z">44Z</option>
              <option value="45Z">45Z</option>
              <option value="46Z">46Z</option>
              <option value="51Z">51Z</option>
              <option value="52Z">52Z</option>
              <option value="53Z">53Z</option>
              <option value="54Z">54Z</option>
              <option value="55Z">55Z</option>
              <option value="56Z">56Z</option>
              <option value="57Z">57Z</option>
              <option value="60Z">60Z</option>
              <option value="61Z">61Z</option>
              <option value="62Z">62Z</option>
              <option value="81Z">81Z</option>
              <option value="82Z">82Z</option>  
              <option value="83Z">83Z</option>
              <option value="84Z">84Z</option>
              </select>
          </div>
        </div>

        <div class="col-sm-4">
          <label for="equipment" class="form-label">Equipment</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class ="fa fa-cogs" aria-hidden="true"></i></span>
            <input type="text" class="form-control form-control-sm" name="equipment" id="equipment" required="" value="{{$dex[0]->equipment}}">
          </div>
          @error('equipment')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        
        <div class="col-sm-4">
          <label for="tag" class="form-label">Tag</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class ="fa fa-tag" aria-hidden="true"></i></span>
            <input type="text" class="form-control form-control-sm" name="tag" id="tag" required="" value="{{$dex[0]->tag}}">
          </div>
          @error('tag')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="col-sm-4">
          <label for="name" class="form-label">Sub-Zone</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class ="fa fa-map-pin" aria-hidden="true"></i></span>
            <input type="text" class="form-control form-control-sm" name="subzone" id="subzone"  required="" value="{{$dex[0]->sub_zone}}">
          </div>
          @error('subzone')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="col-sm-4">
          <label for="eventdate" class="form-label">Equipment Type</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class ="fa fa-cog" aria-hidden="true"></i></span>
            <input type="text" class="form-control form-control-sm" name="equipment_type" id="equipment_type" required="" value="{{$dex[0]->equipment_type}}">
          </div>
          @error('equipment_type')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="col-sm-4">
          <label for="eventdate" class="form-label">Equipment Number</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class ="fa fa-cube" aria-hidden="true"></i></span>
            <input type="text" class="form-control form-control-sm" name="equipment_number" id="equipment_number" required="" value="{{$dex[0]->equipment_number}}">
          </div>
          @error('equipment_number')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="col-sm-4">
          <label for="pidnumber" class="form-label">PID Number</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class ="fa fa-map" aria-hidden="true"></i></span>
            <input type="text" class="form-control form-control-sm" name="pidnumber" id="pidnumber" required="" value="{{$dex[0]->pid_number}}">
          </div>
           @error('pidnumber')
          <p class="text-danger">{{$message}}</p>
          @enderror
          
        </div>
        <div class="col-sm-4">
          <label for="name" class="form-label">Raised By</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class ="fa fa-user-circle-o" aria-hidden="true"></i></span>
            <input type="text" class="form-control form-control-sm" name="raised_by" id="raised_by" required="" value="{{$dex[0]->raised_by}}">
          </div>
          @error('raised_by')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="col-sm-4">
          <label for="eventdate" class="form-label">Date</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class ="fa fa-calendar" aria-hidden="true"></i></span>
            <input type="date" class="form-control form-control-sm" name="event_date" id="event_date" required="" value="{{$dex[0]->i_date}}">
          </div>
          @error('event_date')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="col-sm-12">
          <label for="desciption" class="form-label">Description</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class ="fa fa-pencil-square-o" aria-hidden="true"></i></span>
            <textarea rows="8"  class="form-control form-control-sm" name="desciption" id="desciption" required="">{{$dex[0]->description}}</textarea>
            @error('desciption')
          <p class="text-danger">{{$message}}</p>
          @enderror
          </div>
        </div>
        <div class="col-sm-12">
          <label for="name" class="form-label">Comments by Reviewer</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class ="fa fa-comment-o" aria-hidden="true"></i></span>
            <input type="text" class="form-control form-control-sm" name="remakrs_review" id="remakrs_review" required="" value="">
          </div>
        </div>

        <div class="col-sm-4">
          <label for="eventdate" class="form-label">Picture 1</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class ="fa fa-picture-o" aria-hidden="true"></i></span>
            <input type="file" class="form-control form-control-sm" name="file1" id="file1"  value="{{old('file1')}}">
          </div>
          @error('file1')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="col-sm-4">
          <label for="eventdate" class="form-label">Picture 2</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class ="fa fa-picture-o" aria-hidden="true"></i></span>
            <input type="file" class="form-control form-control-sm" name="file2" id="file2"  value="{{old('file2')}}">
          </div>
          @error('file2')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="col-sm-4">
          <label for="eventdate" class="form-label">Picture 3</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class ="fa fa-picture-o" aria-hidden="true"></i></span>
            <input type="file" class="form-control form-control-sm" name="file3" id="file3"  value="{{old('file3')}}">
          </div>
          @error('file3')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
      </div>

      <br class="my-4">
      <button class="btn btn-warning btn-sm" type="submit">💾 &nbsp;Update</button>
      <a href="{{url('/defectdelete',$dex[0]->sr)}}"> 
        <span class="btn btn-danger btn-sm" >🗑️ &nbsp;Delete</span> </a>

      <a href="{{ url('/raw_defects_list') }}"> 
        <span class="btn btn-dark btn-sm" >❌ &nbsp;Cancel</span> </a>
    </form>
    </div>
    
    </div>
    @if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
        <script>
          Notiflix.Notify.Success('{{session('message')}}');
        </script>
    </div>
    @endif




    <br>
  
    <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark" style="background-color:rgb(0, 0, 0); padding-top:2px; padding-bottom:0px;">
      <div class="container-fluid" >
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav" >
            <li class="nav-item" style="margin-top:8px">
            </li>
            <li class="nav-item">
              <div class="col-auto" style="margin-right:3px;">
                  <a href="{{ url('/home') }}"> 
                      <button class="btn btn-sm badge-light3d">🏠 &nbsp; Home &nbsp;
                          </button></a>
                  </div>
            </li>
            <li class="nav-item">
              <div class="col-auto" style="margin-right:3px;">
                  <a href="{{ url('/DefectsMain') }}"> 
                      <button class="btn btn-sm badge-light3d">🗂️ &nbsp; Defects &nbsp;
                          </button></a>
                  </div>
            </li>
            <li class="nav-item">
                <div class="col-auto" style="margin-right:3px;">
                    <a href="{{url('/defectReview',$dex[0]->sr-1)}}"> 
                        <button class="btn btn-sm badge-light3d">⏪ Previous &nbsp;
                            </button></a>
                    </div>
              </li>
              <li class="nav-item">
                <div class="col-auto" style="margin-right:3px;">
                    <a href="{{url('/defectReview',$dex[0]->sr+1)}}"> 
                        <button class="btn btn-sm badge-light3d">⏩ Next &nbsp;
                            </button></a>
                    </div>
              </li>

              <li class="nav-item">
                <div class="col-auto" style="margin-right:3px;">
                    <a href="#"> 
                        <button class="btn btn-sm badge-light3d">🖨️ Print &nbsp;
                            </button></a>
                    </div>
              </li>

          </ul>
        </div>
      </div>
    </nav> 

</body>
</html>