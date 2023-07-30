<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * History Entity
 *
 * @property int $id
 * @property string|null $year
 * @property string|null $title
 * @property string|null $text
 * @property string|null $img
 * @property int $position
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class History extends Entity
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
        'year' => true,
        'title' => true,
        'text' => true,
        'img' => true,
        'position' => true,
        'created' => true,
        'modified' => true
    ];
}
