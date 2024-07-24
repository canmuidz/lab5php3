<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $view;

    public function __construct()
    {
        $this->view = [];
    }

    public function index()
    {
        // Khởi tạo model
        $objPro = new Product();
        $this->view['listPro'] = $objPro->loadDataWithPager();

        // Truy vân + logic
        $objCate = new Category();
        $listCate = $objCate->loadAllCate();
        $arrayCate = [];
        foreach ($listCate as $value) {
            $arrayCate[$value->id] = $value->name;
        }
        $this->view['listCate'] =  $arrayCate;

        return view('products.index', $this->view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $objCate = new Category();
        $this->view['listCate'] = $objCate->loadAllCate();
        return view('products.create', $this->view);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {    


        $validate = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'price' => ['required', 'integer', 'min:1'],
                'quantity' => ['required', 'integer', 'min:1'],
                'image' => ['required', 'image', 'mimes:png,jpeg,jpg,webp', 'max:2048'],
                'category_id' => ['required', 'exists:categories,id'],
            ],
            [
                'name.required' => 'Trường tên không bỏ trống',
                'name.string' => 'Trường tên phải là chuỗi ký tự',
                'name.max' => 'Trường tên không được dài quá 255 ký tự',
                'price.required' => 'Trường giá không bỏ trống',
                'price.integer' => 'Trường giá phải là số nguyên',
                'price.min' => 'Giá phải lớn hơn 1',
                'quantity.required' => 'Trường số lượng không được bỏ trống',
                'quantity.integer' => 'Số lượng phải là số nguyên',
                'quantity.min' => 'Số lượng phải lớn hơn 1',
                'image.required' => 'Trường ảnh không được bỏ trống',
                'image.image' => 'Trường ảnh bắt buộc phải là ảnh',
                'image.mimes' => 'Ảnh phải có định dạng: png, jpeg, jpg, webp',
                'image.max' => 'Kích thước ảnh không được quá 2048 KB',
                'category_id.required' => 'Danh mục không được bỏ trống',
                'category_id.exists' => 'Danh mục không tồn tại',
            ]
        );

        // Store product logic here

        // Return a response or redirect
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }
}
