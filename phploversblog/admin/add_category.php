<?php include 'includes/header.php'; ?>

<?php
    $db = new Database();

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($db->link, $_POST['name']);


        if($name == ''){
            $error = 'Please fill out all required fields!';
        }
        else {
            $query =    "INSERT INTO categories (name)
                         VALUES ('$name')";
            $insert_row = $db->insert($query);
        }
    }

 ?>

<form method = "POST" action = "add_category.php">
  <div class="form-group">
    <label>Category Name</label>
    <input type="text" class="form-control" name = "name" placeholder="Enter Title">
  </div>

  <div>
      <button type="submit" name = "submit" class="btn btn-primary">Submit</button>
      <a href="index.php" class = "btn btn-default">Cancel</a>
  </div>
  <br>

</form>





<?php include 'includes/footer.php'; ?>
