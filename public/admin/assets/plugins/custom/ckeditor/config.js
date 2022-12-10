var base_url = window.location.origin;
var url='/design/admin_panel/assets/global/plugins/ckeditor/';

CKEDITOR.editorConfig = function( config ) {
    config.filebrowserBrowseUrl =  base_url+url+'kcfinder/browse.php?opener=ckeditor&type=files';

    config.filebrowserImageBrowseUrl = base_url+url+'kcfinder/browse.php?opener=ckeditor&type=images';

    config.filebrowserFlashBrowseUrl =base_url+url+ 'kcfinder/browse.php?opener=ckeditor&type=flash';

    config.filebrowserUploadUrl =base_url+ url+'kcfinder/upload.php?opener=ckeditor&type=files';

    config.filebrowserImageUploadUrl = base_url+url+'kcfinder/upload.php?opener=ckeditor&type=images';

    config.filebrowserFlashUploadUrl = base_url+url+'kcfinder/upload.php?opener=ckeditor&type=flash';
    config.extraPlugins = 'youtube';
};

