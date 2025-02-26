-- Active: 1740509509648@@127.0.0.1@5432@main
/*
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name', 255); // O 500 si necesitas más longitud
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->string('slug', 255); // O 500 si necesitas más longitud
            $table->smallInteger('duration')->unsigned()->nullable(); // Cambiado a smallInteger para más rango
            $table->decimal('price', 15, 2)->nullable(); // Aumentado a 15 dígitos para precios más grandes
            $table->text('description')->nullable(); // Hacerlo nullable si es opcional
            $table->text('short_description')->nullable(); // Hacerlo nullable si es opcional
            $table->text('overview')->nullable();
            $table->enum('difficulty', ['easy', 'medium', 'hard'])->nullable();
            $table->text('things_to_bring')->nullable();
            $table->text('itinerary')->nullable();
            $table->text('before_booking')->nullable();
            $table->unique(['company_id', 'slug']);
            $table->timestamps();

            // Índices opcionales para búsquedas frecuentes
            $table->index('name');
            $table->index('status');
            $table->index('user_id');
            $table->index('company_id');
            $table->index('slug');
        });
*/


INSERT INTO locations (name, slug, description, created_at, updated_at) VALUES
('Corcovado', 'corcovado', NULL, '2025-02-26 01:31:58', '2025-02-26 01:31:58'),
('Puerto Jiménez', 'puerto-jimenez', NULL, '2025-02-26 01:32:14', '2025-02-26 01:32:14'),
('Drake', 'drake', NULL, '2025-02-26 01:32:22', '2025-02-26 01:32:22'),
('Rio Tigre', 'rio-tigre', NULL, '2025-02-26 01:32:45', '2025-02-26 01:32:45');
