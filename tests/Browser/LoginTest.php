<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testSuccessfullLogin()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create(); // テスト用のユーザーを作成する
            $browser->visit('/login')
                    ->type('email', $user->email) // テスト用のユーザーのメールアドレスを指定する
                    ->type('password', 'password')
                    ->press('LOG IN') // 「LOG IN」ボタンをクリックする
                    ->assertPathIs('/tweet') // /tweetに遷移したことを確認する
                    ->assertSee('つぶやきアプリ');
        });
    }
}
