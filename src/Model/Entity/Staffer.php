<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Staffer Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $position
 * @property string|null $description
 * @property string|null $img
 * @property string|null $soc_vk
 * @property string|null $soc_fb
 * @property string|null $soc_tw
 * @property string|null $soc_goo
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Staffer extends Entity
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
        'name' => true,
        'position' => true,
        'description' => true,
        'img' => true,
        'soc_vk' => true,
        'soc_fb' => true,
        'soc_tw' => true,
        'soc_goo' => true,
        'created' => true,
        'modified' => true
    ];
}
