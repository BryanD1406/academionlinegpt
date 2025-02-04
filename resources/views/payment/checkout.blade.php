<x-app-layout>
  <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 py-17 mt-10 text-white">
    <h1 class="text-white text-3xl font-bold mb-20 text-center">Detalle del pedido</h1>
    <div class="bg-white sm:p-10 text-black rounded-2xl shadow-indigo-500 shadow-xl">
      <div class="card-body">
        <article class="flex items-center mt-4">
          <img class="h-12 w-12 object-cover mr-4" src="{{ Storage::url($curso->image->url) }}" alt="">
          <h1 class="text-lg ml-2 mr-4">{{ $curso->title }}</h1>
          <p class="text-xl font-bold ml-auto">{{ $curso->price->value }} USD</p>
        </article>
        <div class="my-10">
          <p class="text-sm">
            {!! $curso->description !!}
          </p>
          <a class="text-red-200 font-bold mb-10">Terminos y Condiciones</a>
        </div>
        <div class="lg:ml-40">
          <div id="paypal-buttons"></div>
        </div>
        {{-- ? SCRIPT --}}
        <script>
          paypal.Buttons({
            style: {
              borderRadius: 10
            },
            createOrder: function(data, actions) {
              return actions.order.create({
                purchase_units: [{
                  amount: {
                    value: '{{ $curso->price->value }}'
                  }
                }]
              });
            },
            onApprove: function(data, actions) {
              return actions.order.capture().then(function(details) {
                console.log(details);
                window.location = '{{ route('payment.approved', $curso) }}'
              });
            },
          }).render("#paypal-buttons");
        </script>
        </p>
      </div>
    </div>
  </div>
</x-app-layout>
