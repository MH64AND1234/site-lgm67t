<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Navbar with Animated Background</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />

  
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

   
    <style>
        
        body {
            margin: 0;
            padding: 0;
            background-color: black;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            color: #ffffff; 
        }

        
        .animated-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('/public/assets/css/vpn.png') no-repeat center center fixed;
            background-size: cover;
            z-index: -1; 
        }

 
        .navbar-blue {
            background: rgba(0, 0, 0, 0.8); 
            backdrop-filter: blur(15px);
            border-bottom: 2px solid #1e90ff; 
            position: relative;
            box-shadow: 0 4px 15px rgba(30, 144, 255, 0.3); 
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffffff !important;
            transition: transform 0.3s ease, color 0.3s ease;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
        }

        .navbar-brand:hover {
            transform: scale(1.1);
            color: #1e90ff !important; 
        }

        .navbar-brand i {
            margin-right: 10px;
            font-size: 1.5rem;
            color: #1e90ff; 
        }

        .nav-link {
            color: #ffffff !important;
            transition: color 0.3s ease, transform 0.3s ease;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            position: relative;
        }

        .nav-link i {
            margin-right: 8px;
            font-size: 1.2rem;
            color: #1e90ff; 
        }

        .nav-link:hover {
            color: #1e90ff !important; 
            transform: translateY(-3px);
        }

        
        .dropdown-menu {
            background: rgba(0, 0, 0, 0.9); 
            border: 2px solid #1e90ff; 
            box-shadow: 0 4px 15px rgba(30, 144, 255, 0.3);
            animation: fadeIn 0.3s ease;
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

        .dropdown-item {
            color: #ffffff !important;
            transition: background 0.3s ease, transform 0.3s ease;
            display: flex;
            align-items: center;
            padding: 10px 15px;
        }

        .dropdown-item i {
            margin-right: 8px;
            font-size: 1rem;
            color: #1e90ff; 
        }

        .dropdown-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(10px);
        }

        
        .btn-outline-light {
            border-radius: 25px;
            transition: all 0.3s ease;
            color: #ffffff;
            border-color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .btn-outline-light::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 255, 255, 0.1);
            transform: translate(-50%, -50%) scale(0);
            border-radius: 50%;
            transition: transform 0.5s ease;
        }

        .btn-outline-light:hover::after {
            transform: translate(-50%, -50%) scale(1);
        }

        .btn-outline-light:hover {
            background: #1e90ff; 
            color: black !important;
            transform: scale(1.1);
        }

        
        .navbar-toggler-icon-custom {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(0, 0, 0, 0.6); 
            border: 2px solid #1e90ff; 
            border-radius: 50%; 
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .navbar-toggler-icon-custom:hover {
            background-color: #1e90ff; 
            transform: scale(1.1); 
        }

        .navbar-toggler-icon-custom::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1); 
            transform: translate(-50%, -50%) scale(0);
            border-radius: 50%;
            transition: transform 0.5s ease;
        }

        .navbar-toggler-icon-custom:hover::after {
            transform: translate(-50%, -50%) scale(1);
        }

        .toggler-icon {
            width: 24px;
            height: 24px;
            filter: brightness(0) invert(1); 
            transition: transform 0.3s ease;
        }

        .navbar-toggler-icon-custom:hover .toggler-icon {
            transform: rotate(90deg); 
        }
    </style>
