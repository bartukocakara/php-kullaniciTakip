<?php
include('baglan.php');
include('inc.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetim Paneli</title>
</head>
<body>
<ul>
<?php
$veri = $db->prepare('SELECT id, MAX(id) AS son_id FROM ziyaretci GROUP BY ip ORDER BY id DESC');
$veri->execute(array());
$arr = $veri->fetchAll(PDO::FETCH_ASSOC);
foreach($arr as $za){
    $z_id = $za['son_id'];
    $veri = $db->prepare("SELECT * FROM ziyaretci WHERE id='$z_id'");
    $veri->execute(array());
    $arr = $veri->fetchAll(PDO::FETCH_ASSOC);
foreach($arr as $z){
    ?>
    <li><?php echo $z['ip'].'<br>'.$z['bulundugu'].'<br>'.$z['geldigi'].'<br>'.$z['zaman'].'<br>'; ?>
        <?php echo status($z['ip']);
    ?></li>
<?php }}  ?>
</ul>

</body>
</html>