<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursus Teknologi Online</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <div class="main-content">
    <!-- Header Section -->
    <header>
        <nav>
            <div class="navbar">
                <a href="#home"><img src="{{asset('images/logo.png')}}" alt="SkillUp Logo" class="logo"></a>
                <ul class="nav-links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#courses">Course</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#contact">Register</a></li>
                </ul>
                <a class="login" href="{{ route('login') }}">Login</a>
            <div>

        </nav>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-content">
            <h1></h1>
            <p>Bimbingan Belajar IT Terbaik se-Bali</p>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="about">
        <div class="about-container">
            <h1>About Us</h1>
            <div id="text-animation" class="text-animation"></div>
            <p>
                SkillUp Course adalah bimbingan belajar tatap muka yang berbasis teknologi. Dirancang untuk menambah skill Anda khususnya dalam bidang Ilmu Teknologi.
            </p>
            <p>
                Kami menyediakan kursus berkualitas tinggi dengan instruktur profesional, sehingga Anda dapat belajar sesuai konsentrasi kebutuhan Anda.
            </p>
        </div>
    </section>

    <!-- About Section -->
    <section id="benefit" class="benefit">
        <div class="benefit-content">
            <h1>Mengapa SkillUp?</h1>
        </div>
    </section>

    <!-- Feature Section -->
    <section id="features">
        <div class="container features">
            <div class="feature-item">
                <div class="feature-icon">
                    <img src="{{asset('images/icon-1.png')}}" alt="Fast Track">
                </div>
                <div class="feature-content">
                    <h3>Fast Track</h3>
                    <p>Offline Class Practical, Support by Mentor</p>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <img src="{{asset('images/icon-2.png')}}" alt="Flexy">
                </div>
                <div class="feature-content">
                    <h3>Flexy</h3>
                    <p>Private Study, Anytime by Learning Materials</p>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <img src="{{asset('images/icon-3.png')}}" alt="Verified">
                </div>
                <div class="feature-content">
                    <h3>Verified</h3>
                    <p>International Certified</p>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <img src="{{asset('images/icon-4.png')}}" alt="Academy">
                </div>
                <div class="feature-content">
                    <h3>Academy</h3>
                    <p>SkillUp's Skill By Intensive Class for 3 Months</p>
                </div>
            </div>
        </div>
        </section>

    <!-- Courses Section -->
    <section id="courses" class="courses">
    <div class="courses-container">
        <h1>Kursus yang Tersedia di SkillUp</h1>
        <p>Berbagai Jenis Pilihan Kursus Sesuai Dengan Kebutuhanmu</p>
    </div>   

    <div class="course-list">
        <!-- Course Links -->
        <div class="course-card">
            <h3>Web Design</h3>
            <p>Learn how to create stunning and responsive websites.</p>
            <a href="web-design.html" class="btn-secondary">Lihat Selengkapnya</a>
        </div>
        <div class="course-card">
            <h3>Cloud Computing</h3>
            <p>Explore cloud technologies and deploy scalable applications.</p>
            <a href="cloud-computing.html" class="btn-secondary">Lihat Selengkapnya</a>
        </div>
        <div class="course-card">
            <h3>Basis Data</h3>
            <p>Understand database design, SQL, and data management.</p>
            <a href="database.html" class="btn-secondary">Lihat Selengkapnya</a>
        </div>
        <div class="course-card">
            <h3>Programming</h3>
            <p>Learn programming languages and algorithms.</p>
            <a href="programming.html" class="btn-secondary">Lihat Selengkapnya</a>
        </div>
        <div class="course-card">
            <h3>UI/UX</h3>
            <p>Master the art of user interface and user experience design.</p>
            <a href="ui-ux.html" class="btn-secondary">Lihat Selengkapnya</a>
        </div>
        <div class="course-card">
            <h3>Web Development</h3>
            <p>Become a full-stack developer with modern web technologies.</p>
            <a href="web-development.html" class="btn-secondary">Lihat Selengkapnya</a>
        </div>
    </div>
    </section>

<!-- Outlet Section -->
<section id="outlet" class="outlet-container">
    <div class="outlet-content">
        <h1>Outlet Kami</h1>
        <p>Tersebar Luas di Bali</p>
        <div class="bali">
            <img src="{{asset('images/bali.png')}}" alt="Peta Bali">
        </div>
        <!-- Grup statistik dalam satu container -->
        <div class="stats">
            <div class="tulisan">
                <h1>50.000+</h1>
                <p>Peserta Kursus</p>
            </div>
            <div class="tulisan">
                <h1>10+</h1>
                <p>Outlet Tersebar di Bali</p>
            </div>
        </div>
    </div>
</section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="contact-container">
            <h1>Hubungi Kami</h1>
            <p></p>
            <form>
                <input type="text" placeholder="Nama Anda" required>
                <input type="email" placeholder="Email" required>
                <textarea placeholder="Pesan Untuk SkillUp Course" rows="4" required></textarea>
                <button type="submit" class="btn-primary">Send</button>
            </form>
        </div>
    </section>
</body>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <p>&copy; Copyright 2024, SkillUp Course. All Rights Reserved</p>
        </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
</html>