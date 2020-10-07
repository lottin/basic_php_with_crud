<?php 

$email = $_POST['email'];
$title = $_POST['title'];
$ingredients =$_POST['ingredients'];
$errors =[ 'email'=>'', 'title'=>'', 'ingredients'=>'', 'all'=>''];
if(isset($_POST['submit'])){
    if(empty($_POST['email']) || empty($_POST['title'])|| empty($_POST['ingredients'])){
        $errors['all']= "All field are required";
    }else{
        //code
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error['email'] = "Must be a valid email address";
        }
        if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
            $error['title'] = "Must be letters and spaces";
        }
        if(!preg_match('/^([a-zA-Z\s]+)(,\$*[a-zA-Z\s]*)*$/',$ingridients)){
            $error['ingredients'] = "Must be a comma separated list";
        }
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
           <div class="red-text"><?php echo $errors['email']?></div>
           <label for="">Pizza title</label>
           <input type="text" name="title">
           <div class="red-text"><?php echo $errors['title']?></div>
           <label for="">Ingridients(comma separated)</label>
           <input type="text" name="ingredients">
           <div class="red-text"><?php echo $errors['ingredients']?></div>
           <div class="red-text center"><?php echo $errors['all']?></div>
           <div class="center">
               <input type="submit" name="submit" class="btn brand" value="submit">
           </div>
       </form>
   </section>
<?php include "templates/footer.php";?>
</html>
