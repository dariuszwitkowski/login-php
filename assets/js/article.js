$(document).ready(function() {
    $('.edit-article').on('click', function() {
        $('#create-news-title').addClass("hidden");
        $('#edit-news-title').removeClass("hidden");
        $('#cancel-edit-button').removeClass("hidden");
        $('#submit-form-button').text("Save");
        var id = $(this).data('id');
        var title = $(this).data('title');
        var content = $(this).data('content');
        $('#article-id').val(id);
        $('#article-title').val(title);
        $('#article-content').val(content);
    });

    $('#cancel-edit-button').on('click', function() {
        $('#create-news-title').removeClass("hidden");
        $('#edit-news-title').addClass("hidden");
        $('#article-id').val('');
        $('#article-title').val('');
        $('#article-content').val('');
        $('#submit-form-button').text("Create");
        $('#cancel-edit-button').addClass("hidden");
    });
});