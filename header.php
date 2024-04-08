<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voyage Express - Réservation de Billets</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="header.css">
</head>
<body>

<header>
    <div class="container-header">
        <div class="logo">Voyage Express</div>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="view_client.php">Clients</a></li>
                <li><a href="billets.php">Billets</a></li>
                <li><a href="readDestination.php">Destinations</a></li>
                <!-- Ajoutez d'autres liens de navigation selon votre structure de site -->
            </ul>
        </nav>
        <i class="fas fa-bars"></i>
    </div>
</header>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script>
    document.querySelector('.fa-bars').addEventListener('click', function() {
        document.querySelector('nav').classList.toggle('show');
    });
</script>

</body>
</html>
