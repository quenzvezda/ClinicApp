-- Tabel untuk authitem (menyimpan roles dan tasks)
CREATE TABLE authitem (
    name VARCHAR(64) NOT NULL,
    type INTEGER NOT NULL,
    description TEXT,
    bizrule TEXT,
    data TEXT,
    PRIMARY KEY (name)
);

-- Tabel untuk authitemchild (menyimpan hubungan antara items)
CREATE TABLE authitemchild (
    parent VARCHAR(64) NOT NULL,
    child VARCHAR(64) NOT NULL,
    PRIMARY KEY (parent, child),
    FOREIGN KEY (parent) REFERENCES authitem(name) ON DELETE CASCADE,
    FOREIGN KEY (child) REFERENCES authitem(name) ON DELETE CASCADE
);

-- Tabel untuk authassignment (menyimpan informasi tentang item yang ditugaskan ke user)
CREATE TABLE authassignment (
    itemname VARCHAR(64) NOT NULL,
    userid VARCHAR(64) NOT NULL,
    bizrule TEXT,
    data TEXT,
    PRIMARY KEY (itemname, userid),
    FOREIGN KEY (itemname) REFERENCES authitem(name) ON DELETE CASCADE
);

-- Tabel untuk pengguna (users)
CREATE TABLE users (
    user_id SERIAL PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
    -- kolom role_id dihilangkan karena RBAC Yii-1 menggunakan tabel authassignment
);

-- (Tambahkan tabel-tabel lain sesuai kebutuhan tugas Anda)
-- Misalnya: regions, employees, actions, medicines, patients, transactions, bills

-- Tabel untuk wilayah (regions)
CREATE TABLE regions (
    region_id SERIAL PRIMARY KEY,
    region_name VARCHAR(100) NOT NULL
);

-- Tabel untuk pegawai (employees)
CREATE TABLE employees (
    employee_id SERIAL PRIMARY KEY,
    employee_name VARCHAR(100) NOT NULL,
    region_id INT,
    FOREIGN KEY (region_id) REFERENCES regions(region_id)
);

-- Tabel untuk tindakan (actions)
CREATE TABLE actions (
    action_id SERIAL PRIMARY KEY,
    action_name VARCHAR(100) NOT NULL,
    action_cost DECIMAL(10, 2) NOT NULL
);

-- Tabel untuk obat (medicines)
CREATE TABLE medicines (
    medicine_id SERIAL PRIMARY KEY,
    medicine_name VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

-- Tabel untuk pasien (patients)
CREATE TABLE patients (
    patient_id SERIAL PRIMARY KEY,
    patient_name VARCHAR(100) NOT NULL,
    address TEXT,
    date_of_birth DATE NOT NULL
);

-- Tabel untuk transaksi (transactions)
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

-- Tabel untuk tagihan (bills)
CREATE TABLE bills (
    bill_id SERIAL PRIMARY KEY,
    transaction_id INT,
    total_amount DECIMAL(10, 2) NOT NULL,
    is_paid BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (transaction_id) REFERENCES transactions(transaction_id)
);

