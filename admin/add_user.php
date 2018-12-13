<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {   redirect("login.php");   }?>
<?php

    $user = new User();
    if (isset($_POST['create'])) {
        if ($user) {
         $user->username = $_POST['username'];
         $user->first_name = $_POST['first_name'];
         $user->last_name = $_POST['last_name'];
         $user->password = $_POST['password'];
         $user->set_file($_FILES['file']);
         $user->save_user_image();
         $user->save();
         $session->message("The User {$user->username} has been Added");
         redirect("users.php");
        }
    }

?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->

    <?php include("includes/top_nav.php"); ?>

    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

    <?php include("includes/side_nav.php"); ?>

    <!-- /.navbar-collapse -->

</nav>

<div id="page-wrapper">

    <!-- <?php //include("includes/admin_content.php"); ?> -->

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    users
                    <small>Subheading</small>
                </h1>
                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="col-md-8 col-md-offset-">
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" name="file">
                        </div> 
                        <div class="form-group">
                            <label for="username">User Name:</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" name="first_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="create" value="Add User" class="btn btn-primary">
                        </div>                   

                </form>




            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>