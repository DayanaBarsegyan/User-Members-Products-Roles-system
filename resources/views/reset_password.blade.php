<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <p>We received a request to reset your password. If you initiated this request, please use the following temporary password reset token to complete the process:</p>
    <p>Temporary Token: <b>{{ $randomToken }}</b></p>
    <br>
    <b><p>Please note that this token is valid for a limited time period only.</p></b>
    <br>
    <p>To reset your password, follow these steps:</p>
    <br>
    <p>1. Visit the password reset page on our website.</p>
    <p>2. Enter your email address and the temporary token provided above.</p>
    <p>3. Set a new password for your account.</p>
</body>
</html>
