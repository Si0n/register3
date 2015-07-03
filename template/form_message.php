<form  action="inspect.php?ID=<?=htmlProtect($ID) ?>" method="post">
            <input type="hidden" name="id_target" value="<?=htmlProtect($ID) ?>">
            <input type="hidden" name="id_author" value="<?=htmlProtect($student->getID()) ?>">
            <textarea class="form-control" rows="3" name="text" placeholder="Ваше сообщение"></textarea></p>
            <button type="submit" name="submit" class="btn btn-info">Отправить сообщение</button>
             </form>