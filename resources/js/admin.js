// JS FILE LINKED TO THE admin.blade.php in views

const token = sessionStorage.getItem("token");
if (!token) window.location.href = "login.html";

// Global state
let currentSection = 'dashboard';

// Initialize the application
document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
});

async function initializeApp() {
    // Load user info
    await loadUserInfo();
    
    // Setup navigation
    setupNavigation();
    
    // Setup forms
    setupForms();
    
    // Load initial data
    await loadDashboardStats();
    
    // Restore active section from session storage
    const savedSection = sessionStorage.getItem('activeSection');
    if (savedSection) {
        switchSection(savedSection);
    }
}

// Load user info
async function loadUserInfo() {
    try {
        const res = await fetch(`${API_BASE_URL}/user/current_user`, {
            headers: { 
                Authorization: `Bearer ${token}`,
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            credentials: 'include',
        });
        if (!res.ok) throw new Error();
        const data = await res.json();
        document.getElementById('loggedUser').innerHTML = 
            `<i class="fas fa-user"></i> <span>${data.name || data.email}</span>`;
    } catch {
        sessionStorage.clear();
        window.location.href = "login.html";
    }
}

// Setup navigation
function setupNavigation() {
    const navLinks = document.querySelectorAll('.nav-links li[data-section]');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            const section = this.getAttribute('data-section');
            switchSection(section);
        });
    });
}

// Switch sections
window.switchSection = function(section) {
    // Update active nav link
    document.querySelectorAll('.nav-links li').forEach(li => {
        li.classList.remove('active');
    });
    document.querySelector(`[data-section="${section}"]`).classList.add('active');
    
    // Update active section
    document.querySelectorAll('.section').forEach(sec => {
        sec.classList.remove('active');
    });
    document.getElementById(section).classList.add('active');
    
    // Save current section
    currentSection = section;
    sessionStorage.setItem('activeSection', section);
    
    // Load section data if needed
    if (section !== 'dashboard') {
        loadSectionData(section);
    }
}

// Load section data
async function loadSectionData(section) {
    switch(section) {
        case 'discography':
            await loadDiscography();
            break;
        case 'gallery':
            await loadGallery();
            break;
        case 'videos':
            await loadVideos();
            break;
        case 'events':
            await loadEvents();
            break;
    }
}

// Setup forms
function setupForms() {
    // Discography form
    document.getElementById('discForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        await handleAdd('disc', e.target);
    });

    // Gallery form
    document.getElementById('galleryForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        await handleAdd('gallery', e.target);
    });

    // Video form
    document.getElementById('videoForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        await handleAdd('video', e.target);
    });

    // Event form
    document.getElementById('eventForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        await handleAdd('event', e.target);
    });

    // Update form
    document.getElementById('updateForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        await handleUpdate(e.target);
    });
}

//  add handler
async function handleAdd(section, form) {
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());
    
    // Convert event_id to number if present if not mark it us null
    data.event_id = data.event_id ? parseInt(data.event_id) : null;

    
    try {
        const res = await fetch(`${API_BASE_URL}/${section}/add`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Authorization: `Bearer ${token}`,
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            credentials: 'include',
            body: JSON.stringify(data)
        });
        
        if (!res.ok) {
            const errorText = await res.text();
            throw new Error(`Failed to add: ${res.status} - ${errorText}`);
        }
        
        const result = await res.json();
        showNotification('✅ Item added successfully!', 'success');
        form.reset();
        await loadSectionData(getSectionName(section));
        await loadDashboardStats();
    } catch (err) {
        console.error(`Add ${section} error:`, err);
        showNotification(`Failed to add item: ${err.message}`, 'error');
    }
}

