<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;



class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 */
	public function run() {

		if (App::environment() === 'production')
			{
				exit('I just stopped you from overwriting the live site. Phil');
			}





		Model::unguard();



		$this->call('ArticlesTableSeeder');
		$this->command->comment('Articles seeded Successfully');

		$this->call('MenusTableSeeder');
		$this->command->comment('Menus seeded Successfully');

		$this->call('PagesTableSeeder');
		$this->command->comment('Pages seeded Successfully');
		//   $this->call('PhotoGalleriesTableSeeder'); $this->command->comment('PhotoGalleries seeded Successfully');
		$this->call('SettingsTableSeeder');
		$this->command->comment('Settings seeded Successfully');
		$this->call('SectionsTableSeeder');
		$this->command->comment('Sections seeded Successfully');
		$this->call('FaqsTableSeeder');
		$this->command->comment('Faqs seeded Successfully');
		//$this->call('ProjectsTableSeeder'); $this->command->comment('Projects seeded Successfully');
		//$this->call('VideosTableSeeder'); $this->command->comment('Videos seeded Successfully');
		//$this->call('SlidersTableSeeder'); $this->command->comment('Sliders seeded Successfully');
		$this->call('CategoriesTableSeeder');
		$this->command->comment('Categories seeded Successfully');

		$this->call('RolesTableSeeder');
		$this->command->comment('Roles seeded Successfully');

		$this->call('ProductsTableSeeder');
		$this->command->comment('Products seeded Successfully');

		$this->call('PricesTableSeeder');
		$this->command->comment('Prices seeded Successfully');

	          $this->call('PriceProductTableSeeder');
		$this->command->comment('Products Price Pivot seeded Successfully');


		$this->call('CategoryProductTableSeeder');
		$this->command->comment('Product Categories seeded Successfully');

		$this->call('ProductFeaturesTableSeeder');
		$this->command->comment('Product Features seeded Successfully');
		$this->call('ProductVariantsTableSeeder');
		$this->command->comment('Product Variants seeded Successfully');
		$this->call('OptionsTableSeeder');
		$this->command->comment('Options seeded Successfully');
		$this->call('OptionValuesTableSeeder');
		$this->command->comment('Option Values seeded Successfully');
		$this->call('TagsTableSeeder');
		$this->command->comment('Tags seeded Successfully');
		$this->call('ArticlesTagsTableSeeder');
		$this->command->comment('Articles Tags seeded Successfully');
 
//		 $this->call('UsersTableSeeder');
//		 $this->command->comment('Users seeded Successfully');
 



	        $this->call('ActivationsTableSeeder');
	        $this->call('ActivitiesTableSeeder');


		Model::reguard();



	}

}
