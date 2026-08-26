<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>ورود | وبلاگ</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
    ])

    <style>
        @keyframes float-one {
            0%,
            100% {
                transform: translate3d(0, 0, 0);
            }

            50% {
                transform: translate3d(20px, -25px, 0);
            }
        }

        @keyframes float-two {
            0%,
            100% {
                transform: translate3d(0, 0, 0);
            }

            50% {
                transform: translate3d(-25px, 20px, 0);
            }
        }

        @keyframes pulse-glow {
            0%,
            100% {
                opacity: 0.2;
                transform: scale(1);
            }

            50% {
                opacity: 0.4;
                transform: scale(1.08);
            }
        }

        @keyframes shine {
            0% {
                transform: translateX(-150%) skewX(-18deg);
            }

            100% {
                transform: translateX(300%) skewX(-18deg);
            }
        }

        .login-grid {
            background-image:
                linear-gradient(
                    rgba(255, 255, 255, 0.025) 1px,
                    transparent 1px
                ),
                linear-gradient(
                    90deg,
                    rgba(255, 255, 255, 0.025) 1px,
                    transparent 1px
                );
            background-size: 38px 38px;
        }

        .orb-one {
            animation: float-one 8s ease-in-out infinite;
        }

        .orb-two {
            animation: float-two 10s ease-in-out infinite;
        }

        .glow {
            animation: pulse-glow 6s ease-in-out infinite;
        }

        .shine {
            animation: shine 4s ease-in-out infinite;
        }
    </style>
</head>


