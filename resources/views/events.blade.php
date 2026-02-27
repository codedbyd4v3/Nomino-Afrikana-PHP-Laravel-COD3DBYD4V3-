<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events & Gallery | Nomino Afrikana | Afro-Music Heritage</title>
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

        /* Events Hero Section */
        .events-hero {
            height: 70vh;
            background: linear-gradient(rgba(26, 18, 11, 0.7), rgba(26, 18, 11, 0.7)), url('https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center/cover;
            display: flex;
            align-items: center;
            text-align: center;
            position: relative;
            margin-top: 80px;
        }

        .events-hero-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .events-hero h1 {
            font-size: 4rem;
            margin-bottom: 20px;
            color: var(--secondary);
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
        }

        .events-hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: var(--light);
        }

        /* Upcoming Events Section */
        .upcoming-events {
            background-color: var(--light);
            color: var(--text);
        }

        .events-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
            border-bottom: 1px solid rgba(139, 69, 19, 0.2);
        }

        .tab-btn {
            padding: 12px 30px;
            background: transparent;
            border: none;
            font-family: 'Cinzel', serif;
            font-size: 1.1rem;
            color: var(--text);
            cursor: pointer;
            transition: var(--transition);
            position: relative;
        }

        .tab-btn.active {
            color: var(--primary);
        }

        .tab-btn.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--primary);
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
        }

        .event-card {
            background: #fff;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .event-card:hover {
            transform: translateY(-10px);
        }

        .event-image {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .event-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .event-card:hover .event-image img {
            transform: scale(1.1);
        }

        .event-date {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--primary);
            color: var(--light);
            padding: 8px 15px;
            border-radius: 5px;
            text-align: center;
            line-height: 1.2;
        }

        .event-date .day {
            font-size: 1.5rem;
            font-weight: 700;
            display: block;
        }

        .event-date .month {
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        .event-info {
            padding: 20px;
        }

        .event-info h3 {
            color: var(--primary);
            margin-bottom: 10px;
        }

        .event-meta {
            display: flex;
            margin-bottom: 15px;
            color: var(--accent);
            font-size: 0.9rem;
        }

        .event-meta span {
            margin-right: 15px;
            display: flex;
            align-items: center;
        }

        .event-meta i {
            margin-right: 5px;
        }

        .event-description {
            margin-bottom: 20px;
        }

        /* Past Events Section */
        .past-events {
            background-color: var(--dark);
        }

        .past-events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .past-event-card {
            background: rgba(139, 69, 19, 0.1);
            border-radius: 5px;
            overflow: hidden;
            transition: var(--transition);
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .past-event-card:hover {
            transform: translateY(-10px);
            border-color: var(--secondary);
        }

        .past-event-image {
            height: 200px;
            overflow: hidden;
        }

        .past-event-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .past-event-card:hover .past-event-image img {
            transform: scale(1.1);
        }

        .past-event-info {
            padding: 20px;
        }

        .past-event-info h3 {
            color: var(--secondary);
            margin-bottom: 10px;
        }

        .past-event-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            color: var(--accent);
            font-size: 0.9rem;
        }

        /* Gallery Section */
        .gallery-section {
            background-color: var(--light);
            color: var(--text);
        }

        .gallery-filters {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .gallery-filter {
            padding: 8px 20px;
            background: transparent;
            color: var(--text);
            border: 1px solid var(--accent);
            border-radius: 30px;
            cursor: pointer;
            transition: var(--transition);
        }

        .gallery-filter.active, .gallery-filter:hover {
            background: var(--primary);
            color: var(--light);
            border-color: var(--primary);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 5px;
            height: 250px;
            cursor: pointer;
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
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--transition);
            padding: 20px;
            text-align: center;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay h3 {
            color: var(--dark);
            margin-bottom: 10px;
        }

        .gallery-overlay p {
            color: var(--dark);
            font-size: 0.9rem;
        }

        .view-icon {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 40px;
            height: 40px;
            background: var(--dark);
            color: var(--secondary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--transition);
        }

        .gallery-item:hover .view-icon {
            opacity: 1;
        }

        /* Modal for Gallery */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 2000;
            overflow: auto;
        }

        .modal-content {
            position: relative;
            max-width: 900px;
            margin: 50px auto;
            background: var(--light);
            border-radius: 5px;
            overflow: hidden;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: var(--primary);
            color: var(--light);
        }

        .modal-header h3 {
            color: var(--secondary);
        }

        .close-modal {
            background: none;
            border: none;
            color: var(--light);
            font-size: 1.5rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .close-modal:hover {
            color: var(--secondary);
        }

        .modal-body {
            padding: 20px;
            color: var(--text);
        }

        .modal-image {
            width: 100%;
            height: 400px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .modal-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .modal-description {
            margin-bottom: 20px;
        }

        .modal-meta {
            display: flex;
            justify-content: space-between;
            color: var(--accent);
            font-size: 0.9rem;
        }

        /* Newsletter Section */
        .newsletter {
            background: linear-gradient(rgba(26, 18, 11, 0.9), rgba(26, 18, 11, 0.9)), url('https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center/cover;
            text-align: center;
            padding: 100px 0;
        }

        .newsletter-content {
            max-width: 600px;
            margin: 0 auto;
        }

        .newsletter h2 {
            font-size: 2.5rem;
            color: var(--secondary);
            margin-bottom: 20px;
        }

        .newsletter p {
            margin-bottom: 30px;
            font-size: 1.1rem;
        }

        .newsletter-form {
            display: flex;
            max-width: 500px;
            margin: 0 auto;
        }

        .newsletter-input {
            flex: 1;
            padding: 12px 15px;
            border: 2px solid var(--secondary);
            background: transparent;
            color: var(--light);
            font-family: 'Cormorant Garamond', serif;
            font-size: 1rem;
        }

        .newsletter-input::placeholder {
            color: var(--accent);
        }

        .newsletter-btn {
            padding: 12px 25px;
            background: var(--secondary);
            color: var(--dark);
            border: 2px solid var(--secondary);
            font-family: 'Cormorant Garamond', serif;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .newsletter-btn:hover {
            background: transparent;
            color: var(--secondary);
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
            .events-grid,
            .past-events-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
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

            .events-hero h1 {
                font-size: 2.5rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }
            
            .newsletter-form {
                flex-direction: column;
            }
            
            .newsletter-input {
                margin-bottom: 10px;
            }
            
            .events-tabs {
                flex-direction: column;
                align-items: center;
            }
            
            .tab-btn {
                width: 100%;
                text-align: center;
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
                    <li><a href="{{ url('/about') }}">About</a></li>
                    <li><a href="{{ url('/music') }}">Music</a></li>
                    <li><a href="{{ url('/events') }}" class="active">Events & Gallery</a></li>
                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Events Hero Section -->
    <section class="events-hero">
        <div class="events-hero-content">
            <h1>Events & Gallery</h1>
            <p>Experience the rhythm, energy, and visual beauty of Nomino Afrikana's performances</p>
            <a href="#upcoming" class="btn">View Upcoming Events</a>
        </div>
    </section>

    <!-- Upcoming Events Section -->
    <section class="upcoming-events" id="upcoming">
        <div class="container">
            <div class="section-title">
                <h2>Upcoming Events</h2>
            </div>
            <div class="events-tabs">
                <button class="tab-btn active" data-tab="all">All Events</button>
                <button class="tab-btn" data-tab="festival">Festivals</button>
                <button class="tab-btn" data-tab="concert">Concerts</button>
                <button class="tab-btn" data-tab="workshop">Workshops</button>
            </div>
            <div class="events-grid" id="upcoming-events-grid">
                <div class="loading">
                    <i class="fas fa-spinner fa-spin"></i> Loading upcoming events...
                </div>
            </div>
        </div>
    </section>

    <!-- Past Events Section -->
    <section class="past-events">
        <div class="container">
            <div class="section-title">
                <h2>Past Events</h2>
            </div>
            <div class="past-events-grid" id="past-events-grid">
                <div class="loading">
                    <i class="fas fa-spinner fa-spin"></i> Loading past events...
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section" id="gallery">
        <div class="container">
            <div class="section-title">
                <h2>Performance Gallery</h2>
            </div>
            <div class="gallery-filters">
                <button class="gallery-filter active" data-filter="all">All</button>
                <button class="gallery-filter" data-filter="performance">Performances</button>
                <button class="gallery-filter" data-filter="behind_the_scenes">Behind The Scenes</button>
                <button class="gallery-filter" data-filter="instruments">Instruments</button>
                <button class="gallery-filter" data-filter="travel">Travel</button>
            </div>
            <div class="gallery-grid" id="gallery-grid">
                <div class="loading">
                    <i class="fas fa-spinner fa-spin"></i> Loading gallery...
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Modal -->
    <div class="modal" id="gallery-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modal-title">Performance Image</h3>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-image">
                    <img id="modal-img" src="" alt="">
                </div>
                <div class="modal-description">
                    <p id="modal-desc">Description of the image will appear here.</p>
                </div>
                <div class="modal-meta">
                    <span id="modal-category">Category</span>
                    <span id="modal-date">Date</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <section class="newsletter">
        <div class="container">
            <div class="newsletter-content">
                <h2>Stay Connected</h2>
                <p>Subscribe to our newsletter for updates on upcoming events, new music releases, and exclusive content.</p>
                <form class="newsletter-form">
                    <input type="email" class="newsletter-input" placeholder="Your email address" required>
                    <button type="submit" class="newsletter-btn">Subscribe</button>
                </form>
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
                    <li><a href="events.html">Events & Gallery</a></li>
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
@vite('resources/js/events.js')
</body>
</html>