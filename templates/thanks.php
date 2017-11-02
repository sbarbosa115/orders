<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Jarocho Landscaping, Inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="images/favicon.ico">
    <link href="<?php echo ORDERS_PLUGIN_ASSETS_PUBLIC ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo ORDERS_PLUGIN_ASSETS_PUBLIC ?>/css/bootstrap-datepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ORDERS_PLUGIN_ASSETS_PUBLIC ?>/css/app.css">
</head>
<body>
<!-- Fixed navbar -->
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Jarocho Landscaping, Inc.</a>
        </div>
    </div>
</nav>


<div class="container" role="main">

    <div class="container">
        <div class="jumbotron">
            <h1>Order Created Successfully</h1>
            <p>Your order was created successfully and soon you will got a email with the PDF version.</p>
            <a href="<?php echo get_site_url(); ?>/order/new" class="btn btn-lg btn-success">Create Another</a>
            <a href="<?php echo ORDERS_PLUGIN_DIR_PUBLIC; ?>/temp/order.pdf" class="btn btn-lg btn-success" target="_blank">Download created Order</a>
        </div>
    </div>

</div>


<script src="<?php echo ORDERS_PLUGIN_ASSETS_PUBLIC ?>/js/app.js"></script>
<script src="<?php echo ORDERS_PLUGIN_ASSETS_PUBLIC ?>/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo ORDERS_PLUGIN_ASSETS_PUBLIC ?>/js/bootstrap.min.js"></script>
<script src="<?php echo ORDERS_PLUGIN_ASSETS_PUBLIC ?>/js/bootstrap-datepicker.min.js"></script>
</body>
</html>
