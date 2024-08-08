<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form action="" method="post">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="inputText" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                            <div class="mt-1">
                                <input type="text" name="name" required class="mt-1 block w-full rounded-md dark:bg-gray-700  shadow-sm ">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="inputText" class="block text-sm font-medium text-gray-700 dark:text-gray-200"><b>Permisos</b></label>
                   
                            @foreach($getPermission as $value)
                            <div class="flex row justify-between mb-3">
                                
                                    <div class="mt-1 w-2/5">
                                        {{$value['name']}}
                                    </div>
                                    <div class="mt-1 w-1/2">
                                            <div class="flex row justify-between">
                                        @foreach($value['group'] as $group)
                                                <div class="col-span-2 flex ">
                                              
                                                <x-checkbox 
                                                 :checked="false" 
                                                 :value="$group['id']" 
                                                 name="permission_id[]" 
                                                 :label="$group['name']" 
                                                />
                                                
                                                </div>
                                        @endforeach
                                            </div>
                                    </div>
                                
                                
                            </div>
                            <hr> 
                            @endforeach
                       
                        </div>


                        <div class="mb-3">
                            <div class="mt-1">
                                <button type="submit" class="uppercase rounded-md  dark:bg-gray-700 hover:bg-gray-50 dark:text-gray-400 p-2">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                    


                </div>
            </div>
        </div>
    </div>

   
</x-app-layout>
