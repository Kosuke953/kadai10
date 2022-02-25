<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ç</title>
    <link rel="stylesheet" href="css/reset.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet">
</head>
<body>
<section class="text-gray-600 body-font">
<div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
    <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
    <h1 class="title-font font-medium text-3xl text-gray-900">Sanctum</h1>
    <p class="leading-relaxed mt-4">SanctumはVR空間にあなただけのワークスペースを提供します。</p>
    <p class="leading-relaxed">VR空間に複数のディスプレイを投影し作業を効率化。背景は自由に選択可能です。</p>
    <p class="leading-relaxed">もうカフェの狭い机で作業することも、家に書斎を作る必要もありません。</p>
    </div>
    <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
    <!-- <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Sign Up</h2> -->
    <form action="login_act.php" method="POST">
        <div class="relative mb-4">
            <label for="username" class="leading-7 text-sm text-gray-600">ユーザーネーム</label>
            <input type="text" id="username" name="username" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <div class="relative mb-4">
            <label for="password" class="leading-7 text-sm text-gray-600">パスワード</label>
            <input type="password" id="password" name="password" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">ログイン</button>
    </form>
        <div class="mt-4">
            <a href="join/index.php" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">新しいアカウントを作成
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