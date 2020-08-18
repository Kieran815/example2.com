<?php
include '../../core/db_connect.php';
require '../../core/bootstrap.php';

$content=null;
$stmt = $pdo->query("SELECT * FROM users");

while ($row = $stmt->fetch()){
  $content .= "<a href=\"view.php?slug={$row['id']}\">{$row['first_name']}</a><br />";
}

include '../../core/layout.php';