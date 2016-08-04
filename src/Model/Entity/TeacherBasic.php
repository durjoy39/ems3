<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TeacherBasic Entity.
 *
 * @property int $id
 * @property string $first_name_eng
 * @property string $middle_name
 * @property string $last_name
 * @property string $nick_name_eng
 * @property string $bangla_name
 * @property string $father_husband_name
 * @property string $mother_name
 * @property int $dob
 * @property string $gender
 * @property string $relegion
 * @property string $blood_group
 * @property string $national_id
 * @property \App\Model\Entity\National $national
 * @property string $birth_place
 * @property string $nationality
 * @property string $country
 * @property string $designation
 * @property string $responsibility
 * @property string $file
 * @property string $phone
 * @property string $email
 * @property string $mobile
 * @property string $present_address
 * @property string $permanent_address
 * @property string $resume
 * @property string $class
 * @property int $create_date
 * @property int $delete_status
 * @property int $join_date
 * @property string $type
 * @property string $institute_teacher_id
 * @property \App\Model\Entity\InstituteTeacher $institute_teacher
 * @property int $first_join_date
 * @property string $type_of_appoinment
 * @property string $batch_number
 * @property string $merit_number
 */
class TeacherBasic extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
