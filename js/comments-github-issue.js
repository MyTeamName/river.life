var api_url = GITHUB_ISSUES_BASE_URL + "/1/comments"

// thanks http://donw.io/post/github-comments/
$(document).ready(function () {
    $.ajax(api_url, {
        headers: {Accept: "application/vnd.github.v3.html+json"},
        dataType: "json",
        success: function(comments) {
            $.each(comments, function(i, comment) {
                var t  = '<div class="panel panel-default">';
                    t += '<div class="panel-heading">';
                    t += '<img src="' + comment.user.avatar_url + '" width="24px">';
                    t += ' <strong><a href="' + comment.user.html_url + '">' + comment.user.login + '</a></strong>';
                    t += ' ' + comment.created_at;
                    t += '</div>';
                    t += '<div class="panel-body">' + comment.body_html + '</div>';
                    t += '</div>';
                $("#gh-comments-list").append(t);
            });
        },
        error: function() {
            $("#gh-comments-list").append("Comments are not open for this post yet.");
        }
    });
});
