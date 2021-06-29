<div wire:init='kk'>
    <div  x-data="{optionsVisible : @entangle('show'), }" class="border border-gray-300 p-6 grid grid-cols-1 gap-6 bg-white shadow-lg rounded-lg m-3">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Seleccione Tipo de Balance
                </label>
                <select wire:model="tipo" id="input4"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="" selected >Seleccione... </option>
                    <option value="Anual">Anual</option>
                    <option value="Semestral">Primer Semestre(Enero - Julio)</option>
                    <option value="SemestralSegundo">Segundo Semestre(Julio - Diciembre)</option>
                </select>
                @error('tipo') <span class="error text-red-700">{{ $message }}</span> @enderror
            </div>
            <div x-show="optionsVisible" class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Seleccione el Año
                </label>
                <select wire:model="tipo_año" id="input4"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="" selected>Seleccione... </option>
                    @foreach ($this->Años as $año)
                        <option value="{{ $año }}">{{ $año }}</option>
                    @endforeach
                </select>
                @error('tipo_año') <span class="error text-red-700">{{ $message }}</span> @enderror
            </div>

        </div>


    <div x-data="{open: @entangle('viewSaldo')}">
        <div class="flex justify-center"><button wire:click="buscar()"
               class="p-2 border md:w-1/4 w-full rounded-md bg-gray-800 text-white">Generar Balance</button></div>
            <div x-show="open" >
                @if ($saldo > 0)
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                    <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd" />
                    </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600">
                            Saldo Total
                        </p>
                        <p class="text-lg font-semibold text-gray-700">
                            S/.{{ number_format($saldo,2) }}
                        </p>
                    </div>
                </div>
                @else
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                    <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd" />
                    </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600">
                            Saldo Total
                        </p>
                        <p class="text-lg font-semibold text-gray-700">
                            S/.{{ number_format($saldo,2) }}
                        </p>
                    </div>
                </div>
                @endif
                @if ($this->lote !== null )
                <div class="p-2 md:w-40 ">
                    <a class="flex items-center p-4 bg-gray-200 rounded-lg shadow-xs cursor-pointer hover:bg-gray-500 hover:text-gray-100"  {{-- href="{{ route('balancePdf',$this->lote, $this->tipo) }}" --}}  wire:click="test()">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd" />
                          </svg>
                        <div>
                          <p class="text-xs font-medium ml-2 ">
                            Balance
                          </p>

                        </div>
                    </a>
                </div>
                @endif

            </div>
         </div>
    </div>
</div>
@push('scripts')
<script>
    Livewire.on('datosTest', (datos) => {
                let datasos = JSON.stringify(datos);
                localStorage.setItem('todosDatos',datasos);
            });

</script>
@endpush
