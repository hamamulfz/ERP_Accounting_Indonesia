<?php

class GBiPersonController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column1';

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
        );
    }

    private function sanitize($string = '', $is_filename = FALSE) {
        // Replace all weird characters with dashes
        $string = preg_replace('/[^\w\-' . ($is_filename ? '~_\.' : '') . ']+/u', '-', $string);

        // Only allow one dash separator at a time (and make string lowercase)
        return mb_strtolower(preg_replace('/--+/u', '-', $string), 'UTF-8');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $model = new fBusinessIntellegence;
        $dataProvider = array();
        $fieldresult = array();
        $production = "";
        $sql = "";

        if (isset($_POST['field'])) {
            $model->field = $_POST['field'];
            $model->group = $_POST['group'];
            $model->fieldfilter = $_POST['fieldfilter'];
            $model->expression = $_POST['expression'];
            $model->value = $_POST['value'];
            $model->limit = $_POST['fBusinessIntellegence']['limit'];

            //SELECT
            foreach ($_POST['field'] as $key => $mgroup) {
                if ($_POST['group'][$key] == null || $_POST['group'][$key] == 'GROUP BY') {
                    $fieldarray[] = $_POST['field'][$key];
                }
                else
                    $matharray[] = $_POST['group'][$key] . "(" . $_POST['field'][$key] . ") as " . $_POST['field'][$key];
            }

            $field = implode(",", $fieldarray);
            //$group=" GROUP BY ".implode(",",$fieldarray);
            $group = "";
            //$filter= "";

            if (isset($matharray)) {
                $math = implode(",", $matharray);
                $field = $math . "," . $field;
                $sql = 'SELECT min(id) as id, c_pathfoto, ' . $field . ' FROM g_bi_person ';
            }
            else
                $sql = 'SELECT id, c_pathfoto, ' . $field . ' FROM g_bi_person ';


            //FILTER
            if ($_POST['value'][0] != null) {
                foreach ($_POST['value'] as $key => $mfilter)
                    if ($_POST['expression'][$key] != null || $_POST['value'][$key] != null) {
                        $filterserial[] = $_POST['fieldfilter'][$key] . ' ' . $_POST['expression'][$key] . ' "' . $_POST['value'][$key] . '" ';
                    }

                $filter = implode(" AND ", $filterserial);
            }

            if (!$_POST['fBusinessIntellegence']['plusResign'])
                if (isset($filter)) {
                    $filter = $filter . ' AND employee_status NOT IN ("Resign","Termination","End Of Contract","Unpaid Leave","Black List") ';
                }
                else
                    $filter = ' employee_status NOT IN ("Resign","Termination","End Of Contract","Unpaid Leave","Black List") ';

            //Filter By Company
            if (isset($filter)) {
                $filter = $filter . ' AND company_id IN (' . implode(",", sUser::model()->myGroupArray) . ')';
            }
            else
                $filter = 'company_id IN (' . implode(",", sUser::model()->myGroupArray) . ')';


            if (isset($filter)) {
                $sql = $sql . ' WHERE ' . $filter . $group . ' LIMIT ' . $_POST['fBusinessIntellegence']['limit'];
            }
            else
                $sql = $sql . ' ' . $group . ' LIMIT ' . $_POST['fBusinessIntellegence']['limit'];

            try {
                $rawData = Yii::app()->db->createCommand($sql)->queryAll();
            } catch (Exception $e) {
                throw new CHttpException(404, 'Error Code: 1064. You have an error in your SQL syntax. Press Backspace to return...');
            }

            $dataProvider = new CArrayDataProvider($rawData, array(
                'id' => 'bi_person',
                'pagination' => false,
            ));

            //'columns'=>array(
            //	'start_date',
            //	array(
            //			'header'=>'Status',
            //			'value'=>'isset($data->status->name) ? $data->status->name : ""',
            //	),

            $labels = gBiPerson::model()->attributeLabels();

            foreach ($model->field as $key => $mgroup) {
                $fieldres['header'] = $labels[$mgroup];

                if ($labels[$mgroup] == "Employee Name") {
                    $fieldres['type'] = 'raw';
                    $fieldres['value'] = 'CHtml::link($data["' . $mgroup . '"],Yii::app()->createUrl("/m1/gPerson/view",array("id"=>$data["id"])),array("target"=>"_blank"))';
                } elseif ($labels[$mgroup] == "Education" || $labels[$mgroup] == "Experience") {
                    $fieldres['type'] = 'raw';
                    $fieldres['value'] = '$data["' . $mgroup . '"]';
                }
                else
                    $fieldres['value'] = '$data["' . $mgroup . '"]';

                $fieldresult[] = $fieldres;
            }

            $fieldres['header'] = "Photo";
            $fieldres['type'] = 'raw';
            $fieldres['value'] = '($data["c_pathfoto"] != null) ? CHtml::image(Yii::app()->request->baseUrl . "/shareimages/hr/employee/thumb/" . $data["c_pathfoto"]) : ""';
            $html["width"] = "60px";
            $fieldres['htmlOptions'] = $html;
            $fieldresult[] = $fieldres;


            if ($_POST['fBusinessIntellegence']['export']) {
                $production = 'export';
            } else {
                $production = 'grid';
            }

            /* $this->render('index', array(
              'model' => $model,
              'dataProvider' => $dataProvider,
              'field' => $fieldresult,
              'production' => $production,
              'sql' => $sql,
              )); */

            //Yii::app()->end();
        }

        $this->render('index', array(
            'model' => $model,
            'dataProvider' => $dataProvider,
            'field' => $fieldresult,
            'production' => $production,
            'sql' => $sql,
        ));
    }
    
	public function actionAmbiltrigger($withnull=null)
	{
        if (isset($withnull))
            $_listField['null'] = null;

        $label = gBiPerson::model()->attributeLabels();
        foreach (gBiPerson::model()->tableSchema->columns as $val) {
            $_name['strkey'] = $val->name;
            $_second['strvalue'] = $val->name;
            $_listField[] = array_merge($_name, $_second);
        }
        echo CJSON::encode($_listField);	
	}
	
	public function actionAmbiltipe()
	{
		$Datanya = $_POST['data'];
		
		$sql = "SELECT * FROM tbl_trigger WHERE strkey='".$Datanya."'";
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$dataReader=$command->queryRow();
		echo CJSON::encode($dataReader['id_tipe']);
	}
	
	public function actionAmbiltipe2()
	{
		$Datanya = $_POST['data'];
		
		$sql = "SELECT * FROM tbl_tipe WHERE id='".$Datanya."'";
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$dataReader=$command->queryRow();
		echo CJSON::encode($dataReader['tipe']);
	}
	
	public function actionAmbilID()
	{
		$Datanya = $_POST['data'];
		$sql = "SELECT id_parrent FROM tbl_trigger WHERE strkey='".$Datanya."'";
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$dataReader=$command->queryRow();
		echo CJSON::encode($dataReader['id_parrent']);
	}
	
	public function actionAmbilDetail()
	{
		//$Datanya = $_POST['data'];
		$sql = "SELECT data FROM tbl_detail WHERE id_parrent='1'";
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$dataReader=$command->queryAll();
		echo CJSON::encode($dataReader);
	}
	
	
	
	
	
	
	public function actionProses()
	{
		$Query = "SELECT * from nama_tabel";
		
		$strWhere = "";
		foreach ($_POST['rows'] as $key => $count ){
				$Data1	= $_POST['data1_'.$count];
				$Data2	= $_POST['data2_'.$count];
				$Data3	= $_POST['data3_'.$count];
				/*echo $Data1." >> ".$Data2;
				echo "<br>";*/
				if(trim($strWhere) == ""){
					$strWhere = $Data1 . "".$Data3."'" . $Data2 . "'";
				}else{
					$strWhere .= " AND " . $Data1 . "".$Data3."'" . $Data2 . "'";
				}
		}
		
		echo $Query." WHERE " . $strWhere;
	}
    

}
