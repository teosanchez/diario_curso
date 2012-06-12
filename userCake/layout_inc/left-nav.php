<?php
if (!isUserLoggedIn()) {
    echo "<ul>";
    echo '<li><a href="index.php">Home</a></li>';
    echo '<li><a href="login.php">Login</a></li>';
    echo '<li><a href="register.php">Register</a></li>';
    echo '<li><a href="forgot-password.php">Forgot Password</a></li>';
    echo '<li><a href="resend-activation.php">Resend Activation Email</a></li>';
    echo '</ul>';
} else {
    echo '<ul>';
    echo '<li><a href="logout.php">Logout</a></li>';
    echo '<li><a href="account.php">Account Home</a></li>';
    echo '<li><a href="change-password.php">Change password</a></li>';
    echo '<li><a href="update-email-address.php">Update email address</a></li>';
    echo '</ul>';
}
?>