<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    
    // Start validate Name 
  $name = $_POST ["name"];  
    if (!preg_match ("/^[a-zA-z]*$/", $name) ) {    
        $ErrMsg = "Name :-Only Character Are Allowed";  
        echo $ErrMsg."<br>";  
    } else {  
        echo $name."<br>";  
    }  

    if (empty ($_POST["name"])) {  
        $errMsg = "Name:-Error! You didn't enter the Name.";  
                echo $errMsg."<br>";  
    } else {  
        $name = $_POST["name"];  
       
    }  
    // End validate Name 

    // Start validate email 

         $email = $_POST ["email"]; 
           if (empty ($_POST["email"])) {  
                $errMsgEmail = "Email: - Error! You didn't enter the Email.";  
                        echo $errMsgEmail."<br>";  
            }else{
                $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
                if (!preg_match ($pattern, $email) ){  
                    $ErrMsg = "Email:- Email is not valid.";  
                            echo $ErrMsg."<br>";  
                } else {  
                    echo "Email :- ".$email."<br>";  
                } 
            }
            

           
    
    // End validate email 

    // Start validate password 

    $password =  $_POST ["password"];  
    $length = strlen ($password);  

      if (empty ($_POST["password"])) {  
            $errMsgPassword = "Password :- Password is required"; 
            echo  $errMsgPassword."<br>";
     } else{
            if ( $length > 6) {  
                $ErrMsgPass = "Password :- Password Must be less than 6 character.";  
                        echo $ErrMsgPass."<br>";  
            } else {  
                echo "Password :- Your Password is: " .$password."<br>";  
        } 
     }
  


 

    // End validate password 



    // Start validate Address 


     $address =  $_POST ["address"];  
    $address = strlen ($address);  
    


   if (empty ($_POST["address"])) {  
            $ErrMsgAdd = "Address :- is required"; 
            echo $ErrMsgAdd."<br>";
    } else{
            if ( $address === 10) {  
        echo "Address :- Your Address is: " .$address."<br>"; 
       
            } else {  
                $ErrMsgAdd = "Address :- address Must be 10 character.";  
                        echo $ErrMsgAdd."<br>";  
                
        } 
    }


// End validate Address


 // There is Error Here 
 
/*

  if (empty($_POST["linkedIn"])) {  
        $linkedInErr = "Linked In :- is required";
        echo  $linkedInErr;
    } else {  
            $linkedIn = input_data($_POST["linkedIn"]);  
            // check if URL address syntax is valid  
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {  
                $linkedIn = "Invalid URL";  
                echo $linkedIn;
            }      
    } 
    /*

}






        
?>