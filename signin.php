<?php include('template/head.php') ?>
<?php include('template/header.php') ?>
    <div class="container">
        <h2>Sign In</h2>
        <form method="POST" action="controller/c_signin.php">
            <div class="form-group">
                <label for="username">Email Address</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>


            <label style="color:red">
        
            </label> <br>
            <button type="submit" class="btn">Sign In</button>
        </form>
        <p class="message">Don't have an account? <a href="#">Sign up</a></p>
    </div>
<?php include('template/footer.php') ?>