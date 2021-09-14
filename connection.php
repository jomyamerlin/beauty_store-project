<?php
/*$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');*/

if(isset($_POST['submit']))
{
       $username=$_POST['username'];
       $email=$_POST['email'];
       $phone=$_POST['phone'];
       $password=$_POST['password'];
       $query="INSERT Into 'tbl_contact' (username,password,email,phone) values('$username','$password','$email','$phone')";
       if(mysql_query($query))
       {
              echo"data inserted";
       }

}
?>
/*if (!empty($username) || !empty($password) || !empty($email) || !empty($phone)) 
{
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "db_connect";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
       die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
}
else{
       $sql="INSERT INTO tbl_contact (username,email,phone,password"











       /*$SELECT="SELECT email From tbl_contact Where email=? Limit=1";
       $INSERT="INSERT Into tbl_contact (username,password,email,phone) values=(?,?,?,?)";
       $stmt = $conn->prepare($SELECT);
       $stmt->bind_param("s",$email);
       $stmt->execute();
       $stmt->bind_result($email);
       $stmt->store_result();
       $stmt->store_result();
       $rnum=$stmt->num_rows;

       if($rnum==0){
              $stmt->close();
              $stmt = $conn->prepare($INSERT);
              $stmt->bind_param("sssi",$username,$password,$email,$phone);
              $stmt->execute();
              echo "New record is inserted sucessfully";
       }
       else{
              echo "User exists";
       }
       $stmt->close();
       $conn->close();
       */
}

} else {
 echo "All field are required";
 die();
}

?>

if ($conn->query($sql)){
echo "New record is inserted sucessfully";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "Password should not be empty";
die();
}
}
else{
echo "Username should not be empty";
die();
}*/
