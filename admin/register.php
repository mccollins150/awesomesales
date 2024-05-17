
<?php include_once './inc/header.php';
    require_once ('./dBconn/functions.php');
?>
<body class="bg-silver-300">
    <div class="content">
        <div class="brand">
            <a class="link" href="index.html">AdminCAST</a>
        </div>
        <form id="register-form" action="#" method="POST">
            <h2 class="login-title">Register</h2>
                   <?php if (isset($register_error)) echo "<div>$register_error</div>" ?>           
            <div class="form-group">
                <input class="form-control" type="text" name="first_name" placeholder="First Name" required>
            </div>
                               
            <div class="form-group">
                <input class="form-control" type="text" name="last_name" placeholder="Last Name" required>
            </div>
                           
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input class="form-control" id="password" type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="conf_password" placeholder="Confirm Password" required>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" name="register" type="submit">Sign up</button>
            </div>
         
          
            <div class="text-center">Already a member?
                <a class="color-blue" href="login.php">Login here</a>
            </div>
        </form>
    </div>

</body>
</html>