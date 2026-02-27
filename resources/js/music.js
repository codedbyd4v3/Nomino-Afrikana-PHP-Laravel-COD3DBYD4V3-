//  JS FILE LINKED TO THE music.blade.php in views

let discographyData = [];
let videosData = [];

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
    loadVideosData();
    
    // Discography filtering
    const filterBtns = document.querySelectorAll('.filter-btn');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            filterBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            const filter = this.getAttribute('data-filter');
            filterDiscography(filter);
        });
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

// Load discography data from API
async function loadDiscographyData() {
    try {
        const response = await fetch(`${API_BASE_URL}/disc/all`);
        if (!response.ok) {
            throw new Error('Failed to fetch discography');
        }
        discographyData = await response.json();
        renderFeaturedAlbum();
        renderDiscography();
    } catch (error) {
        console.error('Error loading discography:', error);
        document.getElementById('featured-content').innerHTML = 
            '<div class="loading">Error loading featured album. Please try again later.</div>';
        document.getElementById('albums-grid').innerHTML = 
            '<div class="loading">Error loading discography. Please try again later.</div>';
    }
}

// Load videos data from API
async function loadVideosData() {
    try {
        const response = await fetch(`${API_BASE_URL}/video/all`);
        if (!response.ok) {
            throw new Error('Failed to fetch videos');
        }
        videosData = await response.json();
        renderVideos();
    } catch (error) {
        console.error('Error loading videos:', error);
        document.getElementById('videos-grid').innerHTML = 
            '<div class="loading">Error loading videos. Please try again later.</div>';
    }
}

// Render featured album (latest album)
function renderFeaturedAlbum() {
    const featuredContent = document.getElementById('featured-content');
    
    if (discographyData.length === 0) {
        featuredContent.innerHTML = '<div class="loading">No albums available.</div>';
        return;
    }

    const albums = discographyData.filter(item => item.category === 'album');
    if (albums.length === 0) {
        featuredContent.innerHTML = '<div class="loading">No albums available.</div>';
        return;
    }

    const featuredAlbum = albums[0]; 

    featuredContent.innerHTML = `
        <div class="featured-content">
            <div class="album-art">
                <img src="${featuredAlbum.cover_image || 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'}" alt="${featuredAlbum.title}">
            </div>
            <div class="album-info">
                <h2>${featuredAlbum.title}</h2>
                <div class="album-meta">
                    <span><i class="far fa-calendar"></i> Released: ${featuredAlbum.release_date ? new Date(featuredAlbum.release_date).getFullYear() : '2023'}</span>
                    <span><i class="fas fa-music"></i> ${formatCategoryName(featuredAlbum.category)}</span>
                </div>
                <div class="album-description">
                    <p>${featuredAlbum.description || 'A captivating musical journey that blends traditional African rhythms with contemporary sounds, creating a unique auditory experience that resonates with listeners across generations.'}</p>
                </div>
                <div class="album-tracks">
                    <h3>About This Album</h3>
                    <p>${featuredAlbum.description || 'This album represents a significant milestone in Nomino Afrikana\'s musical journey, showcasing her unique ability to bridge traditional African music with modern sensibilities.'}</p>
                </div>
                <div class="album-actions">
                    <a href="${featuredAlbum.spotify_url || '#'}" class="btn" ${!featuredAlbum.spotify_url ? 'style="display:none"' : ''}><i class="fas fa-play"></i> Listen Now</a>
                    <a href="#" class="btn"><i class="fas fa-shopping-cart"></i> Purchase</a>
                </div>
                <div class="streaming-links">
                    <a href="${featuredAlbum.spotify_url || '#'}" ${!featuredAlbum.spotify_url ? 'style="display:none"' : ''}><i class="fab fa-spotify"></i></a>
                    <a href="${featuredAlbum.apple_music_url || '#'}" ${!featuredAlbum.apple_music_url ? 'style="display:none"' : ''}><i class="fab fa-apple"></i></a>
                    <a href="#"><i class="fab fa-soundcloud"></i></a>
                    <a href="${featuredAlbum.youtube_url || '#'}" ${!featuredAlbum.youtube_url ? 'style="display:none"' : ''}><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-deezer"></i></a>
                </div>
            </div>
        </div>
    `;
}

// Render discography grid
function renderDiscography() {
    const grid = document.getElementById('albums-grid');
    
    if (discographyData.length === 0) {
        grid.innerHTML = '<div class="loading">No music releases available.</div>';
        return;
    }

    grid.innerHTML = discographyData.map(item => `
        <div class="album-card" data-category="${item.category}">
            <div class="album-cover">
                <img src="${item.cover_image || 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'}" alt="${item.title}">
            </div>
            <div class="album-details">
                <h3>${item.title}</h3>
                <span class="album-year">${item.release_date ? new Date(item.release_date).getFullYear() : '2023'}</span>
                <p>${item.description || 'A unique musical creation by Nomino Afrikana.'}</p>
                <div class="album-actions" style="margin-top: 15px;">
                    ${item.spotify_url ? `<a href="${item.spotify_url}" class="btn" style="padding: 8px 15px; margin-right: 10px;"><i class="fab fa-spotify"></i></a>` : ''}
                    ${item.youtube_url ? `<a href="${item.youtube_url}" class="btn" style="padding: 8px 15px;"><i class="fab fa-youtube"></i></a>` : ''}
                    ${!item.spotify_url && !item.youtube_url ? '<a href="#" class="btn" style="padding: 8px 15px;">Listen</a>' : ''}
                </div>
            </div>
        </div>
    `).join('');
}

// Render videos
function renderVideos() {
    const grid = document.getElementById('videos-grid');
    
    if (videosData.length === 0) {
        grid.innerHTML = '<div class="loading">No videos available.</div>';
        return;
    }

    grid.innerHTML = videosData.map(video => `
        <div class="video-card">
            <div class="video-thumbnail">
                <img src="${video.thumbnail || 'https://images.unsplash.com/photo-1516280440614-37939bbacd81?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'}" alt="${video.title}">
                <div class="play-icon">
                    <i class="fas fa-play"></i>
                </div>
            </div>
            <div class="video-info">
                <h3>${video.title}</h3>
                <p>${video.description || 'Official music video by Nomino Afrikana'}</p>
                <div class="video-meta">
                    <span>${video.youtube_url ? '<i class="fab fa-youtube"></i> YouTube' : 'Video'}</span>
                    <span>${video.created_at ? formatVideoDate(video.created_at) : 'Recent'}</span>
                </div>
            </div>
        </div>
    `).join('');

    //  event video cards to open YouTube links
    document.querySelectorAll('.video-card').forEach((card, index) => {
        card.addEventListener('click', function() {
            const video = videosData[index];
            if (video.youtube_url) {
                window.open(video.youtube_url, '_blank');
            }
        });
    });
}

// Filter discography by category
function filterDiscography(category) {
    const albumCards = document.querySelectorAll('.album-card');
    albumCards.forEach(card => {
        if (category === 'all' || card.getAttribute('data-category') === category) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

// Helper function to format category name for display
function formatCategoryName(category) {
    if (!category) return 'Music';
    return category.charAt(0).toUpperCase() + category.slice(1);
}

// Helper function to format video date
function formatVideoDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('default', { month: 'short', year: 'numeric' });
}