<body class="bg-[#070a12] text-white">

    <main
        class="
            relative
            min-h-screen
            h-screen
            overflow-hidden
            flex
            items-center
            justify-center
            px-6
        "
    >

        <div
            class="
                absolute
                inset-0
                login-grid
                opacity-60
                pointer-events-none
            "
        ></div>


        <div
            class="
                glow
                absolute
                -top-40
                -right-40
                w-[500px]
                h-[500px]
                rounded-full
                bg-violet-600/20
                blur-[130px]
                pointer-events-none
            "
        ></div>


        <div
            class="
                orb-one
                absolute
                -bottom-40
                -left-32
                w-[420px]
                h-[420px]
                rounded-full
                bg-blue-600/15
                blur-[120px]
                pointer-events-none
            "
        ></div>


        <div
            class="
                orb-two
                absolute
                top-[35%]
                right-[12%]
                w-24
                h-24
                rounded-full
                border
                border-violet-400/10
                pointer-events-none
            "
        ></div>


        <div class="relative w-full max-w-md">


            <div
                class="
                    absolute
                    inset-x-10
                    -top-10
                    h-20
                    rounded-full
                    bg-violet-600/20
                    blur-3xl
                    pointer-events-none
                "
            ></div>


            <div
                class="
                    relative
                    overflow-hidden
                    rounded-[2rem]
                    border
                    border-white/10
                    bg-[#0f172a]/85
                    backdrop-blur-2xl
                    p-8
                    shadow-[0_25px_90px_rgba(0,0,0,0.45)]
                "
            >

                <div
                    class="
                        absolute
                        top-0
                        right-0
                        left-0
                        h-px
                        bg-gradient-to-r
                        from-transparent
                        via-violet-500/70
                        to-transparent
                    "
                ></div>


                <div
                    class="
                        absolute
                        -top-24
                        -right-24
                        w-40
                        h-40
                        rounded-full
                        bg-violet-500/10
                        blur-3xl
                        pointer-events-none
                    "
                ></div>



                <div class="relative text-center mb-8">

                    <div
                        class="
                            group
                            relative
                            mx-auto
                            w-16
                            h-16
                            overflow-hidden
                            rounded-2xl
                            bg-gradient-to-br
                            from-violet-600
                            to-blue-600
                            flex
                            items-center
                            justify-center
                            text-xl
                            font-black
                            shadow-xl
                            shadow-violet-600/20
                            transition-all
                            duration-500
                            hover:-translate-y-1
                            hover:scale-105
                            hover:shadow-violet-500/40
                        "
                    >

                        <span class="relative z-10">
                            W
                        </span>


                        <span
                            class="
                                shine
                                absolute
                                top-0
                                bottom-0
                                left-[-100%]
                                w-1/3
                                bg-white/20
                                blur-sm
                            "
                        ></span>

                    </div>


                    <p
                        class="
                            mt-5
                            text-[11px]
                            tracking-[0.35em]
                            text-violet-400
                        "
                    >
                        WEBLOG
                    </p>


                    <h1 class="mt-3 text-3xl font-black">
                        خوش آمدی
                    </h1>


                    <p class="mt-2 text-sm text-slate-500">
                        برای ورود اطلاعاتت را وارد کن
                    </p>

                </div>



                @if(session('status'))

                    <div
                        class="
                            mb-5
                            rounded-2xl
                            border
                            border-emerald-500/20
                            bg-emerald-500/10
                            px-4
                            py-3
                            text-sm
                            text-emerald-400
                        "
                    >
                        {{ session('status') }}
                    </div>

                @endif



                <form
                    method="POST"
                    action="{{ route('login') }}"
                >

                    @csrf


                    <div class="mb-5">

                        <label
                            for="email"
                            class="
                                block
                                mb-2
                                text-sm
                                text-slate-300
                            "
                        >
                            ایمیل
                        </label>


                        <div class="group relative">

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="example@gmail.com"
                                class="
                                    peer
                                    w-full
                                    h-14
                                    rounded-2xl
                                    border
                                    border-slate-800
                                    bg-[#080c15]
                                    px-5
                                    text-white
                                    placeholder:text-slate-700
                                    outline-none
                                    transition-all
                                    duration-300
                                    hover:border-slate-700
                                    focus:border-violet-500/70
                                    focus:ring-4
                                    focus:ring-violet-500/10
                                "
                            >


                            <span
                                class="
                                    absolute
                                    right-4
                                    left-4
                                    bottom-0
                                    h-px
                                    scale-x-0
                                    origin-center
                                    bg-gradient-to-r
                                    from-blue-500
                                    via-violet-500
                                    to-fuchsia-500
                                    transition-transform
                                    duration-500
                                    peer-focus:scale-x-100
                                "
                            ></span>

                        </div>


                        @error('email')

                            <p class="mt-2 text-xs text-red-400">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>



                    <div class="mb-5">

                        <div
                            class="
                                flex
                                items-center
                                justify-between
                                mb-2
                            "
                        >

                            <label
                                for="password"
                                class="text-sm text-slate-300"
                            >
                                رمز عبور
                            </label>


                            @if (Route::has('password.request'))

                                <a
                                    href="{{ route('password.request') }}"
                                    class="
                                        text-xs
                                        text-slate-500
                                        hover:text-violet-400
                                        transition
                                    "
                                >
                                    فراموشی رمز
                                </a>

                            @endif

                        </div>


                        <div class="group relative">

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="••••••••"
                                class="
                                    peer
                                    w-full
                                    h-14
                                    rounded-2xl
                                    border
                                    border-slate-800
                                    bg-[#080c15]
                                    px-5
                                    text-white
                                    placeholder:text-slate-700
                                    outline-none
                                    transition-all
                                    duration-300
                                    hover:border-slate-700
                                    focus:border-violet-500/70
                                    focus:ring-4
                                    focus:ring-violet-500/10
                                "
                            >


                            <span
                                class="
                                    absolute
                                    right-4
                                    left-4
                                    bottom-0
                                    h-px
                                    scale-x-0
                                    origin-center
                                    bg-gradient-to-r
                                    from-blue-500
                                    via-violet-500
                                    to-fuchsia-500
                                    transition-transform
                                    duration-500
                                    peer-focus:scale-x-100
                                "
                            ></span>

                        </div>


                        @error('password')

                            <p class="mt-2 text-xs text-red-400">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>



                    <label
                        class="
                            flex
                            items-center
                            gap-3
                            mb-7
                            text-sm
                            text-slate-500
                            cursor-pointer
                            select-none
                            group
                        "
                    >

                        <input
                            type="checkbox"
                            name="remember"
                            class="
                                w-4
                                h-4
                                rounded
                                border-slate-700
                                bg-slate-900
                                text-violet-600
                                focus:ring-violet-500
                            "
                        >


                        <span
                            class="
                                transition
                                group-hover:text-slate-300
                            "
                        >
                            مرا به خاطر بسپار
                        </span>

                    </label>



                    <button
                        type="submit"
                        class="
                            group
                            relative
                            w-full
                            h-14
                            overflow-hidden
                            rounded-2xl
                            bg-gradient-to-l
                            from-violet-600
                            to-blue-600
                            font-semibold
                            shadow-lg
                            shadow-violet-600/20
                            transition-all
                            duration-300
                            hover:-translate-y-1
                            hover:from-violet-500
                            hover:to-blue-500
                            hover:shadow-2xl
                            hover:shadow-violet-600/30
                            active:translate-y-0
                        "
                    >

                        <span class="relative z-10">
                            ورود به حساب
                        </span>


                        <span
                            class="
                                shine
                                absolute
                                top-0
                                bottom-0
                                left-[-100%]
                                w-1/3
                                bg-white/20
                                blur-sm
                            "
                        ></span>

                    </button>


                </form>



                <div
                    class="
                        mt-7
                        flex
                        items-center
                        gap-3
                        text-[11px]
                        text-slate-600
                    "
                >

                    <span class="h-px flex-1 bg-slate-800"></span>

                    <span>
                        WEBLOG ADMIN
                    </span>

                    <span class="h-px flex-1 bg-slate-800"></span>

                </div>

            </div>

        </div>

    </main>

</body>

</html>