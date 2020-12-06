<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
   <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Resturant and Menu List</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Resturant and Menu List</li>
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
                                <h4 class="card-title">Resturant and Menu List</h4>
                                <h6 class="card-subtitle">List of all resturant and menu</h6>
                                <h6 class="card-title m-t-40"><i
                                        class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Resturant List</h6>
                                        <?php if(!empty($resturant)): ?>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($resturant as $res) : ?>
                                            <tr>
                                                <th scope="row"><?= esc($res['resid']) ?></th>
                                                <td><?= esc($res['resname']) ?></td>
                                                <td><?= esc($res['email']) ?></td>
                                                <td><a href="/edit/resturant/<?= esc($res['resid']) ?>" class="btn btn-info">Edit</a><a href="/delete/resturant/<?= esc($res['resid']) ?>" class="btn btn-danger">Delete</a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                            <?php else: ?>
                                                No resturant
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <h6 class="card-title"><i
                                        class="m-r-5 font-18 mdi mdi-numeric-2-box-multiple-outline"></i> Menu List</h6>
                            </div>
                            <?php if(!empty($menu)): ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Resturant</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($menu as $menus) : ?>
                                        <tr>
                                            <th scope="row"><?= esc($menus['id']) ?></th>
                                            <td><?= esc($menus['menu_name']) ?></td>
                                            <td><?= esc($menus['resname']) ?></td>
                                            <td><a href="/edit/menu/<?= esc($menus['id']) ?>" class="btn btn-info">Edit</a><a href="/delete/menu/<?= esc($menus['id']) ?>" class="btn btn-danger">Delete</a>  | <a class="btn btn-success" href="/add/menu/<?= esc($menus['id']) ?>">Add item</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                        <?php else: ?>
                                                No Menu
                                            <?php endif; ?>
                                    </tbody>
                                </table>
                                <h6 class="card-title"><i
                                        class="m-r-5 font-18 mdi mdi-numeric-2-box-multiple-outline"></i> Menu Item List</h6>
                            </div>
                            <?php if(!empty($items)): ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Menu</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($items as $item) : ?>
                                        <tr>
                                            <th scope="row"><?= esc($item['id']) ?></th>
                                            <td><?= esc($item['name']) ?></td>
                                            <td><?= esc($item['menu_name']) ?></td>
                                            <td><a href="/edit/item/<?= esc($item['id']) ?>" class="btn btn-info">Edit</a><a href="/delete/item/<?= esc($item['id']) ?>" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                        <?php else: ?>
                                                No Menu
                                            <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <h6 class="card-title"><i
                                        class="m-r-5 font-18 mdi mdi-numeric-2-box-multiple-outline"></i> Purchase</h6>
                            </div>
                            <?php if(!empty($orders)): ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($orders as $item) : ?>
                                        <tr>
                                            <th scope="row"><?= esc($item['id']) ?></th>
                                            <td><?= esc($item['product_name']) ?></td>
                                            <td>N <?= esc($item['product_price']) ?></td>
                                            <td><?= esc($item['status']) ?></td>
                                            <td><a href="/edit/update/<?= esc($item['id']) ?>" class="btn btn-info">update</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                        <?php else: ?>
                                                No Menu
                                            <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
<?= $this->endSection() ?>