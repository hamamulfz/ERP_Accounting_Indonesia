<?php

class ZHelpController extends Controller {

    public $layout = '//layouts/mainHelp';

	//public $breadcrumbs = array(
	//	'Person Help',
	//);

    public function actions() {
        return array(
            'link' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    public function actionIndex() {
        $this->render('index');
    }

}