<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<title>Waz Mahfil</title>
<style type="text/tailwindcss">
  @layer utilities {
    body {
      @apply relative bg-gradient-to-br from-indigo-100 via-blue-50 to-purple-100 min-h-screen overflow-x-hidden;
    }

    /* Buttons */
    .btn {
      @apply bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white font-bold rounded-full py-2 px-6 shadow-lg hover:scale-105 transform transition duration-300;
    }
    .edit-btn {
      @apply bg-gradient-to-r from-green-400 via-green-500 to-green-600 text-white font-semibold rounded-lg py-2 px-4 shadow-md hover:scale-105 transition duration-300;
    }
    .delete-btn {
      @apply bg-gradient-to-r from-red-400 via-red-500 to-red-600 text-white font-semibold rounded-lg py-2 px-4 shadow-md hover:scale-105 transition duration-300;
    }

    h1 {
      @apply text-4xl font-extrabold text-indigo-700 drop-shadow-xl mb-6;
    }

    /* Unique card table */
    .table-card {
      @apply grid gap-6 relative z-10;
    }
    .row-card {
      @apply bg-white/90 rounded-2xl shadow-2xl backdrop-blur-md border border-indigo-200 p-6 flex flex-col md:flex-row md:justify-between md:items-center gap-4 hover:scale-105 transition duration-300;
    }
    .info-group {
      @apply flex flex-col gap-1;
    }
    .info-title {
      @apply font-bold text-gray-800 text-lg;
    }
    .badge {
      @apply inline-block px-3 py-1 rounded-full text-sm font-semibold text-white;
    }
    .badge-location {
      @apply bg-blue-400;
    }
    .badge-date {
      @apply bg-purple-500;
    }
    .badge-time {
      @apply bg-pink-500;
    }

    /* Floating glow particles */
    .particle {
      @apply absolute rounded-full opacity-70;
      animation: floatParticles linear infinite;
    }
    @keyframes floatParticles {
      0% { transform: translateY(0) translateX(0) scale(0.8); opacity: 0.7; }
      50% { transform: translateY(-80px) translateX(40px) scale(1.2); opacity: 1; }
      100% { transform: translateY(-160px) translateX(0) scale(0.8); opacity: 0.7; }
    }

    /* Background gradient animation */
    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
    body::before {
      content: "";
      position: absolute;
      inset: 0;
      z-index: 0;
      background: linear-gradient(120deg, #a78bfa, #60a5fa, #facc15, #34d399);
      background-size: 400% 400%;
      animation: gradientShift 20s ease infinite;
      opacity: 0.25;
    }
  }
</style>
</head>
<body>
    <!-- Floating Particles -->
    <div class="particle w-4 h-4 bg-yellow-300" style="top:10%; left:15%; animation-duration: 16s;"></div>
    <div class="particle w-6 h-6 bg-purple-400" style="top:50%; left:35%; animation-duration: 20s;"></div>
    <div class="particle w-3 h-3 bg-blue-400" style="top:70%; left:65%; animation-duration: 22s;"></div>
    <div class="particle w-5 h-5 bg-pink-300" style="top:30%; left:80%; animation-duration: 18s;"></div>

    <div class="container px-10 mx-auto py-12 relative z-10">
        <div class="flex justify-between items-center mb-8">
            <h1>Waz Mahfil</h1>
            <a href="/create" class="btn">+ Add Event</a>
        </div>

        @if (session('success'))
            <h2 class="text-green-600 font-semibold mb-3">{{ session('success') }}</h2>
        @endif
        @if (session('remove'))
            <h2 class="text-red-600 font-semibold mb-3">{{ session('remove') }}</h2>
        @endif

        <div class="table-card">
            @foreach ($posts as $post)
            <div class="row-card">
                <div class="info-group">
                    <div class="info-title">ID: {{$post->id}}</div>
                    <div class="info-title">Speaker: {{$post->speaker_name}}</div>
                </div>
                <div class="info-group">
                    <span class="badge badge-location">Location: {{$post->location}}</span>
                    <span class="badge badge-date">Date: {{$post->date}}</span>
                    <span class="badge badge-time">Time: {{$post->time}}</span>
                </div>
                <div class="flex gap-2 mt-4 md:mt-0">
                    <a href="{{route('edit', $post->id)}}" class="edit-btn">Edit</a>
                    <form method="post" action="{{route('delete', $post->id)}}" class="inline">
                        @csrf
                        @method('delete')
                        <button class="delete-btn" type="submit">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
