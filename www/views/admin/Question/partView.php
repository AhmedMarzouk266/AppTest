<div id="ajaxReload">
    <table class="table">
        <tr>
            <th>Position</th>
            <th style="text-align: center"> Question</th>
            <th style="text-align: center">Test</th>
            <th style="text-align: center">Sort</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>

        </tr>
        <?php
        $right  = " <b><small style='color:lightgreen' class='fa fa-check'> </small></b>";

        ?>
        <?php for($i=0; $i<sizeof($questions); $i++){?>
            <?php
            $char       = 'A';
            $idSort     = $questions[$i]->id;
            $idNextSort = $questions[$i+1]->id;
            $idPrevSort = $questions[$i-1]->id;
            $testId     = $questions[$i]->test_id;
            ?>
            <tr id="Number<?=$idSort?>">
                <td>
                    <div class="btn-group">
                        <a href="javascript:void(0)" id="up-ajax-btn"   onclick="changePosition(<?=$idSort?>,<?=$idPrevSort?>,<?=$testId?>)"><span class="fa fa-arrow-up"></a>&ensp;
                        <a href="javascript:void(0)" id="down-ajax-btn" onclick="changePosition(<?=$idSort?>,<?=$idNextSort?>,<?=$testId?>)"><span class="fa fa-arrow-down"></a>
                    </div>
                </td>
                <td><a data-toggle="collapse" href="#collapseExample<?= $questions[$i]->id ?>"><?= $questions[$i]->title ?></a>

                    <div class="collapse" id="collapseExample<?= $questions[$i]->id ?>">
                        <div class="card card-block" style="padding:10px;">
                            <h6 style="text-align: center">Answers</h6>
                            <?php foreach ($answers as $answer) {
                                if ($answer->quest_id == $questions[$i]->id) {
                                    echo "<div>";
                                    echo $char . ") " . $answer->title;
                                    if ($questions[$i]->right_ans_id == $answer->id) {
                                        echo "$right";
                                    }
                                    echo "</div>";
                                    $char++;
                                }
                            } ?>
                        </div>
                    </div>

                </td>
                <td style="text-align: center"><?php
                    foreach ($tests as $test) {
                        if ($questions[$i]->test_id == $test->id) {
                            echo $test->title;
                        }
                    }
                    ?></td>
                <td id='questSort' style="text-align: center"><?php echo $questions[$i]->sort; ?></td>
                <td><a href="/admin/question/edit?id=<?= $questions[$i]->id ?>"><i class="fa fa-pencil-square-o"
                                                                                   aria-hidden="true"></i> Edit</a></td>
                <td><a onclick="return confirm('Are you sure you want to delete?');"
                       href="/admin/question/delete?id=<?= $questions[$i]->id ?>"><i class="fa fa-trash" aria-hidden="true"></i>
                        Delete</a></td>
            </tr>

        <?php } ?>

        <script src="<?php echo PUBLIC_PATH."/javascripts/scripts.js";?>"></script>
</div>