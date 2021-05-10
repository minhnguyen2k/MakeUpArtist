<?php
 include('header.html');
 include('lib_db.php');
 include('Login.php');
 $artist_name= $_GET['Artist_Name'];
 $artist_id = $_GET['ID'];
 $sql = "SELECT Service.ID, Name , Price  FROM service join artist_service on Service.id =  artist_service.Service_ID where artist_ID =$artist_id";
 $datas_1 = select_list($sql);
 $sql = "SELECT Demo_charge from artist_information where ID = $artist_id";
 $data_1 = select_one($sql);
?>
<!-- Required at least one checkbox is checked -->
<script>
        $(document).ready(function(){
            $("#form-order").submit(function(){
                if ($('input:checkbox').filter(':checked').length < 1){
                    alert("Please select at least one Service!");
                    return false;
                }
            });
        });
        function total_Service_Price() {
            var service = document.getElementsByName("Service");
            var serviceIds = document.getElementById("serviceIds");   
            var listServiceId =[];     
            var total = 0;
            for (var i = 0; i < service.length; i++) {
                if (service[i].checked){
                total += parseFloat(service[i].value);
                listServiceId.push(service[i].id);
                }
            }
            console.log(listServiceId);
            serviceIds.value = listServiceId;
            document.getElementById("total").value = total + "$"; 
            console.log(serviceIds.value);
        }
    </script>
<div id="content" class="margin-top-150px">
    <div class="container mt-5">
        <div class="row justify-content-center mt-5 frame"style="background-color: #f6f6f6;background-image: linear-gradient(315deg, #f6f6f6 0%, #e9e9e9 74%);">
        <form method='post' action="Book_Artist_Result.php?Artist_ID=<?php echo"$artist_id";?>&Artist_Name=<?php echo $artist_name;?>" id="form-order"enctype="multipart/form-data">
            <h3 class="text-center">Book <?php echo "$artist_name";?> Artist</h3> <br>
            <div class="form-group">
            <i class="fa fa-envelope" aria-hidden="true"></i> Email:<input type="email" id="id" class="form-control" name="Customer_Email" required>
            </div>

            <div class="form-group">
            <i class="fa fa-phone" aria-hidden="true"></i> Phone:<input type="tel" class="form-control" name="Customer_Phone"required>
            </div>

            <div class="form-group">
                Service:<br>
                <?php foreach($datas_1 as $data){?>
                    <div class='form-check '>
                        <input type='checkbox' name = 'Service' class='form-check-input' value='<?php echo $data["Price"];?>' id='<?php echo $data["ID"];?>' onclick='total_Service_Price()'>
                        <label class='form-check-label' for='<?php echo $data["Name"];?>'>
                        <?php echo $data["Name"];?>  ( <?php echo $data["Price"];?> $ )
                        </label>
                    </div>
                <?php } ?>
            </div>
            <div class="form-group">
                <input type='hidden' id='serviceIds' name='serviceIds' value=''>
                Price:<input type="text" class="form-control" value='' id="total" name="Total_Price" readonly>
            </div>
            
            <div class="form-group">
                <label for="myDateTimeLocal2"><i class="fa fa-calendar" aria-hidden="true"></i>     Date/Timing</label>
                <input type="datetime-local" id="myDateTimeLocal2" class="form-control" name="Datetime"required>
            </div>

            <div class="form-group">
            <i class="fa fa-address-card-o" aria-hidden="true"></i> Appointment Address:<input type="text" placeholder="Specific Address" class="form-control" name="Address"required>
            </div>
            

            <div class="form-group">
                <label for="mySelect1">Demo</label>
                <?php if($data_1["Demo_charge"] != 0){?>
                    <select id="mySelect1" class="form-control" name="Demo" required>
                        <option value='Yes'>Yes</option>
                        <option value='No'>No</option>
                    </select>
                <?php } else{ ?>
                <p><?php echo $artist_name ;?> doesn't provide demo session</p>
                <?php }?>
            </div> 
            <br>
            <input type="submit" name="Book" class="btn btn-primary" value="Book">
        </form>
        </div>
    </div>
</div>
<?php
include 'footer.html';
?>
</html>