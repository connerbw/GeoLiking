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
    <title>Geo Liking</title>
    <link rel="stylesheet" href="minify.php/css">
    <script src="minify.php/js-head"></script>
    <meta property="og:image" content="http://geoliking.com/img/GeolikesPug.jpg" />
    <meta name="description" content="Attach a novelty sized foam Facebook thumb to a selife stick and like stuff. Post Geolocation coordinates to your wall. All the cool people are doing it!" />
</head>
<body>

<div class="row">
    <div class="large-12 columns">
        <h1>ジオライキング <small>Geo Liking</small></h1>
    </div>
</div>

<?php if (!empty($warning)) : ?>
<div class="row">
    <div class="large-12 columns">
        <div data-alert class="alert-box info">
            <?php echo $warning; ?>
            <a href="#" class="close">&times;</a>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if ($success) : ?>
    <div class="row">
        <div class="large-12 columns">
            <div data-alert class="alert-box success">
                Geo Liked!
                <a href="#" class="close">&times;</a>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (!$accurate) : ?>
    <div class="row">
        <div class="large-12 columns">
            <div data-alert class="alert-box secondary">
                Geolocation is not accurate, please <a href='#' onclick='location.reload(true); return false;'>reload</a> and click Allow or Share Location when prompted.
                <a href="#" class="close">&times;</a>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="row">
    <div class="large-12 columns">
        <ul class="small-block-grid-3">
            <li><img class="th has-tip" alt="" data-tooltip aria-haspopup="true" title="Step 1: Get a selfie stick." src="img/GeolikesSelfieStick.jpg"></li>
            <li><img class="th has-tip" alt="" data-tooltip aria-haspopup="true" title="Step 2: Get a novelty sized foam Facebook thumb." src="img/GeolikesSelfieStickPutLike.jpg"></li>
            <li><img class="th has-tip" alt="" data-tooltip aria-haspopup="true" title="Step 3: Attach foam thumb to selfie stick." src="img/GeolikesSelfieStickLikeAttached.jpg"></li>
            <li><img class="th has-tip" alt="" data-tooltip aria-haspopup="true" title="Like stuff." src="img/GeolikesPug.jpg"></li>
            <li><img class="th has-tip" alt="" data-tooltip aria-haspopup="true" title="Like stuff with your friends." src="img/GeolikesPug2sticks.jpg"></li>
            <li><img class="th has-tip" alt="" data-tooltip aria-haspopup="true" title="Like life!" src="img/GeolikesParachute.jpg"></li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="large-12 columns">
        <div class="flex-video">
            <iframe src="map"></iframe>
        </div>
        <a id="geoLikeButton" class="button large expand radius" href="geolike?token=<?php echo $token; ?>">
            <div class="likeText"><?php echo "$lat, $lng"; ?></div>
            <img class="likeButton" src="img/fi-like.svg" alt="Thumbs Up"></a>
    </div>
</div>

<div class="row">
    <div class="large-12 columns">
        <p><i>Clicking the above button will post: "I liked <?php echo "$lat, $lng"; ?>" to your Facebook wall.</i></p>
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