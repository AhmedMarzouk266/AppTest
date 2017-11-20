<!-- here we will show the selected test -->
<h1>Test Details</h1>

<div class="container" style="font-size: larger;">
     title : <?=$test->title?><br/>
     sort  : <?=$test->sort?><br/>

     id:  <?=$test->id?> <br/>
    <br/>
    <hr/>
    test questions :<br/><br/>
    <?php foreach ($questions as $question){
        echo "- ".$question->title."<br/>";
    } ?>
</div>

