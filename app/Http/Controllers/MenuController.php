<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menu;
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = $this->menu->paginate(5);
        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $htmlOption = $this->getMenu($parent_id = '');
        return view('admin.menu.create', compact('htmlOption'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            ['name' => 'required|unique:menus|max:255'],
            [
                'name.required' => 'Tên menu không được để trống',
                'name.unique' => 'Tên menu đã tồn tại'
            ]
        );
        $this->menu->create(
            [
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'slug' => Str::slug($request->name),
            ]
        );
        return redirect()->back()->with('status', 'Thêm menu thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $htmlOption = $this->getMenu($menu->parent_id);
        return view('admin.menu.edit', compact('menu', 'htmlOption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate(
            ['name' => 'required|max:255'],
            [
                'name.required' => 'Tên menu không được để trống',
                'name.unique' => 'Tên menu đã tồn tại'
            ]
        );
        $menu->update(
            [
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'slug' => Str::slug($request->name),
            ]
        );
        return redirect()->back()->with('status', 'Sửa menu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->back()->with('status', 'Xoá menu thành công');
    }
    public function getMenu($parent_id)
    {
        $data = $this->menu::all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->Recusive($parent_id);
        return $htmlOption;
    }
}
