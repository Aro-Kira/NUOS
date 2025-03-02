<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <script src="https://kit.fontawesome.com/fc5ceca38c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style_profile.css">
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
    <div class="container">
        <div class="profile-container">
            <img src="" alt="Profile Picture" class="profile-pic">
            <h2><strong>[First Name]</strong></h2>
            <p>[ID Number]</p>
            <p>[Course]</p>
        </div>

        <div class="main-content">
            <div class="info-card">
                <p>Full Name: [surname, first name middle name]</p>
                <p>Email: [email@school.edu]</p>
                <p>Contact No.:</p>
                <p>Address:</p>
            </div>

            <h3>Your Organization/s:</h3>
            <div class="organizations">
                <div class="org-card">
                    <img src="../images/coda.png" alt="">
                    <p>Codability Tech</p>
                </div>
                </div>
            </div>
        </div>
    </div>


    <div class="sidebar" id="sidebar">
        <a href="profile.php" class="profile">Profile</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <script src="../js/wel_script.js"></script>
    <script src="../js/profile_script.js"></script>
</body>

</html>