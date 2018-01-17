<?php


$conn = mysqli_connect("localhost", "root", "", "blog");
$record_per_page = 4;
$total_items = 12;

$sql = "SELECT * FROM users LIMIT 0,3 ";
$page = '';
if(isset($_GET["page"]))
{
 $page = $_GET["page"];
}
else
{
 $page = 1;
}

$start_from = ($page-1)*$record_per_page;

$query = "SELECT * FROM users order by id   ASC LIMIT $start_from, $record_per_page";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
 <head>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <style>
  a {
   padding:8px 16px;
   border:1px solid #ccc;
   color:#333;
   font-weight:bold;
  }
  </style>
 </head>
 <body>
  <br /><br />
  <div class="container">

   <div class="table-responsive">
    <table class="table table-bordered">
                    
                    <tr>
      
                      <td>title</td>
                      <td>author</td>
                      <td>content</td>
                      <td>date_created</td>
                      <td>date_modified</td>
     
                    </tr>
     <?php
     
      while($row = mysqli_fetch_array($result))
     
     {
     
     ?>
                      <tr>
                        <td><?php echo $row["title"]; ?></td>
                        <td><?php echo $row["author"]; ?></td>
                        <td><?php echo $row["content"]; ?></td>
                        <td><?php echo $row["date_created"]; ?></td>
                        <td><?php echo $row["date_modified"]; ?></td>
                    
                      </tr>
     <?php
     }
     ?>
    
    </table>
       <div align="right">
    <br />
    
    <?php
    $query = "SELECT * FROM users ORDER BY id ASC";
    $result = mysqli_query($conn, $query);
    $total_records = mysqli_num_rows($result);
    $total_pages = ceil($total_records/$record_per_page);
    $start_loop = $page;
    $difference = $total_pages - $page;
    if($difference <= 3)
    {
     $start_loop = $total_pages - 5;
    }
    $end_loop = $start_loop + 4;
    if($page > 1)
    {
     echo "<a href='pagination.php?page=1'>prev</a>";
     
    }
    for($i=$start_loop; $i<=$end_loop; $i++)
    {     
     echo "<a href='pagination.php?page=".$i."'>".$i."</a>";
    }
    if($page <= $end_loop)
    {
     
     echo "<a href='pagination.php?page=".$total_pages."'>next</a>";
    }
    
    
    ?>
    </div>
    <br /><br />
   </div>
  </div>
 </body>
</html>
 