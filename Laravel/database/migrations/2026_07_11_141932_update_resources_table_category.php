<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('resources', function (Blueprint $table) {
            $table->foreignId('resource_category_id')->nullable()->after('author_id')->constrained('resource_categories')->nullOnDelete();
        });

        // Migrate existing string categories to the new table
        $resources = \Illuminate\Support\Facades\DB::table('resources')->get();
        foreach ($resources as $resource) {
            if ($resource->category) {
                // Find or create category
                $slug = \Illuminate\Support\Str::slug($resource->category);
                $category = \Illuminate\Support\Facades\DB::table('resource_categories')->where('slug', $slug)->first();
                
                if (!$category) {
                    $id = \Illuminate\Support\Facades\DB::table('resource_categories')->insertGetId([
                        'name' => $resource->category,
                        'slug' => $slug,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    $categoryId = $id;
                } else {
                    $categoryId = $category->id;
                }

                \Illuminate\Support\Facades\DB::table('resources')
                    ->where('id', $resource->id)
                    ->update(['resource_category_id' => $categoryId]);
            }
        }

        Schema::table('resources', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resources', function (Blueprint $table) {
            $table->string('category')->default('Report')->after('description');
        });

        // Try to reverse migrate (this might not be perfect if names changed, but good enough for down)
        $resources = \Illuminate\Support\Facades\DB::table('resources')
            ->join('resource_categories', 'resources.resource_category_id', '=', 'resource_categories.id')
            ->select('resources.id', 'resource_categories.name')
            ->get();
            
        foreach ($resources as $resource) {
            \Illuminate\Support\Facades\DB::table('resources')
                ->where('id', $resource->id)
                ->update(['category' => $resource->name]);
        }

        Schema::table('resources', function (Blueprint $table) {
            $table->dropForeign(['resource_category_id']);
            $table->dropColumn('resource_category_id');
        });
    }
};
