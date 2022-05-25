<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\DB as DB;
//use PHPUnit\Framework\TestCase;

use App\Http\Controllers\AdminController;

class DiscoverAdminTest extends TestCase
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
     * Test adding "discover" card
     *
     * @return void
     */

    public function testAddingDiscoverCard()
    {
        $_SERVER['REQUEST_METHOD'] = "POST";
        $data = new \Illuminate\Http\Request(['title' => "Test_title", 'content' => "Test_content"]);
        $response = $this->controller->newDiscover($data);
        return $this->assertEquals($response->getStatusCode(), 302);
    }

    /**
     * Test deleting "discover" card
     *
     * @return void
     */

    public function testDeletingDiscoverCard()
    {
        $_SERVER['REQUEST_METHOD'] = "POST";
        $data = new \Illuminate\Http\Request(["idDelete" => $_SESSION['lastInsertId']]);
        $response = $this->controller->deleteDiscover($data);
        return $this->assertEquals($response->getStatusCode(), 302);
    }
}
