<?php
class SModuleController extends Controller {
    public $layout = '//layouts/column2';
    public function filters() {
        return array(
            'rights',
        );
    }
    public function actionView($id) {
        $modelUserModule = new sUserModule;
        if (isset($_POST['sUserModule'])) {
            $modelUserModule->attributes = $_POST['sUserModule'];
            $modelUserModule->s_module_id = $id;
            $modelUserModule->save(false);
            $this->refresh();
        }
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'modelUserModule' => $modelUserModule,
        ));
    }
    public function newModule() {
        $model = new sModule;
        // $this->performAjaxValidation($model);
        if (isset($_POST['sModule'])) {
            $model->attributes = $_POST['sModule'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', '<strong>Great!</strong> data has been saved successfully');
                $this->redirect(array('/sModule'));
            }
        }
        return $model;
    }
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        // $this->performAjaxValidation($model);
        if (isset($_POST['sModule'])) {
            $model->attributes = $_POST['sModule'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', '<strong>Great!</strong> data has been saved successfully');
                //$this->redirect(array('view','id'=>$model->id));
                EQuickDlgs::checkDialogJsScript();
            }
        }
        EQuickDlgs::render('_form', array('model' => $model));
        //$this->render('update',array(
        //		'model'=>$model,
        //));
    }
    public function actionDelete($id) {
        $this->loadModel($id)->delete();
    }
    public function actionDeleteUserModule($id) {
        $this->loadModelUserModule($id)->delete();
        //$this->redirect(array('admin'));
    }
    public function actionIndex() {
        $this->layout = "//layouts/main";
        $module = $this->newModule();
        $model = new sModule('search');
        $model->unsetAttributes();
        if (isset($_GET['sModule']))
            $model->attributes = $_GET['sModule'];
        $this->render('index', array(
            'model' => $model,
            'modelmodule' => $module,
        ));
    }
    public function loadModel($id) {
        $model = sModule::model()->findByPk((int) $id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    public function loadModelUserModule($id) {
        $model = sUserModule::model()->findByPk((int) $id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'module-module-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    public function actionAjaxFillTree() {
        if (!Yii::app()->request->isAjaxRequest) {
            exit();
        }
        $parentId = 0;
        if (isset($_GET['root']) && $_GET['root'] !== 'source') {
            $parentId = (int) $_GET['root'];
        }
        $req = Yii::app()->db->createCommand(
                "SELECT m1.id, m1.title AS text, m2.id IS NOT NULL AS hasChildren "
                . "FROM s_module AS m1 LEFT JOIN s_module AS m2 ON m1.id=m2.parent_id "
                . "WHERE m1.parent_id <=> $parentId "
                . "GROUP BY m1.id ORDER BY m1.sort ASC"
        );
        $children = $req->queryAll();
        $treedata = array();
        foreach ($children as $child) {
            $options = array('href' => Yii::app()->createUrl('sModule/view', array('id' => $child['id'])), 'id' => $child['id'], 'class' => 'treenode');
            $nodeText = CHtml::openTag('a', $options);
            $nodeText.= $child['text'];
            $nodeText.= CHtml::closeTag('a') . "\n";
            $child['text'] = $nodeText;
            $treedata[] = $child;
        }
        //$children = $this->createLinks($children);
        echo str_replace(
                '"hasChildren":"0"', '"hasChildren":false',
                //CTreeView::saveDataAsJson($children)
                CTreeView::saveDataAsJson($treedata)
        );
        exit();
    }
    public function actionUpdateAjax() {
        $model->attributes = $_POST;
        $model = $this->loadModel($_POST['pk']);
        $model->$_POST['name'] = $_POST['value'];
        if ($model->save()) {
            return true;
        }
        else
            return false;
    }
}
