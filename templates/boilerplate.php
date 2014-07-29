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
    <title>Hello World</title>
    <link rel="stylesheet" href="minify.php/css">
    <script src="minify.php/js-head"></script>
</head>
<body>

<div class="row">
    <div class="small-12 columns">
        <h1>Hello World</h1>
    </div>
</div>

<div class="row">
    <div class="small-12 column">
        <div class="panel">
            <?php print_r($this->get('lastKnownUserPos')) ?>
        </div>
    <div class="small-12 columns">
</div>


<!-- TESTING START -->

<div class="row">

    <div class="small-12 large-8 columns">

        <div class="off-canvas-wrap" data-offcanvas>
            <div class="inner-wrap">
                <nav class="tab-bar">
                    <section class="left-small">
                        <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
                    </section>

                    <section class="middle tab-bar-section">
                        <h1 class="title">Map</h1>
                    </section>
                </nav>

                <aside class="left-off-canvas-menu">
                    <ul class="off-canvas-list">
                        <li><label>Menu</label></li>
                        <li><a href="#">One</a></li>
                        <li><a href="#">Two</a></li>
                        <li><a href="#">Thre</a></li>
                        <li><a href="#">Four</a></li>
                        <li><a href="#">Five</a></li>
                    </ul>
                </aside>

                <section class="main-section">
                    <div class="row">
                    <div class="flex-video"><iframe src="map"></iframe></div>
                    </div>
                </section>


                <a class="exit-off-canvas"></a>
            </div>
        </div>

    </div>

    <div class="small-12 large-4 columns">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec feugiat mauris purus, at dignissim diam molestie id. Nulla
            lobortis lacus ac lectus venenatis, non porta turpis congue. Vestibulum nec nulla ut mi scelerisque lobortis eget vel
            enim.
            Maecenas rutrum nunc mauris, quis aliquam nulla consectetur ac. Donec eu purus at augue tincidunt vulputate. Nam
            facilisis
            dictum eros, et hendrerit nunc auctor non. Nulla porttitor dui ut ligula facilisis, et mattis leo dignissim. Sed et
            libero
            ut elit faucibus porta. Donec non risus sem. Donec nunc risus, dapibus eu enim et, vulputate scelerisque sapien. Nam est
            lectus, sodales nec risus id, egestas vestibulum purus. Praesent a rutrum nisi. Integer porta tincidunt dictum. Nulla
            mattis
            semper massa, et feugiat eros consequat ut.</p>
    </div>

</div>

<script src="minify.php/js-body"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>