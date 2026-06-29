<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image',
            'status' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully');
    }

    public function show(Product $product)
    {
        return view('products.index', compact('product'));
    }

    public function edit($id)
    {
        $product = product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image',
            'status' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }

     public function productdata(Request $request)
    {
        // dd($request);
        $draw       = $request->get('draw');   // Internal use
        $start      = $request->get("start");  // where to start next records for pagination
        $rowPerPage = $request->get("length"); // How many recods needed per page for pagination

        $orderArray      = $request->get('order');
        $columnNameArray = $request->get('columns'); // It will give us columns array

        $searchArray = $request->get('search');
        $columnIndex = $orderArray[0]['column']; // This will let us know,
                                                 // which column index should be sorted
                                                 // 0 = id, 1 = name, 2 = email , 3 = created_at

        $columnName = $columnNameArray[$columnIndex]['data']; // Here we will get column name,
                                                              // Base on the index we get

        $columnSortOrder = $orderArray[0]['dir']; // This will get us order direction(ASC/DESC)
        $searchValue     = $searchArray['value']; // This is search value

        $products = Product::query();
        $total     = $products->count();

        $totalFilter = $products;
        if (! empty($searchValue)) {
            $totalFilter = $totalFilter->where('name', 'like', '%' . $searchValue . '%');
            $totalFilter = $totalFilter->orwhere('price', 'like', '%' . $searchValue . '%');
        }
        $totalFilter = $totalFilter->count();

        $arrData = $products;
        $arrData = $arrData->skip($start)->take($rowPerPage);
        $arrData = $arrData->orderby($columnName, $columnSortOrder);

        if (! empty($searchValue)) {
            $arrData = $arrData->where('name', 'like', '%' . $searchValue . '%');
            $arrData = $arrData->orwhere('price', 'like', '%' . $searchValue . '%');
        }

        $arrData = $arrData->get();

        foreach ($arrData as $row) {

       $row->action = '
    <a class="detil-btn" href="' . route('products.edit', $row->id) . '">EDIT</a>

    <form action="' . route('products.destroy', $row->id) . '" method="POST" style="display:inline;">
        ' . csrf_field() . '
        ' . method_field('DELETE') . '
        <button type="submit" class="detal-btn" onclick="return confirm(\'Are you sure?\')">
            DELETE
        </button>
    </form>
';
        }

        $response = [
            "draw"            => intval($draw),
            "recordsTotal"    => $total,
            "recordsFiltered" => $totalFilter,
            "data"            => $arrData,
        ];

        return response()->json($response);

    }
}