</head>
<body>
    

   
    <header>
        <nav class="navbar navbar-expand-md navbar-blue shadow-sm align-middle" style="background-image: url('/public/assets/css/vpn.png')">
            <div class="container px-3">
                <a class="navbar-brand animate__animated animate__fadeInLeft" href="<?= site_url() ?>">
                    <i class="bi bi-stars"></i> <?= BASE_NAME ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                   
                    <span class="navbar-toggler-icon-custom">
                        <img src="https://cdn-icons-png.flaticon.com/512/1828/1828817.png" alt="Menu Icon" class="toggler-icon" />
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php if (session()->has('userid')) : ?>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item animate__animated animate__fadeInDown">
                                <a class="nav-link text-white" href="<?= site_url('dashboard') ?>">
                                    <i class="fas fa-home"></i> Home
                                </a>
                            </li>
                            <li class="nav-item animate__animated animate__fadeInDown">
                                <a class="nav-link text-white" href="<?= site_url('keys') ?>">
                                    <i class="fas fa-key"></i> License
                                </a>
                            </li>
                            <li class="nav-item animate__animated animate__fadeInDown">
                                <a class="nav-link text-white" href="<?= site_url('keys/generate') ?>">
                                    <i class="fas fa-plus-circle"></i> Generate
                                </a>
                            </li>
                        </ul>
                        <div class="float-right">
                            <ul class="text-center navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="text-center nav-item dropdown animate__animated animate__fadeInRight">
                                    <a class="text-center nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-user-circle"></i> <?= getName($user) ?>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start" aria-labelledby="navbarDropdown" style="background-image: url('/public/assets/css/vpn.png')">
                                        <li>
                                            <a class="text-center dropdown-item" href="https://t.me/I_2023">
                                                <i class="fas fa-code"></i> DvE
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?= site_url('settings') ?>">
                                                <i class="fas fa-cog"></i> Settings
                                            </a>
                                        </li>
                                        <?php if ($user->level == 1) : ?>
                                            <li class="dropdown-item text-muted">Administrator</li>
                                            <li>
                                                <a class="dropdown-item" href="<?= site_url('Server') ?>">
                                                    <i class="fas fa-server"></i> Server Online
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?= site_url('memory') ?>">
                                                    <i class="fas fa-memory"></i> BT & Memory
                                                </a>
                                            </li>
                                            <li>
                                            <?php if (session()->get('userid') == 1) : ?>
                                                <li>
                                                    <a class="dropdown-item" href="<?= site_url('admin/manage-users') ?>">
                                                        <i class="fas fa-users"></i> Manage Users
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="http://www.xmprotect.com/">
                                                        <i class="fas fa-shield-alt"></i> Protect Your Lib
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="<?= site_url('admin/create-referral') ?>">
                                                        <i class="fas fa-user-plus"></i> Create Resseller
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <li>
                                        </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="<?= site_url('file') ?>">
                                                        <i class="fas fa-user-plus"></i> file
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-danger white-text" href="<?= site_url('logout') ?>">
                                                <i class="fas fa-sign-out-alt"></i> EXIT
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- تهيئة AOS -->
    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>

    <!-- تهيئة Particles.js للشريط العلوي -->
    <script>
        particlesJS('particles-js-navbar', {
            particles: {
                number: {
                    value: 30, 
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: '#ffffff' 
                },
                shape: {
                    type: 'star'
                },
                opacity: {
                    value: 0.5,
                    random: true,
                    anim: {
                        enable: true,
                        speed: 1,
                        opacity_min: 0.1,
                        sync: false
                    }
                },
                size: {
                    value: 2, 
                    random: true,
                    anim: {
                        enable: true,
                        speed: 2,
                        size_min: 0.1,
                        sync: false
                    }
                },
                line_linked: {
                    enable: false 
                },
                move: {
                    enable: true,
                    speed: 1, 
                    direction: 'none',
                    random: true,
                    straight: false,
                    out_mode: 'out',
                    bounce: false,
                    attract: {
                        enable: false,
                        rotateX: 600,
                        rotateY: 1200
                    }
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: {
                        enable: true,
                        mode: 'bubble'
                    },
                    onclick: {
                        enable: true,
                        mode: 'push'
                    },
                    resize: true
                },
                modes: {
                    bubble: {
                        distance: 100, 
                        size: 4, 
                        duration: 2,
                        opacity: 0.8,
                        speed: 2
                    },
                    push: {
                        particles_nb: 2
                    }
                }
            },
            retina_detect: true
        });
    </script>
</body>
</html>