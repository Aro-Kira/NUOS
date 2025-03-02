<!DOCTYPE html>
<html>

<head>
    <title>OrgShpere</title>
    <script src="https://kit.fontawesome.com/fc5ceca38c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style_welcome.css">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
</head>
<header>
    <div class="left-section">
        <div class="burger" id="burger" style="display: block;">
            <i class="fa-solid fa-bars" style="font-size: 24px; color: white;"></i>
        </div>
        <a href="welcome.php">
            <img src="../images/icon-1x1.png" alt="Logo" class="logo">
        </a>
        <h3 class="os"><a href="welcome.php">OrgSphere</a></h3>
    </div>

    <nav>
        <ul>
            <li><a href="welcome.php">Home</a></li>
            <li><a href="org.php">Org</a></li>
            <li><a href="about.php">About</a></li>

        </ul>
    </nav>
</header>

<body>
    <div class="slideshow-container">
        <div class="mySlides">
            <img src="../images/image-1.png">
            <div class="text-container">
                <h1>Welcome to Codability Tech Student Organization</h1>
                <p>
                    "Join Codability Tech Student Organization and become part of a passionate community dedicated to
                    coding and technologies. <br>
                    Together, we can create meaningful change, share ideas, and grow as individuals. <br>
                    Don't miss this opportunity—be part of something bigger!"<br>
                    <br>
                </p>
            </div>
        </div>

        <div class="mySlides">
            <img src="../images/image-1.png">
            <div class="text-container">
                <h1>Welcome to [Org Name]</h1>
                <p>
                    Join us at [Name of Organization] and be part of something amazing! Together, we can make a
                    difference.
                </p>
            </div>
        </div>

        <div class="mySlides">
            <img src="../images/image-1.png">
            <div class="text-container">
                <h1>Welcome to [Org Name]</h1>
                <p>
                    Join us at [Name of Organization] and be part of something amazing! Together, we can make a
                    difference. Sign up today!
                </p>
            </div>
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <div class="sidebar" id="sidebar">
        <a href="profile.php" class="profile">Profile</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>

    <div class="event-container">
        <h1>Upcoming Events</h1>
        <div class="grid" id="event-grid-container">
            <div class="event">
                <div class="event-image">
                    <img src="../images/event-1.png">
                </div>
                <div class="event-text">
                    <h2>Event Title 1</h2>
                    <p>
                        Date: January 1, 2025<br>
                        Time: 6:00 PM<br>
                        Location: City Hall<br>
                        Description: New Year Celebration.
                    </p>
                </div>
            </div>

            <div class="event">
                <div class="event-image">
                    <img src="../images/event-2.png">
                </div>
                <div class="event-text">
                    <h2>Event Title 2</h2>
                    <p>
                        Date: February 14, 2025<br>
                        Time: 7:00 PM<br>
                        Location: Central Park<br>
                        Description: Valentine's Day Concert.
                    </p>
                </div>
            </div>

            <div class="event">
                <div class="event-image">
                    <img src="https://i.imgur.com/hijklmn.jpg">
                </div>
                <div class="event-text">
                    <h2>Event Title 3</h2>
                    <p>
                        Date: March 17, 2025<br>
                        Time: 5:00 PM<br>
                        Location: St. Patrick's Park<br>
                        Description: St. Patrick's Day Parade.
                    </p>
                </div>
            </div>

            <div class="event">
                <div class="event-image">
                    <img src="https://i.imgur.com/hijklmn.jpg">
                </div>
                <div class="event-text">
                    <h2>Event Title 4</h2>
                    <p>
                        Date: April 1, 2025<br>
                        Time: 4:00 PM<br>
                        Location: Riverside Park<br>
                        Description: April Fool's Day Festival.
                    </p>
                </div>
            </div>

            <div class="event">
                <div class="event-image">
                    <img src="https://i.imgur.com/hijklmn.jpg">
                </div>
                <div class="event-text">
                    <h2>Event Title 5</h2>
                    <p>
                        Date: May 5, 2025<br>
                        Time: 8:00 PM<br>
                        Location: Downtown Plaza<br>
                        Description: Cinco de Mayo Celebration.
                    </p>
                </div>
            </div>

            <div class="event">
                <div class="event-image">
                    <img src="https://i.imgur.com/hijklmn.jpg">
                </div>
                <div class="event-text">
                    <h2>Event Title 6</h2>
                    <p>
                        Date: June 21, 2025<br>
                        Time: 6:00 PM<br>
                        Location: Beachfront<br>
                        Description: Summer Solstice Party.
                    </p>
                </div>
            </div>

        </div>


        <script src="../js/slideshow.js"></script>
        <script src="../js/wel_script.js"></script>

</body>

</html>