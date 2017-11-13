<div>
    <dl>
        <?php for($i=0; $i<sizeof($vars) ; $i++){ ?>
            <?php foreach ($vars[$i] as $key => $value){?>
                <dd>
                    <?=$key?> :  <?=$value?>
                </dd>
            <?php }?>
            <hr/>
        <?php } ?>
    </dl>
</div>