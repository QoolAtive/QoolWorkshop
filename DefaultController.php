<?php

class DefaultController extends Controller {

    public $layout = "//layouts/main_tab_4";
    
    public function actionIndex() {
        
        // set State for tab
        Yii::app()->user->setState('layouts', 'main_tab_4');
        
        $personnel_id = Yii::app()->user->getState('personnel_id');
        
        // find table eva_user_group 
        $eva_user_group = EvaUserGroup::model()->find("personnel_id = '$personnel_id'");        
        
        // find agencies manage from upis 
        $agencies_manage_id = NULL;
        $sql = "SELECT *
                FROM `LastDutyManage` 
                WHERE personnel_id = '$personnel_id'"; 
        $command = Yii::app()->db_upis->createCommand($sql);
        $qry = $command->query();
        if (count($qry) > 0) {
            foreach ($qry as $q) {
                $agencies_manage_id = $q['agencies_id'];
            }
        }
        
        $pesonnel_data_manage = new SearchPersonnel();
        
        if($eva_user_group->type_user_group == '3'){            
            $this->redirect('/BossAssess/default/bossMedium/agencies_part_id/'.$agencies_manage_id);
            exit();
        }else if($eva_user_group->type_user_group == '4'){
            $this->redirect('/BossAssess/default/bossHigh');
            exit();
        }
        
        // check user is boss ??
        if(($eva_user_group->type_user_group == '2') || ($eva_user_group->type_user_group == '3') || ($eva_user_group->type_user_group == '4')){ 
            $is_boss = true;
        }else{
            $is_boss = false;
        }
        
        // หาเงินโค้วต้า 
        $date_now = date('Y-m-d');
        $budget_gov = ManageBudget::model()->find("`date_start`<='$date_now' AND `date_end`>='$date_now' AND `agenices_id` = '$agencies_manage_id'");
        if($budget_gov->budget_gov != NULL){
            $total_budget_gov = $budget_gov->budget_gov;            
        }else{
            $total_budget_gov = 0;
        }   
        
        $budget_emp = ManageBudget::model()->find("`date_start`<='$date_now' AND `date_end`>='$date_now' AND `agenices_id` = '$agencies_manage_id'");
        if($budget_emp->budget_emp != NULL){
            $total_budget_emp = $budget_emp->budget_emp;
        }else{
            $total_budget_emp = 0;            
        }
        
        $this->render('index', array(
            'dataProvider' => $pesonnel_data_manage->GetPersonnelManage($agencies_manage_id, $personnel_id),
            'agencies_manage_id' => $agencies_manage_id,
            'is_boss' => $is_boss,
            'total_budget_gov' => $total_budget_gov,
            'total_budget_emp' => $total_budget_emp,
        ));
    }
    
    public function actionBossMedium($agencies_part_id, $is_high = false) {
        $personnel_id = Yii::app()->user->getState('personnel_id');
        
        // find agencies manage from upis 
        $agencies_manage_id = NULL;
        $sql = "SELECT *
                FROM `Agencies` 
                WHERE agencies_part_id = '$agencies_part_id' AND parent_id = '0' AND `order` <> 0 AND is_external <> 1 AND name_th <> 'มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ'
                ORDER BY `order`"; 
        $command = Yii::app()->db_upis->createCommand($sql);
        $qry = $command->query();
        if (count($qry) > 0) {
            foreach ($qry as $q) {
                $list_agencies[$q['id']] = $q['name_th'];
            }
        }
        
        // find table eva_user_group 
        $eva_user_group = EvaUserGroup::model()->find("personnel_id = '$personnel_id'"); 
        
        if($eva_user_group->type_user_group == '4'){
            $is_high = true;
        }
        
        // หาเงินโค้วต้า ส่วนงาน
        $date_now = date('Y-m-d');
        $budget_gov = ManageBudget::model()->findBySql("SELECT SUM(`budget_gov`) AS budget_gov FROM `manage_budget` WHERE `date_start`<='$date_now' AND `date_end`>='$date_now' AND `agenices_part_id` = '$agencies_part_id'");
        if($budget_gov->budget_gov != NULL){
            $total_budget_gov = $budget_gov->budget_gov;            
        }else{
            $total_budget_gov = 0;
        }   
        
        $budget_emp = ManageBudget::model()->findBySql("SELECT SUM(`budget_emp`) AS budget_emp FROM `manage_budget` WHERE `date_start`<='$date_now' AND `date_end`>='$date_now' AND `agenices_part_id` = '$agencies_part_id'");
        if($budget_emp->budget_emp != NULL){
            $total_budget_emp = $budget_emp->budget_emp;
        }else{
            $total_budget_emp = 0;            
        } 
        
        $this->render('_boss_medium', array(
            'list_agencies' => $list_agencies,
            'agencies_part_id' => $agencies_part_id,
            'is_high' => $is_high,
            'total_budget_gov' => $total_budget_gov,
            'total_budget_emp' => $total_budget_emp,
        ));
    }
    
