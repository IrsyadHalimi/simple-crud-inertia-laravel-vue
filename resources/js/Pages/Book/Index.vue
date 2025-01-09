<template>
    <div>
        <h1>Book List</h1>
        <a href="/books/create">Add new book</a>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Year</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="book in books" :key="book.id">
                    <td>{{ book.title }}</td>
                    <td>{{ book.author }}</td>
                    <td>{{ book.year }}</td>
                    <td>
                        <a :href="`/books/${book.id}/edit`">Edit</a>
                        <form :action="`/books/${book.id}`" method="POST" style="display: inline;">
                            <input type="hidden" name="_method" value="DELETE" />
                            <input type="hidden" name="_token" :value="csrf" />
                            <button type="submit">Delete</button>
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
