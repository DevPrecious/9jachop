 <?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Create Resturant</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Create Resturant</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-body">
                            <?php if(isset($validation)): ?>
                                <div class="alert alert-danger">
                                    <?= $validation->listErrors() ?>
                                </div>
                            <?php endif; ?>
                            
                            <h4 class="card-title">Create Resturant</h4>
                            <h5 class="card-subtitle">Create Resturant </h5>
                            <form class="form-horizontal m-t-30" method="post" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Resturant Name</label>
                                    <input type="text" value="<?= esc($resturant['resname']) ?>" name="name"  class="form-control" placeholder="9jachop">
                                </div>
                                <div class="form-group">
                                    <label for="example-email">Email <span class="help"> e.g.
                                            "example@gmail.com"</span></label>
                                    <input type="email" value="<?= esc($resturant['email']) ?>" id="" name="email"  class="form-control"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <input type="number" value="<?= esc($resturant['phone']) ?>" name="number" class="form-control" placeholder="Number">
                                </div>
                                <div class="form-group">
                                    <label>Open hours</label>
                                    <input type="number" value="<?= esc($resturant['openh']) ?>" name="openhour" class="form-control" placeholder="Open hour">
                                </div>
                                <div class="form-group">
                                    <label>Close hours</label>
                                    <input type="number" name="closehour" value="<?= esc($resturant['closeh']) ?>" class="form-control" placeholder="Close hour">
                                </div>
                                <div class="form-group">
                                    <label>Open days</label>
                                    <select name="openday" class="custom-select col-12" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Profile or Logo</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input name="theFile" type="file" class="form-control" id="inputGroupFile01">
                                            
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Nice admin. Designed and Developed by
                <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
<?= $this->endSection() ?>