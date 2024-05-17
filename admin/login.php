
<?php include './inc/header.php'; 
    require_once './dBconn/functions.php';
?>


<body class="bg-silver-300">
    <div class="content">
        <div class="brand">
            <a class="link" href="index.html">AdminCAST</a>
        </div>
        <form id="login-form" action="#" method="post">
            <h2 class="login-title">Log in</h2>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input class="form-control" type="email" name="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" name="login" type="submit">Login</button>
            </div>
            <div class="text-center">Not a member?
                <a class="color-blue" href="register.php">Create account</a>
            </div>
        </form>
    </div>
   
    
</body>

</html>