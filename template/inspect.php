<?php require_once 'main.php';?>
<div class="row">
    <div class="col-md-12">
    <div class="col-md-3">
        <label><?= ($ID != 'self') ? 'Фото:' : 'Ваше фото:' ?><br>
            <?php if ($profileByID->getPhoto() != '') : ?>
            <a href="upload/<?=$profileByID->getPhoto()?>"><img src="upload/cr-<?=$profileByID->getPhoto()?>"></a></label>
        <?php else :?>
            <img src="upload/default.jpg"></label>
        <?php endif ?>
        <?php if ($ID == 'self') :
        include 'form_photo.php';
        endif;?>

    </div>
    <div class="col-md-4">
<ul class="list-group">
    <li class="list-group-item">Имя: <b><?=htmlProtect($profileByID->getName()) ?></b></li>
    <li class="list-group-item">Фамилия: <b><?=htmlProtect($profileByID->getSurname()) ?></b></li>
    <li class="list-group-item">Год рождения: <b><?=htmlProtect($profileByID->getBirthDate()) ?></b></li>
    <li class="list-group-item">Группа: <b><?=htmlProtect($profileByID->getGroupNumber()) ?></b></li>
    <li class="list-group-item">Балл ЕГЭ <b><?=htmlProtect($profileByID->getMark())?></b></li>
    <li class="list-group-item">Местный/Приезжий: <b><?=htmlProtect($profileByID->getShowLocal()) ?></b></li>
    <?php if ($ID == 'self') : ?>
    <li class="list-group-item">E-mail для связи <b><?=htmlProtect($profileByID->getEmail()) ?></b></li>
    <?php endif ?>
    <li class="list-group-item">Пол: <b><?=htmlProtect($profileByID->getShowSex()) ?></b></li>
</ul></div>
    <div class="col-md-4">
        <?php if ($err) : ?>
            <div class="alert alert-warning" role="alert"><p><?=htmlProtect($err) ?></p></div>
        <?php endif ?>

        <form  action="mess_action.php" method="post">
            <input type="hidden" name="redirect" value="<?=htmlProtect(getPagiForMessage($p, $ID)) ?>">
            <input type="hidden" name="id_target" value="<?=htmlProtect($ID) ?>">
            <input type="hidden" name="id_author" value="<?=htmlProtect($student->getID()) ?>">
            <textarea class="form-control" rows="3" name="text" placeholder="Ваше сообщение"></textarea></p>
            <button type="submit" name="submit" class="btn btn-info">Отправить сообщение</button>
             </form>
        <br>
        <?php foreach ($messages as $message) : ?>
            <p class="bg-info"><?=htmlProtect($message->getDate()) ?> от:
                <a href="index.php?ID=<?=htmlProtect($message->getIDauthor()) ?>"><?=htmlProtect($db->findStudentByID($message->getIDauthor())->getName()) ?> <?=htmlProtect($db->findStudentByID($message->getIDauthor())->getSurname()) ?></a></p>
            <?=htmlProtect($message->outputMessage()) ?>
        <?php endforeach ?>
        <div class="text-center">
        <nav>

            <ul class="pagination">
                <?php if ($p > 1): ?>
                <li><a href="<?=htmlProtect(getPagiForMessage('1', $ID))?>"><span aria-hidden="true">&laquo;</span></a> </li>
                        <?php endif;
                    if ($p -1 > 0): ?>
                         <li><a href="<?=htmlProtect(getPagiForMessage($p-1, $ID))?>"><?= $p-1?></a> </li>
                       <?php endif ?>
                        <li class="active"><a href="<?=htmlProtect(getPagiForMessage($p, $ID))?>"><?= $p?></a></li>
                <?php if ($p +1 <= $numpages): ?>
                <li><a href="<?=htmlProtect(getPagiForMessage($p+1, $ID))?>"><?= $p+1?></a> </li>
                <?php endif;
                if ($p < $numpages): ?>
                <li><a href="<?=htmlProtect(getPagiForMessage($numpages, $ID))?>"><span aria-hidden="true">&raquo;</span></a> </li>
                <?php endif ?>
            </ul></nav></div>
    </div>
</div>
