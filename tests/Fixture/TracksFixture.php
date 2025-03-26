<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TracksFixture
 */
class TracksFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'album_id' => 1,
                'duration' => 'Lorem ipsum dolor sit amet',
                'artist_id' => 1,
                'created' => '2025-03-24 14:02:30',
                'modified' => '2025-03-24 14:02:30',
            ],
        ];
        parent::init();
    }
}
