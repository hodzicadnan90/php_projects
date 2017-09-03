<?php include 'includes/header.php'; ?>

<?php
    $db = new Database();

    if(isset($_POST['submit'])){
        $title = mysqli_real_escape_string($db->link, $_POST['title']);
        $body = mysqli_real_escape_string($db->link, $_POST['body']);
        $category = mysqli_real_escape_string($db->link, $_POST['category']);
        $author = mysqli_real_escape_string($db->link, $_POST['author']);
        $tags = mysqli_real_escape_string($db->link, $_POST['tags']);

        if($title == '' || $body == '' || $category == '' || $author == ''){
            $error = 'Please fill out all required fields!';
        }
        else {
            $query =    "INSERT INTO posts (title, body, category, author, tags)
                         VALUES ('$title', '$body', $category, '$author', '$tags')";
            $insert_row = $db->insert($query);
        }
    }

 ?>

<?php



    $query = "SELECT * FROM categories";

    $categories = $db->select($query);



 ?>

<form method = "POST" action = "add_post.php">
  <div class="form-group">
    <label>Post Title</label>
    <input type="text" class="form-control" name = "title" placeholder="Enter Title">
  </div>

  <div class="form-group">
      <label>Post Body</label>
      <textarea name="body" rows="10" cols="88" class = "form-control"></textarea>
  </div>

  <div class="form-group">
    <label>Category</label>
    <select class="form-control" name = "category">
        <?php while($row=$categories->fetch_assoc()): ?>
            <option value = "<?php echo $row['id']; ?>"><?php echo $row['name'];     ?></option>
        <?php endwhile; ?>
    </select>
  </div>

  <div class="form-group">
    <label>Author</label>
    <input type="text" class="form-control" name = "author" placeholder="Enter Author Name">
  </div>

  <div class="form-group">
    <label>Tags</label>
    <input type="text" class="form-control" name = "tags" placeholder="Enter Tags">
  </div>

  <div>
      <button type="submit" name = "submit" class="btn btn-primary">Submit</button>
      <a href="index.php" class = "btn btn-default">Cancel</a>
  </div>
  <br>

</form>





<?php include 'includes/footer.php'; ?>
