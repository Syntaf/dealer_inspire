<?php

namespace Tests\Feature;

use App\Inquiry;
use App\Mail\InquiryReceived;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

use Tests\TestCase;

class InquiryControllerTest extends TestCase
{
    use RefreshDatabase;

    private const EXAMPLE_INQUIRY = [
        'full_name' => 'Grant Mercer',
        'email' => 'gmercer015@gmail.com',
        'phone_number' => '7026860461',
        'message' => "Hi, I'd like to inquire about an APIs developer position"
    ];

    protected function setUp(): void
    {
        parent::setUp();

        Mail::fake();
    }

    public function testCreatesInquiry()
    {
        $response = $this->postJson('/inquiry', self::EXAMPLE_INQUIRY);

        $response->assertStatus(200);

        $this->assertCount(1, $inquiry = Inquiry::all());
        $this->assertInstanceOf(Inquiry::class, $inquiry = $inquiry->first());
        $this->assertEquals(self::EXAMPLE_INQUIRY['full_name'], $inquiry->full_name);
        $this->assertEquals(self::EXAMPLE_INQUIRY['email'], $inquiry->email);
        $this->assertEquals(self::EXAMPLE_INQUIRY['phone_number'], $inquiry->phone_number);
        $this->assertEquals(self::EXAMPLE_INQUIRY['message'], $inquiry->message);

        Mail::assertQueued(InquiryReceived::class);
    }

    public function testAcceptsEmptyPhoneNumber()
    {
        $inquiry = self::EXAMPLE_INQUIRY;
        unset($inquiry['phone_number']);

        $response = $this->postJson('/inquiry', $inquiry);
        $response->assertStatus(200);

        $this->assertCount(1, Inquiry::all());

        Mail::assertQueued(InquiryReceived::class);
    }

    /**
     * @dataProvider requiredFieldsProvider
     */
    public function testRejectsRequiredFields(string $requiredField)
    {
        $inquiry = self::EXAMPLE_INQUIRY;
        unset($inquiry[$requiredField]);

        $response = $this->postJson('/inquiry', $inquiry);

        $response->assertStatus(422);

        $this->assertEmpty(Inquiry::all());

        Mail::assertNothingQueued();
    }

    public function requiredFieldsProvider()
    {
        return [
            ['full_name'],
            ['email'],
            ['message']
        ];
    }
}
