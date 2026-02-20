<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>VIP PANEL - Reset</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<style>
 {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
    -webkit-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

body {
    margin: 0;
    padding: 0;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: url('/public/assets/css/f77e96865e41dba9d5f86f9ae99df161.jpg') 
                no-repeat center center fixed;
    background-size: cover;
}

canvas {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1; 
}

.container {
    width: 90%;
    max-width: 400px;
    padding: 20px 30px;
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid rgba(0, 255, 0, 0.5);
    border-radius: 20px;
    backdrop-filter: blur(3px);
    box-shadow: 0 3px 20px rgba(0,0,0,0.2);
    animation: fadeIn 1s ease forwards;
    position: relative;
    z-index: 1; 
}

.title {
    color: black;
    text-align: center;
    font-size: 2em;
    margin-bottom: 30px;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
}

.form-group {
    margin-bottom: 15px;
    position: relative;
}

.form-group i {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: rgba(255,255,255,0.7);
    font-size: 15px;
}

.form-control {
    width: 100%;
    padding: 15px 5px 15px 15px;
    border: none;
    background: rgba(255,255,255,0.1);
    border-radius: 30px;
    color: green;
    font-size: 16px;
    outline: none;
    transition: all 0.3s ease;
}

.form-control:focus {
    background: rgba(255,255,255,0.15);
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

.switch input { opacity: 0; }

.slider {
    position: absolute;
    cursor: pointer;
    inset: 0;
    background: rgba(255,255,255,0.2);
    transition: .4s;
    border-radius: 34px;
}

.morph-btn {
  position: relative;
  display: block;     
  margin: 30px auto;   
  padding: 20px 100px;

  font-family: "Segoe UI", system-ui, sans-serif;
  font-size: 20px;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: #fff;

  background: #000;
  border: none;
  border-radius: 999px;
  cursor: pointer;
  isolation: isolate;
} 

.morph-btn .btn-fill {
  position: absolute;
  inset: 0;
  background: #0d0d0d;
  border-radius: 50px;
  transition: border-radius 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  z-index: 1;
}

.morph-btn:hover .btn-fill {
  border-radius: 100px;
  animation: jelly 0.5s ease;
}

@keyframes jelly {
  0% {
    transform: scale(1, 1);
  }
  30% {
    transform: scale(1.15, 0.85);
  }
  50% {
    transform: scale(0.9, 1.1);
  }
  70% {
    transform: scale(1.05, 0.95);
  }
  100% {
    transform: scale(1, 1);
  }
}

.morph-btn .orbit-dots {
  position: absolute;
  inset: -30px;
  pointer-events: none;
}

.morph-btn .orbit-dots span {
  position: absolute;
  width: 8px;
  height: 8px;
  background: #0d0;
  border-radius: 50%;
  opacity: 1;
  transition: opacity 0.3s ease;
}

.morph-btn:hover .orbit-dots span {
  opacity: 1;
}

.morph-btn .orbit-dots span:nth-child(1) {
  top: 0;
  left: 50%;
  animation: orbit1 3s linear infinite;
}

.morph-btn .orbit-dots span:nth-child(2) {
  bottom: 0;
  left: 50%;
  animation: orbit2 3s linear infinite;
}

.morph-btn .orbit-dots span:nth-child(3) {
  top: 50%;
  left: 0;
  animation: orbit3 4s linear infinite;
}

.morph-btn .orbit-dots span:nth-child(4) {
  top: 50%;
  right: 0;
  animation: orbit4 4s linear infinite;
}

@keyframes orbit1 {
  0% {
    transform: translateX(-50%) translateY(0) scale(1);
  }
  25% {
    transform: translateX(30px) translateY(10px) scale(0.6);
  }
  50% {
    transform: translateX(-50%) translateY(20px) scale(1);
  }
  75% {
    transform: translateX(-80px) translateY(10px) scale(0.6);
  }
  100% {
    transform: translateX(-50%) translateY(0) scale(1);
  }
}

@keyframes orbit2 {
  0% {
    transform: translateX(-50%) translateY(0) scale(0.6);
  }
  25% {
    transform: translateX(-80px) translateY(-10px) scale(1);
  }
  50% {
    transform: translateX(-50%) translateY(-20px) scale(0.6);
  }
  75% {
    transform: translateX(30px) translateY(-10px) scale(1);
  }
  100% {
    transform: translateX(-50%) translateY(0) scale(0.6);
  }
}

@keyframes orbit3 {
  0% {
    transform: translateY(-50%) translateX(0) scale(0.8);
  }
  50% {
    transform: translateY(-50%) translateX(-15px) scale(1.2);
  }
  100% {
    transform: translateY(-50%) translateX(0) scale(0.8);
  }
}

@keyframes orbit4 {
  0% {
    transform: translateY(-50%) translateX(0) scale(1.2);
  }
  50% {
    transform: translateY(-50%) translateX(15px) scale(0.8);
  }
  100% {
    transform: translateY(-50%) translateX(0) scale(1.2);
  }
}

.morph-btn .btn-text {
  position: relative;
  display: inline-block;
  z-index: 3;
}

.morph-btn .btn-text span {
  display: inline-block;
  transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  transition-delay: calc(var(--i) * 0.03s);
}

.morph-btn:hover .btn-text span {
  transform: translateY(-100%);
  animation: letterBounce 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards;
  animation-delay: calc(var(--i) * 0.03s);
}

@keyframes letterBounce {
  0% {
    transform: translateY(0);
  }
  40% {
    transform: translateY(-120%);
  }
  70% {
    transform: translateY(10%);
  }
  100% {
    transform: translateY(0);
  }
}


.morph-btn .corners span {
  position: absolute;
  width: 20px;
  height: 20px;
  border: 2px solid #0d0;
  transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  opacity: 1;
}

.morph-btn .corners span:nth-child(1) {
  top: -10px;
  left: -10px;
  border-right: none;
  border-bottom: none;
}

.morph-btn .corners span:nth-child(2) {
  top: -10px;
  right: -10px;
  border-left: none;
  border-bottom: none;
}

.morph-btn .corners span:nth-child(3) {
  bottom: -10px;
  left: -10px;
  border-right: none;
  border-top: none;
}

.morph-btn .corners span:nth-child(4) {
  bottom: -10px;
  right: -10px;
  border-left: none;
  border-top: none;
}

.morph-btn:hover .corners span {
  opacity: 1;
}

.morph-btn:hover .corners span:nth-child(1) {
  transform: translate(-5px, -5px) rotate(-5deg);
}

.morph-btn:hover .corners span:nth-child(2) {
  transform: translate(5px, -5px) rotate(5deg);
}

.morph-btn:hover .corners span:nth-child(3) {
  transform: translate(-5px, 5px) rotate(5deg);
}

.morph-btn:hover .corners span:nth-child(4) {
  transform: translate(5px, 5px) rotate(-5deg);
}


.morph-btn .shadow {
  position: absolute;
  inset: 5px;
  background: rgba(13, 180, 13, 0.3);
  border-radius: 4px;
  filter: blur(5px);
  z-index: 0;
  transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  transform: translateY(10px);
}

.morph-btn:hover .shadow {
  border-radius: 50px;
  transform: translateY(15px) scale(1.1);
  filter: blur(20px);
}

.morph-btn:active .btn-fill {
  transform: scale(0.92);
  transition: transform 0.1s ease;
}

.morph-btn:active .shadow {
  transform: translateY(3px) scale(0.85);
  filter: blur(5px);
  opacity: 0.5;
  transition: all 0.1s ease;
}

.morph-btn:active .btn-text {
  transform: scale(0.95);
  transition: transform 0.1s ease;
}

.morph-btn:active .corners span:nth-child(1) {
  transform: translate(-15px, -15px) rotate(-15deg) scale(0.8);
}

.morph-btn:active .corners span:nth-child(2) {
  transform: translate(15px, -15px) rotate(15deg) scale(0.8);
}

.morph-btn:active .corners span:nth-child(3) {
  transform: translate(-1px, 15px) rotate(15deg) scale(0.8);
}

.morph-btn:active .corners span:nth-child(4) {
  transform: translate(5px, 5px) rotate(-15deg) scale(0.8);
}

.morph-btn:active .orbit-dots span {
  animation-play-state: paused;
  transform: scale(1.5);
}


.slider:before {
    content: "";
    height: 22px;
    width: 22px;
    left: 4px;
    bottom: 4px;
    background-color: green;
    position: absolute;
    border-radius: 50%;
    transition: .4s;
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
    transition: .3s ease;
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

.error-message {
    color: #FFD700;
    font-size: 14px;
    margin-top: 5px;
    padding-left: 10px;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.telegram-icon {
    position: fixed;
    bottom: 5px;
    left: 5px;
    background: transparent;
    padding: 15px;
    border-radius: 50%;
    transition: all 0.3s ease;
    z-index: 1000;
}

.telegram-icon a {
    color: white;
    text-decoration: none;
}

.telegram-icon i {
    font-size: 50px;
}

.telegram-icon:hover {
    transform: scale(1.1);
}
</style>
</head>
<body>

<canvas></canvas>

<div class="telegram-icon">
    <a href="https://telegram.me/I_2023" target="_blank">
        <i class="fab fa-telegram"></i>
    </a>
</div>

<div class="container">
    <h2 class="title">𝑲𝑹𝑨𝑺𝑯 𝑷𝑨𝑵𝑬𝑳</h2>

    <?= form_open() ?>
        <div class="form-group">
            <i class="fas fa-user"></i>
            <input type="text" 
                   class="form-control" 
                   name="username" 
                   id="username" 
                   placeholder="Enter Username"
                   minlength="4" 
                   maxlength="111" 
                   value="<?= old('username') ?>" 
                   required>
            <?php if ($validation->hasError('username')) : ?>
                <div class="error-message"><?= $validation->getError('username') ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <i class="fas fa-lock"></i>
            <input type="password" 
                   class="form-control" 
                   name="password" 
                   id="password" 
                   placeholder="Enter Password"
                   required 
                   minlength="5">
            <?php if ($validation->hasError('password')) : ?>
                <div class="error-message"><?= $validation->getError('password') ?></div>
            <?php endif; ?>
        </div>

        <div class="toggle-container">
            <label class="switch">
                <input type="checkbox" name="stay_login">
                <span class="slider"></span>
            </label>
            <span>Stay logged in</span>
        </div>

<button class="morph-btn">
  <span class="btn-fill"></span>
  <span class="shadow"></span>
  <span class="btn-text">
    <span style="--i:0">L</span><span style="--i:1">a</span
    ><span style="--i:2">u</span><span style="--i:3">n</span
    ><span style="--i:4">c</span><span style="--i:5">h</span>
  </span>
  <span class="orbit-dots">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
  </span>
  <span class="corners">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
  </span>
</button>

    <?= form_close() ?>

    <div class="register-link">
        Don't have an account? <a href="<?= site_url('register') ?>">Register</a>
    </div>
        
    <div class="register-link">
        Login problem? <a href="<?= site_url('reset') ?>">Reset here</a>
    </div>
</div>

<script>
document.querySelectorAll('.form-control').forEach(input => {
    input.addEventListener('focus', function() { this.parentElement.style.transform = 'scale(1.02)'; });
    input.addEventListener('blur', function() { this.parentElement.style.transform = 'scale(1)'; });
});
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){ $(window).on("contextmenu",function(e){ return false; }); });
document.onkeydown=function(e){ e=e||window.event; if(e.ctrlKey){ var c=e.which||e.keyCode; switch(c){case 83:case 87:case 73:case 67:case 85:case 80:case 70:e.preventDefault(); e.stopPropagation(); return false;} } if(e.keyCode==123||e.altKey){e.preventDefault(); return false;} };
document.addEventListener('keydown',function(e){ if(e.key==='F12'||(e.ctrlKey&&e.shiftKey&&(e.key==='I'||e.key==='J'||e.key==='C'))){e.preventDefault();} });
document.addEventListener('keydown',function(e){ if(e.ctrlKey&&e.key==='u'){e.preventDefault();} });
$('img').on('dragstart',function(e){ e.preventDefault(); });
$(document).keypress("u",function(e){ if(e.ctrlKey){return false;} });
</script>

<script>
    (function() {
        const canvas = document.querySelector("canvas");
        const ctx = canvas.getContext("2d");
        
        function resize() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        resize();
        window.addEventListener("resize", resize);
        
        const DOTS_COUNT = 160;
        const dots = [];
        
        class Dot {
            constructor() {
                this.reset();
            }
            
            reset() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 3 + 2;  
                this.speedX = (Math.random() - 0.5) * 0.25;
                this.speedY = (Math.random() - 0.5) * 0.25;
                this.alpha = Math.random() * 0.6 + 0.5; 
            }
            
            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                
                if (
                    this.x < -20 ||
                    this.x > canvas.width + 20 ||
                    this.y < -20 ||
                    this.y > canvas.height + 20
                ) {
                    this.reset();
                }
            }
            
            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                
                
                ctx.shadowBlur = 15;
                ctx.shadowColor = "rgba(0, 255, 0, 0.8)";
                
                ctx.fillStyle = `rgba(0, 255, 0, ${this.alpha})`;
                ctx.fill();
                
                ctx.shadowBlur = 0;
            }
        }
        
        for (let i = 0; i < DOTS_COUNT; i++) {
            dots.push(new Dot());
        }
        
        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            dots.forEach(dot => {
                dot.update();
                dot.draw();
            });
            requestAnimationFrame(animate);
        }
        
        animate();
    })();
</script>

</body>
</html>