<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Expense</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
@extends('layouts.app')
    <div class="container">
        <h1 class="mt-4">Add New Expense</h1>

        <!-- Success message placeholder -->
        @if(session('success'))
            <div id="success-message" class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('expenses.store') }}" method="POST">
            @csrf <!-- CSRF Token -->
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Enter description"
                    required></textarea>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="business">Business</option>
                    <option value="personal">Personal</option>
                    <option value="others">Others</option>
                </select>
            </div>

            <div class="form-group">
                <label for="expense_date">Expense Date</label>
                <input type="date" class="form-control" id="expense_date" name="expense_date" required>
            </div>

            <div class="form-group">
                <label for="payment_method">Payment Method</label>
                <select class="form-control" id="payment_method" name="payment_method" required>
                    <option value="cash">Cash</option>
                    <option value="credit card">Credit Card</option>
                    <option value="debit card">Debit Card</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add Expense</button>
            <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Cancel</a>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>