<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%walkin}}".
 *
 * @property int $walkin_id
 * @property string $role_type
 * @property string $start_Date
 * @property string $end_Date
 * @property string $expiry_Date
 * @property string $location
 * @property string $job_roles
 * @property string|null $remarks
 * @property string $slots
 * @property string|null $instructions
 * @property string|null $system_requirements
 * @property string|null $walk_in_process
 * @property string|null $created
 * @property string|null $modified
 */
class Walkin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%walkin}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['walkin_id', 'role_type', 'start_Date', 'end_Date', 'expiry_Date', 'location', 'job_roles', 'slots'], 'required'],
            [['walkin_id'], 'integer'],
            [['start_Date', 'end_Date', 'expiry_Date', 'created', 'modified'], 'safe'],
            [['instructions', 'system_requirements', 'walk_in_process'], 'string'],
            [['role_type', 'location', 'job_roles', 'remarks', 'slots'], 'string', 'max' => 255],
            [['walkin_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'walkin_id' => 'Walkin ID',
            'role_type' => 'Role Type',
            'start_Date' => 'Start Date',
            'end_Date' => 'End Date',
            'expiry_Date' => 'Expiry Date',
            'location' => 'Location',
            'job_roles' => 'Job Roles',
            'remarks' => 'Remarks',
            'slots' => 'Slots',
            'instructions' => 'Instructions',
            'system_requirements' => 'System Requirements',
            'walk_in_process' => 'Walk In Process',
            'created' => 'Created',
            'modified' => 'Modified',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\WalkinQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\WalkinQuery(get_called_class());
    }
}
