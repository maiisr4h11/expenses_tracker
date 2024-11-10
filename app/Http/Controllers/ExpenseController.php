<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //this is for pagination of expenses table
        $expenses = Expense::orderBy('expense_date', 'desc')->paginate(10);
        //this is for passing the data to the view. expenses.index is the name of the view. expenses is the name of the variable
        return view('expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'description' => 'required|max:255',
            'category' => 'required|in:food,transport,utilities,entertainment,other',
            'expense_date' => 'required|date',
            'payment_method' => 'required|in:cash,card,bank_transfer'
        ]);
    
        Expense::create($validated);
        return redirect()->route('expenses.index')->with('success', 'Expense recorded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        // Return the edit view with the expense data
        return view('expenses.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'description' => 'required|max:255',
            'category' => 'required|in:food,transport,utilities,entertainment,other',
            'expense_date' => 'required|date',
            'payment_method' => 'required|in:cash,card,bank_transfer'
        ]);
        
        // Update the expense with the validated data
        $expense->update($validated);
        
        // Redirect back to the index page with a success message
        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
         // Delete the expense
         $expense->delete();
        
         // Redirect back to the index page with a success message
         return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully');
    }
}
