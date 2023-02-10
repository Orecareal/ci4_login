<?= $this->extend('layouts/base')?>
<?= $this->section('content')?>
<h1>Hello, <?= Session()->get('user_name'); ?></h1>
<form action="<?= base_url('auth/logout')?>" method="POST">
    <?= csrf_field() ?>
    <button class="btn btn-danger" type="submit">Log Out</button>
</form>
<?= $this->endSection()?>