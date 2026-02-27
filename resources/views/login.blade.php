<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Admin Login | Nomino Afrikana</title>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Cormorant+Garamond:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    body {
        margin:0; padding:0;
        font-family:'Cormorant Garamond', serif;
        background-color:#F5F5DC;
        color:#1A120B;
        display:flex; justify-content:center; align-items:center;
        height:100vh;
    }
    .container {
        background:#fff;
        padding:40px 50px;
        border-radius:15px;
        box-shadow:0 10px 30px rgba(0,0,0,0.2);
        width:400px;
        text-align:center;
        transition:all 0.3s ease-in-out;
    }
    h1 {
        font-family:'Cinzel', serif;
        color:#8B4513;
        margin-bottom:20px;
        font-size:1.8rem;
    }
    .tabs {
        display:flex;
        justify-content:space-around;
        margin-bottom:25px;
        border-bottom:2px solid #D4AF37;
    }
    .tab {
        padding:10px 20px;
        cursor:pointer;
        color:#1A120B;
        font-weight:600;
        transition:0.3s;
    }
    .tab.active {
        border-bottom:3px solid #8B4513;
        color:#8B4513;
    }
    form {
        display:none;
        flex-direction:column;
        text-align:left;
    }
    form.active { display:flex; }
    label { margin-bottom:5px; font-weight:600; }
    input {
        width:100%; padding:10px;
        margin-bottom:15px;
        border:1px solid #ccc; border-radius:5px;
        font-family:'Cormorant Garamond', serif;
    }
    button {
        background:#8B4513; color:#F5F5DC;
        border:none; padding:10px;
        border-radius:5px;
        cursor:pointer; transition:0.3s;
        font-weight:600;
    }
    button:hover { background:#C19A6B; color:#1A120B; }
    .message {
        margin-top:15px; color:#555;
    }
    .message a {
        color:#8B4513; text-decoration:none; font-weight:600;
    }
    .logo {
        font-family:'Cinzel', serif;
        font-size:1.3rem;
        color:#D4AF37;
        margin-bottom:20px;
    }
    #error-msg, #signup-msg {
        text-align: center;
        font-weight: 600;
        margin-top: 10px;
    }
    #error-msg { color: red; }
    #signup-msg { color: green; }
</style>
</head>
<body>

<div class="container">
    <div class="logo"><i class="fa-solid fa-feather"></i> Nomino Afrikana</div>
    <h1>Admin Portal</h1>

    <div class="tabs">
        <div class="tab active" id="login-tab">Login</div>
        <div class="tab" id="signup-tab">Sign Up</div>
    </div>

    <!-- LOGIN FORM -->
    <form id="loginForm" class="active">
        <label for="login-email">Email</label>
        <input type="email" id="login-email" name="email" placeholder="Enter your email" required>
        
        <label for="login-password">Password</label>
        <input type="password" id="login-password" name="password" placeholder="Enter your password" required>

        <button type="submit">Login</button>
        <p id="error-msg"></p>

        <p class="message">Don't have an account? <a href="#" id="to-signup">Sign up</a></p>
    </form>

    <!-- SIGNUP FORM -->
    <form id="signupForm">
        <label for="signup-name">Full Name</label>
        <input type="text" id="signup-name" name="name" placeholder="Your full name" required>

        <label for="signup-email">Email</label>
        <input type="email" id="signup-email" name="email" placeholder="Enter your email" required>

        <label for="signup-password">Password</label>
        <input type="password" id="signup-password" name="password" placeholder="Create a password" required>

        <button type="submit">Sign Up</button>
        <p id="signup-msg"></p>

        <p class="message">Already have an account? <a href="#" id="to-login">Login</a></p>
    </form>
</div>

    <!--JavaScript file -->
<script>
    const API_BASE_URL = "{{ url('/api') }}";
</script>

@vite('resources/js/login.js')
</body>
</html>
