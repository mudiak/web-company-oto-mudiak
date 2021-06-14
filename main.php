<?php
$page=isset($_GET['page']) ? $_GET['page'] : 'home';
if ($page=='home') include 'home.php';
if ($page=='pemesanan') include 'order.php';
if ($page=='list') include 'list.php';
if ($page=='topup') include 'top_up.php';