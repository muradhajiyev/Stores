$(document).ready(function () {
    var config = $('#settings').val();
    var res = config.split(",");
    var blogId = parseInt(res[0]);
    var user_name= res[1];

    $('#comments-container').comments({
        enableEditing: false,
        enableUpvoting: false,
        maxRepliesVisible: 3,
        replyText: 'Cavabla',
        sendText: 'Göndər',
        textareaPlaceholderText: 'Şərh yaz',
        fieldMappings: {
            created: 'created_at'
        },

        getComments: function(success, error) {
            $.ajax({
                type: 'get',
                url: 'store/getcomments/' + blogId,
                success: function(commentsArray) {
                    success(commentsArray);
                },
                error: error
            });
        },

        postComment: function(commentJSON, success, error) {
            if(user_name == '0'){
                bootbox.alert("Comment yaza bilmek ucun login olmalisiz.");
            }

            else {
                var par = commentJSON.parent;
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                if(commentJSON.parent != null){
                    if(commentJSON.parent.charAt(0) == 'c'){
                        //as others commenting is not real time, replies to current user's newly created reply (before refresh)
                        //will be considered as parentless replies.
                        par = null;
                    }
                }

                $.ajax({
                    type:'POST',
                    url:'/store/storecomments',
                    data:{ 'content': commentJSON.content, 'parent': par, 'name': user_name, 'blogId' : blogId, _token: CSRF_TOKEN},
                    success:function(data){
                        success(commentJSON);
                    },
                    error: error
                });
            }
        }

    });
});
