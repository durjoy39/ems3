<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ClassInfo Entity.
 *
 * @property int $cid
 * @property string $class_campus
 * @property string $class_shift_info
 * @property string $class_medium
 * @property int $class_name
 * @property int $teacher_id
 * @property \App\Model\Entity\TeacherBasic $teacher_basic
 * @property int $class_start_date
 * @property string $start_time
 * @property string $end_time
 * @property string $room_no
 * @property int $create_date
 * @property string $extra_info
 * @property int $status
 * @property int $delete_status
 * @property int $delete_kg
 */
class ClassInfo extends Entity
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
        'cid' => false,
    ];
}
