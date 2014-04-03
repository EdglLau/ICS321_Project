<?php
if ($registration->errors) {
    foreach ($registration->errors as $error) {
        echo $error;    
    }
}
if ($registration->messages) {
    foreach ($registration->messages as $message) {
        echo $message;
    }
}

?>
<form method="post" action="register.php" name="registerform">   
    
    <label for="login_input_username" class="lead">Username (only letters and numbers):</label>
    <input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
    <br />
    <label for="login_input_email" class="lead">Email Address:</label>    
    <input id="login_input_email" size="55" class="login_input" type="email" name="user_email" required />        
    <br />
    <label for="login_input_password_new" class="lead">Password (min. 6 characters):</label>
    <input id="login_input_password_new" size="31" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />  
    <br />
    <label for="login_input_password_repeat" class="lead">Confirm password:</label>
    <input id="login_input_password_repeat" size="49" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />    <br />
    <input type="submit"  name="register" value="Register" />
    
</form>

<a href="index.php">Back to Login Page</a>