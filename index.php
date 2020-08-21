<?php
header('Content-Type: text/html; charset=UTF-8');

$ability_labels = ['breakdown' => 'Расщепление материи', 'regeneration' => 'Регенерация', 'reaction' => 'Высокая скорость реакции', 'resistance' => 'Сопротивление токсинам'];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
   
    if (!empty($_GET['save'])) {
        
        print('Спасибо, результаты сохранены.');
    }

    include('form.php');
    exit();
}
$errors = FALSE;

if (empty($_POST['fio'])) {
    print('Заполните имя.<br/>');
    $errors = TRUE;
}
else if (!preg_match('/^[а-яА-Я ]+$/u', $_POST['fio'])) {
    print('Недопустимые символы в имени.<br/>');
    $errors = TRUE;
}
$year = $_POST['year'];
if (empty($_POST['year'])) {
    print('Заполните год.<br/>');
    $errors = TRUE;
}

$ability_data = array_keys($ability_labels);
if (empty($_POST['abilities'])) {
   print('Выберите способность.<br/>');
   $errors = TRUE;
}

if(!isset($_POST['sex']))
{
    print('Выберите пол!<br/>');
    $errors = TRUE;
}
$limbs = $_POST['Limbs'];
if(!isset($_POST['Limbs']))
{
    print('Выберите кол-во конечностей!<br/>');
}

if (empty($_POST['email'])) {
    print('Укажите адрес эл. почты.<br/>');
    $errors = TRUE;
}
else {
    $email = $_POST['email'];
    if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
        print('Укажите корректный адрес!<br/>');
        $errors = TRUE;
    }
}
$ability_insert = [];
foreach ($ability_data as $ability) {
    $ability_insert[$ability] = in_array($ability, $abilities) ? 1 : 0;
}

if (empty($_POST['field-name-2']))
{
    $errors = TRUE;
    print('Напишите о себе<br/>');
}

if(!(isset($_POST['acquainted']) &&
    $_POST['acquainted'] = 'Yes'))
{
    print('Ознакомтесь с контрактом!');
    $errors = TRUE;
}
if ($errors) {
    exit();
}

$user = 'u17446';
$pass = '9743779';
$db = new PDO('mysql:host=localhost;dbname=u17446', $user, $pass,
    array(PDO::ATTR_PERSISTENT => true));

// Подготовленный запрос. Не именованные метки.
try {
    $stmt = $db->prepare("INSERT INTO task3 SET name = ?, email = ?, year = ?, sex = ?, limbs = ?, breakdown = ?, regeneration = ?, reaction = ?, resistance = ?, biography = ?");
    $stmt->execute([$_POST['fio'], $_POST['email'], intval($year) , $_POST['sex'], intval($limbs),  $ability_insert['breakdown'], $ability_insert['regeneration'], $ability_insert['reaction'], $ability_insert['resistance'], $_POST['field-name-2']]);
}
catch(PDOException $e){
    print('Error : ' . $e->getMessage());
    exit();
}

header('Location: ?save=1');
?>