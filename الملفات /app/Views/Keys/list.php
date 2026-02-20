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

<div class="row justify-content-center animate-fade">
    <div class="col-lg-12">
        <?= $this->include('Layout/msgStatus') ?>
        
        <div class="card mb-4">
            <div class="card-header p-3">
                <div class="row align-items-center">
                    <div class="col pt-1">
                        <i class="fas fa-key" style="color: var(--danger); text-shadow: 0 0 5px var(--glow);"></i> 
                        <strong style="text-shadow: 0 0 3px var(--glow);">Keys Registered</strong>
                    </div>
                    <div class="col text-end">
                        <div class="float-right">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-download" style="text-shadow: 0 0 3px var(--glow);"></i> Open Menu
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start" aria-labelledby="navbarDropdown">
                                        <li>
                                            <a class="dropdown-item" href="<?= site_url('keyz') ?>">
                                                <i class="fas fa-shield-alt"></i> License
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?= site_url('keys/generate') ?>">
                                                <i class="fas fa-plus-circle"></i> Generate
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?= site_url('keys/alter') ?>">
                                                <i class="fas fa-trash-alt"></i> Delete Expired
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?= site_url('keys/deleteKeys') ?>">
                                                <i class="fas fa-trash"></i> Delete All
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?= site_url('keys/start') ?>">
                                                <i class="fas fa-backspace"></i> Delete Not Used
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?= site_url('keys/resetAll') ?>">
                                                <i class="fas fa-sync-alt"></i> Reset All Key
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?= site_url('keys/download/all') ?>">
                                                <i class="fas fa-file-download"></i> Download All Key
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <?php if ($keylist) : ?>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered table-hover text-center" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Game</th>
                                    <th>Registered</th>
                                    <th>User Keys</th>
                                    <th>Devices</th>
                                    <th>Duration</th>
                                    <th>Expired</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                <?php else : ?>
                    <p class="text-center" style="text-shadow: 0 0 3px var(--glow);">Nothing keys to show</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= link_tag("https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css") ?>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= script_tag("https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js") ?>
<?= script_tag("https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js") ?>

<script>
    $(document).ready(function() {
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            order: [[0, "desc"]],
            ajax: "<?= site_url('keys/api') ?>",
            columns: [
                { data: 'id', name: 'id_keys' },
                { data: 'game' },
                {
                    data: 'user_key',
                    render: function(data, type, row, meta) {
                        var is_valid = (row.status == 'Active') ? "text-success" : "text-danger";
                        return `<span class="${is_valid}">${(row.user_key ? row.user_key : '&mdash;')}</span>`;
                    }
                },
                {
                    data: 'devices',
                    render: function(data, type, row, meta) {
                        var totalDevice = (row.devices ? row.devices : 0);
                        return `<span id="devMax-${row.user_key}">${totalDevice}/${row.max_devices}</span>`;
                    }
                },
                { data: 'duration' },
                {
                    data: 'expired',
                    name: 'expired_date',
                    render: function(data, type, row, meta) {
                        return row.expired ? `<span class="badge bg-dark text-white">${row.expired}</span>` : '(not started yet)';
                    }
                },
                {
                    data: null,
                    render: function(data, type, row, meta) {
                        var btnReset = `<button class="btn btn-outline-warning btn-sm" onclick="resetUserKey('${row.user_key}')"
                            data-bs-toggle="tooltip" data-bs-placement="left" title="Reset key?"><i class="fas fa-sync-alt"></i></button>`;
                        
                        var btnEdits = `<a href="${window.location.origin}/public/keys/${row.id}" class="btn btn-outline-primary btn-sm"
                            data-bs-toggle="tooltip" data-bs-placement="left" title="Edit key information?"><i class="fas fa-cog"></i></a>`;
                        
                        var btnDelete = `<button class="btn btn-outline-danger btn-sm" onclick="deleteKeys('${row.user_key}')"
                            data-bs-toggle="tooltip" data-bs-placement="left" title="Delete Key?"><i class="fas fa-trash"></i></button>`;

                        return `<div class="d-flex gap-2 justify-content-center">${btnReset} ${btnEdits} ${btnDelete}</div>`;
                    }
                }
            ]
        });
    });

    function deleteKeys(keys) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#8B0000',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete',
            background: 'var(--dark)',
            color: 'white'
        }).then((result) => {
            if (result.isConfirmed) {
                Toast.fire({
                    icon: 'info',
                    title: 'Please wait...'
                })

                var base_url = window.location.origin;
                var api_url = `${base_url}/public/keys/delete`;
                $.getJSON(api_url, {
                    userkey: keys,
                    delete: 1
                },
                function(data, textStatus, jqXHR) {
                    if (textStatus == 'success') {
                        if (data.registered) {
                            if (data.delete) {
                                $(`#devMax-${keys}`).html(`0/${data.devices_max}`);
                                Swal.fire(
                                    'Deleted!',
                                    'Redirecting to Key Dashboard.',
                                    'success'
                                )
                                location.reload()
                            } else {
                                Swal.fire(
                                    'Failed!',
                                    data.devices_total ? "You don't have any access to this user." : "Only Admin can delete the user.",
                                    data.devices_total ? 'error' : 'error'
                                )
                            }
                        } else {
                            Swal.fire(
                                'Failed!',
                                "User key no longer exists.",
                                'error'
                            )
                        }
                    }
                });
            }
        });
    }

    function resetUserKey(keys) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#8B0000',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, reset',
            background: 'var(--dark)',
            color: 'white'
        }).then((result) => {
            if (result.isConfirmed) {
                Toast.fire({
                    icon: 'info',
                    title: 'Please wait...'
                })

                var base_url = window.location.origin;
                var api_url = `${base_url}/public/keys/reset`;
                $.getJSON(api_url, {
                    userkey: keys,
                    reset: 1
                },
                function(data, textStatus, jqXHR) {
                    if (textStatus == 'success') {
                        if (data.registered) {
                            if (data.reset) {
                                $(`#devMax-${keys}`).html(`0/${data.devices_max}`);
                                Swal.fire(
                                    'Reset!',
                                    'Your device key has been reset.',
                                    'success'
                                )
                            } else {
                                Swal.fire(
                                    'Failed!',
                                    data.devices_total ? "You don't have any access to this user." : "User key devices already reset.",
                                    data.devices_total ? 'error' : 'warning'
                                )
                            }
                        } else {
                            Swal.fire(
                                'Failed!',
                                "User key no longer exists.",
                                'error'
                            )
                        }
                    }
                });
            }
        });
    }
</script>

<?= $this->endSection() ?>