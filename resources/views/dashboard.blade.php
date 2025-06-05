<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="container mx-auto px-4 py-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            <!-- New Orders -->
            <div class="bg-cyan-500 text-white p-6 rounded-lg shadow-md flex justify-between items-center">
                <div>
                    <div class="text-3xl font-bold">{{$jumlahPertanyaan}}</div>
                    <div class="text-sm">Jumlah Kuisioner</div>
                    <a href="{{route('tema')}}" class="text-white text-sm flex items-center mt-2 hover:underline">
                        More info <i data-feather="arrow-right" class="ml-1 w-4 h-4"></i>
                    </a>
                </div>
                <i data-feather="shopping-bag" class="w-12 h-12 opacity-25"></i>
            </div>

            <!-- Bounce Rate -->
            <div class="bg-green-500 text-white p-6 rounded-lg shadow-md flex justify-between items-center">
                <div>
                    <div class="text-3xl font-bold">53<sup>%</sup></div>
                    <div class="text-sm">Bounce Rate</div>
                    <a href="#" class="text-white text-sm flex items-center mt-2 hover:underline">
                        More info <i data-feather="arrow-right" class="ml-1 w-4 h-4"></i>
                    </a>
                </div>
                <i data-feather="bar-chart-2" class="w-12 h-12 opacity-25"></i>
            </div>

            <!-- User Registrations -->
            <div class="bg-yellow-400 text-white p-6 rounded-lg shadow-md flex justify-between items-center">
                <div>
                    <div class="text-3xl font-bold">{{$jumlahPengguna}}</div>
                    <div class="text-sm">User Registrations</div>
                    <a href="#" class="text-white text-sm flex items-center mt-2 hover:underline">
                        More info <i data-feather="arrow-right" class="ml-1 w-4 h-4"></i>
                    </a>
                </div>
                <i data-feather="user-plus" class="w-12 h-12 opacity-25"></i>
            </div>

            <!-- Unique Visitors -->
            <div class="bg-rose-500 text-white p-6 rounded-lg shadow-md flex justify-between items-center">
                <div>
                    <div class="text-3xl font-bold">{{$jumlahResponden}}</div>
                    <div class="text-sm">Responden</div>
                    <a href="{{route('surveyor.index')}}" class="text-white text-sm flex items-center mt-2 hover:underline">
                        More info <i data-feather="arrow-right" class="ml-1 w-4 h-4"></i>
                    </a>
                </div>
                <i data-feather="pie-chart" class="w-12 h-12 opacity-25"></i>
            </div>

        </div>

        <script>
            feather.replace();
        </script>

    </div>







</x-app-layout>