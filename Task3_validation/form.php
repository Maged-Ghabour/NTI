<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation Form with PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body{
            height:100vh;
            display: flex;
            justify-content: center;
            align-items:center;
            flex-direction:column;
        }
  
       
    </style>
</head>
<body>

    <div class="container-fluid">

    <form action="action.php" method="post">
        <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="address">Email address</label>
            <input type="text" class="form-control" id="address" name="email" aria-describedby="emailHelp" placeholder="Enter Email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
        </div>
        <div class="form-group">
            <label for="address">Address :</label>
            <input type="text" class="form-control" name="address" id="address" aria-describedby="emailHelp" placeholder="Enter Address">
        </div>
        <div class="form-group">
            <label for="linkedIn">Linked-In :</label>
            <input type="text" class="form-control" name="linkedIn" id="linkedIn" aria-describedby="emailHelp" placeholder="Enter Linkend-in">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
 
    </form>
    </div>
</body>
</html>