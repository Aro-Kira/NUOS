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
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background-color: #f8f9fa;
            color: #333;
            overflow: auto;
        }


        .dashboard-container {
            display: flex;
            height: 95vh;
            border-radius: 15px;
            overflow: hidden;
            margin: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }


        /* Sidebar Styles */
        .sidebar {
            width: 220px;
            background-color: #ffffff;
            border-right: 3px solid blue;
            padding: 20px;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            height: 100%;
        }
        .sidebar-header {
            text-align: left;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
        }

        .profile-picture {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }

        .sidebar-nav {
            flex-grow: 1;
        }

        .sidebar-nav ul {
            list-style: none;
            padding: 0;
        }


        .sidebar-nav li {
            margin-bottom: 15px;
        }


        .sidebar-nav ul li a {
            color: #2c3e50;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s;
            font-size: 16px;
        }

        .sidebar-nav ul li a:hover {
            background-color: #f0f0f0;
        }

        /* Content Area */
        .content {
            flex-grow: 1;
            padding: 30px;
            overflow-y: auto;
        }

        .panel {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .panel h3 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        input, textarea {
            width: 60%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 15px;
            width: 61%;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-container {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                height: auto;
                box-shadow: none;
                border-bottom: 3px solid blue;
            }
            .content {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <img src="coda.png" alt="Profile Picture" class="profile-picture">
                [Org Name]
            </div>

            <nav class="sidebar-nav">
                <ul>
                    <li><a href="admin.php"><i class="fa fa-user"></i>Back</a></li>
                    <li><a href="#"><i class="fa fa-sign-out"></i>Log Out</a></li>
                </ul>
            </nav>
        </aside>
        <div class="content">
            <div id="profile" class="panel">
                <h3>Profile</h3>
                <form>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                    <label for="bio">Bio:</label>
                    <textarea id="bio" name="bio"></textarea>
                    <button type="submit">Save</button>
                </form>
            </div>
            <div id="organization" class="panel">
                <h3>Organization</h3>
                <form>
                    <label for="org-name">Organization Name:</label>
                    <input type="text" id="org-name" name="org-name">
                    <label for="org-description">Description:</label>
                    <textarea id="org-description" name="org-description"></textarea>
                    <button type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>