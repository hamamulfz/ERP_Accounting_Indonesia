<?php

class GTalentController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /*
      public function filters()
      {
      return array(
      'accessControl', // perform access control for CRUD operations
      'ajaxOnly + PersonAutoComplete',
      array(
      'COutputCache +index',
      // will expire in a year
      'duration'=>24*3600*365,
      'dependency'=>array(
      'class'=>'CChainedCacheDependency',
      'dependencies'=>array(
      new CGlobalStateCacheDependency('gperson'),
      new CDbCacheDependency('SELECT id FROM g_person
      ORDER BY id DESC LIMIT 1'),
      ),
      ),
      ),
      );
      }
     */

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'rights',
            'ajaxOnly + PersonAutoComplete',
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id,$year=0) {
    
    	if ($year == 0) $year = date('Y');

	    $this->layout = '//layouts/column1';

        $model = $this->loadModel($id);
        $modelPerformanceP = $this->newPerformanceP($id);
        $modelPerformanceR = $this->newPerformanceR($id);
        $modelPotential = $this->newPotential($id);
        $modelTargetSetting = $this->newTargetSetting($id);
        $modelCoreCompetency = $this->newCoreCompetency($id);
        $modelLeadershipCompetency = $this->newLeadershipCompetency($id);
        $modelWorkResult = $this->newWorkResult($id);

        $this->render('view', array(
            'model' => $model,
            'modelPerformanceP' => $modelPerformanceP,
            'modelPerformanceR' => $modelPerformanceR,
            'modelPotential' => $modelPotential,
            'modelTargetSetting' => $modelTargetSetting,
            'modelCoreCompetency' => $modelCoreCompetency,
            'modelLeadershipCompetency' => $modelLeadershipCompetency,
            'modelWorkResult' => $modelWorkResult,
            'year' => $year,
        ));
    }

