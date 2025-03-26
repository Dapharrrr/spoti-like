<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'name' => '',
                'email' => '',
                'password' => 'Lorem ipsum dolor sit amet',
                'role' => '',
                'created' => '2025-03-24 14:02:21',
                'modified' => '2025-03-24 14:02:21',
            ],
        ];
        parent::init();
    }
}
