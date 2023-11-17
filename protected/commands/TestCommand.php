<?php
class TestCommand extends CConsoleCommand {
    public function run($args) {
        echo "Test command is running!\n";

        $password = 'admin'; // Password asli
        $hash = CPasswordHelper::hashPassword($password);
        echo $hash; // Output hash untuk digunakan di database

        // $auth = Yii::app()->authManager;

        // // Menghapus RBAC yang ada
        // $auth->clearAll();

        // // Membuat operasi dasar
        // $auth->createOperation('manageUsers', 'manage users');
        // $auth->createOperation('managePatients', 'manage patients');
        // $auth->createOperation('manageMedicines', 'manage medicines');
        // $auth->createOperation('manageTransactions', 'manage transactions');

        // // Membuat roles
        // $adminRole = $auth->createRole('Administrator');
        // $doctorRole = $auth->createRole('Doctor');
        // $nurseRole = $auth->createRole('Nurse');
        // $receptionistRole = $auth->createRole('Receptionist');

        // // Menetapkan operasi ke roles
        // $adminRole->addChild('manageUsers');
        // $adminRole->addChild('managePatients');
        // $adminRole->addChild('manageMedicines');
        // $adminRole->addChild('manageTransactions');

        // $doctorRole->addChild('managePatients');
        // $nurseRole->addChild('managePatients');
        // $receptionistRole->addChild('manageTransactions');

        // // Menetapkan roles ke pengguna (ganti dengan ID pengguna yang sesuai)
        // // Contoh: assign 'Administrator' ke pengguna dengan user_id = 1
        // $auth->assign('Administrator', '1'); // Anggap '1' adalah user_id dari admin

        // $auth->save();
    }
}
