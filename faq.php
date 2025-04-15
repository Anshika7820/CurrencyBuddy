

<?php
// Include session check
include 'session_check.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CurrencyBuddy – FAQs</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #2e5786, #1a3b5f);
      padding:0;
      margin:0;
      color: #333;
      min-height: 100vh;
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
        margin:0;
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
      max-width: 1200px;
      margin: 0 auto;
      position: relative;
      padding-top: 40px;
      padding-bottom: 40px;
      padding-left: 40px;
      padding-right: 40px;
    }

    .faq-wrapper {
      background: #ffffff;
      border-radius: 16px;
      padding: 40px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      margin-bottom: 30px;
    }

    .faq-title {
      text-align: center;
      font-size: 36px;
      margin-bottom: 30px;
      color: #2e5786;
      position: relative;
    }

    .faq-title::after {
      content: '';
      width: 80px;
      height: 4px;
      background: linear-gradient(90deg, #0077cc, #4caf50);
      display: block;
      margin: 10px auto 0;
      border-radius: 2px;
    }

    .faq-item {
      padding: 20px;
      border-bottom: 1px solid #dde8f0;
      cursor: pointer;
      transition: all 0.3s ease;
      border-radius: 12px;
      margin-bottom: 15px;
    }

    .faq-item:hover {
      background: #f5faff;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .faq-question {
      display: flex;
      justify-content: space-between;
      font-size: 20px;
      font-weight: 600;
      color: #2e5786;
    }

    .arrow {
      transition: transform 0.3s ease;
      font-size: 18px;
      color: #0077cc;
    }

    .faq-answer {
      max-height: 0;
      overflow: hidden;
      font-size: 16px;
      color: #444;
      margin-top: 10px;
      line-height: 1.6;
      transition: max-height 0.4s ease, opacity 0.3s ease, padding 0.3s ease;
      opacity: 0;
      padding: 0;
    }

    .faq-item.active {
      background-color: #f5faff;
      border-left: 4px solid #0077cc;
    }

    .faq-item.active .faq-answer {
      max-height: 300px;
      opacity: 1;
      padding-top: 15px;
    }

    .faq-item.active .arrow {
      transform: rotate(180deg);
      color: #0077cc;
    }

    /* Chatbot Styles */
    .chatbot-toggle {
      position: fixed;
      left: 30px;
      bottom: 30px;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: #2e5786;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      z-index: 100;
      transition: all 0.3s ease;
    }

    .chatbot-toggle:hover {
      transform: scale(1.1);
      background: #3a6ca8;
    }

    .chatbot-wrapper {
      position: fixed;
      left: 30px;
      bottom: 100px;
      width: 350px;
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      overflow: hidden;
      display: none;
      flex-direction: column; 
      z-index: 99;
      transition: all 0.3s ease;
      max-height: 70vh;
    }

    .chatbot-wrapper.active {
      display: flex;
      animation: slideIn 0.3s forwards;
    }

    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .chatbot-header {
      background: linear-gradient(90deg, #2e5786, #3a6ca8);
      color: white;
      padding: 15px;
      text-align: center;
      font-size: 1.2rem;
      font-weight: bold;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .chatbot-header svg {
      margin-right: 10px;
    }

    .close-chat {
      background: transparent;
      border: none;
      color: white;
      cursor: pointer;
      font-size: 18px;
    }

    .chatbot-messages {
      height: 300px;
      overflow-y: auto;
      padding: 15px;
      display: flex;
      flex-direction: column;
      scroll-behavior: smooth;
    }

    .message {
      padding: 12px 16px;
      border-radius: 20px;
      margin-bottom: 12px;
      max-width: 85%;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
      animation: fadeIn 0.5s;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .bot-message {
      background-color: #f0f3f8;
      align-self: flex-start;
      border-bottom-left-radius: 5px;
    }

    .user-message {
      background: linear-gradient(135deg, #2e5786, #3a6ca8);
      color: white;
      align-self: flex-end;
      border-bottom-right-radius: 5px;
    }

    .chatbot-options {
      padding: 15px;
      border-top: 1px solid #eee;
    }

    .option-btn {
      display: block;
      width: 100%;
      padding: 12px;
      margin-bottom: 10px;
      background-color: #f0f3f8;
      border: 1px solid #dde8f0;
      border-radius: 10px;
      text-align: left;
      cursor: pointer;
      transition: all 0.3s ease;
      font-size: 14px;
    }

    .option-btn:hover {
      background-color: #e6ebf5;
      transform: translateY(-2px);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }

    .option-btn:active {
      transform: translateY(0);
    }

    .option-btn:last-child {
      margin-bottom: 0;
    }

    .chat-input-container {
      display: flex;
      padding: 15px;
      border-top: 1px solid #eee;
    }

    .chat-input {
      flex: 1;
      padding: 12px 15px;
      border: 1px solid #dde8f0;
      border-radius: 30px;
      outline: none;
      transition: all 0.3s ease;
      font-size: 14px;
    }

    .chat-input:focus {
      border-color: #2e5786;
      box-shadow: 0 0 0 2px rgba(46, 87, 134, 0.1);
    }

    .send-btn {
      background: linear-gradient(135deg, #2e5786, #3a6ca8);
      color: white;
      border: none;
      width: 44px;
      height: 44px;
      border-radius: 50%;
      margin-left: 10px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }

    .send-btn:hover {
      transform: scale(1.1);
      box-shadow: 0 2px 8px rgba(46, 87, 134, 0.3);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      body {
        padding: 20px;
      }
      
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
      }
      
      .chatbot-wrapper {
        width: calc(100% - 40px);
        left: 20px;
        bottom: 90px;
      }
      
      .chatbot-toggle {
        left: 20px;
        bottom: 20px;
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
    <div class="faq-wrapper">
      <h2 class="faq-title">🌍 Frequently Asked Questions</h2>

      <div class="faq-item">
        <div class="faq-question">
          What is the purpose of this website?
          <span class="arrow">▼</span>
        </div>
        <div class="faq-answer">
          This website helps travelers manage their trip finances by converting currencies and allocating budgets for accommodation, transportation, and other expenses. Our user-friendly tools make it easy to plan your travel budget and track spending while abroad.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          How do I use the currency converter?
          <span class="arrow">▼</span>
        </div>
        <div class="faq-answer">
          Simply input the amount in your local currency, select the destination currency, and the tool will display the converted value using current exchange rates. You can also view historical rate trends to better plan your expenses.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          Can I set a custom travel budget?
          <span class="arrow">▼</span>
        </div>
        <div class="faq-answer">
          Absolutely! Enter your total budget and specify how much you'd like to spend on accommodation, transportation, food, activities, and other travel needs. Our system will help you allocate funds optimally based on your destination's typical costs.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          Is the budget allocation flexible?
          <span class="arrow">▼</span>
        </div>
        <div class="faq-answer">
          Yes, you can adjust your allocation manually or use our suggested breakdown based on your destination and trip duration. The budget allocator tool provides real-time feedback on how your changes affect the overall budget distribution.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          Does the tool support all currencies?
          <span class="arrow">▼</span>
        </div>
        <div class="faq-answer">
          We support over 150 global currencies, and the converter uses reliable exchange rate APIs to stay up-to-date. This includes all major currencies (USD, EUR, GBP, JPY, etc.) as well as most regional and emerging market currencies.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          Can I save my budget plan?
          <span class="arrow">▼</span>
        </div>
        <div class="faq-answer">
          Yes! You can download your budget summary as a PDF or export it to Excel for later reference or sharing. If you create an account, you can also save multiple budget plans for different trips and access them anytime from any device.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          Is the website mobile-friendly?
          <span class="arrow">▼</span>
        </div>
        <div class="faq-answer">
          Definitely! The entire platform is responsive and works seamlessly across phones, tablets, and desktops. You can plan your budget on your computer and access it on your mobile device while traveling.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          How often are exchange rates updated?
          <span class="arrow">▼</span>
        </div>
        <div class="faq-answer">
          Our exchange rates are updated hourly to ensure you have the most current and accurate conversion data for your travel planning. For major currencies, we even provide real-time market rates during active trading hours.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          Is there a limit on how many currencies I can convert?
          <span class="arrow">▼</span>
        </div>
        <div class="faq-answer">
          No, there are no limits! You can convert between any of our supported currencies as many times as you need. Premium users can also set up multiple currency pairs to track simultaneously on their dashboard.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">
          Can I use this tool for business travel?
          <span class="arrow">▼</span>
        </div>
        <div class="faq-answer">
          Absolutely! Our platform is designed for both leisure and business travelers. You can create separate budget categories for business expenses if needed, and generate expense reports that are compatible with most corporate accounting systems.
        </div>
      </div>
    </div>
  </div>

  <!-- Chatbot Toggle Button -->
  <div class="chatbot-toggle" id="chatbotToggle">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <circle cx="12" cy="12" r="12" fill="white" opacity="0.9"/>
      <path d="M16 8H8C6.9 8 6 8.9 6 10V16C6 17.1 6.9 18 8 18H16C17.1 18 18 17.1 18 16V10C18 8.9 17.1 8 16 8Z" stroke="#2e5786" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14Z" stroke="#2e5786" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
  </div>

  <!-- Chatbot Interface -->
  <div class="chatbot-wrapper" id="chatbotWrapper">
    <div class="chatbot-header">
      <div style="display: flex; align-items: center;">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 8px;">
          <circle cx="12" cy="12" r="12" fill="white" opacity="0.2"/>
          <path d="M16 8H8C6.9 8 6 8.9 6 10V16C6 17.1 6.9 18 8 18H16C17.1 18 18 17.1 18 16V10C18 8.9 17.1 8 16 8Z" stroke="white" stroke-width="2"/>
          <path d="M12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14Z" stroke="white" stroke-width="2"/>
        </svg>
        CurrencyBuddy Assistant
      </div>
      <button class="close-chat" id="closeChat">✕</button>
    </div>
    <div class="chatbot-messages" id="chatMessages">
      <div class="message bot-message">
        Hi there! I'm your CurrencyBuddy Assistant. How can I help you today? Choose a question below or type your own!
      </div>
    </div>
    <div class="chatbot-options" id="chatOptions">
      <button class="option-btn">How do I convert currencies?</button>
      <button class="option-btn">What's the best way to allocate my travel budget?</button>
      <button class="option-btn">Are all currencies supported?</button>
      <button class="option-btn">How do I save my budget plan?</button>
    </div>
    <div class="chat-input-container">
      <input type="text" class="chat-input" id="chatInput" placeholder="Type your question...">
      <button class="send-btn" id="sendBtn">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M22 2L11 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M22 2L15 22L11 13L2 9L22 2Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </button>
    </div>
  </div>

  <script>
    // FAQ functionality with smooth animation
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
      item.addEventListener('click', () => {
        // Close other open items
        faqItems.forEach(otherItem => {
          if (otherItem !== item && otherItem.classList.contains('active')) {
            otherItem.classList.remove('active');
          }
        });
        
        // Toggle active class with animation
        item.classList.toggle('active');
        
        // Scroll the item into view if it's not fully visible
        if (item.classList.contains('active')) {
          const itemRect = item.getBoundingClientRect();
          const isVisible = (
            itemRect.top >= 0 &&
            itemRect.bottom <= window.innerHeight
          );
          
          if (!isVisible) {
            item.scrollIntoView({ behavior: 'smooth', block: 'center' });
          }
        }
      });
    });

    // Chatbot functionality
    const chatbotToggle = document.getElementById('chatbotToggle');
    const chatbotWrapper = document.getElementById('chatbotWrapper');
    const closeChat = document.getElementById('closeChat');
    const chatMessages = document.getElementById('chatMessages');
    const chatInput = document.getElementById('chatInput');
    const sendBtn = document.getElementById('sendBtn');
    const optionBtns = document.querySelectorAll('.option-btn');

    // Show/hide chatbot
    chatbotToggle.addEventListener('click', () => {
      chatbotWrapper.classList.add('active');
      // Focus on input when chat opens
      setTimeout(() => chatInput.focus(), 300);
    });

    closeChat.addEventListener('click', () => {
      chatbotWrapper.classList.remove('active');
    });

    // FAQ answers database - expanded with more detailed responses
    const faqAnswers = {
      "how do i convert currencies": "To convert currencies, navigate to our Currency Converter page from the top menu. Enter the amount you want to convert, select your base currency from the dropdown menu, then choose the target currency you want to convert to. Click the 'Convert' button and you'll instantly see the result with the current exchange rate. You can also view historical trends by clicking the 'View History' button below the conversion result.",
      
      "what's the best way to allocate my travel budget": "For optimal budget allocation, we recommend the 50-30-20 approach for most travelers: allocate 50% of your budget for accommodation and transportation (your essential costs), 30% for food and activities (your daily experiences), and 20% for shopping, emergencies, and unexpected expenses. In our Budget Allocator tool, you can adjust these percentages based on your travel style - whether you're a luxury traveler who prioritizes accommodation or a backpacker who spends more on experiences. The tool also provides customized recommendations based on your destination country's cost of living.",
      
      "are all currencies supported": "We support over 150 global currencies including all major ones like USD, EUR, GBP, JPY, AUD, CAD, and many emerging market currencies like INR, BRL, ZAR, and more. Our system covers currencies from all continents and major economic regions. For specialized currencies or less common ones, we update our database regularly. If you need a specific currency that's not listed, please contact us through the feedback form and we'll prioritize adding it in our next update.",
      
      "how do i save my budget plan": "After creating your budget plan in our Budget Allocator tool, look for the 'Save Options' button at the bottom of the page. Clicking this will give you several options: save to your account (if you're logged in), download as a PDF document, export to an Excel spreadsheet, or share via email. Saved plans can be accessed anytime from your user dashboard. Premium users can also enable automatic synchronization with popular travel planning apps and expense trackers.",

      "what is the purpose of this website": "CurrencyBuddy is designed as a comprehensive financial companion for international travelers. Beyond just converting currencies, we help you create practical budget plans tailored to your destination's cost of living, track your expenses across multiple currencies, and provide insights on spending patterns during your trips. Our goal is to eliminate financial stress from travel planning so you can focus on enjoying your experience while staying within your budget.",

      "is the budget allocation flexible": "Yes, absolutely! Our budget allocation system is fully customizable. While we provide recommended percentages based on destination data and travel styles, you can adjust any category manually. The interactive slider interface lets you see in real-time how adjusting one category affects the others. You can create different scenarios (budget, mid-range, luxury) for the same trip to compare options, and even set up sub-categories for more detailed planning. The system adapts to your preferences rather than forcing you into a rigid structure.",

      "how often are exchange rates updated": "Our standard exchange rates are updated hourly using data from multiple reliable financial APIs to ensure accuracy and redundancy. For major currency pairs (like EUR/USD, GBP/EUR, USD/JPY), we provide near real-time rates during active market hours. Premium users can access minute-by-minute updates and set rate alerts when favorable exchange conditions occur. All historical data is preserved, allowing you to track trends and plan future trips during potentially favorable exchange periods.",

      "is there a limit on how many currencies i can convert": "No, there's absolutely no limit to how many currency conversions you can perform. You can convert between any of our 150+ supported currencies as many times as needed. Free users can perform up to 100 conversions daily, while premium users have unlimited access. You can also save your most frequently used currency pairs for quick access, and set up a multi-currency dashboard to track several exchange rates simultaneously - perfect for trips that span multiple countries.",

      "is the website mobile-friendly": "Yes, CurrencyBuddy is fully responsive and optimized for all devices. Our mobile experience is specially designed for travelers on the go, with offline capabilities that allow you to access saved conversion rates and budgets even without internet access. The mobile app (available for iOS and Android) offers additional features like OCR scanning of foreign prices, currency detection from photos, and integration with your phone's GPS to automatically suggest the local currency when you cross borders.",

      "can i use this tool for business travel": "Absolutely! Our platform has dedicated features for business travelers. You can categorize expenses as personal or business, generate expense reports in formats compatible with common accounting software (like QuickBooks, SAP, or Xero), track VAT/GST for potential refunds, and assign different projects or clients to specific expenses. Business accounts can manage multiple travelers under one dashboard, making it ideal for finance managers overseeing international teams. We also offer corporate subscription plans with advanced reporting features."
    };

    // Function to add a message to the chat with typing animation
    function addMessage(text, isUser = false) {
      const messageDiv = document.createElement('div');
      messageDiv.classList.add('message');
      messageDiv.classList.add(isUser ? 'user-message' : 'bot-message');
      
      if (isUser) {
        // User messages appear immediately
        messageDiv.textContent = text;
        chatMessages.appendChild(messageDiv);
      } else {
        // Bot messages have typing animation
        chatMessages.appendChild(messageDiv);
        
        // Add typing indicator
        let dots = 0;
        const typingIndicator = setInterval(() => {
          dots = (dots + 1) % 4;
          messageDiv.textContent = "Typing" + ".".repeat(dots);
        }, 300);
        
        // Show actual message after delay
        setTimeout(() => {
          clearInterval(typingIndicator);
          messageDiv.textContent = text;
        }, 1200);
      }
      
      // Scroll to the bottom
      chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // Function to process user input and generate response
    function processInput(text) {
      addMessage(text, true);
      
      // Convert to lowercase for case-insensitive matching
      const normalizedText = text.toLowerCase();
      
      // Find answer or use default response
      let response = "I'm not sure I understand. Could you try asking one of the questions from the options below, or rephrase your question?";
      let matchScore = 0;
      let bestMatch = "";
      
      // Find the best matching FAQ answer using keyword matching
      for (const [question, answer] of Object.entries(faqAnswers)) {
        // Check for exact phrases
        if (normalizedText === question) {
          response = answer;
          break;
        }
        
        // Check for partial matches and find the best one
        const questionWords = question.split(' ');
        let currentScore = 0;
        
        questionWords.forEach(word => {
          if (normalizedText.includes(word) && word.length > 3) { // Only count substantial words
            currentScore++;
          }
        });
        
        if (currentScore > matchScore) {
          matchScore = currentScore;
          bestMatch = question;
          response = answer;
        }
      }
      
      // If we have a decent match, use it
      if (matchScore > 0) {
        // Slight delay to simulate thinking
        setTimeout(() => {
          addMessage(response);
          updateOptions();
          // Add event for potential follow-up
          setTimeout(() => {
            if (matchScore > 0) {
              addMessage(`Do you have any other questions about ${bestMatch}?`);
            }
          }, 2500);
        }, 500);
      } else {
        // If no good match, use default response
        setTimeout(() => {
          addMessage(response);
          updateOptions();
        }, 500);
      }
    }

    // Function to update chatbot options with relevant questions
    function updateOptions() {
      const optionsContainer = document.getElementById('chatOptions');
      optionsContainer.innerHTML = '';
      
      // Get questions that haven't been asked yet
      const askedQuestions = Array.from(chatMessages.querySelectorAll('.user-message'))
        .map(msg => msg.textContent.toLowerCase());
      
      const availableQuestions = Object.keys(faqAnswers)
        .filter(q => !askedQuestions.some(asked => q.includes(asked) || asked.includes(q)));
      
      // Shuffle and take first 4 (or less if fewer are available)
      const shuffled = availableQuestions.sort(() => 0.5 - Math.random());
      const selectedQuestions = shuffled.slice(0, 4);
      
      // Create buttons for each question with improved styling
      selectedQuestions.forEach(question => {
        const formattedQuestion = question.charAt(0).toUpperCase() + question.slice(1) + '?';
        const btn = document.createElement('button');
        btn.classList.add('option-btn');
        btn.textContent = formattedQuestion;
        btn.addEventListener('click', () => processInput(question));
        optionsContainer.appendChild(btn);
      });
      
      // If we have fewer than 4 questions, add a reset option
      if (selectedQuestions.length < 4 || selectedQuestions.length === 0) {
        const resetBtn = document.createElement('button');
        resetBtn.classList.add('option-btn');
        resetBtn.textContent = "Start over with new questions";
        resetBtn.style.background = "#e6f2ff";
        resetBtn.style.borderColor = "#2e5786";
        resetBtn.addEventListener('click', () => {
          addMessage("Let's start fresh! What would you like to know about using CurrencyBuddy?", false);
          
          // Reset available options
          setTimeout(() => {
            const allQuestions = Object.keys(faqAnswers);
            const newOptions = allQuestions.sort(() => 0.5 - Math.random()).slice(0, 4);
            
            optionsContainer.innerHTML = '';
            newOptions.forEach(question => {
              const formattedQuestion = question.charAt(0).toUpperCase() + question.slice(1) + '?';
              const btn = document.createElement('button');
              btn.classList.add('option-btn');
              btn.textContent = formattedQuestion;
              btn.addEventListener('click', () => processInput(question));
              optionsContainer.appendChild(btn);
            });
          }, 1000);
        });
        optionsContainer.appendChild(resetBtn);
      }
    }

    // Event listeners for sending messages
    sendBtn.addEventListener('click', () => {
      const text = chatInput.value.trim();
      if (text) {
        processInput(text);
        chatInput.value = '';
      }
    });

    chatInput.addEventListener('keypress', (e) => {
      if (e.key === 'Enter') {
        const text = chatInput.value.trim();
        if (text) {
          processInput(text);
          chatInput.value = '';
        }
      }
    });

    // Initialize option buttons
    optionBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        processInput(btn.textContent);
      });
    });

    // Add hover effects for buttons
    document.querySelectorAll('.option-btn, .faq-item, .send-btn').forEach(el => {
      el.addEventListener('mouseenter', function() {
        this.style.transition = 'all 0.3s ease';
      });
    });

    // Add click effect for buttons
    document.querySelectorAll('.option-btn, .send-btn').forEach(el => {
      el.addEventListener('mousedown', function() {
        this.style.transform = 'scale(0.95)';
      });
      
      el.addEventListener('mouseup', function() {
        this.style.transform = '';
      });
    });

    // Add keyboard navigation for accessibility
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && chatbotWrapper.classList.contains('active')) {
        chatbotWrapper.classList.remove('active');
      }
    });

    // Add pulse animation to chat toggle button
    let pulseInterval;
    
    function startPulseAnimation() {
      chatbotToggle.style.animation = 'pulse 2s infinite';
    }
    
    function stopPulseAnimation() {
      chatbotToggle.style.animation = '';
    }
    
    // Pulse the chat button after a few seconds to draw attention
    setTimeout(startPulseAnimation, 3000);
    
    // Stop pulsing once the chat has been opened once
    chatbotToggle.addEventListener('click', () => {
      stopPulseAnimation();
      clearInterval(pulseInterval);
    });

    // Add initialization animation to FAQ items
    faqItems.forEach((item, index) => {
      item.style.opacity = '0';
      item.style.transform = 'translateY(20px)';
      
      setTimeout(() => {
        item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        item.style.opacity = '1';
        item.style.transform = 'translateY(0)';
      }, 100 + index * 100);
    });

    // Check if user is inactive and suggest help
    let inactivityTimer;
    
    function resetInactivityTimer() {
      clearTimeout(inactivityTimer);
      inactivityTimer = setTimeout(() => {
        if (!chatbotWrapper.classList.contains('active')) {
          // Highlight the chat button if chat is not already open
          chatbotToggle.style.animation = 'pulse 1s infinite';
          setTimeout(() => {
            chatbotToggle.style.animation = '';
          }, 5000);
        }
      }, 60000); // 1 minute of inactivity
    }
    
    // Reset timer on user interaction
    document.addEventListener('mousemove', resetInactivityTimer);
    document.addEventListener('keypress', resetInactivityTimer);
    
    // Initial call to start the inactivity timer
    resetInactivityTimer();
  </script>
</body>
</html>