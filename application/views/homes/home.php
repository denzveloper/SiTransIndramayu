<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $this->image->show(); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>Home's</title>
        <link rel="stylesheet" href="https://denzveloper.github.io/lightdm-gab-gradient/static/style.css" />
    </head>
    <body>
        <h1>MANPOWER AND TRANSMIGRATION REGION INDRAMAYU</h1>
        <a href="<?php echo base_url('index.php/login'); ?>">Login Landing Page</a>
        <br>
        <a href="#">Home</a>
        <a href="<?php echo base_url('index.php/register'); ?>">Register</a>
        <a href="<?php echo base_url('index.php/news'); ?>">News</a>
        <br>
        <h3><?php echo $welcmsg['title']; ?></h3>
        <?php foreach($welcmsg['img'] as $img){ ?>
            <img src="<?php echo $this->image->show($img); ?>">
        <?php } ?>
        <p><?php echo $welcmsg['content']; ?></p>
    </body>
</html>
