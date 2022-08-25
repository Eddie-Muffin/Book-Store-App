<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 
</head>
<body>
 
    <!-- container -->
    <div class="container">
 
        <div class="page-header">
            <h1>Create Product</h1>
        </div>
 
    <!-- html form to create product will be here -->

    <?php
        if($_POST){
            // include database connection 

            include 'config/database.php';

            try{
                $query = "Insert into books SET name=:name, description =:description,
                price=:price, created=:created";

                // prepare query statement 

                $stmt = $connection -> prepare($query);

                // the html specialchars 

                $name= htmlspecialchars(strip_tags($_POST['name']));
                $description= htmlspecialchars(strip_tags($_POST['description']));
                $price= htmlspecialchars(strip_tags($_POST['price']));

                // Bind parameters

                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':price', $price);

                // Specify when the record was inserted 

                $created = date('Y-m-d H:I:S');

                // bind date parameter 
                $stmt->bindParam(':created', $created);

                // execute query

                if($stmt ->execute ()){
                    echo "<div class='alert alert-success'> Record saved </div>";
                }else{
                    echo "<div class='alert alert-danger'> could not save data</div>";
                }

            }catch(PDOException $error){
                die('Error'. $error ->getMessage);
            }
        }

    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control'></textarea></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type='text' name='price' class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='index.php' class='btn btn-danger'>Back to read products</a>
            </td>
        </tr>
    </table>
</form>
 
    </div> <!-- end .container -->
 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>