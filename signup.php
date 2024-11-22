<?php include('template/head.php') ?>
<?php include('template/header.php') ?>
    <div class="container">
        <h2>Sign Up</h2>
        <form method="POST" action="controller/c_signup.php">
            <div class="form-group">
                <label for="username">Email Address</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>


            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" name="firstname" required>
            </div>


            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" name="lastname" required>
            </div>
            <button type="submit" class="btn">Sign Up</button>
        </form>
        <p class="message">Don't have an account? <a href="#">Sign up</a></p>
    </div>
<?php include('template/footer.php') ?>