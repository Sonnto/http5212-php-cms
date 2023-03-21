<?php

include( 'admin/includes/database.php' );
include( 'admin/includes/config.php' );
include( 'admin/includes/functions.php' );

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Portfolio website" />
    <meta
      name="keywords"
      content="full-stack, developer, front-end, back-end, software, engineer, portfolio, HTML, CSS, JavaScript, MongoDB, Express.js, React.js, Node.js, SQL, mySQL, PHP, C#, Python, JQuery, Toronto, Ontario, Canada, Hong Kong, Cantonese"
    />
    <meta name="author" content="Kee-Fung Anthony Ho" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Anthony Ho | Full-Stack Developer</title>
    <script
      src="https://kit.fontawesome.com/fe76fcb7fd.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" type="text/css" href="normalize.css" />
    <link rel="stylesheet" type="text/css" href="main.css" />
    <meta name="theme-color" content="#fafafa" />
</head>
<body>
    <header id="header">
      <!--============================== NAV ==============================-->
      <nav id="nav">
        <div id="menu-tab"></div>
        <div id="menu-toggle">
          <input name="menu-button-click" type="checkbox" />
          <span></span>
          <span></span>
          <span></span>
          <ul id="menu">
            <li><a href="#home">Home</a></li>
            <li><hr class="nav-division" /></li>
            <li><a href="#about">About</a></li>
            <li><hr class="nav-division" /></li>
            <li><a href="#resume">Résumé</a></li>
            <li><hr class="nav-division" /></li>
            <li><a href="#projects">Projects</a></li>
          </ul>
        </div>
      </nav>
    </header>
      <!--============================== HOME ==============================-->
      <section id="home" class="home-container">
        <div class="emblem-item">
          <img
            class="emblem"
            src="./assets/images/placeholder-emblem.png"
            alt="Placeholder emblem for website."
          />
        </div>
        <h1 class="main-title">
          Full-Stack<span class="next-line">Developer</span>
        </h1>
        <div class="subtext">
          <p>Front-End • Back-End</p>
          <p>UX • Design • UI</p>
          <p>Web • Mobile • Apps</p>
        </div>
        <div class="social-icons">
        <a
          href="https://github.com/sonnto"
          aria-label="Click for Anthony's Github"
          rel="noopener"
          ><i class="fa-brands fa-square-github"></i
        ></a>
        <a
          href="https://linkedin.com/in/anthonykfho"
          aria-label="Click for Anthony's LinkedIn"
          rel="noopener"
          ><i class="fa-brands fa-linkedin"></i
        ></a>
        <a
          href="https://twitter.com/anthonykfho"
          aria-label="Click for Anthony's Twitter"
          rel="noopener"
          ><i class="fa-brands fa-square-twitter"></i
        ></a>
        </div>
      </section>
    <hr id="division" />
    <!--============================== ABOUT ==============================-->
    <section id="about" class="about-container">
      <h2 class="section-heading desktop-sect-heading">
        Kee-Fung<span class="next-line">Anthony Ho</span>
      </h2>
      <div class="about-content-container">
        <div class="profile-pic-item">
          <img
            class="profile-pic"
            src="./assets/images/anthony-side-profile.jpg"
            alt="Headshot profile photo of Kee-Fung Anthony Ho."
          />
        </div>
        <div class="bio-text-wrapper">
          <h2 class="section-heading mobile-sect-heading">
            Kee-Fung <span class="next-line">Anthony Ho</span>
          </h2>
          <div class="bio">
            <p>
              Based in the heart of Toronto, Canada, I am a full-stack developer
              with a passion for building responsive and innovative digital
              products that solve real-world problems. With a background in law,
              I have transitioned into the dynamic world of software
              development. I have designed and developed efficient, scalable,
              and high-performance projects with a variety of languages,
              frameworks, and tools including JavaScript, C#, ASP.NET, MongoDB,
              PHP, and Node.js. I am always looking to stay ahead of the curve
              and keep up-to-date with the latest trends and technologies to
              bring innovative solutions to the challenges of tomorrow.
            </p>
          </div>
          <div class="contact-info">
            <p>
              <i class="fa-solid fa-envelope"></i>
              <a
                href="mailto:anthonykfho@gmail.com"
                aria-label="Click to e-mail Anthony"
                rel="noopener"
                >&nbsp;&nbsp;&nbsp;anthonykfho@gmail.com</a
              >
            </p>
            <p>
              <i class="fa-solid fa-mobile-screen-button"></i>
              <a
                href="tel:1-647-588-4334"
                aria-label="Click to call Anthony via his mobile phone number"
                rel="noopener"
                >&nbsp;&nbsp;&nbsp;+1 (647) 588-4334</a
              >
            </p>
          </div>
        </div>
      </div>
    </section>
    <hr id="division" />
    <!--============================== RESUME ==============================-->
    <section id="resume" class="resume-container">
    <h2 class="section-heading">Résumé</h2>
    <hr id="division" />
    <!--============================== PROJECTS ==============================-->
    <section id="projects" class="projects-container">
      <h2 class="section-heading">Projects</h2>
      <div class="projects-content-container">
  <?php

  $query = 'SELECT *
    FROM projects
    ORDER BY date DESC';
  $result = mysqli_query( $connect, $query );

  ?>

  <p>There are <?php echo mysqli_num_rows($result); ?> projects in the database!</p>

  <hr>

  <?php while($record = mysqli_fetch_assoc($result)): ?>

    <div>

      <h3 class="project-name"><?php echo $record['title']; ?></h3>
      <div class="project-description"><?php echo $record['content']; ?>
      <?php if($record['photo']): ?>

        <img src="<?php echo $record['photo']; ?>" width="800px" alt="Preview of <?php echo $record['title']?>."></div>

      <?php else: ?>

        <p>[ This project does not have a preview ]</p></div>

      <?php endif; ?>

      <div class="project-media-icon"><a
        href="<?php echo $record['url']?>"
        aria-label="Click for Github repository"
        rel="noopener"><i class="fa-solid fa-code"></i></a>
      </div>
    </div>

    <hr>

  <?php endwhile; ?>

  <br>

  <h2>My Skills</h2>

  <?php

  $query = 'SELECT * 
    FROM skills
    ORDER BY percent DESC';
    $result = mysqli_query($connect, $query);

    ?>

    <?php while($record = mysqli_fetch_assoc($result)): ?>
    
      <h3><?php echo $record['name']; ?></h3>

      <p>Percent: <?php echo $record['percent']; ?></p>

      <div style="background-color: grey;">
        <div style="background-color: red; height: 20px; width:<?php echo $record['percent']; ?>%;"></div>
      </div>

    <?php endwhile; ?>

  <footer id="footer">© Copyright, Kee-Fung Anthony Ho, 2022.</footer>
</body>
</html>
