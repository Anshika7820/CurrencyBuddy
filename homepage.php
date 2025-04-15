<?php
// Include session check
include 'session_check.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange Rates API</title>
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
            background-color: transparent;
        }

        .logo {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .logo img {
            height: 30px;
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

        .status-indicator {
            display: flex;
            align-items: center;
            margin-left: 1.5rem;
        }

        .status-dot {
            height: 10px;
            width: 10px;
            background-color: #4caf50;
            border-radius: 50%;
            margin-right: 5px;
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

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .hero-section {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
        }

        .hero-content {
            flex: 0 0 45%;
        }

        .badge {
            background-color: #1f3d5f;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            display: inline-block;
            font-weight: bold;
        }

        h1 {
            font-size: 2.5rem;
            margin: 1rem 0;
        }

        .subtitle {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .free-tier {
            background-color: #1f3d5f;
            padding: 1.5rem;
            border-radius: 10px;
            margin-top: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .free-tier-info h3 {
            margin-top: 0;
        }

        .free-tier-info p {
            opacity: 0.8;
            margin-bottom: 0;
        }

        .rate-cards {
            flex: 0 0 50%;
        }

        .rate-card {
            background-color: white;
            color: #333;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .rate-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .rate-title {
            color: #666;
            font-size: 0.9rem;
        }

        .rate-value {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .rate-change {
            color: #ff5252;
            text-align: right;
        }

        .rate-change.positive {
            color: #4caf50;
        }

        .rate-chart {
            width: 100%;
            height: 80px;
            margin-top: 1rem;
        }

        .date-range {
            text-align: right;
            font-size: 0.8rem;
            color: #666;
            margin-top: 0.5rem;
        }

        .additional-rates {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
        }

        .currency-rate {
            background-color: white;
            color: #333;
            border-radius: 10px;
            padding: 0.5rem 1rem;
            flex: 1;
            margin-right: 1rem;
            font-size: 0.9rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .currency-rate:last-child {
            margin-right: 0;
        }

        .time-filters {
            display: flex;
            flex-direction: column;
            position: absolute;
            right: 20px;
            top: 340px;
            background-color: #f1f1f1;
            border-radius: 5px;
            overflow: hidden;
        }

        .time-filter {
            padding: 0.3rem 0.8rem;
            font-size: 0.8rem;
            color: #333;
            cursor: pointer;
        }

        .time-filter.active {
            background-color: #4caf50;
            color: white;
        }

        .indian-data {
            margin-top: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .currency-table {
            background-color: white;
            border-radius: 10px;
            padding: 1rem;
            color: #333;
        }

        .currency-table h2 {
            margin-top: 0;
            color: white;
            background-color: #1a4789;
            padding: 1rem;
            margin: -1rem -1rem 1rem -1rem;
            border-radius: 10px 10px 0 0;
            display: flex;
            justify-content: space-between;
        }

        .rate-row {
            display: flex;
            justify-content: space-between;
            padding: 0.8rem 0;
            border-bottom: 1px solid #eee;
            align-items: center;
        }

        .rate-row:last-child {
            border-bottom: none;
        }

        .currency-pair {
            display: flex;
            align-items: center;
        }

        .currency-badge {
            background-color: #f2f2f2;
            color: #555;
            padding: 0.3rem 0.5rem;
            border-radius: 4px;
            margin-right: 0.8rem;
            font-size: 0.8rem;
        }

        .stock-market {
            background-color: white;
            border-radius: 10px;
            padding: 1rem;
            color: #333;
        }

        .stock-market h2 {
            margin-top: 0;
            color: white;
            background-color: #1a4789;
            padding: 1rem;
            margin: -1rem -1rem 1rem -1rem;
            border-radius: 10px 10px 0 0;
            display: flex;
            justify-content: space-between;
        }

        .stocks-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .stock-card {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 1rem;
        }

        .stock-name {
            font-weight: bold;
            font-size: 1.2rem;
            margin-bottom: 0.2rem;
        }

        .stock-symbol {
            color: #666;
            margin-bottom: 0.5rem;
        }

        .stock-price {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .stock-change {
            display: inline-block;
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
            font-size: 0.9rem;
        }

        .stock-change.positive {
            background-color: rgba(76, 175, 80, 0.2);
            color: #4caf50;
        }

        .stock-change.negative {
            background-color: rgba(255, 82, 82, 0.2);
            color: #ff5252;
        }

        /* Travel Market Deals Styles */
        .travel-deals-section {
            margin-top: 2rem;
            width: 100%;
            background-color: white;
            overflow: hidden;
        }

        .travel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1a4789;
            color: white;
            padding: 1rem 2rem;
        }

        .travel-header h2 {
            margin: 0;
            font-size: 1.5rem;
        }

        .travel-cards-container {
            display: flex;
            flex-wrap: wrap;
            padding: 1rem;
            gap: 1rem;
            justify-content: space-between;
        }

        .travel-card {
            flex: 1 1 280px;
            max-width: 320px;
            background-color: #f5f5f5;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .travel-card-image {
            height: 180px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #e0e0e0;
        }

        .travel-card-image img {
            max-width: 100%;
            max-height: 100%;
        }

        .travel-card-content {
            padding: 1rem;
            color: #333;
        }

        .travel-card-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .travel-card-duration {
            color: #555;
            margin-bottom: 0.5rem;
        }

        .travel-card-price {
            color: #1a4789;
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .travel-card-availability {
            color: #777;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <!-- Replace the navbar in your Homepage.html with this code -->
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
        <a href="feedback.php">FeedBack</a>
        
    
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
        <div class="hero-section">
            <div class="hero-content">
                
                <h1>Real-time Currency Convertor and Budget Allocator</h1>
                <p class="subtitle">Free, easy-to-use interface delivering real-time currency exchange rate data and budget allocator.</p>
            </div>

            <div class="rate-cards">
                <div class="rate-card">
                    <div class="rate-header">
                        <div>
                            <div class="rate-title">USD / EUR</div>
                            <div class="rate-subtitle">Foreign Exchange Rate</div>
                        </div>
                        <div>
                            <div class="rate-value">0.83742921</div>
                            <div class="rate-change">-0.16</div>
                        </div>
                    </div>
                    <canvas id="usdEurChart" class="rate-chart"></canvas>
                    <div class="date-range">april 2, 2025 to April 6, 2025</div>
                </div>

                <div class="rate-card">
                    <div class="rate-header">
                        <div>
                            <div class="rate-title">GBP / EUR</div>
                            <div class="rate-subtitle">Foreign Exchange Rate</div>
                        </div>
                        <div>
                            <div class="rate-value">1.1593847</div>
                            <div class="rate-change positive">+1.97</div>
                        </div>
                    </div>
                    <canvas id="gbpEurChart" class="rate-chart"></canvas>
                </div>

                <div class="additional-rates">
                    <div class="currency-rate">
                        <div>JPY</div>
                        <div>134.77</div>
                        <div class="rate-change positive">+0.0 (0.0%)</div>
                    </div>
                    <div class="currency-rate">
                        <div>USD / GBP</div>
                        <div>0.72847</div>
                        <div class="rate-change positive">+0.16 (0.09%)</div>
                    </div>
                </div>

            </div>
        </div>

        

            
            </div>
        </div>
    </div>

    <!-- Travel Market Deals Section -->
    <div class="travel-deals-section">
        <div class="travel-header">
            <h2>Travel Market Deals</h2>
            <span>Featured</span>
        </div>
        <div class="travel-cards-container">
            <div class="travel-card">
                <div class="travel-card-image">
                    <img src="image.jpg" alt="Goa Beaches">
                </div>
                <div class="travel-card-content">
                    <div class="travel-card-title">Goa Beach Package</div>
                    <div class="travel-card-duration">3 Nights / 4 Days</div>
                    <div class="travel-card-price">₹12,999 per person</div>
                    <div class="travel-card-availability">Available through Dec 2023</div>
                </div>
            </div>
            
            <div class="travel-card">
                <div class="travel-card-image">
                    <img src="download.jpeg" alt="Kerala Backwaters">
                </div>
                <div class="travel-card-content">
                    <div class="travel-card-title">Kerala Backwaters</div>
                    <div class="travel-card-duration">5 Nights / 6 Days</div>
                    <div class="travel-card-price">₹24,500 per person</div>
                    <div class="travel-card-availability">Available through Jan 2024</div>
                </div>
            </div>
            
            <div class="travel-card">
                <div class="travel-card-image">
                    <img src="istockphoto-942152278-612x612.jpg" alt="Rajasthan Heritage">
                </div>
                <div class="travel-card-content">
                    <div class="travel-card-title">Rajasthan Heritage Tour</div>
                    <div class="travel-card-duration">7 Nights / 8 Days</div>
                    <div class="travel-card-price">₹32,999 per person</div>
                    <div class="travel-card-availability">Available year-round</div>
                </div>
            </div>
            
            <div class="travel-card">
                <div class="travel-card-image">
                    <img src="360_F_327490432_E0Ve4FMjC6kjCex350CsaMItt92JKnxP.jpg" alt="Andaman Islands">
                </div>
                <div class="travel-card-content">
                    <div class="travel-card-title">Andaman Islands</div>
                    <div class="travel-card-duration">6 Nights / 7 Days</div>
                    <div class="travel-card-price">₹28,500 per person</div>
                    <div class="travel-card-availability">Oct 2023 - Mar 2024</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Create simple chart data
        function drawCharts() {
            // USD/EUR Chart
            const usdEurCtx = document.getElementById('usdEurChart').getContext('2d');
            drawChart(usdEurCtx, [0.84, 0.835, 0.84, 0.838, 0.839, 0.837, 0.836, 0.835], '#ff5252');
            
            // GBP/EUR Chart
            const gbpEurCtx = document.getElementById('gbpEurChart').getContext('2d');
            drawChart(gbpEurCtx, [1.14, 1.15, 1.155, 1.16, 1.158, 1.157, 1.159, 1.16], '#4caf50');
            
            // INR Chart
            const inrCtx = document.getElementById('inrChart').getContext('2d');
            drawLineChart(inrCtx, [0.0115, 0.0125, 0.0118, 0.0112, 0.0128, 0.011, 0.013, 0.0125, 0.0135, 0.0115]);
        }
        
        function drawChart(ctx, data, color) {
            ctx.beginPath();
            const width = ctx.canvas.width;
            const height = ctx.canvas.height;
            const step = width / (data.length - 1);
            
            // Find min and max to scale
            const min = Math.min(...data);
            const max = Math.max(...data);
            const range = max - min;
            
            // Start point
            ctx.moveTo(0, height - ((data[0] - min) / range) * height);
            
            // Draw line
            for (let i = 1; i < data.length; i++) {
                const x = i * step;
                const y = height - ((data[i] - min) / range) * height;
                ctx.lineTo(x, y);
            }
            
            ctx.strokeStyle = color;
            ctx.lineWidth = 2;
            ctx.stroke();
        }
        
        function drawLineChart(ctx, data) {
            ctx.beginPath();
            const width = ctx.canvas.width;
            const height = ctx.canvas.height;
            const step = width / (data.length - 1);
            
            // Find min and max to scale
            const min = Math.min(...data) * 0.95; // Add some padding
            const max = Math.max(...data) * 1.05;
            const range = max - min;
            
            // Start point
            ctx.moveTo(0, height - ((data[0] - min) / range) * height);
            
            // Draw line
            for (let i = 1; i < data.length; i++) {
                const x = i * step;
                const y = height - ((data[i] - min) / range) * height;
                ctx.lineTo(x, y);
            }
            
            ctx.strokeStyle = '#1a4789';
            ctx.lineWidth = 3;
            ctx.stroke();
        }
        
        // Initialize charts when page loads
        window.onload = drawCharts;
    </script>
</body>
</html>