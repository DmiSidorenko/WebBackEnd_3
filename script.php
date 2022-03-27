<?php
header('Content-Type: text/html; charset=UTF-8');


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!empty($_GET['save'])) {
        print('Спасибо, форма сохранена.');
    }
    include('form.html');
    exit();
}

switch($_POST['sex']) {
    case 'male': {
        $sex='m';
        break;
    }
    case 'female':{
        $sex='f';
        break;
    }
};

$power1=in_array('bessm',$_POST['Superpowers']) ? '1' : '0';
$power2=in_array('passing',$_POST['Superpowers']) ? '1' : '0';
$power3=in_array('fly',$_POST['Superpowers']) ? '1' : '0';
$power4=in_array('invisible',$_POST['Superpowers']) ? '1' : '0';
$power5=in_array('more',$_POST['Superpowers']) ? '1' : '0';
$power6=in_array('nothing',$_POST['Superpowers']) ? '1' : '0';

if ($power1==1)
    $power=1;
    else
    if ($power2==1)
        $power=2;
        else
        if ($power3==1)
            $power=3;
            else
            if ($power4==1)
                $power=4;
                else
                if ($power5==1)
                    $power=5;
                    else
                    if ($power6==1)
                        $power=6;

$user = 'u41123';
$pass = '1452343';
$db = new PDO('mysql:host=localhost;dbname=u47531', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

try {
    $stmt = $db->prepare("INSERT INTO application SET fio = ?, email = ?, birth_date = ? ,gender = ?, limb = ?,ability =?, bio = ?);
    $stmt -> execute(array($_POST['FIO'],$_POST['email'],$_POST['date'],$sex,$limbs,$power,$_POST['Biography']));
}
catch(PDOException $e){
    print('Error : ' . $e->getMessage());
    exit();
}

header('Location: ?save=1');
?>
