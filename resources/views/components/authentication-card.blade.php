<div class="min-h-screen  sm:justify-center items-center pt-6 sm:pt-0 bg-indigo-200 content-center py-20">
  <div
    class="sm:w-3/4 mx-auto  grid grid-cols-1 lg:grid-cols-2 h-[600px] sm:h-[700px] shadow-2xl shadow-indigo-500 rounded-xl">
    <div class="w-full content-center bg-white  shadow-md overflow-hidden rounded-l-xl ">
      <div class="hidden sm:block sm:px-20">
        {{ $logo }}
      </div>
      {{ $slot }}
    </div>
    <div class="bg-indigo-400 content-center px-10 hidden lg:block  rounded-r-xl py-20">
      <div class="w-3/4 bg-indigo-500 rounded-lg h-5/6 mx-auto relative">
        <img src="img/student.png
        " alt="" class="object-cover h-[500px] absolute bottom-0 right-0">
      </div>
    </div>
  </div>
</div>
