<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forget Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<form method="POST" action="<?php echo base_url('index.php/login'); ?>" autocomplete='off'>
<input type="email" name="mail" placeholder="Email" required></td>
<button name="btn-login" type="submit" class="btn">Send Mail</button>
</form>
</body>
</html>