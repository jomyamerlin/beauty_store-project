<?php
session_start();
include('includes/config.php');
require_once ('./component.php'); 
    if(isset($_POST['placeorder'])){
        echo "<script>alert('ORDER PLACED..!!')</script>";
        
                
    
    }
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/cart.css">


    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
</head>
<header>
    <nav>
    <div class="logo">
        <a href="#"><img src="images/glowup.png" width="200px"></a>
    </div>
        <ul class="nav-links">
            <li><a href="index.php">HOME</a></li>
            <li ><a href="products.php">PRODUCTS</a></li>
            <li><a href="services.php">SERVICES</a></li>
            <li><a href="contact.php">CONTACT</a></li>
            <?php 
                if(!isset($_SESSION['username']))
                {?>
                    <li><a href="account.php">ACCOUNTS</a></li>
                    
                <?php    }
                else{
                ?>
                    <li><a href="logout.php">LOGOUT</a></li>
                    <ul class="nav-user">
                    <li class="active"><a href="cartss.php"><i class="fas fa-shopping-cart"></i>
                    <?php 
                            echo $_SESSION['username'];
                }?></a>
        </ul>
        <div class="burger"> 
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <script src="app.js"></script>
</header>
<body>
<?php 
        if (isset($_POST['placeorder'])){
            // print_r($_SESSION['cart']);
             $product_id = array_column($_SESSION['cart'], 'product_id');
             $result = mysqli_query($conn,"select * from cart where username='".$_SESSION['username']."'");
             if($result==false){
                echo "Error: " . $result . "<br>" . $conn->error;
             }
             while ($row = mysqli_fetch_assoc($result)){
                 foreach ($product_id as $pid){
                     if ($row['id'] == $pid){
                         
                         orderDetails($row['p_image'], $row['pname'],$row['price'], $row['id'],$row['cname']);
                     }
                 }
             }
             
         }

?>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
<footer class="footers">
        <div class="inrow atc">
            <div class="pos1 ">Copyright &copy; GLOWUP 2020</div>
            <div class="pos2 ">
                <a class="but btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="but btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="but btn-dark btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="pos3 ">
                <a class="pp" href="#!">Privacy Policy</a>
                <a href="#!">Terms of Use</a>
            </div>
        </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>