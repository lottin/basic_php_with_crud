<?php 

if(isset($_POST['submit'])){
    if(empty($_POST['email']) || empty($_POST['title'])|| empty($_POST['ingridients'])){
        echo "All field are required";
    }
}
?>

<!DOCTYPE html>
<html>
<?php include "templates/header.php";?>
   <section class="container grey-text">
       <h4 class="center">Add pizza</h4>
       <form action="add.php" class="white" method="POST">
           <label for="email">your email</label>
           <input type="email" name="email">
           <label for="email">Pizza title</label>
           <input type="text" name="title">
           <label for="email">Ingridients(comma separated)</label>
           <input type="email" name="ingridients">
           <div class="center">
               <input type="submit" name="submit" class="btn brand" value="submit">
           </div>
       </form>
   </section>
<?php include "templates/footer.php";?>
</html>
