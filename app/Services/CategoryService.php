<?php

namespace App\Services;

use App\Interfaces\CategoryInterface;
use App\Models\CategoryModel;

class CategoryService implements CategoryInterface
{

    public function addCategory(string $name)

    {
        $query = CategoryModel::create([
            'name' => $name
        ]);


        if ($query) return redirect()->route('admin.category')->with('status', 'Category added successfully');


        return back()->with('error', 'Unable to add category');
    }

    public function getCategories()
    {
        return CategoryModel::all();
    }

    public function deleteCategory(int $id)
    {
        $query = CategoryModel::findOrFail($id)->delete();


        if ($query) return redirect()->route('admin.category')->with('status', 'Category deleted successfully');


        return back()->with('error', 'Unable to delete category');
    }

    public function categoryPage()
    {

        return view('admin.category', [
            "data" => $this->getCategories()
        ]);
    }


    public function addNewCategoryPage()
    {

        return view('admin.add-category');
    }
}
