<?php include 'includes/header.php'; ?>
<?php
    $id = $_GET['id'];

    $db = new Database();

    $query = "SELECT * FROM categories WHERE id = $id";

    $category = $db->select($query)->fetch_assoc();

 ?>

 <?php

     if(isset($_POST['submit'])){
         $name = mysqli_real_escape_string($db->link, $_POST['name']);


         if($name == ''){
             $error = 'Please fill out all required fields!';
         }
         else {
             $query =    "UPDATE categories SET name = '$name' WHERE id='$id'";
             $update_row = $db->update($query);
         }
     }

  ?>

  <?php
      if(isset($_POST['delete'])){
              $query = "DELETE FROM categories WHERE id = $id";
              $delete_row = $db->delete($query);
      }
   ?>

<form method = "POST" action = "edit_category.php?id=<?php echo $id; ?>">
  <div class="form-group">
    <label>Category Name</label>
    <input type="text" class="form-control" name = "name" placeholder="Enter Title" value = "<?php echo $category['name']; ?>">
  </div>

  <div>
      <button type="submit" name = "submit" class="btn btn-primary">Submit</button>
      <a href="index.php" class = "btn btn-default">Cancel</a>
      <input type="submit" class = "btn btn-danger" name="delete" value="Delete">
  </div>
  <br>

</form>





<?php include 'includes/footer.php'; ?>
