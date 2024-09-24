<?php require basePath("views/partials/head.php") ?>
<?php require basePath("views/partials/nav.php") ?>
<?php require basePath("views/partials/banner.php") ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <a href="/notes" class="mb-6 text-blue-500 hover:underline">Go back️⬅️</a>
            <P class="mb-6">
                <?= htmlspecialchars($note['body']) ?>
            </P>

            <form class="mt-6" method="post">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button class="text-sm text-red-500">Delete</button>
            </form>
        </div>
    </main>

<?php require basePath("views/partials/footer.php") ?>