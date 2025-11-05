<?php

require dirname(__DIR__) . "/vendor/autoload.php";

use Presenters\Pages\Home;

Home::compile("/index.html");