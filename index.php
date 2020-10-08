<?php include_once 'config/db_connect.php';
$sql = "SELECT id, title, ingredients  FROM pizzas;";
$result = mysqli_query($conn, $sql);
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
   <?php  include('templates/header.php');?>
       <h4 class="text-grey center">Pizza</h4>
       <div class="container">
           <div class="row">
               <?php 
                  foreach($pizzas as $pizza): ?>
                  <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($pizza['title'])?></h6>
                            <ul>
                                <?php foreach(explode(",", $pizzas[0]['ingredients']) as $ing): ?>
                                    <li><?php echo htmlspecialchars($ing)?></li>
                                <?php endforeach ?>
                            </ul>
                    </div>
                        <div class="card-action right-align">
                            <a href="details.php?id=<?php echo $pizza['id']?>" class="brand-text" >More info</a>
                        </div>
                    </div>
                  </div>    
                  <?php endforeach ?>
               
           </div>
       </div>
   <?php  include('templates/footer.php');?>
</html>