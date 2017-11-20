
<h1> Answer Edit / Insert </h1>

<!-- action be in a variable or can be just a slash for the current page -->
<?php
if(isset($answer->id)){
    $action = "/admin/answer/edit?id= ". $answer->id ;
}else{
    $action = "/admin/answer/add";
}
?>
<br/>
<form action="<?=$action?>" method="post" class="form-horizontal" enctype="multipart/form-data">
<div >
    <label>Title :</label>
    <input type="text" name="title" placeholder="Title.." value="<?=$answer->title?>"><br/><br/>
    <label>sort :</label>
    <input type="number" name="sort" placeholder="sort (number).." value="<?=$answer->sort?>" ><br/>
    <br/>
    <label> Question ID : </label>
    <select name="quest_id">
        <?php foreach ($questions as $question){?>
            <option value="<?=$question->id?>"><?=$question->title?></option>
        <?php }?>
    </select>
    <br/><br/>
    <label>Image Answer :</label>
    <input type="file" name="images" placeholder="image src .." value="<?=$answer->images?>" >
</div><br/>
    <input type="submit" name="submit" value="Save">

</form>