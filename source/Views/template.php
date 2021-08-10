<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Desenvolvedores</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <link href="<?php echo BASE_URL ?>/source/Views/assets/css/style.css" rel="stylesheet" />
        <link href="<?php echo BASE_URL ?>/source/Views/assets/css/bootstrap.min.css" rel="stylesheet" />

        <script src="<?php echo BASE_URL ?>/source/Views/assets/js/jquery.min.js"> </script>
        <script src="<?php echo BASE_URL ?>/source/Views/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_URL ?>/source/Views/assets/js/sweetalert.js"></script>
        <script src="<?php echo BASE_URL ?>/source/Views/assets/js/script.js"> </script>
    </head>
    <body>

        <base base="<?php echo BASE_URL;?>" />

        <div class="overlay-load">
            <img src="<?php echo BASE_URL ?>/source/Views/assets/img/ajax-loader.gif">
        </div>

    	<div class="container">
            <?php $this->loadViewInTemplate($view, $data); ?>
    	</div>
    </body>
</html>