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

<div class="blood-drip" style="left: 10%; animation-delay: 0s;"></div>
<div class="blood-drip" style="left: 20%; animation-delay: 2s;"></div>
<div class="blood-drip" style="left: 30%; animation-delay: 4s;"></div>
<div class="blood-drip" style="left: 70%; animation-delay: 1s;"></div>
<div class="blood-drip" style="left: 80%; animation-delay: 3s;"></div>
<div class="blood-drip" style="left: 90%; animation-delay: 5s;"></div>

<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-primary" role="alert">
            <!-- Alert content here -->
        </div>
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white h6 p-3">
                <div class="float-left">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-file-arrow-down-fill"></i> Open Menu
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="<?= site_url('admin/manage-users') ?>">
                                        <i class="bi bi-people"></i> Manage Users
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= site_url('keys/generate') ?>">
                                        <i class="bi bi-shield-x"></i> Generate Keys
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= site_url('admin/user/alter') ?>">
                                        <i class="bi bi-trash-fill"></i> Delete Users
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-hover text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="row">#</th>
                                <th>Username</th>
                                <th>Fullname</th>
                                <th>Level</th>
                                <th>Saldo</th>
                                <th>Status</th>
                                <th>Uplink</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
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
            ajax: "<?= site_url('admin/api/users') ?>",
            columns: [
                { data: 'id' },
                { data: 'username' },
                { 
                    data: 'fullname',
                    render: function(data, type, row, meta) {
                        return (row.fullname ? row.fullname : '~');
                    }
                },
                { data: 'level' },
                { 
                    data: 'saldo',
                    render: function(data, type, row, meta) {
                        var textc = (row.level === 'Admin' ? 'primary' : 'dark');
                        var saldo = (row.level === 'Admin' ? '&mstpos;' : row.saldo);
                        return `<span class="badge text-${textc}">${saldo}</span>`;
                    }
                },
                { 
                    data: 'status',
                    render: function(data, type, row, meta) {
                        var act = `<span class="text-success">Active</span>`;
                        var ban = `<span class="text-danger">Banned</span>`;
                        return (row.status == 1 ? act : ban);
                    }
                },
                { data: 'uplink' },
                { 
                    data: null,
                    render: function(data, type, row, meta) {
                        return `<a href="${window.location.origin}/public/admin/user/${row.id}" class="btn btn-dark btn-sm">EDIT</a> <a href="${window.location.origin}/public/admin/user/singledelete/${row.id}" class="btn btn-dark btn-sm">Delete</a>`; 
                    }
                }
            ]
        });

        // Add more blood drips dynamically
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