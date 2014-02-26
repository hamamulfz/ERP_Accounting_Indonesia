<?php
class sCompanyNewsAdminController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'rights', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }
    public function actions() {
        return array(
            'compressor' => array(
                'class' => 'ext.tinymce.TinyMceCompressorAction',
                'settings' => array(
                    'compress' => true,
                    'disk_cache' => true,
                )
            ),
            'spellchecker' => array(
                'class' => 'ext.tinymce.TinyMceSpellcheckerAction',
            ),
        );
    }
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        if (Yii::app()->user->isGuest) {
            $this->layout = '//layouts/mainGuest';
        }
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new sCompanyNews;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['sCompanyNews'])) {
            $model->attributes = $_POST['sCompanyNews'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }
        if (!isset($model->content))
        	$model->content="::<i>write or paste your article here::</i>";
        	
        $this->render('create', array(
            'model' => $model,
        ));
    }
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['sCompanyNews'])) {
            $model->attributes = $_POST['sCompanyNews'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }
        $this->render('update', array(
            'model' => $model,
        ));
    }
    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
    /**
     * Lists all models.
     */
    public function actionIndex() {
        $model = new sCompanyNews('search');
        if (isset($_GET['sCompanyNews']))
            $model->attributes = $_GET['sCompanyNews'];
        $this->render('index', array(
            'model' => $model,
        ));
    }
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = sCompanyNews::model()->findByPk($id,array('condition'=>'category_id !=8'));
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'scompany-news-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    public function actionCategory() {
        $category = $this->newCategory();
        $model = new sParameterNews('search');
        $model->unsetAttributes();
        if (isset($_GET['sParameterNews']))
            $model->attributes = $_GET['sParameterNews'];
        $this->render('category', array(
            'model' => $model,
            'modelcategory' => $category,
        ));
    }
    public function newCategory() {
        $model = new sParameterNews;
        // $this->performAjaxValidation($model);
        if (isset($_POST['sParameterNews'])) {
            $model->attributes = $_POST['sParameterNews'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', '<strong>Great!</strong> data has been saved successfully');
                $this->redirect(array('/sCompanyNewsAdmin/category'));
            }
        }
        return $model;
    }
    public function actionUpdateCategory($id) {
        $model = $this->loadModelCategory($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['sParameterNews'])) {
            $model->attributes = $_POST['sParameterNews'];
            if ($model->save())
            //$this->redirect(array('view','id'=>$model->id));
                EQuickDlgs::checkDialogJsScript();
        }
        EQuickDlgs::render('_formCategory', array('model' => $model));
    }
    public function actionDeleteCategory($id) {
        $this->loadModelCategory($id)->delete();
    }
    public function loadModelCategory($id) {
        $model = sParameterNews::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
}
