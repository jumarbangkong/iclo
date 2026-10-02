<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test that all static corporate and LSP portal pages return 200 OK.
     */
    public function test_all_pages_return_successful_response(): void
    {
        $pages = ['/', '/about', '/services', '/sectors', '/resources', '/lsp', '/contact'];

        foreach ($pages as $page) {
            $response = $this->get($page);
            $response->assertStatus(200);
        }
    }

    /**
     * Test locale switching redirect behavior.
     */
    public function test_locale_switcher_redirects_back(): void
    {
        $response = $this->get('/locale/en');
        $response->assertStatus(302);
        
        $response = $this->get('/locale/id');
        $response->assertStatus(302);
    }

    /**
     * Test contact form validation failure.
     */
    public function test_contact_form_submission_validation_fails_for_empty_fields(): void
    {
        $response = $this->post('/contact/submit', []);
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name', 'email', 'sector', 'message']);
    }

    /**
     * Test contact form submission success.
     */
    public function test_contact_form_submission_succeeds_with_valid_data(): void
    {
        $response = $this->post('/contact/submit', [
            'name' => 'Aditya Wijaya',
            'email' => 'aditya@smelter-indonesia.com',
            'sector' => 'smelter',
            'company' => 'PT Smelter Indonesia',
            'message' => 'We would like to book a SMK3 preparation audit for Q3 2026.',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('success');
    }

    /**
     * Test articles page and admin access restrictions.
     */
    public function test_articles_pages_and_admin_security(): void
    {
        $this->seed();

        // Public Articles List
        $response = $this->get('/articles');
        $response->assertStatus(200);
        $response->assertSee('Wawasan & Artikel K3');

        // Single Article Detail (using seeded slug)
        $response = $this->get('/articles/panduan-implementasi-k3-integrasi-esg-korporasi');
        $response->assertStatus(200);
        $response->assertSee('Panduan Implementasi K3 dalam Integrasi Kepatuhan ESG Korporasi');

        // Admin login page
        $response = $this->get('/admin/login');
        $response->assertStatus(200);

        // Admin dashboard without login should fail with 403
        $response = $this->get('/admin');
        $response->assertStatus(403);
    }
}

