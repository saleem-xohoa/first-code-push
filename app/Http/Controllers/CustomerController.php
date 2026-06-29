<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:20',
            'father_name'   => 'required|string|max:20',
            'phone_no'      => 'required|string|max:20',
            'address'       => 'required|string|max:500',
        ]);

        Customer::create([
            'customer_name' => $request->customer_name,
            'father_name'   => $request->father_name,
            'phone_no'      => $request->phone_no,
            'address'       => $request->address,
        ]);

        return redirect()->route('customer.view');
    }
    /**
     * Display the specified resource.
     */
    public function view()
    {
        return view('customer.view');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = customer::findorfail($id);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:20',
            'father_name'   => 'required|string|max:20',
            'phone_no'      => 'required|string|max:11',
            'address'       => 'required|string|max:500',
        ]);

        $customer = Customer::findOrFail($id);

        $customer->update([
            'customer_name' => $request->customer_name,
            'father_name'   => $request->father_name,
            'phone_no'      => $request->phone_no,
            'address'       => $request->address,
        ]);

        return redirect()->route('customer.view');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customer.view');
    }

    public function getdata(Request $request)
    {
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

        $customers = Customer::query();
        $total     = $customers->count();

        $totalFilter = $customers;
        if (! empty($searchValue)) {
            $totalFilter = $totalFilter->where('customer_name', 'like', '%' . $searchValue . '%');
            $totalFilter = $totalFilter->orwhere('father_name', 'like', '%' . $searchValue . '%');
        }
        $totalFilter = $totalFilter->count();

        $arrData = $customers;
        $arrData = $arrData->skip($start)->take($rowPerPage);
        $arrData = $arrData->orderby($columnName, $columnSortOrder);

        if (! empty($searchValue)) {
            $arrData = $arrData->where('customer_name', 'like', '%' . $searchValue . '%');
            $arrData = $arrData->orwhere('father_name', 'like', '%' . $searchValue . '%');
        }

        $arrData = $arrData->get();

        foreach ($arrData as $row) {

            $row->action = '
        <a class="detil-btn" href="' . route('customer.edit', $row->id) . '">EDIT</a>

        <a class="detal-btn"
           href="' . route('customer.delete', $row->id) . '"
           onclick="return confirm(\'You sure you want to Delete it.\')">
           DELETE
        </a>
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
