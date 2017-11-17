<h1>
 <?=$title?>
</h1>

<?php foreach($tests as $test){ ?>


    <ul>
        <li>
            <a href="\test\questions?test_id=<?php echo $test->id?> "><?= $test->title?></a>
        </li>
    </ul>

<?php } ?>
