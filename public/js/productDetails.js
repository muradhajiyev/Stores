$(document).ready(function () {
     var config = $('#settings').val();
     var res = config.split(",");
     var productId = parseInt(res[0]);
     var user_name= res[1];

     console.log(config);
        $('#comments-container').comments({
             enableEditing: false,
             enableUpvoting: false,
             maxRepliesVisible: 2,  
             fieldMappings: {
               created: 'created_at',
            },

            getComments: function(success, error) {
                console.log("1");
                $.ajax({
                    type: 'get',
                    url: '/api/comments/' + productId,
                    success: function(commentsArray) {
                        console.log(commentsArray);
                        success(commentsArray);
                    },
                    error: error
                });
            },

            postComment: function(commentJSON, success, error) {
                console.log("geldik");
                console.log(commentJSON);
                console.log(productId);
                console.log(user_name);
                console.log(commentJSON.content);
                if(user_name == '0'){
                    console.log("cannot comment");
                    bootbox.alert("Comment yaza bilmek ucun login olmalisiz.");
                }
                else {
                    $.ajax({
                        type:'get',
                        url:'/api/storeComments/' + productId,
                        data:{ 'content': commentJSON.content, 'parent': commentJSON.parent, 'name': user_name},
                        success:function(data){
                            console.log('success');
                            console.log(data);
                        },
                        error: error
                    });
                    success(commentJSON);
                }
            },

        });
});
