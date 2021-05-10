<?php
    session_start();
    include("lib_db.php");
    if(!isset($_SESSION['id'])){
        header("Location:eProject.php");
    }
    $data = array();
    $data_1 = array();
    $update = false;
    //khởi tạo các biến rỗng , có tác dụng với insert
    $name = "";
    $address = "";
    $birthday = "";
    $picture = "";
    $biography ="";
    $achievements = "";
    $certifications="";
    $demo="";
    $demo_charge="";
    $artist_ID = "";
    $service_ID ="";
    $sample_image="";
    $price="";
    // gán biến vào mảng
    $data["Name"] = $name;
    $data["Address"] = $address;
    $data["Birthday"] = $birthday;
    $data["img_path"] = $picture;
    $data["Biography"] = $biography;
    $data["Achievements"] = $achievements;
    $data["Certifications"] = $certifications;
    $data["Demo"] = $demo;
    $data["Demo_charge"] = $demo_charge;
    $data_1["Service_ID"] = $service_ID;
    $data_1["Artist_ID"] = $artist_ID;
    $data_1["img_sample_path"] = $sample_image;
    $data_1["Price"] = $price;
    // Nếu là insert
    if(isset($_POST["submit"])&& $_POST["submit"]=="Add"){
        //insert thợ trang điểm
        if (isset($_GET['Table']) && $_GET["Table"]=="artist_information"){
            $name = $_POST["Name"];
            $address = $_POST["Address"];
            $birthday = $_POST["Birthday"];
            $picture = "image/".$_POST["Picture"];
            $biography = $_POST["Biography"];
            $achievements = $_POST["Achievements"];
            $certifications = $_POST["Certifications"];
            if($_POST["Demo"]=='Yes')
                $demo = $name." provide demo session";
            else
                $demo =$name." doesn't provide demo session";
            $demo_charge = $_POST["Demo_charge"];
            $data["Name"] = $name;
            $data["Address"] = $address;
            $data["Birthday"] = $birthday;
            $data["img_path"] = $picture;
            $data["Biography"] = $biography;
            $data["Achievements"] = $achievements;
            $data["Certifications"] = $certifications;
            $data["Demo"] = $demo;
            $data["Demo_charge"] = $demo_charge;
            $tbl= "artist_information";
            $sql = data_to_sql_insert($tbl, $data);
            $ret = exec_update($sql);
            header("Location:AdminSystem.php");
        }
        //insert thợ trang điểm cùng với dịch vụ mà họ cung cấp
        else if(isset($_GET['Table']) && $_GET["Table"]=="artist_service"){
            $artist_ID = $_POST["artist"];
            $service_ID =$_POST["service"];
            $price = $_POST["Price"];
            $sample_image="image/sample/".$_POST["Picture"];
            $data_1["Service_ID"] = $service_ID;
            $data_1["Artist_ID"] = $artist_ID;
            $data_1["img_sample_path"] = $sample_image;
            $data_1["Price"] = $price;
            $tbl= "artist_service";
            $sql = data_to_sql_insert($tbl, $data_1); 
            $ret = exec_update($sql);
            header("Location:Artist-Service-Management.php");

        }
    }
    //Lấy ra các service để cho hiển thị vào thẻ select
    $sql = "select * from service";
    $datas = select_list($sql);
    //Lấy ra ID và Tên thợ trang điểm để cho hiển thị vào thẻ select
    $sql = "select ID, Name from artist_information";
    $datas_1 = select_list($sql);
    // Nếu là update
    if (isset($_GET["Artist_ID"])){
        $update = true;
        $Artist_ID = $_GET["Artist_ID"];
        if (isset($_POST["submit"])&& $_POST["submit"]=="Update"){
            // Update đối với bảng artist_information
            if (isset($_GET['Table']) && $_GET["Table"]=="artist_information"){
                $name = $_POST["Name"];
                $address = $_POST["Address"];
                $birthday = $_POST["Birthday"];
                if($_POST["Picture"]!="")
                    $picture = "image/".$_POST["Picture"];
                else
                    $picture = $_POST["old-picture"];
                $biography = $_POST["Biography"];
                $achievements = $_POST["Achievements"];
                $certifications = $_POST["Certifications"];
                if($_POST["Demo"]=='Yes')
                    $demo = $name." provide demo session";
                else
                    $demo =$name." doesn't provide demo session";
                $demo_charge = $_POST["Demo_charge"];
                $data["Name"] = $name;
                $data["Address"] = $address;
                $data["Birthday"] = $birthday;
                $data["img_path"] = $picture;
                $data["Biography"] = $biography;
                $data["Achievements"] = $achievements;
                $data["Certifications"] = $certifications;
                $data["Demo"] = $demo;
                $data["Demo_charge"] = $demo_charge;
                $cond = "ID={$Artist_ID}";
                $tbl= "artist_information";
                $sql = data_to_sql_update($tbl,$data,$cond);
                $ret = exec_update($sql);
                if ($ret == 1){
                    header("Location:AdminSystem.php");
                }
                else{
                    echo"<script>alert('Cannot Update')</script>";
                }
            }
            // Update đối với bảng artist_service
            else if(isset($_GET['Table']) && isset($_GET['Service_ID']) && $_GET["Table"]=="artist_service"){
                $Service_ID = $_GET["Service_ID"];
                $artist_ID = $_POST["artist"];
                $service_ID =$_POST["service"];
                $price = $_POST["Price"];
                if($_POST["Picture"]!="")
                    $sample_image = "image/sample/".$_POST["Picture"];
                else
                    $sample_image = $_POST["old-picture"];
                $data_1["Service_ID"] = $service_ID;
                $data_1["Artist_ID"] = $artist_ID;
                $data_1["img_sample_path"] = $sample_image;
                $data_1["Price"] = $price;
                $cond = "Service_ID={$Service_ID} and Artist_ID ={$Artist_ID}";
                $tbl= "artist_service";
                $sql = data_to_sql_update($tbl,$data_1,$cond);
                // print_r ($sql);exit();
                $ret = exec_update($sql);
                if ($ret == 1){
                    header("Location:Artist-Service-Management.php");
                }
                else{
                    echo"<script>alert('Cannot Update')</script>";
                }
            }
        }
        //Lấy ra các service đc cung cấp bởi 1 thợ trang điểm (sử dụng cho mục đích edit)
        if(isset($_GET["Service_ID"])){
            $Service_ID = $_GET["Service_ID"];
            $sql = "Select * from artist_service where Artist_ID = $Artist_ID and Service_ID = $Service_ID";
            $data_1 = select_one($sql);
            // print_r($data);exit();
        }
        $sql = "Select * from artist_information where ID = $Artist_ID";
        $data = select_one($sql);

        // print_r($data);exit();
    }
    // print_r($datas);exit();
    
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
 
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <form action="" method="post">
            <?php if($_GET["Table"]=="artist_information"){ if (isset($_GET["Artist_ID"])){?>
                <h2>Edit Makeup Artist</h2>
                <?php } else{ ?>
                <h2>Add Makeup Artist</h2>
                <?php } ?>
                <div class="form-group">
                    Name:<input type="text" class="form-control" value="<?php echo $data["Name"];?>"  name="Name" required>
                </div>
                <div class="form-group">
                    Address:<input type="text" class="form-control" value="<?php echo $data["Address"];?>" name="Address" required>
                </div>
                <div class="form-group">
                    Birthday:<input type="date" class="form-control" value="<?php echo $data["Birthday"];?>" name="Birthday" required>
                </div>
                <div class="form-group">
                    Picture: <input  type="file" class="form-control"  name="Picture"><img src="<?php echo $data["img_path"];?>" width="150" alt="">
                </div>
                <input type = "hidden" name="old-picture" value ="<?php echo $data["img_path"];?>">
                <div class="form-group">
                    <textarea rows="4" cols="70" placeholder="Biography" name="Biography"><?php echo $data["Biography"];?></textarea>
                </div>
                <div class="form-group">
                    Achievements:<input  type="text" class="form-control" value="<?php echo $data["Achievements"];?>" name="Achievements">
                </div>
                <div class="form-group">
                    Certifications:<input  type="text" class="form-control" value="<?php echo $data["Certifications"];?>" name="Certifications">
                </div>
                <div class="form-group">
                    <label for="mySelect1">Demo</label>
                    <select id="mySelect1" class="form-control" name="Demo" required>
                        <?php if ($data["Demo"]==$data["Name"]." provide demo session"){?>
                        <option value='Yes' selected>Yes</option>
                        <option value='No'>No</option>
                        <?php } else{?>
                        <option value='Yes'>Yes</option>
                        <option value='No' selected>No</option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    Demo_charge:<input  type="number" class="form-control" value="<?php echo $data["Demo_charge"];?>" name="Demo_charge">
                </div>
                <?php } else if ($_GET["Table"]=="artist_service"){if (isset($_GET["Artist_ID"]) && isset($_GET["Service_ID"])){?>
                <h2>Edit Artist Service</h2>
                <?php } else{ ?>
                <h2>Add Artist Service</h2>
                <?php } ?>
                <div class="form-group">
                    <label for="mySelect1">Service</label>
                    <select id="mySelect1" class="form-control" name="service" required>
                        <?php foreach($datas as $data_2){ if ($data_1["Service_ID"]== $data_2["ID"] ){?>
                        <option value='<?php echo $data_2["ID"];?>'selected><?php echo $data_2["ID"]." - " . $data_2["Name"];?></option>
                        <?php } else{ ?>
                        <option value='<?php echo $data_2["ID"];?>'><?php echo $data_2["ID"]." - " . $data_2["Name"];?></option>
                        <?php }} ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="mySelect1">Artist</label>
                    <select id="mySelect1" class="form-control" name="artist" required>
                        <?php foreach($datas_1 as $data_3){if ($data_1["Artist_ID"]== $data_3["ID"]){ ?>
                        <option value='<?php echo $data_3["ID"];?>'selected><?php echo $data_3["ID"]." - " . $data_3["Name"];?></option>
                        <?php } else{ ?>
                        <option value='<?php echo $data_3["ID"];?>'><?php echo $data_3["ID"]." - " . $data_3["Name"];?></option>
                        <?php }} ?>
                    </select>
                </div>
                <div class="form-group">
                    Picture Sample:<input type="file" class="form-control" name="Picture"><img src="<?php echo $data_1["img_sample_path"];?>" width="150" alt="">
                </div>
                <input type = "hidden" name="old-picture" value ="<?php echo $data_1["img_sample_path"];?>">
                <div class="form-group">
                    Price:<input  type="text" value="<?php echo $data_1["Price"];?>" class="form-control" name="Price">
                </div>
                <?php } ?>
                <input type="submit" name="submit" class="btn btn-primary" value="<?php 
					if ($update) 
						echo 'Update';
					else 
						echo 'Add';?>">
             </form>
        </div>
    </div>
</body>
</html>
