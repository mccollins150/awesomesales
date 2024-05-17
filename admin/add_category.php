
<?php include './inc/header.php';
     include './inc/nav.php';
     include './dBconn/functions.php';
    ?>



    <div class="contain" style="width: 800px; position: relative; left: 23%; top:50%;">
  
        <form action="#" method="POST">
            <h2 class="login-title" >Category</h2>
                            
            <div class="form-group">
            <p> <?php if (isset($register_success)) echo "<div>$register_success</div>"?> </p>
                <label for="add_category" style="font-size: 18px;">Category Name</label><br>
                <input class="form-control" type="text" name="add_category" placeholder="Add Category">
                <div class="form-group">
                <button class="btn btn-info" style="margin-top: 10px;" name="add_cat" type="submit">Add Category</button>
            </div>

            </div>
                               

        </form>
    </div>

    <?php include './inc/footer.php'?>
