<?php 

namespace App\Services;

use App\Models\Category;

class CategoryService
{
	public function getIndexCategories()
	{
		return Category::where('parent_id', 0)->orWhere('parent_id', null)->get();
	}

	public function getCreateCategories()
	{
		return view('backend.categories.create');
	}

	public function getStoreCategories(Request $requests)
	{

	}
}