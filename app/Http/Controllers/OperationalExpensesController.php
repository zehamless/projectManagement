<?php

namespace App\Http\Controllers;

use App\Models\OperationalExpense;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OperationalExpensesController extends Controller
{

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
     * @return RedirectResponse
     */
    public function update(Request $request, OperationalExpense $expense)
    {
        $request->validate([
            'date' => 'required',
            'amount' => 'numeric',
        ]);

       $expense->update($request->all());

        return redirect()->route('operational.index')
            ->with('success', 'Operational Expense updated successfully');
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
}
