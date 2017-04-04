 <!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Đăng nhập hệ thống</title>
    <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/login/css/css.css">
    <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/login/css/normalize.css">
      <link rel="stylesheet" href="<?php echo ADMIN_URL ?>/login/css/style.css">
      <style type="text/css" media="screen">
        .error{
          font-size: 13px;color: red;
        }
      </style>
</head>
<?php if (isset($_GET['kt'])) {
  $kt=$_GET['kt'];
  echo "<script type='text/javascript'> alert('$kt')</script>";
} ?>
  <body>
<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
     console.log(response);

    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
     
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      alert(" The person is logged into Facebook, but not your app");
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      alert("The person is not logged into Facebook,");
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

   window.fbAsyncInit = function() {
    FB.init({
      appId      : '1650059948637487',
      xfbml      : true,
      version    : 'v2.8'
    });
  };

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
 (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));


  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me?fields=id,name,email,first_name', function(response) {
      //console.log(response);
      console.log(JSON.stringify(response));
      //console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML ='Thanks for logging in, ' + response.name + '!';
    });
  }




  FB.login(function(response) {
  if (response.status === 'connected') {
    // Logged into your app and Facebook.
    console.log(JSON.stringify(response));

  } else if (response.status === 'not_authorized') {
    // The person is logged into Facebook, but not your app.
    alert("The person is logged into Facebook, but not your app.")
  } else {
    // The person is not logged into Facebook, so we're not sure if
    // they are logged into this app or not.
    alert("The person is not logged into Facebook");
  }
});



  function lougout(){

      FB.getLoginStatus(function(response) {
        if (response && response.status === 'connected') {
            FB.logout(function(response) {
              document.location.reload();
            });
        }
    });
}
</script>

    <div class="form">
      
      <ul class="tab-group">
       <li class="tab active"><a href="#login" >Log In</a></li>
         <li class="tab "><a href="#signup" disabled="disabled">Register</a></li> 
       <li> <fb:login-button scope="email,public_profile,user_friends" onlogin="checkLoginState();">login
</fb:login-button>

<div id="status">
</div></li>
<li><button onclick="lougout()">lougout</button></li>
      </ul>
      
      <div class="tab-content">
       <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="../admin/admin_login/login" method="post">
          
            <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="username"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password"/>
          </div>
          
          <p class="forgot"><a href="/admin/admin_login/forgot">Forgot Password?</a></p>
          
          <input type="submit" class="button button-block" name="login" value="Log In" />
          
          </form>

        </div>
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="../admin/admin_login/register" method="post" id="register">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name="first_name"/>
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name="last_name" />
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" name="username" />
          </div>
          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name="email" />
          </div>
         
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="password" />
          </div>
          
           <input type="submit" class="button button-block" name="Register" value="Register" />
          
          </form>

        </div>
        
       
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
        <script src="<?php echo ADMIN_URL ?>/login/js/jquery.min.js"></script>
        <script src="<?php echo ADMIN_URL ?>/login/js/index.js"></script> 
        <script src="<?php echo ADMIN_URL ?>/js/jquery.validate.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function() {
            $.validator.addMethod("letters", function(value, element) {
                return this.optional(element) || value == value.match(/^[a-zA-Z_0-9]+$/);
            }, "Letters and underscore only.");
            $.validator.addMethod("checkLogin", function(value, element) {
                var result = false;
                $.ajax({
                    type: "POST",
                    async: false,
                    url: "/admin/admin_user/check_login", // script to validate in server side
                    data: {
                        username: value
                    },
                    success: function(data) {
                        alert(data);
                        //result = (data==true)?true:false;
                        if (data == true) {
                            result = true;
                        } else {
                            result = false;
                        }
                      console.log(result)
                    }
                });
                // return true if username is exist in database
                return result;
            }, "Tên đăng nhập đã tồn tại, Vui lòng nhập tên khác");
            // validete form index_user
            $("#register").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 8,
                        maxlength: 36,
                        checkLogin: true,
                        letters: true,
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 36
                    },
                    first_name: {
                        required: true,

                    },
                    last_name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    }
                },
                messages: {
                    username: {
                        required: "<span class='validate'>Hãy nhập Tên Đăng Nhập của bạn !</span>",
                        minlength: "<span class='validate'>Ít nhất là 8 ký tự</span>",
                        maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
                        checkUserName: "<span class='validate'>Tên đăng nhập đã tồn tại</span>",
                        letters: "<span class='validate'>Tên đăng nhập chỉ được nhập ký tự, số và dấu gạch dưới</span>"
                    },
                    password: {
                        required: "<span class='validate'>Hãy nhập Mật khẩu của bạn !</span>",
                        minlength: "<span class='validate'>Ít nhất là 8 ký tự</span>",
                        maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>"
                    },
                    first_name: {
                        required: "<span class='validate'>Hãy nhập Họ Tên của bạn !</span>",

                    },
                    last_name: {
                        required: "<span class='validate'>Nhập last_name</span>",
                    },
                    email: {
                        required: "<span class='validate'>Bạn phải nhập email</span>",
                        email: "<span class='validate'>Email phải đúng dạng abc@abc.xyz</span>",
                    }
                }
            });
        });
        </script>
        
  </body>
</html>


