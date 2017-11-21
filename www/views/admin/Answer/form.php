
<h1> Answer Edit / Insert </h1>

<!-- action be in a variable or can be just a slash for the current page -->
<?php
//if(isset($answer->id)){
//    $action = "/admin/answer/edit?id= ". $answer->id ;
//}else{
//    $action = "/admin/answer/add";
//}
?>
<br/>
<form action="<?=$action?>" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Answer Title :</label>
        <div class="col-sm-10">
            <input type="text" name="title" placeholder="Title.." value="<?=$answer->title?>" class="form-control-plaintext" >
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Answer sort :</label>
        <div class="col-sm-10">
            <input type="number" name="sort" class="form-control" value="<?=$answer->sort?>" placeholder="sort">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Question : </label>
        <div class="col-sm-10">
            <select name="quest_id" class="custom-select">>
                <?php foreach ($questions as $question){?>
                    <option value="<?=$question->id?>" <?php if($question->id == $answer->quest_id){echo 'selected';}?> ><?=$question->title?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Image Answer :</label>
        <div class="col-sm-10">
            <input type="file" name="images" placeholder="image src .." id="filePhoto"><br/>
            <span>Uploaded Image : <?=$answer->images?></span><br/><br/>
            <img id="previewHolder" src="<?=$src?>" width="130" height="130"/>
        </div>

        <script>





        </script>

    </div>





    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" name="submit" class="btn btn-primary">save</button>
        </div>
    </div>
</form>