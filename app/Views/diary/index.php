<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="flex justify-between items-center mb-4">
  <h2 class="text-xl font-semibold">Catatan Harian</h2>
  <a href="/entries/create" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">+ Tambah Catatan</a>
</div>

<?php if(empty($entries)): ?>
  <p class="text-gray-600">Belum ada catatan.</p>
<?php else: ?>
  <div class="space-y-3">
    <?php foreach($entries as $entry): ?>
      <div class="bg-white p-4 rounded shadow flex justify-between items-center">
        <div>
          <h3 class="text-lg font-semibold"><?= esc($entry['title']) ?></h3>
          <p class="text-gray-500 text-sm"><?= date('d M Y', strtotime($entry['date'])) ?> &middot; Mood: <?= esc($entry['mood']) ?></p>
        </div>
        <div class="flex space-x-2">
          <a href="/entries/<?= $entry['id'] ?>" class="text-blue-600 hover:underline">Lihat</a>
          <a href="/entries/<?= $entry['id'] ?>/edit" class="text-green-600 hover:underline">Edit</a>
          <form method="post" action="/entries/<?= $entry['id'] ?>/delete" onsubmit="return confirm('Hapus catatan ini?');">
            <?= csrf_field() ?>
            <button class="text-red-600 hover:underline">Hapus</button>
          </form>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<?= $this->endSection() ?>
