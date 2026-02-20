<?php if (session()->getFlashdata('msgDanger')) : ?>
    <div class="alert alert-danger fade show animate__animated animate__fadeInDown" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i> <?= session()->getFlashdata('msgDanger') ?>
    </div>
<?php elseif (session()->getFlashdata('msgSuccess')) : ?>
    <div class="alert alert-success fade show animate__animated animate__fadeInDown" role="alert">
        <i class="fas fa-check-circle me-2"></i> <?= session()->getFlashdata('msgSuccess') ?>
    </div>
<?php elseif (session()->getFlashdata('msgWarning')) : ?>
    <div class="alert alert-warning fade show animate__animated animate__fadeInDown" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i> <?= session()->getFlashdata('msgWarning') ?>
    </div>
<?php else : ?>
    <?php if (session()->has('userid')) : ?>
        <?php if (isset($messages)) : ?>
            <div class="alert alert-<?= $messages[1] ?> fade show animate__animated animate__fadeInDown" role="alert">
                <i class="fas fa-info-circle me-2"></i> <?= $messages[0] ?>
            </div>
        <?php else : ?>
            <div class="alert alert-secondary fade show animate__animated animate__fadeInDown" role="alert">
                <i class="fas fa-user me-2"></i> Welcome <?= getName($user) ?>
            </div>
        <?php endif; ?>
    <?php else : ?>
        <div class="alert alert-secondary alert-dismissible fade show animate__animated animate__fadeInDown" role="alert">
            <i class="fas fa-hand-wave me-2"></i> Welcome Stranger
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
<?php endif; ?>