<?php
class SSqlStatementController extends Controller {
    public $layout = '//layouts/column1';
    public function filters() {
        return array(
            'rights',
        );
    }
    public function actionIndex() {
        $model = new fSqlStatement;
        if (isset($_POST['fSqlStatement'])) {
            $model->attributes = $_POST['fSqlStatement'];
            if ($model->validate()) {
                $commandD = Yii::app()->db->createCommand($model->sql);
                $commandD->execute();
                Yii::app()->user->setFlash('success', 'SQL statement has been executed');
                $this->refresh();
            }
        }
        $this->render('/sParameter/sqlstatement', array('model' => $model));
    }
}
