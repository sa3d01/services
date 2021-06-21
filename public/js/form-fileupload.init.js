$(".id-img").dropify({
    messages: { default: " ", replace: "", remove: "حذف", error: "حدذ خطأ" },
    error: { fileSize: "The file size is too big (1M max)." },
    tpl: {

        message: '<div class="dropify-message"><i class="fas fa-camera"></i></div>',
    }
});
$('.personal-img').dropify({
    messages: {
        'default': 'صورة شخصية',
        'replace': 'صورة شخصية',
        'remove': 'حذف',
        'error': 'حدث خطأ'
    },
    tpl: {
        wrap: '<div class="dropify-wrapper"></div>',
        loader: '<div class="dropify-loader"></div>',
        message: '<div class="dropify-message"><p>{{ default }}</p> <i class="far fa-file-image"></i> </div>',
        preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
        filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
        clearButton: '<button type="button" class="dropify-clear">{{ remove }}</button>',
        errorLine: '<p class="dropify-error">{{ error }}</p>',
        errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
    }
});