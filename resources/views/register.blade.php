<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
          crossorigin="anonymous">
    <style>
        .login{
            background: url('./dist/images/login-new.jpeg')
        }
    </style>
    <title>Register</title>
</head>
<body class="h-screen font-sans login bg-cover">
<div class="container mx-auto h-full flex flex-1 justify-center items-center">
    <div class="w-full max-w-lg">
        <div class="leading-loose">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('message'))
            <div class="bg-danger border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif 

            <!-- Display Error Message -->
            @if (session('error'))
                $message = session('error');
            @endif  
            <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" action="{{ route('registerform_users')}}" method="POST">
                @csrf
                <p class="text-gray-800 font-medium">Register</p>
                <div class="">
                    <label class="block text-sm text-gray-00" for="name">Name</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Your Name" aria-label="Name">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="email">Email</label>
                    <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="email" required="" placeholder="Your Email" aria-label="Email">
                    @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="password">Password</label>
                    <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="password" required="" placeholder="Your password" aria-label="Password">
                    @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="c_password">Confirm Password</label>
                    <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="c_password" name="c_password" type="password" required="" placeholder="Your Confirm password" aria-label="Password">
                    @error('c_password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                {{-- <div class="mt-2">
                    <label class=" block text-sm text-gray-600" for="cus_email">Address</label>
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="address" type="text" required="" placeholder="Street" aria-label="Email">
                </div>
                <div class="mt-2">
                    <label class="hidden text-sm block text-gray-600" for="cus_email">City</label>
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="city" type="text" required="" placeholder="City" aria-label="Email">
                </div>
                <div class="inline-block mt-2 w-1/2 pr-1">
                    <label class="hidden block text-sm text-gray-600" for="cus_email">Country</label>
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="country" type="text" required="" placeholder="Country" aria-label="Email">
                </div>
                <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                    <label class="hidden block text-sm text-gray-600" for="cus_email">Zip</label>
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email"  name="zipcode" type="text" required="" placeholder="Zip" aria-label="Email">
                </div> --}}

                <div class="mt-4">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Register</button>
                </div>
                <a class="inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800" href="{{ Route('loginform');}}">
                    Already have an account ?
                </a>
            </form>
        </div>
    </div>
</div>

</body>
</html>