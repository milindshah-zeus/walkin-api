<?php

namespace backend\controllers;


use common\models\Application;
use yii\rest\ActiveController;

class ApplicationController extends ActiveController{

    
    public $modelClass = Application:: class;
}