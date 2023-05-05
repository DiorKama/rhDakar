<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('leave_statuses')->insert([
           [
                'title' => 'En validation',
                'description' => 'Demande en attente de validation',
                'active' => true,
                'created_at' => NOW(),
                'updated_at' => NOW()
           ],
            [
                'title' => 'Accordé',
                'description' => 'Demande validée',
                'active' => true,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Non accordé',
                'description' => 'Demande refusée',
                'active' => true,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Annulé',
                'description' => 'Demande annulée',
                'active' => true,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Terminé',
                'description' => 'Congés terminés',
                'active' => true,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
