<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="/images/ZeonGoIcon.png"/>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
    <link rel="stylesheet" href="/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <script src="/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="/css/use.css">
    @yield('headContent')
    <title>@yield('title')</title>
  </head>
  <body>
    {{-- <div id="wrapper"> --}}
    <div class="container-fluid d-flex h-100 flex-column">

      <div class="row">
        <div class="col">

          <nav class="navbar navbar-expand-lg navbar-light bg-dark">
          {{-- <nav class="navbar navbar-expand navbar-light bg-dark vh-50" > --}}
            <a class="ms-3 h-69px navbar-brand" href="/">
              <img class="mh-100 img-fluid" src="/images/ZeonGoLogo.png" alt="ZeonGo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav" style="margin-left: auto">
                
              
                @auth
                
                @if (auth()->user()->isAdmin())
                  <li class="nav-item">
                    <form action="{{route('admin.index')}}" method="GET" class="p-3 inline">
                        <button type="submit" class="me-2 btn btn-outline-light">Admin Panel</button>
                    </form>
                  </li>
                @endif

                <li class="nav-item">
                  <div class="p-3 inline">
                    <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#addDevice">Add Pass</button>
                  </div>
                </li>
                <li class="nav-item">
                  <form action="/account" method="GET" class="p-3 inline">
                      <button type="submit" class="me-2 btn btn-outline-light">Account</button>
                  </form>
                </li>
                  <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="p-3 inline">
                        @csrf
                        <button type="submit" class="me-2 btn btn-outline-light">Logout</button>
                    </form>
                  </li>
                @endauth

                @guest
                    <li class="nav-item">
                      <a href="{{ route('login') }}" class="me-2 btn btn-outline-light m-3" role="button" aria-disabled="true">Login</a>
                    </li>  
                    <li class="nav-item">
                      <a href="{{ route('register') }}" class="me-2 btn btn-outline-light m-3" role="button" aria-disabled="true">Register</a>
                    </li>
                @endguest  

              </ul>    
            </div>
          </nav>
          
        </div>
      </div>

      <div class="modal fade" id="addDevice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Enter a device key below</h5>
              <button type="button" class="btn close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/addDevice" method="post">
              <div class="modal-body">
                <div class="container-fluid">
                    @csrf
                    <input type="text" name="device_key" placeholder="Device Key" class="form-control @error('device_key') border border-danger @enderror">
                    @error('device_key')
                    <p class="text-danger">
                      {{ $message }}
                    </p>
                    @enderror
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Save Changes">
              </div>
            </form>
          </div>
        </div>
      </div>

      @error('device_key')
        <script>
          let addDeviceModal = new bootstrap.Modal(document.getElementById('addDevice'));
          addDeviceModal.show();
        </script>    
      @enderror

      @yield('content')

    </div>
  </body>
</html>