<?php
require_once "config.php";

if(!isset($_SESSION['username'])){
    header("Location: login.php");
}

$stmt = $pdo->query("SELECT * FROM cars");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Swap</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color:;
        }
        .text{
            color:white;
        }
        .navbar {
            background: #333;
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
        }
        .p{
            color:white;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            text-decoration:none;
        }

        .navbar li { margin-left: 40px; }

        .car-card {
        background-image:url('images/back2.jpg');
        text:white;
            width: 270px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin: 20px auto;
            overflow: hidden;
        }
        .logo { font-weight: bold; }
        .logi {
        width:5%;
        height:5%;
        }
        .car-card img { width: 100%; height: 150px; object-fit: cover; }

        .details { padding: px; text-align: center; }

        .swap-btn {
            background: #e67e22;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-left:3.5rem;
        }
        .swap{
            color:#e67e22;
            font-size:
        }
        .body{
            background-image:url('images/back2.jpg');
            object-fit: cover;
            
        }
        .switch{
            color:orange;
            font-weight:bold;
            font-size:20px;
        }
 .animation-container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 20px;
     border-radius: 12px;
    padding: 15px;
}
/* Animation Keyframes */
@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-30px); }
}
.bounce {
    animation: bounce 2s infinite;
}

.ai-container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 20px;
     border-radius: 12px;
    padding: 15px;
}
/* Animation Keyframes */
@keyframes bounce1 {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-30px); }
}
.bounce1 {
    animation: bounce 2s infinite;
}
.chat{
    margin-left:76rem;
     background:#e67e22;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: 600;
    text-decoration:none;
    transition: transform 0.2s, background 0.2s;
}
.ai {
     background: #2575fc;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: 600;
    text-decoration:none;
    transition: transform 0.2s, background 0.2s;
}

    </style>
</head>
<body class="body">
    <!-- Navbar -->
  <nav class="navbar">
        <div class="logo"><img class="logi" src="images/logo.webp">CarSwap</div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Browse Cars</a></li>
            <li><a href="#">List My Car</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <header class="hero">

        <h1 class="swap fw-bold">Welcome <?php echo ucfirst($_SESSION['username']); ?>, Swap Your Car Today</h1>
        <a href="chat.php" class="chat"> C-s Chat</a>
        <p class="p fw-bold">The easiest way to trade your vehicle with others.</p>
    </header>
    <div class="ai-container">
        <div class="bounce1">
        <a href="ai.php" class="ai"> Chat with C-s AI </a>
</div>
</div>

    <!-- Swap Gallery -->
     <div class="container">
        <h2 style="color:white;">Available for Swap<i class="fa-notdog-duo fa-solid fa-arrow-right" ></i></h2>   
        <div class="row">
            <?php while($cars = $stmt->fetch(PDO::FETCH_ASSOC)):?>
                <div class="car-card">
                    <img src="<?php echo $cars['img']; ?>">
                    <h3 class="text"><?php echo $cars['name']; ?></h3>
                    <p class="text">Location: <?php echo $cars['location'];?></p>
                    <div class="animation-container">
                    <p class="switch"> CAR BRAND FOR SWAP..<i class="fa-etch fa-solid fa-arrow-down"></i></p>
                     <div class="animation-box bounce">
                    <img src="<?php echo $cars['swap_img']; ?>">
                    </div>
                    </div>
                        <h3 class="text"><?php echo $cars['swap_name']; ?></h3>
                        
                        <form method="post" action="car-form.php">
                            <input type="hidden" name="car_id" value="<?php echo $cars['car_id']; ?>">
                        <button class="swap-btn"> Request Swap</button>
                        </form>
                </div>
            <?php endwhile; ?>
        </div>
            </div>
        

    <script src="bootstrap/js/bootstrap.bundle.min.js"> </script>
</body>
</html>


