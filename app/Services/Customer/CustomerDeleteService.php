<?php

namespace App\Services\Customer;

use App\Models\Customer;

class CustomerDeleteService
{
    public function execute(int $id)
    {
        $customer = Customer::findOrFail($id);

        if ($customer->photo) {
            \Storage::disk('public')->delete($customer->photo);
        }

        return $customer->delete();
    }
}
