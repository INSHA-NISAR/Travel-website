<?php
    $sucessmsg = false;
    if(isset($_POST['submit']))
        {
        //
                $server="localhost";
                $username="root";
                $password="";
                $database = "travel";
                //creting connection

                $conn =mysqli_connect($server, $username, $password,$database);

                    if(!$conn)
                           {

                        die("connection to this database failed due to ".mysqli_connect_error());

                           }            
          //  echo "connection successful to db";

        $name  =$_POST['name']  ;
        $age   =$_POST['age']  ;
        $gender=$_POST['gender']  ;
        $email =$_POST['email']  ;
        $phone =$_POST['phone']  ;
        $desc  =$_POST['desc']  ;
   
          $sql ="INSERT INTO `trip`( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
          VALUES ('$name',$age,'$gender','$email',$phone,'$desc',now());";
           
          // echo $sql;
            //$data = mysqli_query($conn,$sql);
            if($conn->query($sql) === TRUE)
                {
                   $sucessmsg = true;
                }
            else
                {
                   // echo "ERROR $sql <br> $conn-->error_reporting";
                   echo"error";
                }
            $conn->close();
        }
       
        
                ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Welcome to travel form
    </title>
      <link rel="stylesheet" href="style.css">
</head>
    <body>
   
    <img class="bg" src="bgimage.jpg" alt="" width="100%">
        <div class="container1">
            
            <h1>
                Welcome to college trip form
            </h1>
                <p>
                    Enter your details and submit this form to comfirm your participation in the trip
                </p>
                <?php
                if($sucessmsg === true)
                    {
                        ?>
                         <p id="thanks">thanks for submitting</p>
                    <?php
                    }
                ?>
                    <form action="index.php" method="post">
                        <input type="text" name="name" id="name" placeholder="Enter your name " required>
                        <input type="text" name="age" id="age" placeholder="Enter your age " required>
                        <input type="text" name="gender" id="gender" placeholder="Enter your gender " required>
                        <input type="email" name="email" id="email" placeholder="Enter your mail id"required>
                        <input type="phone" name="phone" id="phone" placeholder="Enter your number "required>
                        <textarea name="desc" id="area" cols="30" rows="10" placeholder="Enter any other info here"required></textarea>
                        <input type ="submit" name="submit" class="btn1" value = "submit"/>
                        <button class="btn2">Reset</button>
                    </form>
        </div>
        <script src="index.js"></script>
        <!--INSERT INTO `trip` (`S.no`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES (NULL, 'insha', '21', 'female', 'insha111', '1234567890', 'first entry', current_timestamp());
-->
</body>
</html>