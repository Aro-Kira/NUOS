<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <img src="coda.png" alt="Organization Logo" class="profile-picture">
                <span class="org-name">[Org Name]</span>
            </div>

            <nav class="sidebar-nav">
                <ul>
                    <li><a href="admin_profile.php"><i class="fa fa-user"></i>Profile</a></li>
                    <li><a href="#"><i class="fa fa-sign-out"></i>Log Out</a></li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <header class="main-header">
                <h1>Admin Dashboard</h1>
                <div class="header-actions">
                    <button class="create-button" id="find-org-button">Find Org</button>
                </div>
            </header>
            <section class="overview-cards">
                <div class="card">
                    <h3>Total Orgs</h3>
                    <p id="total-orgs">20 <span class="update-indicator">[update]</span></p>
                </div>
                <div class="card">
                    <h3>Active Members</h3>
                    <p id="active-members"><span class="update-indicator">[update]</span></p>
                </div>
                <div class="card">
                    <h3>Pending Approvals</h3>
                    <p id="pending-approvals"><span class="update-indicator">[update]</span></p>
                </div>
                <div class="card">
                    <h3>New Requests</h3>
                    <p id="new-requests"><span class="update-indicator">[update]</span></p>
                </div>
            </section>

            <section class="product-grid">
                <!-- Organization Cards -->

                
                <div class="product-card" data-org-id="add-org"
                style="background: linear-gradient(135deg, #ffffff, #f8f8f8);
                color: black;">
                <div class="card-header"></div>
                <h2>Add Organization</h2>
                <p>Click to add a new organization.</p>
                <i class="fa fa-add" style="font-size: 24px; color: rgb(0, 0, 0);"></i>
                <!-- <h2>Campus Journalists Association</h2>
                <p>Reporting campus news and fostering investigative journalism.</p>
                <img src="../images/journalism.png" alt="Journalism" class="journ-image"> -->
                </div>



                <div class="product-card" data-org-id="codability-tech"
                    style="background: linear-gradient(135deg, #1946fa, #e3e331);">
                    <div class="card-header">Technology</div>
                    <h2>Codability Tech</h2>
                    <p>For students passionate about technology and coding.</p>
                    <img src="../images/coda2.png" alt="Coda" class="coda-image">
                </div>
                <div class="product-card" data-org-id="green-earth-alliance"
                    style="background: linear-gradient(135deg, #4CAF50, #3a58b3);">
                    <div class="card-header">Community</div>
                    <h2>Green Earth Alliance</h2>
                    <p>Focused on environmental sustainability and eco-friendly initiatives.</p>
                    <img src="../images/green2.png" alt="Green Earth" class="green-image">
                </div>

                <div class="product-card" data-org-id="campus-film-club"
                    style="background: linear-gradient(135deg, #916e06, #FF9800);">
                    <div class="card-header">Arts & Culture</div>
                    <h2>Campus Film Club</h2>
                    <p>A community for film enthusiasts and aspiring filmmakers.</p>
                    <img src="../images/film2.png" alt="Film Club" class="film-image">
                </div>

                <div class="product-card" data-org-id="debate-dynamics"
                    style="background: linear-gradient(135deg, #0e7930, #03A9F4);">
                    <div class="card-header">Academics</div>
                    <h2>Debate Dynamics</h2>
                    <p>Sharpening critical thinking and public speaking skills.</p>
                    <img src="../images/debate.png" alt="Debate" class="debate-image">
                </div>

                <div class="product-card" data-org-id="literary-quill-society"
                    style="background: linear-gradient(135deg, #1f6078, #c29418);">
                    <div class="card-header">Arts & Literature</div>
                    <h2>Literary Quill Society</h2>
                    <p>Celebrating creative writing, poetry, and literature.</p>
                    <img src="../images/quill.png" alt="Quill" class="quill-image">
                </div>
                <div class="product-card" data-org-id="entrepreneurship-hub"
                    style="background: linear-gradient(135deg, #3760db,#FF5722 );">
                    <div class="card-header">Business & Innovation</div>
                    <h2>Entrepreneurship Hub</h2>
                    <p>For aspiring student entrepreneurs and business leaders.</p>
                    <img src="../images/brain.png" alt="Entrepreneurship" class="brain-image">
                </div>
                <div class="product-card" data-org-id="artistic-vibes-collective"
                    style="background: linear-gradient(135deg, #3a3536, #b9a62e);">
                    <div class="card-header">Arts & Design</div>
                    <h2>Artistic Vibes Collective</h2>
                    <p>A haven for visual artists, designers, and creatives.</p>
                    <img src="../images/paint.png" alt="Artistic Vibes" class="art-image">
                </div>

                <div class="product-card" data-org-id="global-cultures-club"
                    style="background: linear-gradient(135deg, #d6c846, #7f368e);">
                    <div class="card-header">Culture</div>
                    <h2>Global Cultures Club</h2>
                    <p>Promoting cultural exchange and diversity awareness.</p>
                    <img src="../images/culture.png" alt="Global Cultures" class="culture-image">
                </div>

                <div class="product-card" data-org-id="health-wellness-advocates"
                    style="background: linear-gradient(135deg, #043f8b, #056919);">
                    <div class="card-header">Wellness</div>
                    <h2>Health & Wellness Advocates</h2>
                    <p>Encouraging mental health, fitness, and well-being.</p>
                    <img src="../images/helti.png" alt="Health & Wellness" class="health-image">
                </div>

                <div class="product-card" data-org-id="campus-music-guild"
                    style="background: linear-gradient(135deg, #993216, #b6774d);">
                    <div class="card-header">Arts & Music</div>
                    <h2>Campus Music Guild</h2>
                    <p>Uniting students with a passion for music, bands, and performances.</p>
                    <img src="../images/mujic.png" alt="Music Guild" class="music-image">
                </div>

                <div class="product-card" data-org-id="women-in-leadership-network"
                    style="background: linear-gradient(135deg, #3fb5a5, #195546);">
                    <div class="card-header">Leadership</div>
                    <h2>Women in Leadership Network</h2>
                    <p>Empowering future female leaders on campus.</p>
                    <img src="../images/leadership.png" alt="Leadership" class="women-image">
                </div>

                <div class="product-card" data-org-id="astronomy-enthusiasts-club"
                    style="background: linear-gradient(135deg, #4f9c81, #255814);">
                    <div class="card-header">Science & Exploration</div>
                    <h2>Astronomy Enthusiasts Club</h2>
                    <p>Exploring the wonders of the universe through stargazing and discussions.</p>
                    <img src="../images/astro.png" alt="Astronomy" class="astro-image">
                </div>

                <div class="product-card" data-org-id="robotics-ai-society"
                    style="background: linear-gradient(135deg, #3a6cd0, #75a3cd);">
                    <div class="card-header">Technology & Innovation</div>
                    <h2>Robotics & AI Society</h2>
                    <p>Building the future with robotics, AI, and innovation projects.</p>
                    <img src="../images/robot.png" alt="Robotics" class="robot-image">
                </div>

                <div class="product-card" data-org-id="sports-recreation-council"
                    style="background: linear-gradient(135deg, #1b2697, #AED581);">
                    <div class="card-header">Sports & Recreation</div>
                    <h2>Sports & Recreation Council</h2>
                    <p>Organizing intramurals, tournaments, and fitness programs.</p>
                    <img src="../images/sports.png" alt="Sports" class="sports-image">
                </div>
                <div class="product-card" data-org-id="photography-explorers-group"
                    style="background: linear-gradient(135deg, #FF9800, #FFB74D);">
                    <div class="card-header">Arts & Media</div>
                    <h2>Photography Explorers Group</h2>
                    <p>Capturing stories through lenses and photo walks.</p>
                    <img src="../images/photo.png" alt="Photography" class="photo-image">
                </div>
                <div class="product-card" data-org-id="volunteer-corps"
                    style="background: linear-gradient(135deg, #62656d, #0f5b95);">
                    <div class="card-header">Community Service</div>
                    <h2>Volunteer Corps</h2>
                    <p>Dedicated to community service and outreach programs.</p>
                    <img src="../images/volunteer2.png" alt="Volunteer" class="volunteer-image">
                </div>

                <div class="product-card" data-org-id="finance-investment-club"
                    style="background: linear-gradient(135deg, #9c6a0c, #3b54a1);">
                    <div class="card-header">Business & Finance</div>
                    <h2>Finance & Investment Club</h2>
                    <p>For students interested in personal finance, stocks, and investing.</p>
                    <img src="../images/finance.png" alt="Finance" class="finance-image">
                </div>

                <div class="product-card" data-org-id="theatre-arts-guild"
                    style="background: linear-gradient(135deg, #9a2222, #403f40);">
                    <div class="card-header">Arts & Performance</div>
                    <h2>Theatre Arts Guild</h2>
                    <p>Bringing stories to life through acting, directing, and stage production.</p>
                    <img src="../images/theatre.png" alt="Theatre" class="theatre-image">
                </div>

                <div class="product-card" data-org-id="gamers-den"
                    style="background: linear-gradient(135deg, #067076, #14b7d0);">
                    <div class="card-header">Gaming</div>
                    <h2>Gamer’s Den</h2>
                    <p>A community for video game enthusiasts and e-sports tournaments.</p>
                    <img src="../images/gaming.png" alt="Gaming" class="game-image">
                </div>

                <div class="product-card" data-org-id="campus-journalists-association"
                    style="background: linear-gradient(135deg, #0b054f, #00796B);">
                    <div class="card-header">Media & Journalism</div>
                    <h2>Campus Journalists Association</h2>
                    <p>Reporting campus news and fostering investigative journalism.</p>
                    <img src="../images/journalism.png" alt="Journalism" class="journ-image">
                </div>



            </section>


            <!-- Find Org Modal -->
            <div class="modal" id="find-org-modal">
                <div class="modal-content">
                    <span class="close-button">&times;</span>
                    <h2>Find Organization</h2>
                    <input type="text" id="org-search" placeholder="Search organizations...">
                    <ul id="org-list">
                        <!-- Organization List will be populated by JavaScript -->
                    </ul>
                </div>
            </div>

            <!-- Organization Details Modal -->
            <div class="modal" id="org-details-modal" aria-modal="true" role="dialog">
                <div class="modal-content">
                    <span class="close-button" id="close-org-details">&times;</span>
                    <h2 id="org-details-title">Organization Details</h2>
                    <div id="org-details-content">
                        <img id="org-picture" src="" alt="Organization Picture">
                        <h3 id="org-name"></h3>
                        <p id="org-description"></p>
                        <nav class="org-details-nav">
                            <button id="open-view-members">View Members</button>
                            <button class="manage-events-button" id="open-manage-events">Manage Events</button>
                            <button class="see-requests-button" id="open-join-requests">See Requests</button>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- View Members Modal -->
            <div id="view-members-modal" class="modal">
                <div class="modal-content">
                    <span class="close-button" id="close-view-members">&times;</span>
                    <h2>Approved Members</h2>
                    <ul id="members-list"></ul>
                </div>
            </div>

            <!-- Position Select in Application Modal -->
            <label for="position-select">Assign Position:</label>
            <select id="position-select">
                <option value="Member">Member</option>
                <option value="Vice President">Vice President</option>
                <option value="Secretary">Secretary</option>
            </select>

            <!-- Manage Events Modal -->
            <div class="modal2" id="manage-events-modal">  <!-- Fixed class name -->
                <div class="modal-content2">
                    <span class="close-button" id="close-manage-events">&times;</span>
                    <h2>Events</h2>
                    <p>A list of events and management options.</p>

                    <!-- Event Form -->
                    <div class="event-form">
                        <label for="event-title">Event Title:</label>
                        <input type="text" id="event-title" placeholder="Enter event title" required>

                        <label for="event-location">Event Location:</label>
                        <input type="text" id="event-location" placeholder="Enter location" required>

                        <label for="event-description">Event Description:</label>
                        <textarea id="event-description" placeholder="Enter description" rows="3" required></textarea>

                        <button id="save-event">Save Event</button>
                    </div>

                    <!-- Upcoming Events Section -->
                    <h3>Upcoming Events</h3>
                    <ul id="event-list">
                        <li>No events added yet.</li>
                    </ul>
                </div>
            </div>

            <!-- Join Requests Modal -->
            <div class="modal" id="join-requests-modal">
                <div class="modal-content">
                    <span class="close-button" id="close-join-requests">&times;</span>
                    <h2>Join Requests</h2>
                    <ul id="request-list">
                        <li>
                            <span class="applicant-name">John Doe</span>
                            <button class="view-application-button" data-user="John Doe">View Application</button>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Application Details Modal -->
            <div class="modal" id="application-details-modal">
                <div class="modal-content">
                    <span class="close-button" id="close-application-details">&times;</span>
                    <h2>Application Details</h2>
                    <div id="application-content">
                        <p><strong>Name:</strong> <span id="applicant-name"></span></p>
                        <p><strong>Email:</strong> <span id="applicant-email"></span></p>
                        <p><strong>Reason for Joining:</strong></p>
                        <p id="applicant-reason"></p>
                    </div>
                    <button class="approve-request">Approve</button>
                    <button class="reject-request">Reject</button>
                </div>
            </div>

            <!-- Additional Info Modal -->
            <div class="modal" id="additional-info-modal" aria-modal="true" role="dialog">
                <div class="modal-content">
                    <span class="close-button" id="close-additional-info">&times;</span>
                    <h2 id="additional-info-title"></h2>
                    <div id="additional-info-content">
                        <p>This is where the content for the selected action will go.</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../js/script_admin.js"></script>
</body>

</html>
