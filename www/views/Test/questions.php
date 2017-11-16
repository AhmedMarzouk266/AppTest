
<h1>Questions !</h1>
<?php

    echo $question->title."<br/>";
    echo "<br/>";

?>



<form action="questions?test_id=<?=$question->test_id?>&method=next" method="post">
    <?php foreach ($answers as $answer){ ?>

    <label>
            <input type="radio" name="answer" value="<?=$answer->id?>">
            <img src="<?=$answer->images?>" height="42" width="42">
    </label>
            <br/> <br/>
            <input type="hidden" name="quest_id" value="<?=$question->id?>">
    <?php } ?>
    <br/>
    <p style="color: #c12e2a"><?= $errors[0]?></p><br/><hr/>
    <button class="btn btn-info" type="submit" name="submit">Next</button>
</form>

<!--href="questions?test_id=--><?//=$question->test_id?><!--&method=next"-->

<br/>
<hr/>







