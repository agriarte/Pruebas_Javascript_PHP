<?php
print_r($_REQUEST);

echo "<p>aquí vienen los REQUEST</p>";
echo "<p>" . $_REQUEST["comentario"] . "</p>";
?>

<div> <pre><?php echo $_REQUEST["comentario"]; ?> </pre></div>
<div>
    <textarea><?php echo $_REQUEST["comentario"]; ?></textarea>
</div>
