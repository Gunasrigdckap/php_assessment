<?php 
    require "navbar.php"; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
</head>
<body>
    <div class="content container mx-auto py-8">
        <div class="container mx-auto py-8">
            <?php
            if (isset($_GET['id'])) {
                $product_id = $_GET['id'];
                
                $conn = new mysqli("localhost", "dckap", "Dckap2023Ecommerce", "Assessment_php");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM product_details WHERE id = $product_id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
            ?>
                <div class="product-details">
                    <h2 class="product_name"><?php echo $row['name']; ?></h2>
                    <img class="product-img" src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" alt="<?php echo $row['name']; ?>">
                    <p class="description">Description: <?php echo $row['description']; ?></p>
                    <p>Price: $<?php echo $row['price']; ?></p>
                </div>
            <?php
                } else {
                    echo "Product not found.";
                }

                $conn->close();
            } else {
                echo "Invalid request.";
            }
            ?>
        </div>
    </div>
    <?php 
        require "footer.php"; 
    ?>
</body>
</html>
