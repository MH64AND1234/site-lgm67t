<?= $this->extend('Layout/Starter') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<style>
body {
    background: linear-gradient(0.97turn, #3399ff, #2a2225, #3366cc);
    background-color: #000;
    color: #fff;
    overflow-x: hidden;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    min-height: 100vh;
}

.card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 8px 30px rgba(0, 0, 0, .2);
    transition: .3s;
    overflow: hidden;
}

.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, .3);
}

.card-header {
    background: linear-gradient(270deg, #330000, #ff0000, #990000, #ff3300);
    background-size: 600% 600%;
    color: #fff;
    font-weight: bold;
    border-radius: 20px 20px 0 0;
    text-align: center;
    padding: 15px;
    animation: gradientMove 8s ease infinite;
    border-bottom: none;
}

@keyframes gradientMove {
    0% {
        background-position: 0% 50%
    }

    50% {
        background-position: 100% 50%
    }

    100% {
        background-position: 0% 50%
    }
}

.list-group-item {
    background: rgba(255, 255, 255, .05);
    border: 1px solid rgba(255, 255, 255, .1);
    color: #fff;
    transition: all 0.3s ease;
}

.list-group-item:hover {
    background: rgba(255, 255, 255, .1);
    transform: translateX(5px);
}

.badge {
    font-size: 0.9em;
    padding: 5px 10px;
    border-radius: 10px;
}

.btn-danger {
    background: linear-gradient(45deg, #ff416c, #ff4b2b);
    border: none;
    transition: all 0.3s ease;
}

.btn-danger:hover {
    background: linear-gradient(45deg, #ff4b2b, #ff416c);
    transform: scale(1.05);
}

.btn-warning {
    background: linear-gradient(45deg, #ffa726, #ff9800);
    border: none;
    color: #000;
    transition: all 0.3s ease;
}

.btn-warning:hover {
    background: linear-gradient(45deg, #ff9800, #ffa726);
    transform: scale(1.05);
}

.btn-success {
    background: linear-gradient(45deg, #00b09b, #96c93d);
    border: none;
    transition: all 0.3s ease;
}

.btn-success:hover {
    background: linear-gradient(45deg, #96c93d, #00b09b);
    transform: scale(1.05);
}

/* أنميشن للملفات الجديدة */
.file-item {
    animation: fadeIn 0.3s ease-in;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* تحسين شكل الأزرار */
.copy-btn,
.delete-btn {
    transition: all 0.3s ease;
    min-width: 50px;
}

.copy-btn:hover {
    transform: scale(1.05);
}

.delete-btn:hover {
    transform: scale(1.05);
}

/* تحسين شريط التمرير */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(45deg, #ff416c, #ff4b2b);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(45deg, #ff4b2b, #ff416c);
}

/* تحسين إشعارات الرفع */
#uploadMessage {
    border-radius: 10px;
    border: none;
    animation: slideDown 0.3s ease;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* تحسين حقل اختيار الملف */
.form-control {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #fff;
    border-radius: 10px;
    padding: 10px 15px;
}

.form-control:focus {
    background: rgba(255, 255, 255, 0.15);
    border-color: rgba(255, 65, 108, 0.5);
    box-shadow: 0 0 0 0.25rem rgba(255, 65, 108, 0.25);
    color: #fff;
}

.form-control::file-selector-button {
    background: linear-gradient(45deg, #ff416c, #ff4b2b);
    border: none;
    color: white;
    padding: 8px 15px;
    border-radius: 5px;
    margin-right: 10px;
    transition: all 0.3s ease;
}

.form-control::file-selector-button:hover {
    background: linear-gradient(45deg, #ff4b2b, #ff416c);
}

/* تحسين الـ spinner */
.spinner-border {
    width: 1rem;
    height: 1rem;
    border-width: 0.15em;
}

/* تحسين عرض اسم الملف */
.file-name {
    max-width: 180px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* تحسين النصوص */
.text-muted {
    color: rgba(255, 255, 255, 0.6) !important;
}
</style>

<?= $this->include('Layout/msgStatus') ?>

<?php
$uid = session()->get('id');
$path = FCPATH . 'uploads/' . $uid . '/';

/* جلب الملفات بطريقة صحيحة */
$files = [];
if (is_dir($path)) {
    $files = array_values(
        array_filter(scandir($path), function ($f) use ($path) {
            return $f !== '.' && $f !== '..' && is_file($path . $f);
        })
    );
}
?>

<div class="container-fluid py-4">
    <div class="row animate__animated animate__fadeInUp">

        <!-- ================= IP PANEL ================= -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <i class="bi bi-laptop"></i> Panel Logged on this IP
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>IP Address</span>
                            <span class="badge bg-danger">
                                <span id="gfg">Loading...</span>
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>User ID</span>
                            <span class="badge bg-info"><?= esc($uid) ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Session Status</span>
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle"></i> Active
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- ================= FILE UPLOAD ================= -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <i class="bi bi-upload"></i> File Upload
                </div>
                <div class="card-body d-flex flex-column">
                    <!-- Form بدون إعادة تحميل -->
                    <form id="uploadForm" enctype="multipart/form-data" class="mb-3">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <input type="file" name="file" id="fileInput" class="form-control" required>
                            <small class="form-text text-muted">Max file size: 100MB</small>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-danger w-100" id="uploadBtn">
                                <span id="uploadText">
                                    <i class="bi bi-cloud-upload"></i> Upload
                                </span>
                                <span id="uploadSpinner" class="spinner-border spinner-border-sm d-none" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </span>
                            </button>
                        </div>
                    </form>

                    <!-- رسائل حالة الرفع -->
                    <div id="uploadMessage" class="alert d-none mb-3"></div>

                    <!-- قائمة الملفات -->
                    <div id="filesList" class="mt-auto">
                        <h6 class="text-center mb-2">
                            <i class="bi bi-files"></i> Uploaded Files
                            <span class="badge bg-secondary" id="fileCount"><?= count($files) ?></span>
                        </h6>
                        <ul class="list-group" style="max-height: 220px; overflow-y: auto;">
                            <?php if (!empty($files)): ?>
                                <?php foreach ($files as $file): ?>
                                    <?php
                                    $filePath = $path . $file;
                                    $fileSize = file_exists($filePath) ? filesize($filePath) : 0;
                                    $fileSizeFormatted = format_filesize($fileSize);
                                    ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center file-item"
                                        data-filename="<?= esc($file) ?>">
                                        <div class="d-flex flex-column">
                                            <span class="file-name text-truncate" style="max-width: 150px;">
                                                <i class="bi bi-file-earmark"></i> <?= esc($file) ?>
                                            </span>
                                            <small class="text-muted"><?= $fileSizeFormatted ?></small>
                                        </div>
                                        <div class="d-flex gap-1">
                                            <button class="btn btn-sm btn-warning copy-btn"
                                                data-url="<?= base_url('uploads/' . $uid . '/' . rawurlencode($file)) ?>"
                                                title="Copy URL">
                                                <i class="bi bi-clipboard"></i>
                                            </button>
                                            <a href="<?= base_url('uploads/' . $uid . '/' . rawurlencode($file)) ?>"
                                                class="btn btn-sm btn-info"
                                                target="_blank"
                                                title="Download"
                                                download>
                                                <i class="bi bi-download"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger delete-btn"
                                                data-filename="<?= esc($file) ?>"
                                                title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="list-group-item text-center text-muted no-files">
                                    <i class="bi bi-inbox"></i> No files uploaded yet
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= USERS / KEYS ================= -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <i class="bi bi-people"></i> User's and Key Details
                </div>
                <div class="card-body">
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>
                                <i class="bi bi-key"></i> Total Keys
                            </span>
                            <span class="badge bg-danger"><?= $keysAll ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>
                                <i class="bi bi-key-fill text-warning"></i> Sold Keys
                            </span>
                            <span class="badge bg-warning"><?= $usedKeys ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>
                                <i class="bi bi-key text-success"></i> Unused Keys
                            </span>
                            <span class="badge bg-success"><?= $unusedKeys ?></span>
                        </li>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>
                                <i class="bi bi-person"></i> Total Users
                            </span>
                            <span class="badge bg-info"><?= $userAll ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>
                                <i class="bi bi-person-check"></i> Active Users
                            </span>
                            <span class="badge bg-success"><?= $userAll ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- ================= SERVER INFO ================= -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <i class="bi bi-server"></i> Server Information
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>PHP Version</span>
                            <span class="badge bg-primary"><?= phpversion() ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>CodeIgniter</span>
                            <span class="badge bg-primary"><?= CodeIgniter\CodeIgniter::CI_VERSION ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Upload Max Size</span>
                            <span class="badge bg-info"><?= ini_get('upload_max_filesize') ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Memory Limit</span>
                            <span class="badge bg-info"><?= ini_get('memory_limit') ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // جلب IP
    $.getJSON("https://api.ipify.org?format=json", function(data) {
        $("#gfg").html('<i class="bi bi-globe"></i> ' + data.ip);
    }).fail(function() {
        $("#gfg").html('<i class="bi bi-x-circle"></i> Not Available');
    });

    // رفع الملفات باستخدام AJAX
    $('#uploadForm').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        var fileInput = $('#fileInput')[0].files[0];

        if (!fileInput) {
            showMessage('Please select a file first!', 'warning');
            return;
        }

        // التحقق من حجم الملف (100MB كحد أقصى)
        if (fileInput.size > 100 * 1024 * 1024) {
            showMessage('File size exceeds 100MB limit!', 'danger');
            return;
        }

        // إظهار حالة التحميل
        $('#uploadBtn').prop('disabled', true);
        $('#uploadText').html('<i class="bi bi-hourglass-split"></i> Uploading...');
        $('#uploadSpinner').removeClass('d-none');

        $.ajax({
            url: '<?= base_url("upload/upload") ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    showMessage(
                        '<i class="bi bi-check-circle"></i> ' + response.message,
                        'success'
                    );
                    addFileToList(response.filename, response.file_url);
                    resetForm();
                    updateFileCount();
                } else {
                    showMessage(
                        '<i class="bi bi-x-circle"></i> ' + response.message,
                        'danger'
                    );
                }
            },
            error: function(xhr, status, error) {
                showMessage(
                    '<i class="bi bi-exclamation-triangle"></i> Upload failed: ' + error,
                    'danger'
                );
            },
            complete: function() {
                // إعادة تفعيل الزر
                $('#uploadBtn').prop('disabled', false);
                $('#uploadText').html('<i class="bi bi-cloud-upload"></i> Upload');
                $('#uploadSpinner').addClass('d-none');
            }
        });
    });

    // حذف الملف باستخدام AJAX
    $(document).on('click', '.delete-btn', function() {
        var filename = $(this).data('filename');
        var listItem = $(this).closest('.file-item');

        if (!confirm('Are you sure you want to delete "' + filename + '"?')) {
            return;
        }

        // عرض حالة الحذف
        var deleteBtn = $(this);
        var originalHtml = deleteBtn.html();
        deleteBtn.html('<span class="spinner-border spinner-border-sm"></span>');
        deleteBtn.prop('disabled', true);

        $.ajax({
            url: '<?= base_url("upload/delete") ?>',
            type: 'POST',
            data: {
                '<?= csrf_token() ?>': '<?= csrf_hash() ?>',
                uid: '<?= $uid ?>',
                file: filename
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    showMessage(
                        '<i class="bi bi-check-circle"></i> ' + response.message,
                        'success'
                    );
                    listItem.remove();
                    updateFileCount();

                    // إذا لم يعد هناك ملفات
                    if ($('.file-item').length === 0) {
                        $('#filesList ul').html(
                            '<li class="list-group-item text-center text-muted no-files">' +
                            '<i class="bi bi-inbox"></i> No files uploaded yet' +
                            '</li>'
                        );
                    }
                } else {
                    showMessage(
                        '<i class="bi bi-x-circle"></i> ' + response.message,
                        'danger'
                    );
                    deleteBtn.html(originalHtml);
                    deleteBtn.prop('disabled', false);
                }
            },
            error: function() {
                showMessage(
                    '<i class="bi bi-exclamation-triangle"></i> Delete failed',
                    'danger'
                );
                deleteBtn.html(originalHtml);
                deleteBtn.prop('disabled', false);
            }
        });
    });

    // نسخ رابط الملف
    $(document).on('click', '.copy-btn', function() {
        var url = $(this).data('url');
        var copyBtn = $(this);
        var originalHtml = copyBtn.html();

        navigator.clipboard.writeText(url).then(function() {
            copyBtn.html('<i class="bi bi-check"></i>');
            copyBtn.removeClass('btn-warning').addClass('btn-success');

            setTimeout(function() {
                copyBtn.html(originalHtml);
                copyBtn.removeClass('btn-success').addClass('btn-warning');
            }, 2000);
        }, function() {
            showMessage(
                '<i class="bi bi-exclamation-triangle"></i> Failed to copy URL',
                'warning'
            );
        });
    });

    // دالة لإظهار الرسائل
    function showMessage(message, type) {
        var alertDiv = $('#uploadMessage');
        alertDiv.removeClass('d-none alert-success alert-danger alert-warning alert-info')
                .addClass('alert-' + type)
                .html(message);

        // إخفاء الرسالة بعد 5 ثواني
        setTimeout(function() {
            alertDiv.addClass('d-none');
        }, 5000);
    }

    // دالة لإضافة ملف جديد للقائمة
    function addFileToList(filename, fileUrl) {
        // إزالة الرسالة "لا توجد ملفات" إذا كانت موجودة
        $('.no-files').remove();

        // إضافة الملف الجديد للقائمة
        var fileItem = $(
            '<li class="list-group-item d-flex justify-content-between align-items-center file-item" data-filename="' + filename + '">' +
            '<div class="d-flex flex-column">' +
            '<span class="file-name text-truncate" style="max-width: 150px;">' +
            '<i class="bi bi-file-earmark"></i> ' + filename +
            '</span>' +
            '<small class="text-muted">' + formatBytes(0) + '</small>' +
            '</div>' +
            '<div class="d-flex gap-1">' +
            '<button class="btn btn-sm btn-warning copy-btn" data-url="' + fileUrl + '" title="Copy URL">' +
            '<i class="bi bi-clipboard"></i>' +
            '</button>' +
            '<a href="' + fileUrl + '" class="btn btn-sm btn-info" target="_blank" title="Download" download>' +
            '<i class="bi bi-download"></i>' +
            '</a>' +
            '<button class="btn btn-sm btn-danger delete-btn" data-filename="' + filename + '" title="Delete">' +
            '<i class="bi bi-trash"></i>' +
            '</button>' +
            '</div>' +
            '</li>'
        );

        $('#filesList ul').prepend(fileItem);
    }

    // دالة لإعادة تعيين الفورم
    function resetForm() {
        $('#uploadForm')[0].reset();
    }

    // دالة لتحديث عدد الملفات
    function updateFileCount() {
        var count = $('.file-item').length;
        $('#fileCount').text(count);
    }

    // دالة لتنسيق حجم الملفات
    function formatBytes(bytes, decimals = 2) {
        if (bytes === 0) return '0 Bytes';
        
        const k = 1024;
        const dm = decimals < 0 ? 0 : decimals;
        const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
        
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        
        return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
    }

    // تحديث عدد الملفات عند التحميل
    updateFileCount();
});
</script>

<?php
// دالة مساعدة لتنسيق حجم الملفات
function format_filesize($bytes, $decimals = 2) {
    if ($bytes === 0) return '0 Bytes';
    
    $k = 1024;
    $dm = $decimals < 0 ? 0 : $decimals;
    $sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    
    $i = floor(log($bytes) / log($k));
    
    return number_format($bytes / pow($k, $i), $dm) . ' ' . $sizes[$i];
}
?>

<?= $this->endSection() ?>