<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
      body{
        height :100vh;
        display :flex;
        align-items: center;
        flex-direction:column;
       
      }
     
       
    </style>
</head>
<body>



   <?php

  require_once 'dbConnection.php';

        function cleanData($input){
    
            $input = trim($input);
            $input = strip_tags($input);
            $input = stripslashes($input);

            return $input;


        }

   


     if($_SERVER["REQUEST_METHOD"] == "POST"){

      

            $title  = cleanData($_POST['title']);
            $content  = cleanData($_POST['content']);
         
       
          
            $errors = [];
           

             # Validate Title  

            if(empty($title)){
                $errors['title'] = "Required Field";
            }elseif (!preg_match("/^[A-Za-z]+$/",$title)){
                $errors['title']  = "Invalid Format";
            };


              # Validate Contnet
            if(empty($content)){
              $errors['content'] = "Required Field ";
            } elseif (strlen($content) < 50){
                $errors['content']  = "Content must be bigger than 50 letter.";
            };


      

          
            // validate image 


            if (!empty($_FILES['image']['name'])){

              $imageName    = $_FILES['image']['name'];
              $imageTemName = $_FILES['image']['tmp_name'];
              $imageType    = $_FILES['image']['type'];
              $imageSize    = $_FILES['image']['size'];
  
            
 
          $allowedExtensions = ['jpg','jpeg','png','gif'];
  
          $imageArray = explode('/', $imageType);
          $imageExtension = end($imageArray);
  
          if(in_array($imageExtension, $allowedExtensions)){
  
              $FinalName = time() . rand() . '.' .$imageExtension;
  
              $disPath = 'uploads/'.$FinalName;
  
                  if (move_uploaded_file($imageTemName, $disPath)) {
                    
                      $results["image"] = $FinalName;
                  } else {
                    echo "<div class='alert alert-danger m-2 '>";
                      echo 'Error try Again';
                    echo "</div>";
                  }

              } else {
                echo "<div class='alert alert-danger m-2 '>";
                  echo "* Image : In valid Extenstion";
                echo "</div>";
              }
              

              }else {
                
                  $errors['image'] = "Required Field ";
                
              }
           
        
             # Check Errors ...... 
        
             if(count($errors) > 0 ){
               foreach ($errors as $key => $value) {
                echo "<div class='alert alert-danger m-2 '>";
                  # code...
                  echo '* '.$key.' : '.$value.'<br>';
                echo "</div>";
               }
                // No Errors (Throw Validation)
              }else {
               
                 $sql = "insert into usersinfo (title,content,image) values ('$title','$content','$FinalName')";
           
                $op =  mysqli_query($con,$sql);
           
                  if($op){
                      echo 'Raw Inserted';
                  }else{
                      echo 'Error Try Again '.mysqli_error($con);
                  }
           
           
                  mysqli_close($con);
                  header("location:index.php");
           
               
              }
          
       
  



    

  
       }
      
        






     


  


        
        
        
        
        
        
        
    
        ?>

 

    <div class="container-fluid">

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title :</label>
            <input type="text" class="form-control" id="title" name="title"  placeholder="Enter Your Title">
        </div>
        <div class="form-group">
            <label for="content">Contnet :</label>
            <input type="text" class="form-control" id="content" name="content"  placeholder="Enter your content">
        </div>
      
        <div class="mb-3">
          <label for="formFile" class="form-label">Upload Image :</label>
         <input class="form-control" type="file" name="image" id="formFile">
       </div>
      
       

        <button type="submit" class="btn btn-primary">Submit</button>
 
    </form>
    </div>
</body>
</html>