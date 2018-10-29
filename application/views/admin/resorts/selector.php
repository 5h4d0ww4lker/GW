<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>2hagerbet | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/css/bootstrap.min.css" type="text/css"/>
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/AdminLTE.css" type="text/css"/>
    <!-- iCheck -->
    <link href="../../plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css"/>


</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html">Login</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Choose  Account Type</p>
<div class="row">

                <div>

                    <a href=<?php echo site_url('admin_controller/login') ?> class="btn-flat btn-block btn btn-primary bg-orange-active" class="text-bold">Hotel</a>

                    <a href=<?php echo site_url('hag70178731nikki5362045182basepath66321097reac/login') ?> class="btn-flat btn-block btn btn-primary bg-maroon-active" class="text-bold">Resort</a>
                    <a href=<?php echo site_url('gadmin_controller/login') ?> class="btn-flat btn-block btn btn-primary bg-purple-active" class="text-bold">Guest House</a>
                    <a href=<?php echo site_url('radmin_controller/login') ?> class="btn-flat btn-block btn btn-primary bg-green-active" class="text-bold">Restaurant</a>
                    <a href=<?php echo site_url('cadmin_controller/login') ?> class="btn-flat btn-block btn btn-primary bg-red-active" class="text-bold">Club</a>



                </div>
            </div>
        </form>


        <!-- /.social-auth-links -->

        <a href="#">I forgot my password</a><br>
        <a href=<?php echo site_url('admin_controller/register') ?>>|Register</a>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.1.3 -->
<script src="../../plugins/jQuery/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>