

<?php
// Include session check
include 'session_check.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Setting character encoding and responsive design -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Page title -->
    <title>Currency Converter & Budgeting Tool</title>
    
    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Embedded CSS Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
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
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 70px);
            padding: 2rem;
        }

        .converter-box {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            margin-bottom: 2rem;
            color: #2c3e50;
        }

        .amount, .from-currency, .to-currency {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #2c3e50;
        }

        input, select {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .select-box {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .select-box img {
            width: 30px;
            height: 20px;
            object-fit: cover;
        }

        .icon {
            text-align: center;
            margin: 1rem 0;
        }

        .icon i {
            font-size: 1.5rem;
            color: #3498db;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .icon i:hover {
            transform: rotate(180deg);
        }

        .result {
            text-align: center;
        }

        #convert {
            background: #3498db;
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            margin-bottom: 1rem;
            transition: background 0.3s;
        }

        #convert:hover {
            background: #2980b9;
        }

        .converted-amount {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 5px;
        }

        .converted-amount p {
            color: #7f8c8d;
            margin-bottom: 0.5rem;
        }

        .converted-amount h2 {
            color: #2c3e50;
            font-size: 1.5rem;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }

            .nav-links {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
                width: 100%;
            }

            .nav-links a {
                display: block;
                padding: 0.5rem;
            }

            .login-btn {
                width: 100%;
                text-align: center;
            }

            .container {
                padding: 1rem;
            }

            .converter-box {
                padding: 1.5rem;
                margin: 1rem;
            }

            h1 {
                font-size: 1.5rem;
                margin-bottom: 1.5rem;
            }

            .amount, .from-currency, .to-currency {
                margin-bottom: 1rem;
            }

            input, select {
                padding: 0.7rem;
                font-size: 0.9rem;
            }

            .select-box {
                flex-direction: column;
                gap: 0.5rem;
            }

            .select-box img {
                width: 25px;
                height: 15px;
            }

            .icon i {
                font-size: 1.2rem;
            }

            #convert {
                width: 100%;
                padding: 0.7rem;
                font-size: 0.9rem;
            }

            .converted-amount {
                padding: 0.8rem;
            }

            .converted-amount h2 {
                font-size: 1.2rem;
            }
        }

        @media (max-width: 480px) {
            .navbar {
                padding: 0.75rem;
            }

            .logo {
                font-size: 1.2rem;
            }

            .converter-box {
                padding: 1rem;
                margin: 0.5rem;
            }

            h1 {
                font-size: 1.3rem;
                margin-bottom: 1rem;
            }

            .amount, .from-currency, .to-currency {
                margin-bottom: 0.75rem;
            }

            input, select {
                padding: 0.6rem;
                font-size: 0.85rem;
            }

            .converted-amount h2 {
                font-size: 1.1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation bar with links to various pages -->
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
    

    <!-- Main content container for the currency converter -->
    <div class="container">
        <div class="converter-box">
            <!-- Heading for the tool -->
            <h1>Currency Converter</h1>
            
            <!-- Input field for the amount to convert -->
            <div class="amount">
                <label for="amount">Amount</label>
                <input type="number" id="amount" placeholder="Enter amount" value="0" min="0">
            </div>
            
            <!-- Dropdown to select source currency -->
            <div class="from-currency">
                <label for="from-currency">From</label>
                <div class="select-box">
                    <img src="" alt="flag" id="from-flag">
                    <select id="from-currency"></select>
                </div>
            </div>

            <!-- Swap icon to switch currencies -->
            <div class="icon">
                <i class="fas fa-exchange-alt" id="swap"></i>
            </div>

            <!-- Dropdown to select target currency -->
            <div class="to-currency">
                <label for="to-currency">To</label>
                <div class="select-box">
                    <img src="" alt="flag" id="to-flag">
                    <select id="to-currency"></select>
                </div>
            </div>

            <!-- Button to trigger conversion -->
            <button id="convert">Convert</button>

            <!-- Section to show the converted result -->
            <div class="result">
                <div class="converted-amount">
                    <p>Converted Amount</p>
                    <h2 id="converted-value">0.00</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Embedded JavaScript -->
    <script>
        // Currency Codes Data
        const currencyCodes = {
            "AED": { name: "UAE Dirham", country: "United Arab Emirates", code: "AE" },
            "AFN": { name: "Afghan Afghani", country: "Afghanistan", code: "AF" },
            "ALL": { name: "Albanian Lek", country: "Albania", code: "AL" },
            "AMD": { name: "Armenian Dram", country: "Armenia", code: "AM" },
            "ANG": { name: "Netherlands Antillean Guilder", country: "Netherlands Antilles", code: "AN" },
            "AOA": { name: "Angolan Kwanza", country: "Angola", code: "AO" },
            "ARS": { name: "Argentine Peso", country: "Argentina", code: "AR" },
            "AUD": { name: "Australian Dollar", country: "Australia", code: "AU" },
            "AWG": { name: "Aruban Florin", country: "Aruba", code: "AW" },
            "AZN": { name: "Azerbaijani Manat", country: "Azerbaijan", code: "AZ" },
            "BAM": { name: "Bosnia-Herzegovina Convertible Mark", country: "Bosnia and Herzegovina", code: "BA" },
            "BBD": { name: "Barbadian Dollar", country: "Barbados", code: "BB" },
            "BDT": { name: "Bangladeshi Taka", country: "Bangladesh", code: "BD" },
            "BGN": { name: "Bulgarian Lev", country: "Bulgaria", code: "BG" },
            "BHD": { name: "Bahraini Dinar", country: "Bahrain", code: "BH" },
            "BIF": { name: "Burundian Franc", country: "Burundi", code: "BI" },
            "BMD": { name: "Bermudan Dollar", country: "Bermuda", code: "BM" },
            "BND": { name: "Brunei Dollar", country: "Brunei", code: "BN" },
            "BOB": { name: "Bolivian Boliviano", country: "Bolivia", code: "BO" },
            "BRL": { name: "Brazilian Real", country: "Brazil", code: "BR" },
            "BSD": { name: "Bahamian Dollar", country: "Bahamas", code: "BS" },
            "BTC": { name: "Bitcoin", country: "Global", code: "BTC" },
            "BTN": { name: "Bhutanese Ngultrum", country: "Bhutan", code: "BT" },
            "BWP": { name: "Botswanan Pula", country: "Botswana", code: "BW" },
            "BYN": { name: "Belarusian Ruble", country: "Belarus", code: "BY" },
            "BZD": { name: "Belize Dollar", country: "Belize", code: "BZ" },
            "CAD": { name: "Canadian Dollar", country: "Canada", code: "CA" },
            "CDF": { name: "Congolese Franc", country: "Democratic Republic of Congo", code: "CD" },
            "CHF": { name: "Swiss Franc", country: "Switzerland", code: "CH" },
            "CLF": { name: "Chilean Unit of Account (UF)", country: "Chile", code: "CL" },
            "CLP": { name: "Chilean Peso", country: "Chile", code: "CL" },
            "CNH": { name: "Chinese Yuan (Offshore)", country: "China", code: "CN" },
            "CNY": { name: "Chinese Yuan", country: "China", code: "CN" },
            "COP": { name: "Colombian Peso", country: "Colombia", code: "CO" },
            "CRC": { name: "Costa Rican Colón", country: "Costa Rica", code: "CR" },
            "CUC": { name: "Cuban Convertible Peso", country: "Cuba", code: "CU" },
            "CUP": { name: "Cuban Peso", country: "Cuba", code: "CU" },
            "CVE": { name: "Cape Verdean Escudo", country: "Cape Verde", code: "CV" },
            "CZK": { name: "Czech Republic Koruna", country: "Czech Republic", code: "CZ" },
            "DJF": { name: "Djiboutian Franc", country: "Djibouti", code: "DJ" },
            "DKK": { name: "Danish Krone", country: "Denmark", code: "DK" },
            "DOP": { name: "Dominican Peso", country: "Dominican Republic", code: "DO" },
            "DZD": { name: "Algerian Dinar", country: "Algeria", code: "DZ" },
            "EGP": { name: "Egyptian Pound", country: "Egypt", code: "EG" },
            "ERN": { name: "Eritrean Nakfa", country: "Eritrea", code: "ER" },
            "ETB": { name: "Ethiopian Birr", country: "Ethiopia", code: "ET" },
            "EUR": { name: "Euro", country: "European Union", code: "EU" },
            "FJD": { name: "Fijian Dollar", country: "Fiji", code: "FJ" },
            "FKP": { name: "Falkland Islands Pound", country: "Falkland Islands", code: "FK" },
            "GBP": { name: "British Pound Sterling", country: "United Kingdom", code: "GB" },
            "GEL": { name: "Georgian Lari", country: "Georgia", code: "GE" },
            "GGP": { name: "Guernsey Pound", country: "Guernsey", code: "GG" },
            "GHS": { name: "Ghanaian Cedi", country: "Ghana", code: "GH" },
            "GIP": { name: "Gibraltar Pound", country: "Gibraltar", code: "GI" },
            "GMD": { name: "Gambian Dalasi", country: "Gambia", code: "GM" },
            "GNF": { name: "Guinean Franc", country: "Guinea", code: "GN" },
            "GTQ": { name: "Guatemalan Quetzal", country: "Guatemala", code: "GT" },
            "GYD": { name: "Guyanaese Dollar", country: "Guyana", code: "GY" },
            "HKD": { name: "Hong Kong Dollar", country: "Hong Kong", code: "HK" },
            "HNL": { name: "Honduran Lempira", country: "Honduras", code: "HN" },
            "HRK": { name: "Croatian Kuna", country: "Croatia", code: "HR" },
            "HTG": { name: "Haitian Gourde", country: "Haiti", code: "HT" },
            "HUF": { name: "Hungarian Forint", country: "Hungary", code: "HU" },
            "IDR": { name: "Indonesian Rupiah", country: "Indonesia", code: "ID" },
            "ILS": { name: "Israeli New Sheqel", country: "Israel", code: "IL" },
            "IMP": { name: "Manx pound", country: "Isle of Man", code: "IM" },
            "INR": { name: "Indian Rupee", country: "India", code: "IN" },
            "IQD": { name: "Iraqi Dinar", country: "Iraq", code: "IQ" },
            "IRR": { name: "Iranian Rial", country: "Iran", code: "IR" },
            "ISK": { name: "Icelandic Króna", country: "Iceland", code: "IS" },
            "JEP": { name: "Jersey Pound", country: "Jersey", code: "JE" },
            "JMD": { name: "Jamaican Dollar", country: "Jamaica", code: "JM" },
            "JOD": { name: "Jordanian Dinar", country: "Jordan", code: "JO" },
            "JPY": { name: "Japanese Yen", country: "Japan", code: "JP" },
            "KES": { name: "Kenyan Shilling", country: "Kenya", code: "KE" },
            "KGS": { name: "Kyrgystani Som", country: "Kyrgyzstan", code: "KG" },
            "KHR": { name: "Cambodian Riel", country: "Cambodia", code: "KH" },
            "KMF": { name: "Comorian Franc", country: "Comoros", code: "KM" },
            "KPW": { name: "North Korean Won", country: "North Korea", code: "KP" },
            "KRW": { name: "South Korean Won", country: "South Korea", code: "KR" },
            "KWD": { name: "Kuwaiti Dinar", country: "Kuwait", code: "KW" },
            "KYD": { name: "Cayman Islands Dollar", country: "Cayman Islands", code: "KY" },
            "KZT": { name: "Kazakhstani Tenge", country: "Kazakhstan", code: "KZ" },
            "LAK": { name: "Laotian Kip", country: "Laos", code: "LA" },
            "LBP": { name: "Lebanese Pound", country: "Lebanon", code: "LB" },
            "LKR": { name: "Sri Lankan Rupee", country: "Sri Lanka", code: "LK" },
            "LRD": { name: "Liberian Dollar", country: "Liberia", code: "LR" },
            "LSL": { name: "Lesotho Loti", country: "Lesotho", code: "LS" },
            "LYD": { name: "Libyan Dinar", country: "Libya", code: "LY" },
            "MAD": { name: "Moroccan Dirham", country: "Morocco", code: "MA" },
            "MDL": { name: "Moldovan Leu", country: "Moldova", code: "MD" },
            "MGA": { name: "Malagasy Ariary", country: "Madagascar", code: "MG" },
            "MKD": { name: "Macedonian Denar", country: "North Macedonia", code: "MK" },
            "MMK": { name: "Myanma Kyat", country: "Myanmar", code: "MM" },
            "MNT": { name: "Mongolian Tugrik", country: "Mongolia", code: "MN" },
            "MOP": { name: "Macanese Pataca", country: "Macau", code: "MO" },
            "MRU": { name: "Mauritanian Ouguiya", country: "Mauritania", code: "MR" },
            "MUR": { name: "Mauritian Rupee", country: "Mauritius", code: "MU" },
            "MVR": { name: "Maldivian Rufiyaa", country: "Maldives", code: "MV" },
            "MWK": { name: "Malawian Kwacha", country: "Malawi", code: "MW" },
            "MXN": { name: "Mexican Peso", country: "Mexico", code: "MX" },
            "MYR": { name: "Malaysian Ringgit", country: "Malaysia", code: "MY" },
            "MZN": { name: "Mozambican Metical", country: "Mozambique", code: "MZ" },
            "NAD": { name: "Namibian Dollar", country: "Namibia", code: "NA" },
            "NGN": { name: "Nigerian Naira", country: "Nigeria", code: "NG" },
            "NIO": { name: "Nicaraguan Córdoba", country: "Nicaragua", code: "NI" },
            "NOK": { name: "Norwegian Krone", country: "Norway", code: "NO" },
            "NPR": { name: "Nepalese Rupee", country: "Nepal", code: "NP" },
            "NZD": { name: "New Zealand Dollar", country: "New Zealand", code: "NZ" },
            "OMR": { name: "Omani Rial", country: "Oman", code: "OM" },
            "PAB": { name: "Panamanian Balboa", country: "Panama", code: "PA" },
            "PEN": { name: "Peruvian Nuevo Sol", country: "Peru", code: "PE" },
            "PGK": { name: "Papua New Guinean Kina", country: "Papua New Guinea", code: "PG" },
            "PHP": { name: "Philippine Peso", country: "Philippines", code: "PH" },
            "PKR": { name: "Pakistani Rupee", country: "Pakistan", code: "PK" },
            "PLN": { name: "Polish Zloty", country: "Poland", code: "PL" },
            "PYG": { name: "Paraguayan Guarani", country: "Paraguay", code: "PY" },
            "QAR": { name: "Qatari Rial", country: "Qatar", code: "QA" },
            "RON": { name: "Romanian Leu", country: "Romania", code: "RO" },
            "RSD": { name: "Serbian Dinar", country: "Serbia", code: "RS" },
            "RUB": { name: "Russian Ruble", country: "Russia", code: "RU" },
            "RWF": { name: "Rwandan Franc", country: "Rwanda", code: "RW" },
            "SAR": { name: "Saudi Riyal", country: "Saudi Arabia", code: "SA" },
            "SBD": { name: "Solomon Islands Dollar", country: "Solomon Islands", code: "SB" },
            "SCR": { name: "Seychellois Rupee", country: "Seychelles", code: "SC" },
            "SDG": { name: "Sudanese Pound", country: "Sudan", code: "SD" },
            "SEK": { name: "Swedish Krona", country: "Sweden", code: "SE" },
            "SGD": { name: "Singapore Dollar", country: "Singapore", code: "SG" },
            "SHP": { name: "Saint Helena Pound", country: "Saint Helena", code: "SH" },
            "SLL": { name: "Sierra Leonean Leone", country: "Sierra Leone", code: "SL" },
            "SOS": { name: "Somali Shilling", country: "Somalia", code: "SO" },
            "SRD": { name: "Surinamese Dollar", country: "Suriname", code: "SR" },
            "SSP": { name: "South Sudanese Pound", country: "South Sudan", code: "SS" },
            "STD": { name: "São Tomé and Príncipe Dobra", country: "São Tomé and Príncipe", code: "ST" },
            "STN": { name: "São Tomé and Príncipe Dobra", country: "São Tomé and Príncipe", code: "ST" },
            "SVC": { name: "Salvadoran Colón", country: "El Salvador", code: "SV" },
            "SYP": { name: "Syrian Pound", country: "Syria", code: "SY" },
            "SZL": { name: "Swazi Lilangeni", country: "Eswatini", code: "SZ" },
            "THB": { name: "Thai Baht", country: "Thailand", code: "TH" },
            "TJS": { name: "Tajikistani Somoni", country: "Tajikistan", code: "TJ" },
            "TMT": { name: "Turkmenistani Manat", country: "Turkmenistan", code: "TM" },
            "TND": { name: "Tunisian Dinar", country: "Tunisia", code: "TN" },
            "TOP": { name: "Tongan Pa'anga", country: "Tonga", code: "TO" },
            "TRY": { name: "Turkish Lira", country: "Turkey", code: "TR" },
            "TTD": { name: "Trinidad and Tobago Dollar", country: "Trinidad and Tobago", code: "TT" },
            "TWD": { name: "New Taiwan Dollar", country: "Taiwan", code: "TW" },
            "TZS": { name: "Tanzanian Shilling", country: "Tanzania", code: "TZ" },
            "UAH": { name: "Ukrainian Hryvnia", country: "Ukraine", code: "UA" },
            "UGX": { name: "Ugandan Shilling", country: "Uganda", code: "UG" },
            "USD": { name: "United States Dollar", country: "United States", code: "US" },
            "UYU": { name: "Uruguayan Peso", country: "Uruguay", code: "UY" },
            "UZS": { name: "Uzbekistan Som", country: "Uzbekistan", code: "UZ" },
            "VES": { name: "Venezuelan Bolívar", country: "Venezuela", code: "VE" },
            "VND": { name: "Vietnamese Dong", country: "Vietnam", code: "VN" },
            "VUV": { name: "Vanuatu Vatu", country: "Vanuatu", code: "VU" },
            "WST": { name: "Samoan Tala", country: "Samoa", code: "WS" },
            "XAF": { name: "CFA Franc BEAC", country: "Central African CFA", code: "CF" },
            "XAG": { name: "Silver Ounce", country: "Global", code: "XAG" },
            "XAU": { name: "Gold Ounce", country: "Global", code: "XAU" },
            "XCD": { name: "East Caribbean Dollar", country: "East Caribbean", code: "XC" },
            "XDR": { name: "Special Drawing Rights", country: "IMF", code: "XDR" },
            "XOF": { name: "CFA Franc BCEAO", country: "West African CFA", code: "CF" },
            "XPD": { name: "Palladium Ounce", country: "Global", code: "XPD" },
            "XPF": { name: "CFP Franc", country: "French Pacific", code: "PF" },
            "XPT": { name: "Platinum Ounce", country: "Global", code: "XPT" },
            "YER": { name: "Yemeni Rial", country: "Yemen", code: "YE" },
            "ZAR": { name: "South African Rand", country: "South Africa", code: "ZA" },
            "ZMW": { name: "Zambian Kwacha", country: "Zambia", code: "ZM" },
            "ZWL": { name: "Zimbabwean Dollar", country: "Zimbabwe", code: "ZW" }
        };

        // API Configuration
        const API_KEY = '99a0aec004527b1a155623da';
        const BASE_URL = `https://v6.exchangerate-api.com/v6/${API_KEY}/latest/`;

        // DOM Elements
        const amountInput = document.getElementById('amount');
        const fromCurrency = document.getElementById('from-currency');
        const toCurrency = document.getElementById('to-currency');
        const fromFlag = document.getElementById('from-flag');
        const toFlag = document.getElementById('to-flag');
        const convertBtn = document.getElementById('convert');
        const swapBtn = document.getElementById('swap');
        const convertedValue = document.getElementById('converted-value');

        // Populate currency dropdowns
        function populateCurrencies() {
            for (const [code, info] of Object.entries(currencyCodes)) {
                const option1 = document.createElement('option');
                const option2 = document.createElement('option');
                
                option1.value = code;
                option2.value = code;
                option1.textContent = `${info.name} (${code})`;
                option2.textContent = `${info.name} (${code})`;
                
                fromCurrency.appendChild(option1);
                toCurrency.appendChild(option2);
            }
            
            // Set default values
            fromCurrency.value = 'USD';
            toCurrency.value = 'INR';
            updateFlags();
        }

        // Update flag images
        function updateFlags() {
            const fromCode = currencyCodes[fromCurrency.value].code;
            const toCode = currencyCodes[toCurrency.value].code;
            
            fromFlag.src = `https://flagsapi.com/${fromCode}/flat/64.png`;
            toFlag.src = `https://flagsapi.com/${toCode}/flat/64.png`;
        }

        // Convert currency
        async function convertCurrency() {
            const amount = amountInput.value || 1;
            const from = fromCurrency.value;
            const to = toCurrency.value;
            
            try {
                const response = await fetch(`${BASE_URL}${from}`);
                const data = await response.json();
                
                if (data.result === 'success') {
                    const rate = data.conversion_rates[to];
                    const convertedAmount = (amount * rate).toFixed(2);
                    convertedValue.textContent = convertedAmount;
                } else {
                    throw new Error('Failed to fetch exchange rates');
                }
            } catch (error) {
                console.error('Error:', error);
                convertedValue.textContent = 'Error';
            }
        }

        // Swap currencies
        function swapCurrencies() {
            const temp = fromCurrency.value;
            fromCurrency.value = toCurrency.value;
            toCurrency.value = temp;
            updateFlags();
            convertCurrency();
        }
        
        // Event Listeners
        document.addEventListener('DOMContentLoaded', () => {
            populateCurrencies();
            convertCurrency();
        });
        
        fromCurrency.addEventListener('change', () => {
            updateFlags();
            convertCurrency();
        });
        
        toCurrency.addEventListener('change', () => {
            updateFlags();
            convertCurrency();
        });
        
        amountInput.addEventListener('input', convertCurrency);
        convertBtn.addEventListener('click', convertCurrency);
        swapBtn.addEventListener('click', swapCurrencies); 
    </script>
    </body>
    </html>
    
