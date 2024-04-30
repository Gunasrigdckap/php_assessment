<?php 
    require "navbar.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Products</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content container mx-auto py-8">
        <div class="container mx-auto py-8">
            <div class="products-grid">
                <?php
                $conn = new mysqli("localhost", "dckap", "Dckap2023Ecommerce", "Assessment_php");

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM `product_details`";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                <div class="product">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" alt="<?php echo $row['name']; ?>">
                <h3><?php echo $row['name']; ?></h3>
                <p class="price">Price: $<?php echo $row['price']; ?></p>
                <p id="price" class="border border-gray-300 px-4 py-2"><a href="product_detailed_view.php?id=<?php echo $row["id"]; ?>">View</a></p>
                </div>

                <?php
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <?php 
        require "footer.php"; 
    ?>
</body>
</html>
