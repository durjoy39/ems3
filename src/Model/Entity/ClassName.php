<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ClassName Entity.
 *
 * @property int $id
 * @property string $class_id
 * @property \App\Model\Entity\Class $class
 * @property string $class_name
 * @property int $subject_code
 * @property string $description
 * @property int $faculty_id
 * @property \App\Model\Entity\Faculty $faculty
 * @property string $file_url
 * @property int $order
 * @property int $status
 * @property int $del_status
 * @property string $entry_by
 * @property \Cake\I18n\Time $entry_date
 */
class ClassName extends Entity
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
