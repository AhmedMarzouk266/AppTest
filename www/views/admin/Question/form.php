<h1> Question Edit / Insert </h1>
<br/>

<a href="/admin/answer/index?quest_id=<?=$question->id?>">Answers</a><br/><br/>

<form action="<?=$action?>" method="post">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label"> Title :</label>
        <div class="col-sm-10">
            <input type="text" name ="title" class="form-control" placeholder="Question.." value="<?=$question->title?>">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label"> Sort :</label>
        <div class="col-sm-10">
            <input type="number" name="sort" class="form-control" value="<?=$question->sort?>" placeholder="sort">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Test : </label>
        <div class="col-sm-10">
            <select name="test_id" class="custom-select form-control ">
                <option disabled selected value> -- select an option -- </option>
                <?php foreach ($tests as $test){?>
                    <option value="<?=$test->id?>" <?php if($test->id == $question->test_id){echo 'selected';}?> ><?=$test->title?></option>
                <?php }?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Right answer : </label>
        <div class="col-sm-10">
            <select name="right_ans_id" class="custom-select form-control">
                <option disabled selected value> -- select an option -- </option>
                <?php foreach ($answers as $answer){?>
                    <option value="<?=$answer->id?>" <?php if($answer->id === $question->right_ans_id){echo 'selected';}?> ><?=$answer->title?></option>
                <?php }?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <input type="submit" name="submit" value="Save" class="btn btn-primary">
        </div>
    </div>
</form>

