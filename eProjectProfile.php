<?php
  include('header.html');
  include('lib_db.php');
  include('Login.php');
  $artist_id = $_GET['ID'];
  $sql = "SELECT * FROM artist_information where ID = $artist_id";
  $data_1 = select_one($sql);
  $sql = "SELECT A.Name , B.img_sample_path FROM service A join artist_service B on A.ID =  B.Service_ID where artist_ID =$artist_id";
  $datas_2 = select_list($sql);
  if(isset($_POST['Review'])){
      $data_3 = array();
      $customer_email = $_POST["Customer_Email"];
      $review_content = $_POST["Content"];
      $data_3["Artist_ID"] = $artist_id;
      $data_3["Customer_Email"] = $customer_email;
      $data_3["Content"] = $review_content;
      $tbl= "review_artist";
      $sql = data_to_sql_insert($tbl, $data_3);
      $ret = exec_update($sql);
 }
?>
<div id='content'>
  <div class="profile-photo-top">
  </div>
  <div class="profile-photo-btm">
    <div class="container">
      <div class="profile-photo-location">
        <div class="profile-photo">
          <div class="profile-photo-circle">
            <img class="img-fluid gm-lazy" src="<?php echo $data_1["img_path"]; ?>" alt="">
          </div>
        </div>
        <div style="text-align:center;">
          <h2>
            <?php echo $data_1["Name"]; ?>
          </h2>
        </div>
  
        <div style="text-align:center;">
          <h5>
            Makeup Artist(
            <?php
              $count =0;
              foreach ($datas_2 as $data){
                $service_name = $data["Name"];
                if ($count < (count($datas_2))-1)
                  echo"$service_name "." , ";
                else 
                  echo "$service_name";
                $count++;
              } 
            ?>
            )
          </h5>
        </div>
        <div class="text-center mt-5">
        <a class='btn_search' style='text-decoration:none;padding:15px;border-radius:20px;' href ='Book_Artist.php?Artist_Name=<?php echo $data_1["Name"];?>&ID=<?php echo"$artist_id";?>'>See Price And Order Artist</a>
        </div>
      </div>
    </div>
  </div>
  <div class='container mt-5'>
    <div class='gallery'><h4><i class='fa fa-picture-o' aria-hidden='true'></i>  Gallery</h4></div>
    <div class='row frame'>
  <?php foreach($datas_2 as $data){?>
    <div class='col-md-2 img-thumbnail img-hover-zoom '>
      <a href= '<?php echo $data["img_sample_path"];?>'>
      <img src='<?php echo $data["img_sample_path"];?> '  width='160'>
      </a>
      <div style='text-align:center;' class='text_changed'><?php echo $data["Name"];?></div>
    </div>
  <?php } ?>
    </div>
  </div>

  <div class="container mt-5 ">
    <div class="biography3"><h4><i class="fa fa-info-circle" aria-hidden="true"></i>  Biography</h4></div>
    <div class="row frame border-info">
      <div class="col-md-12 text_changed" >
        <?php echo $data_1["Biography"]; ?>
      </div>
    </div>
  </div>

  <div class="container mt-5 ">
    <div class="Certification"><h4><i class="fa fa-certificate" aria-hidden="true"></i>  Certifications</h4></div>
    <div class="row frame border-info">
      <div class="col-md-12 text_changed" >
        <?php echo $data_1["Certifications"]; ?>
      </div>
    </div>
  </div>

  <div class="container mt-5 ">
    <div class="achievements"><h4><i class="fa fa-trophy" aria-hidden="true"></i>  Achievements and Awards</h4></div>
    <div class="row frame border-info">
      <div class="col-md-12 text_changed" >
        <?php echo $data_1["Achievements"]; ?>
      </div>
    </div>
  </div>

  <div class="container mt-5 ">
    <div class="demo"><h4><i class="fa fa-meetup" aria-hidden="true"></i>  Demo Session</h4></div>  
    <div class="row frame  border-info">
      <div class="col-md-12 text_changed" >
        <?php echo $data_1["Demo"]; ?>
      </div>
      <div class="col-md-12 text_changed" >
        <?php 
          if($data_1["Demo_charge"] != 0){
            echo"The Demo charge session :". $data_1["Demo_charge"] ."$"; 
          }
        ?>
      </div>
    </div>
  </div>

  <div class="container mt-5 ">
    <div class="review"><h4><i class="fa fa-star" aria-hidden="true"></i>  Review</h4></div>
    <div class="row frame border-info">
      <form method="post">
        <div style="padding:30px;">
          <div class="col-md-12 text_changed"><h2>Post a review</h2></div>
          <div class="form-group col-md-4">
              <i class="fa fa-envelope" aria-hidden="true"></i> Email:<input type="email" id="id" class="form-control" name="Customer_Email" required>
          </div>
          <div class="col-md-12 mt-3 text_changed"><textarea rows="3" cols="70" placeholder="Post a review" name="Content" style="font-size:20px;"></textarea></div>
          <div class="col-md-12 mt-3 "><input type="submit" name="Review" class="btn btn-primary "style="float:right;font-size:20px;" value="Post"></div>
        </div>
      </form>
    </div>
  </div>
</div>
  <?php
    include 'footer.html';
  ?>  
</html>