<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= esc($title ?? 'Diary App') ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
  <header class="bg-blue-600 text-white p-4 flex justify-between items-center">
    <h1 class="text-lg font-bold">Diary App</h1>
    <?php if(session()->get('user_id')): ?>
      <a href="/logout" class="text-sm hover:underline">Logout</a>
    <?php endif; ?>
  </header>

  <main class="flex-1 container mx-auto p-4">
    <?= $this->renderSection('content') ?>
  </main>

  <footer class="text-center p-4 text-gray-500 text-sm">
    &copy; <?= date('Y') ?> Diary App
  </footer>
</body>
</html>
