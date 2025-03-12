<!DOCTYPE html>
<html lang="en">

<?php
require_once('includes/connect.php');

/* $query = 'SELECT * FROM projects, images WHERE images.project_id = projects.id AND projects.id ='.$_GET['id'];

$results = mysqli_query($connect,$query);

$row = mysqli_fetch_assoc($results); */

/* $query = 'SELECT * FROM projects, images GROUP_CONCAT(path_name) AS paths WHERE images.project_id = projects.id AND projects.id = :projectsid'; */

$query = 'SELECT projects.*, 
            GROUP_CONCAT(images.path_name) AS paths, 
            (SELECT path_name FROM images 
             WHERE images.project_id = projects.id 
             AND images.path_name LIKE "%preview%" 
             LIMIT 1) AS preview_image 
          FROM projects 
          JOIN images ON images.project_id = projects.id 
          WHERE projects.id = :projectsid';


$stmt = $connect->prepare($query);

$projectsid = $_GET['id'];

$stmt->bindParam(':projectsid', $projectsid, PDO::PARAM_INT);

$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = null;

$image_array = explode(',',$row['paths'])
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nik Meijer</title>
    <link href="css/grid.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css">
</head>

<body>
    <h1 class="hidden">Nik Meijer Case Study</h1>

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

    <section id="case-study" class="grid-con">
        <?php 
                echo '<h2 class="col-span-4 m-col-span-12 l-col-span-12 xl-col-span-12">
                    <span><img src="images/doubleslash-icon.svg"></span>
                    '.$row['title'].'
                </h2>
                <p class="cs-text col-span-12 m-col-span-12 l-col-span-12 xl-col-span-12">
                    '.$row['copy1'].'
                </p>
                <p class="cs-text col-span-12 m-col-span-12 l-col-span-12 xl-col-span-12">
                    '.$row['copy2'].'
                </p>
                <img class="cs-img col-span-12 m-col-span-12 l-col-span-12 xl-col-span-12" src="images/'.$row['preview_image'].'"
                    alt="Earbuds 3d Model">
                <p class="cs-text col-span-12 m-col-span-12 l-col-span-12 xl-col-span-12">
                    '.$row['copy3'].'
                </p>
                
                <p class="cs-text col-span-12 m-col-span-12 l-col-span-12 xl-col-span-12">
                    '.$row['copy4'].'
                </p>
                <p class="cs-text col-span-12 m-col-span-12 l-col-span-12 xl-col-span-12">
                    '.$row['copy5'].'
                </p>';
                for ($i = 1; $i < count($image_array); $i++) {
                    echo '<img class="cs-img col-span-6 m-col-span-6 l-col-span-6 xl-col-span-6" src="images/' . $image_array[$i] . '">';
                }

                echo '<p class="cs-text col-span-12 m-col-span-12 l-col-span-12 xl-col-span-12">
                    '.$row['copy6'].'
                </p>';
        ?>
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
            <form action="sendmail.php" method="post">
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required>

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" required>Type your message here:</textarea>

                <button type="submit">Submit</button>
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
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@latest/bundled/lenis.min.js"></script>
    <script>
        const lenis = new Lenis()

        function raf(time) {
            lenis.raf(time)
            requestAnimationFrame(raf)
        }
        requestAnimationFrame(raf)
    </script>
</body>

</html>