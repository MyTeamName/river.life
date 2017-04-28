var api_url = GITHUB_ISSUES_BASE_URL + "/1/comments"

// thanks http://donw.io/post/github-comments/
$(document).ready(function () {
    $.ajax(api_url, {
        headers: {Accept: "application/vnd.github.v3.html+json"},
        dataType: "json",
        success: function(comments) {
            new Vue({
                el: '#gh-comments-list',
                data: {
                    comments: comments
                }
            });
        },
        error: function() {
            $("#gh-comments").hide();
        }
    });
});
