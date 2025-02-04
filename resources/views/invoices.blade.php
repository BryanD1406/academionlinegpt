<x-app-layout>
  <section class="bg-white lg:w-3/4 mx-auto rounded-xl mt-3 text-black  pt-20 px-4 lg:px-20 h-screen">
    <h3 class="font-bold">Tus facturas</h3>
    <p class="">Aqui podras visualizar todas tus facturas.</p>
    <div class="mt-10 h-20">
      @foreach ($invoices as $invoice)
        <div class="mt-10">
          <div class="flex flex-row items-center justify-between lg:px-20">
            <p>{{ $invoice->date }}</p>
            <p>Boleta: {{ $invoice->serie }}-{{ $invoice->numero }}</p>
            <p>{{ $invoice->venta_total }} USD</p>
            <a href="http://127.0.0.1:8000/storage/invoices/20486841495-B001-3.pdf" download>
              <img src="img/download.png" alt="" class="w-6 h-6">
            </a>
          </div>
          <hr class="h-[2px] w-full bg-black mt-2 blur-[2px]">
        </div>
      @endforeach
    </div>
    <div
      class="mx-auto w-3/4 flex flex-col items-center justify-center text-black font-bold text-3xl  content-center py-10 ">
      @if ($invoices->isempty())
        <img src="img/libro.png" alt="libro" class="mx-auto obejct-cover sm:w-[400px] sm:h-[400px] ">
      @endif
    </div>
  </section>
</x-app-layout>
