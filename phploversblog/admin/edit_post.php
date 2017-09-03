<?php include 'includes/header.php'; ?>

<?php
    $id = $_GET['id'];

    $db = new Database();

    $query = "SELECT * FROM categories";

    $categories = $db->select($query);

    $query = "SELECT * FROM posts WHERE id = $id";

    $post = $db->select($query)->fetch_assoc();

?>

<?php
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
            $query =    "UPDATE posts SET
                        title = '$title', body = '$body', category = '$category', author = '$author', tags = '$tags'
                        WHERE id = '$id'";
            $update_row = $db->update($query);
        }
    }

 ?>

 <?php
     if(isset($_POST['delete'])){
             $query = "DELETE FROM posts WHERE id = $id";
             $delete_row = $db->delete($query);
     }
  ?>

<form method = "POST" action = "edit_post.php?id=<?php echo $id; ?>">
  <div class="form-group">
    <label>Post Title</label>
    <input type="text" class="form-control" name = "title" placeholder="Enter Title" value = "<?php echo $post['title']; ?>">
  </div>

  <div class="form-group">
      <label>Post Body</label>
      <textarea name="body" rows="10" cols="88" class = "form-control"><?php echo $post['body']; ?></textarea>
  </div>

  <div class="form-group">
    <label>Category</label>
    <select class="form-control" name = "category">
        <?php while($row=$categories->fetch_assoc()): ?>
            <option value = "<?php echo $row['id']; ?>" <?php if($post['category'] == $row['id']) { echo 'selected="selected"';} ?>>
                <?php echo $row['name']; ?>
            </option>
        <?php endwhile; ?>
    </select>
  </div>

  <div class="form-group">
    <label>Author</label>
    <input type="text" class="form-control" name = "author" placeholder="Enter Author Name" value = "<?php echo $post['author']; ?>">
  </div>

  <div class="form-group">
    <label>Tags</label>
    <input type="text" class="form-control" name = "tags" placeholder="Enter Tags" value = "<?php echo $post['tags']; ?>">
  </div>

  <div>
      <button type="submit" name = "submit" class="btn btn-primary">Submit</button>
      <a href="index.php" class = "btn btn-default">Cancel</a>
      <input type="submit" class = "btn btn-danger" name="delete" value="Delete">
  </div>
  <br>

</form>





<?php include 'includes/footer.php'; ?>
