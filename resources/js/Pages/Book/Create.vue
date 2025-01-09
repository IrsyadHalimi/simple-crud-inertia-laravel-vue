<template>
    <div>
        <h1>Add Book</h1>
        <form method="POST" action="/books">
            <input type="hidden" name="_token" :value="csrf" />
            <div>
                <label>Title</label>
                <input type="text" id="title" name="title" required />
            </div>
            <div>
                <label>Author</label>
                <input type="text" id="author" name="author" required />
            </div>
            <div>
                <label>Year</label>
                <input type="number" id="year" name="year" required />
            </div>
            <button type="submit">Save</button>
        </form>
    </div>
</template>

<script>
export default {
    props: {
        csrf: {
            type: String,
            required: true,
        },
    },
};
</script>
