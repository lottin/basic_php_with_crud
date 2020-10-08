<?php 
$conn = mysqli_connect('localhost', 'root', '', 'ninja_pizza');
if(!$conn){
    echo "connection errors:".mysqli_connect_error();
}

?>