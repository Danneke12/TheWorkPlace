<?php
/**
 * Created by PhpStorm.
 * User: d.vorstenbosch
 * Date: 31-10-2016
 * Time: 12:09
 */
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'itsup');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>