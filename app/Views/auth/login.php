<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
  <h2 class="text-xl font-semibold mb-4">Login</h2>
  <?php if(session()->getFlashdata('error')): ?>
    <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
      <?= session()->getFlashdata('error') ?>
    </div>
  <?php endif; ?>

  <form method="post" action="/login">
    <?= csrf_field() ?>
    <div class="mb-4">
      <label class="block text-sm mb-1">Email</label>
      <input type="email" name="email" class="w-full border p-2 rounded" required/>
    </div>
    <div class="mb-4">
      <label class="block text-sm mb-1">Password</label>
      <input type="password" name="password" class="w-full border p-2 rounded" required/>
    </div>
    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Login</button>
  </form>
  <p class="mt-4 text-sm">
    Belum punya akun? <a href="/register" class="text-blue-600 hover:underline">Daftar</a>
  </p>
</div>

<?= $this->endSection() ?>
