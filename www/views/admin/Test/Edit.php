<h1>Edit Page: Test</h1>



<h4 style="text-align: left">Test Title : <?=$test->title?></h4>
<h4 style="text-align: left">Test sort  : <?=$test->sort?></h4>
<h4 style="text-align: left">Test id    : <?=$test->id?></h4>
<hr/>
<h4>Test questions</h4>
<div class="container">
    <?php foreach ($questions as $question) {
        echo "<h5>";
            echo $question->title;
        echo "</h5>";

    }
    ?>
</div>