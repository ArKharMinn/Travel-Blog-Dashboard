<x-filament-panels::page>
    <div class="w-1/2 mx-auto bg-white rounded-lg shadow-sm">
        <!-- Header -->
        <div class="p-4 border-b border-gray-200">
            <h1 class="text-xl font-semibold text-gray-800">Comments</h1>
            <p class="text-sm text-gray-500">Recent activity on your posts</p>
        </div>

        <!-- Notification List -->
        <div class="divide-y divide-gray-100">
            @foreach ($comment as $item)
                <div class="p-4 hover:bg-gray-50 transition-colors duration-150">
                    <div class="flex items-start space-x-3">
                        <!-- Avatar placeholder - replace with user avatar if available -->
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                            <span class="text-blue-600 font-medium">
                                {{ substr($item->user->name ?? 'U', 0, 1) }}
                            </span>
                        </div>

                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900">
                                    {{ $item->user->name ?? 'Anonymous' }}
                                    <span class="font-normal text-gray-500">commented on</span>
                                    {{ $item->post->title ?? 'a post' }}
                                </p>
                                <span class="text-xs text-gray-400">
                                    {{ $item->created_at->diffForHumans() }}
                                </span>
                            </div>

                            <p class="mt-1 text-sm text-gray-700">
                                {{ $item->content }}
                            </p>

                            {{-- <div class="mt-2 flex space-x-3 text-xs text-gray-500">
                                <button class="hover:text-blue-600 flex items-center">
                                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                                        </path>
                                    </svg>
                                    Like
                                </button>
                                <button class="hover:text-blue-600 flex items-center">
                                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                        </path>
                                    </svg>
                                    Reply
                                </button>
                            </div> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</x-filament-panels::page>
