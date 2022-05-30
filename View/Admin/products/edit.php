<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="./public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./Public/Admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once './View/Admin/inc/sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once './View/Admin/inc/topbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Admin Panel</h1>
                        <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i>Add Product</a>
                    </div>

                    <!-- Content Row -->
                    <form method="post">
                        <input type="hidden" name="controller" value="productController">
                        <input type="hidden" name="page" value="update">
                        <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product name:</label>
                            <input name="name" type="text" class="form-control" id="cat" value="<?php echo $product->name; ?>"aria-describedby="" placeholder="Enter name">
                          
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product price:</label>
                            <input name="price" type="text" class="form-control" id="cat" value="<?php echo $product->price; ?>"aria-describedby="" placeholder="Enter price">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product quantity:</label>
                            <input name="quantity" type="text" class="form-control" id="cat" value="<?php echo $product->quantity; ?>"aria-describedby="" placeholder="Enter quantity">
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product description:</label>
                            <input name="image" images="images" type="text" class="form-control" id="cat" aria-describedby="" placeholder="Enter images" value="<?php echo $product->image; ?>">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; My Website 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="./View/public/Admin/vendor/jquery/jquery.min.js"></script>
    <script src="./View/public/Admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./View/public/Admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./View/public/Admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="./View/public/Admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="./View/public/Admin/js/demo/chart-area-demo.js"></script>
    <script src="./View/public/Admin/js/demo/chart-pie-demo.js"></script>

</body>

</html>