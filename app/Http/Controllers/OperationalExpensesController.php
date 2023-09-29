<?php

namespace App\Http\Controllers;

use App\Models\OperationalExpense;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OperationalExpensesController extends Controller
{

    /**
     * @throws \Exception
     */
    public function index(Request $request, $operational)
    {

        if ($request->ajax()){
            $expense = OperationalExpense::where('operational_id', $operational)->get();
            return DataTables::of($expense)
                ->addIndexColumn()
                ->toJson();
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'item' => 'required',
            'amount' => 'required',
        ]);

        OperationalExpense::create($request->all());

        return redirect()->route('operational.index')
            ->with('success', 'Operational Expense created successfully.');
    }

    /**
     * @param Request $request
     * @param OperationalExpense $expense
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, OperationalExpense $expense)
    {
        $request->validate([
            'date' => 'required',
            'amount' => 'numeric',
        ]);

       $expense->update($request->all());

        return response()->json([
            'success' => 'Operational Expense updated successfully!'
        ], 200);
    }

    /**
     * @param OperationalExpense $expense
     * @return RedirectResponse
     */
    public function delete(OperationalExpense $expense)
    {
        $expense->delete();
        return redirect()->back()->with('success', 'Operational Expense deleted successfully');
    }

    public function show(Request $request,string $expense)
    {
        $attrExpense = OperationalExpense::where('id', $expense)->get();

        return response()->json($attrExpense);
    }
}
