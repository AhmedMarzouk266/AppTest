<!-- list of all questions -->

<h1>
    Hello Admin
</h1>
<hr/>
<h3><?=$title?>.<?=$quest_title?></h3>
<br/>
<a href="/admin/question/add">Add New Question</a><br/><br/>
<table class="table">
    <tr>
        <th style="text-align: center"> Question </th>
        <th style="text-align: center">Test ID</th>
        <th style="text-align: center">Right Answer ID</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>

    </tr>


<?php foreach ($questions as $question){?>
    <tr>
        <td><?=$question->title?></td>
        <td><?=$question->test_id?></td>
        <td><?=$question->right_ans_id?></td>
        <td><a href="/admin/question/edit?id=<?=$question->id?>">Edit</a></td>
        <td><a onclick="return confirm('Are you sure you want to delete?');" href="/admin/question/delete?id=<?=$question->id?>">Delete</a></td>
    </tr>

<?php }?>