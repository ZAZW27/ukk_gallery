<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link href="../../../public/output.css" rel="stylesheet">
</head>
<body class="bg-slate-50">
    <div class="flex justify-center items-center h-[100vh]">

        <div class="w-full max-w-xs">
            <form action="crud/aksi-log.php" method="post" class="bg-white shadow-lg shadow-slate-600/20 px-8 pt-6 pb-8 mb-4 rounded-lg">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Username
                    </label>
                    <input name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="password" required>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Sign In
                    </button>
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="register.php">
                        Buat akun
                    </a>
                </div>
            </form>
            <p class="text-center text-gray-500 text-xs">
                &copy;zharif corporation
            </p>
        </div>
    </div>
</body>
</html>