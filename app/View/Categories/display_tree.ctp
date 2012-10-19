<ol class="sortable">
    <?php foreach ($categories as $category) { ?>
    <li>
        <div id="<?php echo $category['Category']['id'];?>"><?php echo $category['Category']['name']; ?></div>
        <ol>
            <?php if (!empty($category['children'])) {
            foreach ($category['children'] as $child1) {
                ?>
                <li>
                    <div id="<?php echo $child1['Category']['id'];?>"><?php echo $child1['Category']['name']; ?></div>
                </li>
                <?php if (!empty($child1['children'])) {
                    foreach ($child1['children'] as $child2) {
                        ?>
                        <ol>
                            <li>
                                <div id="<?php echo $child2['Category']['id'];?>"><?php echo $child2['Category']['name']; ?></div>
                            </li>
                            <?php if (!empty($child2['children'])) {
                            foreach ($child2['children'] as $child3) {
                                ?>
                                <ol>
                                    <li>
                                        <div id="<?php echo $child3['Category']['id'];?>"><?php echo $child3['Category']['name']; ?></div>
                                    </li>
                                </ol>
                                <?php
                            }
                        } ?>
                        </ol>
                        <?php
                    }
                } ?>
                <?php
            }
        }?>
        </ol>
    </li>
    <?php } ?>
</ol>
<?php //pr($category); ?>
<?php pr($data); ?>
<!--<ol class="sortable">-->
<!--    <li><div>Some content</div></li>-->
<!--    <li>-->
<!--        <div>Some content</div>-->
<!--        <ol>-->
<!--            <li><div>Some sub-item content</div></li>-->
<!--            <li><div>Some sub-item content</div></li>-->
<!--        </ol>-->
<!--    </li>-->
<!--    <li><div>Some content</div></li>-->
<!--</ol>-->

<script type="text/javascript">
    $(document).ready(function () {
        var sourceIndex="";
        $('.sortable').nestedSortable({
            handle:'div',
            items:'li',
            toleranceElement:'> div',
            protectRoot: true,
            start:function(event, ui) {
                sourceIndex=ui.item[0].rowIndex;
                id=ui.item[0].rowIndex;
            },
            stop: function(event,ui){
                console.log($(ui.item).find('div').attr('id'));
                console.log($($(ui.item).parent().parent().children()[0]).children().attr('id'));
            }
        });
    });
</script>