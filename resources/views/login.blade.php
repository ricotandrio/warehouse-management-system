<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="w-full mt-32 sm:mt-20 h-full border flex items-center justify-center font-sans">
    <main class="flex flex-col items-center justify-center border border-black w-3/4 sm:w-1/2">
        <section class="w-full flex items-center justify-center p-3 m-3 text-xl">
            <h1 class="font-semibold text-2xl">Login</h1>
        </section>
        
        <form action="/login" method="POST" class="border w-full sm:w-1/2 mt-5 p-5 mb-5">
            @csrf
            @if ($errors->any())
                <div class="text-red-500 text-sm mb-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="flex flex-col items-start justify-center">

                <input name="login_email" type="email" id="login" class="p-1 px-2 w-full text-sm border mt-1" placeholder='email'>
            </div>

            <div class="flex flex-col items-start justify-center mt-5">
                <input name="login_password" type="password" id="password" class="p-1 px-2 w-full border mt-1 text-sm"  placeholder='password'>
            </div>

            <div class="mt-5 w-full flex items-center justify-center">
                <button type="submit" class="px-10 sm:px-16 py-3 rounded-xl text-sm font-medium text-white bg-blue-500 hover:bg-blue-700 active:bg-grey-900 focus:outline-none border-4 border-white focus:border-purple-200 transition-all">
                    Login
                </button>
            </div>
        </form>
        
        <section class="w-full flex items-center justify-center p-3 m-3 text-xl">
            <h1 class="font-semibold text-2xl">Register</h1>
        </section>

        <form action="/register" method="POST" class="border w-full sm:w-1/2 mt-5 p-5 mb-5">
            @csrf
            @if ($errors->any())
                <div class="text-red-500 text-sm mb-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="flex flex-col items-start justify-center">

                <input name="register_name" type="name" id="login" class="p-1 px-2 w-full text-sm border mt-1" placeholder='name'>
            </div>
            <div class="flex flex-col items-start justify-center mt-5">

                <input name="register_email" type="email" id="login" class="p-1 px-2 w-full text-sm border mt-1" placeholder='email'>
            </div>

            <div class="flex flex-col items-start justify-center mt-5">
                <input name="register_password" type="password" id="password" class="p-1 px-2 w-full border mt-1 text-sm"  placeholder='password'>
            </div>

            <div class="mt-5 w-full flex items-center justify-center">
                <button type="submit" class="px-10 sm:px-16 py-3 rounded-xl text-sm font-medium text-white bg-blue-500 hover:bg-blue-700 active:bg-grey-900 focus:outline-none border-4 border-white focus:border-purple-200 transition-all">
                    Register
                </button>
            </div>
        </form>
        

    </main>
</body>
<script>
    
</script>
</html>