<?php

require_once('config.php');


$id=$_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM users where id = '$id'" );
      while($row = mysqli_fetch_assoc($result)){

  if (isset($_POST['update'])){

    $title =$_POST['title']; 
    $author = $_POST['author'];
    $content = $_POST['content'];

    $sql = "UPDATE users SET title='$title', author='$author', content='$content' WHERE id= '$id'";

    if ($conn->query($sql) === TRUE) {
    
    } 
    else {
      echo "Error updating record: " . $conn->error;
    }


  }



?>


    <form class="form-horizontal" method="post" action="edit.php<?php echo '?id='.$id; ?>"  enctype="        multipart/form-data" style="float: left;">
        
        <legend><h4>Edit</h4></legend>
        <h4>Personal Information</h4>
        <hr>
            
            <div class="control-group">
                <label class="control-label">title:</label>
                    <div class="controls">
                        <input type="text" name="title" value="<?php echo $row['title']; ?>">
                    </div>
            </div>
                
            <div class="control-group">
                <label class="control-label">author:</label>
                    <div class="controls">
                        <input type="text" name="author" value="<?php echo $row['author']; ?>"> 
                    </div>
            </div>
                                            
            <div class="control-group">
                <label class="control-label">content:</label>
                    <div class="controls">
                        <input type="text" name="content"  value="<?php echo $row['content']; ?>">
                    </div>
            </div>
                                            
                                            
            <div class="control-group">
                <div class="controls">
                    <button type="submit" name="update" class="btn btn-success" style="margin-left: 50px;">Save</button>
                            <a href="index.php" class="btn">Back</a>
                </div>
            </div>
    </form>

<?php } ?>