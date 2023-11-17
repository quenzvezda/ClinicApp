-- Tabel untuk peran
CREATE TABLE roles (
    role_id SERIAL PRIMARY KEY,
    role_name VARCHAR(50) UNIQUE NOT NULL
);

-- Tabel untuk pengguna
CREATE TABLE users (
    user_id SERIAL PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(50) NOT NULL,
    role_id INT,
    FOREIGN KEY (role_id) REFERENCES roles(role_id)
);

-- Tabel untuk hak akses
CREATE TABLE permissions (
    permission_id SERIAL PRIMARY KEY,
    permission_name VARCHAR(50) UNIQUE NOT NULL
);

-- Tabel untuk hubungan antara peran dan hak akses
CREATE TABLE role_permissions (
    role_id INT,
    permission_id INT,
    PRIMARY KEY (role_id, permission_id),
    FOREIGN KEY (role_id) REFERENCES roles(role_id),
    FOREIGN KEY (permission_id) REFERENCES permissions(permission_id)
);

-- Tabel untuk wilayah
CREATE TABLE regions (
    region_id SERIAL PRIMARY KEY,
    region_name VARCHAR(100) NOT NULL
);

-- Tabel untuk pegawai
CREATE TABLE employees (
    employee_id SERIAL PRIMARY KEY,
    employee_name VARCHAR(100) NOT NULL,
    region_id INT,
    FOREIGN KEY (region_id) REFERENCES regions(region_id)
);

-- Tabel untuk tindakan
CREATE TABLE actions (
    action_id SERIAL PRIMARY KEY,
    action_name VARCHAR(100) NOT NULL,
    action_cost DECIMAL(10, 2) NOT NULL
);

-- Tabel untuk obat
CREATE TABLE medicines (
    medicine_id SERIAL PRIMARY KEY,
    medicine_name VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

-- Tabel untuk pasien
CREATE TABLE patients (
    patient_id SERIAL PRIMARY KEY,
    patient_name VARCHAR(100) NOT NULL,
    address TEXT,
    date_of_birth DATE NOT NULL
);

-- Tabel untuk transaksi
CREATE TABLE transactions (
    transaction_id SERIAL PRIMARY KEY,
    patient_id INT,
    action_id INT,
    medicine_id INT,
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES patients(patient_id),
    FOREIGN KEY (action_id) REFERENCES actions(action_id),
    FOREIGN KEY (medicine_id) REFERENCES medicines(medicine_id)
);

-- Tabel untuk tagihan
CREATE TABLE bills (
    bill_id SERIAL PRIMARY KEY,
    transaction_id INT,
    total_amount DECIMAL(10, 2) NOT NULL,
    is_paid BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (transaction_id) REFERENCES transactions(transaction_id)
);
