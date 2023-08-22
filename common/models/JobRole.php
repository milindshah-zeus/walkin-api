<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%job_role}}".
 *
 * @property int $role_id
 * @property string $role_name
 * @property int $compensation
 * @property string $role_description
 * @property string $requirements
 * @property string $created_at
 * @property string $updated_at
 */
class JobRole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%job_role}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_name', 'compensation', 'role_description', 'requirements'], 'required'],
            [['compensation'], 'integer'],
            [['role_description', 'requirements'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['role_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'role_name' => 'Role Name',
            'compensation' => 'Compensation',
            'role_description' => 'Role Description',
            'requirements' => 'Requirements',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\JobRoleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\JobRoleQuery(get_called_class());
    }
}
