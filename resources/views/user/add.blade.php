<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New User') }}
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
                                <input type="text" name="name" value="{{old('name')}}" required class="mt-1 block w-full rounded-md dark:bg-gray-700  shadow-sm ">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="inputText" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
                            <div class="mt-1">
                                <input type="email" name="email" value="{{old('email')}}" required class="mt-1 block w-full rounded-md dark:bg-gray-700  shadow-sm ">
                                <div style="color:red">{{$errors -> first('email')}}</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="inputText" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Password</label>
                            <div class="mt-1">
                                <input type="password" name="password"  required class="mt-1 block w-full rounded-md dark:bg-gray-700  shadow-sm ">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="inputText" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Role</label>
                            <div class="mt-1">
                               <select class="form-control" name="role_id" required>
                                <option value="">Select</option>
                                @foreach ($getRole as $value)
                                <option {{(old('role_id') == $value->id) ? 'selected' : ''}} value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                               </select>
                            </div>
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
