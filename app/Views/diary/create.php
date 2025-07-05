<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1 class="text-2xl font-bold mb-4">Tambah Catatan</h1>

<form method="post" action="/entries/store" class="bg-white p-4 rounded shadow">
  <div class="mb-4">
    <label class="block mb-1">Judul</label>
    <input type="text" name="title" class="w-full border p-2 rounded" required>
  </div>
  <div class="mb-4">
    <label class="block mb-1">Isi Catatan</label>
    <textarea name="content" class="w-full border p-2 rounded" rows="5" required></textarea>
  </div>
  <div class="mb-4">
    <label class="block mb-1">Tanggal</label>
    <input type="date" name="date" value="<?= date('Y-m-d') ?>" class="border p-2 rounded">
  </div>
  <div class="mb-4">
    <label class="block mb-1">Mood</label>
    <select name="mood" class="border p-2 rounded">
      <option value="happy">😊 Senang</option>
      <option value="neutral">😐 Biasa</option>
      <option value="sad">😢 Sedih</option>
    </select>
  </div>
  <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
</form>

<?= $this->endSection() ?>
