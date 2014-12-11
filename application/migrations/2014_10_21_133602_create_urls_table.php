<?php

class Create_Urls_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
                            Schema::create('urls', function($table) {
                            $table->increments('id');
                            $table->string('url'); // 200 default
                            $table->string('shortened',5);
                       //     $table->timestamps();
                        }); 
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('urls');
	}

}