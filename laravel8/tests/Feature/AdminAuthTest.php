<?php

namespace Tests\Feature;

use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    /**
     * Admin auth middleware test method (without credentials).
     *
     * @return void
     */

    public function testAdminAuthWithoutCredentials()
    {
        $response = $this->call("GET",'admin/discover');
        $response->assertStatus(302);
    }

    /**
     * Admin auth middleware test method (with credentials).
     *
     * @return void
     */
    public function testAdminAuthWithCredentials()
    {
        $response = $this->withSession(["user" => ["username" => 'admin', "password" => '*4ACFE3202A5FF5CF467898FC58AAB1D615029441']])->call("GET",'admin/discover');
        $response->assertStatus(200);
    }
}
