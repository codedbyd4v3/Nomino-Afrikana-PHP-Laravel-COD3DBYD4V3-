<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Nomino Afrikana | Afro-Music Heritage</title>
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

        /* Contact Hero Section */
        .contact-hero {
            height: 70vh;
            background: linear-gradient(rgba(26, 18, 11, 0.7), rgba(26, 18, 11, 0.7)), url('https://images.unsplash.com/photo-1511735111819-9a3f7709049c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80') no-repeat center center/cover;
            display: flex;
            align-items: center;
            text-align: center;
            position: relative;
            margin-top: 80px;
        }

        .contact-hero-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .contact-hero h1 {
            font-size: 4rem;
            margin-bottom: 20px;
            color: var(--secondary);
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
        }

        .contact-hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: var(--light);
        }

        /* Contact Info Section */
        .contact-info {
            background-color: var(--light);
            color: var(--text);
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }

        .contact-card {
            background: #fff;
            padding: 40px 30px;
            border-radius: 5px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border-top: 4px solid var(--primary);
        }

        .contact-card:hover {
            transform: translateY(-10px);
        }

        .contact-icon {
            width: 80px;
            height: 80px;
            background: var(--primary);
            color: var(--light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            transition: var(--transition);
        }

        .contact-card:hover .contact-icon {
            background: var(--secondary);
            color: var(--dark);
        }

        .contact-card h3 {
            color: var(--primary);
            margin-bottom: 15px;
        }

        .contact-card p {
            margin-bottom: 10px;
        }

        .contact-link {
            color: var(--accent);
            text-decoration: none;
            transition: var(--transition);
        }

        .contact-link:hover {
            color: var(--primary);
        }

        /* Contact Form Section */
        .contact-form-section {
            background-color: var(--dark);
        }

        .form-container {
            max-width: 800px;
            margin: 0 auto;
            background: rgba(139, 69, 19, 0.1);
            padding: 50px;
            border-radius: 5px;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-header h2 {
            color: var(--secondary);
            margin-bottom: 10px;
        }

        .contact-form {
            display: grid;
            gap: 25px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 8px;
            color: var(--secondary);
            font-weight: 600;
        }

        .form-control {
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 5px;
            color: var(--light);
            font-family: 'Cormorant Garamond', serif;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--secondary);
            background: rgba(255, 255, 255, 0.15);
        }

        .form-control::placeholder {
            color: var(--accent);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 150px;
        }

        .submit-btn {
            padding: 15px 30px;
            background: transparent;
            color: var(--secondary);
            border: 2px solid var(--secondary);
            border-radius: 5px;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 10px;
        }

        .submit-btn:hover {
            background: var(--secondary);
            color: var(--dark);
        }

        /* Team Section */
        .team-section {
            background-color: var(--light);
            color: var(--text);
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }

        .team-member {
            text-align: center;
            background: #fff;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .team-member:hover {
            transform: translateY(-10px);
        }

        .member-image {
            height: 250px;
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
            padding: 25px 20px;
        }

        .member-info h3 {
            color: var(--primary);
            margin-bottom: 5px;
        }

        .member-role {
            color: var(--accent);
            font-style: italic;
            margin-bottom: 15px;
            display: block;
        }

        .member-contact {
            margin-top: 15px;
        }

        .member-contact a {
            color: var(--primary);
            text-decoration: none;
            transition: var(--transition);
        }

        .member-contact a:hover {
            color: var(--secondary);
        }

        /* FAQ Section */
        .faq-section {
            background-color: var(--dark);
        }

        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            margin-bottom: 20px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 5px;
            overflow: hidden;
        }

        .faq-question {
            padding: 20px;
            background: rgba(139, 69, 19, 0.1);
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: var(--transition);
        }

        .faq-question:hover {
            background: rgba(139, 69, 19, 0.2);
        }

        .faq-question h3 {
            color: var(--secondary);
            font-size: 1.2rem;
        }

        .faq-icon {
            color: var(--secondary);
            transition: var(--transition);
        }

        .faq-answer {
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: var(--transition);
        }

        .faq-answer p {
            padding: 20px 0;
        }

        .faq-item.active .faq-answer {
            max-height: 500px;
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
        }

        /* Map Section */
        .map-section {
            background-color: var(--light);
            color: var(--text);
            padding: 80px 0;
        }

        .map-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .map-content h2 {
            color: var(--primary);
            margin-bottom: 20px;
        }

        .map-content p {
            margin-bottom: 30px;
        }

        .map-placeholder {
            height: 400px;
            background: linear-gradient(rgba(139, 69, 19, 0.1), rgba(139, 69, 19, 0.1)), url('https://images.unsplash.com/photo-1571974599782-87624638275f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2052&q=80') no-repeat center center/cover;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--light);
            font-size: 1.2rem;
            text-align: center;
            position: relative;
        }

        .map-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(26, 18, 11, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
        }

        /* Social Connect Section */
        .social-connect {
            background: linear-gradient(rgba(26, 18, 11, 0.9), rgba(26, 18, 11, 0.9)), url('https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center/cover;
            text-align: center;
            padding: 100px 0;
        }

        .social-content {
            max-width: 700px;
            margin: 0 auto;
        }

        .social-content h2 {
            font-size: 2.5rem;
            color: var(--secondary);
            margin-bottom: 20px;
        }

        .social-content p {
            margin-bottom: 40px;
            font-size: 1.1rem;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background: var(--primary);
            color: var(--light);
            border-radius: 50%;
            font-size: 1.5rem;
            transition: var(--transition);
            text-decoration: none;
        }

        .social-link:hover {
            background: var(--secondary);
            color: var(--dark);
            transform: translateY(-5px);
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
            .map-container {
                grid-template-columns: 1fr;
            }
            
            .map-content {
                order: 2;
            }
            
            .map-placeholder {
                order: 1;
            }
            
            .form-row {
                grid-template-columns: 1fr;
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

            .contact-hero h1 {
                font-size: 2.5rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }
            
            .form-container {
                padding: 30px 20px;
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
                    <li><a href="{{ url('/events') }}">Events & Gallery</a></li>
                    <li><a href="{{ url('/contact') }}" class="active">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Contact Hero Section -->
    <section class="contact-hero">
        <div class="contact-hero-content">
            <h1>Get In Touch</h1>
            <p>Connect with Nomino Afrikana for bookings, collaborations, or inquiries about African musical heritage</p>
            <a href="#contact-form" class="btn">Send a Message</a>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="contact-info">
        <div class="container">
            <div class="section-title">
                <h2>Contact Information</h2>
            </div>
            <div class="contact-grid">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Email Us</h3>
                    <p>For general inquiries and information</p>
                    <a href="mailto:info@nominoafrikana.com" class="contact-link">info@nominoafrikana.com</a>
                </div>
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3>Bookings</h3>
                    <p>For performance and event bookings</p>
                    <a href="mailto:bookings@nominoafrikana.com" class="contact-link">bookings@nominoafrikana.com</a>
                </div>
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h3>Call Us</h3>
                    <p>Available Monday - Friday, 9AM - 5PM GMT</p>
                    <a href="tel:+233123456789" class="contact-link">+233 123 456 789</a>
                </div>
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Visit Us</h3>
                    <p>Based in Accra, Ghana with global performances</p>
                    <p>Cultural Arts District, Accra, Ghana</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section" id="contact-form">
        <div class="container">
            <div class="section-title">
                <h2>Send a Message</h2>
            </div>
            <div class="form-container">
                <div class="form-header">
                    <h2>We'd Love to Hear From You</h2>
                    <p>Fill out the form below and we'll get back to you as soon as possible</p>
                </div>
                <form class="contact-form" id="main-contact-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="first-name">First Name</label>
                            <input type="text" id="first-name" class="form-control" placeholder="Your first name" required>
                        </div>
                        <div class="form-group">
                            <label for="last-name">Last Name</label>
                            <input type="text" id="last-name" class="form-control" placeholder="Your last name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" class="form-control" placeholder="Your email address" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" class="form-control" placeholder="Your phone number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <select id="subject" class="form-control" required>
                            <option value="" disabled selected>Select a subject</option>
                            <option value="booking">Performance Booking</option>
                            <option value="collaboration">Collaboration</option>
                            <option value="workshop">Workshop Inquiry</option>
                            <option value="general">General Information</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" class="form-control" placeholder="Please type your message here..." required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <div class="section-title">
                <h2>Our Team</h2>
            </div>
            <div class="team-grid">
                <div class="team-member">
                    <div class="member-image">
                        <img src="https://images.unsplash.com/photo-1511735111819-9a3f7709049c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80" alt="Nomino Afrikana">
                    </div>
                    <div class="member-info">
                        <h3>Nomino Afrikana</h3>
                        <span class="member-role">Founder & Lead Artist</span>
                        <p>Visionary musician and cultural ambassador dedicated to preserving African musical traditions.</p>
                        <div class="member-contact">
                            <a href="mailto:nomino@nominoafrikana.com">nomino@nominoafrikana.com</a>
                        </div>
                    </div>
                </div>
                <div class="team-member">
                    <div class="member-image">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80" alt="Kofi Mensah">
                    </div>
                    <div class="member-info">
                        <h3>Kofi Mensah</h3>
                        <span class="member-role">Manager & Booking Agent</span>
                        <p>Handles all performance bookings, scheduling, and business inquiries.</p>
                        <div class="member-contact">
                            <a href="mailto:kofi@nominoafrikana.com">kofi@nominoafrikana.com</a>
                        </div>
                    </div>
                </div>
                <div class="team-member">
                    <div class="member-image">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80" alt="Amina Diallo">
                    </div>
                    <div class="member-info">
                        <h3>Amina Diallo</h3>
                        <span class="member-role">Cultural Director</span>
                        <p>Ensures cultural authenticity and manages educational programs.</p>
                        <div class="member-contact">
                            <a href="mailto:amina@nominoafrikana.com">amina@nominoafrikana.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="section-title">
                <h2>Frequently Asked Questions</h2>
            </div>
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>How can I book Nomino Afrikana for an event?</h3>
                        <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>To book Nomino for an event, please contact our booking manager Kofi Mensah at <a href="mailto:bookings@nominoafrikana.com" style="color: var(--secondary);">bookings@nominoafrikana.com</a>. Include details about your event such as date, location, type of event, and audience size. We typically respond to booking inquiries within 2-3 business days.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Does Nomino offer workshops or educational programs?</h3>
                        <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, Nomino offers workshops on traditional African instruments, rhythms, and musical heritage. These can be tailored for schools, community organizations, or corporate events. Contact our cultural director Amina Diallo at <a href="mailto:amina@nominoafrikana.com" style="color: var(--secondary);">amina@nominoafrikana.com</a> for more information about workshop offerings and availability.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What types of events does Nomino perform at?</h3>
                        <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Nomino performs at a variety of events including music festivals, cultural celebrations, corporate events, private functions, educational institutions, and community gatherings. Her performances can be tailored to suit the specific needs and atmosphere of your event, from intimate acoustic sets to full ensemble productions.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>How far in advance should I book for an event?</h3>
                        <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>We recommend booking at least 3-6 months in advance for optimal availability, especially for events during peak festival seasons (typically May-September). However, we do accommodate last-minute bookings when our schedule permits. Contact us with your event details regardless of timeline, and we'll do our best to accommodate your needs.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Can Nomino collaborate with other artists or musicians?</h3>
                        <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Absolutely! Nomino is open to collaborations that align with her mission of preserving and celebrating African musical heritage. She has collaborated with artists across various genres and disciplines. For collaboration inquiries, please email <a href="mailto:collaborations@nominoafrikana.com" style="color: var(--secondary);">collaborations@nominoafrikana.com</a> with details about your project.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container">
            <div class="map-container">
                <div class="map-content">
                    <h2>Find Us</h2>
                    <p>While Nomino Afrikana performs globally, her creative home is in Accra, Ghana - the heart of West African musical tradition. Our base in the Cultural Arts District serves as both a rehearsal space and cultural center where we develop new works and host community programs.</p>
                    <p>For visits to our studio or to learn more about our community initiatives, please schedule an appointment in advance.</p>
                    <a href="#contact-form" class="btn">Schedule a Visit</a>
                </div>
                <div class="map-placeholder">
                    <div class="map-overlay">
                        <div>
                            <h3>Accra, Ghana</h3>
                            <p>Cultural Arts District</p>
                            <p>By Appointment Only</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Connect Section -->
    <section class="social-connect">
        <div class="container">
            <div class="social-content">
                <h2>Connect With Us</h2>
                <p>Follow Nomino Afrikana on social media for the latest updates, behind-the-scenes content, and exclusive insights into African musical heritage.</p>
                <div class="social-links">
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-spotify"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-tiktok"></i></a>
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
                    <li><a href="events.html">Events & Gallery</a></li>
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
            
            // FAQ accordion functionality
            const faqItems = document.querySelectorAll('.faq-item');
            
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                
                question.addEventListener('click', function() {
                    // Close all other FAQ items
                    faqItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.classList.remove('active');
                        }
                    });
                    
                    // Toggle current item
                    item.classList.toggle('active');
                });
            });
            
            // Contact form submission
            const contactForm = document.getElementById('main-contact-form');
            
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Get form values
                const firstName = document.getElementById('first-name').value;
                const email = document.getElementById('email').value;
                const subject = document.getElementById('subject').value;
                
                // In a real implementation, you would send this data to a server
                // For this example, we'll just show a success message
                
                // Create success message
                const successMessage = document.createElement('div');
                successMessage.style.cssText = `
                    background: rgba(212, 175, 55, 0.2);
                    border: 1px solid var(--secondary);
                    color: var(--secondary);
                    padding: 15px;
                    border-radius: 5px;
                    margin-top: 20px;
                    text-align: center;
                `;
                successMessage.innerHTML = `
                    <h3>Thank You, ${firstName}!</h3>
                    <p>Your message has been sent successfully. We'll respond to your ${subject} inquiry at ${email} within 2 business days.</p>
                `;
                
                // Insert success message after the form
                contactForm.parentNode.insertBefore(successMessage, contactForm.nextSibling);
                
                // Reset form
                contactForm.reset();
                
                // Remove success message after 5 seconds
                setTimeout(() => {
                    successMessage.remove();
                }, 5000);
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