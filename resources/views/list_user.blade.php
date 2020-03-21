<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creat an Account</title>
    <!--Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container col-lg-8">
    <h3 style="text-align: center">v-Datatable Example</h3>
    <table style="margin-top: 20px" class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($lists as $s):?>
        <tr>
            <td><?php echo $s['id'];?></td>
            <td><?php echo $s['name'];?></td>
            <td><?php echo $s['email'];?></td>
            <td><?php echo $s['date'];?></td>
            <td><?php echo $s['created'];?></td>
            <td><?php echo $s['update'];?></td>
        </tr>
        <?php endforeach ;?>
    </table>
    <button class="btn btn-primary">Exit</button>
</div>
</body>
</html>
