<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Information Entity
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $address
 * @property string|null $body_ru
 * @property string|null $body_en
 * @property string|null $body_de
 * @property string|null $soc_tw
 * @property string|null $soc_wk
 * @property string|null $soc_fb
 * @property string|null $soc_goo
 * @property string|null $soc_inst
 * @property string|null $soc_you
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Information extends Entity
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
        'id' => false
    ];
}
