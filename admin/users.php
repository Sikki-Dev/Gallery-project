<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {   redirect("login.php");   }?>
<?php

$users = User::find_all();

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
                    Users
                    <!-- <small>Subheading</small> -->
                </h1>
                <p class="bg-success">
                    <?= $message; ?>
                </p>
                <div class="col-md-12">
                    <table class="table table-hover table-bordered table-responsive">
                        <!-- <caption>All users</caption> -->
                        <a href="add_user.php" class="btn btn-primary">Add User</a>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= $user->id ?></td>
                                    <td><img class="img-responsive" src="<?= $user->image_path_and_placeholder(); ?>" width="200" alt="not available"></td>                                          
                                    <td><?= $user->username ?><div class="action_link">
                                        <a href="edit_user.php?id=<?= $user->id; ?>">Edit</a>
                                        <!-- <a href="#">View</a> -->
                                    </div></td>
                                    <td><?= $user->first_name ?></td>
                                    <td><?= $user->last_name ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>