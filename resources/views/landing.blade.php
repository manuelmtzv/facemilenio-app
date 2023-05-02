<x-layouts.app title="Landing" meta-description="Landing meta description">
  <section class="w-full">
    <div class="py-8 flex flex-col justify-center items-center gap-8 md:flex-row">
      <h2 class="font-semibold text-center text-3xl md:text-left md:text-4xl lg:text-5xl xl:text-6xl 2xl:text-7xl">
        Facemilenio is a
        social network
        for the
        entire
        Tecmilenio
        University
        community,
        where
        you can
        find out about
        news, events and meet people.</h2>

      <figure class="flex flex-col justify-center items-center gap-4 max-w-[14rem] md:max-w-sm w-full">
        <img src="/images/landing-icon.png" alt="Social media icon">

        <a class="button !w-full text-center !bg-[#E86A33] font-semibold md:text-2xl"
           href="{{ route('register') }}">Signup</a>
      </figure>
    </div>

    <div>

    </div>
  </section>
</x-layouts.app>
