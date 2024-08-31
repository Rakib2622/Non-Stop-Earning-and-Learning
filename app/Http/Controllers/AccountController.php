<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AccountController extends Controller
{
    public function income(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        Account::create([
            'user_id' => auth()->id(),
            'type' => 'income',
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        $this->updateUserBalance(auth()->id(), $request->amount);

        return redirect()->back()->with('success', 'Income recorded successfully.');
    }

    public function deposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        Account::create([
            'user_id' => auth()->id(),
            'type' => 'deposit',
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        $this->updateUserBalance(auth()->id(), $request->amount);

        return redirect()->back()->with('success', 'Deposit recorded successfully.');
    }

    public function withdrawalForm()
    {
        $user = auth()->user();
        
        // Fetch the account record for the user
        $account = Account::where('user_id', $user->id)->first();
    
        // Calculate balance: If no account record, balance should be 0
        $balance = $account ? $account->amount : 0;
    
        return view('frontend.after_login.withdrawal', compact('user', 'balance'));
    }
    
    public function processWithdrawal(Request $request)
    {
        $user = auth()->user();
        $amount = $request->input('amount');

        // Check if the user has sufficient balance
        $balance = Account::where('user_id', $user->id)->first()->amount;

        if ($balance < $amount) {
            return back()->withErrors(['amount' => 'Insufficient balance to withdraw this amount.']);
        }

        // Insert the withdrawal record
        Withdrawal::create([
            'user_id' => $user->id,
            'amount' => $amount,
            'method' => $request->input('method'),
            'number' => $request->input('number'),
            'description' => $request->input('description'),
        ]);

        // Update the user balance
        $this->updateUserBalance($user->id, -$amount);

        return redirect()->route('user.withdrawal.form')->with('success', 'Withdrawal successful!');
    }

    private function updateUserBalance($userId, $amount)
    {
        $account = Account::where('user_id', $userId)->first();
        $account->amount += $amount;
        $account->save();
    }
}
