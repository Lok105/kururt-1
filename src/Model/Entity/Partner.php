<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Partner Entity
 *
 * @property int $id
 * @property string|null $url
 * @property string|null $title
 * @property string|null $img
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Partner extends Entity
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
        'url' => true,
        'title' => true,
        'img' => true,
        'created' => true,
        'modified' => true
    ];
}
