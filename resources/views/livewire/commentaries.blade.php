{{-- @php
    use Carbon\Carbon;
@endphp --}}
<div>
    @auth
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-3">
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 pt-5 sm:grid sm:grid-cols-5 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            <label class="block text-xl font-medium text-gray-700">Nuevo Comentario</label>
                            <div class="flex items-center justify-center bg-gray-50">
                                <div class="max-w-md w-full space-y-8">
                                    <div class="grid justify-items-center">
                                        <img class="mt-6 mx-auto h-28 w-auto rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="Workflow">
                                        <h2 class="mt-6 text-center font-extrabold text-gray-900">
                                            {{ auth()->user()->name }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </dt>
                        
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-4">
                            <div class="mt-8">
                                <div class="mt-1">
                                    <label class="block text-sm font-medium text-gray-700">Valoraci&oacute;n</label>

                                    {{-- <input wire:model="valoration" type="number" min="1" max="5" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"> --}}
                                    <select wire:model="valoration" id="valoration"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>

                                    @error('valoration')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="mt-5 block text-sm font-medium text-gray-700">Comentario</label>
                                    <div class="mt-1">
                                        <textarea wire:model="body" rows="4" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                                        @error('body')
                                            <span class="text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                        </dd>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button wire:click="store" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-800 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Guardar
                        </button>
                    </div>
                </dl>
            </div>
        </div>

        <hr class="my-5">
    @endauth

    <div class="px-8 py-5 bg-gray-200 rounded-lg">
        @foreach ($commentaries as $commentary)
            <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-2">
                <div class="border-t border-gray-200">
                    <dl class="">
                        <div class="bg-gray-50 px-4 py-5 lg:grid lg:grid-cols-5 lg:gap-4 lg:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                <div class="flex items-center justify-center bg-gray-50">
                                    <div class="max-w-md w-full space-y-8">
                                        <div class="grid justify-items-center">
                                            <img class="mx-auto h-12 w-auto rounded-full" src="{{ $commentary->profile_photo_url }}" alt="Workflow">
                                            <h2 class="mt-6 text-center font-extrabold text-gray-900">
                                                {{ $commentary->name }}
                                            </h2>
                                            <div class="py-1 px-12 text-center text-yellow-500 grid justify-items-center grid-flow-col auto-cols-max">
                                                @for ($i = 0; $i < $commentary->valoration; $i++)
                                                    <div>
                                                        <span class="sr-only">Valoraci&oacute;n</span>
                                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                        </svg>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </dt>
                            <div class="text-xs text-gray-900 sm:col-span-4">
                                {{ $commentary->created_at->diffForHumans() }}
                                <dd class="text-left mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-4 bg-gray-200 rounded-md p-5 border border-gray-300">
                                    {!! $commentary->body !!}
                                </dd>
                            </div>
                                {{-- <button wire:click="destroy({{ $commentary->id }})" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-800 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Eliminar</button> --}}
                        </div>
                    </dl>
                </div>
            </div>
        @endforeach
    </div>
    <div class="my-5">
        {{$commentaries->links()}}
    </div>
</div>

