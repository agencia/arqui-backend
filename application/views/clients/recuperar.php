<style>
    body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}
.login-contenedor{
    width: 100%;
max-width: 360px;
margin: 0px auto;
}
.login-content{
      background-color: white;
  -o-box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
  -ms-box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
  -moz-box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
  -webkit-box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
  box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
}
.textbox-wrap {
  padding: 20px 20px 20px 15px;
  border-left: 5px solid transparent;
  -moz-transition: border-left-color 0.5s, box-shadow 0.5s, background-color 0.5s;
  -o-transition: border-left-color 0.5s, box-shadow 0.5s, background-color 0.5s;
  -webkit-transition: border-left-color 0.5s, box-shadow 0.5s, background-color 0.5s;
  transition: border-left-color 0.5s, box-shadow 0.5s, background-color 0.5s;
}
.textbox-wrap .input-group {
  border: 1px solid #e0e0e0;
  background-color: #ffffff;
}
.section-title {
  padding: 10px 20px;
  background-color: white;
}
.section-title h3 {
  color: #3498db;
}
.clearfix:before
.clearfix:after {
  content: " ";
  /* 1 */


  /* 2 */

}
.clearfix:after {
  clear: both;
}
.login-form-section {
  width: 100%;
  max-width: 360px;
  margin: 0 auto;
}
.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
#error {
    display: none;
}
</style>
<script>
    $(function(){
        $("#login-form").submit(function(e){
            if (document.getElementById('password1').value != document.getElementById('password2').value) {
                document.getElementById('password1').setCustomValidity('Los Passwords no son iguales.');
            } else {
                document.getElementById('password1').setCustomValidity('');
            }
        });
        
    });
    </script>

    <script src="<?php echo base_url() ?>js/login/modernizr.js"></script>
    <link href="<?php echo base_url() ?>css/login/preview.css" rel="stylesheet" type="text/css">
<div class="container">
<!--    <form id="login-form" method="post" action="<?php echo site_url(array("log","in")) ?>" class="form-signin" role="form">
    <div id="error" class="alert alert-danger">Email o contraseña invalidos</div>
        <h2 class="form-signin-heading">Ingresar al sistema</h2>
        <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      </form>-->

       

   
<form id="login-form" method="post" action="<?php echo site_url(array("log","update")) ?>" role="form">
     <div id="error" class="alert alert-danger">Email o contraseña invalidos</div>
            <div class="login-contenedor">
                <div class="login-content  animated bounceIn" data-animation="bounceIn">
                    <form>
                        <div class="section-title">
                            <h3>Cambiar Contraseña</h3>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="glyphicon glyphicon-user"></i></span>
                                <input required="required" name="email" class="form-control" placeholder="Email" type="text">
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="glyphicon glyphicon-lock"></i></span>
                                <input required="required" name="password" id="password1" class="form-control " placeholder="Nuevo Password" type="password">
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="glyphicon glyphicon-lock"></i></span>
                                <input required="required" id="password2" class="form-control " placeholder="Repita Password" type="password">
                            </div>
                        </div>
                        <div class="login-form-action clearfix"  style="padding:3%;">
                            <input type="hidden" name="token" value="<?php echo $token ?>" />
                            <button type="submit" class="btn btn-primary pull-right">Ingresar  <i class="glyphicon glyphicon-chevron-right"></i></button>
                        </div>
                    </form>
                </div>
               
            </div></div>
</form>


        </div>
  
    </div>