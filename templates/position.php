<?php
/** @var \Slim\View $this */

?>
<!DOCTYPE html>
<!--[if IE 9]>
<html class="lt-ie10" lang="en"> <![endif]-->
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geo Liking - Position</title>
    <link rel="stylesheet" href="minify.php/css">
    <script src="minify.php/js-head"></script>
    <meta property="og:image" content="<?php echo $GLOBALS['CONFIG']['DOMAIN'] . $GLOBALS['CONFIG']['URL']; ?>img/GeolikingPlain.jpg" />
    <meta name="description" content="Attach a novelty sized foam Facebook thumb to a selfie stick and like stuff. Post Geolocation coordinates to your wall. All the cool people are doing it!" />
</head>
<body>

<div class="row">
    <div class="large-12 columns">
        <h1>ジオライキング <small>Geo Liking</small></h1>
    </div>
</div>

<div class="row">
    <div class="large-8 columns">
        <div class="flex-video">
            <iframe src="<?php echo "map?lat={$lat}&lng={$lng}"; ?>"></iframe>
        </div>
    </div>

    <div class="large-4 columns">
        <p><i>"I liked <?php echo "$lat, $lng"; ?>"</i></p>
        <p><a href="privacy">Privacy policy</a></p>
        <p>Sourcecode available on <a href="https://github.com/connerbw/Trotch">GitHub</a></p>
        <p><a href="<?php echo $GLOBALS['CONFIG']['URL']; ?>" class="button secondary">Back to homepage</a></p>

    </div>
</div>

<div id="fb-root"></div>

<script src="minify.php/js-body"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>