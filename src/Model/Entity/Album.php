<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Album Entity
 *
 * @property int $id
 * @property string $title
 * @property int $artist_id
 * @property \Cake\I18n\Date $year
 * @property string|null $image
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Artist $artist
 * @property \App\Model\Entity\Favorite[] $favorites
 * @property \App\Model\Entity\Track[] $tracks
 */
class Album extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'title' => true,
        'artist_id' => true,
        'year' => true,
        'image' => true,
        'embed' => true,
        'created' => true,
        'modified' => true,
        'artist' => true,
        'favorites' => true,
        'tracks' => true,
    ];
}
