<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-[#1b1b18] dark:text-[#FDFDFC] leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#FDFDFC] dark:bg-[#0a0a0a] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-[#1b1b18] dark:text-[#FDFDFC]">
                    <div class="flex justify-end items-center mb-6">
                        <x-primary-button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'add-task-modal')">{{ __('Add Task') }}</x-primary-button>
                    </div>

                    <x-modal name="add-task-modal" :show="$errors->isNotEmpty()" focusable>
                        <form method="POST" action="/todos" class="p-6">
                            @csrf
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-6">
                                {{ __('📝 Create a New Task') }}
                            </h2>

                            <div class="space-y-4">
                                <div>
                                    <x-input-label for="name" :value="__('Task Name')" />
                                    <x-text-input id="name" name="name" type="text"
                                        class="mt-1 block w-full text-gray-900 dark:text-gray-100"
                                        placeholder="E.g., Buy groceries" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>

                                <div>
                                    <x-input-label for="description" :value="__('Description (Optional)')" />
                                    <x-text-input id="description" name="description" type="text"
                                        class="mt-1 block w-full text-gray-900 dark:text-gray-100"
                                        placeholder="Add some details..." />
                                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-6">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                                <x-primary-button class="ms-3">
                                    {{ __('Save Task') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </x-modal>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        {{ __('Name') }}
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        {{ __('Description') }}
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        {{ __('Created At') }}
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        {{ __('Actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($todos ?? [] as $todo)
                                    <tr>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#1b1b18] dark:text-[#FDFDFC]">
                                            {{ $todo->name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                            {{ Str::limit($todo->description, 50) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                            {{ $todo->created_at->format('M d, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#"
                                                class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 mx-2">{{ __('Edit') }}</a>
                                            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 dark:text-red-400 hover:text-red-900">{{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4"
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 text-center">
                                            {{ __('No tasks found.') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>