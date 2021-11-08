<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" type="image/png" href="/images/ZeonGoIcon.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark vh-50" style="height: 69px;">
      <a class="ms-3 h-100 navbar-brand" href="/">
        <img class="h-100 img-fluid" src="/images/ZeonGoLogo.png" alt="ZeonGo">
      </a>
    
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav" style="margin-left: auto">
          
        
          @auth
              <li>
                <a href="{{ route('home') }}" class="p-3">{{ auth()->user()->name  }}</a>
                {{-- <a href="#" class="p-3">Actial Name</a> --}}
              </li> 
              <li>
                {{-- <form action="{{ route('logout') }}" method="POST" class="p-3 inline"> --}}
                <form action="#" method="POST" class="p-3 inline">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
              </li>
          @endauth

          @guest
              <li>
                {{-- <a href="{{ route('login') }}" class="p-3">Login</a> --}}
                <a href="#" class="nav-link text-white border border-white rounded">Login</a>
              </li>  
              <li>
                <a href="{{ route('register') }}" class="nav-link text-white border border-white rounded">Register</a>
                {{-- <a href="#" class="p-3">Register</a> --}}
              </li>
          @endguest  

        </ul>    
      {{-- </div> --}}
    </nav>


    @yield('content')

  </body>
</html>