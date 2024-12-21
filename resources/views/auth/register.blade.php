<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/img/img-hero.png') }}">
    <title>Register iBux</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section class="h-[100vh] flex lg:flex-row">
        <div class="hidden w-full lg:w-1/2 lg:flex flex-col justify-center items-center px-16 py-16">
            <img class="sm:w-[40%] lg:w-[60%]" src="{{ asset('assets/img/img-hero.png') }}" alt="img-register">
        </div>
        <div class="w-full lg:w-1/2 flex flex-col justify-center items-center py-10 gap-10">
            <h1 class="md:mb-4 text-2xl font-semibold tracking-wide text-black md:text-5xl">Register</h1>
            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col justify-center items-center">
                    <div class="mb-5">
                        <label for="nama_lengkap" class="text-sm">Nama Lengkap</label>
                        <br>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus
                            autocomplete="nama_lengkap" placeholder="John Doe" class="rounded-lg w-[250px] lg:w-[350px] placeholder:text-sm placeholder:text-[#C4C4C4]">
                        @if ($errors->any())
                            <p class="mt-3 text-red-500 text-xs">{{ $errors->first('nama_lengkap') }}</p>
                        @endif
                    </div>
                    <div class="mb-5">
                        <label for="email" class="text-sm">Email</label>
                        <br>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                            autocomplete="email" placeholder="example@gmail.com" class="rounded-lg w-[250px] lg:w-[350px] placeholder:text-sm placeholder:text-[#C4C4C4]">
                    </div>
                    <div class="mb-5">
                        <label for="password" class="text-sm">Password</label>
                        <br>
                        <input type="password" name="password" required autocomplete="current-password" placeholder="Password"
                            class="rounded-lg w-[250px] lg:w-[350px] placeholder:text-sm placeholder:text-[#C4C4C4]">
                        @if ($errors->has('password'))
                            <p class="mt-3 text-red-500 text-xs">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                    <div class="mb-5">
                        <label for="password_confirmation" class="text-sm">Konfirmasi Password</label>
                        <br>
                        <input type="password" name="password_confirmation" required autocomplete="current-password" placeholder="Konfirmasi Password"
                            class="rounded-lg w-[250px] lg:w-[350px] placeholder:text-sm placeholder:text-[#C4C4C4]">
                        @if ($errors->has('password_confirmation'))
                            <p class="mt-3 text-red-500 text-xs">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                    </div>
                    <button
                        class="w-full h-10 mt-5 rounded-md bg-primary text-white hover:bg-secondary">Daftar</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>