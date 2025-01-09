<template>
    <div>
        <h1>Edit Book</h1>
        <form :action="`/books/${book.id}`" method="POST">
            <input type="hidden" name="_method" value="PUT" />
            <input type="hidden" name="_token" :value="csrf" />
            <div>
                <label>Title</label>
                <input type="text" name="title" :value="book.title" />
            </div>
            <div>
                <label>Author</label>
                <input type="text" name="author" :value="book.author" />
            </div>
            <div>
                <label>Year</label>
                <input type="number" name="year" :value="book.year" />
            </div>
            <button type="submit">Save</button>
        </form>
    </div>
</template>

<script>
export default {
    props: {
        book: Object,
        csrf: String,
    },
};
</script>
