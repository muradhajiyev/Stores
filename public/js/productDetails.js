$(document).ready(function () {
     var config = $('#settings').val();
     console.log(config);
        $('#comments-container').comments({
             enableEditing: false,
             enableUpvoting: false,
             maxRepliesVisible: 2,

              
            getComments: function(success, error) {
              
               var commentsArray = [{
               id: 1,
               created: '2015-10-01',
               content: 'Lorem ipsum dolort sit amet',
               fullname: 'Simon Powell',
               user_has_upvoted: false
               },
               {
               id: 2,
               parent: 1,
               created: '2015-10-01',
               content: 'Lcommnettttet',
               fullname: 'Basqasi',
               user_has_upvoted: false
               },
               {
               id: 3,
               parent: 1,
               created: '2015-10-01',
               content: 'BCUDHCBUHBUHBUV',
               fullname: 'MEN',
               user_has_upvoted: false
               },
               {
               id: 4,
               parent: 1,
               created: '2015-10-01',
               content: 'vbfuhbvufhbvuhfbvh',
               fullname: 'Teze',
               user_has_upvoted: false
               },




               ];
               success(commentsArray);
            } ,

            postComment: function(commentJSON, success, error) {
                console.log("geldik");
                success(commentJSON);
            }

        });
});
