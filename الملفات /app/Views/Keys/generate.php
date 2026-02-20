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

.card-header {
    background: linear-gradient(270deg, #330000, #ff0000, #990000, #ff3300);
    background-size: 600% 600%;
    color: var(--light);
    position: relative;
    border-bottom: 1px solid rgba(224, 247, 250, 0.3);
    animation: gradientMove 8s ease infinite, glow 2s ease-in-out infinite alternate;
    box-shadow: 0 0 10px #ff0000, 0 0 20px #ff0000, 0 0 30px #ff0000;
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

@keyframes gradientMove {
    0% {background-position: 0% 50%;}
    50% {background-position: 100% 50%;}
    100% {background-position: 0% 50%;}
}

@keyframes glow {
    from { box-shadow: 0 0 10px #ff0000, 0 0 20px #ff0000, 0 0 30px #ff0000; }
    to { box-shadow: 0 0 20px #ff3300, 0 0 40px #ff3300, 0 0 60px #ff3300; }
}
</style>

<!-- Blood drips -->
<div class="blood-drip" style="left: 10%; animation-delay: 0s;"></div>
<div class="blood-drip" style="left: 20%; animation-delay: 2s;"></div>
<div class="blood-drip" style="left: 30%; animation-delay: 4s;"></div>
<div class="blood-drip" style="left: 70%; animation-delay: 1s;"></div>
<div class="blood-drip" style="left: 80%; animation-delay: 3s;"></div>
<div class="blood-drip" style="left: 90%; animation-delay: 5s;"></div>

<div class="row justify-content-center animate-fade">
    <div class="col-lg-6">
        <?= $this->include('Layout/msgStatus') ?>
        <?php if (session()->getFlashdata('user_key')) : ?>
            <div class="alert alert-success" role="alert">
                <i class="fas fa-gamepad"></i> Game: <?= session()->getFlashdata('game') ?> / <?= session()->getFlashdata('duration') ?> Days<br>
                <i class="fas fa-key"></i> License: <strong class="key-sensi"><?= session()->getFlashdata('user_key') ?></strong><br>
                <i class="fas fa-mobile-alt"></i> Available for <?= session()->getFlashdata('max_devices') ?> Devices<br>
                <small>
                    <i class="fas fa-info-circle"></i> Duration will start when license login.<br>
                    <i class="fas fa-wallet"></i> Saldo Reduce:
                    <span class="text-danger">-<?= session()->getFlashdata('fees') ?>$</span>
                    (Total left <?= $user->saldo ?>$)
                </small>
            </div>
        <?php endif; ?>
        
        <div class="card mb-4">
            <div class="card-header p-3">
                <div class="row align-items-center">
                    <div class="col pt-1">
                        <i class="fas fa-key"></i> Create License
                    </div>
                    <div class="col text-end">
                        <a class="btn btn-sm btn-outline-primary" href="<?= site_url('keys') ?>">
                            <i class="fas fa-list"></i> View All
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <?= form_open() ?>
                    <div class="row">
                        <div class="form-group col-lg-6 mb-3">
                            <label for="game" class="form-label"><i class="fas fa-gamepad"></i> Games</label>
                            <?= form_dropdown(['class' => 'form-select', 'name' => 'game', 'id' => 'game'], $game, old('game') ?: '') ?>
                            <?php if ($validation->hasError('game')) : ?>
                                <small class="text-danger"><i class="fas fa-exclamation-circle"></i> <?= $validation->getError('game') ?></small>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group col-lg-6 mb-3">
                            <label for="max_devices" class="form-label"><i class="fas fa-mobile-alt"></i> Max Devices</label>
                            <input type="number" name="max_devices" id="max_devices" class="form-control" placeholder="1" value="<?= old('max_devices') ?: 1 ?>">
                            <?php if ($validation->hasError('max_devices')) : ?>
                                <small class="text-danger"><i class="fas fa-exclamation-circle"></i> <?= $validation->getError('max_devices') ?></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="duration" class="form-label"><i class="fas fa-clock"></i> Duration</label>
                        <?= form_dropdown(['class' => 'form-select', 'name' => 'duration', 'id' => 'duration'], $duration, old('duration') ?: '') ?>
                        <?php if ($validation->hasError('duration')) : ?>
                            <small class="text-danger"><i class="fas fa-exclamation-circle"></i> <?= $validation->getError('duration') ?></small>
                        <?php endif; ?>
                        </div>
                    
                    <div class="form-group mb-3">
                        <label for="loopcount" class="form-label"><i class="fas fa-layer-group"></i> Bulk Keys</label>
                        <select class="form-select" name="loopcount">
                            <option value="1">1 Key</option>
                            <option value="2">5 Keys</option>
                            <option value="3">10 Keys</option>
                            <option value="4">50 Keys</option>
                            <option value="5">100 Keys</option>
                        </select>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="estimation" class="form-label"><i class="fas fa-calculator"></i> Estimation</label>
                        <input type="text" id="estimation" class="form-control" placeholder="Your order will total" readonly>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-key"></i> Generate License
                        </button>
                    </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    $(document).ready(function() {
        var price = JSON.parse('<?= $price ?>');
        getPrice(price);
        
        $("#max_devices, #duration, #game").change(function() {
            getPrice(price);
        });
        
        function getPrice(price) {
            var device = $("#max_devices").val();
            var durate = $("#duration").val();
            var gprice = price[durate];
            
            if (gprice != NaN) {
                var result = (device * gprice);
                $("#estimation").val(result + "$");
            } else {
                $("#estimation").val('Estimation error');
            }
        }
        
        // Add blood drips dynamically
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