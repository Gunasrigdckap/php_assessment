<?php 
    require "navbar.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Page</title>
</head>
<body>
    <div class="content container mx-auto py-8">
        <div class="container mx-auto py-8">
            <?php
            $conn = new mysqli("localhost", "dckap", "Dckap2023Ecommerce", "Assessment_php");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $blog = 'SELECT blog_details.blogid, blog_details.title, blog_details.content, blog_details.createdAt, blog_details.status, user_details.name AS name
            FROM blog_details
            JOIN user_details ON blog_details.authorid = user_details.id 
            WHERE blog_details.status="Published"';
            

            $blog_table = mysqli_query($conn, $blog);

            if ($blog_table->num_rows > 0) {
            ?>
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2">BlogID</th>
                            <th class="border border-gray-300 px-4 py-2">Title</th>
                            <th class="border border-gray-300 px-4 py-2">Content</th>
                            <th class="border border-gray-300 px-4 py-2">Author</th>
                            <th class="border border-gray-300 px-4 py-2">CreatedAt</th>
                            <th class="border border-gray-300 px-4 py-2">Status</th>
                            <th class="border border-gray-300 px-4 py-2">View</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        while ($rows = $blog_table->fetch_assoc()) {
                    ?>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2"><?php echo $rows["blogid"]; ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo $rows["title"]; ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo $rows["content"]; ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo $rows["name"]; ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo $rows["createdAt"]; ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo $rows["status"]; ?></td>
                            <td class="border border-gray-300 px-4 py-2"><a href="blog_detailed.php?blogid=<?php echo $rows["blogid"]; ?>">View</a></td>

                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            <?php
            } else {
                echo "0 results";
            }

            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
<?php 
    require "footer.php"; 
?>
