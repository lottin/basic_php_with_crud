<?php 
include_once 'config/db_connect.php';
$email =$title =$ingredients='';
$errors =[ 'email'=>'', 'title'=>'', 'ingredients'=>'', 'all'=>''];
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $title = $_POST['title'];
    $ingredients =$_POST['ingredients'];
    if(empty($_POST['email']) || empty($_POST['title'])|| empty($_POST['ingredients'])){
        $errors['all']= "All field are required";
    }else{
        //code
        $email =$_POST['email'];
        $title =$_POST['title'];
        $ingredients=$_POST['ingredients'];
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "Must be a valid email address";
        }
        // if(!preg_match('/^[a-zA-Z\s]+$/',$_POST['title'])){
        //     $errors['title'] = "Must be letters and spaces";
        // }
        if(!preg_match('/^([a-zA-Z\s]+)(,\$*[a-zA-Z\s]*)*$/',$_POST['ingredients'])){
            $errors['ingredients'] = "Must be a comma separated list";
        }   
        if(array_filter($errors)){
            //do nothing 
        }else{
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
    
            $sql = "INSERT INTO pizzas(title, email, ingredients) VALUE('$email', '$title', '$ingredients'); ";
    
            if(mysqli_query($conn, $sql)){
                
                header('Location:./index.php');
            }else{
                echo "error with the sql query";
            }
           
            
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
           <input type="email" name="email" value='<?php echo htmlspecialchars($email)?>'>
           <div class="red-text"><?php echo $errors['email']?></div>
           <label for="">Pizza title</label>
           <input type="text" name="title" value='<?php echo htmlspecialchars($title) ?>'>
           <div class="red-text"><?php echo $errors['title']?></div>
           <label for="">Ingridients(comma separated)</label>
           <input type="text" name="ingredients" value='<?php echo htmlspecialchars($ingredients) ?>'>
           <div class="red-text"><?php echo $errors['ingredients']?></div>
           <div class="red-text center"><?php echo $errors['all']?></div>
           <div class="center">
               <input type="submit" name="submit" class="btn brand" value="submit">
           </div>
       </form>
   </section>
<?php include "templates/footer.php";?>
</html>
