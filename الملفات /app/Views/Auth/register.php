<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>VIP PANEL - Register</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
    user-select: none;
}
body {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: url('/public/assets/css/f77e96865e41dba9d5f86f9ae99df161.jpg') no-repeat center center fixed;
    background-size: cover;
}
.container {
    width: 90%;
    max-width: 400px;
    padding: 40px 30px;
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid rgba(255, 255, 255, 0.5);
    border-radius: 20px;
    backdrop-filter: blur(10px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
}
.title {
    color: white;
    text-align: center;
    font-size: 2em;
    margin-bottom: 30px;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
}
.form-group {
    margin-bottom: 25px;
    position: relative;
}
.form-group i {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: rgba(255,255,255,0.7);
    font-size: 18px;
}
.form-control {
    width: 100%;
    padding: 15px 20px 15px 45px;
    border: 2px solid rgba(255,255,255,0.2);
    background: rgba(255,255,255,0.1);
    border-radius: 10px;
    color: white;
    font-size: 16px;
    outline: none;
    transition: all 0.3s ease;
}
.form-control:focus {
    border-color: white;
    background: rgba(255,255,255,0.15);
}
.form-control::placeholder {
    color: rgba(255,255,255,0.7);
}
.toggle-container {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    color: white;
    margin-bottom: 25px;
}
.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 30px;
    margin-right: 10px;
}
.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}
.slider {
    position: absolute;
    cursor: pointer;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(255,255,255,0.2);
    transition: .4s;
    border-radius: 34px;
}
.slider:before {
    position: absolute;
    content: "";
    height: 22px;
    width: 22px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
}
input:checked + .slider {
    background: #2196F3;
}
input:checked + .slider:before {
    transform: translateX(30px);
}
.btn-submit {
    width: 100%;
    padding: 15px;
    border: none;
    border-radius: 10px;
    background: white;
    color: #8a2be2;
    font-size: 18px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
}
.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}
.register-link {
    text-align: center;
    margin-top: 20px;
    color: white;
    font-size: 16px;
}
.register-link a {
    color: white;
    text-decoration: none;
    font-weight: 600;
    margin-left: 5px;
}
.register-link a:hover {
    text-decoration: underline;
}
.msg { color:white; text-align: center; }
.telegram-icon {
    position: fixed;
    bottom: 5px; left: 5px;
    background: transparent;
    padding: 15px;
    border-radius: 50%;
    transition: all 0.3s ease;
    z-index: 1000;
}
.telegram-icon a { color: white; text-decoration: none; }
.telegram-icon i { font-size: 50px; }
.telegram-icon:hover { transform: scale(1.1); }
</style>
</head>
<body>
<div class="telegram-icon">
    <a href="https://telegram.me/Android_Engine_Owner" target="_blank">
        <i class="fab fa-telegram"></i>
    </a>
</div>

<div class="container">
    <div class="msg">
        <h2><?= $this->include('Layout/msgStatus') ?></h2>
    </div>
    <h2 class="title">Register Account</h2>

    <?= form_open() ?>
        <div class="form-group">
            <i class="fas fa-user"></i>
            <input type="text" class="form-control" name="username" placeholder="Enter Username" minlength="4" maxlength="111" value="<?= old('username') ?>" required>
        </div>

        <div class="form-group">
            <i class="fas fa-lock"></i>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required minlength="5">
        </div>

        <div class="form-group">
            <i class="fas fa-lock"></i>
            <input type="password" class="form-control" name="password2" placeholder="Confirm Password" required minlength="5">
        </div>

        <div class="form-group">
            <i class="fas fa-user-plus"></i>
            <input type="text" class="form-control" name="referral" placeholder="Referral" required minlength="3">
        </div>

        <div class="toggle-container">
            <label class="switch">
                <input type="checkbox" name="stay_login">
                <span class="slider"></span>
            </label>
            <span>Stay logged in</span>
        </div>

        <button type="submit" class="btn-submit">Register Now</button>
    <?= form_close() ?>

    <div class="register-link">
        Already have an account? <a href="<?= site_url('login') ?>">Login Here</a>
    </div>
</div>

<script>
document.querySelectorAll('.form-control').forEach(input => {
    input.addEventListener('focus', function() { this.parentElement.style.transform = 'scale(1.02)'; });
    input.addEventListener('blur', function() { this.parentElement.style.transform = 'scale(1)'; });
});
</script>
</body>
</html>