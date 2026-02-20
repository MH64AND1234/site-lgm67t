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

<div class="particles"></div>
<div class="glow-effect glow-1"></div>
<div class="glow-effect glow-2"></div>

<div class="container animate-fade" style="padding-top: 2rem; padding-bottom: 2rem;">
    <div class="row">
        <div class="col-lg-12">
            <?= $this->include('Layout/msgStatus') ?>
        </div>
        
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-key"></i> Change Password</h5>
                </div>
                <div class="card-body">
                    <?= form_open() ?>
                        <input type="hidden" name="password_form" value="1">
                        
                        <div class="form-group">
                            <label for="current">
                                <i class="fas fa-lock"></i>
                                Current Password
                            </label>
                            <i class="input-icon fas fa-lock"></i>
                            <input type="password" name="current" id="current" class="form-control" placeholder="Current Password">
                            <?php if ($validation->hasError('current')) : ?>
                                <small class="text-danger">
                                    <i class="fas fa-exclamation-circle"></i> <?= $validation->getError('current') ?>
                                </small>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="password">
                                <i class="fas fa-lock"></i>
                                New Password
                            </label>
                            <i class="input-icon fas fa-lock"></i>
                            <input type="password" name="password" id="password" class="form-control" placeholder="New Password">
                            <?php if ($validation->hasError('password')) : ?>
                                <small class="text-danger">
                                    <i class="fas fa-exclamation-circle"></i> <?= $validation->getError('password') ?>
                                </small>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="password2">
                                <i class="fas fa-lock"></i>
                                Confirm Password
                            </label>
                            <i class="input-icon fas fa-lock"></i>
                            <input type="password" name="password2" id="password2" class="form-control" placeholder="Confirm Password">
                            <?php if ($validation->hasError('password2')) : ?>
                                <small class="text-danger">
                                    <i class="fas fa-exclamation-circle"></i> <?= $validation->getError('password2') ?>
                                </small>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group" style="margin-top: 2rem;">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-sync-alt"></i> Change Password
                            </button>
                        </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-user"></i> Account Information</h5>
                </div>
                <div class="card-body">
                    <?= form_open() ?>
                        <input type="hidden" name="fullname_form" value="1">
                        
                        <div class="form-group">
                            <label for="fullname">
                                <i class="fas fa-user-tag"></i>
                                Full Name
                            </label>
                            <i class="input-icon fas fa-user-tag"></i>
                            <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Your Full Name" value="<?= old('fullname') ?: ($user->fullname ?: '') ?>">
                            <?php if ($validation->hasError('fullname')) : ?>
                                <small class="text-danger">
                                    <i class="fas fa-exclamation-circle"></i> <?= $validation->getError('fullname') ?>
                                </small>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group" style="margin-top: 2rem;">
                            <button type="submit" class="btn btn-dark">
                                <i class="fas fa-save"></i> Update Account
                            </button>
                        </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>