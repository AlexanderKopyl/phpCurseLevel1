<?php
/**
 * Created by PhpStorm.
 * User: alexandr.kopyl
 * Date: 19.12.2018
 * Time: 16:56
 */
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $requierd_fields = ['email','password','name','message'];
    $dict = ['email'=> 'Почта','password' => 'Пароль юзера','name' => 'Имя юзера', 'message' => 'Контактные данные'];
    $error = [];
    $flag = false;
    $email = $_POST['email'];
    $salt = array('salt'=>uniqid('', true));
    $password =  password_hash($_POST['password'], PASSWORD_BCRYPT, $salt);
    $name = $_POST['name'];
    $contact = htmlspecialchars($_POST['message']);
    $avatar = "";


    while ($row = $userEmailFromDB->fetch())
    {
        if($row['email'] == $email){
            $error['emailExist'] = "Такой емейл уже зарегестрирован";
        }
    }

    foreach ($requierd_fields as $field){
        if(empty($_POST[$field])){

            $error[$dict[$field]] = 'Поле не заполнено';
            $error[$field] = 'Поле не заполнено';
        }

        if($_POST[$field] == 'Выберите категорию'){
            $error[$field] = 'Поле не заполнено';
        }

    }

    if(empty($_FILES['file']['name'])){
        $error['file'] = 'Файл не выбран';

    }




    //Проверка почты на валидность
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email = $_POST['email'];
    }else{
        $error['email'] = "Почта не коректна";
    }

    //Проверка Валидности имени
    if(preg_match('/^[a-zA-Zа-яёА-ЯЁ]+$/u', $name)){
        $name = $_POST['name'];
    }else{
        $error['name'] = "Имя указанно не коректно";
    }

    if (count($error)){
        $form__invalid = 'form--invalid';

    }else{
        if(isset($_FILES['file']['name'])){
            $uploaddir = 'img\\';
            $uploadfile = $uploaddir . basename($_FILES['file']['name']);

            move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
            $tmp_name = $_FILES['file']['tmp_name'];
            $path = $_FILES['file']['name'];

// Проверка на тип файла
//            $finfo = finfo_open(FILEINFO_MIME_TYPE);
//            $fileType = finfo_file($finfo,$tmp_name);
//            if($fileType !== 'image/jpeg'){
//                $error['file'] = 'Файл не правильно заполнин';
//                $flag = false;
//            }
        }
        $stmt = $pdo->prepare('INSERT INTO user(name, password, email, conntact, avatar) VALUES (:name,:password,:email,:contact,:avatar)');
        $stmt->execute(['name' => $name, 'password' => $password, 'email' => $email, 'contact' => $contact,'avatar' => $uploaddir.$path]);
        header('Location: index.php');
        $flag = true;
    }






}
