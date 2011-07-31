<?php
require 'core.php';
session_destroy();

header('Location: '.$http_referer);
?>
