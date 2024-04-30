
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <nav class="bg-gray-800 py-4">
            <div class="container mx-auto flex justify-between items-center">
                <!-- Shopname -->
                <div>
                <a href="index.php"><h2 class="text-white text-lg font-semibold">Trendy Shop</h2></a>
                </div>

                <!-- Search bar -->
                <div class="relative">
                    <input type="text" class="pl-10 pr-40 py-2 w-100 rounded-lg bg-gray-700 text-white focus:outline-none focus:bg-gray-900" placeholder="Search">
                    <span class="absolute top-0 left-0 ml-3 mt-3">
                
                    <button type="submit" id="search_icon"><i class="fa fa-search"></i></button>
                    </span>
                </div>   
            </div>
        </nav>

        <li></li>
        <nav class="bg-gray-800 py-2"> 
                <!--shop products & blogs -->
                <div class="subdiv">
                <a href="product_details.php"><h2 class="text-white text-lg font-semibold" id="Shop_Products">Shop Products</h2></a>
                <a href="blog.php"><h2 class="text-white text-lg font-semibold" id="Blogs">Blogs</h2></a>
                </div>
        </nav>

</body>
</html>
