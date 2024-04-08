<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voyage Express - Réservation de Billets</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* CSS pour le header et la navbar */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        nav {
            display: flex;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #ffcc00;
        }

        .fa-bars {
            display: none;
            cursor: pointer;
            font-size: 24px;
        }

        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: flex-start;
            }

            nav {
                margin-top: 20px;
                display: none;
            }

            .fa-bars {
                display: block;
            }

            .show {
                display: block;
            }
        }
    </style>
</head>
<body>

<header>
    <div class="container">
        <div class="logo">Voyage Express</div>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="view_client.php">Clients</a></li>
                <li><a href="billets.php">Billets</a></li>
                <li><a href="destinations.php">Destinations</a></li>
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
