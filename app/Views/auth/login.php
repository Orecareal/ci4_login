<?= $this->extend('layouts/base')?>
<?= $this->section('content')?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <?php if(session()->getFlashdata('msg')):?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                            <?php endif;?>
                            <h1 class="h4 text-gray-900 mb-4">Sign In!</h1>
                        </div>
                        <form method="POST" action="<?= base_url('login/auth')?>">
                            <?= csrf_field() ?>
                            <div class="form-group mb-3">
                                <input type="email" class="form-control"
                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                    placeholder="Enter Email Address" name="email">
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" class="form-control"
                                    id="exampleInputPassword" placeholder="Password" name="password">
                            </div>
                            <!-- <div class="form-group mb-3">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                            </div> -->
                            <div class="d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <br>
                        <div class="text-center">
                            <a class="small text-decoration-none" href="<?= base_url('register') ?>">Create an Account!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>