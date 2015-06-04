<?php


$numpages = 5;
for($i=1;$i<=$numpages;$i++):?>
    <a href="list2.php?num=<?= $i?> "><?= $i?></a>
<?php endfor; ?>