<?php
        $this->renderPartial("_tabAnnouncement");

        $isExist = is_file(Yii::app()->basePath . "/modules/m1/models/gPerson.php");
        if ($isExist) {
            //if (sUser::model()->myGroup != 1100 || Yii::app()->user->name == "admin")
                $this->renderPartial("_tabNewEmployee");
        }

        echo $this->renderPartial("_tabMailbox", array(), true);

        $this->renderPartial("_tabCompanyDocuments");

?>