    public function actionPersonnelBossMedium($agencies_manage_id) {
        // set State for tab
        Yii::app()->user->setState('layouts', 'main_tab_4');
        
        $personnel_id = Yii::app()->user->getState('personnel_id');
        
        $sql = "SELECT *
                FROM `Agencies` 
                WHERE id = '$agencies_manage_id' AND is_external <> 1
                ORDER BY `order`"; 
        $command = Yii::app()->db_upis->createCommand($sql);
        $qry = $command->query();
        if (count($qry) > 0) {
            foreach ($qry as $q) {
                $agencies_part_id = $q['agencies_part_id'];
            }
        }        
        $pesonnel_data_manage = new SearchPersonnel();   
        
        // หาเงินโค้วต้า 
        $date_now = date('Y-m-d');
        $budget_gov = ManageBudget::model()->find("`date_start`<='$date_now' AND `date_end`>='$date_now' AND `agenices_id` = '$agencies_manage_id'");
        if($budget_gov->budget_gov != NULL){
            $total_budget_gov = $budget_gov->budget_gov;            
        }else{
            $total_budget_gov = 0;
        }   
        
        $budget_emp = ManageBudget::model()->find("`date_start`<='$date_now' AND `date_end`>='$date_now' AND `agenices_id` = '$agencies_manage_id'");
        if($budget_emp->budget_emp != NULL){
            $total_budget_emp = $budget_emp->budget_emp;
        }else{
            $total_budget_emp = 0;            
        }
        
        $this->render('index', array(
            'dataProvider' => $pesonnel_data_manage->GetPersonnelManage($agencies_manage_id, $personnel_id),
            'agencies_manage_id' => $agencies_manage_id,
            'is_boss' => true,
            'agencies_part_id' => $agencies_part_id,  
            'total_budget_gov' => $total_budget_gov,
            'total_budget_emp' => $total_budget_emp,
        ));
    }
    
    public function actionBossHigh() {
        // find agencies manage from upis 
        $agencies_manage_id = NULL;
        $sql = "SELECT *
                FROM `Agencies` 
                WHERE agencies_part_id = '0' AND parent_id = '0' AND `order` <> 0 AND is_external <> 1 AND name_th <> 'มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ'
                ORDER BY `order`"; 
        $command = Yii::app()->db_upis->createCommand($sql);
        $qry = $command->query();
        if (count($qry) > 0) {
            foreach ($qry as $q) {
                $list_agencies[$q['id']] = $q['name_th'];
            }
        }
        
        // หาเงินโค้วต้า ของทั้งมหาวิทยาลัย
        $date_now = date('Y-m-d');
        $budget_gov = ManageBudget::model()->findBySql("SELECT SUM(`budget_gov`) AS budget_gov FROM `manage_budget` WHERE `date_start`<='$date_now' AND `date_end`>='$date_now' AND `agenices_part_id` IS NULL");
        if($budget_gov->budget_gov != NULL){
            $total_budget_gov = $budget_gov->budget_gov;            
        }else{
            $total_budget_gov = 0;
        }   
        
        $budget_emp = ManageBudget::model()->findBySql("SELECT SUM(`budget_emp`) AS budget_emp FROM `manage_budget` WHERE `date_start`<='$date_now' AND `date_end`>='$date_now' AND `agenices_part_id` IS NULL");
        if($budget_emp->budget_emp != NULL){
            $total_budget_emp = $budget_emp->budget_emp;
        }else{
            $total_budget_emp = 0;            
        } 
        
        $this->render('_boss_high', array(
            'list_agencies' => $list_agencies,
            'total_budget_gov' => $total_budget_gov,
            'total_budget_emp' => $total_budget_emp,
        ));
        echo "Qoolative";
echo "Qoolative";
echo "Qoolative";echo "Qoolative";
echo "Qoolative";
echo "Qoolative";echo "Qoolative";
echo "Qoolative";
echo "Qoolative";echo "Qoolative";
echo "Qoolative";
echo "Qoolative";echo "Qoolative";
echo "Qoolative";
echo "Qoolative";
    }

}
