@if (session($messageProp))
  <div class="w-full py-4 px-2 bg-[#E3F2C1] rounded-md">
    <p>{{ session($messageProp) }}</p>
  </div>
@endif
