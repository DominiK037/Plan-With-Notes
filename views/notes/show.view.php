<?php require basePath("views/partials/head.php") ?>
<?php require basePath("views/partials/nav.php") ?>
<?php require basePath("views/partials/banner.php") ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <P class="my-6"><?= htmlspecialchars($note['body']) ?></P>

            <footer>
                <a href="/notes" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 me-2">
                    Go back️
                </a>
                    <a href="/note/edit?id=<?= $note['id'] ?>" class="rounded-md px-3 bg-gray-500 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Edit
                </a>
            </footer>
        </div>
    </main>

<?php require basePath("views/partials/footer.php") ?>