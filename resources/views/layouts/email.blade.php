<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <style>
        body {
            background-color: rgba(33,37,41,255);
            text-align: center;
        }
        #logo {
            max-width: 100%;
            margin-bottom: 50px;
        }
        .button {
            background-color: rgba(13,110,253,255);
            color: white; 
            border: white;
            border-radius: 2px;
            text-decoration: none;
            padding: 25px;
        }

        .button:hover {
            background-color: rgba(11,94,215,255);
        }


    </style>
</head>
<body>
    {{-- <img id="logo" src="{{asset('/images/ZeonGoLogo.png')}}"> --}}
    @yield('emailBody')
</body>
</html>