<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Role') }}
        </h2>
        
    </x-slot>
    
    <div class="py-12">
      
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (!empty($PermissionRole))
         <a  href="{{url('role/role/add')}}"><button type="button" class="uppercase rounded-md  dark:bg-gray-700 hover:bg-gray-50 dark:text-gray-400 p-2 ">Add</button></a>

         @endif
           
            <div class="bg-white mt-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   
                    
                    <div class="relative overflow-x-auto">
                        
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                       Date
                                    </th>
                                    @if (!empty($PermissionEdit) || !empty($PermissionDelete))
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($getRecord as $value)
                               
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                       {{$value->id}}
                                    </th>
                                    <td class="px-6 py-4 text-center">
                                        {{$value->name}}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{$value->created_at}}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if (!empty($PermissionEdit))
                                        <a href="{{url('role/role/edit/'.$value->id)}}" class="uppercase rounded-md  dark:bg-gray-700 hover:bg-gray-50 dark:text-gray-400 p-2 ">Edit</a>
                                        @endif
                                        @if (!empty($PermissionDelete))
                                        <a href="{{url('role/role/delete/'.$value->id)}}" class="uppercase rounded-md  dark:bg-gray-700 hover:bg-gray-50 dark:text-gray-400 p-2 ">Delete</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
  
</x-app-layout>
