// Editor.vue

<script>
    import Quill from 'quill';

    export default {
        props: {
            textValue: {
                type: String,
                default: ''
            }
        },

        data() {
            return {
                editor: null
            };
        },
        mounted() {
            this.editor = new Quill(this.$refs.editor, {
                modules: {
                    toolbar: [
                        [{ header: [1, 2, 3, 4, false] }],
                        ['bold', 'italic', 'underline'],
                        [{ align: ['', 'justify', 'center', 'right']}]
                    ]
                },
                theme: 'snow',
                formats: ['bold', 'underline', 'header', 'italic', 'align']
            });

            this.editor.root.innerHTML = this.textValue;

            this.editor.on('text-change', () => this.update());
        },

        methods: {
            update() {
                this.$emit('input', this.editor.getText() ? this.editor.root.innerHTML : '');
            }
        }
    }
</script>

<template>
    <div ref="editor"></div>
</template>
