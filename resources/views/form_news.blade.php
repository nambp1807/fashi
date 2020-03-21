<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creat an Account</title>
    <!--Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="col-md-5 col-md-offset-4" style="border:1px #888888 solid; border-radius:20px;margin-top:5%">
        <div class="col-md-12 text-center">
            <h1>Create an account</h1>
        </div>
        <form class="border-bottom" Action="php_laravel/public/list-user" style="padding:9% ;">
            <div class="form-group">
                <label for="exampleInputEmail1">Your Name </label>
                <input type="name" class="form-control"  placeholder="Your Name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control"  placeholder="Email">
            </div>
            <div class="form-group">
                <label >Password</label>
                <input type="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <label >Confirm Password</label>
                <input type="password" class="form-control"  placeholder="Confirm Password">
            </div>

            <button type="submit" class="btn btn-primary ">Create Your Account</button>
        </form>
    </div>
</div>
</body>
</html>
