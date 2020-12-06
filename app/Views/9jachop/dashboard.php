<?= $this->extend('admin/layouts/user') ?>

<?= $this->section('content') ?>
   <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Orders or Purchases List</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Orders or Purchases Listt</li>
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
                        <div class="card">
                            <div class="card-body">
                                <?php if (session()->get('success')) : ?>
                              <div class="alert alert-success">
                                  <?= session()->get('success') ?>
                              </div>
                        <?php endif; ?>
                                <h4 class="card-title">Orders or Purchases List</h4>
                                <h6 class="card-subtitle">Lists</h6>
                                <h6 class="card-title m-t-40"><i
                                        class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Orders List</h6>
                                        <?php if(!empty($orders)): ?>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Product Price</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($orders as $res) : ?>
                                            <tr>
                                                <th scope="row"><?= esc($res['id']) ?></th>
                                                <td><?= esc($res['product_name']) ?></td>
                                                <td>N <?= esc($res['product_price']) ?></td>
                                                <td><?= esc($res['status']) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                            <?php else: ?>
                                                You havent made any orders
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
<?= $this->endSection() ?>