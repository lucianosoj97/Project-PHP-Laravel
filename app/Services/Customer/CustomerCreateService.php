<?php

namespace App\Services\Customer;

use App\Models\Customer;

class CustomerCreateService
{
    public function execute(array $data)
    {
        $customer = new Customer();
        $customer->name = $data['name'];
        $customer->cpf = $data['cpf'];
        $customer->email = $data['email'];
        $customer->gender = $data['gender'];
        $customer->phone = $data['phone'];
        $customer->age = $data['age'];
        $customer->date_of_birth = $data['date_of_birth'];

        if (isset($data['photo'])) {
            $photoPath = $data['photo']->store('photos', 'public');
            $customer->photo = $photoPath;
        }

        $customer->save();

        return $customer;
    }
}