//  update handler
async function handleUpdate(form) {
    const section = document.getElementById('updateSection').value;
    const id = document.getElementById('updateId').value;
    const formData = new FormData(form);
    
    const updates = {};
    for (let [key, value] of formData.entries()) {
        if (key !== 'section' && key !== 'id' && value !== '') {
            updates[key] = value;
        }
    }

    // Convert event_id to number if present
    if (updates.event_id) updates.event_id = parseInt(updates.event_id);

    const endpointMap = {
        'disc': 'disc',
        'gallery': 'gallery', 
        'video': 'video',
        'event': 'event'
    };
    
    const apiSection = endpointMap[section] || section;

    try {
        const res = await fetch(`${API_BASE_URL}/${apiSection}/${id}`, {
            method: "PATCH",
            headers: {
                "Content-Type": "application/json", 
                Authorization: `Bearer ${token}`,
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            credentials: 'include',
            body: JSON.stringify(updates),
        });
        
        if (!res.ok) {
            // Check if it's a 404 specifically
            if (res.status === 404) {
                throw new Error(`Endpoint not found: ${API_BASE_URL}/${apiSection}/${id}. Check your backend routes.`);
            }
            const errorText = await res.text();
            throw new Error(`Failed to update: ${res.status} - ${errorText}`);
        }
        
        const result = await res.json();
        showNotification('✅ Item updated successfully!', 'success');
        closeModal();
        await loadSectionData(getSectionName(section));
        await loadDashboardStats();
    } catch (err) {
        console.error("❌ Update error:", err);
        showNotification(`Failed to update item: ${err.message}`, 'error');
    }
}

// Delete item
window.deleteItem = async function(section, id) {
    if (!confirm("Are you sure you want to delete this item?")) return;
    
    const endpointMap = {
        'disc': 'disc',
        'gallery': 'gallery', 
        'video': 'video',
        'event': 'event'
    };
    
    const apiSection = endpointMap[section] || section;
    
    try {
        const res = await fetch(`${API_BASE_URL}/${apiSection}/${id}`, {
            method: "DELETE",
            headers: { 
                Authorization: `Bearer ${token}`,
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            credentials: 'include',
        });
        
        if (!res.ok) {
            const errorText = await res.text();
            throw new Error(`Delete failed: ${res.status} - ${errorText}`);
        }
        
        const data = await res.json();
        showNotification(data.message || "Item deleted successfully", 'success');
        await loadSectionData(getSectionName(section));
        await loadDashboardStats();
    } catch (e) {
        console.error("Delete failed:", e);
        showNotification("Delete failed: " + e.message, 'error');
    }
}

// Open modal for editing 
window.openModal = function(item, section) {
    console.log("Opening modal for:", section, item);
    
    const modal = document.getElementById('updateModal');
    const modalFields = document.getElementById('modalFields');
    
    // Show modal
    modal.classList.add('active');
    
    // Set hidden fields - use the correct API section name
    document.getElementById('updateSection').value = section;
    document.getElementById('updateId').value = item.id;
    
    // Generate modal fields based on section
    let fieldsHTML = '';
    
    if (section === 'disc') {
        fieldsHTML = `
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="${escapeHtml(item.title || '')}" required>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category" required>
                    <option value="album" ${item.category === 'album' ? 'selected' : ''}>Album</option>
                    <option value="ep" ${item.category === 'ep' ? 'selected' : ''}>EP</option>
                    <option value="single" ${item.category === 'single' ? 'selected' : ''}>Single</option>
                </select>
            </div>
            <div class="form-group">
                <label>Cover Image URL</label>
                <input type="text" name="cover_image" value="${escapeHtml(item.cover_image || '')}">
            </div>
            <div class="form-group">
                <label>Release Date</label>
                <input type="date" name="release_date" value="${item.release_date || ''}">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="3">${escapeHtml(item.description || '')}</textarea>
            </div>
            <div class="form-group">
                <label>Spotify URL</label>
                <input type="text" name="spotify_url" value="${escapeHtml(item.spotify_url || '')}">
            </div>
            <div class="form-group">
                <label>YouTube URL</label>
                <input type="text" name="youtube_url" value="${escapeHtml(item.youtube_url || '')}">
            </div>
            <div class="form-group">
                <label>Apple Music URL</label>
                <input type="text" name="apple_music_url" value="${escapeHtml(item.apple_music_url || '')}">
            </div>
        `;
    } else if (section === 'gallery') {
        fieldsHTML = `
            <div class="form-group">
                <label>Image URL</label>
                <input type="text" name="image_url" value="${escapeHtml(item.image_url || '')}" required>
            </div>
            <div class="form-group">
                <label>Caption</label>
                <input type="text" name="caption" value="${escapeHtml(item.caption || '')}">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category" required>
                    <option value="performance" ${item.category === 'performance' ? 'selected' : ''}>Performance</option>
                    <option value="behind_the_scenes" ${item.category === 'behind_the_scenes' ? 'selected' : ''}>Behind the Scenes</option>
                    <option value="instruments" ${item.category === 'instruments' ? 'selected' : ''}>Instruments</option>
                    <option value="travel" ${item.category === 'travel' ? 'selected' : ''}>Travel</option>
                </select>
            </div>
            <div class="form-group">
                <label>Event ID</label>
                <input type="number" name="event_id" value="${item.event_id || ''}">
            </div>
        `;
    } else if (section === 'video') {
        fieldsHTML = `
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="${escapeHtml(item.title || '')}" required>
            </div>
            <div class="form-group">
                <label>YouTube URL</label>
                <input type="text" name="youtube_url" value="${escapeHtml(item.youtube_url || '')}">
            </div>
            <div class="form-group">
                <label>Thumbnail URL</label>
                <input type="text" name="thumbnail" value="${escapeHtml(item.thumbnail || '')}">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="3">${escapeHtml(item.description || '')}</textarea>
            </div>
        `;
    } else if (section === 'event') {
        fieldsHTML = `
            <div class="form-group">
                <label>Event Name</label>
                <input type="text" name="title" value="${escapeHtml(item.title || '')}" required>
            </div>
            <div class="form-group">
                <label>Event Type</label>
                <select name="event_type" required>
                    <option value="festival" ${item.event_type === 'festival' ? 'selected' : ''}>Festival</option>
                    <option value="concert" ${item.event_type === 'concert' ? 'selected' : ''}>Concert</option>
                    <option value="workshop" ${item.event_type === 'workshop' ? 'selected' : ''}>Workshop</option>
                </select>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="date" name="date" value="${item.date || ''}" required>
            </div>
            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" value="${escapeHtml(item.location || '')}">
            </div>
            <div class="form-group">
                <label>Event Image URL</label>
                <input type="text" name="image" value="${escapeHtml(item.image || '')}">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="3">${escapeHtml(item.description || '')}</textarea>
            </div>
        `;
    }
    
    modalFields.innerHTML = fieldsHTML;
}

// Close modal
window.closeModal = function() {
    document.getElementById('updateModal').classList.remove('active');
}

// Close modal when clicking outside
document.getElementById('updateModal').addEventListener('click', (e) => {
    if (e.target.id === 'updateModal') {
        closeModal();
    }
});

// Show notification
function showNotification(message, type = 'info') {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notif => notif.remove());
    
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        padding: 1rem 1.5rem;
        border-radius: 5px;
        color: white;
        font-weight: bold;
        z-index: 3000;
        animation: slideIn 0.3s ease;
        ${type === 'success' ? 'background: #2E8B57;' : ''}
        ${type === 'error' ? 'background: var(--red);' : ''}
        ${type === 'info' ? 'background: var(--primary-brown);' : ''}
    `;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 5000);
}

// Load dashboard stats
async function loadDashboardStats() {
    try {
        const [discRes, galleryRes, videoRes, eventRes] = await Promise.all([
            fetch(`${API_BASE_URL}/disc/all`, { 
                headers: { 
                    Authorization: `Bearer ${token}`,
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                credentials: 'include'
            }),
            fetch(`${API_BASE_URL}/gallery/all`, { 
                headers: { 
                    Authorization: `Bearer ${token}`,
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                credentials: 'include'
            }),
            fetch(`${API_BASE_URL}/video/all`, { 
                headers: { 
                    Authorization: `Bearer ${token}`,
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                credentials: 'include'
            }),
            fetch(`${API_BASE_URL}/event/all`, { 
                headers: { 
                    Authorization: `Bearer ${token}`,
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                credentials: 'include'
            })
        ]);
        
        if (discRes.ok) {
            const discData = await discRes.json();
            document.getElementById('discCount').textContent = discData.length;
        }
        
        if (galleryRes.ok) {
            const galleryData = await galleryRes.json();
            document.getElementById('galleryCount').textContent = galleryData.length;
        }
        
        if (videoRes.ok) {
            const videoData = await videoRes.json();
            document.getElementById('videoCount').textContent = videoData.length;
        }
        
        if (eventRes.ok) {
            const eventData = await eventRes.json();
            document.getElementById('eventCount').textContent = eventData.length;
        }
    } catch (error) {
        console.error('Error loading dashboard stats:', error);
    }
}

// Get section name for loading
function getSectionName(apiSection) {
    const sectionMap = {
        'disc': 'discography',
        'gallery': 'gallery',
        'video': 'videos',  
        'event': 'events'  
    };
    return sectionMap[apiSection] || apiSection;
}

// Logout
window.logout = async function() {
    try {
        await fetch(`${API_BASE_URL}/user/logout`, {
            method: "DELETE",
            headers: { 
                Authorization: `Bearer ${token}`,
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            credentials: 'include'
        });
    } finally {
        sessionStorage.clear();
        window.location.href = "/";
    }
}

// Helper function to escape HTML
function escapeHtml(text) {
    if (!text) return '';
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

// Helper function to stringify for onclick attributes
function safeStringify(obj) {
    return JSON.stringify(obj)
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#39;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;');
}

// Load Discography data function
async function loadDiscography() {
    const list = document.getElementById('discographyList');
    list.innerHTML = '<tr><td colspan="10">Loading...</td></tr>';
    
    try {
        const res = await fetch(`${API_BASE_URL}/disc/all`, {
            headers: { 
                Authorization: `Bearer ${token}`,
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            credentials: 'include', 
        });
        if (!res.ok) throw new Error();
        const data = await res.json();
        
        list.innerHTML = '';
        if (!data.length) {
            list.innerHTML = '<tr><td colspan="10">No discography items found.</td></tr>';
            return;
        }
        
        data.forEach(item => {
            const tr = document.createElement('tr');
            // Use safeStringify to prevent syntax errors
            const safeItem = safeStringify(item);
            tr.innerHTML = `
                <td>${item.id}</td>
                <td>${item.title}</td>
                <td>${item.category}</td>
                <td>${item.release_date || 'N/A'}</td>
                <td>${item.cover_image ? 'Yes' : 'No'}</td>
                <td>${item.spotify_url ? 'Yes' : 'No'}</td>
                <td>${item.youtube_url ? 'Yes' : 'No'}</td>
                <td>${item.apple_music_url ? 'Yes' : 'No'}</td>
                <td>${item.description ? item.description.substring(0, 50) + '...' : 'N/A'}</td>
                <td class="actions">
                    <button class="btn btn-primary btn-sm" onclick='openModal(${safeItem}, "disc")'>
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="deleteItem('disc', ${item.id})">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </td>
            `;
            list.appendChild(tr);
        });
    } catch (error) {
        console.error('Load discography failed:', error);
        list.innerHTML = '<tr><td colspan="10">Failed to load discography</td></tr>';
    }
}
// Load Gallery data function
async function loadGallery() {
    const list = document.getElementById('galleryList');
    list.innerHTML = '<tr><td colspan="6">Loading...</td></tr>';
    
    try {
        const res = await fetch(`${API_BASE_URL}/gallery/all`, {
            headers: { 
                Authorization: `Bearer ${token}`,
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            credentials: 'include', 
        });
        if (!res.ok) throw new Error();
        const data = await res.json();
        
        list.innerHTML = '';
        if (!data.length) {
            list.innerHTML = '<tr><td colspan="6">No gallery items found.</td></tr>';
            return;
        }
        
        data.forEach(item => {
            const tr = document.createElement('tr');
            // Use safeStringify to prevent syntax errors
            const safeItem = safeStringify(item);
            tr.innerHTML = `
                <td>${item.id}</td>
                <td>${item.image_url}</td>
                <td>${item.caption || 'N/A'}</td>
                <td>${item.category}</td>
                <td>${item.event_id || 'N/A'}</td>
                <td class="actions">
                    <button class="btn btn-primary btn-sm" onclick='openModal(${safeItem}, "gallery")'>
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="deleteItem('gallery', ${item.id})">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </td>
            `;
            list.appendChild(tr);
        });
    } catch (error) {
        console.error('Load gallery failed:', error);
        list.innerHTML = '<tr><td colspan="6">Failed to load gallery</td></tr>';
    }
}

// Load Videos data function
async function loadVideos() {
    const list = document.getElementById('videoList');
    list.innerHTML = '<tr><td colspan="6">Loading...</td></tr>';
    
    try {
        const res = await fetch(`${API_BASE_URL}/video/all`, {
            headers: { 
                Authorization: `Bearer ${token}`,
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            credentials: 'include',
        });
        if (!res.ok) throw new Error();
        const data = await res.json();
        
        list.innerHTML = '';
        if (!data.length) {
            list.innerHTML = '<tr><td colspan="6">No videos found.</td></tr>';
            return;
        }
        
        data.forEach(item => {
            const tr = document.createElement('tr');
            // Use safeStringify to prevent syntax errors
            const safeItem = safeStringify(item);
            tr.innerHTML = `
                <td>${item.id}</td>
                <td>${item.title}</td>
                <td>${item.youtube_url || 'N/A'}</td>
                <td>${item.thumbnail ? 'Yes' : 'No'}</td>
                <td>${item.description ? item.description.substring(0, 50) + '...' : 'N/A'}</td>
                <td class="actions">
                    <button class="btn btn-primary btn-sm" onclick='openModal(${safeItem}, "video")'>
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="deleteItem('video', ${item.id})">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </td>
            `;
            list.appendChild(tr);
        });
    } catch (error) {
        console.error('Load videos failed:', error);
        list.innerHTML = '<tr><td colspan="6">Failed to load videos</td></tr>';
    }
}

// Load Events data function
async function loadEvents() {
    const list = document.getElementById('eventList');
    list.innerHTML = '<tr><td colspan="8">Loading...</td></tr>';
    
    try {
        const res = await fetch(`${API_BASE_URL}/event/all`, {
            headers: { 
                Authorization: `Bearer ${token}`,
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            credentials: 'include',
        });
        if (!res.ok) throw new Error();
        const data = await res.json();
        
        list.innerHTML = '';
        if (!data.length) {
            list.innerHTML = '<tr><td colspan="8">No events found.</td></tr>';
            return;
        }
        
        data.forEach(item => {
            const tr = document.createElement('tr');
            // Use safeStringify to prevent syntax errors
            const safeItem = safeStringify(item);
            tr.innerHTML = `
                <td>${item.id}</td>
                <td>${item.title}</td>
                <td>${item.event_type}</td>
                <td>${item.date}</td>
                <td>${item.location || 'N/A'}</td>
                <td>${item.image ? 'Yes' : 'No'}</td>
                <td>${item.description ? item.description.substring(0, 50) + '...' : 'N/A'}</td>
                <td class="actions">
                    <button class="btn btn-primary btn-sm" onclick='openModal(${safeItem}, "event")'>
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="deleteItem('event', ${item.id})">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </td>
            `;
            list.appendChild(tr);
        });
    } catch (error) {
        console.error('Load events failed:', error);
        list.innerHTML = '<tr><td colspan="8">Failed to load events</td></tr>';
    }
}























//  Copyright © 2025 David Parsley. Licensed under CC BY-NC 4.0 