<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録</title>
    <?php include('../head_parts/link.php') ?>
</head>
<body>
<section class="text-gray-600 body-font">
<div class="container px-5 py-24 mx-auto items-center">
    <div class="bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
    <h2 class="text-gray-900 text-lg font-medium title-font mb-5">アカウント登録</h2>
    <form action="n_check.php" method="POST">
        <div class="relative mb-4">
            <label for="username" class="leading-7 text-sm text-gray-600">ユーザーネーム</label>
            <input type="text" id="username" name="username" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            <?php if(isset($error['username']) && $error['username'] === 'blank'): ?>
            <p class="error">ユーザーネームを入力してください</p>
            <?php endif; ?>
        </div>
        <div class="relative mb-4">
            <label for="password" class="leading-7 text-sm text-gray-600">パスワード</label>
            <input type="password" id="password" name="password" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            <?php if(isset($error['password']) && $error['password'] === 'blank'): ?>
            <p class="error">パスワードを入力してください</p>
            <?php endif; ?>
        </div>
        <div class="relative mb-4">
            <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
            <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            <?php if(isset($error['email']) && $error['email'] === 'blank'): ?>
            <p class="error">メールアドレスを入力してください</p>
            <?php endif; ?>
        </div>
        <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">確認画面へ</button>
    </form>
        <div class="mt-4">
            <a href="../index.php" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">ログイン画面にもどる
                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</div>
</section>
</body>
</html>