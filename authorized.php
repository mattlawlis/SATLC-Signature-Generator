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
  
  <!--Styles -->
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
    
    /* Global Styles (for all non-signature text) */
    body, p, label, button, input, select, textarea {
      font-family: 'SofiaProLight', Arial, sans-serif;
      color: #404040;
      margin: 0;
      padding: 0;
    }
    
    /* Remove underline from links globally (if you prefer only on the website link, see instructions below) */
    a {
      text-decoration: none !important; /* (3) No underline style */
      color: #404040; /* Matches text color */
    }

    /* Header */
    .header {
      background-color: #FFF;
      padding: 20px 0;
      border-bottom: 1px solid #ddd;
      margin-bottom: 10px;
      text-align: center;
    }
    .header h1 {
      margin: 0;
      color: #404040;
      font-family: 'ActaHeadline-Bold', sans-serif;
      text-transform: uppercase;
      letter-spacing: 2px;
      font-size: 36px;
    }
    /* Mobile Warning (hidden by default) */
    #mobile-warning {
      display: none;
      font-family: 'SofiaProBold', sans-serif;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: red;
      margin-top: 10px;
      text-align: center;
    }
    #mobile-warning i {
      color: red;
      margin-right: 5px;
    }
    
    /* Section Headings ("Your Information" and "Live Preview") */
    .acta-headline {
      font-family: 'ActaHeadline-Bold', sans-serif;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: #404040;
    }
    
    /* Form Field Labels */
    .label {
      font-family: 'SofiaProBold', sans-serif;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: #404040;
    }
    
    /* Signature Preview Container */
    #signature_container {
      background-color: #ffffff !important;
      padding: 20px;
      border: 1px solid #ddd;
      font-size: 11pt;
      color: #404040;
    }

    /* Signature Styles */
    .signature {
      max-width: 600px;
      padding: 10px;
      font-family: "Arial", sans-serif !important; /* Force Arial for everything except name/awards/footer */
      line-height: normal !important;
    }

    /* (1) Tweak line-height in address and phone for less spacing in Outlook. */
    .signature .address,
    .signature .phone {
      margin: 0;
      line-height: 1.2; /* reduces vertical gap between lines */
      font-size: 9pt;
    }

    /* Name in Times New Roman */
    .signature .name {
      font-family: "Times New Roman", serif !important;
      font-size: 14.5pt;
      letter-spacing: 0.5pt;
      margin: 0 0 5px 0;
      text-transform: uppercase;
      line-height: 1.1; /* slight decrease for closer lines */
    }
    /* Title in Arial */
    .signature .title {
      font-size: 9pt;
      margin: 0;  /* No extra margin above the divider image */
      text-transform: uppercase;
      line-height: 1.2;
    }

    /* The divider image row */
    /* Adjust the top/bottom margin to match desired spacing */
    .signature .divider {
      margin: 10px 0;
    }

    /* Website line: reduce margins to address (2) extra padding above/below logo */
    .signature .website {
      font-size: 9pt;
      margin: 10px 0; /* lowered from 10px to 5px to reduce spacing */
      font-weight: bold;
    }

    /* Adjust .logo margin to reduce spacing (2) around the luxury-collection-sign-off.png */
    .signature .logo {
      margin: 5px 0; /* previously was 10px, reduced to 5px */
    }

    /* Awards in Times New Roman */
    .signature .awards {
      font-family: "Times New Roman", serif !important;
      font-size: 7.5pt;
      margin: 5px 0; /* reduce top margin after the logo */
      line-height: 1.2;
    }
    /* Footer in Times New Roman */
    .signature .footer {
      font-family: "Times New Roman", serif !important;
      font-size: 7.5pt;
      margin: 5px 0 0 0; /* reduce vertical space above footer */
      padding: 0;
      line-height: 1.2;
      background-color: transparent !important;
    }
    
    /* Copy Button Styling */
    #copyBtn {
      margin-top: 20px;
      background-color: #1c1c1c !important;
      border-color: #1c1c1c !important;
      border-radius: 9999px;
      font-family: 'SofiaProBold', sans-serif;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    #copyBtn .icon {
      display: none;
    }
    
    /* Instruction Card */
    .instruction-card {
      margin-bottom: 10px;
    }
    .instruction-card .card-content ul {
      list-style: none;
      padding-left: 0;
      margin: 0;
    }
    .instruction-card .card-content ul li {
      position: relative;
      padding-left: 25px;
      margin-bottom: 10px;
    }
    .instruction-card .card-content ul li::before {
      /*content: "\\f00c";
      font-family: "Font Awesome 5 Free";
      font-weight: 900;*/
      position: absolute;
      left: 0;
      top: 0;
      color: #404040;
    }
    
    /* Responsive: On mobile/tablet, hide all content except the header (which includes the mobile warning) */
    @media (max-width: 768px) {
      body > :not(.header) {
        display: none;
      }
      #mobile-warning {
        display: block;
      }
    }
  </style>
