<?php

include 'session_check.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback - CurrencyBuddy</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #2e5786;
      color: white;
      background-image: linear-gradient(135deg, #2e5786 0%, #1a3a5f 100%);
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
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

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 2rem;
        background-color: rgba(26, 58, 95, 0.8);
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
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
   
    .container {
      max-width: 1000px;
      margin: 0 auto;
      padding: 2rem;
    }

    .feedback-header {
      text-align: center;
      margin-bottom: 30px;
      position: relative;
      padding-top: 20px;
    }

    .feedback-header h1 {
      font-size: 2.5rem;
      margin-bottom: 15px;
      background: linear-gradient(45deg, #ffffff, #f39c12);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      position: relative;
      display: inline-block;
    }

    .feedback-header h1::after {
      content: '';
      position: absolute;
      bottom: -8px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 3px;
      background: #f39c12;
      border-radius: 2px;
    }

    .feedback-header p {
      font-size: 1.1rem;
      opacity: 0.9;
      max-width: 600px;
      margin: 0 auto;
    }

    .feedback-form {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 30px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
      border: 1px solid rgba(255, 255, 255, 0.1);
      transform: translateY(0);
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .feedback-form::before {
      content: "";
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
      transform: rotate(45deg);
      pointer-events: none;
    }

    .feedback-form:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    .form-group {
      margin-bottom: 20px;
      position: relative;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      color: rgba(255, 255, 255, 0.9);
      transition: all 0.3s ease;
    }

    .form-control {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 8px;
      background-color: rgba(255, 255, 255, 0.07);
      color: white;
      box-sizing: border-box;
      font-family: inherit;
      font-size: 16px;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      outline: none;
      border-color: #f39c12;
      box-shadow: 0 0 0 3px rgba(243, 156, 18, 0.2);
      background-color: rgba(255, 255, 255, 0.1);
    }

    .form-control::placeholder {
      color: rgba(255, 255, 255, 0.5);
    }

    textarea.form-control {
      min-height: 120px;
      resize: vertical;
    }

    .rating-container {
      display: flex;
      flex-direction: column;
      margin-bottom: 25px;
    }

    .rating-stars {
      display: flex;
      margin-top: 10px;
    }

    .rating-stars i {
      color: rgba(255, 255, 255, 0.3);
      font-size: 28px;
      margin-right: 8px;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .rating-stars i:hover {
      transform: scale(1.2);
    }

    .rating-stars i.active {
      color: #f39c12;
    }

    .categories {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      margin-top: 12px;
    }

    .category-checkbox {
      display: none;
    }

    .category-label {
      background-color: rgba(255, 255, 255, 0.07);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 20px;
      padding: 8px 16px;
      cursor: pointer;
      transition: all 0.3s ease;
      user-select: none;
    }

    .category-label:hover {
      background-color: rgba(255, 255, 255, 0.1);
      transform: translateY(-2px);
    }

    .category-checkbox:checked + .category-label {
      background-color: #f39c12;
      border-color: #f39c12;
      box-shadow: 0 4px 8px rgba(243, 156, 18, 0.3);
      transform: translateY(-2px);
    }

    .btn-submit {
      background: linear-gradient(45deg, #f39c12, #e67e22);
      color: white;
      border: none;
      padding: 14px 28px;
      border-radius: 30px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
      display: block;
      width: 100%;
      margin-top: 30px;
      position: relative;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(243, 156, 18, 0.4);
    }

    .btn-submit:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(243, 156, 18, 0.5);
    }

    .btn-submit:active {
      transform: translateY(0);
    }

    .btn-submit::after {
      content: "";
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      background: rgba(255, 255, 255, 0.2);
      border-radius: 50%;
      transform: translate(-50%, -50%);
      transition: width 0.5s, height 0.5s;
    }

    .btn-submit:hover::after {
      width: 300%;
      height: 300%;
    }

    .feedback-tips {
      background: rgba(255, 255, 255, 0.05);
      border-radius: 15px;
      padding: 25px;
      margin-top: 40px;
      border: 1px solid rgba(255, 255, 255, 0.05);
      transition: all 0.3s ease;
    }

    .feedback-tips:hover {
      background: rgba(255, 255, 255, 0.08);
    }

    .feedback-tips h3 {
      margin-top: 0;
      font-size: 1.3rem;
      color: #f39c12;
      position: relative;
      padding-bottom: 10px;
    }

    .feedback-tips h3::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 40px;
      height: 2px;
      background: #f39c12;
    }

    .feedback-tips ul {
      padding-left: 20px;
    }

    .feedback-tips li {
      margin-bottom: 12px;
      position: relative;
    }

    .feedback-tips li::before {
      content: "→";
      color: #f39c12;
      position: absolute;
      left: -20px;
    }

    .thank-you {
      display: none;
      text-align: center;
      padding: 40px;
      background: linear-gradient(135deg, rgba(76, 175, 80, 0.2), rgba(76, 175, 80, 0.1));
      border-radius: 20px;
      margin-top: 20px;
      border: 1px solid rgba(76, 175, 80, 0.3);
      animation: fadeIn 1s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .thank-you h2 {
      color: #4caf50;
      margin-bottom: 15px;
      font-size: 2rem;
    }

    .thank-you p {
      color: rgba(255, 255, 255, 0.9);
      max-width: 600px;
      margin: 10px auto;
    }

    /* Floating animated elements */
    .floating-element {
      position: absolute;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.05);
      pointer-events: none;
      z-index: -1;
    }

    .floating-element-1 {
      width: 150px;
      height: 150px;
      top: 5%;
      right: 10%;
      animation: float 15s infinite ease-in-out;
    }

    .floating-element-2 {
      width: 80px;
      height: 80px;
      bottom: 15%;
      left: 5%;
      animation: float 20s infinite ease-in-out reverse;
    }

    .floating-element-3 {
      width: 120px;
      height: 120px;
      bottom: 30%;
      right: 5%;
      animation: float 18s infinite ease-in-out 2s;
    }

    @keyframes float {
      0% { transform: translate(0, 0) rotate(0deg); }
      25% { transform: translate(15px, -15px) rotate(5deg); }
      50% { transform: translate(0, 15px) rotate(0deg); }
      75% { transform: translate(-15px, -5px) rotate(-5deg); }
      100% { transform: translate(0, 0) rotate(0deg); }
    }

    @media (max-width: 768px) {
      .navbar {
        padding: 1rem;
      }
      
      .container {
        padding: 1rem;
      }
      
      .nav-links a {
        margin-left: 0.8rem;
      }
      
      .feedback-form {
        padding: 20px;
      }
      
      .floating-element {
        display: none;
      }
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
    <div class="feedback-header">
      <h1>Your Feedback Matters</h1>
      <p>Help us improve CurrencyBuddy by sharing your experience and suggestions</p>
    </div>

    <div class="feedback-form" id="feedback-form">
      <form id="userFeedbackForm">
        <div class="form-group">
          <label for="fullName">Full Name</label>
          <input type="text" class="form-control" id="fullName" placeholder="Enter your name">
        </div>
        
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" class="form-control" id="email" placeholder="Enter your email">
        </div>
        
        <div class="rating-container">
          <label>How would you rate your experience?</label>
          <div class="rating-stars">
            <i class="far fa-star" data-rating="1"></i>
            <i class="far fa-star" data-rating="2"></i>
            <i class="far fa-star" data-rating="3"></i>
            <i class="far fa-star" data-rating="4"></i>
            <i class="far fa-star" data-rating="5"></i>
          </div>
        </div>
        
        <div class="form-group">
          <label>What aspect of CurrencyBuddy are you providing feedback on?</label>
          <div class="categories">
            <input type="checkbox" id="cat-ui" class="category-checkbox">
            <label for="cat-ui" class="category-label">User Interface</label>
            
            <input type="checkbox" id="cat-rates" class="category-checkbox">
            <label for="cat-rates" class="category-label">Currency Rates</label>
            
            <input type="checkbox" id="cat-budget" class="category-checkbox">
            <label for="cat-budget" class="category-label">Budget Allocator</label>
            
            <input type="checkbox" id="cat-converter" class="category-checkbox">
            <label for="cat-converter" class="category-label">Currency Converter</label>
            
            <input type="checkbox" id="cat-support" class="category-checkbox">
            <label for="cat-support" class="category-label">Customer Support</label>
            
            <input type="checkbox" id="cat-other" class="category-checkbox">
            <label for="cat-other" class="category-label">Other</label>
          </div>
        </div>
        
        <div class="form-group">
          <label for="feedback">Your Feedback</label>
          <textarea class="form-control" id="feedback" rows="5" placeholder="Please share your thoughts, suggestions, or issues you've encountered..."></textarea>
        </div>
        
        <div class="form-group">
          <label for="suggestions">How can we improve?</label>
          <textarea class="form-control" id="suggestions" rows="3" placeholder="Any specific ideas or suggestions for us?"></textarea>
        </div>
        
        <button type="submit" class="btn-submit">Submit Feedback</button>
      </form>
    </div>
    
    <div class="thank-you" id="thank-you">
      <h2>Thank You for Your Feedback!</h2>
      <p>We greatly appreciate your input and will use it to improve CurrencyBuddy.</p>
      <p>If you've requested a response, someone from our team will get back to you shortly.</p>
    </div>
    
    <div class="feedback-tips">
      <h3>Tips for Effective Feedback</h3>
      <ul>
        <li>Be specific about what you liked or disliked</li>
        <li>Mention which features you find most useful</li>
        <li>Let us know if you encountered any technical issues</li>
        <li>Share ideas for new features or improvements</li>
      </ul>
    </div>
  </div>

  <!-- Floating background elements -->
  <div class="floating-element floating-element-1"></div>
  <div class="floating-element floating-element-2"></div>
  <div class="floating-element floating-element-3"></div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Star rating functionality
      const stars = document.querySelectorAll('.rating-stars i');
      let rating = 0;
      
      stars.forEach(star => {
        star.addEventListener('mouseover', function() {
          const ratingValue = parseInt(this.dataset.rating);
          highlightStars(ratingValue);
        });
        
        star.addEventListener('mouseout', function() {
          highlightStars(rating);
        });
        
        star.addEventListener('click', function() {
          rating = parseInt(this.dataset.rating);
          highlightStars(rating);
        });
      });
      
      function highlightStars(count) {
        stars.forEach(star => {
          const starRating = parseInt(star.dataset.rating);
          if (starRating <= count) {
            star.classList.remove('far');
            star.classList.add('fas', 'active');
          } else {
            star.classList.remove('fas', 'active');
            star.classList.add('far');
          }
        });
      }
      
      // Add ripple effect to buttons
      const buttons = document.querySelectorAll('.btn-submit');
      
      buttons.forEach(button => {
        button.addEventListener('click', function(e) {
          const x = e.clientX - e.target.getBoundingClientRect().left;
          const y = e.clientY - e.target.getBoundingClientRect().top;
          
          const ripple = document.createElement('span');
          ripple.style.left = `${x}px`;
          ripple.style.top = `${y}px`;
          this.appendChild(ripple);
          
          setTimeout(() => {
            ripple.remove();
          }, 600);
        });
      });
      
      // Form submission
      const feedbackForm = document.getElementById('userFeedbackForm');
      const formContainer = document.getElementById('feedback-form');
      const thankYouMessage = document.getElementById('thank-you');
      
      feedbackForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Here you would typically send the form data to your server
        // For demo purposes, we'll just show the thank you message
        formContainer.style.display = 'none';
        thankYouMessage.style.display = 'block';
        
        // Scroll to thank you message
        thankYouMessage.scrollIntoView({behavior: 'smooth'});
      });
    });
  </script>
</body>
</html>