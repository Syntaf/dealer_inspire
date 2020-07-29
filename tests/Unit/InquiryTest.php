<?php

namespace Tests\Unit;

use App\Inquiry;
use PHPUnit\Framework\TestCase;

class InquiryTest extends TestCase
{
    public function testCreatesLinesFromMessage()
    {
        $inquiry = new Inquiry([
            'full_name' => 'John Doe',
            'email' => 'gmercer015@gmail.com',
            'phone_number' => '7026860461',
            'message' => str_repeat('lorem ipsum', 7)
        ]);

        $this->assertCount(2, $inquiry->message_lines);
    }
}
