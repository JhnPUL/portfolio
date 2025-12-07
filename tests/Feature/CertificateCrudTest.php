<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class CertificateCrudTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function owner_can_create_certificate_and_is_redirected()
    {
        // Create an owner user
        $owner = User::factory()->create([
            'is_owner' => true,
        ]);

        // Disable all middleware for this test request (bypass CSRF for simplicity)
        $this->withoutMiddleware();

        // Act as the owner and submit the certificate form
        $response = $this->actingAs($owner)->post(route('owner.certificates.store'), [
            'title' => 'Test Certificate',
            'issuer' => 'Test Issuer',
            'issued_date' => '2025-01-01',
            'expiry_date' => null,
            'credential_url' => 'https://example.com/credential',
            'description' => 'Test description',
        ]);

        // Assert we were redirected back to the owner certificates index
        $response->assertRedirect(route('owner.certificates.index'));

        // Assert the certificate is in the database
        $this->assertDatabaseHas('certificates', [
            'title' => 'Test Certificate',
            'issuer' => 'Test Issuer',
        ]);
    }
}
