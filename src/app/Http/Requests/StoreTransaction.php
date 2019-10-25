<?php

namespace App\Http\Requests;

use App\Transaction;
use Illuminate\Foundation\Http\FormRequest;

class StoreTransaction extends FormRequest
{
    /**
     * Transform the error messages into JSON
     *
     * @param array $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public function response(array $errors)
    {
        return response()->json($errors, 422);
    }
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user();
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $transactionTypes = implode(',', array_keys(Transaction::TRANSACTION_TYPES));
        
        return [
            'type' => 'required|in:' . $transactionTypes,
            'amount' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'user_id' => 'required|exists:users,id'
        ];
        
    }
}
