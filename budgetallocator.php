

<?php

include 'session_check.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Allocator | CurrencyBuddy</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2e5786;
            --primary-light: #3a6ca5;
            --primary-dark: #1e3b5a;
            --accent-color: #f39c12;
            --text-light: #f8f9fa;
            --text-dark: #343a40;
            --green-color: #27ae60;
            --yellow-color: #f1c40f;
            --red-color: #e74c3c;
            --purple-color: #8e44ad;
            --cyan-color: #16a085;
            --orange-color: #e67e22;
            --blue-color: #3498db;
            --gray-color: #95a5a6;
            --card-bg: #ffffff;
            --light-bg: #f5f7fa;
            --border-radius: 12px;
            --box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', 'Roboto', sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            min-height: 100vh;
            padding: 0;
            margin: 0;
            color: var(--text-dark);
            line-height: 1.6;
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



        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px 60px;
        }

        /* Navbar Styles */
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

        .logo {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: bold;
            transition: var(--transition);
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
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--accent-color);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: var(--accent-color);
            transition: var(--transition);
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
            transition: var(--transition);
        }

        .btn-outline {
            border: 2px solid white;
            color: white;
            background: transparent;
            margin-left: 1.5rem;
        }

        .btn-outline:hover {
            background-color: white;
            color: var(--primary-color);
        }

        /* Header Section */
        .header {
            text-align: center;
            padding: 40px 0 20px;
            color: var(--text-light);
        }

        .header h1 {
            font-size: 2.8rem;
            margin-bottom: 10px;
            background: linear-gradient(to right, #fff, var(--accent-color));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .subtitle {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 30px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Card Styles */
        .card {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 25px;
            margin-bottom: 30px;
            transition: var(--transition);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }

        /* Form Styles */
        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 25px;
            gap: 20px;
        }

        .form-group {
            flex: 1;
            min-width: 200px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--primary-dark);
        }

        input, select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #dce1e8;
            border-radius: 8px;
            font-size: 16px;
            transition: var(--transition);
        }

        input:focus, select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(46, 87, 134, 0.2);
        }

        button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        button:hover {
            background-color: var(--primary-light);
            transform: translateY(-2px);
        }

        button i {
            margin-right: 8px;
        }

        /* Chart Container */
        .chart-container {
            position: relative;
            width: 100%;
            height: 350px;
            display: flex;
            justify-content: center;
            margin: 25px 0;
            padding: 20px 0;
        }

        /* Legend Styles */
        .legend {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin: 20px 0;
        }

        .legend-item {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            background-color: var(--light-bg);
            border-radius: 20px;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .legend-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .legend-color {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 8px;
        }

        /* Allocation Summary */
        .allocation-summary {
            text-align: center;
            margin: 20px 0;
            font-weight: 600;
            font-size: 1.1rem;
            padding: 15px;
            background-color: var(--light-bg);
            border-radius: 8px;
        }

        .remaining {
            color: var(--red-color);
            font-weight: 700;
        }

        /* Category Section */
        .category-section {
            margin-top: 35px;
        }

        .category-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 2px solid var(--light-bg);
            padding-bottom: 10px;
        }

        .category-header h3 {
            color: var(--primary-dark);
            font-size: 1.3rem;
        }

        .category-row {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 15px;
            background-color: var(--light-bg);
            border-radius: 8px;
            transition: var(--transition);
            gap: 15px;
        }

        .category-row:hover {
            background-color: #edf2f7;
            transform: translateX(5px);
        }

        .category-name {
            flex: 1;
        }

        .category-amount {
            flex: 1;
            position: relative;
        }

        .category-amount input {
            padding-left: 25px;
        }

        .category-amount::before {
            content: '$';
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #777;
        }

        .category-slider {
            flex: 2;
            display: flex;
            align-items: center;
        }

        .category-slider input[type="range"] {
            -webkit-appearance: none;
            flex: 1;
            height: 8px;
            background: #ddd;
            border-radius: 5px;
            outline: none;
            padding: 0;
            margin: 0 15px 0 0;
        }

        .category-slider input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--primary-color);
            cursor: pointer;
            transition: var(--transition);
        }

        .category-slider input[type="range"]::-webkit-slider-thumb:hover {
            background: var(--primary-light);
            transform: scale(1.2);
        }

        .category-percent {
            width: 50px;
            font-weight: 600;
            color: var(--primary-dark);
        }

        .delete-btn {
            background-color: rgba(231, 76, 60, 0.1);
            color: var(--red-color);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }

        .delete-btn:hover {
            background-color: var(--red-color);
            color: white;
        }

        .add-category {
            display: inline-flex;
            align-items: center;
            color: var(--primary-color);
            background-color: rgba(46, 87, 134, 0.1);
            border-radius: 8px;
            padding: 10px 15px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .add-category:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .add-category i {
            margin-right: 8px;
        }

        /* Tips Card */
        .tips-card {
            background: linear-gradient(145deg, #f0f9f0, #e8f5e9);
            border-left: 4px solid var(--green-color);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 6px 20px rgba(39, 174, 96, 0.1);
        }

        .tips-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            font-weight: 700;
            color: #2e7d32;
            font-size: 1.1rem;
        }

        .tips-icon {
            margin-right: 10px;
            background-color: rgba(39, 174, 96, 0.2);
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .tips-content {
            color: #1e5926;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .tips-content p {
            margin-bottom: 10px;
        }

        .tips-content p:last-child {
            margin-bottom: 0;
        }

        /* Benefits Section */
        .benefits-section {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin-bottom: 40px;
        }

        .benefits-card, .common-categories-card {
            flex: 1;
            min-width: 300px;
            padding: 25px;
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            transition: var(--transition);
        }

        .benefits-card:hover, .common-categories-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }

        .benefits-card h3, .common-categories-card h3 {
            margin-bottom: 20px;
            color: var(--primary-dark);
            font-size: 1.3rem;
            position: relative;
            padding-bottom: 10px;
        }

        .benefits-card h3::after, .common-categories-card h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--accent-color);
        }

        .benefit-item {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
        }

        .benefit-icon {
            color: var(--green-color);
            background-color: rgba(39, 174, 96, 0.1);
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-right: 12px;
            font-size: 0.8rem;
        }

        /* Category Pills */
        .common-categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
            gap: 15px;
        }

        .category-pill {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            border-radius: 30px;
            color: white;
            font-size: 0.9rem;
            font-weight: 500;
            transition: var(--transition);
        }

        .category-pill:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .category-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.7);
            margin-right: 8px;
        }

        .housing { background-color: var(--blue-color); }
        .food { background-color: var(--green-color); }
        .transportation { background-color: var(--yellow-color); color: #333; }
        .entertainment { background-color: var(--red-color); }
        .savings { background-color: var(--purple-color); }
        .healthcare { background-color: var(--cyan-color); }
        .education { background-color: var(--green-color); }
        .personal-care { background-color: var(--orange-color); }

        /* Save Button */
        .save-btn {
            display: block;
            margin-left: auto;
            background-color: var(--green-color);
            box-shadow: 0 4px 15px rgba(39, 174, 96, 0.3);
            border-radius: 8px;
            padding: 12px 25px;
        }

        .save-btn:hover {
            background-color: #229954;
        }

        .save-icon {
            margin-right: 10px;
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

            .form-row, .category-row {
                flex-direction: column;
                gap: 15px;
            }
            
            .category-row {
                padding: 15px 10px;
            }
            
            .benefits-section {
                flex-direction: column;
            }

            .header h1 {
                font-size: 2rem;
            }

            .subtitle {
                font-size: 1rem;
            }

            .legend {
                gap: 8px;
            }

            .legend-item {
                font-size: 0.8rem;
                padding: 6px 10px;
            }

            .common-categories-grid {
                grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            }
        }

        /* Animation Effects */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .card, .tips-card, .benefits-card, .common-categories-card {
            animation: fadeIn 0.6s ease-out forwards;
        }

        .benefits-card { animation-delay: 0.2s; }
        .common-categories-card { animation-delay: 0.4s; }
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
        <div class="header">
            <h1>Budget Allocator</h1>
            <p class="subtitle">Take control of your finances by easily distributing your budget across different categories and tracking your spending</p>
        </div>
        
        <div class="card">
            <form id="budgetForm" action="process_budget.php" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label for="totalBudget">Total Budget</label>
                        <input type="number" id="totalBudget" name="totalBudget" value="3000" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="currency">Currency</label>
                        <select id="currency" name="currency">
                            <option value="USD - $">USD - $</option>
                            <option value="EUR - €">EUR - €</option>
                            <option value="GBP - £">GBP - £</option>
                            <option value="JPY - ¥">JPY - ¥</option>
                            <option value="CAD - C$">CAD - C$</option>
                        </select>
                    </div>
                    <div class="form-group" style="display: flex; align-items: flex-end;">
                        <button type="button" id="hideChartBtn">
                            <i class="fas fa-sync-alt"></i>
                            <span id="hideChartText">Hide Chart</span>
                        </button>
                    </div>
                </div>
                
                <div id="chartSection">
                    <div class="chart-container">
                        <canvas id="budgetChart"></canvas>
                    </div>
                    
                    <div class="legend" id="chartLegend"></div>
                    
                    <div class="allocation-summary">
                        Total Allocated: <span id="totalAllocated">75%</span> 
                        (<span class="remaining" id="remaining">25%</span> remaining)
                    </div>
                </div>
                
                <div class="category-section">
                    <div class="category-header">
                        <h3>Budget Categories</h3>
                        <button type="button" class="add-category" id="addCategoryBtn">
                            <i class="fas fa-plus"></i> Add Category
                        </button>
                    </div>
                    
                    <div id="categoriesContainer">
                        <!-- Categories will be generated here -->
                    </div>
                </div>
                
                <button type="submit" class="save-btn">
                    <i class="fas fa-save save-icon"></i> Save Allocation
                </button>
            </form>
        </div>
        
        <div class="tips-card">
            <div class="tips-header">
                <div class="tips-icon">💡</div>
                Budget Allocation Tips
            </div>
            <div class="tips-content">
                <p>A popular budgeting approach is the 50/30/20 rule: 50% for needs, 30% for wants, and 20% for savings and debt repayment.</p>
                <p>Consider adjusting your budget allocations seasonally to account for varying expenses throughout the year.</p>
            </div>
        </div>
        
        <div class="benefits-section">
            <div class="benefits-card">
                <h3>Benefits of Budgeting</h3>
                <div class="benefit-item">
                    <div class="benefit-icon">✓</div>
                    <span>Gain control over your finances</span>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">✓</div>
                    <span>Reduce financial stress and anxiety</span>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">✓</div>
                    <span>Achieve your financial goals faster</span>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">✓</div>
                    <span>Prepare for unexpected expenses</span>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">✓</div>
                    <span>Make more informed spending decisions</span>
                </div>
            </div>
            
            <div class="common-categories-card">
                <h3>Common Budget Categories</h3>
                <div class="common-categories-grid">
                    <div class="category-pill housing">
                        <span class="category-dot"></span>
                        Housing
                    </div>
                    <div class="category-pill food">
                        <span class="category-dot"></span>
                        Food
                    </div>
                    <div class="category-pill transportation">
                        <span class="category-dot"></span>
                        Transportation
                    </div>
                    <div class="category-pill entertainment">
                        <span class="category-dot"></span>
                        Entertainment
                    </div>
                    <div class="category-pill savings">
                        <span class="category-dot"></span>
                        Savings
                    </div>
                    <div class="category-pill healthcare">
                        <span class="category-dot"></span>
                        Healthcare
                    </div>
                    <div class="category-pill education">
                        <span class="category-dot"></span>
                        Education
                    </div>
                    <div class="category-pill personal-care">
                        <span class="category-dot"></span>
                        Personal Care
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initial categories
            const initialCategories = [
                { name: 'Housing', amount: 1000, percentage: 30, color: '#0d6efd' },
                { name: 'Food', amount: 500, percentage: 15, color: '#28a745' },
                { name: 'Transportation', amount: 300, percentage: 10, color: '#ffc107' },
                { name: 'Entertainment', amount: 200, percentage: 5, color: '#dc3545' },
                { name: 'Savings', amount: 500, percentage: 15, color: '#6f42c1' }
            ];
            
            // Other available colors for new categories
            const availableColors = [
                '#17a2b8', '#fd7e14', '#20c997', '#6610f2', '#d63384',
                '#0dcaf0', '#198754', '#6c757d', '#343a40', '#0275d8'
            ];
            
            let categories = [...initialCategories];
            let budgetChart;
            let colorIndex = 0;
            
            // Initialize the chart
            function initializeChart() {
                const ctx = document.getElementById('budgetChart').getContext('2d');
                
                budgetChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: categories.map(cat => `${cat.name}: ${cat.percentage}%`),
                        datasets: [{
                            data: categories.map(cat => cat.percentage),
                            backgroundColor: categories.map(cat => cat.color),
                            borderColor: 'white',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const label = context.label || '';
                                        const value = context.raw || 0;
                                        const totalBudget = parseFloat(document.getElementById('totalBudget').value);
                                        const amount = (totalBudget * value / 100).toFixed(2);
                                        return `${label} ($${amount})`;
                                    }
                                }
                            }
                        }
                    }
                });
                
                updateChartLegend();
            }
            
            // Update the chart legend
            function updateChartLegend() {
                const legendEl = document.getElementById('chartLegend');
                legendEl.innerHTML = '';
                
                categories.forEach(category => {
                    const item = document.createElement('div');
                    item.className = 'legend-item';
                    
                    const colorBox = document.createElement('div');
                    colorBox.className = 'legend-color';
                    colorBox.style.backgroundColor = category.color;
                    
                    const label = document.createElement('span');
                    label.textContent = `${category.name}: ${category.percentage}%`;
                    
                    item.appendChild(colorBox);
                    item.appendChild(label);
                    legendEl.appendChild(item);
                });
            }
            
            // Render category inputs
            function renderCategories() {
                const container = document.getElementById('categoriesContainer');
                container.innerHTML = '';
                
                categories.forEach((category, index) => {
                    const row = document.createElement('div');
                    row.className = 'category-row';
                    
                    // Category name input
                    const nameDiv = document.createElement('div');
                    nameDiv.className = 'category-name';
                    const nameInput = document.createElement('input');
                    nameInput.type = 'text';
                    nameInput.value = category.name;
                    nameInput.name = `category_name_${index}`;
                    nameInput.required = true;
                    nameInput.addEventListener('change', function() {
                        categories[index].name = this.value;
                        updateChart();
                    });
                    nameDiv.appendChild(nameInput);
                    
                    // Category amount input
                    const amountDiv = document.createElement('div');
                    amountDiv.className = 'category-amount';
                    
                    const currencyLabel = document.createElement('span');
                    currencyLabel.textContent = '$';
                    currencyLabel.style.marginRight = '5px';
                    
                    const amountInput = document.createElement('input');
                    amountInput.type = 'number';
                    amountInput.value = category.amount;
                    amountInput.name = `category_amount_${index}`;
                    amountInput.min = '0';
                    amountInput.required = true;
                    amountInput.addEventListener('change', function() {
                        const totalBudget = parseFloat(document.getElementById('totalBudget').value);
                        const newAmount = parseFloat(this.value);
                        categories[index].amount = newAmount;
                        categories[index].percentage = Math.round((newAmount / totalBudget) * 100);
                        updateCategoryInputs();
                        updateChart();
                    });
                    
                    amountDiv.appendChild(amountInput);
                    
                    // Category slider
                    const sliderDiv = document.createElement('div');
                    sliderDiv.className = 'category-slider';
                    
                    const slider = document.createElement('input');
                    slider.type = 'range';
                    slider.min = '0';
                    slider.max = '100';
                    slider.value = category.percentage;
                    slider.name = `category_percentage_${index}`;
                    slider.addEventListener('input', function() {
                        const totalBudget = parseFloat(document.getElementById('totalBudget').value);
                        const newPercentage = parseInt(this.value);
                        categories[index].percentage = newPercentage;
                        categories[index].amount = (totalBudget * newPercentage / 100).toFixed(0);
                        updateCategoryInputs();
                        updateChart();
                    });
                    
                    const percentLabel = document.createElement('span');
                    percentLabel.className = 'category-percent';
                    percentLabel.textContent = `${category.percentage}%`;
                    
                    sliderDiv.appendChild(slider);
                    sliderDiv.appendChild(percentLabel);
                    
                    // Delete button
                    const deleteBtn = document.createElement('button');
                    deleteBtn.type = 'button';
                    deleteBtn.className = 'delete-btn';
                    deleteBtn.innerHTML = '🗑️';
                    deleteBtn.addEventListener('click', function() {
                        categories.splice(index, 1);
                        renderCategories();
                        updateChart();
                    });
                    
                    row.appendChild(nameDiv);
                    row.appendChild(amountDiv);
                    row.appendChild(sliderDiv);
                    row.appendChild(deleteBtn);
                    
                    container.appendChild(row);
                });
                
                updateAllocationSummary();
            }
            
            // Update allocation summary
            function updateAllocationSummary() {
                const totalPercentage = categories.reduce((sum, cat) => sum + cat.percentage, 0);
                const remainingPercentage = 100 - totalPercentage;
                
                document.getElementById('totalAllocated').textContent = `${totalPercentage}%`;
                document.getElementById('remaining').textContent = `${remainingPercentage}%`;
                
                // Highlight if over-allocated
                if (totalPercentage > 100) {
                    document.getElementById('totalAllocated').style.color = '#dc3545';
                } else {
                    document.getElementById('totalAllocated').style.color = '';
                }
            }
            
            // Update the chart
            function updateChart() {
                if (budgetChart) {
                    budgetChart.data.labels = categories.map(cat => `${cat.name}: ${cat.percentage}%`);
                    budgetChart.data.datasets[0].data = categories.map(cat => cat.percentage);
                    budgetChart.data.datasets[0].backgroundColor = categories.map(cat => cat.color);
                    budgetChart.update();
                    
                    updateChartLegend();
                    updateAllocationSummary();
                }
            }
            
            // Update all category inputs to reflect the current state
            function updateCategoryInputs() {
                categories.forEach((category, index) => {
                    const amountInputs = document.querySelectorAll(`input[name="category_amount_${index}"]`);
                    const percentLabels = document.querySelectorAll(`.category-row:nth-child(${index + 1}) .category-percent`);
                    const sliders = document.querySelectorAll(`input[name="category_percentage_${index}"]`);
                    
                    if (amountInputs.length) amountInputs[0].value = category.amount;
                    if (percentLabels.length) percentLabels[0].textContent = `${category.percentage}%`;
                    if (sliders.length) sliders[0].value = category.percentage;
                });
            }
            
            // Add event listeners
            document.getElementById('totalBudget').addEventListener('change', function() {
                const newTotal = parseFloat(this.value);
                
                // Recalculate amounts based on percentages
                categories.forEach(category => {
                    category.amount = (newTotal * category.percentage / 100).toFixed(0);
                });
                
                renderCategories();
                updateChart();
            });
            
            document.getElementById('hideChartBtn').addEventListener('click', function() {
                const chartSection = document.getElementById('chartSection');
                const btnText = document.getElementById('hideChartText');
                const btnIcon = document.getElementById('hideChartIcon');
                
                if (chartSection.style.display === 'none') {
                    chartSection.style.display = 'block';
                    btnText.textContent = 'Hide Chart';
                    btnIcon.textContent = '⟳';
                } else {
                    chartSection.style.display = 'none';
                    btnText.textContent = 'Show Chart';
                    btnIcon.textContent = '⟳';
                }
                
                if (budgetChart) {
                    budgetChart.resize();
                }
            });
            
            document.getElementById('addCategoryBtn').addEventListener('click', function() {
                const newColor = availableColors[colorIndex % availableColors.length];
                colorIndex++;
                
                categories.push({
                    name: 'New Category',
                    amount: 0,
                    percentage: 0,
                    color: newColor
                });
                
                renderCategories();
                updateChart();
            });
            
            // Form submission handler
            document.getElementById('budgetForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Prepare data for PHP
                const formData = new FormData();
                formData.append('totalBudget', document.getElementById('totalBudget').value);
                formData.append('currency', document.getElementById('currency').value);
                formData.append('categories', JSON.stringify(categories));
                
                // Submit the form if using PHP
                // In this example, we'll just show an alert instead
                alert('Budget saved successfully!');
                
                // If you want to actually submit to PHP, uncomment the following:
                /*
                fetch('process_budget.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Budget saved successfully!');
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                });
                */
            });
            
            // Initialize the app
            initializeChart();
            renderCategories();
        });
    </script>
</body>
</html>