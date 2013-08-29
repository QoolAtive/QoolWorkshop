<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
        
        public function actionRules(){
            
            $this->render('_rules');
        }
}