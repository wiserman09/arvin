<!DOCTYPE html>
<html>
<head>
	<title>blogsite</title>
	
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
  <script type=" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
  <script type="text/javascript src=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="dist/simplePagination.css">
  <script src="dist/jquery.simplePagination.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
       
 </head>
 	<body>
 		
 		<?php

 		include ('config.php');
    
 		$query ="SELECT * FROM users";


    ?> 		
 	<div class ="container">
      <div class="jumbotron text-center">
        <h1>My Blog</h1>
   
      </div>
    
    <!-- <form class="navbar-right" action="result.php" method="get">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit"></button><span class="glyphicon glyphicon-search"></span></a>
                    
    </form> -->
    <div class="container">

        
        <form class="navbar-form navbar-right" action="search.php" method="GET">
            <input name="search" type="text" autofocus>
            <input type="submit" name="submit">
        </form>

        <div class="pull-left">
					 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ADD">ADD</button>
				  <div class="modal fade" id="ADD" role="dialog">
    				<div class="modal-dialog">
    					<div class="modal-content">
       						<div class="modal-header">
          						<button type="button" class="close" data-dismiss="modal">&times;</button>
          								<h4 class="modal-title">yepheee</h4>

                           <form action="add.php" method="post">
                              <div class="modal-body">
                                <div class="form-group">
                                    <label for="TITLE">Title:</label>
                                    <input required type="TITLE" class="form-control" id="TITLE" placeholder="TITLE" name="title">
                                </div>
                                  
                                  <div class="form-group">
                                    <label for="AUTHOR">Author:</label>
                                    <input required type="AUTHOR" class="form-control" id="author" placeholder="author" name="author">
                                  </div>
                                  
                                  <div class="form-group">
                                    <label for="CONTENT">Content:</label>
                                    <input required="butangi" type="CONTENT" class="form-control" id="content" placeholder="content" name="content">
                                  </div>
                              </div>  
                                  
                                  <button type="submit" class="btn btn-default">Submit</button>
                          </form>
                  </div>
              </div>				
            </div>  
          </div>
        </div>

   
    <table class="table table-bordered">
        <thead>
          
          <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>AUTHOR</th>
            <th>CONTENT</th>
          	<th>DATE_CREATED</th>
          	<th>DATE_MODIFIED</th>
            <th colspan="2">Action</th>
          </tr>
        
        </thead>
      <tbody>

          <?php
          
              $result = mysqli_query($conn, $query);
              while($row = mysqli_fetch_assoc($result)){
              
                  $id = $row['id'];
                  $title = $row['title'];
                  $author = $row['author'];
                  $content = $row['content'];
                  $date_created = $row['date_created'];
                  $date_modified = $row['date_modified'];
          ?>
              <tr>
                  <td><?php echo $id; ?></td>
                  <td><?php echo $title; ?></td>
                  <td><?php echo $author; ?></td>
                  <td><?php echo $content; ?></td>
                  <td><?php echo $date_created; ?></td>
                  <td><?php echo $date_modified; ?></td>
                  
                  <td>
                      <a class="btn btn-info" href="edit.php?id=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
                       <a class="btn btn-danger" onclick="return confirm('Do you want to proceed?')" href="delete.php?id=<?php echo $row['id']; ?>"<a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
              </tr>
              
              <?php
                }
              ?>
        </tbody> 
     </table>
        
                 
        
            
            
            


              
            
              
           
   

         
   </div>
  </body>
</html>
 