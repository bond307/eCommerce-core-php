<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<?php
 include 'lib/db.php';
$meta = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_seo` ")); 
?>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?= $meta['title']?></title>
<meta name="author" content="Nayon Talukder (NESOFT.NET)" >

<meta name="description" content="<?= $meta['des']?>">

<meta name="keywords" content="<?= $meta['keyw']?>"/>

<!-- Mobile specific metas  -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Favicons Icon -->
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

<!-- CSS Style -->
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/jquery.dialogbox.css">


</head>

<body class="cms-index-index cms-home-page">
