<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Admin Dashboard | Nomino Afrikana</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<style>
    :root {
        --primary-brown: #8B4513;
        --light-brown: #C19A6B;
        --gold: #D4AF37;
        --cream: #F5F5DC;
        --dark-brown: #1A120B;
        --red: #B22222;
        --light-red: #FF4500;
    }
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: 'Cormorant Garamond', serif;
        background-color: var(--cream);
        color: var(--dark-brown);
        display: flex;
        min-height: 100vh;
    }
    
    h1, h2, h3, h4 {
        font-family: 'Cinzel', serif;
    }
    
    /* Header */
    .header {
        background: var(--primary-brown);
        color: var(--cream);
        padding: 1rem 2rem;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .header h1 {
        margin: 0;
        font-size: 1.5rem;
    }
    
    .user-info {
        font-size: 1rem;
    }
    
    /* Sidebar */
    .sidebar {
        width: 250px;
        background: var(--gold);
        color: var(--dark-brown);
        position: fixed;
        top: 70px;
        bottom: 0;
        display: flex;
        flex-direction: column;
        box-shadow: 2px 0 5px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
    }
    
    .logo {
        font-family: 'Cinzel', serif;
        font-size: 1.5rem;
        text-align: center;
        margin: 20px 0;
        font-weight: 700;
        padding: 0 1rem;
    }
    
    .nav-links {
        list-style: none;
        padding: 0;
        margin: 0;
        flex: 1;
    }
    
    .nav-links li {
        padding: 15px 20px;
        cursor: pointer;
        transition: 0.3s;
        border-bottom: 1px solid rgba(26, 18, 11, 0.1);
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .nav-links li:hover,
    .nav-links li.active {
        background: var(--light-brown);
    }
    
    .nav-links li i {
        width: 20px;
        text-align: center;
    }
    
    /* Main Content */
    .main-content {
        margin-left: 250px;
        margin-top: 70px;
        padding: 2rem;
        width: calc(100% - 250px);
        transition: all 0.3s ease;
    }
    
    .section {
        display: none;
        animation: fadeIn 0.5s ease;
    }
    
    .section.active {
        display: block;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* Cards */
    .card {
        background: #fff;
        color: var(--dark-brown);
        padding: 2rem;
        margin-bottom: 2rem;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        border-left: 4px solid var(--gold);
    }
    
    .card h2 {
        margin-bottom: 1.5rem;
        color: var(--primary-brown);
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .card h2 i {
        color: var(--gold);
    }
    
    /* Forms */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1rem;
        margin-bottom: 2rem;
    }
    
    .form-group {
        margin-bottom: 1rem;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
        color: var(--primary-brown);
    }
    
    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-family: 'Cormorant Garamond', serif;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }
    
    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--gold);
    }
    
    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
    }
    
    .btn {
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-family: 'Cinzel', serif;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .btn-primary {
        background: var(--primary-brown);
        color: var(--cream);
    }
    
    .btn-primary:hover {
        background: var(--light-brown);
        color: var(--dark-brown);
    }
    
    .btn-danger {
        background: var(--red);
        color: var(--cream);
    }
    
    .btn-danger:hover {
        background: var(--light-red);
    }
    
    .btn-success {
        background: #2E8B57;
        color: var(--cream);
    }
    
    .btn-success:hover {
        background: #3CB371;
    }
    
    /* Tables */
    .table-container {
        overflow-x: auto;
        margin-top: 1rem;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 800px;
    }
    
    table th,
    table td {
        padding: 1rem;
        border-bottom: 1px solid #ddd;
        text-align: left;
        word-break: break-word;
    }
    
    table th {
        background: var(--gold);
        color: var(--dark-brown);
        position: sticky;
        top: 0;
        font-weight: bold;
    }
    
    table tr:hover {
        background-color: rgba(193, 154, 107, 0.1);
    }
    
    .actions {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }
    
    .btn-sm {
        padding: 0.5rem 1rem;
        font-size: 0.8rem;
    }
    
    /* Modal */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        justify-content: center;
        align-items: center;
        z-index: 2000;
    }
    
    .modal.active {
        display: flex;
    }
    
    .modal-content {
        background: var(--cream);
        padding: 2rem;
        border-radius: 10px;
        width: 90%;
        max-width: 600px;
        max-height: 90vh;
        overflow-y: auto;
        position: relative;
        box-shadow: 0 5px 20px rgba(0,0,0,0.3);
    }
    
    .modal-header {
        display: flex;
        justify-content: between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid var(--gold);
    }
    
    .modal-header h2 {
        color: var(--primary-brown);
        margin: 0;
    }
    
    .close {
        position: absolute;
        top: 1rem;
        right: 1.5rem;
        cursor: pointer;
        font-size: 1.5rem;
        font-weight: bold;
        color: var(--primary-brown);
        transition: color 0.3s ease;
    }
    
    .close:hover {
        color: var(--red);
    }
    
    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .stat-card {
        background: #fff;
        padding: 1.5rem;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        text-align: center;
        border-top: 4px solid var(--gold);
    }
    
    .stat-number {
        font-size: 2rem;
        font-weight: bold;
        color: var(--primary-brown);
        margin-bottom: 0.5rem;
    }
    
    .stat-label {
        color: var(--dark-brown);
        font-size: 0.9rem;
    }
    
    /* Responsive */
    @media (max-width: 1024px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
        
        .main-content {
            padding: 1rem;
        }
        
        .card {
            padding: 1.5rem;
        }
    }
    
    @media (max-width: 768px) {
        .sidebar {
            width: 70px;
        }
        
        .sidebar .logo span,
        .nav-links li span {
            display: none;
        }
        
        .main-content {
            margin-left: 70px;
            width: calc(100% - 70px);
            padding: 1rem;
        }
        
        .nav-links li {
            justify-content: center;
            padding: 15px;
        }
        
        .form-actions {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
        }
        
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        table {
            min-width: 600px;
        }
    }
    
    @media (max-width: 480px) {
        .header {
            padding: 1rem;
            flex-direction: column;
            gap: 0.5rem;
            text-align: center;
        }
        
        .header h1 {
            font-size: 1.2rem;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        .modal-content {
            padding: 1rem;
            margin: 1rem;
        }
        
        .card {
            padding: 1rem;
            margin-bottom: 1rem;
        }
    }
</style>
</head>
<body>
    <!-- Copyright © 2025 David Parsley. Licensed under CC BY-NC 4.0 -->
    <!-- Header -->
    <header class="header">
        <div></div>
        <h1><i class="fas fa-crown"></i> Nomino Afrikana Admin</h1>
        <div class="user-info" id="loggedUser">
            <i class="fas fa-user"></i> <span>Guest</span>
        </div>
    </header>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <i class="fas fa-compact-disc"></i> <span>Nomino Afrikana</span>
        </div>
        <ul class="nav-links">
            <li class="active" data-section="dashboard">
                <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
            </li>
            <li data-section="discography">
                <i class="fas fa-music"></i> <span>Discography</span>
            </li>
            <li data-section="gallery">
                <i class="fas fa-images"></i> <span>Gallery</span>
            </li>
            <li data-section="videos">
                <i class="fas fa-video"></i> <span>Videos</span>
            </li>
            <li data-section="events">
                <i class="fas fa-calendar-alt"></i> <span>Events</span>
            </li>
            <li onclick="logout()">
                <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Dashboard -->
        <div id="dashboard" class="section active">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number" id="discCount">0</div>
                    <div class="stat-label">Albums & Singles</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="galleryCount">0</div>
                    <div class="stat-label">Gallery Items</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="videoCount">0</div>
                    <div class="stat-label">Videos</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="eventCount">0</div>
                    <div class="stat-label">Events</div>
                </div>
            </div>

            <div class="card">
                <h2><i class="fas fa-tachometer-alt"></i> Quick Actions</h2>
                <div class="form-actions">
                    <button class="btn btn-primary" onclick="switchSection('discography')">
                        <i class="fas fa-plus"></i> Add Music
                    </button>
                    <button class="btn btn-primary" onclick="switchSection('gallery')">
                        <i class="fas fa-plus"></i> Add Gallery Item
                    </button>
                    <button class="btn btn-primary" onclick="switchSection('videos')">
                        <i class="fas fa-plus"></i> Add Video
                    </button>
                    <button class="btn btn-primary" onclick="switchSection('events')">
                        <i class="fas fa-plus"></i> Add Event
                    </button>
                </div>
            </div>
        </div>

        <!-- Discography -->
        <div id="discography" class="section">
            <div class="card">
                <h2><i class="fas fa-music"></i> Manage Discography</h2>
                <form id="discForm" class="form-grid">
                    <div class="form-group">
                        <label>Title *</label>
                        <input type="text" name="title" placeholder="Album or single title" required>
                    </div>
                    <div class="form-group">
                        <label>Category *</label>
                        <select name="category" required>
                            <option value="">Select Category</option>
                            <option value="album">Album</option>
                            <option value="ep">EP</option>
                            <option value="single">Single</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Cover Image URL</label>
                        <input type="text" name="cover_image" placeholder="https://example.com/cover.jpg">
                    </div>
                    <div class="form-group">
                        <label>Release Date</label>
                        <input type="date" name="release_date">
                    </div>
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label>Description</label>
                        <textarea name="description" placeholder="Album description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Spotify URL</label>
                        <input type="text" name="spotify_url" placeholder="Spotify link">
                    </div>
                    <div class="form-group">
                        <label>YouTube URL</label>
                        <input type="text" name="youtube_url" placeholder="YouTube link">
                    </div>
                    <div class="form-group">
                        <label>Apple Music URL</label>
                        <input type="text" name="apple_music_url" placeholder="Apple Music link">
                    </div>
                    <div class="form-actions" style="grid-column: 1 / -1;">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-plus"></i> Add Discography
                        </button>
                    </div>
                </form>
            </div>

            <div class="card">
                <h2><i class="fas fa-list"></i> Discography List</h2>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Release Date</th>
                                <th>Cover Image</th>
                                <th>Spotify</th>
                                <th>YouTube</th>
                                <th>Apple Music</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="discographyList"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Gallery -->
        <div id="gallery" class="section">
            <div class="card">
                <h2><i class="fas fa-images"></i> Manage Gallery</h2>
                <form id="galleryForm" class="form-grid">
                    <div class="form-group">
                        <label>Image URL *</label>
                        <input type="text" name="image_url" placeholder="https://example.com/image.jpg" required>
                    </div>
                    <div class="form-group">
                        <label>Caption</label>
                        <input type="text" name="caption" placeholder="Image caption">
                    </div>
                    <div class="form-group">
                        <label>Category *</label>
                        <select name="category" required>
                            <option value="">Select Category</option>
                            <option value="performance">Performance</option>
                            <option value="behind_the_scenes">Behind the Scenes</option>
                            <option value="instruments">Instruments</option>
                            <option value="travel">Travel</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Event ID</label>
                        <input type="number" name="event_id" placeholder="If Event ID is Present insert number Here">
                    </div>
                    <div class="form-actions" style="grid-column: 1 / -1;">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-plus"></i> Add Gallery Item
                        </button>
                    </div>
                </form>
            </div>

            <div class="card">
                <h2><i class="fas fa-list"></i> Gallery List</h2>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image URL</th>
                                <th>Caption</th>
                                <th>Category</th>
                                <th>Event ID</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="galleryList"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Videos -->
        <div id="videos" class="section">
            <div class="card">
                <h2><i class="fas fa-video"></i> Manage Videos</h2>
                <form id="videoForm" class="form-grid">
                    <div class="form-group">
                        <label>Title *</label>
                        <input type="text" name="title" placeholder="Video title" required>
                    </div>
                    <div class="form-group">
                        <label>YouTube URL</label>
                        <input type="text" name="youtube_url" placeholder="YouTube video URL">
                    </div>
                    <div class="form-group">
                        <label>Thumbnail URL</label>
                        <input type="text" name="thumbnail" placeholder="Video thumbnail URL">
                    </div>
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label>Description</label>
                        <textarea name="description" placeholder="Video description" rows="3"></textarea>
                    </div>
                    <div class="form-actions" style="grid-column: 1 / -1;">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-plus"></i> Add Video
                        </button>
                    </div>
                </form>
            </div>

            <div class="card">
                <h2><i class="fas fa-list"></i> Video List</h2>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>YouTube URL</th>
                                <th>Thumbnail</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="videoList"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Events -->
        <div id="events" class="section">
            <div class="card">
                <h2><i class="fas fa-calendar-alt"></i> Manage Events</h2>
                <form id="eventForm" class="form-grid">
                    <div class="form-group">
                        <label>Event Name *</label>
                        <input type="text" name="title" placeholder="Event title" required>
                    </div>
                    <div class="form-group">
                        <label>Event Type *</label>
                        <select name="event_type" required>
                            <option value="">Select Type</option>
                            <option value="festival">Festival</option>
                            <option value="concert">Concert</option>
                            <option value="workshop">Workshop</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Date *</label>
                        <input type="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" name="location" placeholder="Event location">
                    </div>
                    <div class="form-group">
                        <label>Event Image URL</label>
                        <input type="text" name="image" placeholder="Event image URL">
                    </div>
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label>Description</label>
                        <textarea name="description" placeholder="Event description" rows="3"></textarea>
                    </div>
                    <div class="form-actions" style="grid-column: 1 / -1;">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-plus"></i> Add Event
                        </button>
                    </div>
                </form>
            </div>

            <div class="card">
                <h2><i class="fas fa-list"></i> Event List</h2>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Location</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="eventList"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Update Modal -->
    <div id="updateModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="modal-header">
                <h2><i class="fas fa-edit"></i> Update Item</h2>
            </div>
            <form id="updateForm">
                <input type="hidden" id="updateSection" name="section">
                <input type="hidden" id="updateId" name="id">
                
                <div id="modalFields">
                    <!-- Dynamic fields will be inserted here -->
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Update Item
                    </button>
                    <button type="button" class="btn btn-danger" onclick="closeModal()">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

     <!-- JavaScript file -->
 <script>
    const API_BASE_URL = "{{ url('/api') }}";
 </script>

<!-- Load JS via Vite -->
@vite('resources/js/admin.js')
</body>
</html>