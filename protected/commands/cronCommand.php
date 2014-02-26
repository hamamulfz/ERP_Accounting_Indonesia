<?php
class cronCommand extends CConsoleCommand {
    public function actionIndex() {
        $connection = Yii::app()->db;
        $sqlRaw = "select * from g_person limit 10";
        $rawData = Yii::app()->db->createCommand($sqlRaw)->queryAll();
        $dataProvider = new CArrayDataProvider($rawData, array());
        foreach ($dataProvider->getData() as $data) {
            $sql = "insert into z_ar_log 
			(description, action, model, idModel, userid) VALUES 
			('" . $data['employee_name'] . "','INSERT','gLeave',1,1)";
            $command = $connection->createCommand($sql)->execute();
        }
    }
    public function actionDeleteUserRegistrationExpire() { //request more than 30 days
        $connection = Yii::app()->db;
        $sqlRaw = "DELETE FROM s_user_registration WHERE status_id = 1 AND registration_date < " . strtotime("-30 day");
        Yii::app()->db->createCommand($sqlRaw)->execute();
        $sqlRaw2 = "DELETE FROM `s_user_registration` WHERE id NOT IN (select id from h_applicant) AND registration_date < " . strtotime("-30 day");
        Yii::app()->db->createCommand($sqlRaw2)->execute();
    }

    public function actionUpdateVacancyApplicantExpire() { //request more than 30 days move to Reference
        $connection = Yii::app()->db;
        $sqlRaw = "UPDATE h_vacancy_applicant SET status_id = 3 where status_id = 1 AND created_date < " . strtotime("-30 day");
        Yii::app()->db->createCommand($sqlRaw)->execute();
    }

    public function actionDeleteNotificationOld() { //Notif more than 360 days or 6 months
        $connection = Yii::app()->db;
        $sqlRaw = "DELETE FROM s_notification WHERE alert_after_date < " . strtotime("-360 day");
        Yii::app()->db->createCommand($sqlRaw)->execute();
    }
    
    public function actionAutoGeneratedLeave() {
        $connection = Yii::app()->db;
	
    	$sqltoday = "select `a`.`id` AS `id`
	    from `g_person` `a`
		where 
        (select	`s`.`status_id` AS `status_id` from `g_person_status` `s` where `s`.`parent_id` = `a`.`id`
            order by `s`.`start_date` desc limit 1) NOT IN (8, 9, 10, 13) AND 

		(select MONTH(`c`.`start_date`) AS `start_date` from `g_person_career` `c`
        where `a`.`id` = `c`.`parent_id` and `c`.`status_id` = 1 order by `c`.`start_date` desc limit 1) = ".date('m')." AND

		(select DAY(`c`.`start_date`) AS `start_date` from `g_person_career` `c`
        where `a`.`id` = `c`.`parent_id` and `c`.`status_id` = 1 order by `c`.`start_date` desc limit 1) = ".date('d');

		$lists = $connection->createCommand($sqltoday)->queryAll();

		foreach ($lists as $list) { 
					
			$sqlPerson = "
				SELECT g.id,g.employee_name, 
				(select l.mass_leave from g_leave l WHERE g.id = l.parent_id AND l.approved_id NOT IN (1,5,6) ORDER BY l.end_date DESC,l.id DESC LIMIT 1) as mass_leave,  
				(select l.person_leave from g_leave l WHERE g.id = l.parent_id AND l.approved_id NOT IN (1,5,6) ORDER BY l.end_date DESC,l.id DESC LIMIT 1) as person_leave,  
				(select l.balance from g_leave l WHERE g.id = l.parent_id AND l.approved_id NOT IN (1,5,6) ORDER BY l.end_date DESC,l.id DESC LIMIT 1) as balance,  
				(select c.start_date from g_person_career c WHERE g.id = c.parent_id AND c.status_id IN (1) ORDER BY c.start_date ASC LIMIT 1) as start_date  
				FROM g_person g 
				WHERE g.id = ".$list['id'];

			$model = $connection->createCommand($sqlPerson)->queryRow();

			if ($model['mass_leave'] <= -1) {
				$mass_leave = $model['mass_leave'];
			} else
				$mass_leave = 0;

			if ($model['person_leave'] <= -1) {
				$private_leave = $model['person_leave'];
			} else
				$private_leave = 0;

			if ($model['balance'] <= -1) {
				$balance = $model['balance'];
			} else
				$balance = 0;

			$new_mass_leave = Yii::app()->params['currentYearMassLeave'] + $mass_leave;
			$new_private_leave = Yii::app()->params['currentYearPrivateLeave'] + $private_leave;
			$new_balance = 12 + $balance;

			$_md = date('Y') . "-" . date("m", strtotime($model['start_date'])) . "-" . date("d", strtotime($model['start_date']));
			$sql = "insert into g_leave 
			(parent_id, input_date, year_leave , number_of_day, start_date , end_date  , leave_reason  , mass_leave, person_leave, balance, remark, approved_id) VALUES 
			(" . $list['id'] . "  ,'" . $_md . "' ,12,12,'" . $_md . "'  ,'" . $_md . "' ,'Auto Generated Leave'," . $new_mass_leave . "," . $new_private_leave . ",
			" . $new_balance . ",'Auto Generated Leave',9)";
			$connection->createCommand($sql)->execute();
		}
			
    }

