<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomino Afrikana | Afro-Music Heritage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(26, 18, 11, 0.7), rgba(26, 18, 11, 0.7)), url('https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center/cover;
            display: flex;
            align-items: center;
            text-align: center;
            position: relative;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .hero h1 {
            font-size: 4rem;
            margin-bottom: 20px;
            color: var(--secondary);
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: var(--light);
        }

        .hero .btn {
            margin-top: 20px;
        }

        /* About Section */
        .about {
            background-color: var(--light);
            color: var(--text);
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .about-text h2 {
            color: var(--primary);
            margin-bottom: 20px;
        }

        .about-text p {
            margin-bottom: 20px;
        }

        .about-image {
            position: relative;
            overflow: hidden;
            border-radius: 5px;
            box-shadow: var(--shadow);
        }

        .about-image img {
            width: 100%;
            height: auto;
            transition: var(--transition);
        }

        .about-image:hover img {
            transform: scale(1.05);
        }

        /* Music Section */
        .music {
            background-color: var(--dark);
        }

        .music-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .music-card {
            background: rgba(139, 69, 19, 0.1);
            border-radius: 5px;
            overflow: hidden;
            transition: var(--transition);
            box-shadow: var(--shadow);
        }

        .music-card:hover {
            transform: translateY(-10px);
        }

        .music-image {
            height: 200px;
            overflow: hidden;
        }

        .music-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .music-card:hover .music-image img {
            transform: scale(1.1);
        }

        .music-info {
            padding: 20px;
        }

        .music-info h3 {
            color: var(--secondary);
            margin-bottom: 10px;
        }

        .music-info p {
            font-size: 0.9rem;
            margin-bottom: 15px;
            color: var(--accent);
        }

        /* Events Section */
        .events {
            background-color: var(--light);
            color: var(--text);
        }

        .events-timeline {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
        }

        .events-timeline::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 2px;
            background: var(--primary);
            transform: translateX(-50%);
        }

        .event-item {
            margin-bottom: 50px;
            position: relative;
            width: 50%;
            padding: 0 40px;
        }

        .event-item:nth-child(odd) {
            left: 0;
        }

        .event-item:nth-child(even) {
            left: 50%;
        }

        .event-content {
            background: var(--light);
            padding: 20px;
            border-radius: 5px;
            box-shadow: var(--shadow);
            border-left: 3px solid var(--primary);
        }

        .event-content h3 {
            color: var(--primary);
            margin-bottom: 10px;
        }

        .event-date {
            display: inline-block;
            background: var(--primary);
            color: var(--light);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        /* Gallery Section */
        .gallery {
            background-color: var(--dark);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
        }

        .gallery-item {
            overflow: hidden;
            border-radius: 5px;
            position: relative;
            height: 250px;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(212, 175, 55, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--transition);
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay i {
            font-size: 2rem;
            color: var(--dark);
        }

        /* Contact Section */
        .contact {
            background-color: var(--light);
            color: var(--text);
        }

        .contact-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }

        .contact-info h3 {
            color: var(--primary);
            margin-bottom: 20px;
        }

        .contact-details {
            margin-bottom: 30px;
        }

        .contact-detail {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .contact-detail i {
            width: 40px;
            height: 40px;
            background: var(--primary);
            color: var(--light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }

        .social-links {
            display: flex;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: var(--primary);
            color: var(--light);
            border-radius: 50%;
            margin-right: 10px;
            transition: var(--transition);
        }

        .social-links a:hover {
            background: var(--secondary);
            color: var(--dark);
            transform: translateY(-5px);
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #fff;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1rem;
        }

        .contact-form textarea {
            height: 150px;
            resize: vertical;
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

        /* Loading States */
        .loading {
            text-align: center;
            padding: 40px;
            color: var(--secondary);
            font-size: 1.2rem;
        }

        .loading i {
            margin-right: 10px;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .about-content,
            .contact-content {
                grid-template-columns: 1fr;
            }

            .events-timeline::before {
                left: 30px;
            }

            .event-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 0;
            }

            .event-item:nth-child(even) {
                left: 0;
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

            .hero h1 {
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
                    <li><a href="{{ url('/') }}" class="active">Home</a></li>
                    <li><a href="{{ url('/about') }}">About</a></li>
                    <li><a href="{{ url('/music') }}">Music</a></li>
                    <li><a href="{{ url('/events') }}">Events & Gallery</a></li>
                    <!-- <li><a href="gallery.html">Gallery</a></li> -->
                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Nomino Afrikana</h1>
            <p>An Afro-Misician with deep roots in African rhythm heritage and traditions</p>
            <a href="#music" class="btn">Discover the Rhythm</a>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="container">
            <div class="section-title">
                <h2>The Artist</h2>
            </div>
            <div class="about-content">
                <div class="about-text">
                    <h2>Nomino Afrikana</h2>
                    <p>Nomino Afrikana is a visionary Afro-musician whose artistry is deeply rooted in the rich tapestry of African rhythms, heritage, and traditions. With a profound connection to ancestral sounds, Nomino creates music that transcends borders while honoring the origins of African musical expression.</p>
                    <p>Her performances are a journey through the diverse soundscapes of the African continent, blending traditional instruments with contemporary arrangements to create a unique and captivating auditory experience.</p>
                    <p>Nomino's mission is to preserve and celebrate African musical heritage while introducing it to new audiences worldwide, creating bridges between cultures through the universal language of music.</p>
                    <a href="#contact" class="btn">Connect With Nomino</a>
                </div>
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Nomino Afrikana">
                </div>
            </div>
        </div>
    </section>

    <!-- Music Section -->
    <section class="music" id="music">
        <div class="container">
            <div class="section-title">
                <h2>Musical Journey</h2>
            </div>
            <div class="music-grid" id="music-grid">
                <div class="loading">
                    <i class="fas fa-spinner fa-spin"></i> Loading music...
                </div>
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section class="events" id="events">
        <div class="container">
            <div class="section-title">
                <h2>Upcoming Events</h2>
            </div>
            <div class="events-timeline" id="events-timeline">
                <div class="loading">
                    <i class="fas fa-spinner fa-spin"></i> Loading events...
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery" id="gallery">
        <div class="container">
            <div class="section-title">
                <h2>Visual Journey</h2>
            </div>
            <div class="gallery-grid" id="gallery-grid">
                <div class="loading">
                    <i class="fas fa-spinner fa-spin"></i> Loading gallery...
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="container">
            <div class="section-title">
                <h2>Connect</h2>
            </div>
            <div class="contact-content">
                <div class="contact-info">
                    <h3>Get In Touch</h3>
                    <p>For bookings, collaborations, or inquiries, please reach out through the contact form or directly via the information below.</p>
                    <div class="contact-details">
                        <div class="contact-detail">
                            <i class="fas fa-envelope"></i>
                            <span>contact@nominoafrikana.com</span>
                        </div>
                        <div class="contact-detail">
                            <i class="fas fa-phone"></i>
                            <span>+254 (555) 123-4567</span>
                        </div>
                        <div class="contact-detail">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>nairobi, kenya | Global Performances</span>
                        </div>
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-spotify"></i></a>
                        <a href="#"><i class="fab fa-apple"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="contact-form">
                    <form>
                        <input type="text" placeholder="Your Name" required>
                        <input type="email" placeholder="Your Email" required>
                        <input type="text" placeholder="Subject" required>
                        <textarea placeholder="Your Message" required></textarea>
                        <button type="submit" class="btn">Send Message</button>
                    </form>
                </div>
            </div>
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

    <!-- JavaScript file -->
 <script>
    const API_BASE_URL = "{{ url('/api') }}";
 </script>

<!-- Load JS via Vite -->
@vite('resources/js/welcome.js')
</body>
</html>