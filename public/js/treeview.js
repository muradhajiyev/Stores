$.fn.extend({
   treed: function (o) {

      var openedClass = 'glyphicon-chevron-right';
      var closedClass = 'glyphicon-chevron-down';

      if (typeof o != 'undefined'){
         if (typeof o.openedClass != 'undefined'){
            openedClass = o.openedClass;
         }
         if (typeof o.closedClass != 'undefined'){
            closedClass = o.closedClass;
         }
      };

      //initialize each of the top levels
      var tree = $(this);
      tree.addClass("tree");
      tree.find('li').has("ul").each(function () {
         var branch = $(this); //li with children ul
         branch.prepend("");
         branch.addClass('branch');
         branch.on('click', function (e) {
            if (this == e.target) {
               var icon = $(this).children('i:first');
               icon.toggleClass(openedClass + " " + closedClass);
               $(this).children().children().toggle(200);
            }
         })

         //branch.children().children().toggle(); //uncomment this if you want to hide the tree bydefault.
         $("#collapsetree").click(function(){
            $('[class*=glyphicon-chevron-down]').addClass('').addClass("glyphicon-chevron-right").removeClass("glyphicon-chevron-down");
            branch.children().children().hide(200);
         });
         $("#expandtree").click(function(){
            $('[class*=glyphicon-chevron-right]').addClass('').addClass("glyphicon-chevron-down").removeClass("glyphicon-chevron-right");
            branch.children().children().show(200);
         });
      });
      //fire event from the dynamically added icon
      tree.find('.branch .indicator').each(function(){
         $(this).on('click', function () {
            $(this).closest('li').click();
         });
      });
      //fire event to open branch if the li contains an anchor instead of text
      tree.find('.branch>a').each(function () {
         $(this).on('click', function (e) {
            $(this).closest('li').click();
            e.preventDefault();
         });
      });
      //fire event to open branch if the li contains a button instead of text
      tree.find('.branch>button').each(function () {
         $(this).on('click', function (e) {
            $(this).closest('li').click();
            e.preventDefault();
         });
      });
   }
});

//Initialization of treeviews
$('#tree1').treed();

// $.fn.extend({
//    treed: function (o) {
//
//       var openedClass = 'glyphicon-minus-sign';
//       var closedClass = 'glyphicon-plus-sign';
//
//       if (typeof o != 'undefined'){
//          if (typeof o.openedClass != 'undefined'){
//             openedClass = o.openedClass;
//          }
//          if (typeof o.closedClass != 'undefined'){
//             closedClass = o.closedClass;
//          }
//       };
//
//       /* initialize each of the top levels */
//       var tree = $(this);
//       tree.addClass("tree");
//       tree.find('li').has("ul").each(function () {
//          var branch = $(this);
//          branch.prepend("");
//          branch.addClass('branch');
//          branch.on('click', function (e) {
//             if (this == e.target) {
//                var icon = $(this).children('i:first');
//                icon.toggleClass(openedClass + " " + closedClass);
//                $(this).children().children().toggle();
//             }
//          })
//          branch.children().children().toggle();
//       });
//       /* fire event from the dynamically added icon */
//       tree.find('.branch .indicator').each(function(){
//          $(this).on('click', function () {
//             $(this).closest('li').click();
//          });
//       });
//       /* fire event to open branch if the li contains an anchor instead of text */
//       tree.find('.branch>a').each(function () {
//          $(this).on('click', function (e) {
//             $(this).closest('li').click();
//             e.preventDefault();
//          });
//       });
//       /* fire event to open branch if the li contains a button instead of text */
//       tree.find('.branch>button').each(function () {
//          $(this).on('click', function (e) {
//             $(this).closest('li').click();
//             e.preventDefault();
//          });
//       });
//    }
// });
//
// $('#tree1').treed();
