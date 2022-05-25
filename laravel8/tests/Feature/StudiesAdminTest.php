<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\DB as DB;

use App\Http\Controllers\AdminController;

class StudiesAdminTest extends TestCase
{

    /**
     * @before
     */

    public function setUp(): void
    {
        parent::setUp();
        $this->controller = new AdminController();
        session()->put('user', ["username" => 'admin', "password" => '*4ACFE3202A5FF5CF467898FC58AAB1D615029441']);
        session()->save();
    }

    /**
     * Test adding "studies" card
     *
     * @return void
     */

    public function testAddingStudiesCard()
    { // Ajoute une nouvelle carte studies pour tester son fonctionnement 
        $_SERVER['REQUEST_METHOD'] = "POST";
        $data = new \Illuminate\Http\Request(['title' => "Test_title", 'image' => "https://picsum.photos/200", "content" => "Holà !"]);
        $response = $this->controller->newStudies($data);
        return $this->assertEquals($response->getStatusCode(), 302);
    }

    /**
     * Test deleting "discover" card
     *
     * @return void
     */

    public function testDeletingStudiesCard()
    {
        $_SERVER['REQUEST_METHOD'] = "POST";
        $data = new \Illuminate\Http\Request(["idDelete" => $_SESSION['lastInsertId']]);
        $response = $this->controller->deleteStudies($data);
        return $this->assertEquals($response->getStatusCode(), 302);
    }
}
