<?php

$base_url = '/FaskesUTS/admin';
function isActivePage($page) {
    $currentPage = basename($_SERVER['PHP_SELF']);
    return $currentPage === $page;
}
?>
