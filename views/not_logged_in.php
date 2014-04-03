<?php
if ($login->errors) {
    foreach ($login->errors as $error) {
        echo $error;    
    }
}
if ($login->messages) {
    foreach ($login->messages as $message) {
        echo $message;
    }
}

?>

<p class="lead">Login</p>

<form method="post" action="index.php" name="loginform">

    <label for="login_input_username" class="lead">Username</label>
    <input id="login_input_username" class="login_input" type="text" name="user_name" required />
    <br />

    <label for="login_input_password" class="lead">Password</label>
    <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />
	
    <br />
    
    <input type="submit"  name="login" value="Log in" />

</form>

<a href="register.php">Register new account</a>