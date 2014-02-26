<?php
class SUserController extends Controller {
    public $layout = '//layouts/column2';
    //public $layout='//layouts/column3user';
    public function filters() {
        return array(
            //'accessControl', // perform access control for CRUD operations
            'rights',
            'ajaxOnly + deleteModule, userAutoComplete',
        );
    }
    public function actions() {
        return array(
            'toggle' => 'ext.jtogglecolumn.ToggleAction',
                //'switch'=>'ext.jtogglecolumn.SwitchAction', // only if you need it
        );
    }
    public function actionView($id) {
        $module = $this->newUserModule($id);
        $group = $this->newUserGroup($id);
        if (isset($_POST['sUser'])) {
            $personid = $_POST['sUser']['sso_id'];
            gPerson::model()->updateByPk((int) $personid, array('userid' => $id));
        }
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'modelModule' => $module,
            'modelGroup' => $group,
        ));
    }
    public function actionDuplicate($id) {
        $model = $this->loadModel($id);
        $modelNew = new sUser;
        $modelNew->username = $model->username . rand(10, 99) . ".duplicate";
        $modelNew->password = $model->password;
        $modelNew->salt = $model->salt;
        $modelNew->default_group = $model->default_group;
        $modelNew->status_id = $model->status_id;
        $modelNew->superuser = $model->superuser;
        $modelNew->created_date = time();
        $modelNew->created_by = 1;
        $modelNew->save(false);
        foreach ($model->module as $mod) {
            $modelDet = new sUserModule;
            $modelDet->s_user_id = $modelNew->id;
            $modelDet->s_module_id = $mod->s_module_id;
            $modelDet->s_matrix_id = $mod->s_matrix_id;
            $modelDet->favourite_id = $mod->favourite_id;
            $modelDet->save(false);
        }
        foreach ($model->group as $grp) {
            $modelGrp = new sUserGroup;
            $modelGrp->parent_id = $modelNew->id;
            $modelGrp->organization_root_id = $grp->organization_root_id;
            $modelGrp->save(false);
        }
        foreach ($model->right as $rgt) {
            $modelRgt = new sAuthassignment;
            $modelRgt->userid = $modelNew->id;
            $modelRgt->itemname = $rgt->itemname;
            $modelRgt->data = $rgt->data;
            $modelRgt->save(false);
        }
        $this->redirect(array('update', 'id' => $modelNew->id));
    }
    public function actionSso($id) {
        if (isset($_POST['sUser'])) {
            $personid = $_POST['sUser']['sso_id'];
            gPerson::model()->updateAll(array('userid' => null), 'userid = ' . $id);
            gPerson::model()->updateByPk((int) $personid, array('userid' => $id));
        }
        $this->actionView($id);
    }
    public function actionViewAuthenticated($id) {
        if (Yii::app()->user->name != "admin")
            $this->layout = '//layouts/column1';
        $this->render('viewAuthenticated', array(
            'model' => $this->loadModel($id),
        ));
    }
    public function actionViewSelf($id) {
        if (!is_dir(Yii::getPathOfAlias('webroot.sharedocs.personaldocuments') . '/' . Yii::app()->user->name))
            mkdir(Yii::getPathOfAlias('webroot.sharedocs.personaldocuments') . '/' . Yii::app()->user->name);
        if (Yii::app()->user->name != "admin") {
            $this->layout = '//layouts/column1';
        }
        else
            $this->layout = '//layouts/column2';
        $this->render('viewSelf', array(
            'model' => $this->loadModelSelf($id),
        ));
    }
    public function actionUpdatePasswordAuthenticated($id) {
        //if (Yii::app()->user->name !="admin")
        $this->layout = '//layouts/column1';
        $model = $this->loadModelSelf($id);
        $model->setScenario('passwordupdate');
        // $this->performAjaxValidation($model);
        if (isset($_POST['sUser'])) {
            $model->attributes = $_POST['sUser'];
            if ($model->validate()) {
                //$_mysalt=sUser::model()->generateSalt();
                //$_password = md5($_mysalt . $model->password);
                //sUser::model()->updateByPk((int)$id,array('password'=>$_password,'salt'=>$_mysalt,'hash_type'=>'md5'));
                $_mysalt = sUser::blowfishSalt();
                $_password = crypt($model->password, $_mysalt);
                sUser::model()->updateByPk((int) $id, array('password' => $_password, 'salt' => $_mysalt, 'hash_type' => 'crypt'));
                Yii::app()->user->setFlash('success', '<strong>Great!</strong> your password has been updated successfully...');
                $this->redirect(array('viewAuthenticated', 'id' => $model->id));
            }
        }
        $model->password = null;
        $model->password_repeat = null;
        $this->render('updatePassword', array(
            'model' => $model,
        ));
    }
    public function actionCreate() {
        $model = new sUser;
        $model->setScenario('defaultgroup');
        //$this->performAjaxValidation($model);
        if (isset($_POST['sUser'])) {
            $model->attributes = $_POST['sUser'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', '<strong>Great!</strong> data has been saved successfully');
                $this->redirect(array('view', 'id' => $model->id));
            }
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }
    public function newUserModule($id) {
        $model = new sUserModule();
        if (isset($_POST['sUserModule'])) {
            $model->attributes = $_POST['sUserModule'];
            if (is_array(@$_POST['sUserModule']['s_module_id'])) {
                foreach ($_POST['sUserModule']['s_module_id'] as $item) {
                    $model = new sUserModule();
                    $model->s_user_id = $id;
                    $model->s_module_id = $item;
                    $model->s_matrix_id = $_POST['sUserModule']['s_matrix_id'];
                    $model->save();
                }
                $this->refresh();
            }
        }
        return $model;
    }
    public function actionNewUserModuleAjax() {
        $model = new sUserModule();
        echo @$_POST['sUserModule']['s_module_id'];
        die;
        $model->attributes = $_POST['sUserModule'];
        if (is_array(@$_POST['sUserModule']['s_module_id'])) {
            foreach ($_POST['sUserModule']['s_module_id'] as $item) {
                $model1 = new sUserModule();
                $model1->s_user_id = 317;
                $model1->s_module_id = $item;
                $model1->s_matrix_id = $_POST['sUserModule']['s_matrix_id'];
                $model1->save();
            }
            //$this->refresh();
            //return;
        }
    }
    public function newUserGroup($id) {
        $model = new sUserGroup();
        if (isset($_POST['sUserGroup'])) {
            $model->attributes = $_POST['sUserGroup'];
            $model->parent_id = $id;
            $model->save();
            //$this->refresh();
            $this->redirect(array('view', 'id' => $id, '#' => 'yw3_tab_2'));
        }
        return $model;
    }
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $model->setScenario('defaultgroup');
        // $this->performAjaxValidation($model);
        if (isset($_POST['sUser'])) {
            $model->attributes = $_POST['sUser'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', '<strong>Great!</strong> data has been saved successfully');
                $this->redirect(array('view', 'id' => $model->id));
            }
        }
        $model->default_group_name = aOrganization::model()->findByPk((int) $model->default_group)->name;
        $this->render('update', array(
            'model' => $model,
        ));
    }
    public function actionUpdatePassword($id) {
        $model = $this->loadModel($id);
        $model->setScenario('passwordupdate');
        // $this->performAjaxValidation($model);
        if (isset($_POST['sUser'])) {
            $model->attributes = $_POST['sUser'];
            if ($model->validate()) {
                $_mysalt = sUser::blowfishSalt();
                $_password = crypt($model->password, $_mysalt);
                sUser::model()->updateByPk((int) $id, array('password' => $_password, 'salt' => $_mysalt, 'hash_type' => 'crypt'));
                Yii::app()->user->setFlash('success', '<strong>Great!</strong> data has been saved successfully');
                $this->redirect(array('view', 'id' => $model->id));
            }
        }
        $this->render('updatePassword', array(
            'model' => $model,
        ));
    }
    public function actionDelete($id) {
        $model = $this->loadModel($id)->delete();
        Yii::app()->user->setFlash('success', '<strong>Great!</strong> user has been deleted successfully');
        $this->redirect(array('/sUser'));
    }
    public function actionDeleteModule($id) {
        $command = Yii::app()->db->createCommand('delete from s_user_module where id = :id');
        $command->bindParam(":id", $id, PDO::PARAM_STR);
        $command->execute();
    }
    /**
     * Lists all models.
     */
    public function actionIndex() {
        $model = new sUser('search');
        $model->unsetAttributes();
        $criteria = new CDbCriteria;
        if (isset($_GET['sUser'])) {
            $model->attributes = $_GET['sUser'];
            $criteria1 = new CDbCriteria;
            $criteria1->with = array('groupList');
            $criteria1->together = true;
            $criteria1->compare('groupList.name', $_GET['sUser']['username'], true, 'OR');
            $criteria1->compare('username', $_GET['sUser']['username'], true, 'OR');
            $criteria->mergeWith($criteria1);
        }
        if (isset($_GET['pid'])) {
            $model->unsetAttributes();
            $criteria2 = new CDbCriteria;
            $criteria2->with = array('groupList');
            $criteria2->together = true;
            $criteria2->compare('groupList.id', $_GET['pid'], true, 'OR');
            $criteria2->compare('default_group', $_GET['pid'], true, 'OR');
            $criteria->mergeWith($criteria2);
        }
        //$criteria->order='last_login DESC';
        $dataProvider = new CActiveDataProvider('sUser', array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 't.created_date DESC'
            )
        ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
    }
    public function actionToggleStatus($id) {
        $model = $this->loadModel($id);
        if ($model->status_id == 1) {
            $model->status_id = 2;
            $model->save(false);
        } else {
            $model->status_id = 1;
            $model->save(false);
        }
        //Yii::app()->user->setFlash('success','<strong>Great!</strong> user has been deleted successfully');
        $this->redirect(array('view', 'id' => $model->id));
    }
    public function loadModel($id) {
        if (Yii::app()->user->name !== "admin") {
            $model = sUser::model()->findByPk((int) $id, 'username <> "admin"');
        }
        else
            $model = sUser::model()->findByPk((int) $id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    public function loadModelSelf($id) {
        $model = sUser::model()->findByPk((int) $id, array('condition' => 'id = ' . Yii::app()->user->id));
        //$model=sUser::model()->findByPk((int)$id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-module-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    public function loadModelUserModule($id) {
        $model = sUsersModule::model()->findByPk((int) $id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    public function loadModelUserGroup($id) {
        $model = sUserGroup::model()->findByPk((int) $id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    public function loadModelUserNotification($id) {
        $model = sNotificationGroupMember::model()->findByPk((int) $id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    public function actionDeleteGroup($id) {
        $_mid = $this->loadModelUserGroup($id)->parent_id;
        $this->loadModelUserGroup($id)->delete();
        $this->redirect(array('view', 'id' => $_mid));
    }
    public function actionDeleteNotificationGroup($id) {
        $this->loadModelUserNotification($id)->delete();
    }
    public function actionUserAutoComplete() {
        $res = array();
        if (isset($_GET['term'])) {
            $qtxt = "SELECT username as label, id FROM s_user WHERE username LIKE :name ORDER BY username LIMIT 20";
            $command = Yii::app()->db->createCommand($qtxt);
            $command->bindValue(":name", '%' . $_GET['term'] . '%', PDO::PARAM_STR);
            $res = $command->queryAll();
        }
        echo CJSON::encode($res);
    }
}
