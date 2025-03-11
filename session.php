<?php
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => 'stanthonyemailsignature.site', //Replace with actual URL
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict',
]);
session_start();
?>
