CREATE TABLE tour_dates (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tour_id BIGINT UNSIGNED NOT NULL,
    company_id BIGINT UNSIGNED NOT NULL,
    date DATE NOT NULL,
    available_slots INT UNSIGNED NOT NULL,
    price DECIMAL(8, 2) NOT NULL,
    status VARCHAR(255) NOT NULL DEFAULT 'available', -- available, sold_out, cancelled
    notes TEXT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (tour_id) REFERENCES tours(id) ON DELETE CASCADE,
    FOREIGN KEY (company_id) REFERENCES companies(id) ON DELETE CASCADE
);
