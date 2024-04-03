<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .header {
            background-color: #F33232;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            height: 65px;
            position: relative;
        }

        .academia-text {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 70px; 
            color: #fff; 
            font-size: 30px; 
            font-weight: bold;
            font-family: 'Times New Roman', Times, serif; 
            
        }

        .header img {
            float: left;
            height: 50px;
            margin-left: 6px;
            padding-left: 4px;
            padding-bottom: 3px;
        }
        .header a {
            float: right;
            padding-top: 12px;
            padding-right: 20px;
            font-size: larger;
            color: #fff;
        }
        .header a.active,
        .header a:hover {
            text-decoration: none;
            color: #000000;
        }

        .footer {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 50px;
        }
        .footer p {
            float: right;
            padding-top: 6px;
            padding-right: 100px;
        }
        .footer a {
            float: left;
            padding-top: 7px;
            padding-left: 20px;
            color: #fff;
        }
        .symbols {
            padding-left: 30px;
        }

        .container {
            margin-left: 50px; 
            margin-right: 50px;
            padding: 20px;
        }
        .container h2 {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        /* Table styles */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th,
        td {
            font-size: medium;
            border: 2px solid #c73335e7;
            padding: 8px;
            text-align: left;
        }

        th {
            font-size: medium;
            background-color: #183357;
            color: #ffffff;
        }

        /* Submit button hover effect */
        .submit-button {
            background-color: #c73335;
            color: #fff;
            border: none;
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #fff;
            color: #c73335;
            border: 2px solid #c73335;
        }
    </style>
</head>
<body>

<div class="header">
    <img src="KU.webp" alt="">
    <p class="academia-text">Academia</p>
            <nav class="navbar">
                <?php
                // Check if the user is logged in
                if (isset($_SESSION['username'])) {
                    // User is logged in, display their name and logout link
                    echo '&nbsp;';
                    echo '&nbsp;';
                    echo '<a class="nav-links" href="Dashboard.html" id="logout">Log Out</a>';
                    echo '<a href="Dashboard.html">Home</a>';
                    echo '<a><span style="color:white";">Hello ' . $_SESSION['username'] . '</span> !</a>';
                } else {
                    // User is not logged in, display login link
                    echo '<a class="nav-link" href="LoginD.html" ;">Log In</a>';
                }
                ?>   
                
            </nav>
</div>

    <div class="container">

        <section>

            <h2 style="color: #c73335e7;">OD Attendance List</h2>

            <table id="violationsTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Enrollment</th>
                        <th>Department</th>
                        <th>start_date</th>
                        <th>end_date</th>
                        <th>Duration</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                // Connect to MySQL (replace 'username', 'password', and 'database' with actual credentials)
                $mysqli = new mysqli("localhost", "root", "", "full_stack");

                // Check connection
                if ($mysqli->connect_error) {
                    die("Connection failed: " . $mysqli->connect_error);
                }

                // Retrieve OD forms from database
                $sql = "SELECT * FROM od_attendance";
                $result = $mysqli->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['enrollment']."</td>";
                        echo "<td>".$row['department']."</td>";
                        echo "<td>".$row['start_date']."</td>";
                        echo "<td>".$row['end_date']."</td>";
                        echo "<td>".$row['duration']."</td>";
                        echo "<td>".$row['reason']."</td>";
                        echo "<td>".$row['status']."</td>";
                        echo "<td>";
                        echo "<form action='update_status.php' method='post'>";
                        echo "<input type='hidden' name='id' value='".$row['id']."'>";
                        echo "<input type='radio' name='status' value='approved'> Approve ";
                        echo "<input type='radio' name='status' value='declined'> Decline ";
                        echo "<input type='submit' value='Submit' class='submit-button'>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No OD forms found.</td></tr>";
                }

                // Close connection
                $mysqli->close();
                ?>
            </table>

        </section>

    </div>

    <div class="footer">
        <p>© 2024 Karnavati University, Academia</p>
        <div class="symbols">
            <a href=""><i class="fa-brands fa-x-twitter"></i></a>
            <a href=""><i class="fa-brands fa-facebook-f"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-youtube"></i></a>
            <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
    </div>

    <script src="main-page.js"></script>
</body>
</html>
