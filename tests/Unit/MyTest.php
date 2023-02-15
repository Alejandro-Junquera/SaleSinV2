<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Articles;
use App\User;
use RefreshDatabase;

class MyTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */


    public function testLogin()
    {
        $credential = [
            'email' => 'marta@gmail.com',
            'password' => '12345678'
        ];

        $response = $this->post('login',$credential);
        $response->assertSessionMissing('errors');
    }

    public function testRegistro(){
        $this->withoutExceptionHandling();

        $response = $this->post('/register', [
            'name' => 'Marta',
            'surname' => 'Rondán',
            'email' => 'martarondan@gmail.com',
            'cicle_id' => 2,
            'password' => '12345678',
        ]);
    
        // Primero comprobamos que todo ha ido bien
        $response->assertStatus(200);

        // Y comprobamos que sea el que acabamos de insertar
        $user = User::where('email', '=', 'martarondan@gmail.com')->first();
        $this->assertEquals($user->name, 'Marta');
        $this->assertEquals($user->surname, 'Rondán');
        $this->assertEquals($user->email, 'martarondan@gmail.com');
        $this->assertEquals($user->cicle_id, 2);
        $this->assertEquals($user->password, '12345678');
    }

    public function testDeleteArticle(){
        $this->withoutExceptionHandling();

        $articles = factory(Articles::class)->create();

        $response = $this->delete('/articlesDelete/'. $articles->id);
        
        $article = Articles::where('id', '=', $articles->id)->first();

        $response->assertRedirect('/articlesDelete/');
    }

    public function testCreateArticle(){

        $this->withoutExceptionHandling();

        $response = $this->post('/createArticle', [
            'title' => 'noticia',
            'image'=> 'sahgadgj',
            'description' => 'asfasdhbsj',
            'cicle_id'=> 1,
        ]);

        $response->assertStatus(200);
        

        // Y comprobamos que sea el que acabamos de insertar
        $article = Articles::where('title', '=', 'noticia')->first();
        $this->assertEquals($article->title, 'noticia');
        $this->assertEquals($article->image, 'sahgadgj');
        $this->assertEquals($article->description, 'asfasdhbsj');
        $this->assertEquals($article->cicle_id, 1);
    }
}
