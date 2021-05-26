<?php
define('TEMPLATES_DIR', '../templates/');
define('LAYOUTS_DIR', 'layouts/');

// DB config
define('HOST','localhost:3306');
define('USER','root');
define('PASS','Not.8fat');
define('DB','rianews');

include "../engine/db.php";
include "../engine/news.php";
include "../engine/function.php";
include "../engine/catalog.php";
include "../engine/log.php";
include "../engine/gallery.php";