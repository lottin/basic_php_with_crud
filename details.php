<?php 
   include "config/db_connect.php";

   if(isset($_GET['id'])){
       $id = mysqli_real_escape_string($conn, $_GET['id']);
       $sql = "SELECT * FROM pizzas WHERE id=$id;";
       $result =mysqli_query($conn, $sql);
       $pizza = mysqli_fetch_assoc($result);
       

       mysqli_free_result($result);
       mysqli_close($conn);
      
   }
       
       
?>
<html lang="en">
    <?php include 'templates/header.php'?>
      <div class="container center">
          <?php if($pizza):?>
            <h4><?php echo htmlspecialchars($pizza['title']);?></h4>
            <p>created by:<?php echo htmlspecialchars($pizza['email']);?></p>
            <p>created at:<?php date($pizza['created_at']);?></p>
            <h5>Ingredients</h5>
             <p><?php echo htmlspecialchars($pizza['ingredients'])?></p>
          <?php else: ?>
            <h5><?php echo "no such details"?></h5>
          <?php endif; ?>
      </div>
    <?php include 'templates/footer.php'?>
</html>