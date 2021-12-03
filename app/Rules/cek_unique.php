<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class cek_unique implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($arr,$key,$cheker)
    {
        $this->arr = $arr;
        $this->key = $key;
        $this->cheker = $cheker;
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
        //
        if(!empty($this->arr)){
            foreach ($this->arr as $item) {
                $a = $this->key;
                if ($item->$a == $this->cheker) {
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
