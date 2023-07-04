<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href={{ '../icons/hmain.png' }} type="image/png" sizes="32x32">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="{{ '../css/font-awesome.min.css' }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/notiflix 2.7.0/notiflix-2.7.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/notiflix 2.7.0/notiflix-aio-2.7.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="{{ asset('css/com.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/com.js') }}"></script>
    <title>Update Defect</title>
</head>

<body class="jumbotron">
    <div class="container">

        <div
            style="padding-left: 3rem; padding-right: 3rem; padding-bottom:3rem; 
    background: #d2dae2; margin-top: 0.1rem; border-top-right-radius: 3rem; border-bottom-left-radius: 3rem;">

            <div style="color:#ff3838; font-size: 1.5rem; font-weight: bold; background-color: #fff; border-bottom-right-radius: 2rem;
    border-bottom-left-radius: 2rem; display:inline-flex; padding-left:1.5rem; padding-right:1.5rem; padding-bottom:0.5rem;
  display: block;
  margin-left: auto;
  margin-right: auto;
  width:30%;
     "
                class="text-center">CM MDRF# {{ $dex[0]->mdrf_nb }}</div>
            <form class="" method="POST" action="newDefectSubmission" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="row g-3">

                    <div class="col-sm-4">
                        <label for="area" class="form-label">Area</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fa fa-location-arrow "
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control form-control-sm" name="equipment" id="equipment"
                                required="" value="{{ $dex[0]->area }}">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label for="equipment" class="form-label">Equipment</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fa fa-cogs" aria-hidden="true"></i></span>
                            <input type="text" class="form-control form-control-sm" name="equipment" id="equipment"
                                required="" value="{{ $dex[0]->equipment }}">
                        </div>
                        @error('equipment')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <label for="tag" class="form-label">Tag</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fa fa-tag" aria-hidden="true"></i></span>
                            <input type="text" class="form-control form-control-sm" name="tag" id="tag"
                                required="" value="{{ $dex[0]->tag }}">
                        </div>
                        @error('tag')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <label for="name" class="form-label">Sub-Zone</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fa fa-map-pin" aria-hidden="true"></i></span>
                            <input type="text" class="form-control form-control-sm" name="subzone" id="subzone"
                                required="" value="{{ $dex[0]->t_zone }}">
                        </div>
                        @error('subzone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <label for="eventdate" class="form-label">Equipment Type</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fa fa-cog" aria-hidden="true"></i></span>
                            <input type="text" class="form-control form-control-sm" name="equipment_type"
                                id="equipment_type" required="" value="{{ $dex[0]->t_equipment }}">
                        </div>
                        @error('equipment_type')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <label for="eventdate" class="form-label">Equipment Number</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fa fa-cube" aria-hidden="true"></i></span>
                            <input type="text" class="form-control form-control-sm" name="equipment_number"
                                id="equipment_number" required="" value="{{ $dex[0]->t_equipment_nb }}">
                        </div>
                        @error('equipment_number')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <label for="pidnumber" class="form-label">PID Number</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fa fa-map" aria-hidden="true"></i></span>
                            <input type="text" class="form-control form-control-sm" name="pidnumber"
                                id="pidnumber" required="" value="{{ $dex[0]->defect_discipline }}">
                        </div>
                        @error('pidnumber')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="col-sm-4">
                        <label for="name" class="form-label">Raised By</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fa fa-user-circle-o"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control form-control-sm" name="raised_by"
                                id="raised_by" required="" value="{{ $dex[0]->i_date }}">
                        </div>
                        @error('raised_by')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <label for="eventdate" class="form-label">Date</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            <input type="date" class="form-control form-control-sm" name="event_date"
                                id="event_date" required="" value="{{ $dex[0]->i_date }}">
                        </div>
                        @error('event_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-sm-12">
                        <label for="desciption" class="form-label">Description</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fa fa-pencil-square-o"
                                    aria-hidden="true"></i></span>
                            <textarea rows="8" class="form-control form-control-sm" name="desciption" id="desciption" required="">{{ $dex[0]->defect_discription }}</textarea>
                            @error('desciption')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>

                <br class="my-4">
                <button class="btn btn-warning btn-sm" type="submit">💾 &nbsp;Update</button>
                <a href="{{ url('/defectdelete', $dex[0]->mdrf_nb) }}">
                    <span class="btn btn-danger btn-sm">🗑️ &nbsp;Delete</span> </a>

                <a href="{{ url('/raw_defects_list') }}">
                    <span class="btn btn-dark btn-sm">❌ &nbsp;Cancel</span> </a>
            </form>
        </div>

    </div>
    @if (session()->has('message'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
            <script>
                Notiflix.Notify.Success('{{ session('message') }}');
            </script>
        </div>
    @endif




    <br>

    <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark"
        style="background-color:rgba(0, 0, 0, 0.7); padding-top:2px; padding-bottom:0px;">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">
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
                            <a href="{{ url('/mdrf_defects_list') }}">
                                <button class="btn btn-sm badge-light3d">🗂️ &nbsp; Defects &nbsp;
                                </button></a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:3px;">
                            <a href="{{ url('/mdrfReview', $dex[0]->mdrf_nb - 1) }}">
                                <button class="btn btn-sm badge-light3d">⏪ Previous &nbsp;
                                </button></a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:3px;">
                            <a href="{{ url('/mdrfReview', $dex[0]->mdrf_nb + 1) }}">
                                <button class="btn btn-sm badge-light3d">⏩ Next &nbsp;
                                </button></a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="col-auto" style="margin-right:3px;">
                            <div class="input-group input-group-sm">
                                <input type="number" class="form-control" id="search_mdrf" maxlength="5"
                                    size="5">
                                <button class="btn btn-sm badge-light3d" type="button" id="search_trigger">🔎 &nbsp;
                                    Find &nbsp;</button>
                            </div>
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

<script>
    $('#search_trigger').click(function() {
        let fx1 = $('#search_mdrf').val();
        window.location.replace("./"+fx1);
    })
</script>

</html>
