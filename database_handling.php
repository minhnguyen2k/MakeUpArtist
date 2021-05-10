<?php
    define ("Server","localhost");
    define ("Username","root");
    define ("Password","");
    define ("Database","makeup_artist");
    $connect_mysql = mysqli_connect(Server,Username,Password);
    if (!$connect_mysql)
        die ("Unable to connect Database ".Database);
    $db_selected = mysqli_select_db($connect_mysql , Database);
    if (isset($_GET['ID']))
    {
        $id =$_GET['ID'];
        $sql_select="SELECT * FROM artist_information where ID=$id";
        $result = mysqli_query($connect_mysql, $sql_select);
        while ($row = mysqli_fetch_array($result)){ 
        $name= $row['Name'];
        $image = $row['img_path'];
        $biography = $row['Biography'];
        $certifications = $row['Certifications'];
        $achievements = $row['Achievements'];
        $demo = $row['Demo'];
        $demo_charge = $row['Demo_charge'];  
        }
    }

    
    function get_imgpath_artistID_artistName_and_artistAddress_by_Artistinformation($connect_mysql)
    {
        $sql_select="SELECT ID,Name,Address,img_path FROM artist_information" ;
        $result = mysqli_query($connect_mysql, $sql_select);
        return $result;
    }

    function get_artists_by_name($connect_mysql, $artistName)
    {
        $sql_select="SELECT ID,Name,Address,img_path FROM artist_information WHERE artist_information.Name LIKE '%$artistName%'" ;
        $result = mysqli_query($connect_mysql, $sql_select);
        return $result;
    }

    function get_ServiceName_and_imgsample_by_service_and_ArtistService($connect_mysql,$id)
    {
        $sql_select="SELECT Name,img_sample_path FROM service join artist_service on Service.id =  artist_service.Service_ID where artist_ID =$id";
        $result = mysqli_query($connect_mysql, $sql_select);
        return $result;
    }

    function get_Service_ID_ServiceName_Service_Price_by_service_and_ArtistService($connect_mysql,$id)
    {
        $sql_select="SELECT Service.ID, Name , Price  FROM service join artist_service on Service.id =  artist_service.Service_ID where artist_ID =$id";
        $result = mysqli_query($connect_mysql, $sql_select);
        return $result;
    }

    function get_imgpath_artistID_artistName_and_artistAddress_by_Artistinformation_and_Artistservice($connect_mysql,$id)
    {
        $sql_select="SELECT ID,Name,Address,img_path FROM artist_service join artist_information on artist_id =  artist_information.ID where Service_id =$id";
        $result = mysqli_query($connect_mysql, $sql_select);
        return $result;
    }
    // add order_artist
    function insert_book_artist($connect_mysql,$Artist_ID, $customerEmail, $customerPhone, $dateTime, $Address, $Demo, $totalPrice) {
        $sql_insert=" Insert into book_artist(Artist_ID , Customer_Email , Customer_Phone , appointment_date , Appointment_Address , Demo_Option , Order_Total_Price ) 
                      values ($Artist_ID , '$customerEmail' , '$customerPhone' , '$dateTime' , '$Address' , '$Demo' , $totalPrice ) ";  
        //in câu sql_insert này ra xem, rồi copy vào sql ý, để biết giá trị các biến truyền vào đúng hay sai
       
        $result = mysqli_query($connect_mysql, $sql_insert);
		return $result;
    }
    // add artist_service with each order_artist
    function insert_book_artist_detail($connect_mysql , $Order_ID , $Service_ID) {
        $sql_insert=" Insert into book_artist_detail(Order_ID , Service_ID) 
                      values ($Order_ID , $Service_ID) ";
        $result = mysqli_query($connect_mysql, $sql_insert);
		return $result;
    }
    function get_artistName_DemoCharge_ServiceName_and_Price_by_Artistinformation_Service_and_ArtistService($connect_mysql,$Artist_ID,$Service_ID)
    {
        $sql_select ="select A.Name,A.Demo_charge,C.Name,B.Price from artist_information A join artist_service B on A.ID = B.Artist_ID join service C on B.Service_ID = C.ID where A.ID =$Artist_ID and C.ID=$Service_ID";
        $result = mysqli_query($connect_mysql, $sql_select);
		return $result;
    }
    function insert_review_artist($connect_mysql , $Artist_ID , $customerEmail , $content)
    {
        $sql_insert = "Insert into review_artist(Artist_ID , Customer_Email , Content) values($Artist_ID , '$customerEmail' , '$content')";
        $result = mysqli_query($connect_mysql, $sql_insert);
		return $result;
    }
    function check_admin($connect_mysql , $adminAccount , $adminPass)
    {
        $sql_select = "select * from admin where AdminAccount = '$adminAccount' and AdminPass = '$adminPass'";
        $result = mysqli_query($connect_mysql, $sql_select);
		
        if (mysqli_fetch_array($result))
			return true;
		
        return false; //Khong co dong nao co thong tin username va password nhu tren
    }
?>