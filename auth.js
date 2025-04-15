document.addEventListener('DOMContentLoaded', function() {
    // Login form handling
    const loginForm = document.getElementById('login-form');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const errorMessage = document.getElementById('error-message');
            
            // Clear previous error messages
            errorMessage.textContent = '';
            errorMessage.classList.remove('show');
            
            // Basic client-side validation
            if (!email || !password) {
                errorMessage.textContent = 'Please fill in all fields';
                errorMessage.classList.add('show');
                return;
            }
            
            // Email format validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                errorMessage.textContent = 'Please enter a valid email address';
                errorMessage.classList.add('show');
                return;
            }
            
            // AJAX request to login.php
            const formData = new FormData(loginForm);
            
            fetch('login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok: ' + response.status);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Redirect to homepage on successful login
                    window.location.href = data.redirect || 'Homepage.html';
                } else {
                    // Show error message
                    errorMessage.textContent = data.message || 'An unknown error occurred';
                    errorMessage.classList.add('show');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                errorMessage.textContent = 'Connection error: ' + error.message;
                errorMessage.classList.add('show');
            });
        });
    }
    
    // Registration form handling
    const registerForm = document.getElementById('register-form');
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const fullname = document.getElementById('fullname').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            const terms = document.getElementById('terms').checked;
            const errorMessage = document.getElementById('error-message');
            
            // Clear previous error messages
            errorMessage.textContent = '';
            errorMessage.classList.remove('show');
            
            // Basic client-side validation
            if (!fullname || !email || !password || !confirmPassword) {
                errorMessage.textContent = 'Please fill in all fields';
                errorMessage.classList.add('show');
                return;
            }
            
            // Email format validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                errorMessage.textContent = 'Please enter a valid email address';
                errorMessage.classList.add('show');
                return;
            }
            
            // Password length validation
            if (password.length < 8) {
                errorMessage.textContent = 'Password must be at least 8 characters long';
                errorMessage.classList.add('show');
                return;
            }
            
            if (password !== confirmPassword) {
                errorMessage.textContent = 'Passwords do not match';
                errorMessage.classList.add('show');
                return;
            }
            
            if (!terms) {
                errorMessage.textContent = 'You must agree to the Terms of Service and Privacy Policy';
                errorMessage.classList.add('show');
                return;
            }
            
            // Show loading state
            const submitButton = registerForm.querySelector('button[type="submit"]');
            const originalButtonText = submitButton.textContent;
            submitButton.textContent = 'Creating Account...';
            submitButton.disabled = true;
            
            // AJAX request to register.php
            const formData = new FormData(registerForm);
            
            fetch('register.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response error: ' + response.status);
                }
                return response.json();
            })
            .then(data => {
                // Reset button state
                submitButton.textContent = originalButtonText;
                submitButton.disabled = false;
                
                if (data.success) {
                    // Redirect to login page or homepage after successful registration
                    window.location.href = data.redirect || 'login.html?registered=true';
                } else {
                    // Show detailed error message
                    errorMessage.textContent = data.message || 'An unknown error occurred';
                    errorMessage.classList.add('show');
                }
            })
            .catch(error => {
                // Reset button state
                submitButton.textContent = originalButtonText;
                submitButton.disabled = false;
                
                console.error('Error:', error);
                errorMessage.textContent = 'Connection error: ' + error.message;
                errorMessage.classList.add('show');
            });
        });
    }
    
    // Check for registration success message
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('registered') === 'true' && window.location.pathname.includes('login.html')) {
        const errorMessage = document.getElementById('error-message');
        if (errorMessage) {
            errorMessage.textContent = 'Registration successful! Please log in.';
            errorMessage.style.backgroundColor = '#e8f5e9';
            errorMessage.style.color = '#2e7d32';
            errorMessage.classList.add('show');
        }
    }
});