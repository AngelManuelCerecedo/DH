<div class="container">
    <div class="py-8">
        <div class="flex mb-4">
            <h2 class="text-4xl titulos mr-80">Cotizaciones</h2>
            <label class="ml-80 mt-6">Inicio <i class="bi bi-chevron-right"></i> Operación <i
                    class="bi bi-chevron-right"></i> Cotizaciones</label>
        </div>
        <div class="panel">
            <div class="my-2 flex sm:flex-row flex-col">
                <div class="mt-8 flex flex-row mb-1 sm:mb-0">
                    <div class=" ml-4">
                        <input placeholder="Buscar" wire:model="search"
                            class="inputN appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                    </div>
                    <div class=" ml-2 mr-2">
                        <select wire:model="cantidad"
                            class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="">
                        <select wire:model='Sucursal' class="input">
                            <option value="">Todos</option>
                            @foreach ($Sucursales as $Sucursal)
                                <option value="{{ $Sucursal->id }}">{{ $Sucursal->Nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class=" ml-4">
                        <a href="{{ route('RCotizacion') }}">
                            <button class="botonL">
                                <i class="bi bi-plus-lg text-lg"></i>
                                <span class="ml-2 ">Nueva Cotizacion</span>
                            </button>
                        </a>
                    </div>
                    <div class=" ml-2">
                        <a href="{{ route('Cotizaciones') }}">
                            <button class="botond">
                                <i class="bi bi-download"></i>
                                <span class="ml-4 ">Descargar</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    @if ($cotizaciones->count())
                        <table class="tabla">
                            <thead class="etiqueta">
                                <tr>
                                    <th
                                        class="px-8 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                                        Acciones
                                    </th>
                                    <th
                                        class="px-5 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                                        Folio
                                    </th>
                                    <th
                                        class="px-5 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                                        Fecha
                                    </th>
                                    <th
                                        class="px-5 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                                        Importe
                                    </th>
                                    <th
                                        class="px-5 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                                        Cliente
                                    </th>
                                    <th
                                        class="px-5 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                                        Sucursal
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="etiquetaS">
                                @foreach ($cotizaciones as $cotizacion)
                                    @if ($aux)
                                        <tr class="">
                                            <td class="px-3 py-2 border border-gray-200 bg-white">
                                                <div class="flex">
                                                    <div class="flex-shrink-0 w-10 h-10 ml-8">
                                                        <a href="{{ route('ECotizacion', [$cotizacion->id]) }}">
                                                            <button class="botonm  mt-1">
                                                                <i class="bi bi-layout-text-sidebar-reverse"></i>
                                                                <span class="ml-2 ">Detalles</span>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-5 py-3 border border-gray-200 bg-white ">
                                                <p class="text-black whitespace-no-wrap">{{ $cotizacion->Folio }}</p>
                                            </td>
                                            <td class="px-5 py-3 border border-gray-200 bg-white ">
                                                <p class="text-black whitespace-no-wrap">{{ $cotizacion->created_at }}
                                                </p>
                                            </td>
                                            <td class="px-5 py-3 border border-gray-200">
                                                <p class="whitespace-no-wrap" style="color: #00ACAC"><b>${{number_format($cotizacion->Importe3,2)}}
                                                </p>
                                            </td>   
                                            <td class="px-5 py-3 border border-gray-200 bg-white ">
                                                @if ($cotizacion->cliente_id)
                                                    @if ($cotizacion->cliente->TipoP == 'Fisica')
                                                        <p class="text-black whitespace-no-wrap">
                                                            {{ $cotizacion->cliente->Nombre }}
                                                            {{ $cotizacion->cliente->ApP }}
                                                            {{ $cotizacion->cliente->ApM }}
                                                        </p>
                                                    @else
                                                        <p class="text-black whitespace-no-wrap">
                                                            {{ $cotizacion->cliente->NomCom }}
                                                        </p>
                                                    @endif
                                                @else
                                                    <p class="text-black whitespace-no-wrap">
                                                        {{ $cotizacion->Cliente }}
                                                    </p>
                                                @endif
                                            </td>
                                            <td class="px-5 py-3 border border-gray-200 bg-white ">
                                                <p class="text-black whitespace-no-wrap">
                                                    {{ $cotizacion->almacen->Nombre }}</p </td>
                                        </tr>
                                        <var {{ $aux = false }} />
                                    @else
                                        <tr class="bg-gray-100">
                                            <td class="px-3 py-2 border border-gray-200">
                                                <div class="flex">
                                                    <div class="flex-shrink-0 w-10 h-10 ml-8">
                                                        <a href="{{ route('ECotizacion', [$cotizacion->id]) }}">
                                                            <button class="botonm  mt-1 ">
                                                                <i class="bi bi-layout-text-sidebar-reverse"></i>
                                                                <span class="ml-2 ">Detalles</span>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-5 py-3 border border-gray-200">
                                                <p class="text-black whitespace-no-wrap">{{ $cotizacion->Folio }}</p>
                                            </td>
                                            <td class="px-5 py-3 border border-gray-200">
                                                <p class="text-black whitespace-no-wrap">{{ $cotizacion->created_at }}
                                                </p>
                                            </td>
                                            <td class="px-5 py-3 border border-gray-200">
                                                <p class="whitespace-no-wrap" style="color: #00ACAC"><b>${{number_format($cotizacion->Importe3,2)}}</b>
                                                </p>
                                            </td>
                                            <td class="px-5 py-3 border border-gray-200">
                                                @if ($cotizacion->cliente_id)
                                                    @if ($cotizacion->cliente->TipoP == 'Fisica')
                                                        <p class="text-black whitespace-no-wrap">
                                                            {{ $cotizacion->cliente->Nombre }}
                                                            {{ $cotizacion->cliente->ApP }}
                                                            {{ $cotizacion->cliente->ApM }}
                                                        </p>
                                                    @else
                                                        <p class="text-black whitespace-no-wrap">
                                                            {{ $cotizacion->cliente->NomCom }}
                                                        </p>
                                                    @endif
                                                @else
                                                    <p class="text-black whitespace-no-wrap">
                                                        {{ $cotizacion->Cliente }}
                                                    </p>
                                                @endif
                                            </td>
                                            <td class="px-5 py-3 border border-gray-200">
                                                <p class="text-black whitespace-no-wrap">
                                                    {{ $cotizacion->almacen->Nombre }}</p>
                                            </td>
                                        </tr>
                                        <var {{ $aux = true }} />
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="px-6 py-4">
                            <div class="flex font-sans bg-[#FA5C7C] rounded-lg p-4 mb-4 text-sm text-white"
                                role="alert">
                                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <span class="font-medium">Info: </span> No se encontró ningún registro.
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($cotizaciones->hasPages())
                        <div class="px-6 py-3 etiqueta ">
                            {{ $cotizaciones->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

