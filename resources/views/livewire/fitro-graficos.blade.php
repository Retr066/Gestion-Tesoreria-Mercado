<div>
    <div class="flex items-center justify-center bg-gray-100">
        <div class="max-w-7xl w-full mx-auto py-6 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">


                <div class="w-full lg:w-1/5">
                    <div class="rounded overflow-hidden shadow-lg">
                        <p class="p-2">Seleccione el Año</p>
                        <div class="border-b-2 m-0"></div>

                        <div class="mr-8 ml-4 my-2">
                            <div class="relative">
                                <select wire:model="años"
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="" selected>Seleccione... </option>
                                    @foreach ($this->añostotal as $año)
                                        <option value={{ $año }}>{{ $año }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="w-full lg:w-1/5">
                    <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-purple-400">
                        <div class="flex items-center">
                            <div class="icon w-14 p-3.5 bg-purple-400 text-white rounded-full mr-3">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                            <div class="flex flex-col justify-center">
                                <div class="text-lg">{{ number_format($saldos, 2) }} </div>
                                <div class="text-sm text-gray-400">Saldo Total</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/5">
                    <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-blue-400">
                        <div class="flex items-center">
                            <div class="icon w-14 p-3.5 bg-blue-400 text-white rounded-full mr-3">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div class="flex flex-col justify-center">
                                <div class="text-lg">3456</div>
                                <div class="text-sm text-gray-400">Customers</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/5">
                    <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-green-400">
                        <div class="flex items-center">
                            <div class="icon w-14 p-3.5 bg-green-400 text-white rounded-full mr-3">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="flex flex-col justify-center">
                                <div class="text-lg">{{ number_format($ingreso_total, 2) }}</div>
                                <div class="text-sm text-gray-400">Ingreso Total</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/5">
                    <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-red-400">
                        <div class="flex items-center">
                            <div class="icon w-14 p-3.5 bg-red-400 text-white rounded-full mr-3">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="flex flex-col justify-center">
                                <div class="text-lg">{{ number_format($egreso_total, 2) }}</div>
                                <div class="text-sm text-gray-400">Egreso Total</div>
                            </div>
                        </div>
                    </div>
                </div>






            </div>
        </div>
    </div>
</div>
