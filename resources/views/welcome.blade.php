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

        .btn {
            @apply bg-blue-600 text-white rounded py-2 px-4
        }
      }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
      <div class="flex justify-between my-5">
            <h1 class="text-blue-500 text-xl"> Waz Mahfil </h1>

            <a href="/create" class="btn">+Add</a>
      </div>
      @if (session('success'))
          <h2 class="text-green-600">{{ session('success') }}</h2>
      @endif
        @if (session('remove'))
          <h2 class="text-red-600">{{ session('remove') }}</h2>
        @endif

      <div>      

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-700 border border-blue-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Speaker_name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Location
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Time
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$post->id}}</th>
                        <td class="px-6 py-4">{{$post->speaker_name}}</td>
                        <td class="px-6 py-4">{{$post->location}}</td>
                        <td class="px-6 py-4">{{$post->date}}</td>
                        <td class="px-6 py-4">{{$post->time}}</td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{route('edit', $post->id)}}" class="btn">Edit</a>

                            <form method="post" action="{{route('delete', $post->id)}}" class="inline">
                                @csrf
                                @method('delete')
                            <button class="bg-red-600 text-white rounded py-2 px-4" type="submit" >Delete</button>
                        </form>
                        </td>

                    </tr>
                    @endforeach
                    

                </tbody>
            </table>
        </div>

      </div>

    </div>

</body>
</html>