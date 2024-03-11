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
        // Check if $value is an array
        if (!is_array($value) || !isset($value['email']) || !isset($value['id'])) {
            return false;
        }

        $client = DB::table('HREMP')
                    ->where('HREMP_EMAIL', $value['email'])
                    ->where('HREMP_IDCARD', $value['id'])
                    ->first();

        return $client !== null;
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
