<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillUp - Ecourse</title>
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
</head>
<body>
    <!-- Header Section -->
    <header>
        <nav>
            <div class="logo">SkillUp Tech</div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#benefit">Benefits</a></li>
                <li><a href="#courses">Course</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-content">
            <h1>Learn Technology For Future</h1>
            <p class="text">Increase your skill using SkillUp Tech!</p>
            <a href="{{ route('login') }}" class="btn-primary">Start Now</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="benefit">
        <div class="container">
            <h2 class="benefit">Our Benefits</h2>
            <p></p>
        </div>
    </section>

    <!-- Feature Section -->
    <section id="features">
    <div class="container features">
        <div class="feature-item">
            <div class="feature-icon" style="background-color: #FF6B35;">
                <img src="img/icon1.png" alt="Fast Track">
            </div>
            <div class="feature-content">
                <h3>Fast Track</h3>
                <p>Live Class Practical, Support by Mentor</p>
            </div>
        </div>
        <div class="feature-item">
            <div class="feature-icon" style="background-color: #E91E63;">
                <img src="img/icon2.png" alt="Flexy">
            </div>
            <div class="feature-content">
                <h3>Flexy</h3>
                <p>Private Study, Anytime by Course Video</p>
            </div>
        </div>
        <div class="feature-item">
            <div class="feature-icon" style="background-color: #2196F3;">
                <img src="img/icon3.png" alt="Verified">
            </div>
            <div class="feature-content">
                <h3>Verified</h3>
                <p>International Certified</p>
            </div>
        </div>
        <div class="feature-item">
            <div class="feature-icon" style="background-color: #673AB7;">
                <img src="img/icon4.png" alt="Academy">
            </div>
            <div class="feature-content">
                <h3>Academy</h3>
                <p>SkillUp's Skill By Intensive Class for 3 Months</p>
            </div>
        </div>
    </div>
    </section>

    <!--card course
    <div id="course-slider" class="w-full">

        {{-- @forelse(@kursuses as $kursus) --}}
        <div class="course-card w-1/3 px-3 pb-[70px] mt-[2px]">
            <div class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[32px] bg-white w-full pb-[10px] overflow-hidden transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">
                <a href="details.html" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                    <img src="assets/thumbnail/thumbnail-1.png" class="w-full h-full object-cover" alt="thumbnail">
                </a>
                <div class="flex flex-col px-4 gap-[10px]">
                    <a href="details.html" class="font-semibold text-lg line-clamp-2 hover:line-clamp-none min-h-[56px]">Modern JavaScript: Bikin Projek Website Seperti Twitter</a>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                        <p class="text-right text-[#6D7786]">32,280 students</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                            <img src="assets/photo/photo1.png" class="w-full h-full object-cover" alt="icon">
                        </div>
                        <div class="flex flex-col">
                            <p class="font-semibold">Angga Risky</p>
                            <p class="text-[#6D7786]">Full-Stack Developer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @empty --}}
        <p>
            Belum ada data kelas terbaru
        </p>
        {{-- @endforelse --}}
    </div>--->

    <!-- Courses Section -->
    <section id="courses">
        <div class="container">
            <h2 class="popular-course">SkillUp's Popular Course</h2>
            <div class="courses-list">
                <div class="course-item">
                    <h3>Web Development</h3>
                    <p></p>
                </div>
                <div class="course-item">
                    <h3>Artificial Intelligence</h3>
                    <p></p>
                </div>
                <div class="course-item">
                    <h3>Data Science</h3>
                    <p></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <h2 class="Contact">Contact Us</h2>
            <p></p>
            <form>
                <input type="text" placeholder="Your Name" required>
                <input type="email" placeholder="Email Address" required>
                <textarea placeholder="Message For SkillUp Tech" rows="4" required></textarea>
                <button type="submit" class="btn-primary">Send Now</button>
            </form>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <p>&copy; 2024 SkillUp Tech</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>