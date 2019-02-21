<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Desktop Welcome Page</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $this->image->show(); ?>">

    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
        
    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet"/>

    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet"/>

</head>

<body>

    <div class="sufee-login d-flex align-content-center flex-wrap"> 
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                        <img class="align-content" width="40%" src="<?php echo $this->image->show(); ?>" alt="...">
                </div>
                <div class="login-form">
                    <?php echo form_open('login');?>
                        <div class="form-group">
                            <input type="email" name="mail" class="form-control" placeholder="Email">
                        </div>
                            <div class="form-group">
                                <input type="password" name="pass" class="form-control" placeholder="Password">
                        </div>

                            <div class="form-group">
                                <label>Lupa Sandi? 
                                <a href="<?php echo base_url('index.php/forget'); ?>">Disini!</a>
                                </label>
                            </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-40 m-t-40">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
    <!--   Core JS Files   -->
    <script src="<?php echo base_url('assets/js/jquery-1.10.2.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url('assets/js/bootstrap-notify.js'); ?>" type="text/javascript"></script>
    <?php if($this->session->flashdata('info')){ foreach($this->session->flashdata('info') as $row) {?>
        <script type="text/javascript">
            $(document).ready(function(){

                $.notify({
                    icon: "<?php echo $row['ico']; ?>",
                    title: "<strong><?php echo $row['tit']; ?></strong>",
                    message: "<br><?php echo $row['txt']; ?>"

                },{
                    type: "<?php echo $row['typ']; ?>",
                    timer: 3000
                });

            });
        </script>
    <?php } } ?>
</html>
