<?php
    session_start();
    if(!isset($_SESSION['id'])){
      header("Location:eProject.php");
    }
    include("lib_db.php");
    $sql = "select A.* , B.Name as Artist_Name , C.Name as Service_Name from artist_service A join artist_information B on A.Artist_ID = B.ID join service C on A.Service_ID = C.ID";
    $datas = select_list($sql);
    if (isset($_POST['search'])){
      $search = $_POST['search'];
      $sql = "select A.* , B.Name as Artist_Name , C.Name as Service_Name from artist_service A join artist_information B 
      on A.Artist_ID = B.ID 
      join service C on A.Service_ID = C.ID 
      where B.Name like '%$search%' or C.Name like '%$search%'";
      $datas = select_list($sql);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Makeup Artist</title>
  <link rel="stylesheet" type="text/css" href="AdminSystem.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Muli&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
</head>
<body>
    <div style="background-color:pink;" class="text-right">
    <?php 
       if (isset($_SESSION['username'])){
        echo "<b style='margin-right:30px';><i class='fa fa-user fa-lg' aria-hidden='true'></i>
        ".$_SESSION['username']."</b> <a href='Logout.php' style='color:black;text-decoration:none;' >
        <i class='fa fa-sign-out' aria-hidden='true'></i>
        Sign out</a><br/>";
       }
    ?>
    </div>
<ul>
  <li><a href="AdminSystem.php">Artist Management</a></li>
  <li><a href="#" class="active">Artist Service Management</a></li>
</ul>
<script>
    $(document).ready(function(){
      $('.delete').on('click',function(){
        $tr = $(this).closest('tr');
        var data =  $tr.children("td").map(function(){
          return $(this).text();  
        }).get();
        console.log(data);
        $('#delete_service_id').val(data[0]);
        $('#delete_artist_id').val(data[1]);
      }); 
});
</script>

<div id="artist">
  <h2 style="margin-left:15%;padding:1px 16px;">
      Displaying Artist Service
  </h2>
  <div style="display:flex;justify-content: space-between;">
    <form action="" method="post"style="margin-left:15%;padding:1px 16px;">
      <input type ="text" name="search"><button type="submit" name="submit_search">Search</button>
    </form>
    <a style="margin-left:15%;padding:1px 16px;" href="create_or_edit_information.php?Table=artist_service">Create Artist with Service</a>
  </div>
  <div class="mt-4" style="margin-left:15%;padding:1px 16px;">
  <table border='1' style="font-size:100%;">
      <tr>
          <th>Service_ID</th>
          <th>Artist_ID</th>
          <th>Service_Name</th>
          <th>Artist_Name</th>
          <th>Sample Image</th>
          <th>Price</th>
          <th>Edit</th>
          <th>Delete</th>
      </tr>
      <?php foreach($datas as $data){ ?>
      <tr>
          <td style="width:30px; font-weight:bold;"><?php echo $data["Service_ID"];?></td>
          <td style="width:30px; font-weight:bold;"><?php echo $data["Artist_ID"];?></td>
          <td><?php echo $data["Service_Name"];?></td>
          <td><?php echo $data["Artist_Name"];?></td>
          <td><image src="<?php echo $data["img_sample_path"];?>" width="150"></td>
          <td><?php echo $data["Price"];?></td>
          <td style="width:50px;"><i class="fa fa-pencil-square-o" style="font-size:20px;" aria-hidden="true"></i>
          <a href="create_or_edit_information.php?Artist_ID=<?php echo $data['Artist_ID'];?>&Service_ID=<?php echo $data['Service_ID'];?>&Table=artist_service">
            <button class="btn btn-primary">Edit</button>
          </a>
         </td>
         <td style="width:50px;"><i class="fa fa-trash"style="font-size:20px;" aria-hidden="true"></i>
          <button type="button" class="btn btn-danger delete"  data-toggle="modal" data-target="#delete-modal">Delete</button></td>
      </tr>
      <?php } ?>
  </div>
</div>
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display:none;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="Delete.php?Table=artist_information" method ="get">
        <div class="modal-body">
          <input type="hidden" name = "delete_service_id" id ="delete_service_id">
          <input type="hidden" name = "delete_artist_id" id ="delete_artist_id">
          <input type="hidden" name="Table" value ="artist_service">
          Are you sure to delete ?
        </div>
        <div class="modal-footer">
        
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
        
          <button type="submit" name="submit" class="btn btn-primary">OK</button>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>