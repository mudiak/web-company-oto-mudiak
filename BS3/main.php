<?php
$page=isset($_GET['page']) ? $_GET['page'] : 'home';
if ($page=='home') include 'dashboard.php';
if ($page=='order') include 'order.php';
if ($page=='list') include 'list.php';
if ($page=='topup') include 'top-up.php';