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

<div class="row">
    <div class="col-lg-12">
        <?= $this->include('Layout/msgStatus') ?>
    </div>
    <div class="col-lg-4 mb-3">
        <div class="card">
            <div class="card-header p-3">
                <h5 class="m-0"><i class="fas fa-fire"></i> Generate <?= $title ?></h5>
            </div>
            <div class="card-body">
                <?= form_open() ?>
                <div class="form-group mb-3">
                    <label for="set_saldo" class="mb-2">Set Saldo Amount</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-coins"></i></span>
                        <input type="number" class="form-control" name="set_saldo" id="set_saldo" min="1" max="99999999999" value="5">
                    </div>
                    <?php if ($validation->hasError('set_saldo')) : ?>
                        <small class="text-danger mt-1 d-block"><i class="fas fa-exclamation-circle"></i> <?= $validation->getError('set_saldo') ?></small>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-dark btn-block py-2">
                        <i class="fas fa-bolt"></i> Create Code
                    </button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <?php if ($code) : ?>
            <div class="card">
                <div class="card-header p-3">
                    <h5 class="m-0"><i class="fas fa-history"></i> History Generate - Total <?= $total_code ?></h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Referral Code</th>
                                    <th>Saldo</th>
                                    <th>Used by</th>
                                    <th>Created by</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($code as $c) : ?>
                                    <tr>
                                        <td><?= $c->id_reff ?></td>
                                        <td><code><?= substr($c->code, 1, 15) ?></code></td>
                                        <td>$<?= $c->set_saldo ?></td>
                                        <td><?= $c->used_by ?: '<span class="text-muted">&mdash;</span>' ?></td>
                                        <td><?= $c->created_by ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>