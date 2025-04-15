<?php
// Include session check
include 'session_check.php';

// Require login for this page
requireLogin();

// Get user details from session
$fullname = $_SESSION['fullname'];
$email = $_SESSION['email'];

// Default values for other fields (in a real application, these would come from a database)
$gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
$finance_condition = isset($_SESSION['finance_condition']) ? $_SESSION['finance_condition'] : '';
$occupation = isset($_SESSION['occupation']) ? $_SESSION['occupation'] : '';
$phone = isset($_SESSION['phone']) ? $_SESSION['phone'] : '';
$address = isset($_SESSION['address']) ? $_SESSION['address'] : '';
$interests = isset($_SESSION['interests']) ? $_SESSION['interests'] : '';
$budget_goals = isset($_SESSION['budget_goals']) ? $_SESSION['budget_goals'] : '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update user profile details
    // In a real application, you would validate and sanitize the inputs
    // and then update the database
    
    // For now, we'll just update the session variables
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['finance_condition'] = $_POST['finance_condition'];
    $_SESSION['occupation'] = $_POST['occupation'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['interests'] = $_POST['interests'];
    $_SESSION['budget_goals'] = $_POST['budget_goals'];
    
    // Refresh values
    $gender = $_SESSION['gender'];
    $finance_condition = $_SESSION['finance_condition'];
    $occupation = $_SESSION['occupation'];
    $phone = $_SESSION['phone'];
    $address = $_SESSION['address'];
    $interests = $_SESSION['interests'];
    $budget_goals = $_SESSION['budget_goals'];
    
    // Set a success message
    $success_message = "Profile updated successfully!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - CurrencyBuddy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background-color: #2e5786;
            color: white;
        }

        .logo {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: bold;
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

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .profile-container {
            display: flex;
            gap: 2rem;
            margin-top: 1rem;
        }

        .profile-sidebar {
            flex: 0 0 30%;
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .profile-picture-container {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto 1.5rem;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: #e9f0f8;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border: 5px solid #2e5786;
        }

        .upload-photo-btn {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background-color: #2e5786;
            color: white;
            border: none;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .upload-photo-btn:hover {
            background-color: #1f3d5f;
        }

        #photo-upload {
            display: none;
        }

        .user-name {
            font-size: 1.5rem;
            margin: 0.5rem 0;
            color: #2e5786;
        }

        .user-email {
            color: #6c757d;
            margin-bottom: 1rem;
        }

        .user-info {
            padding: 1rem 0;
            border-top: 1px solid #e9f0f8;
            text-align: left;
        }

        .info-item {
            margin-bottom: 1rem;
        }

        .info-label {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 0.2rem;
        }

        .info-value {
            font-weight: bold;
        }

        .account-status {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #2e5786;
            color: white;
            border-radius: 20px;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .profile-stats {
            display: flex;
            justify-content: space-around;
            margin-top: 1.5rem;
            text-align: center;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2e5786;
        }

        .stat-label {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .profile-content {
            flex: 1;
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .nav-tabs {
            display: flex;
            border-bottom: 2px solid #e9f0f8;
            margin-bottom: 2rem;
        }

        .nav-tab {
            padding: 0.75rem 1.5rem;
            cursor: pointer;
            font-weight: bold;
            color: #6c757d;
            border-bottom: 3px solid transparent;
            margin-right: 1rem;
        }

        .nav-tab.active {
            color: #2e5786;
            border-bottom-color: #2e5786;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .page-title {
            color: #2e5786;
            margin-top: 0;
            margin-bottom: 1.5rem;
            font-size: 2rem;
        }

        .section-title {
            color: #2e5786;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e9f0f8;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea,
        select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-row {
            display: flex;
            gap: 1rem;
        }

        .form-row .form-group {
            flex: 1;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            font-size: 1rem;
            display: inline-block;
        }

        .btn-primary {
            background-color: #2e5786;
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background-color: #1f3d5f;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: none;
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 4px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="homepage.php" class="logo">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="15" cy="15" r="15" fill="white"/>
                <path d="M10 10L20 20M10 20L20 10" stroke="#2e5786" stroke-width="2"/>
            </svg>
            CurrencyBuddy
        </a>
        <div class="nav-links">
            <a href="homepage.php">Home</a>
            <a href="currencyconvertor.php">Currency Convertor</a>
            <a href="budgetallocator.php">Budget Allocator</a>
            <a href="contact.php">Contact</a>
            <a href="about.php">About</a>
            <a href="faq.php">FAQ</a>
            <a href="feedback.php">FeedBack</a>
            
            <div class="user-dropdown">
                <a href="#" class="user-menu"><?php echo $fullname; ?> <span>▼</span></a>
                <div class="dropdown-content">
                    <a href="profile.php">My Profile</a>
                    <a href="settings.php">Settings</a>
                    <a href="logout.php">Sign Out</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <h1 class="page-title">My Profile</h1>
        
        <?php if(isset($success_message)): ?>
            <div class="alert alert-success">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>
        
        <div class="profile-container">
            <div class="profile-sidebar">
                <div class="profile-picture-container">
                    <div class="profile-picture">
                        <svg width="100" height="100" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" fill="#2e5786"/>
                            <path d="M12 13C8.13401 13 5 16.134 5 20V21H19V20C19 16.134 15.866 13 12 13Z" fill="#2e5786"/>
                        </svg>
                    </div>
                    <label for="photo-upload" class="upload-photo-btn">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </label>
                    <input type="file" id="photo-upload" accept="image/*">
                </div>
                <h2 class="user-name"><?php echo $fullname; ?></h2>
                <p class="user-email"><?php echo $email; ?></p>
                <div class="account-status">Active Member</div>
                
                <div class="user-info">
                    <div class="info-item">
                        <div class="info-label">Occupation</div>
                        <div class="info-value"><?php echo $occupation ? $occupation : 'Not specified'; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Financial Condition</div>
                        <div class="info-value"><?php echo $finance_condition ? ucfirst($finance_condition) : 'Not specified'; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Budget Goals</div>
                        <div class="info-value"><?php echo $budget_goals ? $budget_goals : 'Not specified'; ?></div>
                    </div>
                </div>
                
                <div class="profile-stats">
                    <div class="stat-item">
                        <span class="stat-value">12</span>
                        <span class="stat-label">Conversions</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-value">5</span>
                        <span class="stat-label">Budgets</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-value">3</span>
                        <span class="stat-label">Months</span>
                    </div>
                </div>
            </div>
            
            <div class="profile-content">
                <div class="nav-tabs">
                    <div class="nav-tab active" data-tab="personal-info">Personal Information</div>
                    <div class="nav-tab" data-tab="financial-info">Financial Details</div>
                    <div class="nav-tab" data-tab="privacy-settings">Privacy Settings</div>
                </div>
                
                <form method="post" action="profile.php">
                    <div id="personal-info" class="tab-content active">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" value="<?php echo $email; ?>" readonly>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender">
                                    <option value="">Select Gender</option>
                                    <option value="male" <?php if($gender === 'male') echo 'selected'; ?>>Male</option>
                                    <option value="female" <?php if($gender === 'female') echo 'selected'; ?>>Female</option>
                                    <option value="other" <?php if($gender === 'other') echo 'selected'; ?>>Other</option>
                                    <option value="prefer-not-to-say" <?php if($gender === 'prefer-not-to-say') echo 'selected'; ?>>Prefer not to say</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="occupation">Occupation</label>
                            <input type="text" id="occupation" name="occupation" value="<?php echo $occupation; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea id="address" name="address"><?php echo $address; ?></textarea>
                        </div>
                    </div>
                    
                    <div id="financial-info" class="tab-content">
                        <div class="form-group">
                            <label for="finance_condition">Financial Condition</label>
                            <select id="finance_condition" name="finance_condition">
                                <option value="">Select Financial Condition</option>
                                <option value="excellent" <?php if($finance_condition === 'excellent') echo 'selected'; ?>>Excellent</option>
                                <option value="good" <?php if($finance_condition === 'good') echo 'selected'; ?>>Good</option>
                                <option value="average" <?php if($finance_condition === 'average') echo 'selected'; ?>>Average</option>
                                <option value="fair" <?php if($finance_condition === 'fair') echo 'selected'; ?>>Fair</option>
                                <option value="poor" <?php if($finance_condition === 'poor') echo 'selected'; ?>>Poor</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="interests">Financial Interests</label>
                            <textarea id="interests" name="interests" placeholder="e.g. Forex trading, Investments, Savings, etc."><?php echo $interests; ?></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="budget_goals">Budget Goals</label>
                            <textarea id="budget_goals" name="budget_goals" placeholder="e.g. Save for vacation, Pay off debt, Build emergency fund, etc."><?php echo $budget_goals; ?></textarea>
                        </div>
                    </div>
                    
                    <div id="privacy-settings" class="tab-content">
                        <div class="form-group">
                            <label>Profile Visibility</label>
                            <div>
                                <input type="radio" id="public" name="visibility" value="public" checked>
                                <label for="public" style="display: inline; margin-right: 1rem;">Public</label>
                                
                                <input type="radio" id="private" name="visibility" value="private">
                                <label for="private" style="display: inline;">Private</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Email Notifications</label>
                            <div>
                                <input type="checkbox" id="notify_currency" name="notify_currency" checked>
                                <label for="notify_currency" style="display: inline; margin-right: 1rem;">Currency Updates</label>
                                
                                <input type="checkbox" id="notify_budget" name="notify_budget" checked>
                                <label for="notify_budget" style="display: inline; margin-right: 1rem;">Budget Reminders</label>
                                
                                <input type="checkbox" id="notify_news" name="notify_news" checked>
                                <label for="notify_news" style="display: inline;">Newsletter</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Data Sharing Preferences</label>
                            <div>
                                <input type="checkbox" id="share_analytics" name="share_analytics" checked>
                                <label for="share_analytics" style="display: inline; margin-right: 1rem;">Anonymous Usage Analytics</label>
                                
                                <input type="checkbox" id="share_recommendations" name="share_recommendations" checked>
                                <label for="share_recommendations" style="display: inline;">Personalized Recommendations</label>
                            </div>
                        </div>
                    </div>
                    
                    <div style="text-align: right; margin-top: 2rem;">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        // Tab navigation
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.nav-tab');
            
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs
                    tabs.forEach(t => t.classList.remove('active'));
                    
                    // Add active class to clicked tab
                    this.classList.add('active');
                    
                    // Hide all tab content
                    document.querySelectorAll('.tab-content').forEach(content => {
                        content.classList.remove('active');
                    });
                    
                    // Show corresponding content
                    const tabId = this.getAttribute('data-tab');
                    document.getElementById(tabId).classList.add('active');
                });
            });
            
            // Photo upload preview
            const photoInput = document.getElementById('photo-upload');
            const profilePicture = document.querySelector('.profile-picture');
            
            photoInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        profilePicture.innerHTML = `<img src="${e.target.result}" alt="Profile Picture" style="width: 100%; height: 100%; object-fit: cover;">`;
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
</body>
</html>