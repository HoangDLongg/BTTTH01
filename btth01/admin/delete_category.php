<?php 
include 'C:/xampp/htdocs/btth01/admin/db.php';

?>
<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];

$sql = "DELETE from theloai WHERE ma_tloai = '$id'";
if(mysqli_query($conn, $sql)){
    header('location:category.php?delete_msg=DONE.');
} else{
    echo "Error deleting record: " . mysqli_error($conn);
}

}

?>