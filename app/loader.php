
<?php
session_start();

include_once 'config/config.php';
include_once 'helpers/redirect.php';

spl_autoload_register(function ($inc) {

    require_once 'libraries/' . $inc . '.class.php';
});
