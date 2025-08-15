<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
      @layer utilities {
        .container{
            @apply px-10 mx-auto;
        }
      }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="flex justify-between my-5">
            <h1 class="text-blue-500 text-xl"> Create </h1>

            <a href="/" class="bg-blue-600 text-white rounded py-2 px-4">Back to home</a>
        </div>

        <div> 
            <form method="POST" action="{{route('store')}}">
                @csrf
                <div class="flex flex-col gap-5"> 
                    <input type="text" name="speaker_name" placeholder="Speaker Name" value="{{old('speaker_name')}}">

                    @error('speaker_name')
                        <p class="text-red-600">{{$message}}</p>
                    @enderror

                    <input type="text" name="location" placeholder="Location">

                    @error('location')
                        <p class="text-red-600">{{$message}}</p>
                    @enderror

                    <input type="date" name="date">
                    
                    @error('date')
                        <p class="text-red-600">{{$message}}</p>
                    @enderror

                    <input type="time" name="time">
                    
                    @error('time')
                        <p class="text-red-600">{{$message}}</p>
                    @enderror

                    <input type="submit" class="bg-blue-500 text-white py-2 px-4 rounded"
                </div>

            </form>
        </div>
    
    </div>

</body>
</html>