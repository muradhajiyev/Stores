$(document).ready(function () {
});

 function ensure(btn1) {
 	
	bootbox.confirm({
    message: "Siz magazani silmek istediyinizden eminsiniz?",
    buttons: {
        confirm: {
            label: 'Beli',
            className: 'btn-success'
        },
        cancel: {
            label: 'Xeyr',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
        console.log('oookkkk');
        if(result){
        	btn1.parentElement.submit();
        } 	
    }
});

}