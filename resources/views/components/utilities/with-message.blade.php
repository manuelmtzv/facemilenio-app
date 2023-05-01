@if (session($messageProp))
  <div class="status-message @if ($messageProp === 'error') !bg-red-400 @endif ">
    <p class="font-semibold">{{ session($messageProp) }}
    </p>

    @if (session('information'))
      <p id="statusInfo">{{ session('information') }}</p>
    @endif
  </div>
@endif
