<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Toso List App</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        *{
            font-family: 'Nunito', sans-serif;
        }
        span{
            text-shadow: 0 0 16px #dddeee;
            letter-spacing: 0.8px;
            color: #2c2c97;
        }
        textarea , input{
            resize: none;
            outline: none;
        }
        @keyframes letterspace{
            50% {
                letter-spacing: 50px;
                transform: scale(1.2);
            }
        }
        #fram:hover{
            animation: letterspace 0.4s linear;
        }
    </style>
</head>
<body class="bg-gray-200 p-4">
    <div class="lg:w-2/4 mt-10 mx-auto py-8 px-6 bg-white rounded-xl">
        <h1 class="font-bold text-5xl text-center mb-8">
            Todo List App - <span>Hassan</span>
        </h1>
        <div class="mb-6">
            <form method="POST" action="/" class="flex flex-col space-y-4">
                @csrf

                <input type="text" name="title" placeholder="Enter Title" class="py-3 px-4 bg-gray-100 tounded-xl">

                <textarea name="dscription"class="py-3 px-4 bg-gray-100 tounded-xl" placeholder="Enter dscription"></textarea>
                
                <button id="fram" class="font-bold w-58 p-4 px-8 bg-blue-500 text-white rounded-xl">Add Task</button>
            </form>
        </div>

        <div class="mt-2">
            @foreach ($todos as $todo)
                <div 
                    @class(["py-4 flex items-center border-b border-gray-300 px-3" , $todo->isDone ? 'bg-green-200' : ''])
                    >
                    <div class="flex-1 pr-8">
                        <h3 class="text-lg font-semibold">{{ $todo->title }}</h3>
                        <p class="text-gray-500">{{ $todo->dscription }}</p>
                    </div>
                    <div class="flex space-x-3">
                        <form method="POST" action="/{{ $todo->id }}">
                            @method('PUT')
                            @csrf
                                @if ($todo->isDone == true)
                                <button class="py-2 px-2 bg-yellow-500 text-white rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                                                          
                                 @else 
                                <button class="py-2 px-2 bg-green-500 text-white rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
             
                                @endif
                            </button>
                        </form>
                        <form method="POST" action="/{{ $todo->id }}">
                            @method('DELETE')
                            @csrf
                            <button class="py-2 px-2 bg-red-500 text-white rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>                          
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
            @if ($count != 0)
            <div class="card mt-8 pt-6 font-bold rounded-xl flex justify-between">
                <h2>Total :  {{ $count_TF }} / {{ $count }} </h2>
                <h1>{{ $resCB }}</h1>
            </div>
            @endif
        </div>
    </div>
</body>
</html>