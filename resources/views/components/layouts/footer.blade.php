<footer class="border-t-[#41644A] border">
  <div class="content flex justify-between py-8">

    <h3 class="font-semibold text-lg">
      @auth
        {{ auth()->user()->username }}

        @if (auth()->user()->role->name === 'Admin')
          (admin)
        @endif
      @else
        Facemilenio
      @endauth

    </h3>

    <p>Copyright 2023</p>
  </div>
</footer>
