<?php
    $page = (isset($_GET['page']) && $_GET['page']) ? $_GET['page'] : '';
    
    // this configuration path for website
    define('PATH', 'http://localhost/Sofile/');
    define('SITE_URL', PATH . 'index.php');
    define('POSITION_URL', PATH . '?page=' . $page);
    
    // this configuration for database website
    define('DB_HOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'sofile');
?>
