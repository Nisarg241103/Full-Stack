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
            background-color:  #F33232;
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
            font-family: 'Times New Roman', Times, serif
            
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
            display: flex;
            align-items: center; /* Align content vertically to center */
            flex-direction: column;
            min-height: 100vh;
            padding: 50px;
        }

        .container h2 {
            padding-bottom: 10px;
        }

        form {
            background-color: #fff;
            border: 2px solid #c73335;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 800px; /* Increased form width */
            max-width: 100%;
            display: flex;
            flex-wrap: wrap; /* Allow items to wrap */
            justify-content: space-between; /* Distribute items evenly */
        }

        .form-control {
            margin-bottom: 20px;
            width: calc(50% - 10px); /* Set width for each form control */
        }

        .form-control label {
            display: block;
            font-weight: bold;
            color: #464444;
            margin-bottom: 5px;
        }

        .form-control input[type="text"],
        .form-control input[type="date"],
        .form-control textarea,
        .form-control select[name='department'] {
            width: 200%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-control textarea {
            resize: none;
            height: 70px; /* Fix the height to 70px */
            width: 94%;
        }

        #reason {
            justify-content: center;
            text-align: center;
        }
        .form-control input[type="radio"] {
            margin-right: 5px;
        }

        .form-control button {
            background-color: #c73335;
            color: #fff;
            margin-left: 90px;
            margin-top: 20px;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            justify-content: center;
            align-items: center;
            width: 50%;

        }

        .form-control button:hover {
            background-color: #fff;
            color: #c73335;
            border: 2px solid #c73335;
        }

        .left-side {
            width: 48%; /* Adjust width to leave space for the right side */
            display:block;
            height: 30%;
        }

        .right-side {
            width: 48%; /* Adjust width to leave space for the left side */
            display: inline-block;
        }

        .check-status {
            text-align: center;
            margin-top: 20px;
        }

        .check-status p {
            margin-top: 5px;
            margin-bottom: 10px;
            float: left;
            font-size: larger;
            font-weight: 500;
        }

        .check-status button {
            background-color: #c73335;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-left: 10px;
            font-size: 16px;
            border-radius: 4px;
            float: right
        }

        .check-status button:hover {
            background-color: #fff;
            border: 2px solid #c73335;
            color: #c73335;
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
                echo '<a><span class="span";">Hello ' . $_SESSION['username'] . '</span> !</a>';
            } else {
                // User is not logged in, display login link
                echo '<a class="nav-link" href="Login.html" ;">Log In</a>';
            }
            ?>   
            
        </nav>
    </div>

    <div class="container">
        <h2>On Duty Attendance</h2>
        <form action="store_data.php" method="post">
            <div class="left-side">
                <div class="form-control">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" required placeholder="Name ">
                </div>
                <div class="form-control">
                    <label for="enrollment">Enrollment No.:</label>
                    <input type="text" name="enrollment" id="enrollment" required placeholder="Enrollment No.">
                </div>
                <div class="form-control">
                    <label for="selecttype">Institute Name:</label>
                    <select name="department" id="selecttype" class="institute">
                        <option value="institute name">Institute Name</option>
                        <option value="UIT">UIT</option>
                        <option value="UID">UID</option>
                        <option value="UWSL">UWSL</option>
                        <option value="UWSB">UWSB</option>
                        <option value="KSD">KSD</option>
                        <option value="USLM">USLM</option>
                    </select>
                </div>
            </div>
            <div class="right-side">
                <div class="form-control">
                    <label for="start_date">From:</label>
                    <input type="date" name="start_date" id="start_date" required>
                </div>
                <div class="form-control">
                    <label for="end_date">To:</label>
                    <input type="date" name="end_date" id="end_date" required>
                </div>
                <div class="form-control">
                    <label><h4>Duration:</h4></label>
                    <label for="radio1"><input type="radio" name="duration" id="radio1" value="Full Day">Full Day</label>
                    <label for="radio2"><input type="radio" name="duration" id="radio2" value="Half Day">Half Day</label>
                </div>            
            </div>
            <div class="form-control">
                <label for="reason"><h4>Reason:</h4></label>
                <textarea name="reason" id="reason" cols="20" rows="5"></textarea>
            </div>
            <div class="form-control">
                <button type="submit">Submit</button>
            </div>
        </form>

        <div class="check-status">
            <p>Check your OD Attendance status</p>
            <a href="user2.php"><button>Click here</button></a>
        </div>
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

</body>
</html>
