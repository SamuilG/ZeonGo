<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
    <div id="form">
        <h5 id="message"></h5>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInputEmail" placeholder="Email address">
            <label for="floatingInputEmail">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInputUsername" placeholder="First name">
            <label for="floatingInputUsername">First name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInputUsername" placeholder="Last name">
            <label for="floatingInputUsername">Last name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingRepeatPassword" placeholder="Repeat password">
            <label for="floatingRepeatPassword">Repeat password</label>
        </div>
        <div id="buttons">
            <button type='button' class='btn' onclick='send()'>Sign Up</button>
            <button type='button' class='btn' onclick="location.href='login.php';">Log in</button>
        </div>
    </div>


    
</body>
</html>