<?php include __DIR__ . '/../partials/header.php'; ?>
<?php include __DIR__ . '/../partials/navbar.php'; ?>

<main class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1>Kasutajad</h1>
        </div>
        <div class="col-md-4 text-end">
            <a href="/users/create" class="btn btn-primary">+ Lisa uus kasutaja</a>
        </div>
    </div>

    <?php if(empty($users)): ?>
        <div class="alert alert-info">Kasutajaid pole veel lisatud.</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nimi</th>
                        <th>E-mail</th>
                        <th>Tegevused</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                        <tr>
                            <td><?php echo $user->id; ?></td>
                            <td><?php echo htmlspecialchars($user->name); ?></td>
                            <td><?php echo htmlspecialchars($user->email); ?></td>
                            <td>
                                <a href="/users/edit?id=<?php echo $user->id; ?>" class="btn btn-sm btn-warning">Muuda</a>
                                <a href="/users/delete?id=<?php echo $user->id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Oled kindel?');">Kustuta</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>