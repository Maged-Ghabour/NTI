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


   <?php

 
        
     /*
        [*] Trim Spaces in Inputs
        [*] Check if any Inputs Empty.
        [*] Ignore Html Tags.
        [*] validate Name        =>  String
        [*] validate Email       =>  email
        [*] validate password    => min than 6 chars.
        [*] validate address     => length than 10 chars.
        [*] validate gender      => Male | Female Only.
        [*] validate linked-In   => URL
        [*] validate CV         
            ==> Empty Input .
            ==> Only PDF Extenstion.
            ==> Unique pdf name

        
     
     */



        function cleanData($input){
    
            $input = trim($input);
            $input = strip_tags($input);
            $input = stripslashes($input);

            return $input;


        }

   


     if($_SERVER["REQUEST_METHOD"] == "POST"){


            $name      = cleanData($_POST['name']);
            $email     = cleanData($_POST['email']);
            $password  = cleanData($_POST['password']);
            $address   = cleanData($_POST['address']);
            $gender    = cleanData($_POST['gender']);
            $linkedIn  = cleanData($_POST['linkedIn']);
            

            $errors = [];

             # Validate Name  

            if(empty($name)){
                $errors['Name'] = "Required Field ";
            } 

              # Validate Email ... 
            if(empty($email)){
                $errors['Email']  = "Required Field"; 
            }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $errors['Email']  = "Invalid Format"; 
            }

            
            # Validate Password .... 
                if(empty($password)){
                    $errors['Password']  = "Required Field"; 
                }elseif(strlen($password) < 6){
                    $errors['Password']  = "Length Must Be bigger than 6 Chars"; 
                }

             # Validate Address

                if(empty($address)){
                        $errors['address']  = "Required Field"; 
                    }elseif(!(strlen($address) == 10)){
                        $errors['address']  = "Length Must Be 10 Chars"; 
                }

            # Validate Gender 
             if(empty($gender)){
                        $errors['gender']  = "Required Field"; 
                    }

            # Validate LinkedIn
            

            if(empty($linkedIn)){
                $errors['linkedIn']  = "Required Field"; 
            }elseif(!filter_var($email,FILTER_VALIDATE_URL)){
                $errors['linkedIn']  = "Invalid Format"; 
            }


           

            
   
            # Check Errors ...... 
            if(count($errors) > 0 ){
                foreach ($errors as $key => $value) {
                    # code...
                    echo '* '.$key.' : '.$value.'<br>';
                }
            }







            // validate CV


          if (!empty($_FILES['cv']['name'])){

            $cvName    = $_FILES['cv']['name'];
            $cvTemName = $_FILES['cv']['tmp_name'];
            $cvType    = $_FILES['cv']['type'];
            $cvSize    = $_FILES['cv']['size'];

     

        $allowedExtensions = ['pdf'];

        $cvArray = explode('/', $cvType);
        $cvExtension = end($cvArray);

        if(in_array($cvExtension, $allowedExtensions)){

            $FinalName = time() . rand() . '.' .$cvExtension;

            $disPath = 'uploads/'.$FinalName;

            if (move_uploaded_file($cvTemName, $disPath)) {
                echo 'CV Uploaded Succ ';
            } else {
                echo 'Error try Again';
            }
        } else {
            echo "In valid Extenstion";
        }
            

            
         }else {
             echo "Required Field";
         }
  
    
        

     }
    


  


        
        
        
        
        
        
        
     
        ?>

 

    <div class="container-fluid">

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
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
                <label for="">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio"  name="gender" value="Male" id="male" >
                    <label class="form-check-label" for="male">Male </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Female" id="female" >
                    <label class="form-check-label" for="female" >Female </label>
                </div>
            </div>
        

        <div class="form-group">
            <label for="linkedIn">Linked-In :</label>
            <input type="text" class="form-control" name="linkedIn" id="linkedIn" aria-describedby="emailHelp" placeholder="Enter Linkend-in">
        </div>


        <div class="form-group">
            <div class="input-group mb-3">
                <input type="file" name="cv" class="form-control" id="inputGroupFile02">
                <label class="input-group-text"  for="inputGroupFile02">Upload</label>
            </div>
        </div>
       

        <button type="submit" class="btn btn-primary">Submit</button>
 
    </form>
    </div>
</body>
</html>