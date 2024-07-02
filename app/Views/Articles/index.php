<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Articles<?= $this->endSection() ?>

<?= $this->section("content") ?>

<h1>Articles</h1>

<a href="<?= url_to("new_article") ?>">Creat New</a>

<?php foreach ($articles as $article) : ?>
    <article>
        <!-- normal url -->
        <!-- <h2> <a href="/articles/<?= $article->id ?>"><?= $article->title ?></a></h2>  -->
        <!-- with site url -->
        <h2> <a href="<?= site_url('./articles/' . $article->id) ?>"><?= $article->title ?></a></h2>
        <p><?= esc($article->content) ?></p>
    </article>
<?php endforeach ?>

<?= $this->endSection() ?>