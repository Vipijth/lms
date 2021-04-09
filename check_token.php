<?php 

if (isset($_SESSION['usernames'])) { 


    $result = mysqli_query($conn, "SELECT token FROM user_token where username='".$_SESSION['usernames']."' order by id desc limit 1");
 
    if (mysqli_num_rows($result) > 0) {
      
        $row = mysqli_fetch_array($result); 
        $token = $row['token']; 
        

        if($_SESSION['token'] != $token){
          
            session_destroy();
            header('Location: index.php');
        }
    }
      
}