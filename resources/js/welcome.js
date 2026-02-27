//  JS FILE LINKED TO THE welcome.blade.php in views

let discographyData = [];
let eventsData = [];
let galleryData = [];

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
    
    // Load data from API
    loadDiscographyData();
    loadEventsData();
    loadGalleryData();
    
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

// Load discography data from API
async function loadDiscographyData() {
    try {
        const response = await fetch(`${API_BASE_URL}/disc/all`);
        if (!response.ok) {
            throw new Error('Failed to fetch discography');
        }
        discographyData = await response.json();
        renderMusicSection();
    } catch (error) {
        console.error('Error loading discography:', error);
        document.getElementById('music-grid').innerHTML = 
            '<div class="loading">Error loading music. Please try again later.</div>';
    }
}

// Load events data from API
async function loadEventsData() {
    try {
        const response = await fetch(`${API_BASE_URL}/event/all`);
        if (!response.ok) {
            throw new Error('Failed to fetch events');
        }
        eventsData = await response.json();
        renderEventsSection();
    } catch (error) {
        console.error('Error loading events:', error);
        document.getElementById('events-timeline').innerHTML = 
            '<div class="loading">Error loading events. Please try again later.</div>';
    }
}

// Load gallery data from API
async function loadGalleryData() {
    try {
        const response = await fetch(`${API_BASE_URL}/gallery/all`);
        if (!response.ok) {
            throw new Error('Failed to fetch gallery');
        }
        galleryData = await response.json();
        renderGallerySection();
    } catch (error) {
        console.error('Error loading gallery:', error);
        document.getElementById('gallery-grid').innerHTML = 
            '<div class="loading">Error loading gallery. Please try again later.</div>';
    }
}

// Render music section with discography data
function renderMusicSection() {
    const grid = document.getElementById('music-grid');
    
    if (discographyData.length === 0) {
        grid.innerHTML = '<div class="loading">No music available.</div>';
        return;
    }

    //  first 3 items for the home page
    const displayItems = discographyData.slice(0, 3);

    grid.innerHTML = displayItems.map(item => `
        <div class="music-card">
            <div class="music-image">
                <img src="${item.cover_image || 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'}" alt="${item.title}">
            </div>
            <div class="music-info">
                <h3>${item.title}</h3>
                <p>${item.description || 'A unique musical creation by Nomino Afrikana.'}</p>
                <div class="album-actions" style="margin-top: 15px;">
                    ${item.spotify_url ? `<a href="${item.spotify_url}" class="btn" style="padding: 8px 15px; margin-right: 10px;"><i class="fab fa-spotify"></i></a>` : ''}
                    ${item.youtube_url ? `<a href="${item.youtube_url}" class="btn" style="padding: 8px 15px;"><i class="fab fa-youtube"></i></a>` : ''}
                    ${!item.spotify_url && !item.youtube_url ? '<a href="music.html" class="btn" style="padding: 8px 15px;">Listen</a>' : ''}
                </div>
            </div>
        </div>
    `).join('');
}

// Render events section with upcoming events
function renderEventsSection() {
    const timeline = document.getElementById('events-timeline');
    
    // Filter upcoming events (events with future dates)
    const now = new Date();
    const upcomingEvents = eventsData.filter(event => new Date(event.date) >= now);
    
    if (upcomingEvents.length === 0) {
        timeline.innerHTML = '<div class="loading">No upcoming events scheduled. Check back soon!</div>';
        return;
    }

    //  first 4 upcoming events for the home page
    const displayEvents = upcomingEvents.slice(0, 4);

    timeline.innerHTML = displayEvents.map((event, index) => `
        <div class="event-item ${index % 2 === 0 ? '' : 'even'}">
            <div class="event-content">
                <span class="event-date">${formatEventDate(event.date)}</span>
                <h3>${event.title}</h3>
                <p>${event.description || 'Join us for an unforgettable musical experience.'}</p>
                <p><strong>Location:</strong> ${event.location || 'TBA'}</p>
                <a href="events.html" class="btn">Get Tickets</a>
            </div>
        </div>
    `).join('');
}

// Render gallery section with gallery data
function renderGallerySection() {
    const grid = document.getElementById('gallery-grid');
    
    if (galleryData.length === 0) {
        grid.innerHTML = '<div class="loading">No gallery items available.</div>';
        return;
    }

    // first 4 items for the home page
    const displayItems = galleryData.slice(0, 4);

    grid.innerHTML = displayItems.map(item => `
        <div class="gallery-item">
            <img src="${item.image_url || 'https://images.unsplash.com/photo-1516280440614-37939bbacd81?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'}" alt="${item.caption || 'Gallery Image'}">
            <div class="gallery-overlay">
                <i class="fas fa-search-plus"></i>
            </div>
        </div>
    `).join('');

    // Add click event to gallery items to navigate to gallery page
    document.querySelectorAll('.gallery-item').forEach(item => {
        item.addEventListener('click', function() {
            window.location.href = 'gallery.html';
        });
    });
}

// Helper function to format event date
function formatEventDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('default', { 
        month: 'long', 
        day: 'numeric', 
        year: 'numeric' 
    });
}