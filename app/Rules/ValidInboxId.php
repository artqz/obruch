<?php

namespace App\Rules;

use App\Inbox;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class ValidInboxId implements Rule
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
        //Получаем текущий год
        $year_now =  Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now())->year;
        $inbox = Inbox::where('reg_number', $value)->whereYear('reg_date', $year_now)->where('is_hide', 0)->first();

        if ($inbox) {
            return false;
        }
        else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Такой регистрационный номер уже существует';
    }
}
