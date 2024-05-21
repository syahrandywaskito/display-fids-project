<nav class="bg-indigo-600">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="sm:ml-6">
          <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="{{route('dashboard')}}" class="text-white hover:bg-indigo-900 hover:text-white rounded-md px-3 py-2 text-sm" aria-current="page">Dashboard</a>
            <a href="{{route('departure.data')}}" class="text-white hover:bg-indigo-900 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Departure</a>
            <a href="{{route('arrival.data')}}" class="text-white hover:bg-indigo-900 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Arrival</a>
            <a href="{{route('logout')}}" class="bg-gray-900 text-white hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>