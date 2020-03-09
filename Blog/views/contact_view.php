<!doctype html>
<html>

<head>
    <?php include_once 'views\includes\head.php' ?>
    <title>Contact</title>
</head>

<?php include_once 'views/includes/header.php' ?>

<body>
    <div class="container">

        <main role="main" class="container">
            <h1>Contact</h1>

            <form action="" method="post">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Prénom</label>
                    <input type="text" name="firstname" class="form-control" id="exampleFormControlSelect2" placeholder="John">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Message</label>
                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="8" placeholder="Mon message..."></textarea>
                </div>
                <button type="submit" name="btnContact" class="btn btn-primary mb-2">Envoyer mon message</button>
            </form>

        </main><!-- /.container -->

        <?php include_once 'views/includes/footer.php' ?>

</body>

</html>