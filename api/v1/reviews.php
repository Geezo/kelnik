<?php
include_once '../../core/vendor/autoload.php';
use Reviews\ReviewController;
use Reviews\ReviewRepository;

if($_POST['action'] && $_POST['action'] == 'add') {
    $email = htmlspecialchars($_POST['email']);
    $name = htmlspecialchars($_POST['name']);
    $message = htmlspecialchars($_POST['message']);
    if($email && $name && $message) {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode([
                'error' => true,
                'message' => 'Не верно указан email'
            ]);
            die;
        }
        $reviewController = new ReviewController(new ReviewRepository());
        if($reviewController->addReview($email, $name, $message)) {
            echo json_encode([
                'error' => false,
                'items' => $reviewController->getReviews(5),
            ]);
        } else {
            echo json_encode([
                'error' => true,
                'message' => 'Не удалось добавить элемент'
            ]);
        }
    } else {
        echo json_encode([
            'error' => true,
            'message' => 'Не заполнено одно из полей'
        ]);
    }
}
