<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CheckClientExists implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
      
         // Check if the email and ID are set
        // if (!isset($value['email']) || !isset($value['id'])) {
        //     return false;
        // }

        // // Check if the email and ID exist in the database
        // $user = DB::connection('sqlsrv')->table('HREMP')
        //     ->where('HREMP_IDCARD', $value['id'])
        //     ->where('HREMP__EMAIL', $value['email'])
        //     ->exists();
        $user = DB::connection('sqlsrv')->table('HREMP')
        ->where('HREMP_IDCARD', $value)
        ->exists();
        return $user;

        return $user;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
       return 'The provided email and ID number do not match any records. Please contact your System Administrator.';
    }
}
