import 'ckeditor4';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

var base = location.protocol + '//' + location.host;

$(document).ready(function () {
    editor_init('editor');
});

function editor_init(field) {
    ClassicEditor
        .create(document.querySelector(`#${field}`), {
            filebrowserImageBrowseUrl: base + '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: base + '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: base + '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: base + '/laravel-filemanager/upload?type=Files&_token=',
            toolbar: [
                { name: 'clipboard', items: ['cut', 'copy', 'paste', 'PasteText', '-', 'Undo', 'Redo'] },
                { name: 'basicstyles', items: ['Bold', 'Italic', 'BulletedList', 'Strike', 'Image', 'Link'] },
                { name: 'document', items: ['CodeSnippet', 'EmojiPanel', 'Preview', 'Source']}
            ]
        })
        .catch(error => {
            console.error('Error during initialization of CKEditor', error);
        });
}
