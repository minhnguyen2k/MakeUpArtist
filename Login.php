<?php
    session_start();
    // include("checklogin.php");
    $error = '';
    $checkLogin = false;
    if(isset($_POST["username"])){
        $user_name = $_POST["username"];
        $password =$_POST["password"];
        $sql ="select * from admin";
        $sql .=" where AdminAccount='$user_name'";
        $admin = select_one($sql);
        if (is_null($admin)){
            //thuc hien co user o day
            $error = 'Invalid Username !';
            echo"
            <script> 
              $(document).ready(function() {
                $('.blurred-panel').css({ 'display': 'block' })
                $('.form-login').css('animation', 'animatezoombig 0.6s')
                $('.form-login').show()
                setTimeout(function () {
                  $('.blurred-panel').css({ 'opacity': '0.4' })
                }, 1)
              });
            </script>";
        }               
        else{
          if (md5($password) != $admin['AdminPass']){
            $error = 'Invalid Password';
            echo"
            <script> 
              $(document).ready(function() {
                $('.blurred-panel').css({ 'display': 'block' })
                $('.form-login').css('animation', 'animatezoombig 0.6s')
                $('.form-login').show()
                setTimeout(function () {
                  $('.blurred-panel').css({ 'opacity': '0.4' })
                }, 1)
              });
            </script>";
          }else{
            $checkLogin = 1;
          }
        }
	  if ($checkLogin){
      $_SESSION["id"] = $admin["AdminID"];
      $_SESSION['username'] = $admin["AdminAccount"];
		  header("Location:AdminSystem.php");
    }
}
    
    
?>
<div class="form-login">
    <span onclick="closeButton()" class="close-button" title="Close Modal">&times</span>
    <h4 class="text-center pt-3">Login</h3>
      <form action="" method="post">
        <div class="form-group ">
          <input type="text" class="form-control form-control-lg" placeholder="Username" name="username" required>
        </div>

        <div class="form-group">
          <input type="password" class="form-control form-control-lg" placeholder="Password" name="password" required>
        </div>
        <div class="form-group">
          <input type="submit" value="login" class="form-control form-control-lg text-uppercase"
            style="background-color:rgba(100, 198, 237, 0.795)">
        </div>
        <div class="error" style ="font-weight:bold"><?php echo $error ; ?></div>
      </form>
  </div>
  <button class="blurred-panel" onclick="closeButton()"></button>

  <script>
    $("#login").click(function () {
      $(".blurred-panel").css({ "display": "block" })
      $(".form-login").css("animation", "animatezoombig 0.6s")
      $(".form-login").show()
      setTimeout(function () {
        $(".blurred-panel").css({ "opacity": "0.4" })
      }, 1)
    })

    function closeButton() {
      $(".error").remove();
      $(".form-login").css("animation", "animatezoomsmall 0.6s forwards")
      $(".blurred-panel").css({ "opacity": "0" })
      setTimeout(function () {
        $(".blurred-panel").css({ "display": "none" })
        $(".form-login").hide();
      }, 600)

    }
  </script>