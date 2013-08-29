<?php

class IndoHpValidator extends CValidator
{

	/**
	 * @var boolean whether the attribute value can be null or empty. Defaults to true,
	 * meaning that if the attribute is empty, it is considered valid.
	 */
	public $allowEmpty = true;

	/**
	 * Validates the attribute of the object.
	 * If there is any error, the error message is added to the object.
	 * @param CModel $object the object being validated
	 * @param string $attribute the attribute being validated
	 */
	protected function validateAttribute($object,$attribute)
	{
		$value=$object->$attribute;
		if($this->allowEmpty && ($value===null || $value===''))
			return true;
		elseif(!$this->allowEmpty && ($value===null || $value==='')) {
			$message=$this->message!==null?$this->message:Yii::t('yii','{attribute} is empty');
			$this->addError($object,$attribute,$message);
		}
		
		//Without +
		if (preg_match('/^(\+)[\s]*(.*)$/',$value)) {
		   $message=Yii::t('yii','{attribute} without the country code, please');
		   $this->addError($object,$attribute,$message);
		}		

		//between 10 to 12 digits
	    if (!preg_match('/^[0-9]{10,12}$/',$value)) {
	        $message=Yii::t('yii','{attribute} number should contain between 10 to 12 digits');
			$this->addError($object,$attribute,$message);
	    }

		//should start from 0
		//if (!preg_match('/^08[0-9]{9,10}$/',$value)) {
	    //    $message=Yii::t('yii','{attribute} should start with 08');
		//	$this->addError($object,$attribute,$message);
	    //}
	    	    
	    //Check Prefix
	    //$tnexp[1] =  '/^02079460[0-9]{3}$/';

		$tnexp[0] =  '/^0811[0-9]{8,10}$/';	//KartuHALO	Telkomsel
		$tnexp[1] =  '/^0812[0-9]{8,10}$/';	//	SimPATI, KartuHALO	Telkomsel
		$tnexp[2] =  '/^0813[0-9]{8,10}$/';	//	SimPATI, KartuHALO	Telkomsel
		$tnexp[3] =  '/^0814[0-9]{8,10}$/';	//	Indosat 3,5G Broadband	Indosat (IndosatM2)
		$tnexp[4] =  '/^0815[0-9]{8,10}$/';	//	Mentari, Matrix	Indosat
		$tnexp[5] =  '/^0816[0-9]{8,10}$/';	//	Mentari, Matrix	Indosat
		$tnexp[6] =  '/^0817[0-9]{8,10}$/';	//	XL Prabayar, XL Pascabayar	XL Axiata
		$tnexp[7] =  '/^0818[0-9]{8,10}$/';	//	XL Prabayar, XL Pascabayar	XL Axiata
		$tnexp[8] =  '/^0819[0-9]{8,10}$/';	//	XL Prabayar, XL Pascabayar	XL Axiata
		$tnexp[9] =  '/^0821[0-9]{8,10}$/';	//	SimPATI Freedom	Telkomsel
		$tnexp[10] =  '/^0822[0-9]{8,10}$/';	//	SimPATI (Kartu Facebook)	Telkomsel
		$tnexp[11] =  '/^0823[0-9]{8,10}$/';	//	Kartu As[1]	Telkomsel
		$tnexp[12] =  '/^0828[0-9]{8,10}$/';	//	Ceria	Sampoerna Telekom
		$tnexp[13] =  '/^0831[0-9]{8,10}$/';	//	Axis	AXIS Telekom Indonesia
		$tnexp[14] =  '/^0838[0-9]{8,10}$/';	//	Axis	AXIS Telekom Indonesia
		$tnexp[15] =  '/^0852[0-9]{8,10}$/';	//	Kartu As	Telkomsel
		$tnexp[16] =  '/^0853[0-9]{8,10}$/';	//	Kartu As (Kartu Prima)	Telkomsel
		$tnexp[17] =  '/^0855[0-9]{8,10}$/';	//	Matrix Auto	Indosat
		$tnexp[18] =  '/^0856[0-9]{8,10}$/';	//	IM3	Indosat
		$tnexp[19] =  '/^0857[0-9]{8,10}$/';	//	IM3	Indosat
		$tnexp[20] =  '/^0858[0-9]{8,10}$/';	//	Mentari	Indosat
		$tnexp[21] =  '/^0859[0-9]{8,10}$/';	//	XL Prabayar, XL Pascabayar	XL Axiata
		$tnexp[22] =  '/^08681[0-9]{7,9}$/';	//	ByRU	PSN/ACeS
		$tnexp[23] =  '/^0877[0-9]{8,10}$/';	//	XL Prabayar, Hauraa	XL Axiata
		$tnexp[24] =  '/^0878[0-9]{8,10}$/';	//	XL Prabayar	XL Axiata
		$tnexp[25] =  '/^0879[0-9]{8,10}$/';	//	XL Prabayar	XL Axiata
		$tnexp[26] =  '/^0881[0-9]{8,10}$/';	//	smartfren	Smartfren Telecom
		$tnexp[27] =  '/^0882[0-9]{8,10}$/';	//	smartfren	Smartfren Telecom
		$tnexp[28] =  '/^0883[0-9]{8,10}$/';	//	Smartfren	Smartfren Telecom
		$tnexp[29] =  '/^0884[0-9]{8,10}$/';	//	Smartfren	Smartfren Telecom
		$tnexp[30] =  '/^0887[0-9]{8,10}$/';	//	smartfren	Smartfren Telecom
		$tnexp[31] =  '/^0888[0-9]{8,10}$/';	//	smartfren	Smartfren Telecom
		$tnexp[32] =  '/^0889[0-9]{8,10}$/';	//	smartfren	Smartfren Telecom
		$tnexp[33] =  '/^0896[0-9]{8,10}$/';	//	3	Hutchison Charoen Pokphand Telecom
		$tnexp[34] =  '/^0897[0-9]{8,10}$/';	//	3	Hutchison Charoen Pokphand Telecom
		$tnexp[35] =  '/^0898[0-9]{8,10}$/';	//	3	Hutchison Charoen Pokphand Telecom
		$tnexp[36] =  '/^0899[0-9]{8,10}$/';	//	3	Hutchison Charoen Pokphand Telecom

		$valid=false;
		foreach ($tnexp as $regexp) {
	        if (preg_match($regexp,$value,$matches))
	        	$valid=true;
	    }	    	 
		if ($valid==false) {
		  $message=Yii::t('yii','This {attribute} number is not recognized Indonesian Provider');
		  $this->addError($object,$attribute,$message);	
		}

    }
}
?>
