<?php
$errors = [];


if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

if($exception){
    $message = [
        'type' => 'error',
        'message' => $exception->getMessage()
    ];
    if(get_class($exception) === 'ValidationException'){
        $errors = $exception->getErrors();
    }
}
$alertType = '';

if($message['type'] === 'error'){
    $alertType = 'danger';
<<<<<<< HEAD
}elseif($message['type'] === 'warning'){
    $alertType = 'warning';
=======
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
}else{
    $alertType = 'success';

}
?>
<?php if($message) : ?>

<div role="alert" 
    class="my-3 alert alert-<?= $alertType ?>" >
    <?= $message['message'] ?>
</div>
<?php endif ?>