    public function actionAutoGeneratedChristmasLeave() {
        $connection = Yii::app()->db;
	
    	$sqltoday = 
    	"
    	select * from g_bi_person where company_id = 1100 and employee_status NOT IN ('Resign','End of Contract','Termination','Black List');
    	";

		$lists = $connection->createCommand($sqltoday)->queryAll();

		foreach ($lists as $list) { 
					
				$mass_leave = 0;
				$private_leave = 0;
				$balance = 0;

			$sqlPerson = "
				SELECT g.id,g.employee_name, 
				(select l.mass_leave from g_leave l WHERE g.id = l.parent_id AND l.approved_id NOT IN (1,5,6) ORDER BY l.end_date DESC,l.id DESC LIMIT 1) as mass_leave,  
				(select l.person_leave from g_leave l WHERE g.id = l.parent_id AND l.approved_id NOT IN (1,5,6) ORDER BY l.end_date DESC,l.id DESC LIMIT 1) as person_leave,  
				(select l.balance from g_leave l WHERE g.id = l.parent_id AND l.approved_id NOT IN (1,5,6) ORDER BY l.end_date DESC,l.id DESC LIMIT 1) as balance,  
				(select c.start_date from g_person_career c WHERE g.id = c.parent_id AND c.status_id IN (1) ORDER BY c.start_date ASC LIMIT 1) as start_date  
				FROM g_person g 
				WHERE g.id = ".$list['id'];

			$model = $connection->createCommand($sqlPerson)->queryRow();

			if ($model['mass_leave'] != null && $model['mass_leave'] <= -1) 
				$mass_leave = $model['mass_leave'];

			if ($model['person_leave'] != null && $model['person_leave'] <= -1) 
				$private_leave = $model['person_leave'];

			if ($model['balance']  != null && $model['balance'] <= -1) 
				$balance = $model['balance'];

			$new_mass_leave = $mass_leave - Yii::app()->params['currentYearMassLeaveChristmas'];
			$new_balance = $balance - Yii::app()->params['currentYearMassLeaveChristmas'];

			$sql = "insert into g_leave 
			(parent_id, input_date, start_date, end_date, number_of_day, leave_reason, mass_leave, person_leave, balance, approved_id) VALUES 
			(" . $list['id'] . ",'2013-12-26','2013-12-26',
			'2013-12-31'," . Yii::app()->params['currentYearMassLeaveChristmas'] . ",
			'Cuti Masal Natal 2013'," . $new_mass_leave . "," . $private_leave . "," . $new_balance . ",2)";
			$command = $connection->createCommand($sql)->execute();

		}
			
    }

    public function actionApplicantRating() { 
        $connection = Yii::app()->db;
        //Rate 1. No Email Address Or Invalid Email
        $sqlRaw = "insert ignore into h_applicant_rating (parent_id, user_id, rating)
					select id,1,1 from h_applicant where email is null";

        //Rate 2. Have Email, no Experience or Education
        $sqlRaw = "insert ignore into h_applicant_rating (parent_id, user_id, rating)
					select a.id,1,2 from h_applicant a
					left join h_applicant_education e on a.id = e.parent_id
					left join h_applicant_experience p on a.id = p.parent_id
					 where a.email is not null and (e.level_id is null or p.company_name is null)";

        //Rate 3. Have Email, Experience, Education but no photo
        $sqlRaw = "insert ignore into h_applicant_rating (parent_id, user_id, rating)
					select a.id,1,3 from h_applicant a
					left join h_applicant_education e on a.id = e.parent_id
					left join h_applicant_experience p on a.id = p.parent_id
					 where a.email is not null and e.level_id is not null and p.company_name is not null and c_pathfoto is null";

        //Rate 4. Have Email, Experience, Education and photo
        $sqlRaw = "insert ignore into h_applicant_rating (parent_id, user_id, rating)
					select a.id,1,4 from h_applicant a
					left join h_applicant_education e on a.id = e.parent_id
					left join h_applicant_experience p on a.id = p.parent_id
					 where a.email is not null and e.level_id is not null and p.company_name is not null and c_pathfoto is not null";

        Yii::app()->db->createCommand($sqlRaw)->execute();
    }
    
    
    
}
?>