<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/about.css">
    <link rel="stylesheet" href="style/contact.css">
    <link rel="stylesheet" href="style/form.css">
    <script src="js/contact.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">    
    <title>Welcome to my Page</title>
    <style>
        footer {
                text-align: center;
                padding: 3px;
                background-color: DarkSalmon;
                color: white;
                margin-top: auto;
                }
        main{
            flex:1;
        }

    </style>
</head>
<body>
    <div>
        <?php
            # inlude Navbar
            include_once('./partials/navbar.php');
        ?>
    </div>
    <main>
        <?php
            # inlude content here
            if(!(isset($_GET['page']))){
                include_once('./view/home.php');
            }
            else 
            {
                $page = $_GET['page'];
                switch ($page) {
                    case 'home':
                        include_once('./view/home.php');
                        break;
                    case 'about':
                        include_once('./view/about.php');
                        break;
                    case 'contact':
                        include_once('./view/contact.php');
                        break;
                    case 'products':
                        include_once('./view/products.php');
                        break;
                    default:
                        echo "<h4 style='text-align:center; color:red'>404: Oops page not found...</h4>";
                        break;
                }
            }
            
        ?>
        
    </main>    
        <?php
            # inlude footer
            include_once('./partials/footer.php');
        ?>     
</body>
</html>