<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Services\Customer\CustomerCreateService;
use App\Services\Customer\CustomerGetService;
use App\Services\Customer\CustomerUpdateService;
use App\Services\Customer\CustomerDeleteService;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    protected $customerCreateService;
    protected $customerGetService;
    protected $customerUpdateService;
    protected $customerDeleteService;

    public function __construct(
        CustomerCreateService $customerCreateService,
        CustomerGetService $customerGetService,
        CustomerUpdateService $customerUpdateService,
        CustomerDeleteService $customerDeleteService
    ) {
        $this->customerCreateService = $customerCreateService;
        $this->customerGetService = $customerGetService;
        $this->customerUpdateService = $customerUpdateService;
        $this->customerDeleteService = $customerDeleteService;
    }

    public function create() {
        return view('customers.create');
    }

    public function index() {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:customers',
            'email' => 'required|email|max:255|unique:customers',
            'gender' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'age' => 'required|integer',
            'date_of_birth' => 'required|date',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->cpf = $request->input('cpf');
        $customer->email = $request->input('email');
        $customer->gender = $request->input('gender');
        $customer->phone = $request->input('phone');
        $customer->age = $request->input('age');
        $customer->date_of_birth = $request->input('date_of_birth');

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $customer->photo = $photoPath;
        }

        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Cliente criado com sucesso!');
    }

    public function edit($id) {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:customers,cpf,' . $id,
            'email' => 'required|email|max:255|unique:customers,email,' . $id,
            'gender' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'age' => 'required|integer',
            'date_of_birth' => 'required|date',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->name = $request->input('name');
        $customer->cpf = $request->input('cpf');
        $customer->email = $request->input('email');
        $customer->gender = $request->input('gender');
        $customer->phone = $request->input('phone');
        $customer->age = $request->input('age');
        $customer->date_of_birth = $request->input('date_of_birth');

        if ($request->hasFile('photo')) {
            if ($customer->photo) {
                \Storage::disk('public')->delete($customer->photo);
            }
            $photoPath = $request->file('photo')->store('photos', 'public');
            $customer->photo = $photoPath;
        }

        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy($id) {
        $success = $this->customerDeleteService->execute($id);

        if (!$success) {
            return redirect()->route('customers.index')->with('error', 'Cliente não encontrado.');
        }

        return redirect()->route('customers.index')->with('success', 'Cliente removido com sucesso!');
    }
}
