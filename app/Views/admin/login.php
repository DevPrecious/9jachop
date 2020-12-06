<?= $this->extend('admin/layouts/log') ?>

<?= $this->section('content') ?>

<div class="container">
	<div class="row">
     <div class="col-12">
         <div class="card card-body">
         			<?php if(isset($validation)): ?>
		<div class="alert alert-danger"><?= $validation->listErrors() ?></div>
		<?php endif; ?>
                   <h4 class="card-title">Admin</h4>
             <h5 class="card-subtitle"> Login to access dashboard </h5>
             <form class="form-horizontal m-t-30" method="post" action="">
                       <div class="form-group">
                     <label for="example-email">Email <span class="help"> e.g.
                                            "example@gmail.com"</span></label>
                     <input type="text" name="email" id="example-email" class="form-control"
                         placeholder="Email" value="<?= set_value('email') ?>">
                                </div>
                       <div class="form-group">
                     <label>Password</label>
                       <input type="password" placeholder="**********" name="password" class="form-control">
                 </div>
                 <button type="submit" class="btn btn-primary">Login</button>
</div>

<?= $this->endSection() ?>