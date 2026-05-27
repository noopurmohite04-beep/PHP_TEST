<?php
session_start();
include 'db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id=$_POST['id'];
    $item_name = $_POST['item_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $sql = $conn -> prepare('update menu_item set item_name=?, description=?, price=?, category=? where id=?) ');
    $sql->bind_param('ssisi', $item_name, $description ,$price, $category, $id);
    

    if( $sql->execute()){
        echo 'data updated';
    }else {
        echo 'no data updated';
    }
}

?>

<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>UPDATE ITEMS</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
           <nav
            class="navbar navbar-expand-sm navbar-light bg-light"
           >
            <div class="container">
            
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php" aria-current="page">Home
                            <a class="nav-link active" href="insert.php">Insert Item</a>
                            <a class="nav-link" href="update.php">Update menu</a>
                            <a class="nav-link" href="delete.php">Delete Item</a>
                        </li>
                            
                        
                        
                    </ul>
                    
                </div>
            </div>
           </nav>
        </header>
        <main>
            <div class="container">
                <form method="post">
                    <div class="mb-3 row">
                        Id: <input type="text" name="id" id=""><br>
                        Item Name: <input type="text" name="item_name" id=""><br>
                        Description: <input type="text" name="description" id=""><br>
                        Price: <input type="text" name="price" id=""><br>
                        Category: <select name="category" id="">
                            <option value="starter">starter</option>
                            <option value="main course">main course</option>
                            <option value="dessert">dessert</option>
                            <option value="drinks">drinks</option>
                        </select><br>
                        <button type="submit">Update</button>
                        
                    

                    
                </form>
            </div>
            



        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
