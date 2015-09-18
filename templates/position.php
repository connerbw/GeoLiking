<?php
/** @var \Slim\View $this */

$geoLikingText = "I liked {$lat}, {$lng}";

?>
<!DOCTYPE html>
<!--[if IE 9]>
<html class="lt-ie10" lang="en"> <![endif]-->
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geo Liking</title>
    <link rel="stylesheet" href="minify.php/css">
    <script src="minify.php/js-head"></script>
    <meta property="og:image" content="<?php echo $GLOBALS['CONFIG']['DOMAIN'] . $GLOBALS['CONFIG']['URL']; ?>img/GeolikingPlain.jpg" />
    <meta name="description" content="<?php echo $geoLikingText; ?>" />
    <meta property="place:location:latitude"  content="<?php echo $lat; ?>" />
    <meta property="place:location:longitude" content="<?php echo $lng; ?>" />
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
            <iframe src="<?php echo "map?lat={$lat}&amp;lng={$lng}"; ?>"></iframe>
        </div>
    </div>

    <div class="large-4 columns">
        <p><i>"<?php echo $geoLikingText; ?>"</i></p>
        <p><a href="<?php echo $GLOBALS['CONFIG']['URL']; ?>" class="button secondary">Go to homepage</a></p>
    </div>
</div>

<div class="row">
    <div class="large-12 columns">
        <h2 class="subheader">What is this?</h2>
        <ul class="small-block-grid-3">
            <li><img class="th has-tip" alt="" data-tooltip aria-haspopup="true" title="Step 1: Get a selfie stick." src="img/GeolikesSelfieStick.jpg"></li>
            <li><img class="th has-tip" alt="" data-tooltip aria-haspopup="true" title="Step 2: Get a novelty sized foam Facebook thumb." src="img/GeolikesSelfieStickPutLike.jpg"></li>
            <li><img class="th has-tip" alt="" data-tooltip aria-haspopup="true" title="Step 3: Attach foam thumb to selfie stick." src="img/GeolikesSelfieStickLikeAttached.jpg"></li>
            <li><img class="th has-tip" alt="" data-tooltip aria-haspopup="true" title="Like stuff." src="img/GeolikesPug.jpg"></li>
            <li><img class="th has-tip" alt="" data-tooltip aria-haspopup="true" title="Like stuff with your friends." src="img/GeolikesConcert.jpg"></li>
            <li><img class="th has-tip" alt="" data-tooltip aria-haspopup="true" title="Like life!" src="img/GeolikesParachute.jpg"></li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="large-12 columns">
        <p><a href="privacy">Privacy policy</a> - Sourcecode available on <a href="https://github.com/connerbw/Trotch">GitHub</a></p>
    </div>
</div>

<div id="fb-root"></div>

<script src="minify.php/js-body"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>