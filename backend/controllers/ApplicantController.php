<?php

namespace backend\controllers;

use common\models\Applicant;
use yii\rest\ActiveController;

class ApplicantController extends ActiveController{

    
    public $modelClass = Applicant:: class;
}