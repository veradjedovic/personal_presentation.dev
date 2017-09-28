<?php

namespace App\Testing\Unit\ExampleTest;

use PHPUnit\Framework\TestCase as TestCase;

class ExampleTest extends TestCase
{

//    protected $click;
//    protected $request;
//
//
//    public function setUp()
//    {
//
//        $this->click = $this->mockBuilder(Click::class, ['getPlatform']);
//        $this->request = M::mock('Illuminate\Http\Request');
//    }
    /**
     * tearDown
     */
//    public function tearDown()
//    {
//        m::close();
//    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        //Arrange.
        $url = "/";

        //Act.
//        $response = $this->call('GET', $url);

        //Assert.
        $this->assertTrue(true);
//        $this->assertEquals(200, $response->status());
//        $this->see($this->redirect_link_data);
    }

    /**
     * @test
     * Test testTest.
     *
     * Test radi. Testovi se pokrecu sa vendor/bin/phpunit tests/unit(ili putanja do direktorijuma gde su nam testovi)
     */
    public function testTest()
    {
        $this->assertEquals(true, 11);
        $this->assertEquals(true, 11);
        $this->assertEquals(true, 11);
    }
}