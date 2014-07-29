<?php

/** @var \Slim\Helper\Set $d */
$d =& $this->data;

?>
<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World</title>
    <link rel="stylesheet" href="minify.php/css">
    <script src="minify.php/js-head"></script>
</head>
<body>

<div class="row">
    <div class="large-12 columns">
        <h1>Hello World</h1>
    </div>
</div>

<div class="row">
    <div class="panel">
        <?php print_r($d->get('lastKnownUserPos')) ?>
    </div>
</div>

<script src="minify.php/js-body"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>