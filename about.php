
<?php
// Include session check
include 'session_check.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - CurrencyBuddy</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    body {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #2e5786, #1a3b5f);
        color: #fff;
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
            background-color:white;
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
/*  
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }  */

        .user-dropdown:hover .dropdown-content {
            display: block;
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
        color:rgb(8, 8, 8);
    }

    .nav-links a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -4px;
        left: 0;
        background-color:rgb(6, 6, 6);
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

    .btn-primary {
      background-color: #4caf50;
      color: white;
      border: none;
      margin-left: 1rem;
    }

    .container {
      max-width: 1200px;
      margin: 40px auto;
      padding: 0;
    }

    .page-header {
      text-align: center;
      margin-bottom: 40px;
      padding: 60px 20px;
      background: rgba(0, 0, 0, 0.2);
      border-radius: 15px 15px 0 0;
      position: relative;
      overflow: hidden;
    }

    .page-header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('https://via.placeholder.com/1200x300') center/cover;
      opacity: 0.2;
      z-index: -1;
    }

    .page-header h1 {
      font-size: 3rem;
      margin: 0 0 15px;
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }

    .page-header p {
      font-size: 1.2rem;
      max-width: 800px;
      margin: 0 auto;
      opacity: 0.9;
    }

    .content-section {
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(8px);
      border-radius: 15px;
      padding: 40px;
      margin-bottom: 40px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .content-section:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
    }

    h1, h2, h3 {
      color: #fff;
    }

    h2 {
      font-size: 2rem;
      margin-top: 0;
      margin-bottom: 1.5rem;
      position: relative;
      display: inline-block;
    }

    h2::after {
      content: '';
      position: absolute;
      left: 0;
      bottom: -10px;
      width: 60px;
      height: 3px;
      background-color: #ffcc00;
    }

    p {
      font-size: 16px;
      line-height: 1.7;
      margin-bottom: 1.5rem;
    }

    .mission-vision {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 30px;
      margin: 40px 0;
    }

    .mission-box, .vision-box {
      flex: 1;
      min-width: 250px;
      background: rgba(255, 255, 255, 0.15);
      padding: 35px;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
      text-align: center;
      transition: all 0.4s ease;
      position: relative;
      overflow: hidden;
      z-index: 1;
    }

    .mission-box::before, .vision-box::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(45deg, rgba(255,255,255,0.1), rgba(255,255,255,0));
      z-index: -1;
      transition: all 0.4s ease;
    }

    .mission-box:hover, .vision-box:hover {
      transform: translateY(-10px);
      background: rgba(255, 255, 255, 0.25);
    }

    .mission-box:hover::before, .vision-box:hover::before {
      opacity: 0;
    }

    .mission-box i, .vision-box i {
      font-size: 50px;
      color: #ffcc00;
      margin-bottom: 20px;
      transition: all 0.4s ease;
    }

    .mission-box:hover i, .vision-box:hover i {
      transform: scale(1.2);
    }

    .mission-box h2, .vision-box h2 {
      margin-bottom: 20px;
    }

    .mission-box h2::after, .vision-box h2::after {
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
    }

    .stats-section {
      background: rgba(0, 0, 0, 0.2);
      padding: 50px 40px;
      border-radius: 15px;
      margin: 60px 0;
      position: relative;
      overflow: hidden;
    }

    .stats-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('https://via.placeholder.com/1200x400') center/cover;
      opacity: 0.1;
      z-index: -1;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 30px;
      text-align: center;
    }

    .stat-item {
      padding: 20px;
      transition: transform 0.3s ease;
    }

    .stat-item:hover {
      transform: translateY(-5px);
    }

    .stat-number {
      font-size: 48px;
      font-weight: bold;
      color: #ffcc00;
      margin-bottom: 15px;
      position: relative;
      display: inline-block;
    }

    .stat-label {
      font-size: 18px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .team-section {
      margin-top: 60px;
    }

    .team-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 40px;
      margin-top: 40px;
    }

    .team-member {
      background: rgba(255, 255, 255, 0.15);
      border-radius: 15px;
      overflow: hidden;
      text-align: center;
      transition: all 0.4s ease;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    .team-member:hover {
      transform: translateY(-10px);
      background: rgba(255, 255, 255, 0.25);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
    }

    .member-image {
      height: 200px;
      background-color: rgba(0, 0, 0, 0.2);
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }

    .member-image::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.7));
      opacity: 0;
      transition: all 0.4s ease;
    }

    .team-member:hover .member-image::before {
      opacity: 1;
    }

    .member-image i {
      font-size: 70px;
      color: rgba(255, 255, 255, 0.6);
      transition: all 0.4s ease;
    }

    .team-member:hover .member-image i {
      transform: scale(1.1);
      color: rgba(255, 255, 255, 0.8);
    }

    .member-info {
      padding: 25px 20px;
      position: relative;
    }

    .member-name {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 8px;
    }

    .member-title {
      color: #ffcc00;
      font-size: 16px;
      margin-bottom: 15px;
      letter-spacing: 1px;
    }

    .member-social {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-top: 20px;
    }

    .member-social i {
      color: white;
      font-size: 18px;
      transition: all 0.3s ease;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
    }

    .member-social i:hover {
      color: #ffcc00;
      background-color: rgba(255, 255, 255, 0.2);
      transform: translateY(-3px);
    }

    .features-list {
      list-style: none;
      padding: 0;
      margin: 30px 0;
    }

    .features-list li {
      padding: 15px 0;
      padding-left: 35px;
      position: relative;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      line-height: 1.6;
    }

    .features-list li:last-child {
      border-bottom: none;
    }

    .features-list li::before {
      content: '\f00c';
      font-family: 'Font Awesome 5 Free';
      font-weight: 900;
      position: absolute;
      left: 0;
      top: 15px;
      color: #ffcc00;
    }

    .features-list li strong {
      color: #ffcc00;
    }

    @media (max-width: 768px) {
      .navbar {
        padding: 1rem;
      }
      .nav-links a {
        margin-left: 0.8rem;
      }
      .page-header {
        padding: 40px 20px;
      }
      .page-header h1 {
        font-size: 2.2rem;
      }
      .content-section {
        padding: 30px 20px;
      }
      .mission-vision {
        flex-direction: column;
      }
      .stat-number {
        font-size: 36px;
      }
      .team-grid {
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      }
    }

    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .fade-in {
      animation: fadeIn 0.8s ease forwards;
    }

    .delay-1 {
      animation-delay: 0.2s;
    }

    .delay-2 {
      animation-delay: 0.4s;
    }

    .delay-3 {
      animation-delay: 0.6s;
    }

    /* Scroll animations */
    .scroll-fade {
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.8s ease;
    }

    .scroll-fade.active {
      opacity: 1;
      transform: translateY(0);
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
            <a href="homepag.php">Home</a>
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
    <div class="page-header fade-in">
      <h1>About CurrencyBuddy</h1>
      <p>Your trusted companion for smart currency conversion and financial planning while traveling abroad</p>
    </div>

    <div class="content-section fade-in delay-1">
      <p>CurrencyBuddy is a comprehensive financial tool designed to make international travel and financial planning easier. Our platform provides real-time currency conversion, smart budget allocation, and personalized financial insights to help you make the most of your money while traveling abroad.</p>
      
      <p>Founded in 2023, CurrencyBuddy has quickly grown to become a trusted companion for travelers, expatriates, and financial planners worldwide. Our mission is to simplify complex financial decisions and empower users with accurate, timely information.</p>
    </div>

    <div class="mission-vision fade-in delay-2">
      <div class="mission-box scroll-fade">
        <i class="fas fa-bullseye"></i>
        <h2>Our Mission</h2>
        <p>To provide accessible, reliable, and user-friendly currency conversion and budget planning tools that help people make informed financial decisions while traveling internationally.</p>
      </div>
      <div class="vision-box scroll-fade">
        <i class="fas fa-lightbulb"></i>
        <h2>Our Vision</h2>
        <p>To become the world's most trusted platform for travel finance management, empowering people to explore the world with financial confidence and peace of mind.</p>
      </div>
    </div>

    <div class="stats-section scroll-fade">
      <h2>CurrencyBuddy at a Glance</h2>
      <div class="stats-grid">
        <div class="stat-item">
          <div class="stat-number" data-count="150">0</div>
          <div class="stat-label">Supported Currencies</div>
        </div>
        <div class="stat-item">
          <div class="stat-number" data-count="250+">0</div>
          <div class="stat-label">Active Users</div>
        </div>
        <div class="stat-item">
          <div class="stat-number" data-count="99.9">0</div>
          <div class="stat-label">Uptime</div>
        </div>
        <div class="stat-item">
          <div class="stat-number" data-val="24/7">0</div>
          <div class="stat-label">Customer Support</div>
        </div>
      </div>
    </div>

    <div class="content-section team-section scroll-fade">
      <h2>Meet Our Team</h2>
      <p>CurrencyBuddy is powered by a diverse team of experts passionate about finance, technology, and customer experience.</p>
      
      <div class="team-grid">
        <div class="team-member">
          <div class="member-image">
            <i class="fas fa-user"></i>
          </div>
          <div class="member-info">
            <div class="member-name">Anshika</div>
            <div class="member-title">B.Tech CSE (LPU)</div>
            
            <div class="member-social">
              <i class="fab fa-linkedin"></i>
              <i class="fab fa-twitter"></i>
              <i class="fab fa-github"></i>
            </div>
          </div>
        </div>
        
        <div class="team-member">
          <div class="member-image">
            <i class="fas fa-user"></i>
          </div>
          <div class="member-info">
            <div class="member-name">Owais Raja</div>
            <div class="member-title">B.Tech CSE (LPU)</div>
            
            <div class="member-social">
              <i class="fab fa-linkedin"></i>
              <i class="fab fa-twitter"></i>
              <i class="fab fa-github"></i>
            </div>
          </div>
        </div>
        
        <div class="team-member">
          <div class="member-image">
            <i class="fas fa-user"></i>
          </div>
          <div class="member-info">
            <div class="member-name">Jiya Batra</div>
            <div class="member-title">B.Tech CSE (LPU)</div>
            
            <div class="member-social">
              <i class="fab fa-linkedin"></i>
              <i class="fab fa-twitter"></i>
              <i class="fab fa-github"></i>
            </div>
          </div>
        </div>
        
        <div class="team-member">
          <div class="member-image">
            <i class="fas fa-user"></i>
          </div>
          <div class="member-info">
            <div class="member-name">Dhruv Sonik</div>
            <div class="member-title">B.Tech CSE (LPU)</div>
            
            <div class="member-social">
              <i class="fab fa-linkedin"></i>
              <i class="fab fa-twitter"></i>
              <i class="fab fa-github"></i>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="content-section scroll-fade">
      <h2>Why Choose CurrencyBuddy?</h2>
      <p>CurrencyBuddy stands out from other currency tools for several reasons:</p>
      <ul class="features-list">
        <li><strong>Real-time Data:</strong> Our currency rates are updated in real-time to ensure accuracy.</li>
        <li><strong>Comprehensive Coverage:</strong> We support over 150 global currencies.</li>
        <li><strong>Smart Budget Allocation:</strong> Our unique budget allocation tool helps you plan your travel expenses efficiently.</li>
        <li><strong>User-Friendly Interface:</strong> Designed for simplicity and ease of use across all devices.</li>
        <li><strong>Free Access:</strong> Core features are available at no cost to users worldwide.</li>
      </ul>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Scroll animation
      const scrollElements = document.querySelectorAll('.scroll-fade');
      
      const elementInView = (el, dividend = 1) => {
        const elementTop = el.getBoundingClientRect().top;
        return (
          elementTop <= (window.innerHeight || document.documentElement.clientHeight) / dividend
        );
      };
      
      const displayScrollElement = (element) => {
        element.classList.add('active');
      };
      
      const hideScrollElement = (element) => {
        element.classList.remove('active');
      };
      
      const handleScrollAnimation = () => {
        scrollElements.forEach((el) => {
          if (elementInView(el, 1.25)) {
            displayScrollElement(el);
          } else {
            hideScrollElement(el);
          }
        });
      };
      
      // Initialize
      handleScrollAnimation();
      
      // Add scroll event
      window.addEventListener('scroll', () => {
        handleScrollAnimation();
      });
      
      // Counter animation
      const statNumbers = document.querySelectorAll('.stat-number');
      
      const animateCountUp = (el) => {
        const value = el.getAttribute('data-count');
        const specialVal = el.getAttribute('data-val');
        
        if (specialVal === '24/7') {
          el.textContent = '24/7';
          return;
        }
        
        const countUp = new CountUp(el, value);
        
        if (!countUp.error) {
          countUp.start();
        } else {
          console.error(countUp.error);
          el.textContent = value;
        }
      };
      
      // Simple CountUp function for demo purposes
      function CountUp(el, target) {
        this.el = el;
        this.target = parseFloat(target);
        this.error = '';
        
        this.start = () => {
          const duration = 2000;
          const startTime = performance.now();
          const startValue = 0;
          const isInteger = Number.isInteger(this.target);
          const hasDecimal = String(this.target).includes('.');
          
          const updateCount = (timestamp) => {
            const elapsed = timestamp - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            let currentCount;
            
            if (progress < 1) {
              currentCount = startValue + (this.target - startValue) * progress;
              
              if (isInteger) {
                currentCount = Math.floor(currentCount);
              } else if (hasDecimal) {
                currentCount = currentCount.toFixed(1);
              }
              
              if (this.target >= 1000) {
                if (this.target >= 1000000) {
                  this.el.textContent = Math.floor(currentCount / 1000) + 'K+';
                } else {
                  this.el.textContent = currentCount.toLocaleString() + '+';
                }
              } else if (String(this.target).endsWith('.9')) {
                this.el.textContent = currentCount + '%';
              } else {
                this.el.textContent = currentCount;
              }
              
              requestAnimationFrame(updateCount);
            } else {
              if (this.target >= 1000) {
                if (this.target >= 1000000) {
                  this.el.textContent = (this.target / 1000) + 'K+';
                } else {
                  this.el.textContent = this.target.toLocaleString() + '+';
                }
              } else if (String(this.target).endsWith('.9')) {
                this.el.textContent = this.target + '%';
              } else {
                this.el.textContent = this.target;
              }
            }
          };
          
          requestAnimationFrame(updateCount);
        };
      }
      
      // Check if element is in viewport
      function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
          rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
          rect.bottom >= 0
        );
      }
      
      // Trigger animation when stats section comes into view
      let animated = false;
      window.addEventListener('scroll', function() {
        if (!animated && statNumbers.length > 0) {
          const statsSection = document.querySelector('.stats-section');
          if (isInViewport(statsSection)) {
            statNumbers.forEach(animateCountUp);
            animated = true;
          }
        }
      });
      
      // Check on page load as well
      if (!animated && statNumbers.length > 0) {
        const statsSection = document.querySelector('.stats-section');
        if (isInViewport(statsSection)) {
          statNumbers.forEach(animateCountUp);
          animated = true;
        }
      }
    });
  </script>
</body>
</html>