<!DOCTYPE html>
<html lang="en">
<?php
    require_once('includes/connect.php');

    

    /* $query = "SELECT path_name AS image, project_id FROM images, projects WHERE projects.id = project_id";

    $results = mysqli_query($connect, $query); */

    $stmt = $connect->prepare("SELECT path_name AS image, project_id FROM images, projects WHERE projects.id = project_id AND path_name LIKE '%preview%'");

$stmt->execute();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nik Meijer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/grid.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css">
</head>

<body>
    <h1 class="hidden">Nik Meijer Portfolio</h1>

    <header class="full-width-grid-con">
        <h2 class="hidden">Header</h2>
        <div id="logo" class="col-start-2 col-end-2">
            <a href="index.php">
                <img src="images/nik-logo-hc.svg" alt="Nik's Portfolio Logo">
            </a>
        </div>
        <nav class="m-col-start-10 m-col-end-13 l-col-start-10 l-col-end-13 xl-col-start-10 xl-col-end-13">
            <h2 class="hidden">Nav</h2>
            <li><a href="index.php#aboutme">about me</a></li>
            <li><a href="index.php#projects">projects</a></li>
            <li><a href="index.php#contact">contact</a></li>
        </nav>
        <!-- Mobile Menu -->
        <div id="mobile-nav" class="col-start-3 col-end-5 mobile">
            <input type="checkbox" id="overlay-input">
            <label for="overlay-input" id="overlay-button"><span></span></label>
            <div id="overlay">
                <ul>
                    <li><a href="index.php">home</a></li>
                    <li><a href="index.php#aboutme">about me</a></li>
                    <li><a href="index.php#projects">projects</a></li>
                    <li><a href="index.php#contact">contact</a></li>
                </ul>
            </div>
        </div>
        <!-- End Mobile Menu -->
    </header>


    <!-- Hero -->
    <section id="hero">
        <h2 class="hero-item">Graphic <span>Design</span>
            <br>Motion <span>Design</span>
            <br>Layout <span>Design</span>
        </h2>
        <div id="hero-text" class="hero-item">
            <p>Need something to look fresh, clean, and eye-catching?<br>You’re in the right place!</p>
        </div>
        <button class="hero-button hero-item">
            <a href="index.php#projects">See my work</a>
        </button>
        <button class="hero-button hero-item">
            <a href="index.php#contact">Contact me</a>
        </button>
    </section>
    <!-- Hero End -->

    <!-- Video -->
    <section id="video">
        <section id="player-container" class="col-span-full">
            <video class="player" controls data-poster="images/placeholder.jpg">
                <source src="videos/meijer_nikolai_demo-reel.mp4" type="video/mp4">
                <p>Your browser does not support the video tag.</p>
            </video>
            <div class="video-controls hidden" id="video-controls">
                <button id="play-button"><i class="fa fa-play-circle-o"></i></button>
                <button id="pause-button"><i class="fa fa-pause-circle-o"></i></button>
                <button id="stop-button"><i class="fa fa-stop-circle-o"></i></button>
                <i class="fa fa-volume-up"></i>
                <input type="range" id="change-vol" step="0.01" min="0" max="1" value="1">
                <button id="full-screen"><i class="fa fa-arrows-alt"></i></button>
            </div>
        </section>
    </section>
    <!-- Video End -->

    <section id="aboutme" class="grid-con">
        <h2 class="col-span-4 m-col-span-12 l-col-span-12 xl-col-span-12">
            <span><img src="images/doubleslash-icon.svg"></span>
            About Me
        </h2>
        <div id="portrait"
            class="col-end-3 col-start-1 m-col-end-6 m-col-start-1 l-col-end-6 l-col-start-1 xl-col-end-6 xl-col-start-1">
        </div>
        <p class="col-span-2 m-col-span-6 l-col-span-6 xl-col-span-6">Hi, I’m Nik Meijer, a designer specializing
            in
            graphic design, motion design, and layout design. Inspired by
            Swiss
            design and minimalism, I focus on collaborating with clients to create clean, effective visuals that bring
            their ideas
            to life.</p>
        <p class="col-span-4 m-col-span-12 l-col-span-12 xl-col-span-12">With a love for art, a Sneaker Design
            certificate from Complex and FIT, and inspiration from brands like
            Apple and
            Off-White, I combine aesthetics and functionality in every project. Whether it’s branding, layouts, or
            motion design, my
            goal is to craft designs that simply and powerfully convey your message.</p>
    </section>

    <section id="projects" class="grid-con">
        <div id="projects-flex" class="col-span-4 m-col-span-12 l-col-span-12 xl-col-span-12">
            <div id="case-study" class="project">
                <?php
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<h2 class="hero-item">
                                    <span><img src="images/doubleslash-icon.svg"></span>
                                    See My <span>Designs!</span>
                                </h2>
                                <p>Project Spotlights</p>
                                <img class="project-showcase" src="images/'.$row['image'].'">
                                <button><a class="casestudy-link" href="casestudy.php?id='.$row['project_id'].'">See Now.</a></button>';
                    }

                ?>
                
            </div>
        </div>
    </section>

    <section id="contact" class="full-width-grid-con">
        <h2 class="col-span-4 m-col-span-12 l-col-span-12 xl-col-span-12"><span><img
            src="images/doubleslash-icon.svg"></span>Contact Me <span>Today</span>
        </h2>
        <p>
            Like what you see? Want to see more? Let's work together! Use the contact form to reach out, and I will get
            back to you
            ASAP!
        </p>
        <div id="contact-form" class="col-span-full m-col-span-full l-col-span-full xl-col-span-full">
            <form method="post" action="sendmail.php">
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required>

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>

                <label for="subject">Message:</label>
                <textarea id="message" name="message" required>Type your message here:</textarea>

                <button type="send">Submit</button>
            </form>
        </div>
    </section>

    <footer class="full-width-grid-con">
        <h2 class="hidden">Footer</h2>
        <div id="logo" class="col-start-2 col-end-2">
            <a href="index.php">
                <img src="images/nik-logo-hc.svg" alt="Nik's Portfolio Logo">
            </a>
        </div>
        <nav class="m-col-start-10 m-col-end-13 l-col-start-10 l-col-end-13 xl-col-start-10 xl-col-end-13">
            <h2 class="hidden">Nav</h2>
            <li><a href="index.php#aboutme">about me</a></li>
            <li><a href="index.php#projects">projects</a></li>
            <li><a href="index.php#contact">contact</a></li>
        </nav>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/video.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@latest/bundled/lenis.min.js"></script>
    <script>
        const lenis = new Lenis()
        lenis.on('scroll', (e) => {
            console.log(e)
        })

        function raf(time) {
            lenis.raf(time)
            requestAnimationFrame(raf)
        }
        requestAnimationFrame(raf)
    </script>
</body>

</html>