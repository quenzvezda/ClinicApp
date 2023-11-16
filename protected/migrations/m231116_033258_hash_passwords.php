<?php

class m231116_033258_hash_passwords extends CDbMigration
{
	public function up()
	{
		// Ambil semua user dan hash password mereka
		require_once(Yii::getPathOfAlias('application.models.Users').'.php');

		$users = Users::model()->findAll();
		foreach ($users as $user) {
			$user->setScenario('update'); // Tambahkan ini
			$hashedPassword = CPasswordHelper::hashPassword($user->password);
			$user->password_hash = $hashedPassword;
			$user->save(true, array('password_hash'));
		}
	}


	public function down()
	{
		echo "m231116_033258_hash_passwords does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}