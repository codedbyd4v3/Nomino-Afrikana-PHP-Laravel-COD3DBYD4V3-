<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music | Nomino Afrikana | Afro-Music Heritage</title>
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

        /* Music Hero Section */
        .music-hero {
            height: 70vh;
            background: linear-gradient(rgba(26, 18, 11, 0.7), rgba(26, 18, 11, 0.7)), url('https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center/cover;
            display: flex;
            align-items: center;
            text-align: center;
            position: relative;
            margin-top: 80px;
        }

        .music-hero-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .music-hero h1 {
            font-size: 4rem;
            margin-bottom: 20px;
            color: var(--secondary);
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
        }

        .music-hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: var(--light);
        }

        /* Featured Album Section */
        .featured-album {
            background-color: var(--light);
            color: var(--text);
        }

        .featured-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .album-art {
            position: relative;
            overflow: hidden;
            border-radius: 5px;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .album-art:hover {
            transform: translateY(-10px);
        }

        .album-art img {
            width: 100%;
            height: auto;
            display: block;
        }

        .album-info h2 {
            color: var(--primary);
            margin-bottom: 20px;
            font-size: 2.2rem;
        }

        .album-meta {
            display: flex;
            margin-bottom: 20px;
            color: var(--accent);
        }

        .album-meta span {
            margin-right: 20px;
        }

        .album-description {
            margin-bottom: 30px;
        }

        .album-tracks {
            margin-bottom: 30px;
        }

        .track-list {
            list-style: none;
        }

        .track-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid rgba(139, 69, 19, 0.2);
            transition: var(--transition);
        }

        .track-item:hover {
            background: rgba(139, 69, 19, 0.05);
            padding-left: 10px;
        }

        .track-number {
            color: var(--primary);
            font-weight: 600;
            width: 30px;
        }

        .track-title {
            flex: 1;
        }

        .track-duration {
            color: var(--accent);
        }

        .album-actions {
            display: flex;
            gap: 15px;
        }

        .streaming-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .streaming-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: var(--primary);
            color: var(--light);
            border-radius: 50%;
            transition: var(--transition);
        }

        .streaming-links a:hover {
            background: var(--secondary);
            color: var(--dark);
            transform: translateY(-5px);
        }

        /* Discography Section */
        .discography {
            background-color: var(--dark);
        }

        .discography-filters {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .filter-btn {
            padding: 8px 20px;
            background: transparent;
            color: var(--light);
            border: 1px solid var(--accent);
            border-radius: 30px;
            cursor: pointer;
            transition: var(--transition);
        }

        .filter-btn.active, .filter-btn:hover {
            background: var(--secondary);
            color: var(--dark);
            border-color: var(--secondary);
        }

        .albums-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }

        .album-card {
            background: rgba(139, 69, 19, 0.1);
            border-radius: 5px;
            overflow: hidden;
            transition: var(--transition);
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .album-card:hover {
            transform: translateY(-10px);
            border-color: var(--secondary);
        }

        .album-cover {
            height: 250px;
            overflow: hidden;
        }

        .album-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .album-card:hover .album-cover img {
            transform: scale(1.1);
        }

        .album-details {
            padding: 20px;
        }

        .album-details h3 {
            color: var(--secondary);
            margin-bottom: 10px;
        }

        .album-year {
            color: var(--accent);
            margin-bottom: 15px;
            display: block;
        }

        /* Music Player */
        .music-player-section {
            background-color: var(--light);
            color: var(--text);
            padding: 80px 0;
        }

        .player-container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .player-header {
            background: var(--primary);
            color: var(--light);
            padding: 20px;
            text-align: center;
        }

        .player-header h3 {
            color: var(--secondary);
        }

        .player-content {
            padding: 30px;
        }

        .now-playing {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .now-playing-cover {
            width: 100px;
            height: 100px;
            border-radius: 5px;
            overflow: hidden;
            margin-right: 20px;
        }

        .now-playing-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .now-playing-info h4 {
            color: var(--primary);
            margin-bottom: 5px;
        }

        .now-playing-info p {
            color: var(--accent);
        }

        .player-controls {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .progress-area {
            width: 100%;
            margin-bottom: 20px;
        }

        .progress-bar {
            height: 6px;
            width: 100%;
            background: #e0e0e0;
            border-radius: 50px;
            cursor: pointer;
        }

        .progress {
            height: 100%;
            width: 0%;
            background: var(--primary);
            border-radius: inherit;
            position: relative;
        }

        .progress::before {
            content: '';
            position: absolute;
            height: 12px;
            width: 12px;
            border-radius: 50%;
            background: var(--primary);
            right: -5px;
            top: 50%;
            transform: translateY(-50%);
        }

        .timer {
            display: flex;
            justify-content: space-between;
            margin-top: 5px;
            font-size: 0.9rem;
            color: var(--accent);
        }

        .control-buttons {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .control-btn {
            background: none;
            border: none;
            color: var(--primary);
            font-size: 1.2rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .control-btn:hover {
            color: var(--secondary);
        }

        .play-pause {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary);
            color: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .play-pause:hover {
            background: var(--secondary);
            color: var(--dark);
        }

        /* Videos Section */
        .videos {
            background-color: var(--dark);
        }

        .videos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
        }

        .video-card {
            background: rgba(139, 69, 19, 0.1);
            border-radius: 5px;
            overflow: hidden;
            transition: var(--transition);
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .video-card:hover {
            transform: translateY(-10px);
            border-color: var(--secondary);
        }

        .video-thumbnail {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .video-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .video-card:hover .video-thumbnail img {
            transform: scale(1.1);
        }

        .play-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            background: rgba(212, 175, 55, 0.8);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark);
            font-size: 1.5rem;
            opacity: 0;
            transition: var(--transition);
        }

        .video-card:hover .play-icon {
            opacity: 1;
        }

        .video-info {
            padding: 20px;
        }

        .video-info h3 {
            color: var(--secondary);
            margin-bottom: 10px;
        }

        .video-meta {
            display: flex;
            justify-content: space-between;
            color: var(--accent);
            font-size: 0.9rem;
        }

        /* Call to Action */
        .cta {
            background: linear-gradient(rgba(26, 18, 11, 0.9), rgba(26, 18, 11, 0.9)), url('https://images.unsplash.com/photo-1523906834658-6e24ef2386f9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2062&q=80') no-repeat center center/cover;
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
            .featured-content {
                grid-template-columns: 1fr;
            }
            
            .album-art {
                max-width: 500px;
                margin: 0 auto;
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

            .music-hero h1 {
                font-size: 2.5rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }
            
            .now-playing {
                flex-direction: column;
                text-align: center;
            }
            
            .now-playing-cover {
                margin-right: 0;
                margin-bottom: 15px;
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
                    <li><a href="{{ url('/music') }}" class="active">Music</a></li>
                    <li><a href="{{ url('/events') }}">Events</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Music Hero Section -->
    <section class="music-hero">
        <div class="music-hero-content">
            <h1>Musical Journey</h1>
            <p>Explore the sounds, rhythms, and stories that define Nomino Afrikana's unique musical expression</p>
            <a href="#featured" class="btn">Listen Now</a>
        </div>
    </section>

    <!-- Featured Album Section -->
    <section class="featured-album" id="featured">
        <div class="container">
            <div class="section-title">
                <h2>Featured Album</h2>
            </div>
            <div id="featured-content">
                <div class="loading">
                    <i class="fas fa-spinner fa-spin"></i> Loading featured album...
                </div>
            </div>
        </div>
    </section>

    <!-- Discography Section -->
    <section class="discography">
        <div class="container">
            <div class="section-title">
                <h2>Discography</h2>
            </div>
            <div class="discography-filters">
                <button class="filter-btn active" data-filter="all">All Releases</button>
                <button class="filter-btn" data-filter="album">Albums</button>
                <button class="filter-btn" data-filter="ep">EPs</button>
                <button class="filter-btn" data-filter="single">Singles</button>
            </div>
            <div class="albums-grid" id="albums-grid">
                <div class="loading">
                    <i class="fas fa-spinner fa-spin"></i> Loading discography...
                </div>
            </div>
        </div>
    </section>

    <!-- Music Player Section -->
    <section class="music-player-section">
        <div class="container">
            <div class="section-title">
                <h2>Listen Now</h2>
            </div>
            <div class="player-container">
                <div class="player-header">
                    <h3>Nomino Afrikana Player</h3>
                    <p>Experience the sounds of African heritage</p>
                </div>
                <div class="player-content">
                    <div class="now-playing">
                        <div class="now-playing-cover">
                            <img id="player-cover" src="https://images.unsplash.com/photo-1511379938547-c1f69419868d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Now Playing">
                        </div>
                        <div class="now-playing-info">
                            <h4 id="player-title">Call of the Drums</h4>
                            <p id="player-album">Ancestral Echoes • 2023</p>
                        </div>
                    </div>
                    <div class="player-controls">
                        <div class="progress-area">
                            <div class="progress-bar">
                                <div class="progress"></div>
                            </div>
                            <div class="timer">
                                <span class="current-time">0:00</span>
                                <span class="max-duration">4:12</span>
                            </div>
                        </div>
                        <div class="control-buttons">
                            <button class="control-btn"><i class="fas fa-random"></i></button>
                            <button class="control-btn"><i class="fas fa-step-backward"></i></button>
                            <button class="control-btn play-pause"><i class="fas fa-play"></i></button>
                            <button class="control-btn"><i class="fas fa-step-forward"></i></button>
                            <button class="control-btn"><i class="fas fa-redo"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Videos Section -->
    <section class="videos">
        <div class="container">
            <div class="section-title">
                <h2>Music Videos</h2>
            </div>
            <div class="videos-grid" id="videos-grid">
                <div class="loading">
                    <i class="fas fa-spinner fa-spin"></i> Loading videos...
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta">
        <div class="container">
            <h2>Experience the Rhythm</h2>
            <p>Join thousands of listeners who have discovered the unique sounds of Nomino Afrikana. Stream her music on all major platforms or purchase physical copies for your collection.</p>
            <a href="#" class="btn">Stream Now</a>
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

    <!--JavaScript file -->
     <script>
    const API_BASE_URL = "{{ url('/api') }}";
    </script>

<!-- Load JS via Vite -->
@vite('resources/js/music.js')
</body>
</html>