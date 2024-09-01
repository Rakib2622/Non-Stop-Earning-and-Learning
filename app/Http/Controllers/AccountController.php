<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\View\View;

class AccountController extends Controller
{
    public function income(Request $request)
    {
        
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
            'status' => 'Pending',
            'description' => $request->input('description'),
        ]);

        // Update the user balance
        $this->updateUserBalance($user->id, -$amount);

        return redirect()->route('user.withdrawal.form')->with('success', 'Withdrawal successful!');
    }

    public function show_withdrawal_request()
    {
        abort_if(Gate::denies('withdraw read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $withdrawals = Withdrawal::all();
        return view('admin.withdrawals.index', compact('withdrawals'));
    }

    // Update withdrawal status
    public function updateWithdrawalStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Accepted,Rejected',
            'description' => 'nullable|string',
        ]);

        // Fetch the withdrawal record by ID
        $withdrawal = Withdrawal::findOrFail($id);
        $withdrawal->status = $request->status;
        $withdrawal->description = $request->description;
        $withdrawal->save();

        // If the status is rejected, add the amount back to the user's account
        if ($request->status === 'Rejected') {
            $account = Account::where('user_id', $withdrawal->user_id)->firstOrFail();
            $account->amount += $withdrawal->amount;
            $account->save();

            // Record the transaction in the accounts table
            Account::create([
                'user_id' => $withdrawal->user_id,
                'amount' => $withdrawal->amount,
                'description' => 'Refund for rejected withdrawal request',
            ]);
        }

        return redirect()->route('admin.withdrawal.request')->with('status', 'Withdrawal request updated successfully.');
    }

    private function updateUserBalance($userId, $amount)
    {
        $account = Account::where('user_id', $userId)->first();
        $account->amount += $amount;
        $account->save();
    }
}
