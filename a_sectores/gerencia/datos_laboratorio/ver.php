


<?php 

include ("../../../conexiones/config.inc.php");
$sql = "SELECT * FROM upload";
$result = $db->Execute($sql);

  $id=$result->fields["id"];
  $type=$result->fields["type"];
 $content=$result->fields["content"];


header("Content-Type: $content");



?>

<img style="margin-bottom:10px;" src="includes/mostrarimagen.php?id=<?php php echo $contentid(); ?>" />