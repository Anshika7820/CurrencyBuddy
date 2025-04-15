

<?php
// Include session check
include 'session_check.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us - CurrencyBuddy</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #2e5786, #1a3b5f);
      color: #fff;
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
        color: balck
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
      max-width: 1200px;
      margin: 40px auto;
      padding: 30px;
      background: rgba(255, 255, 255, 0.08);
      border-radius: 15px;
      backdrop-filter: blur(8px);
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
    }
    
    h1, h2, h3 {
      color: #fff;
      text-align: center;
    }
    
    p {
      font-size: 16px;
      line-height: 1.6;
    }

    .contact-row, .feedback-row {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 30px;
    }
    
    .contact-box, .feedback-box {
      flex: 1;
      min-width: 250px;
      background: rgba(255, 255, 255, 0.15);
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      text-align: center;
      transition: 0.3s ease-in-out;
    }
    
    .contact-box:hover, .feedback-box:hover {
      transform: translateY(-5px);
      background: rgba(255, 255, 255, 0.25);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
    }
    
    .contact-box i, .feedback-box i {
      font-size: 28px;
      color: #ffcc00;
      margin-bottom: 10px;
    }
    
    .contact-box p, .feedback-box p {
      color: #fff;
    }
    
    .stars {
      font-size: 20px;
      color: gold;
      margin: 10px 0;
    }

    .form-card {
      background: rgba(255, 255, 255, 0.15);
      padding: 30px;
      border-radius: 15px;
      margin-top: 40px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }
    
    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
      align-items: center;
      width: 100%;
    }
    
    input, textarea {
      width: 80%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
      outline: none;
      transition: all 0.3s ease;
    }
    
    input:focus, textarea:focus {
      background: rgba(255, 255, 255, 0.3);
      box-shadow: 0 0 0 2px rgba(255, 204, 0, 0.5);
    }
    
    input::placeholder, textarea::placeholder {
      color: rgba(255, 255, 255, 0.7);
    }
    
    button {
      padding: 12px 30px;
      font-size: 16px;
      border: none;
      border-radius: 30px;
      background: #ffcc00;
      color: #333;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    
    button:hover {
      background: #ff9900;
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .map-container {
      margin-top: 40px;
      height: 300px;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
    }
    
    .map-placeholder {
      height: 100%;
      background-color: rgba(255, 255, 255, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      color: #fff;
    }
    
    .social-icons {
      margin-top: 30px;
      text-align: center;
    }
    
    .social-icons i {
      margin: 0 15px;
      font-size: 1.8rem;
      color: #ffcc00;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    
    .social-icons i:hover {
      transform: translateY(-3px) scale(1.1);
      color: #ff9900;
    }
    
    #thankYou {
      text-align: center;
      padding: 20px;
    }
    
    @media (max-width: 768px) {
      .contact-row, .feedback-row {
        flex-direction: column;
      }
      
      input, textarea {
        width: 100%;
      }
      
      .navbar {
        flex-direction: column;
        padding: 1rem;
      }
      
      .logo {
        margin-bottom: 1rem;
      }
      
      .nav-links {
        flex-wrap: wrap;
        justify-content: center;
      }
      
      .nav-links a {
        margin: 0.5rem;
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
        <a href="currencyconvertor.php">Currency Converter</a>
        <a href="budgetallocator.php">Budget Allocator</a>
        <a href="contact.php">Contact</a>
        <a href="about.php">About</a>
        <a href="faq.php">FAQ</a>
        <a href="feed.php">Feedback</a>
        

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
    <h1>Contact Us</h1>
    <p style="text-align:center;">Have questions or need assistance? Our team is here to help.</p>

    <div class="contact-row">
      <div class="contact-box">
        <i class="fas fa-phone"></i>
        <p><strong>Call Us</strong></p>
        <p>+91-987654321</p>
      </div>
      <div class="contact-box">
        <i class="fas fa-envelope"></i>
        <p><strong>Email</strong></p>
        <p>info@CurrencyBuddy.com<br>support@CurrencyBuddy.com</p>
      </div>
      <div class="contact-box">
        <i class="fas fa-map-marker-alt"></i>
        <p><strong>Location</strong></p>
        <p>LPU Phagwara, Punjab, India 144411</p>
      </div>
    </div>

    <div class="form-card">
      <h2>Send Us a Message</h2>
      <form id="contactForm">
        <input type="text" id="name" name="name" placeholder="Full Name" required />
        <input type="email" id="email" name="email" placeholder="Email Address" required />
        <input type="text" id="subject" name="subject" placeholder="Subject" required />
        <textarea id="message" name="message" rows="5" placeholder="Your Message" required></textarea>
        <button type="submit" id="submitButton">Send Message</button>
      </form>
      <div id="thankYou" style="display:none;">
        <h3>Message Sent!</h3>
        <p>Thanks for reaching out. We'll get back to you shortly.</p>
        <button onclick="resetForm()">Send Another Message</button>
      </div>
    </div>

    <div class="map-container">
      <div class="map-placeholder">
        <i class="fas fa-map-marked-alt" style="font-size: 2rem; color: #ffcc00;"></i>
        <h3>CurrencyBuddy</h3>
        <p>LPU Phagwara, Punjab, India 144411</p>
      </div>
    </div>

    <div class="social-icons">
      <i class="fab fa-facebook" aria-label="Facebook"></i>
      <i class="fab fa-twitter" aria-label="Twitter"></i>
      <i class="fab fa-instagram" aria-label="Instagram"></i>
      <i class="fab fa-linkedin" aria-label="LinkedIn"></i>
    </div>

    <h2>User Feedback</h2>
    <div class="feedback-row">
      <div class="feedback-box">
        <p><strong>Anshika</strong></p>
        <div class="stars">⭐⭐⭐⭐⭐</div>
        <p>"Great tool! Helped me find matching documents quickly and efficiently."</p>
      </div>
      <div class="feedback-box">
        <p><strong>Jordan</strong></p>
        <div class="stars">⭐⭐⭐⭐</div>
        <p>"Very intuitive design. Love the user experience and response time."</p>
      </div>
      <div class="feedback-box">
        <p><strong>Sophia</strong></p>
        <div class="stars">⭐⭐⭐⭐⭐</div>
        <p>"The budget allocator saved me so much time planning my travels!"</p>
      </div>
    </div>
  </div>

  <script>
    const form = document.getElementById('contactForm');
    const thankYou = document.getElementById('thankYou');
    const submitButton = document.getElementById('submitButton');

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      submitButton.disabled = true;
      submitButton.innerText = 'Sending...';

      // Simulate form submission delay
      setTimeout(() => {
        form.style.display = 'none';
        thankYou.style.display = 'block';
        submitButton.disabled = false;
        submitButton.innerText = 'Send Message';
      }, 1500);
    });

    function resetForm() {
      form.reset();
      form.style.display = 'flex';
      thankYou.style.display = 'none';
    }
  </script>
</body>
</html>