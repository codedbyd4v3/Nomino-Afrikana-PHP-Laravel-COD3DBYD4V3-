// Get CSRF token from meta tag (add this to your Blade template first)
function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}

//  TAB SWITCHING
document.addEventListener("DOMContentLoaded", () => {
    const loginTab = document.getElementById("login-tab");
    const signupTab = document.getElementById("signup-tab");
    const loginForm = document.getElementById("loginForm");
    const signupForm = document.getElementById("signupForm");
    const toSignup = document.getElementById("to-signup");
    const toLogin = document.getElementById("to-login");

    function switchTab(tab) {
        if (tab === "login") {
            loginForm.classList.add("active");
            signupForm.classList.remove("active");
            loginTab.classList.add("active");
            signupTab.classList.remove("active");
        } else {
            signupForm.classList.add("active");
            loginForm.classList.remove("active");
            signupTab.classList.add("active");
            loginTab.classList.remove("active");
        }
    }

    loginTab.addEventListener("click", () => switchTab("login"));
    signupTab.addEventListener("click", () => switchTab("signup"));
    toSignup.addEventListener("click", (e) => {
        e.preventDefault();
        switchTab("signup");
    });
    toLogin.addEventListener("click", (e) => {
        e.preventDefault();
        switchTab("login");
    });

    //  LOGIN HANDLER
    loginForm.addEventListener("submit", async (e) => {
        e.preventDefault();
        const email = document.getElementById("login-email").value.trim();
        const password = document.getElementById("login-password").value.trim();
        const errorMsg = document.getElementById("error-msg");
        errorMsg.textContent = "";

        try {
            const response = await fetch(`${API_BASE_URL}/user/login`, {
                method: "POST",
                headers: { 
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": getCsrfToken() 
                },
                body: JSON.stringify({ email, password }),
            });

            // Check if response is JSON
            const contentType = response.headers.get('content-type');
            if (!contentType || !contentType.includes('application/json')) {
                const text = await response.text();
                throw new Error(`Server returned non-JSON response: ${text.substring(0, 100)}`);
            }

            const data = await response.json();
            
            if (!response.ok) {
                throw new Error(data.message || data.detail || "Invalid credentials.");
            }

            // Save token
            sessionStorage.setItem("token", data.token);

            // Fetch user info
            const userResp = await fetch(`${API_BASE_URL}/user/current_user`, {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": `Bearer ${data.token}`,
                },
            });

            const userData = await userResp.json();
            console.log("👤 Logged in user:", userData);

            // Save user data to sessionStorage
            sessionStorage.setItem("token", data.token);
            sessionStorage.setItem("email", userData.email || email);
            sessionStorage.setItem("name", userData.name || "");

            // Redirect to admin
            window.location.href = "/admin";
        } catch (err) {
            console.error("❌ Login error:", err);
            errorMsg.textContent = err.message || "Login failed. Please try again.";
        }
    });

    //  SIGNUP HANDLER
    signupForm.addEventListener("submit", async (e) => {
        e.preventDefault();
        const name = document.getElementById("signup-name").value.trim();
        const email = document.getElementById("signup-email").value.trim();
        const password = document.getElementById("signup-password").value.trim();
        const msg = document.getElementById("signup-msg");
        msg.textContent = "";

        try {
            const response = await fetch(`${API_BASE_URL}/user/signup`, {
                method: "POST",
                headers: { 
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": getCsrfToken() 
                },
                body: JSON.stringify({ name, email, password }),
            });

            // Check if response is JSON
            const contentType = response.headers.get('content-type');
            if (!contentType || !contentType.includes('application/json')) {
                const text = await response.text();
                throw new Error(`Server returned non-JSON response: ${text.substring(0, 100)}`);
            }

            const data = await response.json();
            if (!response.ok) {
                throw new Error(data.message || data.detail || "Signup failed.");
            }

            msg.style.color = "green";
            msg.textContent = "Account created successfully. You can now log in.";
            switchTab("login");
        } catch (err) {
            msg.style.color = "red";
            msg.textContent = err.message || "Signup failed. Try again.";
        }
    });
});