<?php
require './user.class.php';
$user = new User();
$users = $user->getUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" />
    <style>
    .darkMode{
        filter: invert(1) hue-rotate(180deg);
    }
    </style>
</head>
<body>
    <header class="pt-5 text-center mb-5">
        <h1>Users CRUD</h1>
    </header>
    <main>
    <section>
        <div class="container mb-3">
            <div class="row">
                <div class="col-12 text-right">
                    <button class="btn btn-primary" id="dark-mode">Dark Mode</button>
                </div>
            </div>
        </div>
    </section>
        <section>
            <div class="container">
                <div class="row">
                <div class="col-4">
                    <form action="" method="post" id="add-user" class="border shadow p-5">
                        <div>
                            <h2>Add User:</h2>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name"  name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" id="age" name="age" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Add</button>
                        </div>
                    </form>
                </div>
                    <div class="col-8">
                        <table class="table border rounded-5 shadow">
                            <thead>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <?php foreach($users as $user){ ?>
                                    <tr data-id="<?= $user->id; ?>">
                                        <td><?= $user->id; ?></td>
                                        <td><?= $user->name; ?></td>
                                        <td><?= $user->email; ?></td>
                                        <td><?= $user->age; ?></td>
                                        <td>
                                            <a href="./edit-user.php?id=<?= $user->id; ?>" class="btn btn-primary">Edit</a>
                                            <a class="btn btn-danger delete-user" data-id="<?= $user->id; ?>">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./js/functions.js"></script>
    <script src="./js/main.js"></script>
</body>
</html>