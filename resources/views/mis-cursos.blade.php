<x-app-layout>
  <section
    class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-10 mt-10">
    @foreach ($courses as $course)
      <x-course-card :course="$course" />
    @endforeach
  </section>
  <div
    class="mx-auto w-3/4 flex flex-col items-center justify-center text-white font-bold text-3xl  content-center py-40">
    @if ($courses->isempty())
      <h3>Aun no te has matriculado a ningun curso</h3>
      <img src="img/libro.png" alt="libro" class="mx-auto w-[400px] h-[400px] ">
    @endif
  </div>
</x-app-layout>
