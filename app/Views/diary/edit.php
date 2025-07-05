<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1 class="text-2xl font-bold mb-4">Edit Catatan</h1>

<form method="post" action="/entries/<?= $entry['id'] ?>/update" class="bg-white p-4 rounded shadow">
  <div class="mb-4">
    <label class="block mb-1">Judul</label>
    <input type="text" name="title" class="w-full border p-2 rounded" value="<?= esc($entry['title']) ?>" required>
  </div>
  <div class="mb-4">
    <label class="block mb-1">Isi Catatan</label>
    <textarea name="content" class="w-full border p-2 rounded" rows="5" required><?= esc($entry['content']) ?></textarea>
  </div>
  <div class="mb-4">
    <label class="block mb-1">Tanggal</label>
    <input type="date" name="date" class="border p-2 rounded" value="<?= esc($entry['date']) ?>">
  </div>
  <div class="mb-4">
    <label class="block mb-1">Mood</label>
    <select name="mood" class="border p-2 rounded">
      <option value="happy" <?= $entry['mood']=='happy'?'selected':'' ?>>😊 Senang</option>
      <option value="neutral" <?= $entry['mood']=='neutral'?'selected':'' ?>>😐 Biasa</option>
      <option value="sad" <?= $entry['mood']=='sad'?'selected':'' ?>>😢 Sedih</option>
    </select>
  </div>
  <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
</form>

<?= $this->endSection() ?>
