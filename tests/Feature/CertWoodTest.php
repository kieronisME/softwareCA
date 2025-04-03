<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

// class CertWoodTest extends TestCase
// // {
// //     use RefreshDatabase;

// //     public function test_admin_can_create_product()
// //     {
// //         Storage::fake('public');

// //         // Create admin using your Admin model
// //         $admin = Admin::factory()->create();
        
// //         // Authenticate as admin - specify the guard if using multiple auth systems
// //         $this->actingAs($admin);

// //         $response = $this->post('/products', [
// //             'Product_name' => 'Oak Table',
// //             'Certificate' => 'FSC-1001',
// //             'Price' => 19.99,  // Should be numeric
// //             'About' => 'Premium quality oak table',
// //             'quantity' => 10,   // Should be integer
// //             'co2' => 5.5,       // Should be numeric
// //             'weight' => 15.2,   // Should be numeric
// //             'weight_unit' => 'kg'
// //         ]);

// //         // Verify database record
// //         $this->assertDatabaseHas('products', [
// //             'Product_name' => 'Oak Table',
// //             'Certificate' => 'FSC-1001'
// //         ]);

// //         $response->assertRedirect(route('MainTestPage'));
// //     }

// //     public function test_user_cannot_create_product()
// //     {
// //         Storage::fake('public');

// //         // Create regular user
// //         $user = User::factory()->create();
        
// //         // Authenticate as regular user
// //         $this->actingAs($user);

// //         $response = $this->post('/products', [
// //             'Product_name' => 'Oak Table',
// //             'Certificate' => 'FSC-1001',
// //             'Price' => 199.99,
// //             'About' => 'Premium quality oak table',
// //             'quantity' => 10,
// //             'co2' => 5.5,
// //             'weight' => 15.2,
// //             'weight_unit' => 'kg'
// //         ]);

// //         // User should be denied access (403 Forbidden)
// //         $response->assertForbidden();
        
// //         // Verify product wasn't created
// //         $this->assertDatabaseMissing('products', [
// //             'Certificate' => 'FSC-1001'
// //         ]);
// //     }
// // }