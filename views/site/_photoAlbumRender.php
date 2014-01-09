<ul class="gallery">

    <?php
    foreach ($contents as $content) {
        if ($content != "." && $content != ".." && !is_dir($dir . "/" . $content) === true) {
            $filename = explode(".", $content);
            if ($filename[1] === "jpg" || $filename[1] === "JPG" || $filename[1] === "jpeg" || $filename[1] === "JPEG") {
                if (is_file($dir2 . "/" . $id . ".xml")) {
                    $xml = simplexml_load_file($dir2 . "/" . $id . ".xml");
                    $_title[$filename[0]] = $filename[0];
                    $_desc[$filename[0]] = "";
                    if (isset($xml->children()->files)) {
                        foreach ($xml->children()->files->file as $file) {
                            if ($file->attributes()->name == $filename[0]) {
                                $_title[$filename[0]] = $file->title;
                                $_desc[$filename[0]] = $file->description;
                            }
                        }
                    }
                } else {
                    $_title[$filename[0]] = "";
                    $_desc[$filename[0]] = "";
                }

                if ($counter == 1) {
                    ?>

                    <div class="row">
                        <ul class="thumbnails">
                        <?php } ?>

                        <div class="span2">
                            <li class="span2">
                                <div class="thumbnail">
                                    <?php
                                    if (!is_dir($dir . "/thumbs"))
                                        mkdir(Yii::getPathOfAlias('webroot') . '/shareimages/photo/' . $id . "/thumbs");

                                    if (!is_file($dir . "/thumbs/" . $content)) {
                                        Yii::import('ext.iwi.Iwi');
                                        $picture = new Iwi(Yii::app()->basePath . "/../shareimages/photo/" . $id . "/" . $content);
                                        $picture->resize(200, 200, Iwi::AUTO);
                                        $picture->save(Yii::app()->basePath . "/../shareimages/photo/" . $id . "/thumbs/" . $content, TRUE);

                                        //change permission
                                        chmod(Yii::getPathOfAlias('webroot') . "/shareimages/photo/" . $id . "/thumbs/" . $content, "0777");
                                    }

                                    if (is_file($dir . "/thumbs/" . $content)) {
                                        $photo = Yii::app()->request->baseUrl . "/shareimages/photo/" . $id . "/thumbs/" . $content;
                                    }
                                    else
                                        $photo = Yii::app()->request->baseUrl . "/shareimages/photo/" . $id . "/" . $content;

                                    //echo CHtml::link(CHtml::image($photo, 'image'),
                                    //Yii::app()->createUrl("/shareimages/photo/".$id."/".$content),array("target"=>"_blank")); 
                                    echo "<a rel='prettyPhoto[gallery1]' href='" . Yii::app()->baseUrl . "/shareimages/photo/" . $id . "/" . $content . "'>" . CHtml::image($photo, 'image') . "</a>";
                                    //echo $id."/".$content;
                                    //echo CHtml::image($photo, 'image'); 
                                    ?>
                                    <h5><? echo peterFunc::shorten_string($_title[$filename[0]], 3) ?></h5>
                                    <p><? echo peterFunc::shorten_string($_desc[$filename[0]], 10) ?></p>
                                </div>
                            </li>
                        </div>

                        <?php
                        $counter++;
                        if ($counter == 6) {
                            ?>
                        </ul>
                    </div>
                    <?php
                }

                if ($counter == 6)
                    $counter = 1;
            }
        }
        ?>
        <?php
    };
    ?>

    <?php if ($counter != 6) { ?>
    </ul>
    </div>
<?php } ?>

</ul>

<!-- modal-gallery is the modal dialog used for the image gallery -->
<div id="modal-gallery" class="modal modal-gallery hide fade" tabindex="-1">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h3 class="modal-title"></h3>
    </div>
    <div class="modal-body"><div class="modal-image"></div></div>
    <div class="modal-footer">
        <a class="btn btn-primary modal-next">Next <i class="icon-fa-arrow-right icon-fa-white"></i></a>
        <a class="btn btn-info modal-prev"><i class="icon-fa-arrow-left icon-fa-white"></i> Previous</a>
        <a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000"><i class="icon-fa-play icon-fa-white"></i> Slideshow</a>
        <a class="btn modal-download" target="_blank"><i class="icon-fa-download"></i> Download</a>
    </div>
</div>
