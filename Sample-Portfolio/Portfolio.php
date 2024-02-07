<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Piece Portfolio site</title>
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="onepiece.css">  

</head>

<body>

    <nav>
        <ul>
            <li><a href="#aboutme">About Me</a> </li>
            <li><a href="#projects">Projects</a> </li>
            <li><a href="#contact">Contact</a> </li>


     </ul>

    </nav>
    <section class="hero">
        <div class="container">
            <img src="luffy-pfp-905.png">
            <h1>Hi! Iam Monkey D Lufyy ,Iam the captain of the Straw Hat Pirates and Iam the man who become the king of the pirates</h1>
        </div>
    </section>
    <section id="aboutme" >
      <h2>About me</h2>
      <div class="aboutme">
        <div class="aboutme-section">
            <div class="img">
                <div class="aboutme-img"></div>
                 </div>
                 <div class="aboutme-text">
                  <p>Monkey D. Luffy, also known as "Straw Hat Luffy" and commonly as "Straw Hat", is the founder and captain of the increasingly infamous and powerful Straw Hat Pirates, as well as the most powerful of its top fighters.</p>
                  <p>He desires to find the legendary treasure left behind by the late Gol D. Roger and thereby become the Pirate King, which would help facilitate an unknown dream of his that he has told only to Shanks, his brothers, and crew.</p>
                  <p>He believes that being the Pirate King means having the most freedom in the world.</p>
                </div>
        </div>
        </div>
    </section>

    <section id="projects">
      <h2>Projects</h2>
      <div class="projects">
        
        <div class="projects">

          <div class="wano-project">
            <div class="text">
              <h3 class="project-name">Wano Arc</h3>
            <div class="content">
              <p>A HTML prooject about wano arc.</p>
            </div>
            <a class="button" href="https://onepiece.fandom.com/wiki/Wano_Country_Arc" target="_blank">View Project</a>

        </div>

      </div>

      
      <div class="egghead-project">
        <div class="text">
          <h3 class="project-name">Egghead Arc</h3>
        <div class="content">
          <p>A HTML prooject about Egghead arc.</p>
        </div>
        <a class="button" href="https://onepiece.fandom.com/wiki/Egghead_Arc" target="_blank">View Project</a>

     </div>

    </div>
      </div>
    </div>
  
    </section>

    <section id="contact" >
      <div class="contact">

      <div class="head">
      <h2>Contact</h2>
      <p>Use this form to get in touch.I would love to hear you!</p>
      </div>

      <?php
// Start a session
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "onepiece";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";  // Variable to store the message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['yourname'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $messageContent = $_POST['msg'];

    // SQL query to insert data into the database
    $sql = "INSERT INTO zoro (name, subject, email, message) VALUES ('$name', '$subject', '$email', '$messageContent')";

    if ($conn->query($sql) === TRUE) {
        $message = "Message sent successfully!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    // Store the message in the session
    $_SESSION['message'] = $message;
    // Redirect to the same page to prevent form resubmission on page refresh
    echo "<script>window.location.replace('{$_SERVER['PHP_SELF']}');</script>";
    exit();
}

// Check if a message is stored in the session
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    // Clear the session message
    unset($_SESSION['message']);
}

// Close the database connection
$conn->close();
?>


<!-- HTML form -->
<form class="contact-form" method="post" action="">
    <div class="contact-details">
        <label for="yourname">Name</label>
        <input type="text" id="yourname" name="yourname" placeholder="Your name">

        <label for="subject">Subject</label>
        <input type="text" id="subject" name="subject" placeholder="Reason for your message">

        <label for="email">Email Address</label>
        <input type="text" id="email" name="email" placeholder="Your Email address">
    </div>

    <div class="message">
        <label for="msg">Message</label>
        <textarea id="msg" name="msg" rows="5"></textarea>
        <button type="submit">Submit</button>

        <!-- Display the message -->
<div class="message">
    <?php echo $message; ?>
</div>
    </div>
</form>

  
  </section>
    <footer>
<div class="containers">
  <div class="copyright">
    This site 	&copy; 2024 Prathish

  </div>
  <div class="social-media">
    <a href="http://www.instagram.com/prathish_boopathi_17"><i class="fa fa-instagram"></i></a>
    <a href="https://www.facebook.com/prathish.boopathi.5?mibextid=JRoKGi"><i class="fa fa-facebook-f"></i></a>
    <a href="https://x.com/17Boopathi?t=HkqOinY7T-SPKpiqQPHpng&s=08"><i class="fa fa-twitter"></i></a>
  </div>
</div>

    </footer>

</body>

</html>