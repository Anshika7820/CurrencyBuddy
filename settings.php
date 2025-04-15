<?php
// Include session check
include 'session_check.php';

// Redirect if not logged in
if (!isLoggedIn()) {
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - CurrencyBuddy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2e5786;
            color: white;
            background-image: url('https://via.placeholder.com/1600x900/2e5786/2e5786?text=');
            background-size: cover;
            background-position: center;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background-color: #2e5786;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
    
        .btn {
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-outline {
            border: 2px solid white;
            color: white;
            background: transparent;
            margin-left: 1rem;
        }

        .btn-primary {
            background-color: #4caf50;
            color: white;
            border: none;
            margin-left: 1rem;
        }
        
        .user-dropdown {
            position: relative;
            display: inline-block;
        }

        .user-menu {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            border: 2px solid white;
            border-radius: 4px;
            color: white;
            text-decoration: none;
        }

        .user-menu span {
            margin-left: 5px;
            font-size: 10px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 4px;
            margin-top: 5px;
        }

        .dropdown-content a {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
            margin: 0;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .user-dropdown:hover .dropdown-content {
            display: block;
        }
        
        .logo {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: bold;
            transition: all 0.3s ease;
        }
    
        .logo:hover {
            transform: scale(1.05);
        }
    
        .logo svg {
            margin-right: 10px;
        }
    
        .nav-links {
            display: flex;
            align-items: center;
        }
    
        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 1.5rem;
            font-weight: 500;
            position: relative;
            transition: all 0.3s ease;
        }
    
        .nav-links a:hover {
            color: black;
        }
    
        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: black;
            transition: all 0.3s ease;
        }
    
        .nav-links a:hover::after {
            width: 100%;
        }
    
        .btn {
            padding: 0.6rem 1.2rem;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
        }
    
        .btn-outline {
            border: 2px solid white;
            color: white;
            background: transparent;
            margin-left: 1.5rem;
        }
    
        .btn-outline:hover {
            background-color: white;
            color: #2e5786;
        }
        
        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                padding: 1rem;
            }
    
            .logo {
                margin-bottom: 15px;
            }
    
            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }
    
            .nav-links a {
                margin: 5px;
                font-size: 0.9rem;
            }
    
            .btn-outline {
                margin-top: 10px;
            }
        }

        /* Settings Page Specific Styles */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .page-title {
            font-size: 2rem;
            margin-bottom: 2rem;
            border-bottom: 2px solid rgba(255, 255, 255, 0.3);
            padding-bottom: 0.5rem;
        }

        .settings-layout {
            display: flex;
            gap: 2rem;
            margin-top: 1rem;
        }

        .settings-nav {
            flex: 0 0 250px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 1rem;
        }

        .settings-nav-item {
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .settings-nav-item:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .settings-nav-item.active {
            background-color: rgba(255, 255, 255, 0.3);
            font-weight: bold;
        }

        .settings-content {
            flex: 1;
            background-color: white;
            border-radius: 10px;
            color: #333;
            padding: 2rem;
        }

        .settings-section {
            display: none;
        }

        .settings-section.active {
            display: block;
        }

        .settings-section h2 {
            color: #2e5786;
            margin-top: 0;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .form-check {
            margin-bottom: 0.5rem;
        }

        .form-check label {
            margin-left: 0.5rem;
        }

        .btn-save {
            background-color: #4caf50;
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-save:hover {
            background-color: #388e3c;
        }

        .btn-danger {
            background-color: #ff5252;
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #d32f2f;
        }

        .settings-footer {
            margin-top: 2rem;
            border-top: 1px solid #eee;
            padding-top: 1rem;
            text-align: right;
        }

        .currency-option {
            display: flex;
            align-items: center;
            padding: 0.5rem;
            margin-bottom: 0.5rem;
            background-color: #f5f5f5;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .currency-option:hover {
            background-color: #e0e0e0;
        }

        .currency-flag {
            width: 30px;
            height: 20px;
            margin-right: 10px;
            background-color: #ddd;
        }

        .theme-option {
            display: inline-block;
            width: 100px;
            margin-right: 1rem;
            text-align: center;
            margin-bottom: 1rem;
        }

        .theme-preview {
            height: 60px;
            border-radius: 5px;
            margin-bottom: 0.5rem;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .theme-preview:hover {
            transform: scale(1.05);
        }

        .theme-preview.blue {
            background-color: #2e5786;
        }

        .theme-preview.dark {
            background-color: #333;
        }

        .theme-preview.light {
            background-color: #f0f0f0;
            border: 1px solid #ddd;
        }

        .theme-preview.green {
            background-color: #4caf50;
        }

        .notification-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .api-key-container {
            display: flex;
            align-items: center;
            margin-top: 1rem;
        }

        .api-key {
            flex: 1;
            padding: 0.5rem;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: monospace;
        }

        .btn-copy {
            margin-left: 0.5rem;
            background-color: #1a4789;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 0.5rem 1rem;
            cursor: pointer;
        }

        .btn-generate {
            margin-left: 0.5rem;
            background-color: #ff9800;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 0.5rem 1rem;
            cursor: pointer;
        }

        /* Toggle Switch */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #4caf50;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#" class="logo">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="15" cy="15" r="15" fill="white"/>
                <path d="M10 10L20 20M10 20L20 10" stroke="#2e5786" stroke-width="2"/>
            </svg>
            CurrencyBuddy
        </a>
        <div class="nav-links">
            <a href="Homepag.php">Home</a>
            <a href="currencyconvertor.php">Currency Convertor</a>
            <a href="budgetallocator.php">Budget Allocator</a>
            <a href="contact.php">Contact</a>
            <a href="about.php">About</a>
            <a href="faq.php">FAQ</a>
            <a href="feed.php">FeedBack</a>
            
            <?php
            if (isLoggedIn()) {
                echo '<div class="user-dropdown">
                    <a href="#" class="user-menu">' . $_SESSION['fullname'] . ' <span>▼</span></a>
                    <div class="dropdown-content">
                        <a href="profile.php">My Profile</a>
                        <a href="settings.php">Settings</a>
                        <a href="logout.php">Sign Out</a>
                    </div>
                </div>';
            } else {
                echo '<a href="login.html" class="btn btn-outline">Sign In</a>';
            }
            ?>
        </div>
    </div>

    <div class="container">
        <h1 class="page-title">Settings</h1>
        
        <div class="settings-layout">
            <div class="settings-nav">
                <div class="settings-nav-item active" data-tab="account">Account Settings</div>
                <div class="settings-nav-item" data-tab="preferences">Preferences</div>
                <div class="settings-nav-item" data-tab="notifications">Notifications</div>
                <div class="settings-nav-item" data-tab="api">API Access</div>
                <div class="settings-nav-item" data-tab="privacy">Privacy & Security</div>
            </div>
            
            <div class="settings-content">
                <!-- Account Settings -->
                <div id="account" class="settings-section active">
                    <h2>Account Settings</h2>
                    <form id="accountForm">
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" id="fullName" name="fullName" class="form-control" value="<?php echo $_SESSION['fullname']; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?php echo $_SESSION['email'] ?? ''; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" value="<?php echo $_SESSION['username'] ?? ''; ?>">
                        </div>
                        
                        <h3>Change Password</h3>
                        <div class="form-group">
                            <label for="currentPassword">Current Password</label>
                            <input type="password" id="currentPassword" name="currentPassword" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <input type="password" id="newPassword" name="newPassword" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="confirmPassword">Confirm New Password</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" class="form-control">
                        </div>
                        
                        <div class="settings-footer">
                            <button type="submit" class="btn-save">Save Changes</button>
                        </div>
                    </form>
                </div>
                
                <!-- Preferences -->
                <div id="preferences" class="settings-section">
                    <h2>Preferences</h2>
                    
                    <h3>Default Currency</h3>
                    <div class="form-group">
                        <div class="currency-option">
                            <div class="currency-flag"></div>
                            <div>USD - United States Dollar</div>
                        </div>
                        <div class="currency-option">
                            <div class="currency-flag"></div>
                            <div>EUR - Euro</div>
                        </div>
                        <div class="currency-option">
                            <div class="currency-flag"></div>
                            <div>GBP - British Pound</div>
                        </div>
                        <div class="currency-option">
                            <div class="currency-flag"></div>
                            <div>JPY - Japanese Yen</div>
                        </div>
                        <div class="currency-option">
                            <div class="currency-flag"></div>
                            <div>INR - Indian Rupee</div>
                        </div>
                    </div>
                    
                    <h3>Theme</h3>
                    <div class="form-group">
                        <div class="theme-option">
                            <div class="theme-preview blue"></div>
                            <div>Blue</div>
                        </div>
                        <div class="theme-option">
                            <div class="theme-preview dark"></div>
                            <div>Dark</div>
                        </div>
                        <div class="theme-option">
                            <div class="theme-preview light"></div>
                            <div>Light</div>
                        </div>
                        <div class="theme-option">
                            <div class="theme-preview green"></div>
                            <div>Green</div>
                        </div>
                    </div>
                    
                    <h3>Display Settings</h3>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" id="showDecimal" name="showDecimal" checked>
                            <label for="showDecimal">Show decimal places</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="showSymbol" name="showSymbol" checked>
                            <label for="showSymbol">Show currency symbols</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="showTrends" name="showTrends" checked>
                            <label for="showTrends">Show trend indicators</label>
                        </div>
                    </div>
                    
                    <div class="settings-footer">
                        <button type="button" class="btn-save">Save Preferences</button>
                    </div>
                </div>
                
                <!-- Notifications -->
                <div id="notifications" class="settings-section">
                    <h2>Notification Settings</h2>
                    
                    <div class="notification-item">
                        <div>Email notifications</div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="notification-item">
                        <div>Rate alerts</div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="notification-item">
                        <div>Weekly rate summary</div>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="notification-item">
                        <div>Travel deal alerts</div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="notification-item">
                        <div>System updates</div>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>
                    
                    <div class="settings-footer">
                        <button type="button" class="btn-save">Save Notification Settings</button>
                    </div>
                </div>
                
                <!-- API Access -->
                <div id="api" class="settings-section">
                    <h2>API Settings</h2>
                    
                    <p>Create and manage API keys to access CurrencyBuddy's services programmatically.</p>
                    
                    <h3>Your API Keys</h3>
                    <div class="api-key-container">
                        <div class="api-key">xxxx-xxxx-xxxx-xxxx-xxxx</div>
                        <button class="btn-copy">Copy</button>
                        <button class="btn-generate">Generate New</button>
                    </div>
                    
                    <h3>API Usage</h3>
                    <div class="form-group">
                        <p>Free tier: 1000 requests / month</p>
                        <p>Usage this month: 245 requests</p>
                        <div style="height: 20px; background-color: #f0f0f0; border-radius: 10px; margin-top: 10px;">
                            <div style="height: 100%; width: 24.5%; background-color: #4caf50; border-radius: 10px;"></div>
                        </div>
                    </div>
                    
                    <h3>Rate Limiting</h3>
                    <div class="form-group">
                        <p>Current limit: 10 requests / minute</p>
                    </div>
                    
                    <div class="settings-footer">
                        <button type="button" class="btn-save">Save API Settings</button>
                    </div>
                </div>
                
                <!-- Privacy & Security -->
                <div id="privacy" class="settings-section">
                    <h2>Privacy & Security</h2>
                    
                    <h3>Data Privacy</h3>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" id="shareData" name="shareData">
                            <label for="shareData">Share usage data to improve services</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="saveCurrency" name="saveCurrency" checked>
                            <label for="saveCurrency">Save currency preferences</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="saveHistory" name="saveHistory" checked>
                            <label for="saveHistory">Save conversion history</label>
                        </div>
                    </div>
                    
                    <h3>Account Security</h3>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" id="twoFactor" name="twoFactor">
                            <label for="twoFactor">Enable two-factor authentication</label>
                        </div>
                    </div>
                    
                    <h3>Session Management</h3>
                    <div class="form-group">
                        <button type="button" class="btn-danger">Sign Out from All Devices</button>
                    </div>
                    
                    <h3>Account Deletion</h3>
                    <div class="form-group">
                        <p>Permanently delete your account and all associated data.</p>
                        <button type="button" class="btn-danger">Delete Account</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tab navigation
        document.querySelectorAll('.settings-nav-item').forEach(item => {
            item.addEventListener('click', function() {
                // Remove active class from all tabs
                document.querySelectorAll('.settings-nav-item').forEach(tab => {
                    tab.classList.remove('active');
                });
                
                // Add active class to clicked tab
                this.classList.add('active');
                
                // Hide all sections
                document.querySelectorAll('.settings-section').forEach(section => {
                    section.classList.remove('active');
                });
                
                // Show the selected section
                const tabId = this.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });
        
        // Form submission
        document.getElementById('accountForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Account settings updated successfully!');
        });
        
        // Copy API key
        document.querySelector('.btn-copy').addEventListener('click', function() {
            alert('API key copied to clipboard!');
        });
        
        // Generate new API key
        document.querySelector('.btn-generate').addEventListener('click', function() {
            if (confirm('Are you sure you want to generate a new API key? This will invalidate your current key.')) {
                alert('New API key generated!');
            }
        });
    </script>
</body>
</html>