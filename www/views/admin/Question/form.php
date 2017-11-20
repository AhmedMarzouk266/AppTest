<h1> Question Edit / Insert </h1>

<!-- action be in a variable or can be just a slash for the current page -->
<?php
if(isset($question->id)){
    $action = "/admin/question/edit?id= ". $question->id ;
}else{
    $action = "/admin/question/add";
}

?>

<br/>

<form action="<?=$action?>" method="post">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Question Title :</label>
        <div class="col-sm-10">
            <input type="text" name ="title" class="form-control-plaintext" value="<?=$question->title?>">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Question sort :</label>
        <div class="col-sm-10">
            <input type="number" name="sort" class="form-control" value="<?=$question->sort?>" placeholder="sort">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Test Title : </label>
        <div class="col-sm-10">
            <select name="test_id">
                <?php foreach ($tests as $test){?>
                    <option value="<?=$test->id?>"><?=$test->title?></option>
                <?php }?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Right answer ID : </label>
        <div class="col-sm-10">
            <input type="number" name="right_ans_id" class="form-control" placeholder="Right answer ID">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <input style="width: 10%" type="submit" name="submit" value="Save">
        </div>
    </div>
</form>
