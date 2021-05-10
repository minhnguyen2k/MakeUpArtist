<?php
    session_start();
    if(!isset($_SESSION['id'])){
      header("Location:eProject.php");
    }
    include("lib_db.php");
    $sql = "select * from artist_information";
    $datas = select_list($sql);
    if (isset($_POST['search'])){
      $search = $_POST['search'];
      $sql = "select * from artist_information where Name like '%$search%'";
      $datas = select_list($sql);
    }
    // print_r($datas_1);exit();


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
  <li><a class="active" href="#">Artist Management</a></li>
  <li><a href="Artist-Service-Management.php">Artist Service Management</a></li>
</ul>

<script>
    $(document).ready(function(){
      $('.delete').on('click',function(){
        $tr = $(this).closest('tr');
        var data =  $tr.children("td").map(function(){
          return $(this).text();  
        }).get();
        console.log(data);
        $('#delete_id').val(data[0]);
      }); 
});
</script>

<div id="artist">
  <h2 style="margin-left:15%;padding:1px 16px;">
      Displaying Artist Information
  </h2>
  
  <div style="display:flex;justify-content: space-between;">
    <form action="" method="post"style="margin-left:15%;padding:1px 16px;">
      <input type ="text" name="search"><button type="submit" name="submit_search">Search</button>
    </form>
    <a style="padding:1px 16px;" href="create_or_edit_information.php?Table=artist_information">Create new Artist</a>
  </div>
  <div class="mt-4" style="margin-left:15%;padding:1px 16px;">
  <table border='1'>
      <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Address</th>
          <th>Birthday</th>
          <th>Image</th>
          <th>Biography</th>
          <th>Achievements</th>
          <th>Certifications</th>
          <th>Demo</th>
          <th>Demo_charge</th>
          <th>Edit</th>
          <th>Delete</th>
      </tr>
      <?php foreach($datas as $data){ ?>
      <tr>
          <td style="width:30px; font-weight:bold;"><?php echo $data["ID"];?></td>
          <td><?php echo $data["Name"];?></td>
          <td><?php echo $data["Address"];?></td>
          <td style="width:100px;"><?php echo $data["Birthday"];?></td>
          <td><image src="<?php echo $data["img_path"];?>" width="150"></td>
          <td><?php echo $data["Biography"];?></td>
          <td><?php echo $data["Achievements"];?></td>
          <td><?php echo $data["Certifications"];?></td>
          <td style="width:100px;"><?php echo $data["Demo"];?></td>
          <td><?php echo $data["Demo_charge"];?></td>
          <td><i class="fa fa-pencil-square-o" style="font-size:20px;" aria-hidden="true"></i>
          <a href="create_or_edit_information.php?Artist_ID=<?php echo $data['ID'];?>&Table=artist_information">
            <button class="btn btn-primary">Edit</button>
          </a>
          </td>
          <td><i class="fa fa-trash"style="font-size:20px;" aria-hidden="true"></i>
          <button type="button" class="btn btn-danger delete"  data-toggle="modal" data-target="#delete-modal">Delete</button></td>
      </tr>
      <?php } ?>
  </div>
</div>
<!-- <div id="services" style="display:none;">
<h2 style="margin-left:15%;padding:1px 16px;">
      Displaying Service
  </h2>
  <div class="text-right">
      <a style="margin-left:15%;padding:1px 16px;" href="create_or_edit_information.php">Create new Service</a>
  </div>
  
</div> -->
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
          <input type="hidden" name = "delete_id" id ="delete_id">
          <input type="hidden" name="Table" value ="artist_information">
          Are you sure to delete this artist ?
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