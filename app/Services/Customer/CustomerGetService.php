<?php

namespace App\Services\Customer;

use App\Models\Customer;

class CustomerGetService
{
    /**
     * Returns all customers.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Customer::all();
    }

    /**
     * Returns a specific customer by ID.
     *
     * @param int $id
     * @return Customer|null
     */
    public function getById(int $id)
    {
        return Customer::find($id);
    }
}
