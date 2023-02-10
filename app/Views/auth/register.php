<?= $this->extend('layouts/base') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
           <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                        <?php if(isset($validation)):?>
                            <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                        <?php endif;?>
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form method="POST" action="<?= base_url('register/save')?>">
                            <?= csrf_field()?>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        placeholder="Username" name="username">
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                    placeholder="Email Address" name="email">
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password" name="password">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleRepeatPassword" placeholder="Repeat Password" name="confirm_password">
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </form>
                        <br>
                        <div class="text-center">
                            <a class="small text-decoration-none" href="<?= base_url()?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>