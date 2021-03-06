<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SectionInfo Entity.
 *
 * @property int $sid
 * @property int $cid
 * @property string $section_name
 * @property string $start_time
 * @property string $end_time
 * @property string $room_no
 * @property int $create_date
 * @property string $extra_info
 * @property int $status
 * @property \App\Model\Entity\Teacher $teacher
 */
class SectionInfo extends Entity
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
        'sid' => false,
    ];
}
