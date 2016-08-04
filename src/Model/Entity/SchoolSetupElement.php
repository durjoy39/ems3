<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SoftSchoolSetupElement Entity.
 *
 * @property int $TBL30_ELEMENT_ID
 * @property string $TBL30_ELEMENT_TYPE
 * @property string $TBL30_ELEMENT_DATA
 * @property string $TBL30_ELEMENT_PARENT
 * @property int $TBL30_STATUS
 * @property \Cake\I18n\Time $TBL30_SYSTEM_REPORT_DATE
 * @property \Cake\I18n\Time $TBL30_ENTRY_DATE
 */
class SchoolSetupElement extends Entity
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
        'TBL30_ELEMENT_ID' => false,
    ];
}
