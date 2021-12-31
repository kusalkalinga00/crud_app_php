<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <?php require_once 'process.php'; ?>
    <?php 
    
    if(isset($_SESSION['message'])):
    
    ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">

    <?php

            echo $_SESSION['message'];
            unset($_SESSION['message']);

    ?>
    </div>
    <?php endif ?>

    <?php
    
        $mysqli = new mysqli('localhost','root','','crud_2');
        $result = $mysqli -> query("SELECT * FROM data");
        //pre_r($result);
        ?>
        <div class="container mt-5 justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
        <?php
            while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['name']; ?> </td>
                <td><?php echo $row['location']; ?> </td>
                <td>
                    <a href="index.php?edit=<?php echo$row['id'];?>"
                    class="btn btn-info">Edit</a>
                    <a href="process.php?delete=<?php echo$row['id'];?>"
                    class="btn btn-danger">Delete</a>
                </td>
            </tr>  
            <?php endwhile; ?>      
            </table>
        </div>





    <?php
        function pre_r($array){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }


    ?>




    <div class="d-flex justify-content-center">
        <div class="row mt-5">
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group pt-2">
        <label>Name</label>
        <input type="text " name="name" placeholder="Enter your name "
        value="<?php echo $name;?>" class="form-control">
        </div>
        <div class="form-group pt-2">
        <label>Location</label>
        <input type="text " name="location" placeholder="Enter your location"
         value="<?php echo $location;?>"  class="form-control">
        </div>
        <div class="form-group mt-3">
        <?php
        if ($update == true):
        ?>
            <button type="submit" name="update" class="btn btn-info" >Update</button>
        <?php else: ?>
            <button type="submit" name="save" class="btn btn-primary" >Save</button>
        <?php endif; ?>
        </div>
        </form>

        </div>
    </div>
    














<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>