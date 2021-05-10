<?php
   include('header.html');
   include('lib_db.php');
   include('Login.php');
   $service_id = $_GET['ID'];
   $service_name=$_GET['Service_Name'];
   $sql = "select count(Artist_ID) as total FROM artist_service where Service_id =$service_id";
   $data = select_one($sql);
   $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
   $limit = 3;
   $total_page = ceil($data["total"] / $limit);
   if ($current_page > $total_page){
    $current_page = $total_page;
   }
   else if ($current_page < 1){
    $current_page = 1;
   }
   $start_record = $current_page * $limit -$limit;
   $sql = "select ID,Name,Address,img_path FROM artist_service join artist_information on artist_id =  artist_information.ID where Service_id =$service_id LIMIT $start_record, $limit";
   $datas = select_list($sql);
  //  print_r($data);exit();
?>
<div id ="content" class="margin-top-150px">
  <div class='container mt-5'>
    <div class='row displayArtist'>
      <div class='col-md-12 category-right-title'><h1 class='h1-heading' >Book <?php echo $service_name; ?> Artist </h1></div>
      <?php foreach($datas as $data){?>
        <div class='col-md-4'>
          <div class='card_background p-3'>
            <div class='d-flex flex-column mb-3'>
              <img class = "mx-auto d-block rounded-circle" src= "<?php echo $data["img_path"];?>" width="150">
              <div class='d-flex flex-column ml-2'>
                <span class='mx-auto mt-2' style='color:#334680;font-size:20px;'><?php echo $data["Name"];?></span>
                <div class='mx-auto'>
                  <span><i class='fa fa-star' style='font-size:20px;color:#FFC107;' aria-hidden='true'></i></span>
                  <span><i class='fa fa-star' style='font-size:20px;color:#FFC107;' aria-hidden='true'></i></span>
                  <span><i class='fa fa-star' style='font-size:20px;color:#FFC107;' aria-hidden='true'></i></span>
                  <span><i class='fa fa-star' style='font-size:20px;color:#FFC107;' aria-hidden='true'></i></span>
                  <span><i class='fa fa-star' style='font-size:20px;color:#FFC107;' aria-hidden='true'></i></span>
                </div>
              </div>
            </div>
            <div class='d-flex justify-content-between mt-3'>
              <span style='color: #003FFF;font-weight:500;'><i class='fa fa-map-marker' style='font-size:25px;color:blue;' aria-hidden='true'></i>&nbsp;<?php echo $data['Address'];?></span>
            </div>
            <div class='d-flex justify-content-between mt-3'>
              <span style='color: #003FFF;font-weight:500;'><i class='fa fa-paper-plane' aria-hidden='true'></i>&nbsp;&nbsp;Nationwide</span>
              <span class='mt-5'><a class='book-btn' style='text-decoration:none;' href ='eProjectProfile.php?ID=<?php echo $data["ID"];?>'>Book Now</a>&nbsp;</span>
            </div>
          </div>
        </div>
      <?php } ?>
      <div class="col-md-12 mt-5">
        <ul class="pagination justify-content-center">
        <?php
        if ($current_page > 1 && $total_page > 1){
          echo "<li class='page-item'><a class='page-link' href='Artist_Service.php?ID=$service_id&page=".($current_page-1)."'>Previous</a></li>";
        }
        for($i=1 ; $i<=$total_page ; $i++){
        ?>
          <li class="page-item <?php if($i == $current_page) { echo"active";?> "><a class="page-link" ><?php echo $i;?></a></li>
          <?php } else{ ?>
          <li class="page-item"><a class="page-link" href="Artist_Service.php?ID=<?php echo $service_id;?>&page=<?php echo $i;?>"><?php echo $i;?></a></li>
        <?php }} ?>
        <?php 
        if ($current_page < $total_page && $total_page > 1){
          echo "<li class='page-item'><a class='page-link' href='Artist_Service.php?ID=$service_id&page=".($current_page+1)."'>Next</a></li>";
        }
        ?>
        </ul>
      </div>
    </div>
  </div>     
      <div class="container-fluid mt-5 p-0">
              <div class="row intro">
                  <div class="col-md-7  section3">
                    <ul class="ul-1">
                      <li class="li-1">You want to try a new make-up that is different from every day </li>
                      <li class="li-1">You want to become more sparkling on a special occasion </li>
                      <li class="li-1">You want to be perfect on the happiest day of your life </li>
                      <li class="li-1">Very convenient, come to our website, choose the right one for you and make an appointment </li>
                      <li class="li-1">We will wholeheartedly for you !!!</li>
                    
                    </ul>
                  </div>
                  <div class="col-md-5">
                    <img  src="image/Makeup.jpg" class="img-fluid " alt="makeup">
                  </div>
              </div>
      </div>     
</div>
      <?php
        include 'footer.html';
      ?>
            
</html>