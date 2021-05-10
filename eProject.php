<?php
  session_start();
  include('header.html');
  include('lib_db.php');
  include('Login.php');
  $sql_service = "SELECT * FROM service";
  $services = select_list($sql_service);
  //print_r($cates);exit();
	foreach ($services as &$service){
    $sub_sql = "SELECT ID,Name,Address,img_path FROM artist_information A";
    $sub_sql .= " join artist_service B on A.id = B.Artist_ID";
    $sub_sql .= " where Service_ID = {$service['ID']}";
    $sub_sql .= " limit 3";
		//echo $sql_cate;exit();
    $datas = select_list($sub_sql);
    // print_r($datas);exit();
		$service['artists'] = $datas;
  }

  //searchArtist
  $searchArtist = '';
  if (isset($_GET['searchArtist']))
  {
    $searchArtist =$_GET['searchArtist'];
    foreach ($services as &$service){
      $sub_sql = "SELECT ID,Name,Address,img_path FROM artist_information A";
      $sub_sql .= " join artist_service B on A.id = B.Artist_ID";
      $sub_sql .= " where Service_ID = {$service['ID']} and A.Name LIKE '%$searchArtist%' ";
      //echo $sql_cate;exit();
      $datas = select_list($sub_sql);
      // print_r($datas);exit();
      $service['artists'] = $datas;
    }
  }
?>
  <div id="content" class="margin-top-150px">
    <div id="search" class="container mt-5">
      <div id="hihi" class="row displayArtist">
        <div class="col-md-12 category-right-title"><h1>Book Make-Up Artist</h1></div>
        <script>
          $(document).ready(function(){
          $('#hi').click(function(){
            var searchText = $('#searchArtist').val();
            // console.log('http://localhost/makeup/eProject.php?searchArtist' + encodeURIComponent(searchText));
            $('body').load('http://localhost/makeup/eProject.php?searchArtist=' + encodeURIComponent(searchText));
            
          });
        });
        </script>
        <div class="col-md-12 text-right"><input type='text' name='searchArtist' id='searchArtist' value='' placeholder='Enter artist name' />
        <button id= 'hi' class='btn_search' style='text-decoration:none;' >Search</button>
        </div>
        <?php foreach ($services as &$service){?>
          <div class="col-md-10 service-name"><h4><?php echo $service["Name"];?></h4></div>
          <div class="col-md-2 artist-service"><a href = "Artist_service.php?ID=<?php echo $service['ID'];?>&Service_Name=<?php echo $service['Name'];?>">See More Artist >></a></div>
          <?php foreach ($service['artists'] as $data){?>
            <div class="col-md-4">
              <div class="card_background p-3">
                <div class="d-flex flex-column mb-3">
                  <img class = "mx-auto d-block rounded-circle" src="<?php echo $data['img_path'];?>" width="150" alt="<?php echo $data['Name'];?>">
                  <div class="d-flex flex-column ml-2">
                    <span class="mx-auto mt-2" style="color:#334680;font-size:20px;"><?php echo $data["Name"];?></span>
                    <div class="mx-auto">
                      <span><i class='fa fa-star' style='font-size:20px;color:#FFC107;' aria-hidden='true'></i></span>
                      <span><i class='fa fa-star' style='font-size:20px;color:#FFC107;' aria-hidden='true'></i></span>
                      <span><i class='fa fa-star' style='font-size:20px;color:#FFC107;' aria-hidden='true'></i></span>
                      <span><i class='fa fa-star' style='font-size:20px;color:#FFC107;' aria-hidden='true'></i></span>
                      <span><i class='fa fa-star' style='font-size:20px;color:#FFC107;' aria-hidden='true'></i></span>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-between mt-3">
                  <span style="color: #003FFF;font-weight:500;"><i class='fa fa-map-marker' style='font-size:25px;color:blue;' aria-hidden='true'></i>&nbsp;&nbsp;<?php echo $data["Address"];?>
                  </span>  
                </div>
                <div class="d-flex justify-content-between mt-3">
                  <span style="color: #003FFF;font-weight:500;"><i class='fa fa-paper-plane' aria-hidden='true'></i>&nbsp;&nbsp;Nationwide</span>
                  <span class="mt-5"><a class="book-btn" style="text-decoration:none;" href ="eProjectProfile.php?ID=<?php echo $data['ID'];?>">Book Now</a>&nbsp;</span>
                </div>
              </div>
            </div>
          <?php } ?>
          <div id="hr" class ="col-md-10" style=" margin: auto; margin-top:15px"><hr></div>
        <?php } ?>
        <script>
          //remove the last hr tag
          $("div[id=hr]:last").remove();
        </script>
      </div>
    </div>
        <div class="container-fluid mt-5 ">
              <div class="row intro">
                  <div class="col-md-7  section3">
                    <ul class="ul-1">
                      <li class="li-1">You want to try a new make-up that is different om every day </li>
                      <li class="li-1">You want to become more sparkling on a special occasion </li>
                      <li class="li-1">You want to be perfect on the happiest day of your life </li>
                      <li class="li-1">Very convenient, come to our website, choose the right one for you and make an appointment </li>
                      <li class="li-1">We will wholeheartedly for you !!!</li>
                    
                    </ul>
                    
                  </div>
                  <div class="col-md-5">
                    <img  src="image/Makeup.jpg" class="img-fluid "  alt="makeup">

                  </div>

              </div>
            </div>
  </div>
<?php
include 'footer.html';
?>
            

</html>