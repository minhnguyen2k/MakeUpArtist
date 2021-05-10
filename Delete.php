<?php
    session_start();
    include("lib_db.php");
    if(!isset($_SESSION['id'])){
        header("Location:eProject.php");
    }
    if (isset($_GET['submit'])&& $_GET['Table']=="artist_information"){
        $id = $_GET['delete_id'];
        $sql = "delete from artist_information" ;
        $sql .= " WHERE id =$id" ;
        //echo $sql;exit();
        $ret = exec_update($sql);
        if ($ret == 1){
            header("Location:AdminSystem.php");
        }
        else{
            echo"<script>alert('Cannot Delete')</script>";
        }
        $sql = "Alter table artist_information auto_increment=1";
        $ret = exec_update($sql);
    }
    if (isset($_GET['submit'])&& $_GET['Table']=="artist_service"){
        $service_ID = $_GET['delete_service_id'];
        $artist_ID = $_GET['delete_artist_id'];
        $sql = "delete from artist_service" ;
        $sql .= " WHERE Service_id =$service_ID and Artist_ID = $artist_ID" ;
        //echo $sql;exit();
        $ret = exec_update($sql);
        if ($ret == 1){
            header("Location:Artist-Service-Management.php");
        }
        else{
            echo"<script>alert('Cannot Delete')</script>";
        }
    }

?>