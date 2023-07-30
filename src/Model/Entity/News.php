<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * News Entity
 *
 * @property int $id
 * @property int $parent_id
 * @property string $alias
 * @property string $title
 * @property string|null $description
 * @property string|null $h1
 * @property string|null $menu_title
 * @property string|null $short
 * @property string|null $body
 * @property string|null $img
 * @property string|null $back
 * @property int|null $position
 * @property string $published
 * @property string $show_index
 * @property string $show_menu
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\ParentNews $parent_news
 * @property \App\Model\Entity\ChildNews[] $child_news
 */
class News extends Entity
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
        'alias' => true,
        'title' => true,
        'description' => true,
        'h1' => true,
        'short' => true,
        'body' => true,
        'img' => true,
        'back' => true,
        'published' => true,
        'show_index' => true,
        'created' => true,
        'modified' => true,
    ];
}
