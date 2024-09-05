<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="{{ asset('css/Customer/edit-customer.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="title">Editar Cliente</h1>

        <form class="edit-form" action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $customer->name) }}" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" id="cpf" value="{{ old('cpf', $customer->cpf) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email', $customer->email) }}" required>
            </div>

            <div class="form-group">
                <label for="gender">Gênero:</label>
                <select id="gender" name="gender" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Não-Binário">Não-Binário</option>
                    <option value="Outro">Outro</option>
                    <option value="Prefiro não informar">Prefiro não informar</option>
                </select>
            </div>

            <div class="form-group">
                <label for="phone">Telefone:</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $customer->phone) }}" required>
            </div>

            <div class="form-group">
                <label for="age">Idade:</label>
                <input type="number" name="age" id="age" value="{{ old('age', $customer->age) }}" required>
            </div>

            <div class="form-group">
                <label for="date_of_birth">Data de Nascimento:</label>
                <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $customer->date_of_birth->format('Y-m-d')) }}" required>
            </div>

            <div class="form-group">
                <label for="photo">Foto:</label>
                @if ($customer->photo)
                    <img class="customer-photo" src="{{ asset('storage/' . $customer->photo) }}" alt="Foto de {{ $customer->name }}" width="100">
                @endif
                <input type="file" name="photo" id="photo">
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="{{ route('customers.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/format-cpf.js') }}"></script>
</body>
</html>
