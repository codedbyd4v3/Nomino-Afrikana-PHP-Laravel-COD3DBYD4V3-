<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Nomino Afrikana | Afro-Music Heritage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Cormorant+Garamond:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        /* CSS Variables */
        :root {
            --primary: #8B4513; /* Rich brown */
            --secondary: #D4AF37; /* Gold */
            --accent: #C19A6B; /* Light brown */
            --dark: #1A120B; /* Deep brown/black */
            --light: #F5F5DC; /* Beige */
            --text: #3A2D13; /* Dark brown text */
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            --transition: all 0.4s ease;
        }

        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Cormorant Garamond', serif;
            background-color: var(--dark);
            color: var(--light);
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1, h2, h3, h4 {
            font-family: 'Cinzel', serif;
            font-weight: 400;
            letter-spacing: 1px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        section {
            padding: 100px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
            position: relative;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--secondary);
            display: inline-block;
            position: relative;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            width: 60%;
            height: 2px;
            background: var(--secondary);
            bottom: -10px;
            left: 20%;
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: transparent;
            color: var(--secondary);
            border: 2px solid var(--secondary);
            text-decoration: none;
            font-weight: 600;
            letter-spacing: 1px;
            transition: var(--transition);
            cursor: pointer;
            text-transform: uppercase;
            font-size: 0.9rem;
        }

        .btn:hover {
            background: var(--secondary);
            color: var(--dark);
        }

        /* Header & Navigation */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            padding: 20px 0;
            transition: var(--transition);
        }

        header.scrolled {
            background: rgba(26, 18, 11, 0.95);
            padding: 15px 0;
            box-shadow: var(--shadow);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Cinzel', serif;
            font-size: 1.8rem;
            color: var(--secondary);
            text-decoration: none;
            font-weight: 700;
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 30px;
        }

        .nav-links a {
            color: var(--light);
            text-decoration: none;
            font-size: 1rem;
            transition: var(--transition);
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--secondary);
            bottom: -5px;
            left: 0;
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--secondary);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .menu-toggle {
            display: none;
            cursor: pointer;
            font-size: 1.5rem;
            color: var(--light);
        }

        /* Hero Section */
        .about-hero {
            height: 70vh;
            background: linear-gradient(rgba(26, 18, 11, 0.7), rgba(26, 18, 11, 0.7)), url('https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center/cover;
            display: flex;
            align-items: center;
            text-align: center;
            position: relative;
            margin-top: 80px;
        }

        .about-hero-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .about-hero h1 {
            font-size: 4rem;
            margin-bottom: 20px;
            color: var(--secondary);
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
        }

        .about-hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: var(--light);
        }

        /* Story Section */
        .story {
            background-color: var(--light);
            color: var(--text);
        }

        .story-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .story-text h2 {
            color: var(--primary);
            margin-bottom: 20px;
        }

        .story-text p {
            margin-bottom: 20px;
        }

        .story-image {
            position: relative;
            overflow: hidden;
            border-radius: 5px;
            box-shadow: var(--shadow);
        }

        .story-image img {
            width: 100%;
            height: auto;
            transition: var(--transition);
        }

        .story-image:hover img {
            transform: scale(1.05);
        }

        /* Mission Section */
        .mission {
            background-color: var(--dark);
        }

        .mission-content {
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
        }

        .mission-text {
            margin-bottom: 40px;
        }

        .mission-text p {
            font-size: 1.1rem;
            margin-bottom: 20px;
        }

        .mission-values {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .value-card {
            background: rgba(139, 69, 19, 0.1);
            padding: 30px;
            border-radius: 5px;
            transition: var(--transition);
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .value-card:hover {
            transform: translateY(-10px);
            border-color: var(--secondary);
        }

        .value-icon {
            font-size: 2.5rem;
            color: var(--secondary);
            margin-bottom: 20px;
        }

        .value-card h3 {
            color: var(--secondary);
            margin-bottom: 15px;
        }

        /* Heritage Section */
        .heritage {
            background-color: var(--light);
            color: var(--text);
        }

        .heritage-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .heritage-text h2 {
            color: var(--primary);
            margin-bottom: 20px;
        }

        .heritage-text p {
            margin-bottom: 20px;
        }

        .heritage-image {
            position: relative;
            overflow: hidden;
            border-radius: 5px;
            box-shadow: var(--shadow);
        }

        .heritage-image img {
            width: 100%;
            height: auto;
            transition: var(--transition);
        }

        .heritage-image:hover img {
            transform: scale(1.05);
        }

        /* Team Section */
        .team {
            background-color: var(--dark);
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }

        .team-member {
            text-align: center;
            background: rgba(139, 69, 19, 0.1);
            border-radius: 5px;
            overflow: hidden;
            transition: var(--transition);
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .team-member:hover {
            transform: translateY(-10px);
            border-color: var(--secondary);
        }

        .member-image {
            height: 300px;
            overflow: hidden;
        }

        .member-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .team-member:hover .member-image img {
            transform: scale(1.1);
        }

        .member-info {
            padding: 20px;
        }

        .member-info h3 {
            color: var(--secondary);
            margin-bottom: 10px;
        }

        .member-role {
            color: var(--accent);
            font-style: italic;
            margin-bottom: 15px;
            display: block;
        }

        /* Recognition Section */
        .recognition {
            background-color: var(--light);
            color: var(--text);
        }

        .recognition-content {
            max-width: 900px;
            margin: 0 auto;
        }

        .awards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 30px;
        }

        .award-card {
            background: #fff;
            padding: 25px;
            border-radius: 5px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border-left: 4px solid var(--primary);
        }

        .award-card:hover {
            transform: translateY(-5px);
        }

        .award-icon {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .award-card h3 {
            color: var(--primary);
            margin-bottom: 10px;
        }

        .award-year {
            color: var(--accent);
            font-weight: 600;
        }

        /* Call to Action */
        .cta {
            background: linear-gradient(rgba(26, 18, 11, 0.9), rgba(26, 18, 11, 0.9)), url('https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center/cover;
            text-align: center;
            padding: 100px 0;
        }

        .cta h2 {
            font-size: 2.5rem;
            color: var(--secondary);
            margin-bottom: 20px;
        }

        .cta p {
            max-width: 700px;
            margin: 0 auto 30px;
            font-size: 1.1rem;
        }

        /* Footer */
        footer {
            background: var(--dark);
            padding: 50px 0 20px;
            text-align: center;
        }

        .footer-content {
            margin-bottom: 30px;
        }

        .footer-logo {
            font-family: 'Cinzel', serif;
            font-size: 2rem;
            color: var(--secondary);
            margin-bottom: 20px;
            display: inline-block;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            list-style: none;
            margin-bottom: 30px;
        }

        .footer-links li {
            margin: 0 15px;
        }

        .footer-links a {
            color: var(--light);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: var(--secondary);
        }

        .copyright {
            color: var(--accent);
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .story-content,
            .heritage-content {
                grid-template-columns: 1fr;
            }

            .story-image,
            .heritage-image {
                order: -1;
            }
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: block;
            }

            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                width: 80%;
                height: 100vh;
                background: var(--dark);
                flex-direction: column;
                align-items: center;
                justify-content: center;
                transition: var(--transition);
                box-shadow: -5px 0 15px rgba(0, 0, 0, 0.2);
            }

            .nav-links.active {
                right: 0;
            }

            .nav-links li {
                margin: 15px 0;
            }

            .about-hero h1 {
                font-size: 2.5rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header & Navigation -->
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="{{ url('/') }}" class="logo">Nomino Afrikana</a>
                <div class="menu-toggle" id="menu-toggle">
                    <i class="fas fa-bars"></i>
                </div>
                <ul class="nav-links" id="nav-links">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/about') }} class="active">About</a></li>
                    <li><a href="{{ url('/music') }}">Music</a></li>
                    <li><a href="{{ url('/events') }}">Events & Gallery</a></li>
                    <!-- <li><a href="gallery.html">Gallery</a></li> -->
                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- About Hero Section -->
    <section class="about-hero">
        <div class="about-hero-content">
            <h1>Our Story</h1>
            <p>Discover the journey, mission, and heritage behind Nomino Afrikana's unique musical expression</p>
            <a href="#story" class="btn">Explore Our Journey</a>
        </div>
    </section>

    <!-- Story Section -->
    <section class="story" id="story">
        <div class="container">
            <div class="section-title">
                <h2>The Beginning</h2>
            </div>
            <div class="story-content">
                <div class="story-text">
                    <h2>Roots & Rhythm</h2>
                    <p>Nomino Afrikana's journey began in the vibrant heart of West Africa, where rhythm flows through the very soil and music is the language of the soul. Born into a family of griots - traditional West African historians, storytellers, and musicians - Nomino was immersed in musical traditions from her earliest days.</p>
                    <p>Her grandmother, a renowned keeper of ancestral songs, first placed a djembe in her small hands at age four. From that moment, a lifelong connection to African musical heritage was forged. Nomino spent her childhood learning traditional rhythms, understanding their cultural significance, and discovering how each beat tells a story of the African experience.</p>
                    <p>As she matured, Nomino recognized both the beauty and fragility of these ancient musical traditions. She dedicated herself not only to mastering them but to ensuring they would thrive for future generations, evolving while maintaining their authentic essence.</p>
                    <a href="#heritage" class="btn">Discover Our Heritage</a>
                </div>
                <div class="story-image">
                    <img src="https://images.unsplash.com/photo-1571974599782-87624638275f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2052&q=80" alt="Nomino's Early Years">
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission">
        <div class="container">
            <div class="section-title">
                <h2>Our Mission</h2>
            </div>
            <div class="mission-content">
                <div class="mission-text">
                    <p>Nomino Afrikana stands at the intersection of tradition and innovation, with a clear mission to preserve, celebrate, and evolve African musical heritage for global audiences. We believe that the rhythms of Africa contain universal truths that can bridge cultures and connect humanity.</p>
                    <p>Through performance, education, and collaboration, we work to ensure that ancient musical traditions not only survive but thrive in the contemporary world, influencing new generations of artists and listeners alike.</p>
                </div>
                <div class="mission-values">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <h3>Preservation</h3>
                        <p>Honoring and maintaining authentic African musical traditions, instruments, and techniques for future generations.</p>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-globe-africa"></i>
                        </div>
                        <h3>Cultural Bridge</h3>
                        <p>Creating connections between African musical heritage and global audiences through accessible, transformative experiences.</p>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-seedling"></i>
                        </div>
                        <h3>Innovation</h3>
                        <p>Evolving traditional sounds through thoughtful innovation while respecting their cultural origins and significance.</p>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <h3>Community</h3>
                        <p>Building supportive networks for African musicians and creating opportunities for cultural exchange and collaboration.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Heritage Section -->
    <section class="heritage" id="heritage">
        <div class="container">
            <div class="section-title">
                <h2>Musical Heritage</h2>
            </div>
            <div class="heritage-content">
                <div class="heritage-image">
                    <img src="https://images.unsplash.com/photo-1536152470836-b943b246224c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Traditional Instruments">
                </div>
                <div class="heritage-text">
                    <h2>Ancient Sounds, Contemporary Expression</h2>
                    <p>At the core of Nomino Afrikana's artistry lies a deep reverence for traditional African instruments and their cultural contexts. Each performance incorporates authentic instruments like the djembe, kora, balafon, and talking drum, each with centuries of history and cultural significance.</p>
                    <p>These instruments are not merely tools for creating music but vessels carrying stories, traditions, and the collective memory of African peoples. The djembe, originally from the Mali Empire, speaks of community gatherings and celebrations. The kora, with its 21 strings, weaves intricate tales of history and mythology.</p>
                    <p>Nomino's approach respects these traditions while finding new ways for these ancient sounds to resonate with contemporary audiences. Her compositions honor the original contexts of these instruments while exploring their potential in modern musical landscapes.</p>
                    <a href="#team" class="btn">Meet The Team</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team" id="team">
        <div class="container">
            <div class="section-title">
                <h2>Our Family</h2>
            </div>
            <div class="team-grid">
                <div class="team-member">
                    <div class="member-image">
                        <img src="https://images.unsplash.com/photo-1511735111819-9a3f7709049c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80" alt="Nomino Afrikana">
                    </div>
                    <div class="member-info">
                        <h3>Nomino Afrikana</h3>
                        <span class="member-role">Founder & Lead Artist</span>
                        <p>Visionary musician and cultural ambassador dedicated to preserving and evolving African musical traditions.</p>
                    </div>
                </div>
                <div class="team-member">
                    <div class="member-image">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80" alt="Kofi Mensah">
                    </div>
                    <div class="member-info">
                        <h3>Kofi Mensah</h3>
                        <span class="member-role">Musical Director</span>
                        <p>Master percussionist and arranger with deep knowledge of West African rhythmic traditions.</p>
                    </div>
                </div>
                <div class="team-member">
                    <div class="member-image">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80" alt="Amina Diallo">
                    </div>
                    <div class="member-info">
                        <h3>Amina Diallo</h3>
                        <span class="member-role">Cultural Researcher</span>
                        <p>Anthropologist and musicologist ensuring cultural authenticity in all artistic expressions.</p>
                    </div>
                </div>
                <div class="team-member">
                    <div class="member-image">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Jelani Okafor">
                    </div>
                    <div class="member-info">
                        <h3>Jelani Okafor</h3>
                        <span class="member-role">Instrument Curator</span>
                        <p>Master craftsman specializing in the creation and maintenance of traditional African instruments.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recognition Section -->
    <section class="recognition">
        <div class="container">
            <div class="section-title">
                <h2>Recognition</h2>
            </div>
            <div class="recognition-content">
                <p>Nomino Afrikana's dedication to preserving and innovating African musical traditions has been recognized through numerous awards and honors that celebrate both artistic excellence and cultural preservation.</p>
                <div class="awards-grid">
                    <div class="award-card">
                        <div class="award-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h3>Global Music Award</h3>
                        <p>Excellence in World Music</p>
                        <span class="award-year">2022</span>
                    </div>
                    <div class="award-card">
                        <div class="award-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <h3>African Heritage Prize</h3>
                        <p>Cultural Preservation</p>
                        <span class="award-year">2021</span>
                    </div>
                    <div class="award-card">
                        <div class="award-icon">
                            <i class="fas fa-medal"></i>
                        </div>
                        <h3>UNESCO Recognition</h3>
                        <p>Intangible Cultural Heritage</p>
                        <span class="award-year">2020</span>
                    </div>
                    <div class="award-card">
                        <div class="award-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3>Rhythm of Africa Award</h3>
                        <p>Musical Innovation</p>
                        <span class="award-year">2019</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta">
        <div class="container">
            <h2>Join Our Journey</h2>
            <p>Become part of the movement to preserve and celebrate African musical heritage while supporting its evolution for future generations.</p>
            <a href="contact.html" class="btn">Get Involved</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <a href="index.html" class="footer-logo">Nomino Afrikana</a>
                <ul class="footer-links">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="music.html">Music</a></li>
                    <li><a href="events.html">Events</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="copyright">
                <p>&copy; 2023 Nomino Afrikana. All rights reserved. | Preserving African Musical Heritage</p>
            </div>
        </div>
    </footer>

    <script>
        // JavaScript for interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const menuToggle = document.getElementById('menu-toggle');
            const navLinks = document.getElementById('nav-links');
            
            menuToggle.addEventListener('click', function() {
                navLinks.classList.toggle('active');
            });
            
            // Close mobile menu when clicking on a link
            const navItems = document.querySelectorAll('.nav-links a');
            navItems.forEach(item => {
                item.addEventListener('click', function() {
                    navLinks.classList.remove('active');
                });
            });
            
            // Header scroll effect
            const header = document.querySelector('header');
            
            window.addEventListener('scroll', function() {
                if (window.scrollY > 100) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>