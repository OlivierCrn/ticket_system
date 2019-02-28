<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Inscription CT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="style.css">
</head>

    // Load the script to chose between Good Morning, good afternoon or good evening 
<body onLoad="whichHello();">
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #c3cfe5;">
        <a class="navbar-brand mx-auto" href="#">CRNO - Ticket system - Login</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" href="#"> <?php echo($_SESSION['nickname']) ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
// Manage interne nav button
    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active active_button" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link menu_nav_link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                aria-controls="pills-profile" aria-selected="false">Send a ticket</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                aria-controls="pills-contact" aria-selected="false">Consult a ticket</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent" style="width: 100%">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            // Manage alert (e.g: when a ticket is sent)
        <div class="alert alert-success" role="alert"> <?php echo($_SESSION['notification_message']) ?> </div>
            <div id="hello"> <?php echo $_SESSION["nickname"]; ?> welcome in the CRNO - Ticket system. You can send and
                consult your account's ticket. </div>
        </div>
        
        // Include the page create_tickets 
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <?php
            include('create_tickets.php')
            ?>
        </div>
        
        // Include the page display_tickets 
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <?php
            include('display_tickets.php')
            ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        //This script build the table for user's ticket
        <script type="text/javascript">
        $(document).ready(function () 
        {
            $('#tickets').DataTable();
        } );
        </script>
        //This script defines what kind of greetings is used
        <script type="text/javascript">
        function whichHello() {
            var d = new Date();
            var hour = d.getHours();
            if (hour < 12 && hour > 0) {
                document.getElementById('hello').innerHTML = 'Good morning ' + document.getElementById('hello')
                    .innerHTML;
            } else if (hour > 12 && hour < 18) {
                document.getElementById('hello').innerHTML = 'Good afternoon ' + document.getElementById('hello')
                    .innerHTML;
            } else {
                document.getElementById('hello').innerHTML = 'Good evening ' + document.getElementById('hello')
                    .innerHTML;
            }
        }
        </script>
</body>

</html>
