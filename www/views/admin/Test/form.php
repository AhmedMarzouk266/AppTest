<h1> Test Edit / Insert </h1>

<!-- action be in a variable or can be just a slash for the current page -->
<?php
if(isset($test->id)){
    $action = "/admin/test/edit?test_id= ". $test->id ;
}else{
    $action = "/admin/test/add";
}
?>



<form action="<?=$action?>" method="post">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Title :</label>
        <div class="col-sm-10">
            <input type="text" name="title" class="form-control-plaintext" value="<?=$test->title?>">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">sort :</label>
        <div class="col-sm-10">
            <input type="number" name="sort" class="form-control" placeholder="" value="<?=$test->sort?>" >
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <input type="submit" name="submit" value="Save">
        </div>
    </div>
</form>