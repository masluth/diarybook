<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1 class="text-2xl font-bold mb-4">Register</h1>

<form method="post" class="bg-white p-4 rounded shadow">
  <div class="mb-4">
    <label class="block mb-1">Username</label>
    <input type="text" name="username" class="w-full border p-2 rounded" required>
  </div>
  <div class="mb-4">
    <label class="block mb-1">Email</label>
    <input type="email" name="email" class="w-full border p-2 rounded" required>
  </div>
  <div class="mb-4">
    <label class="block mb-1">Password</label>
    <input type="password" name="password" class="w-full border p-2 rounded" required>
  </div>
  <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Register</button>
</form>

<?= $this->endSection() ?>
