<?php
// Fetching data from URL parameters
$orgId = isset($_GET['id']) ? $_GET['id'] : 'N/A';
$orgName = isset($_GET['name']) ? $_GET['name'] : 'Unknown Organization';
$orgImage = isset($_GET['image']) ? $_GET['image'] : 'profile-placeholder.png';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/fc5ceca38c.js" crossorigin="anonymous"></script>
    <title>
        <?php echo $orgName; ?>
    </title>
    <link rel="stylesheet" type="text/css" href="../css/style_org_page.css">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="background"></div>
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
    <div class="profile-container">
        <div class="banner">
            <img src="<?php echo $orgImage; ?>" alt="Banner Image" class="banner-img">
        </div>
        <div class="profile-section">
            <img src="<?php echo $orgImage; ?>" alt="Profile Image" class="profile-img">
            <div class="org-info">
                <h2>
                    <?php echo $orgName; ?>
                </h2>
                <button id="join-btn" class="join-btn">Join</button>
            </div>
        </div>
        <div class="about-section">
            <h3>About</h3>
            <p>Lorem ipsum dolor sit amet. Eos voluptatem totam ea voluptas deleniti ut consectetur illo. Et cupiditate
                omnis aut iure aliquam non enim dolores.</p>
        </div>
    </div>
    <!-- Modal Structure -->
    <div id="joinModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>
                <?php echo $orgName; ?>
            </h2>
            <form action="submit_application.php" method="POST">
                <input type="hidden" name="orgId" value="<?php echo htmlspecialchars($orgId); ?>">
                <input type="text" placeholder="Enter your name" id="name" name="name" required>
                <input type="hidden" placeholder="Enter your student ID number" id="studentNumber" name="studentNumber">
                <br>
                <select name="program" id="program" aria-placeholder="Select Program" required>
                    <option value="" disabled selected>Select Program</option>
                    <option value="bsit">BSIT</option>
                    <option value="bscs">BSCS</option>
                    <option value="bsis">BSIS</option>
                    <option value="bsed">BSED</option>
                    <option value="bshrm">BSHRM</option>
                </select>
                <br>
                <input type="text" placeholder="Enter your section" id="section" name="section" required>
                <input type="email" placeholder="Enter your school email" id="email" name="email" required>
                <input type="tel" placeholder="Enter your contact number" id="contact" name="contact" required>
                <input type="text" placeholder="Enter your address" id="address" name="address" required>
                <input type="text" placeholder="Enter your skills" id="skills" name="skills" required>
                <textarea name="reason" id="reason" cols="30" rows="10"
                    placeholder="Why do you want to join this organization?" require></textarea>
                <p>Are you sure you want to join <strong>
                        <?php echo $orgName; ?>
                    </strong>?</p>
                <button id="confirmJoin">Yes, Join</button>
                <button id="cancelJoin">Cancel</button>
            </form>
        </div>
    </div>
    <script>
    function joinOrg(orgName) {
        alert("You have joined " + orgName + "!");
    }
    </script>
    <div class="sidebar" id="sidebar">
        <a href="profile.php" class="profile">Profile</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <script src="../js/wel_script.js"></script>
    <script src="../js/org_page_script.js"></script>
</body>
</html>



<style>
.background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('<?php echo $orgImage; ?>') no-repeat center center fixed;
    background-size: cover;
    z-index: -1;
}

.background::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: -1;
    backdrop-filter: blur(5px);
}
</style>