/**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function newPerformanceP($id) {
        $model = new fPerformance;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['fPerformance'])) {
            $model->attributes = $_POST['fPerformance'];
            $model->parent_id = $id;
            if ($model->save())
                $this->redirect(array('view', 'id' => $id));
        }

        return $model;
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function newPerformanceR($id) {
        $model = new gTalentPerformance;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['gTalentPerformance'])) {
            $model->attributes = $_POST['gTalentPerformance'];
            $model->parent_id = $id;
            //$model->pa_value = strtoupper($model->pa_value);
            if ($model->save())
                $this->redirect(array('view', 'id' => $id));
        }

        return $model;
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function newPotential($id) {
        $model = new gTalentPotential;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['gTalentPotential'])) {
            $model->attributes = $_POST['gTalentPotential'];
            $model->parent_id = $id;
            if ($model->save())
                $this->redirect(array('view', 'id' => $id));
        }

        return $model;
    }

    public function newTargetSetting($id) {
        $model = new gTalentTargetSetting;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['gTalentTargetSetting'])) {
            $model->attributes = $_POST['gTalentTargetSetting'];
            $model->year = date('Y');
            $model->parent_id = $id;
            if ($model->save())
                $this->redirect(array('view', 'id' => $id, 'tab' => 'Work Result'));
        }

        return $model;
    }

    public function newCoreCompetency($id) {
        $model = new gTalentCoreCompetency;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['gTalentCoreCompetency'])) {
            $model->attributes = $_POST['gTalentCoreCompetency'];
            $model->parent_id = $id;
            if ($model->save())
                $this->redirect(array('view', 'id' => $id, 'tab' => 'Core Competency'));
        }

        return $model;
    }

    public function newLeadershipCompetency($id) {
        $model = new gTalentLeadershipCompetency;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['gTalentLeadershipCompetency'])) {
            $model->attributes = $_POST['gTalentLeadershipCompetency'];
            $model->parent_id = $id;
            if ($model->save())
                $this->redirect(array('view', 'id' => $id));
        }

        return $model;
    }

    public function newWorkResult($id) {
        $model = new gTalentWorkResult;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['gTalentWorkResult'])) {
            $model->attributes = $_POST['gTalentWorkResult'];
            $model->parent_id = $id;
            if ($model->save())
                $this->redirect(array('view', 'id' => $id));
        }

        return $model;
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdatePerformance($id) {
        $model = $this->loadModelPerformance($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['gTalentPerformance'])) {
            $model->attributes = $_POST['gTalentPerformance'];
            if ($model->save())
                EQuickDlgs::checkDialogJsScript();
        }

        EQuickDlgs::render('_formFinalRating', array('model' => $model));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdatePotential($id) {
        $model = $this->loadModelPotential($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['gTalentPotential'])) {
            $model->attributes = $_POST['gTalentPotential'];
            if ($model->save())
                EQuickDlgs::checkDialogJsScript();
        }

        EQuickDlgs::render('_formPotential', array('model' => $model));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDeletePerformance($id) {
        $this->loadModelPerformance($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionUpdateTargetSetting($id) {
        $model = $this->loadModelTargetSetting($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['gTalentTargetSetting'])) {
            $model->attributes = $_POST['gTalentTargetSetting'];
            if ($model->save())
                EQuickDlgs::checkDialogJsScript();
        }

        EQuickDlgs::render('_formTargetSetting', array('model' => $model));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDeletePotential($id) {
        $this->loadModelPotential($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }


    public function actionDeleteTargetSetting($id) {
        $this->loadModelTargetSetting($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }


    public function actionUpdateTargetAjax() {
		Yii::import('ext.bootstrap.widgets.TbEditableSaver'); //or you can add import 'ext.editable.*' to config
		$es = new TbEditableSaver('gTalentTargetSetting');  // 'User' is classname of model to be updated
		$es->update();
    }

    public function actionUpdateCoreCompetencyAjax() {
		Yii::import('ext.bootstrap.widgets.TbEditableSaver'); //or you can add import 'ext.editable.*' to config
		$es = new TbEditableSaver('gTalentCoreCompetency');  // 'User' is classname of model to be updated
		$es->update();
    }

    public function actionUpdateLeadershipCompetencyAjax() {
		Yii::import('ext.bootstrap.widgets.TbEditableSaver'); //or you can add import 'ext.editable.*' to config
		$es = new TbEditableSaver('gTalentLeadershipCompetency');  // 'User' is classname of model to be updated
		$es->update();
    }

    public function actionUpdateWorkResultAjax() {
		Yii::import('ext.bootstrap.widgets.TbEditableSaver'); //or you can add import 'ext.editable.*' to config
		$es = new TbEditableSaver('gTalentWorkResult');  // 'User' is classname of model to be updated
		$es->update();
    }

    public function actionDeleteCoreCompetency($id) {
        $this->loadModelCoreCompetency($id)->delete();
        
        return true;
    }

    public function actionDeleteLeadershipCompetency($id) {
        $this->loadModelLeadershipCompetency($id)->delete();
        return true;
    }

    public function actionDeleteWorkResult($id) {
        $this->loadModelWorkResult($id)->delete();
        
        return true;
    }

	public function actionGenerateWorkResult($id)
	{
		$command=Yii::app()->db->createCommand('
			INSERT INTO g_talent_work_result
			 (parent_id, year, talent_template_id) VALUES 
			 ('. $id .', '.date("Y").', 11),
			 ('. $id .', '.date("Y").', 12),
			 ('. $id .', '.date("Y").', 13),
			 ('. $id .', '.date("Y").', 16),
			 ('. $id .', '.date("Y").', 17)
		');
		$command->execute(); 
		
		$this->redirect(array('/m1/gTalent/view','id'=>$id, 'tab' => 'Work Result'));
	}

	public function actionGenerateCoreCompetency($id)
	{
		$command=Yii::app()->db->createCommand('
			INSERT INTO g_talent_core_competency
			 (parent_id, year, talent_template_id) VALUES 
			 ('. $id .', '.date("Y").', 1),
			 ('. $id .', '.date("Y").', 2),
			 ('. $id .', '.date("Y").', 3),
			 ('. $id .', '.date("Y").', 4),
			 ('. $id .', '.date("Y").', 5)
		');
		$command->execute(); 
		
		$this->redirect(array('/m1/gTalent/view','id'=>$id, 'tab' => 'Core Competency'));
	}

	public function actionGenerateLeadershipCompetency($id)
	{
		$command=Yii::app()->db->createCommand('
			INSERT INTO g_talent_leadership_competency
			 (parent_id, year, talent_template_id) VALUES 
			 ('. $id .', '.date("Y").', 6),
			 ('. $id .', '.date("Y").', 7),
			 ('. $id .', '.date("Y").', 8),
			 ('. $id .', '.date("Y").', 9),
			 ('. $id .', '.date("Y").', 10)
		');
		$command->execute(); 
		
		$this->redirect(array('/m1/gTalent/view','id'=>$id, 'tab' => 'Leadership Compentency'));
	}

    public function actionIndex() {
        $model = new gPerson('search');
        $model->unsetAttributes();

        $criteria = new CDbCriteria;
        $criteria1 = new CDbCriteria;

        if (Yii::app()->user->name != "admin") {
            $criteria->with = array('company');
            $criteria->addInCondition('company.company_id', sUser::model()->myGroupArray);
        }

        if (isset($_GET['gPerson'])) {
            $model->attributes = $_GET['gPerson'];

            $criteria1->compare('employee_name', $_GET['gPerson']['employee_name'], true, 'OR');
            //$criteria1->compare('address1',$_GET['gPerson']['address1'],true,'OR');
        }

        $criteria->order = 't.updated_date DESC';

        $criteria->mergeWith($criteria1);

        $dataProvider = new CActiveDataProvider('gPerson', array(
            'criteria' => $criteria,
                )
        );

        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $criteria = new CDbCriteria;

        if (Yii::app()->user->name != "admin") {
            $criteria->condition = '(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' .
                    implode(',', Yii::app()->getModule("m1")->PARAM_COMPANY_ARRAY) .
                    ') ORDER BY c.start_date DESC LIMIT 1) IN (' .
                    implode(",", sUser::model()->myGroupArray) . ') OR ' .
                    '(select c2.company_id from g_person_career2 c2 WHERE t.id=c2.parent_id AND c2.company_id IN (' .
                    implode(",", sUser::model()->myGroupArray) . ') ORDER BY c2.start_date DESC LIMIT 1) IN (' .
                    implode(",", sUser::model()->myGroupArray) . ')';
        }

        $model = gPerson::model()->findByPk((int) $id, $criteria);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModelPerformance($id) {
        $model = gTalentPerformance::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModelPotential($id) {
        $model = gTalentPotential::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

	public function loadModelTargetSetting($id)
	{
		$model=gTalentTargetSetting::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelCoreCompetency($id)
	{
		$model=gTalentCoreCompetency::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelLeadershipCompetency($id)
	{
		$model=gTalentLeadershipCompetency::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelWorkResult($id)
	{
		$model=gTalentWorkResult::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'g-person-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionPrintProfile($id) {
        $pdf = new profile('P', 'mm', 'A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);

        //$model=gPerson::model()->findByPk((int)$id);
        $pdf->report($id);

        $pdf->Output();
    }

    public function actionApproved($id) {
        $model = $this->loadModelTargetSetting($id);
        
        $model->validate_id = 2; //approved
        $model->save();
        
        return true;

    }


}
