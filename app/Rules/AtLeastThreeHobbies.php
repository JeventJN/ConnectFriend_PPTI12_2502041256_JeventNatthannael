<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AtLeastThreeHobbies implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        // Split the hobbies by comma and count the number of hobbies
        $hobbies = explode(',', $value);
        $numHobbies = count($hobbies);

        // Check if the number of hobbies is at least three
        return $numHobbies >= 3;
    }
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must have at least three hobbies.';
    }
}
