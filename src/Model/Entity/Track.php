<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Track Entity
 *
 * @property int $id
 * @property string $title
 * @property int $album_id
 * @property string $duration
 * @property int $artist_id
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Album $album
 */
class Track extends Entity
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
        'album_id' => true,
        'duration' => true,
        'artist_id' => true,
        'created' => true,
        'modified' => true,
        'album' => true,
    ];
}
