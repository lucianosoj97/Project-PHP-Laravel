<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="{{ asset('css/Customer/get-customer.css') }}">
    </head>
<body>
<h1>Lista de Clientes</h1>
    <div class="button-container">
        <a href="{{ route('customers.create') }}" class="btn btn-primary">Adicionar Novo Cliente</a>
    </div>
    <table class="customer-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Gênero</th>
                <th>Telefone</th>
                <th>Idade</th>
                <th>Data de Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td class="name-photo-cell">
                        @if ($customer->photo)
                            <div class="photo-container">
                                <img src="{{ asset('storage/' . $customer->photo) }}" alt="Foto de {{ $customer->name }}" class="mini-photo">
                            </div>
                        @endif
                        {{ $customer->name }}
                    </td>
                    <td>{{ $customer->cpf }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->gender }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->age }}</td>
                    <td>{{ $customer->date_of_birth->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-edit">Editar</a>

                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Tem certeza que deseja apagar?');">Apagar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="{{ asset('js/format-cpf-and-phone-get.js') }}"></script>
</body>
</html>
