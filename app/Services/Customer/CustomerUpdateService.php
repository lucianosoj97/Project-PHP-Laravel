<?php

namespace App\Services\Customer;

use App\Models\Customer;

class CustomerUpdateService
{
    /**
     * Update the client.
     *
     * @param int $id
     * @param array $data
     * @return Customer|null
     */
    public function execute(int $id, array $data)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return null;
        }

        $customer->name = $data['name'];
        $customer->cpf = $data['cpf'];
        $customer->email = $data['email'];
        $customer->gender = $data['gender'];
        $customer->phone = $data['phone'];
        $customer->age = $data['age'];
        $customer->date_of_birth = $data['date_of_birth'];

        if (isset($data['photo'])) {
            if ($customer->photo) {
                \Storage::disk('public')->delete($customer->photo);
            }

            $photoPath = $data['photo']->store('photos', 'public');
            $customer->photo = $photoPath;
        }

        $customer->save();

        return $customer;
    }
}
