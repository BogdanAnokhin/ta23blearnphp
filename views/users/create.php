<?php include __DIR__ . '/../partials/header.php'; ?>
<?php include __DIR__ . '/../partials/navbar.php'; ?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="mb-4">Lisa uus kasutaja</h1>

            <form method="POST" action="/users" class="border p-4 rounded">
                <div class="mb-3">
                    <label for="name" class="form-label">Nimi</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Parool</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Lisa kasutaja</button>
                    <a href="/users" class="btn btn-secondary">Tühista</a>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>