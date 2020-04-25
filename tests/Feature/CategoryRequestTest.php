<?php

namespace Tests\Feature;

use Tests\TestCase;
use Faker\Factory as Faker;

class CategoryRequestTest extends TestCase
{

    public $faker;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->faker = Faker::create();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateCategory()
    {
        $name = $this->faker->name;

        $this->visit('/category/create')
            ->type($name, 'name')
            ->type($this->faker->name, 'description')
            ->press('Save')
            ->see('Edit category: ' . $name);
    }

    public function testUpdateCategory()
    {
        $name = $this->faker->name;

        $this->visit('/category/1/edit')
            ->type($name, 'name')
            ->type($this->faker->name, 'description')
            ->press('Save')
            ->see('Edit category: ' . $name);
    }
}
