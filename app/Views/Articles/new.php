<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>New Articles<?= $this->endSection() ?>


<?= $this->section("content") ?>

<h1>New Article</h1>

<?php if(session()->has("error")): ?>
    <ul>
        <?php foreach(session("errors") as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?= form_open("articles/create") ?>

<label for="title">Title</label>
<input type="text" id="title" name="title">

<label for="content">content</label>
<textarea id="content" name="content"></textarea>

<button>Save</button>

</form>

<?= $this->endSection() ?>