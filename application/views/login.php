<style>
    body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
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
            e.preventDefault();
            $.post(this.action,$(this).serialize(), function(data){
                if(data > 0)
                    window.location = "<?php echo site_url(array("portada")) ?>";
                else
                    $("#error").show("fade");
            });
        });
    });
    </script>
<div class="container">
    <form id="login-form" method="post" action="<?php echo site_url(array("log","in")) ?>" class="form-signin" role="form">
    <div id="error" class="alert alert-danger">Email o contraseña invalidos</div>
        <h2 class="form-signin-heading">Ingresar al sistema</h2>
        <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      </form>

    </div>