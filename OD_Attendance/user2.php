<!DOCTYPE html>
<html>
<head>
    <title>Status Check</title>
    <!-- Include CSS styles from the first code -->
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

        .container {
            border: 2px solid #c73335;
            max-width: 400px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #c73335;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #fff;
            color: #c73335;
            border: 2px solid #c73335;
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

        .symbols {
            padding-left: 30px;
        }

        .footer a {
            float: left;
            padding-top: 7px;
            padding-left: 20px;
            color: #fff;
        }

        /* Additional style for status details card */
        .status-details {
            max-width: 400px;
            margin: 20px auto;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include JavaScript for AJAX functionality -->
    <script>
        $(document).ready(function(){
            $('#check_status_form').submit(function(e){
                e.preventDefault(); // Prevent form submission
                var enrollment = $('#enrollment').val(); // Get enrollment number from form
                $.ajax({
                    type: 'POST',
                    url: 'check_status.php',
                    data: {enrollment: enrollment},
                    success: function(response){
                        // Update status card with response
                        $('#status_card').html(response);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <img src="KU.webp" alt="">
        <a href="">Home</a>
        <p class="academia-text">Academia</p>
    </div>

    <!-- Main Content -->
    <div class="container">
        <h2>Check Your Status</h2>
        <form id="check_status_form">
            <label for="enrollment">Enrollment Number:</label>
            <input type="text" id="enrollment" name="enrollment" required>
            <input type="submit" value="Check Status">
        </form>
        <!-- Status details card -->
        <div id="status_card" class="status-details"></div>
    </div>

    <!-- Footer -->
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
