<?php 
    require "navbar.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Details</title>
</head>
<body>
    <div class="content container mx-auto py-8">
        <div class="container mx-auto py-8">
            <?php
            if (isset($_GET['blogid'])) {
                $blogid = $_GET['blogid'];
                
                $conn = new mysqli("localhost", "dckap", "Dckap2023Ecommerce", "Assessment_php");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $query = "SELECT blog_details.*, user_details.name AS author_name 
                          FROM blog_details 
                          JOIN user_details ON blog_details.authorid = user_details.id 
                          WHERE blog_details.blogid = $blogid";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo "<h2>Title: " . $row['title'] . "</h2>";
                    echo "<p>Author: " . $row['author_name'] . "</p>";
                    echo "<p>Published At: " . $row['createdAt'] . "</p>";
                    echo "<p>Content: " . $row['content'] . "</p>";
                } else {
                    echo "Blog not found.";
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
