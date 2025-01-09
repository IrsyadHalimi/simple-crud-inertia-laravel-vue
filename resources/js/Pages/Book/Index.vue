<template>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Book List</h1>
        <a href="/books/create" title="add new book" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.03v13m0-13c-2.819-.831-4.715-1.076-8.029-1.023A.99.99 0 0 0 3 6v11c0 .563.466 1.014 1.03 1.007 3.122-.043 5.018.212 7.97 1.023m0-13c2.819-.831 4.715-1.076 8.029-1.023A.99.99 0 0 1 21 6v11c0 .563-.466 1.014-1.03 1.007-3.122-.043-5.018.212-7.97 1.023"/>
            </svg>
        </a>
        <table class="min-w-full bg-white border border-gray-200 shadow-md rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b text-left text-gray-600 font-medium">Title</th>
                    <th class="px-4 py-2 border-b text-left text-gray-600 font-medium">Author</th>
                    <th class="px-4 py-2 border-b text-left text-gray-600 font-medium">Year</th>
                    <th class="px-4 py-2 border-b text-left text-gray-600 font-medium">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="book in books" :key="book.id" class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">{{ book.title }}</td>
                    <td class="px-4 py-2 border-b">{{ book.author }}</td>
                    <td class="px-4 py-2 border-b">{{ book.year }}</td>
                    <td class="px-4 py-2 border-b flex space-x-2">
                        <a :href="`/books/${book.id}/edit`"
                            class="text-blue-500 hover:underline" title="Edit book">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                            </svg>
                        </a>
                        <form :action="`/books/${book.id}`" method="POST" class="inline">
                            <input type="hidden" name="_method" value="DELETE" />
                            <input type="hidden" name="_token" :value="csrf" />
                            <button
                                type="submit"
                                class="text-red-500 hover:underline"
                                onclick="return confirm('Are you sure you want to delete this book?');" title="Delete book">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                                    <path fill-rule="evenodd" d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.133 2.845a.75.75 0 0 1 1.06 0l1.72 1.72 1.72-1.72a.75.75 0 1 1 1.06 1.06l-1.72 1.72 1.72 1.72a.75.75 0 1 1-1.06 1.06L12 15.685l-1.72 1.72a.75.75 0 1 1-1.06-1.06l1.72-1.72-1.72-1.72a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        books: Array,
        csrf: String,
    },
};
</script>
