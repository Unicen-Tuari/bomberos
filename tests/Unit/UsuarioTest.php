<?php
namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UsuarioTest extends TestCase
{
    public function testScopeId()
    {
        $newUser = factory(User::class)->create();
        $newUser2 = factory(User::class)->create();
        $newUserModel = User::Id($newUser->id);
        $this->assertEquals($newUserModel->first()->id,$newUser->id);
        $this->assertEquals($newUserModel->count(),1);
    }
    public function testScopeNombre()
    {
        $newUser = factory(User::class)->create();
        $newUser2 = factory(User::class)->create();
        $newUserModel = User::nombre($newUser->nombre);
        $this->assertEquals($newUserModel->first()->nombre,$newUser->nombre);
        $this->assertEquals($newUserModel->count(),1);
    }
}
