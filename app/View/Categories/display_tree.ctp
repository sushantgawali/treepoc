<div class="container row">
    <div class="span4">
        <ol class="sortable no-nest">
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
    </div>
    <?php //pr($category); ?>
    <div class="span4" id='tree'>
        <?php pr($data); ?>
    </div>
</div>
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
        var sourceIndex = "";
        $('.sortable').nestedSortable({
            disableNesting: 'no-nest',
            forcePlaceholderSize: true,
            handle: 'div',
            helper:	'clone',
            items: 'li',
            maxLevels: 3,
            opacity: .6,
            placeholder: 'placeholder',
            revert: 250,
            tabSize: 25,
            tolerance: 'pointer',
            toleranceElement: '> div',
            stop:function (event, ui) {
//                console.log($(ui.item).find('div').attr('id'));
//                console.log($(ui.item).siblings().find('div').attr('id'));

                console.log($('.sortable').nestedSortable('toHierarchy'));

//                c1 = $(ui.item).find('div').attr('id');
////                c2 = $($(ui.item).parent().parent().children()[0]).children().attr('id');
//                c2 = $(ui.item).siblings().find('div').attr('id');
//
//                $.ajax({
//                    type:"POST",
//                    url:"/categories/node_change",
//                    data:{data1:c1, data2:c2},
//                    success:function (responce) {
//                        $('#tree').html(responce);
//                    }
//                });
            }
        });
    });
</script>