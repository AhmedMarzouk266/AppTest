
<h1>Questions !</h1>
<?php

foreach ($questions as $quest) {
    echo $quest->title."<br/>";
    echo "<br/>";
    foreach ($answers as $answer){
        echo "- ".$answer->title.".<br/>";
    }
}

?>