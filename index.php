<?php
$counterFile = "counter.txt";
$ipFile = "ips.txt";
$visitorIP = $_SERVER['REMOTE_ADDR'];

// Load existing IPs
$existingIPs = file_exists($ipFile) ? file($ipFile, FILE_IGNORE_NEW_LINES) : [];

if (!in_array($visitorIP, $existingIPs)) {
    // New unique visitor
    $count = file_exists($counterFile) ? (int)file_get_contents($counterFile) : 0;
    $count++;
    file_put_contents($counterFile, $count);
    file_put_contents($ipFile, $visitorIP . PHP_EOL, FILE_APPEND);

    // Send email notification
    $to = "dsherman@parallaxviews.com";
    $subject = "New Unique Visitor to A Question of Balance";
    $message = "You have a new unique visitor!\nTotal unique visitors: " . $count;
    $headers = "From: website@parallaxviews.com";

    @mail($to, $subject, $message, $headers); // suppress error if mail fails
} else {
    $count = file_exists($counterFile) ? (int)file_get_contents($counterFile) : 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>A Question of Balance</title>
  <style>
    body {
      font-family: Georgia, serif;
      background-color: #091302;
      color: #000;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #091302;
      color: #f0b73d;
      padding: 2rem;
      text-align: center;
    }
    main {
      padding: 2rem;
      max-width: 1200px;
      margin: auto;
      background-color: white;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    section {
      margin-bottom: 2rem;
    }
    footer {
      text-align: center;
      padding: 1rem;
      background-color: #091302;
      color: #f0b73d;
    }
    a {
      color: #2980b9;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
    .download-link {
      display: inline-block;
      margin-top: 1rem;
      padding: 0.5rem 1rem;
      background-color: #2980b9;
      color: white;
      border-radius: 5px;
    }
    .download-link:hover {
      background-color: #009999;
    }
    .content-wrapper {
      display: flex;
      align-items: top;
      gap: 2rem;
    }
    .book-cover {
      flex: 0 0 auto;
      width: 200px;
      height: auto;
      margin-top: 25px;
    }
    .about-text {
      flex: 1;
    }
    form input, form textarea {
      width: 100%;
      padding: 10px;
      margin-top: 8px;
      margin-bottom: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-family: Georgia, serif;
      font-size: 16px;
    }
    form button {
      background-color: #2980b9;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }
    form button:hover {
      background-color: #009999;
    }
  </style>
</head>
<body>
  <header>
    <h1><i>A Question of Balance</i></h1>
    A thought-provoking murder mystery probing the uneasy space where <br>psychology, philosophy, and religion collide.
    <p><small><i>A novel by David S. Sherman</i></small></p>
  </header>
  <main>
    <div class="content-wrapper">
      <a href="AQOB Cover.png" target="_blank">
        <img src="AQOB Cover.png" alt="Book Cover" class="book-cover">
      </a>
      <section class="about-text">
        <p><i><b>For Dr. Steven Gold, a single patient may unearth the truth behind a murder—and himself.</b></i></p>
        <p><i><b>A Question of Balance</b> is a cerebral and emotionally charged mystery that examines the fragile terrain of guilt, belief, and the cost of self-knowledge.</i></p>
        <p><i><b>A Question of Balance</b></i> is a philosophical psychological murder mystery exploring the unraveling mind of therapist Steven Gold after an enigmatic new patient reveals unsettling truths.</p>
        <p>Blending the taut intensity of a therapy thriller with the layered depth of literary fiction and the moral complexity of a murder investigation...</p>
        <p>With echoes of <i>The Silent Patient</i> and <i>The Secret History</i>, <i><b>A Question of Balance</b></i> explores the fragile boundary between analysis and obsession—and how even a mind trained to heal can lose sight of itself.</p>
      </section>
    </div>

    <section>
      <p>Read the first four chapters...</p>
      <ul>
        <li><a href="Preview.pdf" class="download-link">Preview</a></li>
      </ul>
    </section>

    <section>
      <h2>Author</h2>
      <p>
        David S. Sherman, Ph.D., is a licensed psychotherapist, serial software entrepreneur, business startup strategist, and an explorer of the human psyche...
      </p>
    </section>

    <section id="contact">
      <h2>Contact</h2>
      <p>Send a message to the author:</p>
      <form action="https://formspree.io/f/xdkzdayz" method="POST">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Your Email</label>
        <input type="email" id="email" name="_replyto" required>

        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" required></textarea>

        <input type="text" name="_gotcha" style="display:none">
        <input type="hidden" name="_redirect" value="thank-you.html">

        <button type="submit">Send Message</button>
      </form>
    </section>
  </main>
  <footer>
    <p>Copyright &copy; 2025 David Scott Sherman. All rights reserved.</p>
  </footer>
</body>
</html>