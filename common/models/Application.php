<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%application}}".
 *
 * @property int $hallticket_id
 * @property int|null $applicant_id
 * @property int|null $slot_id
 * @property int|null $walkin_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Applicant $applicant
 * @property ApplicationPreference[] $applicationPreferences
 * @property WalkinSlots $slot
 * @property Walkin $walkin
 * @property WalkinRole[] $walkinRoles
 */
class Application extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%application}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hallticket_id'], 'required'],
            [['hallticket_id', 'applicant_id', 'slot_id', 'walkin_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['hallticket_id'], 'unique'],
            [['applicant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Applicant::class, 'targetAttribute' => ['applicant_id' => 'applicant_id']],
            [['walkin_id'], 'exist', 'skipOnError' => true, 'targetClass' => Walkin::class, 'targetAttribute' => ['walkin_id' => 'walkin_id']],
            [['slot_id'], 'exist', 'skipOnError' => true, 'targetClass' => WalkinSlots::class, 'targetAttribute' => ['slot_id' => 'slot_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'hallticket_id' => 'Hallticket ID',
            'applicant_id' => 'Applicant ID',
            'slot_id' => 'Slot ID',
            'walkin_id' => 'Walkin ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Applicant]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ApplicantQuery
     */
    public function getApplicant()
    {
        return $this->hasOne(Applicant::class, ['applicant_id' => 'applicant_id']);
    }

    /**
     * Gets query for [[ApplicationPreferences]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ApplicationPreferenceQuery
     */
    public function getApplicationPreferences()
    {
        return $this->hasMany(ApplicationPreference::class, ['hallticket_id' => 'hallticket_id']);
    }

    /**
     * Gets query for [[Slot]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\WalkinSlotsQuery
     */
    public function getSlot()
    {
        return $this->hasOne(WalkinSlots::class, ['slot_id' => 'slot_id']);
    }

    /**
     * Gets query for [[Walkin]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\WalkinQuery
     */
    public function getWalkin()
    {
        return $this->hasOne(Walkin::class, ['walkin_id' => 'walkin_id']);
    }

    /**
     * Gets query for [[WalkinRoles]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\WalkinRoleQuery
     */
    public function getWalkinRoles()
    {
        return $this->hasMany(WalkinRole::class, ['walkin_role_id' => 'walkin_role_id'])->viaTable('{{%application_preference}}', ['hallticket_id' => 'hallticket_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ApplicationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ApplicationQuery(get_called_class());
    }
}
