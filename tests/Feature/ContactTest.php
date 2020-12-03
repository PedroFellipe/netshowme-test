<?php

namespace Tests\Feature;

use App\Models\Contact;

use Tests\TestCase;

class ContactTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();

    }

    /**
     * Test Get Contacts
     *
     * @return void
     */
    public function testGetContacts()
    {
        $contacts = Contact::factory()->count(3)->create();
        $response = $this->get(route('contact.index'));

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /**
     * Test Post Contacts
     *
     * @return void
     */
    public function testPostContactsOk()
    {

        $response = $this->post(route('contact.store'), Contact::factory()->make()->toArray());
        $response->assertStatus(201);

    }

    /**
     * Test Post Contacts
     *
     * @return void
     */
    public function testPostContactsWithNoDataInPayload()
    {

        // Test validation with no data in payload
        $response = $this->post(route('contact.store'), []);
        $response->assertStatus(422);
    }

}
