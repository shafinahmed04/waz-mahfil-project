<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <title>Edit Event</title>
  <style>
    /* Background grid animation */
    body::before {
      content: "";
      position: absolute;
      inset: 0;
      background-image: linear-gradient(to right, rgba(255,255,255,0.05) 1px, transparent 1px),
                        linear-gradient(to bottom, rgba(255,255,255,0.05) 1px, transparent 1px);
      background-size: 40px 40px;
      animation: moveGrid 20s linear infinite;
    }
    @keyframes moveGrid {
      from { background-position: 0 0; }
      to { background-position: 40px 40px; }
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-blue-900 to-black relative overflow-hidden text-white">

  <!-- Floating neon circles -->
  <div class="absolute inset-0 pointer-events-none">
    <div class="w-72 h-72 bg-blue-500/20 rounded-full blur-3xl absolute top-16 left-10 animate-pulse"></div>
    <div class="w-96 h-96 bg-cyan-400/20 rounded-full blur-3xl absolute bottom-16 right-10 animate-ping"></div>
    <div class="w-64 h-64 bg-indigo-500/30 rounded-full blur-2xl absolute top-1/3 right-1/3 animate-bounce"></div>
  </div>

  <!-- Main Card -->
  <div class="relative w-full max-w-lg p-[3px] rounded-3xl bg-gradient-to-r from-cyan-400 via-blue-500 to-indigo-600 shadow-[0_0_40px_rgba(0,200,255,0.7)]">
    <div class="bg-gray-950/90 backdrop-blur-xl rounded-3xl p-8">

      <!-- Header -->
      <div class="flex justify-between items-center mb-6 border-b border-white/10 pb-3">
        <h1 class="text-3xl font-extrabold bg-gradient-to-r from-cyan-300 to-blue-500 bg-clip-text text-transparent drop-shadow-[0_0_10px_rgba(0,200,255,0.8)]">
          ✏️ Edit Event
        </h1>
        <a href="/" class="bg-gradient-to-r from-cyan-500 to-blue-700 text-white font-semibold rounded-xl py-2 px-5 shadow-lg hover:scale-110 hover:shadow-[0_0_25px_rgba(0,200,255,0.8)] transition-all duration-300">
          ⬅ Home
        </a>
      </div>

      <!-- Form -->
      <form method="POST" action="{{route('update', $ourPost->id)}}" class="space-y-6">
        @csrf

        <!-- Speaker Name -->
        <div>
          <label class="text-sm text-gray-400">Speaker Name</label>
          <input type="text" name="speaker_name" placeholder="👤 Enter name"
                 value="{{$ourPost->speaker_name}}"
                 class="w-full mt-2 px-5 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-500 shadow-inner focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-cyan-400 transition">
          @error('speaker_name')
            <p class="text-red-400 text-sm mt-1">{{$message}}</p>
          @enderror
        </div>

        <!-- Location -->
        <div>
          <label class="text-sm text-gray-400">Location</label>
          <input type="text" name="location" placeholder="📍 Event location"
                 value="{{$ourPost->location}}"
                 class="w-full mt-2 px-5 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white placeholder-gray-500 shadow-inner focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition">
          @error('location')
            <p class="text-red-400 text-sm mt-1">{{$message}}</p>
          @enderror
        </div>

        <!-- Date -->
        <div>
          <label class="text-sm text-gray-400">Date</label>
          <input type="date" name="date" value="{{$ourPost->date}}"
                 class="w-full mt-2 px-5 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white shadow-inner focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 transition">
          @error('date')
            <p class="text-red-400 text-sm mt-1">{{$message}}</p>
          @enderror
        </div>

        <!-- Time -->
        <div>
          <label class="text-sm text-gray-400">Time</label>
          <input type="time" name="time" value="{{$ourPost->time}}"
                 class="w-full mt-2 px-5 py-3 bg-gray-900/70 border border-gray-700 rounded-xl text-white shadow-inner focus:outline-none focus:ring-2 focus:ring-teal-400 focus:border-teal-400 transition">
          @error('time')
            <p class="text-red-400 text-sm mt-1">{{$message}}</p>
          @enderror
        </div>

        <!-- Submit -->
        <button type="submit"
                class="w-full py-3 rounded-xl font-bold text-lg text-white bg-gradient-to-r from-cyan-400 via-blue-500 to-indigo-600 shadow-[0_0_30px_rgba(0,200,255,0.8)] hover:scale-105 hover:shadow-[0_0_40px_rgba(0,200,255,1)] transition-all duration-300">
          💾 Update Event
        </button>
      </form>
    </div>
  </div>

</body>
</html>
