<div>
    <?php if (!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <hr>
            <div class="card">
                <div class="card-header">
                    <?= $post['title'] ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"> <?= $post['title'] ?></h5>
                    <p class="card-text"><?= $post['body'] ?></p>
                </div>
            </div>
            <hr>
        <?php endforeach; ?>
    <?php endif; ?>
</div>