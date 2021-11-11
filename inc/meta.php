<?php include'lib/db.php';
$meta = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_seo` ")); 
?>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?= $meta['title']?></title>
<meta name="author" content="Nayon Talukder (NESOFT.NET)" >

<meta name="description" content="<?= $meta['des']?>">

<meta name="keywords" content="<?= $meta['keyw']?>"/>