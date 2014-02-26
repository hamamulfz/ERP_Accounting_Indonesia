<?php

/**
 * This is the model class for table "sNotification".
 *
 * The followings are the available columns in table 'sNotification':
 * @property integer $id
 * @property string $title
 * @property string $expire
 * @property string $alert_after_date
 * @property string $alert_before_date
 * @property string $content
 * @property string $group_id
 * @property string $link
 */
class sNotification extends BaseModel {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Notifyii the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 's_notification';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            //array('expire, content, link', 'required'),
            array('company_id, group_id, expire, alert_after_date, alert_before_date', 'numerical', 'integerOnly' => true),
            array('content, title, alert_after_date, alert_before_date, group_id, link', 'safe'),
            array('photo_path', 'length', 'max' => 100),
            array('author_name', 'length', 'max' => 50),
            array('link, link2, link3', 'length', 'max' => 255),
            array('id, expire, alert_after_date, alert_before_date, content, group_id, link, title', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'reads' => array(self::HAS_MANY, 'sNotificationRead', 'notification_id'),
            'company' => array(self::BELONGS_TO, 'aOrganization', 'company_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'expire' => 'Expire',
            'alert_after_date' => 'Alert After Date',
            'alert_before_date' => 'Alert Before Date',
            'content' => 'Content',
            'group_id' => 'Role',
            'link' => 'Link',
            'link2' => 'Link2',
            'link3' => 'Link3',
            'company_id' => 'Company',
            'photo_path' => 'Photo Path',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('expire', $this->expire, true);
        $criteria->compare('alert_after_date', $this->alert_after_date, true);
        $criteria->compare('alert_before_date', $this->alert_before_date, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('group_id', $this->group_id, true);
        $criteria->compare('link', $this->link, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function getAllNotifications() {
        $criteria = new CDbCriteria;
        $criteria->addInCondition('group_id', sUser::model()->myGroupNotificationArray);
        $criteria->order = 'expire DESC';

        $notifiche = self::model()
                ->findAll($criteria);

        return $notifiche;
    }

    public static function getUnreadNotifications() {
        //$dependency = new CDbCacheDependency('SELECT count(company_id) FROM s_notification where company_id = '.sUser::model()->myGroup);
        //if (!Yii::app()->cache->get('unreadnotification'.Yii::app()->user->id)) {

        $criteria = new CDbCriteria;
        $criteria->addInCondition('group_id', sUser::model()->myGroupNotificationArray, 'OR');
        $criteria->compare('company_id', sUser::model()->myGroup, false, 'OR');

        $criteria1 = new CDbCriteria;
        $criteria1->condition = "`t`.`id` NOT IN (
				SELECT `r`.`notification_id` FROM  `s_notification_read` `r` 
				WHERE `r`.`username` = " . Yii::app()->user->id . " AND `r`.`notification_id` = `t`.`id`)";
        $criteria->mergeWith($criteria1);
        $criteria->order = 'expire DESC';
        $criteria->limit = 10;


        $notifiche = self::model()->findAll($criteria);

        //	Yii::app()->cache->set('unreadnotification'.Yii::app()->user->id,$notifiche,86400,$dependency);
        //} else
        //	$notifiche=Yii::app()->cache->get('unreadnotification'.Yii::app()->user->id);

        return $notifiche;
    }

    public static function getUnreadCount() {
        $criteria = new CDbCriteria;
        $criteria->addInCondition('group_id', sUser::model()->myGroupNotificationArray, 'OR');
        $criteria->compare('company_id', sUser::model()->myGroup, false, 'OR');

        $criteria1 = new CDbCriteria;
        $criteria1->condition = "`t`.`id` NOT IN (
			SELECT `r`.`notification_id` FROM  `s_notification_read` `r` 
			WHERE `r`.`username` = " . Yii::app()->user->id . " AND `r`.`notification_id` = `t`.`id`)";
        $criteria->mergeWith($criteria1);
        $criteria->order = 'expire DESC';

        $notifiche = self::model()->count($criteria);

        return (int) $notifiche;
    }

    public static function getReminder() {
        //$dependency = new CDbCacheDependency('SELECT count(company_id) FROM s_notification where company_id = '.sUser::model()->myGroup);
        //if (!Yii::app()->cache->get('reminder'.Yii::app()->user->id)) {

        $criteria = new CDbCriteria;

        //if (Yii::app()->user->name != "admin") {
        $criteria1 = new CDbCriteria;
        $criteria1->condition = '(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' . implode(",", Yii::app()->getModule("m1")->PARAM_COMPANY_ARRAY) . ')  ORDER BY c.start_date DESC LIMIT 1) IN (' . implode(",", sUser::model()->myGroupArray) . ')';
        $criteria->mergeWith($criteria1);
        //}

        $criteria->order = '(select end_date from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1)';

        $criteria1 = new CDbCriteria;
        $criteria1->condition = '(select status_id from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) IN(1,2,3,4,5)';

        $criteria2 = new CDbCriteria;
        $criteria2->condition = '(select end_date from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) < DATE_ADD(CURDATE(),INTERVAL 60 DAY)';

        $criteria->mergeWith($criteria1);
        $criteria->mergeWith($criteria2);
        $criteria->limit = 20;

        $notifiche = gPerson::model()->findAll($criteria);

        //	Yii::app()->cache->set('reminder'.Yii::app()->user->id,$notifiche,86400,$dependency);
        //} else
        //	$notifiche=Yii::app()->cache->get('reminder'.Yii::app()->user->id);

        return $notifiche;
    }

    public static function getAllRoledNotifications($group_id = 'admin') {
        $criteria = new CDbCriteria(array(
            'condition' => ':now >= t.alert_after_date AND :now <= t.alert_before_date AND t.group_id = :group_id',
            'params' => array(
                ':now' => date('Y-m-d'),
                ':group_id' => $group_id,
            )
        ));

        $notifiche = self::model()
                ->findAll($criteria);

        return $notifiche;
    }

    public function isNotReaded() {
        return !$this->isReaded();
    }

    public function isReaded() {
        $criteria = new CDbCriteria;
        $criteria->with = array('reads');
        $criteria->together = true;
        $criteria->compare('reads.username', Yii::app()->user->id);
        $model = self::model()->findByPk($this->id);

        if (isset($model)) {
            return true;
        }
        else
            return false;
    }

    public function beforeSave() {
        $this->expire = time();
        $this->alert_after_date = time();
        $this->alert_before_date = date(strtotime("1 month"));
        if ($this->company_id == null && !Yii::app()->user->isGuest) 
            $this->company_id = sUser::model()->myGroup;
        if (!Yii::app()->user->isGuest)
            $this->author_name = Yii::app()->user->name;

        return parent::beforeSave();
    }

    /*    public function afterSave()
      {
      $adesso = new DateTime();

      $criteria = new CDbCriteria(array(
      'condition' => 'alert_before_date < :date',
      'params' => array(
      ':date' => $adesso->format('Y-m-d'),
      )
      ));

      $results = self::model()
      ->findAll($criteria);

      foreach ($results as $item) {
      $item->delete();
      }

      parent::afterSave();
      }
     */
     
     public function getLinkReplace() {
		$regex1 = "/<read>([\S\s]*?)<\/read>/i";
		$regex2 = "/<link2>([\S\s]*?)<\/link2>/i";
		$regex3 = "/<link3>([\S\s]*?)<\/link3>/i";

		$output = preg_replace($regex2,"<a href='".Yii::app()->createUrl($this->link2)."'>$1</a>",$this->content);
		$output = preg_replace($regex3,"<a href='".Yii::app()->createUrl($this->link3)."'>$1</a>",$output);

    	if ($this->reads == null) 
			$output = preg_replace($regex1,"<a href='".Yii::app()->createUrl("/sNotification/read",array("id"=>$this->id))."'>$1</a>",$output);
		else
			$output = preg_replace($regex1,"<a href='".Yii::app()->createUrl($this->link)."'>$1</a>",$output);
		
		return $output;     
     }
     
	public static function getNotifCount() {     
		$unread = "";
     	if (Yii::app()->user->name == "admin" || sUser::model()->rightCountM > 2 || !Yii::app()->user->checkAccess('HR ESS Staff')) 
			$unread = (self::model()->unreadCount != 0) ? CHtml::tag("span", array('style' => 'font-size:inherit', 'class' => 'badge badge-info'), self::model()->unreadCount) : "";
		
		return $unread;
	}
	
	public function getPhotoPath() {
		if (!isset($this->photo_path))
			echo CHtml::image(Yii::app()->request->baseUrl . "/shareimages/company/logoAlt4.jpg", 'logo', array("class" => "media-object")); 
		else
			echo $this->photo_path; 
	
	}
	
}
