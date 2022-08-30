<?php
session_start();
include('includes/config.php');
require_once ('./component.php');

if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    

        if(!isset($_SESSION['username'])==true)
        {
    echo "<script>alert('Register to buy Product!')</script>";
    echo "<script>window.location = 'account.php'</script>";
    }
    else{
    
        if(isset($_SESSION['cart'])){
        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'eyeliner.php'</script>";
        }else
        {
            $productid=$_POST['product_id'];
            $productprice=$_POST['product_price'];
            $productname=$_POST['product_name'];
            $quantity=1;
            $productimg=$_POST['product_img'];
            $productcatg=$_POST['cname'];
            $query_cart=mysqli_query($conn,"insert into cart(username,id,price,pname,quantity,p_image,cname) values('".$_SESSION['username']."','$productid','$productprice','$productname','$quantity','$productimg','$productcatg')");
        
                if ($query_cart === false) {
                    echo "Error: " . $query_cart . "<br>" . $conn->error;
                    }
                else{
                    echo "<script> alert('New record created successfully')</script>";
                    echo"<script>('location:eyeliner.php')</script>";
                }
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id'] ,
                'username' => $_SESSION['username']
            );

            $_SESSION['cart'][$count] = $item_array;
            
       /// print_r($_SESSION['cart']);
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        ///print_r($_SESSION['cart']);
    }
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products|GlowUp</title>
    
    <link rel="icon" type="image/x-icon" href="images/gu.jpg" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/liner.css">
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
            <li class="active"><a href="products.php">PRODUCTS</a></li>
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
                    <li><a href="cartss.php"><i class="fas fa-shopping-cart"></i>
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
        <nav class="eye">
            <div id="nav-left">
                <h1 class="h1">FOUNDATION</h1>
            </div>
             
        </nav>
       
        <main >
        
        <div class="container">
        <div class="row text-center py-5 ">
            <?php
            $quantity=1;
                $result = mysqli_query($conn,"select * from products where ref_id='3'");
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['p_name'], $row['p_price'], $row['p_image'], $row['pid'],$row['c_name'],$quantity);
                }
            ?>
        </div>
</div>

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