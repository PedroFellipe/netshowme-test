<?php

namespace Tests\Feature;

use App\Models\Contact;

use Illuminate\Http\UploadedFile;
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
        $response = $this->post(
            route('contact.store'),
            array_merge(Contact::factory()->make()->toArray(),
                ['attachment' => $file = UploadedFile::fake()->create('test_attachment.txt', 400, 'text/plain')]
            ));
        $response->assertStatus(201);

    }

    /**
     * Test Post Contacts
     *
     * @return void
     */
    public function testPostContactsUploadSizeError()
    {
        $response = $this->post(
            route('contact.store'),
            array_merge(Contact::factory()->make()->toArray(),
                ['attachment' => $file = UploadedFile::fake()->create('test_attachment.txt', 900, 'text/plain')]
            ));
        $response->assertStatus(422);

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

    /**
     * Test Post Contacts
     *
     * @return void
     */
    public function testPostContactsEmailError()
    {
        $response = $this->post(
            route('contact.store'),
            array_merge(Contact::factory()->make(['email' => 'email'])->toArray(),
                ['attachment' => $file = UploadedFile::fake()->create('test_attachment.txt', 400, 'text/plain')]
            ));
        $response->assertStatus(422);

    }

    /**
     * Test Post Contacts
     *
     * @return void
     */
    public function testDownloadContactAttachment()
    {
        $response = $this->post(
            route('contact.store'),
            array_merge(Contact::factory()->make()->toArray(),
                ['attachment' => $file = UploadedFile::fake()->create('test_attachment.txt', 400, 'text/plain')]
            ));
        $response->assertStatus(201);
        $contact = json_decode($response->getContent());

        $response = $this->get(route('contact.attachment', $contact->id));
        $response->assertStatus(200);
    }

}
