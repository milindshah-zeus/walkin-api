<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%applicant}}".
 *
 * @property int $applicant_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $resume_url
 * @property string|null $portfolio_url
 * @property string $preferred_job_roles
 * @property string|null $referral
 * @property int|null $email_updates
 * @property int $aggregate_percentage
 * @property string|null $passing-year
 * @property string|null $qualification
 * @property string|null $stream
 * @property string|null $college
 * @property string|null $applicant_type
 * @property int|null $experience
 * @property int|null $current_ctc
 * @property int|null $expected_ctc
 * @property string|null $expert_technologies
 * @property string|null $familiar_technologies
 * @property int|null $notice_period
 * @property string|null $notice_period_end
 * @property int|null $notice_period_length
 * @property int|null $test_appeared
 * @property string|null $test_role
 * @property string|null $user_password
 * @property string|null $date_created
 * @property string|null $date_modified
 */
class Applicant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%applicant}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['applicant_id', 'first_name', 'last_name', 'email', 'phone', 'resume_url', 'preferred_job_roles', 'aggregate_percentage'], 'required'],
            [['applicant_id', 'email_updates', 'aggregate_percentage', 'experience', 'current_ctc', 'expected_ctc', 'notice_period', 'notice_period_length', 'test_appeared'], 'integer'],
            [['passing-year', 'notice_period_end', 'date_created', 'date_modified'], 'safe'],
            [['applicant_type'], 'string'],
            [['first_name', 'last_name', 'email', 'phone', 'resume_url', 'portfolio_url', 'preferred_job_roles', 'referral', 'qualification', 'stream', 'college', 'expert_technologies', 'familiar_technologies', 'test_role', 'user_password'], 'string', 'max' => 255],
            [['applicant_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'applicant_id' => 'Applicant ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'resume_url' => 'Resume Url',
            'portfolio_url' => 'Portfolio Url',
            'preferred_job_roles' => 'Preferred Job Roles',
            'referral' => 'Referral',
            'email_updates' => 'Email Updates',
            'aggregate_percentage' => 'Aggregate Percentage',
            'passing-year' => 'Passing Year',
            'qualification' => 'Qualification',
            'stream' => 'Stream',
            'college' => 'College',
            'applicant_type' => 'Applicant Type',
            'experience' => 'Experience',
            'current_ctc' => 'Current Ctc',
            'expected_ctc' => 'Expected Ctc',
            'expert_technologies' => 'Expert Technologies',
            'familiar_technologies' => 'Familiar Technologies',
            'notice_period' => 'Notice Period',
            'notice_period_end' => 'Notice Period End',
            'notice_period_length' => 'Notice Period Length',
            'test_appeared' => 'Test Appeared',
            'test_role' => 'Test Role',
            'user_password' => 'User Password',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ApplicantQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ApplicantQuery(get_called_class());
    }
}
