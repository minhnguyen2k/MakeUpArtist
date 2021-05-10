<?php
  include('header.html');
  include('lib_db.php');
  $artist_id= $_GET["Artist_ID"];
  $artist_name= $_GET['Artist_Name'];
  $customer_email = $_POST["Customer_Email"];
  $customer_phone = $_POST["Customer_Phone"];
  $date_time = $_POST["Datetime"];
  $address = $_POST["Address"];
  if (isset($_POST["Demo"])){
    $demo = $_POST["Demo"];
  }
  else
    $demo = "No";
  $temp = $_POST["Total_Price"];
  $total_price = substr("$temp",0,-1);
  $data = array();
  $data["Artist_ID"] = $artist_id;
  $data["Customer_Email"] = $customer_email;
  $data["Customer_Phone"] = $customer_phone;
  $data["appointment_date"] = $date_time;
  $data["Appointment_Address"] = $address;
  $data["Demo_Option"] = $demo;
  $data["Order_Total_Price"] = $total_price;
  $tbl= "book_artist";
  $sql = data_to_sql_insert($tbl, $data);
  $ret = exec_update($sql);
  $sql = "SELECT max(Order_ID) from book_artist";
  $data_3 = select_one($sql);
  $order_id = $data_3["max(Order_ID)"];
  $datas = array();
  if(!empty($_POST['serviceIds'])){
    $myArray = explode(',', $_POST["serviceIds"]); 
    foreach($myArray as $selected) {
      $service_id =$selected;
      $data_1 = array();
      $data_1["Order_ID"] = $order_id;
      $data_1["Service_ID"] = $service_id;
      $tbl= "book_artist_detail";
      $sql = data_to_sql_insert($tbl, $data_1);
      $ret = exec_update($sql);
      $sql = "select A.Demo_charge,C.Name,B.Price ,B.Service_ID from artist_information A join artist_service B on A.ID = B.Artist_ID join service C on B.Service_ID = C.ID where A.ID =$artist_id and C.ID=$service_id";
      $data_2 = select_one($sql);
      // print_r($data_2);exit();
      array_push($datas,$data_2);
    }
    // print_r($datas);exit();
    
  }

?>
<div id ="content" class="margin-top-150px">
  <div class='container mt-5'>
    <div class='row frame' style='background-color: #f6f6f6;background-image: linear-gradient(315deg, #f6f6f6 0%, #e9e9e9 74%);'>
      <div class='col-12'>
        <div class='row pb-5 p-5'>
          <div class='col-md-6'>
            <br><br>
            <p class='font-weight-bold mb-4'>Client Information</p>
            <p class='mb-1'>Email : <?php echo $customer_email ;?></p>
            <p class='mb-1'>Phone : <?php echo $customer_phone ;?></p>
            <p class='mb-1'>Appointment Date : <?php echo $date_time ;?> </p>
            <p class='mb-1'>Appointment Address : <?php echo $address ;?></p>
            <p class='mb-1'>Demo Option : <?php echo $demo ;?></p>
          </div>
          <div class='col-md-6 text-right'>
            <p class='font-weight-bold mb-1'>Invoice #<?php echo $order_id ;?></p>
          </div>
        </div>
        <div class='row p-5'>
          <div class='col-md-12'>
            <table class='table'>
              <thead>
                <tr>
                    <th class='border-0 text-uppercase small font-weight-bold'>Service ID</th>
                    <th class='border-0 text-uppercase small font-weight-bold'>Service Name</th>
                    <th class='border-0 text-uppercase small font-weight-bold'>Artist Name</th>
                    <th class='border-0 text-uppercase small font-weight-bold'>Price</th>
                    <th class='border-0 text-uppercase small font-weight-bold'>Demo Charge</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($datas as $data_4){?>
                  <tr>
                    <td><?php echo $data_4["Service_ID"];?></td>
                    <td><?php echo $data_4["Name"];?></td>
                    <td><?php echo $artist_name;?></td>
                    <td><?php echo $data_4["Price"];?></td>
                    <?php if ($demo == "Yes"){?>
                      <td><?php echo $data_4["Demo_charge"];?></td>
                      <?php $total_price+=$data_4["Demo_charge"];?>
                    <?php } else{?>
                      <td><?php echo 0;?></td>
                    <?php } ?>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class='d-flex flex-row-reverse text-black'>
          <div class='py-3 px-5 text-right'>
            <div class='mb-2 font-weight-bold'>Grand Total</div>
            <div class='h2 font-weight-light'><?php echo $total_price;?>$</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


    
