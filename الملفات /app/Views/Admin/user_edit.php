<?= $this->extend('Layout/Starter') ?>

<?= $this->section('content') ?>

<style>
    body {  
        background: url('/public/assets/css/vpn.png') no-repeat center center fixed;  
        background-size: cover;  
        font-family: 'Poppins', sans-serif;  
        color: #f0e6d2;  
    }  
    :root {
    --primary: #0A5275;
    --secondary: #117A8B;
    --accent: #00CFFF;
    --dark: #0B2A38;
    --darker: #031B26;
    --light: #E0F7FA;
    --danger: #FF6B6B;
    --glow: rgba(0, 207, 255, 0.7);
}

.card {
    background: rgba(11, 42, 56, 0.8);
    backdrop-filter: blur(15px);
    border-radius: 15px;
    border: 1px solid rgba(224, 247, 250, 0.3);
    box-shadow: 0 10px 30px rgba(0, 207, 255, 0.4);
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 207, 255, 0.6);
}

.card-header {
    background: linear-gradient(135deg, rgba(11, 42, 56, 0.6), rgba(17, 122, 139, 0.3));
    border-bottom: 1px solid rgba(224, 247, 250, 0.3);
    color: var(--light);
    position: relative;
}

.card-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--accent), transparent);
}

.info-item {
    background: rgba(0, 79, 102, 0.3);
    border: 1px solid rgba(224, 247, 250, 0.2);
    border-radius: 12px;
    margin-bottom: 10px;
    padding: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all 0.3s ease;
    color: var(--light);
}

.info-item:hover {
    background: rgba(0, 79, 102, 0.5);
    transform: translateX(5px);
}

.info-label {
    display: flex;
    align-items: center;
    font-size: 14px;
}

.info-value {
    font-weight: 700;
    font-size: 16px;
    text-shadow: 0 0 5px var(--glow);
}

.badge-count {
    font-size: 18px;
    font-weight: 700;
    padding: 5px 10px;
    border-radius: 20px;
    text-shadow: 0 0 3px var(--glow);
}

.icon {
    margin-right: 10px;
    font-size: 18px;
    color: var(--light);
}
</style>

<div class="row justify-content-center pt-3">
    <div class="col-lg-8">
        <?= $this->include('Layout/msgStatus') ?>
    </div>
    <div class="col-lg-8 mb-3">
        <div class="card mb-5">
            <div class="card-header p-3 h5">
                <i class="fas fa-user-edit"></i> Edit Account &middot; <?= getName($target) ?>
            </div>
            <div class="card-body">
                <?= form_open() ?>
                <input type="hidden" name="user_id" value="<?= $target->id_users ?>">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= old('username') ?: $target->username ?>">
                        <?php if ($validation->hasError('username')) : ?>
                            <small class="text-danger"><?= $validation->getError('username') ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="fullname" class="form-label">Fullname</label>
                        <input type="text" name="fullname" id="fullname" class="form-control" value="<?= old('fullname') ?: $target->fullname ?>">
                        <?php if ($validation->hasError('fullname')) : ?>
                            <small class="text-danger"><?= $validation->getError('fullname') ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="level" class="form-label">Roles</label>
                        <?php $sel_level = ['' => '&mdash; Select Roles &mdash;', '1' => 'Admin', '2' => 'Reseller']; ?>
                        <?= form_dropdown(['class' => 'form-select', 'name' => 'level', 'id' => 'level'], $sel_level, $target->level) ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <?php $sel_status = ['' => '&mdash; Select Status &mdash;', '0' => 'Banned/Block', '1' => 'Active']; ?>
                        <?= form_dropdown(['class' => 'form-select', 'name' => 'status', 'id' => 'status'], $sel_status, $target->status) ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="saldo" class="form-label">Saldo</label>
                        <input type="number" name="saldo" id="saldo" class="form-control" value="<?= old('saldo') ?: $target->saldo ?>">
                        <?php if ($validation->hasError('saldo')) : ?>
                            <small class="text-danger"><?= $validation->getError('saldo') ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="uplink" class="form-label">Uplink</label>
                        <input type="text" name="uplink" id="uplink" class="form-control" value="<?= old('uplink') ?: $target->uplink ?>">
                        <?php if ($validation->hasError('uplink')) : ?>
                            <small class="text-danger"><?= $validation->getError('uplink') ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-12 mt-4">
                        <button type="submit" class="btn btn-outline-dark py-2 px-4">
                            <i class="fas fa-save"></i> Update Account
                        </button>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>

        <p class="text-center">
            <a href="<?= site_url('admin/manage-users') ?>" class="text-decoration-none">
                <i class="fas fa-arrow-left"></i> Back to Manage Users
            </a>
        </p>
    </div>
</div>

<?= $this->endSection() ?>