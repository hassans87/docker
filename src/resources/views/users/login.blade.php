<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href={{asset('icons/pulse.png')}} type="image/png" sizes="32x32">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('js/notiflix 2.7.0/notiflix-2.7.0.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/notiflix 2.7.0/notiflix-aio-2.7.0.min.js') }}"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Log In</title>
</head>
<body class="mb-10">
  <script>
    tailwind.config = {
        theme: {
          extend: {
            colors: {
              laravel: '#ef3b2d',
            },
          },
        },
      }

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
<main >
  <div class="bg-gray-50 border border-gray-200 rounded p-6 p-10 max-w-lg mx-auto mt-10">
  <header class="text-center">
    
      <h2 class="text-2xl font-bold uppercase mb-1">Login</h2>
      <p class="mb-2">Log into your account</p>
    </header>
    <form method="POST" action="/users/authenticate">
      <input type="hidden" name="_token" value="{{csrf_token()}}" />
      <div class="mb-4">
        <label for="username" class="inline-block text-lg mb-2"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;User Name</label>
        <input type="username" class="border border-gray-200 rounded p-2 w-full" autofocus placeholder="User Name" name="username" value="{{old('username')}}" />

        @error('username')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="password" class="inline-block text-lg mb-2">
          <i class="fa fa-key" aria-hidden="true"></i>&nbsp; Password
        </label>
        <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
          value="{{old('password')}}" />

        @error('password')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-2">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">
            {{ __('Remember Me') }}
        </label>
    </div>



      <div class="mb-2 text-center">
        <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
          <i class="fa fa-sign-in" aria-hidden="true"></i> &nbsp; Sign In
        </button>
      </div>

      @if (Route::has('password.request'))
      <a class="btn btn-link" href="{{ route('password.request') }}">
          {{ __('Forgot Your Password?') }}
      </a>
  @endif

    </form>
</div>
</main>
@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
    <script>
      Notiflix.Notify.Warning('{{session('message')}}');
    </script>
</div>
@endif
</body>
</html>















