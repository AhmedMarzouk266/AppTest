<!-- list of all answers -->


<h1>
    Hello Admin
</h1>
<hr/>
<h3><?=$title?></h3>
<br/>

<a href="/admin/answer/add">Add New Answer</a><br/><br/>

<table class="table">
    <tr>
        <th style="text-align: center"> Answers </th>
        <th style="text-align: center">Question ID</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>

    </tr>

    <?php foreach ($answers as $answer){?>
    <tr>
        <td><?=$answer->title?></td>
        <td><?=$answer->quest_id?></td>
        <td><a href="/admin/answer/edit?id=<?=$answer->id?>">Edit</a></td>
        <td><a onclick="return confirm('Are you sure you want to delete?');" href="/admin/answer/delete?id=<?=$answer->id?>">Delete</a></td>
    </tr>

<?php }?>