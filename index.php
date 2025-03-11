<?php
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => 'stanthonyemailsignature.site',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict',
]);
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>The St. Anthony Email Signature Generator</title>
  
  <!-- Favicon -->
  <link rel="icon" href="images/SATLC-favicon.png" type="image/png">
  
  <!-- Open Graph -->
  <meta property="og:image" content="images/SATLC-email-sig-generator-opengraph.png">
  
  <!-- Bulma CSS for Layout & Form Styling -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  <!-- Font Awesome (only used in input fields and mobile warning icon) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- Fonts and Styles -->
  <style>
    /* Import Custom Fonts */
    @font-face {
      font-family: 'ActaHeadline-Bold';
      src: url('fonts/ActaHeadline-Bold.otf') format('opentype');
    }
    @font-face {
      font-family: 'SofiaProBold';
      src: url('fonts/SofiaProBold.otf') format('opentype');
    }
    @font-face {
      font-family: 'SofiaProLight';
      src: url('fonts/SofiaProLight.otf') format('opentype');
    }
    body {
        margin: 0;
        padding: 0;
        background: url('images/st-anthony-bg.webp') no-repeat center center fixed;
        background-size: cover;
        color: white;
        font-family: 'SofiaProLight', sans-serif;
    }
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }
    #logo {
        width: 170px;
        margin-bottom: 30px;
    }
    .password-container {
        display: flex;
        align-items: center;
    }
    .password-container input[type="password"] {
        height: 50px;
        padding: 0 15px;
        font-size: 18px;
        border: none;
        outline: none;
        border-radius: 5px 0 0 5px;
        font-family: 'SofiaProLight', sans-serif;
        background-color: ##D9D9D6;
        color: #1c1c1c;
    }
    .password-container button {
        height: 50px;
        padding: 0 25px;
        background-color: #1c1c1c;
        color: white;
        font-family: 'SofiaProBold', sans-serif;
        font-size: 18px;
        border: none;
        cursor: pointer;
        border-radius: 0 5px 5px 0;
    }
    /* Adjust spacing between input and button */
    .password-container input[type="password"] {
        border-right: none;
    }
    .password-container button {
        margin-left: -5px;
    }
    /* Error Message Styling */
    .error-message {
        color: #9D2235;
        font-family: 'SofiaProBold', sans-serif;
        margin-top: 10px;
    }
    /* Responsive adjustments for mobile */
        @media only screen and (max-width: 768px) {
            #logo {
                width: 150px;
            }
            .password-container input[type="password"],
            .password-container button {
                height: 40px;
                font-size: 16px;
            }
            .password-container input[type="password"] {
                padding: 0 10px;
            }
            .password-container button {
                padding: 0 20px;
            }
        }
  </style>
</head>
  
<body>
    <div class="container">
        <!-- Logo Image -->
        <img id="logo" src="images/SATLC-Logo-white.png" alt="SATLC Logo">
        <!-- Password Field and Enter Button inside a Form -->
        <form action="process-password.php" method="post">
            <div class="password-container">
                <input type="password" name="password" placeholder="PASSWORD" required>
                <button type="submit">ENTER</button>
            </div>
            <!-- Display Error Message if any -->
            <?php
            if (isset($_GET['error']) && $_GET['error'] == '1') {
                echo '<div class="error-message">Incorrect Password</div>';
            }
            ?>
        </form>
    </div>
</body>
</html>
