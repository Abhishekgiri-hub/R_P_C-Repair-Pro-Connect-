<?php 
require('inc/small_fun.php');
// Start session
session_start();

// Destroy the session
session_destroy();
// Redirect to login page after logou
redirect('index.php');
exit;

; ?>