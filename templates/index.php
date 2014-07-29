<?php

/** @var \Slim\Helper\Set $d */
$d =& $this->data;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Hello World</title>
</head>
<body>
<p>Hello world...</p>
<?php print_r($d->get('lastKnownUserPos')) ?>

<script src="minify.php/js"></script>
</body>
</html>