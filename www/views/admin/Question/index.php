<!-- list of all questions -->

<h1>
    Hello Admin
</h1>
<hr/>
<h3><?=$title?>.<?=$quest_title?></h3>
<br/>
<a class="btn btn-primary" href="/admin/question/add">Add New Question</a><br/><br/>
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
        <td style="text-align: center"><?=$question->test_id?></td>
        <td style="text-align: center"><?=$question->right_ans_id?></td>
        <td><a href="/admin/question/edit?id=<?=$question->id?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></td>
        <td><a onclick="return confirm('Are you sure you want to delete?');" href="/admin/question/delete?id=<?=$question->id?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></td>
    </tr>

<?php }?>