<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1 class="text-2xl font-bold mb-2"><?= esc($entry['title']) ?></h1>
<div class="text-sm text-gray-500 mb-4">
  <?= esc($entry['date']) ?> | <?= esc($entry['mood']) ?>
</div>
<p class="bg-white p-4 rounded shadow mb-4"><?= nl2br(esc($entry['content'])) ?></p>

<a href="/entries/<?= $entry['id'] ?>/edit" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
<form method="post" action="/entries/<?= $entry['id'] ?>/delete" class="inline">
  <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded"
          onclick="return confirm('Hapus catatan ini?')">Hapus</button>
</form>

<?= $this->endSection() ?>
