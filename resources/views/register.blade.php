<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="form-group">
        <label for="name">Korisničko ime</label>
        <input type="text" name="name" id="name" class="form-control" required autofocus>
    </div>

    <div class="form-group">
        <label for="email">E-pošta</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password">Lozinka</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password_confirmation">Potvrdi lozinku</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Registruj se</button>
</form>