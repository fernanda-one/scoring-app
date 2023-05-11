<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="flex justify-between p-5 border-b bg-white">
        <div class="">
            <img src="" alt="">
        </div>
        <span>KEJURNAS CEMPAKA PUTIH</span>
        <span>
                <a href="">tes</a>
            </span>
    </div>
    <form action="<?= base_url('/auth')?>" class="flex flex-col space-y-6 items-center ">
        <div class="">
            <label for="username" class="block">Username</label>
            <input type="text" for="username">
        </div>
        <div class="">
            <label for="email" class="block">Email</label>
            <input type="text" for="email">
        </div>
        <button type="submit" class="px-6 py-2 rounded bg-purple-300">Masuk</button>
    </form>
</body>
</html>

