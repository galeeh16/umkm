<?php declare(strict_types=1);

namespace App\Http\Controllers\Dashboard;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

final class ProductController extends Controller
{
    public function __construct(
        private readonly ProductService $productService,
        private readonly CategoryService $categoryService
    ) {} 

    public function index()
    {
        return view('dashboard.product.index');
    }

    public function list(Request $request): JsonResponse
    {
        $page = $request->input('page') ? (int) $request->input('page') : 1;
        $rows_per_page = $request->input('length') ? (int) $request->input('length') : 10;
        $search = $request->input('search.value') ? $request->input('search.value') : '';

        $products = $this->productService->getAllWithPaginate($page, $rows_per_page, $search);

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $products->total(),
            'recordsFiltered' => $products->total(),
            'data' => $products->items(),
        ], 200);
    }

    public function create()
    {
        $categories = $this->categoryService->findAll();

        return view('dashboard.product.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request): JsonResponse 
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required|string|max:255',
            'kategori' => 'required|exists:categories,id',
            'harga' => 'required|integer|gt:0',
            'deskripsi' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid Data', 
                'data' => $validator->getMessageBag()
            ], 422);
        }

        try {
            $validated = $validator->validated();

            $product = $this->productService->create([
                'id' => Str::uuid()->toString(),
                'product_name' => $validated['nama_produk'],
                'category_id' => $validated['kategori'],
                'user_id' => Auth::user()->id,
                'price' => $validated['harga'],
                'description' => htmlspecialchars($validated['deskripsi']),
            ]);

            return response()->json([
                'message' => 'Berhasil menambahkan produk', 
                'data' => $product
            ], 201);
        } catch (Exception $e) {
            return response()->json($this->formatError($e), 500);
        }
    }

    public function edit(string $id)
    {
        $product = $this->productService->findByID($id);
        $categories = $this->categoryService->findAll();

        return view('dashboard.product.edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }
}