<?php


namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use function bcrypt;

class livewireTest extends TestCase
{
    protected $user;
    protected $email = 'firstTest@gmail.com';
    protected $password = 12345678;
    protected $old;
    protected $old_data;

    function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->user = User::firstOrCreate(['email' => $this->email], [
            'email' => $this->email,
            'name' => 'first',
            'type' => 'admin',
            'password' => bcrypt($this->password),
        ]);

    }
    /**
     * smook  for live wire in house builder
     *
     * @return void
     */
    function testformAddProbertyToHouse()
    {
        $this->actingAs($this->user)->get('Admins/houses/create')
            ->assertSeeLivewire('proberties')
            ->assertSeeLivewire('seasons');
    }


}
