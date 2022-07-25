<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page | Transaksi</title>
    <link rel="stylesheet" href="css/init.css">
    <link rel="stylesheet" href="css/nav.css">
    <style> 
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .about {
            width: 100%;
            max-width: 800px;
        }
        .about h1 {
            font-size: 1.3rem;
            color: var(--primary);
            text-transform: uppercase;
            font-weight: 600;
        }
        .about blockquote {
            text-indent: 3rem;
            font-size: 1.8rem;
            color: var(--dark);
            font-weight: 500;
            margin-top: 1rem;
            position: relative;
            font-style: italic;
        }
        .about blockquote::after{
            content: '';
            position: absolute;
            width: 80px;
            height: 8px;
            border-radius: 100px;
            background-color: var(--primary);
            bottom: -1.5rem;
            right: .5rem;
        }
    </style>
</head>
<body>
    <?php include_once './partials/nav.php' ?>
    <div class="content">
        <div class="about">
            <h1>About Me 📝</h1> 
            <blockquote>"I am edwin hendly, a student that is in progress on a Transaction App. Goodluck for me EHE! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat eum pariatur sunt illo, vero id, ea doloribus, perspiciatis architecto assumenda earum? Expedita aperiam eligendi iste voluptatum omnis, rem voluptate dolor dolore quis nemo blanditiis recusandae, a numquam adipisci sapiente ratione".</blockquote>
        </div>
    </div>
</body>
</html>