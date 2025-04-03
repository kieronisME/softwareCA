<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CertWoodTest extends TestCase
{

    public function test_admin_can_create_product()
    {
        Storage::fake('public');

        /** @var \App\Models\Admin $admin */
        $admin = Admin::factory()->create(['role' => 'admin']);

        $this->actingAs($admin, 'admin'); 

        $response = $this->post('/products', [
            'Product_name' => 'Oak Table',
            'Certificate' => 'FSC-1001',
            'Price' => 19.99,
            'About' => 'Premium quality oak table',
            'quantity' => 10,
            'co2' => 5.5,
            'weight' => 15.2,
            'weight_unit' => 'kg'
        ]);

        $this->assertDatabaseHas('products', [
            'Product_name' => 'Oak Table',
            'Certificate' => 'FSC-1001'
        ]);

        $response->assertRedirect(route('MainTestPage'));
    }

    public function test_user_cannot_create_product()
    {
        Storage::fake('public');
    
        /** @var \App\Models\User $user */
        $user = User::factory()->create();
    
        $this->actingAs($user);
    
        $response = $this->post('/products', [
            'Product_name' => 'Oak Table',
            'Certificate' => 'FSC-1001',
            'Price' => 199.99,
            'About' => 'Premium quality oak table',
            'quantity' => 10,
            'co2' => 5.5,
            'weight' => 15.2,
            'weight_unit' => 'kg'
        ]);
        
    
    
        $this->assertDatabaseMissing('products', ['Certificate' => 'FSC-1001']);

        $response->assertForbidden(route('myRoutes.certProd.Nwood'));

        $response->assertSessionHas('error','denied');

        
    }
}
