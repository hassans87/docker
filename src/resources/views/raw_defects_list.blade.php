<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href={{ 'icons/hmain.png' }} type="image/png" sizes="32x32">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="{{ 'css/font-awesome.min.css' }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/notiflix 2.7.0/notiflix-2.7.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/notiflix 2.7.0/notiflix-aio-2.7.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="{{ asset('css/com.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/com.js') }}"></script>
    <title> Defects Collection</title>
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
  margin-bottom:2rem;
  width:50%;

     "
                class="text-center">New Defects Collection</div>
                
                <span>un-processed defects list,  after 90 days defect will be deleted automatically.</span>
            <table class="table table-bordered table-sm table-light table-striped">
                <thead>
                    <tr style="text-align: center; vertical-align:middle;" class="table-primary">
                        <th> </th>
                        <th> 🗓️</th>
                        <th> 📍Area </th>
                        <th> ⚙️ Equipment </th>
                        <th> 🏷️ Tag </th>
                        <th>🪪 Raised By </th>
                        <th> 🕝</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>

                    <?php $i = 1; ?>
                    @foreach ($dex as $key => $value)
                        <?php $issuedt = new DateTime($value->i_date); ?>

                        <tr style="text-align: center; vertical-align:middle;">
                            <td>{!! $i !!}</td>
                            <td>{!! $issuedt->format('d-m-Y') !!} </td>
                            <td>{!! $value->area !!} </td>
                            <td>{!! $value->equipment !!} </td>
                            <td><a href="{{ url('/defectReview', $value->sr) }}"
                                    class="badge badge-danger">{!! $value->tag !!} </a></td>
                            <td>{!! $value->raised_by !!} </td>
                            <td><?php
                            date_default_timezone_set('Asia/Riyadh');
                            $t = time();
                            $now = new DateTime();
                            $date1 = date('Y-m-d H:i:s', $t);
                            $date2 = new DateTime($value->updated_datetime);
                            $days = $date2->diff($now)->format('%d');
                            $duration = '';
                            if ($days) {
                                $duration = $days . ' days ';
                            }
                            $hrs = $date2->diff($now)->format('%h');
                            if ($hrs) {
                                $duration .= $hrs . ' hours';
                            }
                            $min = $date2->diff($now)->format('%i');
                            $sec = $date2->diff($now)->format('%s');
                            if (!$hrs && !$days && $min > 0.5) {
                                $duration .= $min . ' min.';
                            }
                            if ($min < 1 && $hrs < 1 && $days < 1) {
                                $duration .= $sec . ' Sec.';
                            }
                            echo $duration . ' ago';
                            $i++;
                            ?></td>
                            <td> <a href="{{ url('/defectReview', $value->sr) }}"> <button
                                        class="btn btn-sm">👁️‍🗨️</button> </a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    @if (session()->has('message'))
        <div>
            <script>
                Notiflix.Notify.Success('{{ session('message') }}');
            </script>
        </div>
    @endif
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
                            <a href="{{ url('/DefectsMain') }}">
                                <button class="btn btn-sm badge-light3d">🗂️ &nbsp; Defects &nbsp;
                                </button></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
