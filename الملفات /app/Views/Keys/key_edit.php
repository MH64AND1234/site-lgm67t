<?= $this->extend('Layout/Starter') ?>
<?= $this->section('content') ?>

<style>
    body {  
        background: url('/public/assets/css/vpn.png') no-repeat center center fixed;  
        background-size: cover;  
        font-family: 'Poppins', sans-serif;  
        color: #f0e6d2;  
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
        color: #f0e6d2;
        position: relative;
    }

    .card-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 1px;
        background: linear-gradient(90deg, transparent, #00CFFF, transparent);
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
        color: #f0e6d2;
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
        text-shadow: 0 0 5px rgba(0, 207, 255, 0.7);
    }

    .badge-count {
        font-size: 18px;
        font-weight: 700;
        padding: 5px 10px;
        border-radius: 20px;
        text-shadow: 0 0 3px rgba(0, 207, 255, 0.7);
    }

    .icon {
        margin-right: 10px;
        font-size: 18px;
        color: #f0e6d2;
    }
</style>

<div class="blood-drip" style="left: 10%; animation-delay: 0s;"></div>
<div class="blood-drip" style="left: 20%; animation-delay: 2s;"></div>
<div class="blood-drip" style="left: 30%; animation-delay: 4s;"></div>
<div class="blood-drip" style="left: 70%; animation-delay: 1s;"></div>
<div class="blood-drip" style="left: 80%; animation-delay: 3s;"></div>
<div class="blood-drip" style="left: 90%; animation-delay: 5s;"></div>


    <div class="col-lg-8 mb-3">
        <div class="card">
            <div class="card-header p3">
                <div class="row">
                    <div class="col pt-1">
                        <i class="fas fa-key"></i> KEY INFORMATION
                    </div>
                    <div class="col">
                        <div class="text-end">
                            <a class="btn btn-sm btn-outline-light" href="<?= site_url('keys/generate') ?>"><i class="bi bi-person-plus"></i></a>
                            <a class="btn btn-sm btn-outline-light" href="<?= site_url('keys') ?>"><i class="bi bi-people"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= form_open('keys/edit') ?>
                <div class="row">
                    <input type="hidden" name="id_keys" value="<?= $key->id_keys ?>">
                    <?php if ($user->level == 1) : ?>
                        <div class="col-lg-6 mb-3">
                            <label for="game" class="form-label">GAMES</label>
                            <input type="text" name="game" id="game" class="form-control" placeholder="RandomKey" aria-describedby="help-game" value="<?= old('game') ?: $key->game ?>">
                            <?php if ($validation->hasError('game')) : ?>
                                <small id="help-game" class="text-danger"><?= $validation->getError('game') ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="user_key" class="form-label">USER KEY</label>
                            <input type="text" name="user_key" id="user_key" class="form-control" placeholder="RandomKey" aria-describedby="help-user_key" value="<?= old('user_key') ?: $key->user_key ?>">
                            <?php if ($validation->hasError('user_key')) : ?>
                                <small id="help-user_key" class="text-danger"><?= $validation->getError('user_key') ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="duration" class="form-label">DURATION<small class="text-muted">[IN DAYS]</small></label>
                            <input type="number" name="duration" id="duration" class="form-control" placeholder="3" aria-describedby="help-duration" value="<?= old('duration') ?: $key->duration ?>">
                            <?php if ($validation->hasError('duration')) : ?>
                                <small id="help-duration" class="text-danger"><?= $validation->getError('duration') ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="max_devices" class="form-label">MAX DEVICES</label>
                            <input type="number" name="max_devices" id="max_devices" class="form-control" placeholder="3" aria-describedby="help-max_devices" value="<?= old('max_devices') ?: $key->max_devices ?>">
                            <?php if ($validation->hasError('max_devices')) : ?>
                                <small id="help-max_devices" class="text-danger"><?= $validation->getError('max_devices') ?></small>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-6 mb-2" id="col-status">
                        <label for="status" class="form-label">STATUS</label>
                        <?php $sel_status = ['' => '— SELECT STATUS —', '0' => 'BANNED/BLOCK', '1' => 'ACTIVE']; ?>
                        <?= form_dropdown(['class' => 'form-select', 'name' => 'status', 'id' => 'status'], $sel_status, $key->status) ?>
                        <?php if ($validation->hasError('status')) : ?>
                            <small id="help-status" class="text-danger"><?= $validation->getError('status') ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="registrator" class="form-label">REGISTRATOR</label>
                        <input type="text" name="registrator" id="registrator" class="form-control" placeholder="nata" aria-describedby="help-registrator" value="<?= old('registrator') ?: $key->registrator ?>">
                        <?php if ($validation->hasError('registrator')) : ?>
                            <small id="help-registrator" class="text-danger"><?= $validation->getError('registrator') ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="expired_date" class="form-label">EXPIRE<?= !$key->expired_date ? '[NOT STARTED YET]' : ''  ?></label>
                        <input type="text" name="expired_date" id="expired_date" class="form-control" placeholder="<?= $time::now() ?>" aria-describedby="help-expired_date" value="<?= old('expired_date') ?: $key->expired_date ?>">
                        <?php if ($validation->hasError('expired_date')) : ?>
                            <small id="help-expired_date" class="text-danger"><?= $validation->getError('expired_date') ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label for="devices" class="form-label">DEVICES<span class="px-1 rounded maxDev"><?= $key_info->total ?>/<?= $key->max_devices ?></span> <small class="text-muted">[SEPARATELY WITH ENTER]</small></label>
                        <textarea class="form-control" name="devices" id="devices" rows="<?= ($key_info->total > $key->max_devices) ? 3 : $key_info->total ?>"><?= old('devices') ?: ($key_info->total ? $key_info->devices : '') ?></textarea>
                        <?php if ($validation->hasError('devices')) : ?>
                            <small id="help-devices" class="text-danger"><?= $validation->getError('devices') ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6">
                        <button class="btn btn-outline-dark btnUpdate" disabled>UPDATE USER KEY</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    $(document).ready(function() {
        var level = "<?= $user->level ?>";
        if (level != 1) $("#registrator, #expired_date, #devices").attr('disabled', true);
        $("input, select, textarea").change(function() {
            $(".btnUpdate").attr('disabled', false);
        });
        
        var total = "<?= $key_info->total ?>";
        $("#max_devices").change(function() {
            $(".maxDev").html(total + '/' + $(this).val());
            $("#devices").attr('rows', $(this).val());
        });
        
        for (let i = 0; i < 5; i++) {
            const drip = document.createElement('div');
            drip.className = 'blood-drip';
            drip.style.left = Math.random() * 100 + '%';
            drip.style.animationDelay = Math.random() * 5 + 's';
            document.body.appendChild(drip);
        }
    });
</script>
<?= $this->endSection() ?>