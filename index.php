<?php
include 'core/vendor/autoload.php';

use Reviews\ReviewController;
use Reviews\ReviewRepository;
$reviewController = new ReviewController(new ReviewRepository());
$reviews = $reviewController->getReviews(5);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="SKYPE_TOOLBAR" content ="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
    <title>Гостевая книга</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="shortcut icon" href="access/images/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<body>
<section class="container">
    <form class="justify-content-md-center col col-lg-4 js-review-add" method="post">
        <input type="hidden" name="action" value="add">
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Сообщение</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
        </div>
        <div class="mb-3 js-add-error"></div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>

    <section>
        <div>
            <div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Имя</th>
                        <th scope="col">Email</th>
                        <th scope="col">Сообщение</th>
                    </tr>
                    </thead>
                    <tbody class="js-list-body">
                    <?if($reviews) {?>
                        <?foreach ($reviews as $review) {?>
                            <tr>
                                <td><?=$review['name']?></td>
                                <td><?=$review['email']?></td>
                                <td><?=$review['body']?></td>
                            </tr>
                            <? } ?>
                    <? } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</section>
<script src="access/js/script.js"></script>
</body>
</html>
