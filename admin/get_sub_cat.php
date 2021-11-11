<?php 

require('lib/db.php');

if(isset($_POST['cat'])){
    
echo $catID = $_POST['cat'];
$res = mysqli_query($conn, "SELECT * FROM `sub_category` WHERE category_id = '$catID' ");

if(mysqli_num_rows($res) > 0){
    $html = '';
    while($row = mysqli_fetch_assoc($res)){

        echo ' <option value="'.$row['id'].'">'.$row['sub_category'].'</option>';
    }
}else{
    echo '<option>No Sub Category Fund</option>';
}

}
?>