
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
    <script type="text/javascript" src="{{asset('js/ripples/jquery.ripples-min.js') }}"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Add New User</title>
</head>
<body class="mb-48">
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

<main>
  <div class="bg-gray-50 border border-gray-200 rounded p-6 p-10 max-w-lg mx-auto">
<header class="text-center">

    <h2 class="text-2xl font-bold uppercase mb-1">Register</h2>
    <p class="mb-2">Create an account</p>
  </header>

  <form method="POST" action="/users">
    <input type="hidden" name="_token" value="{{csrf_token()}}" >      
    <div class="mb-2">
      <label for="name" class="inline-block text-lg mb-2"> Name </label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{old('name')}}" />

      @error('name')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-2">
      <label for="name" class="inline-block text-lg mb-2"> User Name </label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="username" value="{{old('username')}}" />
      @error('username')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>
    

    <div class="mb-2">
      <label for="email" class="inline-block text-lg mb-2">Email</label>
      <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />

      @error('email')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-2">
      <label for="password" class="inline-block text-lg mb-2">
        Password
      </label>
      <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
        value="{{old('password')}}" />

      @error('password')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-2">
      <label for="password2" class="inline-block text-lg mb-2">
        Confirm Password
      </label>
      <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation"
        value="{{old('password_confirmation')}}" />

      @error('password_confirmation')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-2 text-center">
      <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
        Add New User
      </button>
    </div>
  </form>
  <div class="mb-2 text-center">
  <a href="{{ url('/home') }}">
    <button class="bg-gray-400 text-black rounded py-2 px-4 hover:bg-lime-400">Home &nbsp;<i class="fa fa-home"
            aria-hidden="true" style="color:black;"></i></button></a> </div>
</div>
</main>
</body>
</html>