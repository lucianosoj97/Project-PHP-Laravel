<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Cliente</title>
    <link rel="stylesheet" href="{{ asset('css/Customer/create-customer.css') }}">
</head>
<body>
    <div class="container">

        <h1 class="title">Cadastrar novo cliente</h1>

        <form class="create-form" action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf" maxlength="14" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
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
                <input type="text" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="age">Idade:</label>
                <input type="number" id="age" name="age" required>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Data de Nascimento:</label>
                <input type="date" id="date_of_birth" name="date_of_birth" required>
            </div>
            <div class="form-group">
                <label for="photo">Foto:</label>
                <input type="file" id="photo" name="photo">
            </div>
            <div class="button-group">
                <button type="submit" class="btn btn-primary">Criar Cliente</button>
                <a href="{{ route('customers.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <script src="{{ asset('js/format-cpf.js') }}"></script>
</body>
</html>
