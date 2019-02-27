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

<body>
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
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <?php
        if(isset($_SESSION['notification_message']))
        {?>
            <div class="alert alert-success" role="alert"> <?php echo $_SESSION['notification_message']; ?> </div>

            <?php  } ?>
            <p> <?php if(date('G') < 12)
              {
                echo("Good morning ".$_SESSION["nickname"].", welcome in the CRNO - Ticket system. You can send and consult your account's ticket.");
              }
               if(date('G') < 18)
              {
                echo("Good afternoon ".$_SESSION["nickname"].", welcome in the CRNO - Ticket system. You can send and consult your account's ticket.");
              }  
              else
              {
                echo("Good evening ".$_SESSION["nickname"].", welcome in the CRNO - Ticket system. You can send and consult your account's ticket.");                
              }
?>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                    <form action="creatingTicket.php" method="post">
                        <div class="form-group">
                            <select name="subject" class="form-control" required>
                                <option value="Subject" selected disabled> Subject </option>
                                <option value="OS Issue"> OS Issue </option>
                                <option value="Hardware"> Hardware </option>
                                <option value="Software"> Software </option>
                                <option value="Miscellaneous"> Miscellaneous </option>
                            </select>
                            <div class="form-group">
                                <label for="comment">Explication:</label>
                                <textarea name="content" class="form-control" rows="10" id="comment"></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Submit issue"><br>
                        </div>
                    </form>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <?php
            include('display_tickets.php')
            ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            >
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() 
        {
            $('#tickets').DataTable();
        } );
        
        </script>
</body>

</html>