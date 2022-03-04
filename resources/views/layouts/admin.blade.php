<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>

        <script src="https://kit.fontawesome.com/3186fbbd0c.js" crossorigin="anonymous"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white col-2" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light"><img class="img-fluid" src="http://127.0.0.1:8000/images/ZeonGoLogo.png" alt=""></div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/admin/users"><i class="fa fa-user"></i> Users</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!"><i class="fa fa-video"></i> Devices</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!"><i class="fas fa-user-gear"></i> Managers</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Passes</a>
                </div>
            </div>
            <div class="col-10">
                @yield('content')
            </div>
        </div>
    </body>
</html>
