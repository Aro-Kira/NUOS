<!DOCTYPE html>
<html>
    <head>
        <title>OrgShpere</title>
        <script src="https://kit.fontawesome.com/fc5ceca38c.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/style_org.css">
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
                    <li><a href="#">Org</a></li>
                    <li><a href="about.php">About</a></li>
                 
                </ul>
            </nav>
        </header>
    <body>
            <div class="container">
                    <h1 class="type-acad">Academic Organization</h1>
                    <div class="grid" id="acad-grid-container">
                    </div>
                    <h1 class="type-non-acad">Non-Academic Organization</h1>
                    <div class="grid" id="non-acadgrid-container">
                    </div> 
            </div>
            <script src="../js/org_script.js"></script>
            <div class="sidebar" id="sidebar">
        <a href="profile.php" class="profile">Profile</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
        <script src="../js/wel_script.js"></script>
    </body>
</html>
