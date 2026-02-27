//  JS FILE LINKED TO THE events.blade.php in views

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
    loadEventsData();
    loadGalleryData();
    
    // Event tabs functionality
    const tabBtns = document.querySelectorAll('.tab-btn');
    
    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            tabBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            const filter = this.getAttribute('data-tab');
            filterEvents(filter);
        });
    });
    
    // Gallery filtering
    const galleryFilters = document.querySelectorAll('.gallery-filter');
    
    galleryFilters.forEach(filter => {
        filter.addEventListener('click', function() {
            // Remove active class from all filters
            galleryFilters.forEach(f => f.classList.remove('active'));
            // Add active class to clicked filter
            this.classList.add('active');
            
            const category = this.getAttribute('data-filter');
            filterGallery(category);
        });
    });
    
    // Gallery modal functionality
    const modal = document.getElementById('gallery-modal');
    const closeModal = document.querySelector('.close-modal');
    
    // Close modal
    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    });
    
    // Close modal when clicking outside
    window.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
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

// Load events data from API
async function loadEventsData() {
    try {
        const response = await fetch(`${API_BASE_URL}/event/all`);
        if (!response.ok) {
            throw new Error('Failed to fetch events');
        }
        eventsData = await response.json();
        renderEvents();
    } catch (error) {
        console.error('Error loading events:', error);
        document.getElementById('upcoming-events-grid').innerHTML = 
            '<div class="loading">Error loading events. Please try again later.</div>';
        document.getElementById('past-events-grid').innerHTML = 
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
        renderGallery();
    } catch (error) {
        console.error('Error loading gallery:', error);
        document.getElementById('gallery-grid').innerHTML = 
            '<div class="loading">Error loading gallery. Please try again later.</div>';
    }
}

// Render events
function renderEvents() {
    const now = new Date();
    const upcomingEvents = eventsData.filter(event => new Date(event.date) >= now);
    const pastEvents = eventsData.filter(event => new Date(event.date) < now);

    renderUpcomingEvents(upcomingEvents);
    renderPastEvents(pastEvents);
}

// Render upcoming events
function renderUpcomingEvents(events) {
    const grid = document.getElementById('upcoming-events-grid');
    
    if (events.length === 0) {
        grid.innerHTML = '<div class="loading">No upcoming events scheduled. Check back soon!</div>';
        return;
    }

    grid.innerHTML = events.map(event => `
        <div class="event-card" data-category="${event.event_type}">
            <div class="event-image">
                <img src="${event.image || 'https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'}" alt="${event.title}">
                <div class="event-date">
                    <span class="day">${new Date(event.date).getDate()}</span>
                    <span class="month">${new Date(event.date).toLocaleString('default', { month: 'short' })}</span>
                </div>
            </div>
            <div class="event-info">
                <h3>${event.title}</h3>
                <div class="event-meta">
                    <span><i class="fas fa-map-marker-alt"></i> ${event.location || 'TBA'}</span>
                    <span><i class="far fa-clock"></i> ${formatEventTime(event.date)}</span>
                </div>
                <div class="event-description">
                    <p>${event.description || 'Join us for an unforgettable musical experience.'}</p>
                </div>
                <a href="#" class="btn">Get Tickets</a>
            </div>
        </div>
    `).join('');
}

// Render past events
function renderPastEvents(events) {
    const grid = document.getElementById('past-events-grid');
    
    if (events.length === 0) {
        grid.innerHTML = '<div class="loading">No past events to display.</div>';
        return;
    }

    grid.innerHTML = events.map(event => `
        <div class="past-event-card">
            <div class="past-event-image">
                <img src="${event.image || 'https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'}" alt="${event.title}">
            </div>
            <div class="past-event-info">
                <h3>${event.title}</h3>
                <div class="past-event-meta">
                    <span>${event.location || 'Various Locations'}</span>
                    <span>${formatEventDate(event.date)}</span>
                </div>
                <p>${event.description || 'A memorable performance by Nomino Afrikana.'}</p>
            </div>
        </div>
    `).join('');
}

// Render gallery
function renderGallery() {
    const grid = document.getElementById('gallery-grid');
    
    if (galleryData.length === 0) {
        grid.innerHTML = '<div class="loading">No gallery items available.</div>';
        return;
    }

    grid.innerHTML = galleryData.map(item => `
        <div class="gallery-item" data-category="${item.category}" data-id="${item.id}">
            <img src="${item.image_url || 'https://images.unsplash.com/photo-1516280440614-37939bbacd81?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'}" alt="${item.caption || 'Gallery Image'}">
            <div class="gallery-overlay">
                <h3>${item.caption || 'Performance Image'}</h3>
                <p>${formatCategoryName(item.category)}</p>
            </div>
            <div class="view-icon">
                <i class="fas fa-expand"></i>
            </div>
        </div>
    `).join('');

    // Add click event listeners to gallery items
    document.querySelectorAll('.gallery-item').forEach(item => {
        item.addEventListener('click', function() {
            const itemId = this.getAttribute('data-id');
            const galleryItem = galleryData.find(g => g.id == itemId);
            
            if (galleryItem) {
                const modal = document.getElementById('gallery-modal');
                const modalImg = document.getElementById('modal-img');
                const modalTitle = document.getElementById('modal-title');
                const modalDesc = document.getElementById('modal-desc');
                const modalCategory = document.getElementById('modal-category');
                const modalDate = document.getElementById('modal-date');

                modalImg.setAttribute('src', galleryItem.image_url || 'https://images.unsplash.com/photo-1516280440614-37939bbacd81?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
                modalImg.setAttribute('alt', galleryItem.caption || 'Gallery Image');
                modalTitle.textContent = galleryItem.caption || 'Performance Image';
                modalDesc.textContent = galleryItem.caption || 'A captivating moment from Nomino Afrikana\'s performances.';
                modalCategory.textContent = formatCategoryName(galleryItem.category);
                modalDate.textContent = galleryItem.created_at ? formatEventDate(galleryItem.created_at) : 'Recent';
                
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden';
            }
        });
    });
}

// Filter events by category
function filterEvents(category) {
    const eventCards = document.querySelectorAll('.event-card');
    eventCards.forEach(card => {
        if (category === 'all' || card.getAttribute('data-category') === category) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

// Filter gallery by category
function filterGallery(category) {
    const galleryItems = document.querySelectorAll('.gallery-item');
    galleryItems.forEach(item => {
        if (category === 'all' || item.getAttribute('data-category') === category) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}

// Helper function to format event time
function formatEventTime(dateString) {
    const date = new Date(dateString);
    return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
}

// Helper function to format event date
function formatEventDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('default', { month: 'short', year: 'numeric' });
}

// Helper function to format category name for display
function formatCategoryName(category) {
    return category.split('_').map(word => 
        word.charAt(0).toUpperCase() + word.slice(1)
    ).join(' ');
}