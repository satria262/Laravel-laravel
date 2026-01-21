<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="w-full flex justify-center items-center h-screen bg-gray-900 text-white">
        <form action="{{ route('register') }}" method="post" class="flex flex-col items-center bg-blue-900 p-4 rounded-xl space-y-4">
            @csrf
            <h1>Registrasi</h1>
            <div class="flex flex-col space-y-2">
                <label>Nama:</label>
                <input type="text" name="name" class="outline-none p-1 rounded-md text-black" placeholder="Silahkan input nama anda" />
            </div>
            <div class="flex flex-col space-y-2">
                <label>Email:</label>
                <input type="email" name="email" class="outline-none p-1 rounded-md text-black" placeholder="Silahkan input email anda" />
            </div>
            <div class="flex flex-col space-y-2">
                <label>Password</label>
                <input type="password" name="password" class="outline-none p-1 rounded-md text-black" placeholder="Silahkan input password anda" />
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
