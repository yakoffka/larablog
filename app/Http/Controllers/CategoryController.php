<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategory;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->authorizeResource(Category::class, 'category'); // adding authorizing action (app/Policies/CategoryPolicy.php)
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with(['author', 'editor'])->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create', Category::class); // authorizing action via controller helpers without model instance
        $faker_category = $this->getFakerCategory();
        return view('categories.create', compact('faker_category'));
    }
    /**
     * Gets cheats for a category
     *
     * @return array $faker_category
     */
    private function getFakerCategory()
    {
        $faker = Faker::create();
        $faker_category['name'] = $faker->text(rand(10, 20));
        $faker_category['slug'] = Str::slug($faker_category['name'], '-');
        $faker_category['description'] = str_replace(['\'', '"', '-', ], '', $faker->realText(rand(500, 900)));
        return $faker_category;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // dd($user->can('update', $post));
        // dd(auth()->user()->can('update', $category));
        // $this->authorize('update', $category); // authorizing action via controller helpers

        // $message = 'Youre name is ' . auth()->user()->name . '; Category author name is ' . $category->author->name . '. Everything is fine';
        // session()->flash('message', $message);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