</head>

<body>

  <!-- Header Section with St Anthony Hotel Logo -->

  <header class="header">
    <img src="images/SATLC-Logo.png" alt="St Anthony Hotel Logo" width="125" style="display:block; margin:0 auto 10px;">
    <br>
    <h1>Employee Signature Generator</h1>

    <!-- Mobile Warning Message with FontAwesome warning icon -->
    <div id="mobile-warning">
      <i class="fas fa-exclamation-triangle"></i>
      THIS EMAIL SIGNATURE GENERATOR MUST BE ACCESSED FROM A DESKTOP COMPUTER.
    </div>
  </header>

  <!-- Instruction Section -->
  <section class="section">
    <div class="container">
      <div class="instruction-card card">
        <div class="card-content">
          <ul>
            <li>1) Please use this tool only on a desktop computer and not on a mobile phone or tablet.</li>
            <li>2) Fill out the fields below. The preview will update as you type. Please make sure your mobile number is formatted correctly: 210.123.4567</li>
            <li>3) Click the "Copy Signature" button.</li>
            <li>4) Open the Outlook program or the <a href="https://outlook.com">Outlook website</a> and ensure you are signed i to your St. Anthony email account.</li>
            <li>5) Select <strong>File > Options</strong>.</li>
            <li>6) Select <strong>Mail > Signatures</strong>.</li>
            <li>7) Select <strong>New</strong>, type a name, and select <strong>OK</strong>.</li>
            <li>8) In the <strong>Edit signature</strong> box, right click, and select the first icon under <strong>Paste Options:</strong> (Keep Source Formatting).</li>
            <li>9) To set your new signature as a <em>default</em> that will be auto-inserted in every message, under <strong>Choose default signature</strong>, select the drop down box next to <strong>New Messages</strong> or <strong>Replies/forwards</strong>, then select your new signature.</li>
            <li>10) You now have an email signature that is compliant with <a href="pdfs/LUX_EmailSignatures.pdf"><u>The Luxury Collection Email Signature Guidelines</u></a>.</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Main Content Section -->
  <section class="section">
    <div class="container">
      <div class="columns">
        <!-- LEFT COLUMN: Form -->
        <div class="column is-one-third">
          <h3 class="title is-4 acta-headline">Your Information</h3>
          <!-- START FORM -->
          <form id="form">
            <!-- First Name -->
            <div class="field">
              <label class="label" for="first_name">First Name</label>
              <div class="control has-icons-left">
                <input id="first_name" class="input" placeholder="First Name" required>
                <span class="icon is-small is-left"><i class="fas fa-user"></i></span>
              </div>
            </div>
            <!-- Last Name -->
            <div class="field">
              <label class="label" for="last_name">Last Name</label>
              <div class="control has-icons-left">
                <input id="last_name" class="input" placeholder="Last Name" required>
                <span class="icon is-small is-left"><i class="fas fa-user"></i></span>
              </div>
            </div>
            <!-- Title -->
            <div class="field">
              <label class="label" for="title">Title</label>
              <div class="control has-icons-left">
                <input id="title" class="input" placeholder="Your Title" required>
                <span class="icon is-small is-left"><i class="fas fa-briefcase"></i></span>
              </div>
            </div>
            <!-- Cell Phone -->
            <div class="field">
              <label class="label" for="cell">Cell Phone</label>
              <div class="control has-icons-left">
                <input id="cell" class="input" placeholder="123.456.7890" required pattern="(\\d{3}[-.]\\d{3}[-.]\\d{4}|\\(\\d{3}\\)\\s*\\d{3}[-.]\\d{4})" title="Format: 123.456.7890">
                <span class="icon is-small is-left"><i class="fas fa-mobile-alt"></i></span>
              </div>
            </div>
          </form>
          <!-- END FORM -->
        </div>

        <!-- RIGHT COLUMN: Live Preview -->
        <div class="column is-two-thirds">
          <h3 class="title is-4 acta-headline">Live Preview</h3>
          <!-- START PREVIEW -->
          <article class="message is-dark">
            <div class="message-body" id="signature_container">
              <div class="signature">
                <!-- Dynamic Name -->
                <p class="name" id="preview_name" style="margin-bottom:5px;">FIRST NAME<br>LAST NAME</p>
                <!-- Dynamic Title -->
                <p class="title" id="preview_title">TITLE</p>
                
                <!-- Divider Image Under Title -->
                <p class="divider">
                  <img src="images/TLC-Signature-Divider.png" width="39" alt="Divider" style="border: 0; display:block;">
                </p>
                
                <!-- Static Address -->
                <p class="address">
                  THE ST. ANTHONY, A LUXURY COLLECTION HOTEL<br>
                  300 E TRAVIS ST, SAN ANTONIO, TX 78205 UNITED STATES
                </p>
                <!-- Static Phone Numbers with Dynamic Mobile -->
                <p class="phone">
                  T&nbsp;210.227.4392 &nbsp;|&nbsp; M&nbsp;<span id="preview_mobile">000.000.0000</span> &nbsp;|&nbsp; F&nbsp;210.227.0915
                </p>
                
                <!-- Website spaced above logo with smaller margin -->
                <p class="website">
                  <a href="http://www.thestanthonyhotel.com/" target="_blank">www.thestanthonyhotel.com</a>
                </p>
                
                <!-- Static Logo -->
                <p class="logo">
                  <img src="images/luxury-collection-sign-off.png" width="200" alt="Luxury Collection" style="display:block; border:0;">
                </p>
                
                <!-- Static Awards (Times New Roman) -->
                <p class="awards">
                  Four Diamond Award / <i>AAA</i>
                </p>
                
                <!-- Signature Footer Text (Times New Roman) -->
                <p class="footer">
                  Operated by Crescent Hotels and Resorts under license from Marriott International, Inc. or one of its affiliates.
                </p>
              </div>
            </div>
          </article>
          <!-- END PREVIEW -->

          <!-- COPY BUTTON -->
          <div class="controls">
            <button class="button is-primary" id="copyBtn">
              <span>Copy Signature</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- JavaScript: Update Preview, Format Mobile, and Copy Functionality -->
  <script>
    (function(w) {
      const doc = w.document;
      const form = doc.getElementById('form');
      const copyBtn = doc.getElementById('copyBtn');

      // Preview Elements
      const previewName = doc.getElementById('preview_name');
      const previewTitle = doc.getElementById('preview_title');
      const previewMobile = doc.getElementById('preview_mobile');

      // Form Inputs
      const inputFirstName = doc.getElementById('first_name');
      const inputLastName = doc.getElementById('last_name');
      const inputTitle = doc.getElementById('title');
      const inputCell = doc.getElementById('cell');

      // Format a phone number to the pattern 123.456.7890
      function formatPhoneNumber(input) {
        let digits = input.replace(/\\D/g, '');
        if (digits.length === 10) {
          return digits.replace(/(\\d{3})(\\d{3})(\\d{4})/, '$1.$2.$3');
        }
        return input;
      }

      // Update the signature preview using the form values, converting to uppercase.
      function updatePreview() {
        const firstName = (inputFirstName.value.trim() || "FIRST NAME").toUpperCase();
        const lastName = (inputLastName.value.trim() || "LAST NAME").toUpperCase();
        previewName.innerHTML = `${firstName}<br>${lastName}`;

        previewTitle.textContent = (inputTitle.value.trim() || "TITLE").toUpperCase();

        const rawCell = inputCell.value.trim() || "0000000000";
        previewMobile.textContent = formatPhoneNumber(rawCell);
      }

      form.addEventListener('input', updatePreview);

      copyBtn.addEventListener('click', function() {
        const signatureContainer = doc.getElementById('signature_container');
        const range = doc.createRange();
        range.selectNodeContents(signatureContainer);
        const selection = w.getSelection();
        selection.removeAllRanges();
        selection.addRange(range);

        try {
          const successful = doc.execCommand('copy');
          alert(successful ? 'Signature copied to clipboard!' : 'Failed to copy signature.');
        } catch (err) {
          alert('Browser does not support copying.');
        }
        selection.removeAllRanges();
      });

      doc.addEventListener('DOMContentLoaded', updatePreview);
    })(window);
  </script>
</body>
</html>
