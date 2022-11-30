<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\category\StoreCategoryRequest;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('parent')->orderBy('id','desc')->get();
        return view('backend.categories.index')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', null)->get();
        return view('backend.categories.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $currentUser = Auth::user();
        $category = new Category;

        if ($request->hasFile('image')) {
            $path = 'assets/uploads/categories'.$category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/categories',$filename);
            $category->image = $filename;
        }

        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->created_at = Carbon::now();
        $category->updated_at = Carbon::now();
        $category->save();

        if ($category) {
            // Add activity logs
            activity($currentUser->name)
                ->performedOn($category)
                ->causedBy($currentUser)
                ->log('Category ' . $request->name . ' created by ' . $currentUser->name);
            toast('Category created successfully', 'success');
        }else{
            toast('Something went wrong!', 'error');
        }
        return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::with('parent')->find($id);
        return view('backend.categories.show')->with(compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::with('childrenCategory')->where('parent_id', Null)->get();
        $category = Category::find($id);
        $val_category = Category::where('id', $category->parent_id)->value('name');
        return view('backend.categories.edit')->with([
                'category' => $category,
                'categories' => $categories,
                'val_category' => $val_category,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $currentUser = Auth::user();
        $category = Category::find($id);

        if ($request->hasFile('image')) {
            $path = 'assets/uploads/categories'.$category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/categories',$filename);
            $category->image = $filename;
        }

        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->created_at = Carbon::now()->toDateString();
        $category->updated_at = Carbon::now()->toDateString();
        $category->update();

        if ($category) {
            // Add activity logs
            activity($currentUser->name)
                ->performedOn($category)
                ->causedBy($currentUser)
                ->log('Category ' . $request->name . ' status changed by ' . $currentUser->name);
            toast('Category updated successfully', 'success');
        }else{
            toast('Something went wrong!', 'error');
        }
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (! $category) {
            toast('Something went wrong!','error');
        }
        $category->delete();
        toast('Category Delete successfully','success');
        return back();
    }
}
